<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Paket;
use App\Models\Faq;
use App\Models\Client;
use App\Models\Booking;
use App\Models\BookingTransaksi;
use App\Models\CekKode;
use CodeIgniter\API\ResponseTrait;

class IndexController extends BaseController
{

    use ResponseTrait;

    public function index(): string
    {               
        $this->data['faq'] = model(Faq::class)->orderBy('prioritas','asc')->findAll();
        return view('index',$this->data);
    }

    public function cekjadwal(): string
    {               
        $this->data['paket'] = '-';
        return view('cekjadwal',$this->data);
    }

    public function cari()
    {
        $allowedDomain = base_url();
        $referer = $this->request->getHeaderLine('Referer');

        if (strpos($referer, $allowedDomain) !== 0) {
            return $this->response->setStatusCode(403)->setJSON([
                'status' => 'forbidden',
                'message' => 'Akses tidak valid.'
            ]);
        }

        $kode = $this->request->getPost('kode');

        $booking =  model(Client::class)
        ->select('client_m.*, booking_t.tanggal, booking_t.sesi, booking_t.status, booking_t.keterangan, booking_t.paketfk, paket_m.paket,
        booking_t.hargaasli, booking_t.hargadeal, booking_t.kursi,booking_t.id as bookingid,booking_t.eo,booking_t.katering,booking_t.lainlain')
        ->where('booking_t.kodebooking', $kode)
        ->join('booking_t','booking_t.clientfk = client_m.id')
        ->join('paket_m', 'booking_t.paketfk = paket_m.id','left')
        ->first();

        if (!$booking) {
            return $this->response->setJSON([
                'status' => 'fail',
                'message' => 'Kode booking tidak ditemukan'
            ]);
        }

        // ambil transaksi
        $transaksi = model(BookingTransaksi::class)
            ->where('bookingfk', $booking->id)
            ->findAll();

        // render view partial
        $html = view('hasil_pencarian', [
            'booking' => $booking,
            'transaksi' => $transaksi
        ]);

        return $this->response->setJSON([
            'status' => 'ok',
            'html' => $html
        ]);
    }

    public function captcha()
    {
        helper('captcha');

        $vals = [
            'img_path'   => WRITEPATH . 'captcha/',
            'img_url'    => base_url('writable/captcha/'),
            'img_width'  => 150,
            'img_height' => 50,
            'expiration' => 300
        ];

        $cap = create_captcha_ci4($vals);

        session()->set('captcha_answer', $cap['word']);

        return $this->response->setJSON([
            'image' => $cap['image']
        ]);
    }

    public function sendWa()
    {
        $number   = $this->request->getPost('number');
        $captcha  = $this->request->getPost('captcha');

        if ($captcha !== session()->get('captcha_answer')) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Captcha salah!'
            ]);
        }

        $kode =  $this->generateKode4Huruf();

        $res = sendWa(normalize_phone($number), "Kode verifikasi Anda: *".$kode."* \nAnda dapat menggunakanya untuk melihat jadwal");

        $request['nowa'] = $number ;        
        $request['kode'] = $kode;
        $request['status'] = 0;
        $request['terkirim'] = !empty($res['status']) && $res['status'] === true ? 1 : 0;
        $request['logwa'] = json_encode($res);
        $clientModel = model(CekKode::class);
        $clientModel->insert($request);

        
        if (!empty($res['status']) && $res['status'] === '200') {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Kode berhasil dikirim ke WhatsApp!'
            ]);
        } else {    
            $errorMessage = isset($res['message']) ? $res['message'] : 'Tidak ada pesan kesalahan dari API.';
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Kode gagal dikirim ke WhatsApp! '. $errorMessage,
                'res' => $res
            ]);
        }
        
    }

    public function cekKode()
    {
        $allowedDomain = base_url();
        $referer = $this->request->getHeaderLine('Referer');

        if (strpos($referer, $allowedDomain) !== 0) {
            return $this->response->setStatusCode(403)->setJSON([
                'status' => 'forbidden',
                'message' => 'Akses tidak valid.'
            ]);
        }

        $kode   = $this->request->getPost('kode');

        $limitTime = date('Y-m-d H:i:s', strtotime('-3 hours'));

        $booking =  model(CekKode::class)      
        ->where('kode', $kode)
        ->where('status', 0)
        ->where('created_at >=', $limitTime)
        ->first();
        
        if (!empty($booking)) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Kode berhasil digunakan hingga '.date("d-m-Y H:i:s",strtotime($limitTime)),
            ]);
        }else{
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Kode salah / telah expired silahkan ajukan kode baru!',
            ]);
        }

        // PROSES KIRIM WA — contoh sederhana (ganti dgn API kamu)
        // ------------------------------------------
        // panggil service WA
        // ------------------------------------------

        
    }

    public function datacalendar() {
        $model = model(Booking::class)
        ->select('booking_t.id as id,client_m.nohp,client_m.email,client_m.cpp,client_m.cpw,client_m.pemesan,booking_t.tipefk as idtipe,tipe_m.color,tipe_m.tipeevent,booking_t.tanggal,booking_t.sesi,booking_t.status') 
        ->join('client_m','client_m.id=booking_t.clientfk') 
        ->join('tipe_m','tipe_m.id=booking_t.tipefk')
        ->where('booking_t.deleted_at',null); 
        //$model = new Pendaftaran(); 
        
        $data = $model->findAll();

        $events = [];

        foreach ($data as $row) {

            // Mapping warna berdasarkan status
            $statusColor = match (strtolower($row->status)) {
                'keep'  => '#ff0000',
                'dp'    => '#ff8800',
                '50%'   => '#007bff',
                'lunas' => '#28a745',
                default => '#6c757d', // abu-abu jika tidak diketahui
            };

            $events[] = [
                'id'       => $row->id,
                'title'    => $row->sesi,
                'tooltip'  => $row->sesi,
                'start'    => date('c', strtotime($row->tanggal)),
                'sesi'     => $row->sesi,
                'color'    => $statusColor,
                'status'   => $row->status,
                'tipe_id'  => $row->idtipe,       ];
        }


        return $this->response->setJSON($events);
    }

    public function booking(): string
    {               
        $this->data['paket'] = model(Paket::class)->findAll();
        return view('booking',$this->data);
    }

    public function bookingStore(){
        //client

        try{

            $request['pemesan'] = $this->request->getPost('pemesan');        
            $request['alamat'] = $this->request->getPost('alamat');
            $request['email'] = $this->request->getPost('email');
            $request['cpp'] = $this->request->getPost('cpp');
            $request['cpw'] = $this->request->getPost('cpw');
            $request['nohpsaudara'] = $this->request->getPost('nohp');
            $clientModel = model(Client::class);
            $clientModel->insert($request);
            $clientfk = $clientModel->getInsertID();

            $tanggalsesi = date("d-m-Y", strtotime($this->request->getPost('tanggal')))." ~ ".$this->request->getPost('sesi');

            $kodebooking = $this->generateKodeBookingTanggal();
            //booking
            $reqbooking['tipefk'] = $this->request->getPost('tipefk');
            $reqbooking['clientfk'] = $clientfk;
            $reqbooking['paketfk'] = $this->request->getPost('paketfk');if($this->request->getPost('sesi') == 'PAGI'){
            $transaksi['tanggal'] = date("Y-m-d 10:00",strtotime($this->request->getPost('tanggal')));
            }elseif ($this->request->getPost('sesi') == 'SIANG') {
                $transaksi['tanggal'] = date("Y-m-d 13:00",strtotime($this->request->getPost('tanggal')));
            }elseif ($this->request->getPost('sesi') == 'MALAM') {
                $transaksi['tanggal'] = date("Y-m-d 19:00",strtotime($this->request->getPost('tanggal')));
            }
            $reqbooking['sesi'] = $this->request->getPost('sesi');
            $reqbooking['keterangan'] = $this->request->getPost('keterangan');
            $reqbooking['status'] = "KEEP";
            $reqbooking['kodebooking'] = $kodebooking;
            model(Booking::class)->insert($reqbooking);

            $this->sendMessage("Ada pesanan baru dari \n Nama : ".$request['pemesan']." \n Tanggal : ".$tanggalsesi.". \n Kode Booking : ".$kodebooking." \n Cek di admin panel ya!");
            sendWa(normalize_phone($this->request->getPost('nohp')), "Terimakasih ".$this->request->getPost('pemesan')." pesanan anda sudah kami terima, \n Kode Booking Anda: *".$kodebooking."* \nAnda akan segera dihubungi oleh tim marketing");

            return $this->respondCreated([
                'status' => true,
                'messages' => 'Data pesanan berhasil disimpan.',
            ]);
        }catch(\Exception $e){
            return $this->respondCreated([
                'status' => false,
                'messages' => 'Terjadi kesalahan pada server: '.$e->getMessage(),
            ]);
        }
    
    }

    function cekavailable() {
        $tanggal = date("Y-m-d",strtotime($this->request->getVar('tanggal')));
        $sesi    = $this->request->getVar('sesi');

        // Ambil semua sesi yg terisi di tanggal itu
        $booked = model(Booking::class)
            ->select('sesi')
            ->where('DATE(tanggal)', $tanggal)
            ->findAll();

        $filled = array_column($booked, 'sesi'); // contoh: ['PAGI']


        // ❗ Jika sesi yang dipilih sudah terisi → langsung false
        if (in_array($sesi, $filled)) {
            return $this->respond([
                'status' => false,
                'messages' => 'Tanggal dan sesi tidak tersedia (sudah terisi).'
            ]);
        }


        // Tentukan sesi yang tidak boleh dipilih berdasarkan aturan
        $notAvailable = [];

        if (in_array('SIANG', $filled)) {
            // Jika SIANG terisi → PAGI & MALAM tidak boleh
            $notAvailable = ['PAGI', 'MALAM'];
        } else {
            // Jika PAGI atau MALAM terisi → SIANG tidak boleh
            if (in_array('PAGI', $filled) || in_array('MALAM', $filled)) {
                $notAvailable[] = 'SIANG';
            }
        }

        // Cek sesi yang diminta user
        if (in_array($sesi, $notAvailable)) {
            return $this->respond([
                'status' => false,
                'messages' => 'Tanggal dan sesi tidak tersedia.'
            ]);
        }

        return $this->respond([
            'status' => true,
            'messages' => 'Tanggal dan sesi tersedia.'
        ]);
        // Implementasi cek ketersediaan
    }

    function generateKode4Huruf() {
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $kode = '';

        for ($i = 0; $i < 4; $i++) {
            $kode .= $letters[rand(0, strlen($letters) - 1)];
        }

        return $kode;
    }

    function generateKodeBookingTanggal($prefix = 'SKK', $length = 3) {
        $date = date('Ym');
        $rand = str_pad(random_int(0, (int)str_repeat('9', $length)), $length, '0', STR_PAD_LEFT);
        return sprintf('%s%s%s', $prefix, $date, $rand);
    }

    function sendMessage($message_text) {
            $telegram_id = "-5054224363";
            $secret_token = "8300841272:AAH0LH_wqEWzTniRiIayOC1HhaiB4EyZLDY";

		    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=html&chat_id=" . $telegram_id;

		    $url = $url . "&text=" . urlencode($message_text);

		    $ch = curl_init();

		    $optArray = array(

		            CURLOPT_URL => $url,

		            CURLOPT_RETURNTRANSFER => true

		    );

		    curl_setopt_array($ch, $optArray);

		    $result = curl_exec($ch);

		    curl_close($ch);

		    return "true";



	}
}


