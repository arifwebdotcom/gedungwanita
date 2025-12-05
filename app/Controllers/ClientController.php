<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Paket;   
use App\Models\Client;
use App\Models\Tipe;
use App\Models\Booking;
use App\Models\BookingTransaksi;
use CodeIgniter\API\ResponseTrait;

class ClientController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Client::class)->select("client_m.*,booking_t.tanggal,booking_t.sesi,booking_t.status,
        booking_t.keterangan,booking_t.paketfk, paket_m.paket,booking_t.id as bookingid")
        ->join('booking_t', 'client_m.id = booking_t.clientfk','left')
        ->join('paket_m', 'booking_t.paketfk = paket_m.id','left')
            ->findAll();

        return json_encode(compact('data')); 
    }

    public function show($id) {
        $this->data['client'] = model(Client::class)
        ->select('client_m.*, booking_t.tanggal, booking_t.sesi, booking_t.status, booking_t.keterangan, booking_t.paketfk, paket_m.paket,
        booking_t.hargaasli, booking_t.hargadeal, booking_t.kursi,booking_t.id as bookingid')
        ->where('booking_t.id', $id)
        ->join('booking_t','booking_t.clientfk = client_m.id')
        ->join('paket_m', 'booking_t.paketfk = paket_m.id','left')
        ->first();
        $this->data['paket'] = model(Paket::class)->findAll();
        $this->data['tipe'] = model(Tipe::class)->findAll();
        $this->data['transaksi'] = model(BookingTransaksi::class)->where('bookingfk', $id)->findAll();

        return view('master/client/show', $this->data);
    }

    public function index()
    {
        $this->data['client'] = model(Client::class)->findAll();
        $this->data['paket'] = model(Paket::class)->findAll();
        $this->data['tipe'] = model(Tipe::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/client/index',$this->data);
    }

    public function store() {
        $request['pemesan'] = $this->request->getPost('pemesan');
        $request['email'] = $this->request->getPost('email');
        $request['alamat'] = $this->request->getPost('alamat');
        $request['nohp'] = $this->request->getPost('nohp');
        $request['cpp'] = $this->request->getPost('cpp');
        $request['igcpp'] = $this->request->getPost('igcpp');
        $request['cpw'] = $this->request->getPost('cpw');
        $request['igcpw'] = $this->request->getPost('igcpw');
        $request['nohpsaudara'] = $this->request->getPost('nohpsaudara');
        $clientfk = model(Client::class)->insert($request);

        $kodebooking = $this->generateKodeBookingTanggal();

        $transaksi['tipefk'] = $this->request->getPost('tipefk');
        $transaksi['clientfk'] = $clientfk;
        $transaksi['paketfk'] = $this->request->getPost('paket');
        $transaksi['tanggal'] = date("Y-m-d",strtotime($this->request->getPost('tanggal')));
        $transaksi['sesi'] = $this->request->getPost('sesi');
        $transaksi['keterangan'] = $this->request->getPost('keterangan');
        $transaksi['kursi'] = $this->request->getPost('kursi');
        $transaksi['hargaasli'] = $this->request->getPost('hargaasli');
        $transaksi['hargadeal'] = $this->request->getPost('hargadeal');
        $transaksi['status'] = "KEEP";
        $transaksi['kodebooking'] = $kodebooking;
        model(Booking::class)->insert($transaksi);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data client berhasil ditambahkan.',
        ]);
    }

    function generateKodeBookingTanggal($prefix = 'SKK', $length = 3) {
        $date = date('Ym');
        $rand = str_pad(random_int(0, (int)str_repeat('9', $length)), $length, '0', STR_PAD_LEFT);
        return sprintf('%s%s%s', $prefix, $date, $rand);
    }

    public function update($id) {        
        $request['pemesan'] = $this->request->getPost('pemesan');
        $request['email'] = $this->request->getPost('email');
        $request['alamat'] = $this->request->getPost('alamat');
        $request['nohp'] = $this->request->getPost('nohp');
        $request['cpp'] = $this->request->getPost('cpp');
        $request['igcpp'] = $this->request->getPost('igcpp');
        $request['cpw'] = $this->request->getPost('cpw');
        $request['igcpw'] = $this->request->getPost('igcpw');
        $request['nohpsaudara'] = $this->request->getPost('nohpsaudara');
        $request['tanggal'] = date("Y-m-d",strtotime($this->request->getPost('tanggal')));
        $request['sesi'] = $this->request->getPost('sesi');
        $request['status'] = $this->request->getPost('status');
        $request['paket'] = $this->request->getPost('paket');
        $request['detail'] = $this->request->getPost('detail');
        $request['hargaasli'] = $this->request->getPost('hargaasli');
        $request['hargadeal'] = $this->request->getPost('hargadeal');
        $request['id'] = $id;
        model(Client::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data client berhasil diubah.',
        ]);
    }

    public function addCicilan() {
        $request['pj'] = $this->request->getPost('pj');
        $request['bookingfk'] = $this->request->getPost('bookingfk');
        $request['tglbayar'] = $this->request->getPost('tanggalbayar');
        $request['status'] = $this->request->getPost('status');
        $request['nominal'] = $this->request->getPost('nominal');
        $request['keterangan'] = $this->request->getPost('keterangan');
        model(BookingTransaksi::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data Cicilan berhasil ditambahkan.',
        ]);
    }

    public function delete($id)
    {
        model(Client::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data client berhasil diubah.',
        ]);
    }
}
