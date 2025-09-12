<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Paket;
use CodeIgniter\API\ResponseTrait;

class PaketController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Paket::class)->findAll();

        return json_encode(compact('data')); 
    }

    public function index()
    {
        $this->data['paket'] = model(Paket::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/paket/index',$this->data);
    }

    public function store() {
        $request['paket'] = $this->request->getPost('paket');
        $request['reportdisplay'] = $this->request->getPost('paket');
        model(Paket::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data paket berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        $request['paket'] = $this->request->getPost('paket');
        $request['id'] = $id;
        model(Paket::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data paket berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Paket::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data paket berhasil diubah.',
        ]);
    }
}
