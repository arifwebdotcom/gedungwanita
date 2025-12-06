<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Paket;
use App\Models\Faq;
use App\Models\Client;
use App\Models\Booking;
use CodeIgniter\API\ResponseTrait;

class IndexController extends BaseController
{

    use ResponseTrait;

    public function index(): string
    {               
        $this->data['faq'] = model(Faq::class)->orderBy('prioritas','asc')->findAll();
        return view('index',$this->data);
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


