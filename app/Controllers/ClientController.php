<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Client;
use CodeIgniter\API\ResponseTrait;

class ClientController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Client::class)->findAll();

        return json_encode(compact('data')); 
    }

    public function index()
    {
        $this->data['client'] = model(Client::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/client/index',$this->data);
    }

    public function store() {
        $request['namaclient'] = $this->request->getPost('namaclient');
        $request['usiaawal'] = $this->request->getPost('usiaawal');
        $request['usiaakhir'] = $this->request->getPost('usiaakhir');
        $request['durasi'] = $this->request->getPost('durasi');
        $request['kapasitas'] = $this->request->getPost('kapasitas');
        $request['tipe'] = $this->request->getPost('tipe');
        $request['color'] = $this->request->getPost('warna');
        model(Client::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data client berhasil ditambahkan.',
        ]);
    }

    public function update($id) {        
        $request['namaclient'] = $this->request->getPost('namaclient');
        $request['usiaawal'] = $this->request->getPost('usiaawal');
        $request['usiaakhir'] = $this->request->getPost('usiaakhir');
        $request['durasi'] = $this->request->getPost('durasi');
        $request['kapasitas'] = $this->request->getPost('kapasitas');
        $request['tipe'] = $this->request->getPost('tipe');
        $request['color'] = $this->request->getPost('warna');
        $request['id'] = $id;
        model(Client::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data client berhasil diubah.',
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
