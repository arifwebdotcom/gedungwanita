<?php

namespace App\Controllers;
use App\Models\Paket;
use App\Models\Client;
use App\Models\Booking;

class IndexController extends BaseController
{

    //use ResponseTrait;

    public function index(): string
    {               
        $this->data['asd'] = "-";
        return view('index',$this->data);
    }

    public function booking(): string
    {               
        $this->data['paket'] = model(Paket::class)->findAll();
        return view('booking',$this->data);
    }

    public function bookingStore(){
        //client
        $request['pemesan'] = $this->request->getPost('pemesan');        
        $request['alamat'] = $this->request->getPost('alamat');
        $request['email'] = $this->request->getPost('email');
        $request['cpp'] = $this->request->getPost('cpp');
        $request['cpw'] = $this->request->getPost('cpw');
        $request['nohpsaudara'] = $this->request->getPost('nohp');
        $clientModel = model(Client::class);
        $clientModel->insert($request);
        $clientfk = $clientModel->getInsertID();

        //booking
        $request['tipefk'] = $this->request->getPost('tipefk');
        $request['clientfk'] = $clientfk;
        $request['paketfk'] = $this->request->getPost('paketfk');
        $request['tanggal'] = date("Y-m-d", strtotime($this->request->getPost('tanggal')));
        $request['sesi'] = $this->request->getPost('sesi');
        $request['keterangan'] = $this->request->getPost('keterangan');
        $request['status'] = "KEEP";
        model(Booking::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data pesanan berhasil disimpan.',
        ]);
    }
}


