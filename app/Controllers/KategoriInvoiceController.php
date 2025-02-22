<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriInvoice;
use CodeIgniter\API\ResponseTrait;

class KategoriInvoiceController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(KategoriInvoice::class)->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $this->data['kategoriinvoice'] = model(KategoriInvoice::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/kategoriinvoice/index',$this->data);
    }

    public function store() {    

        $request['kategoriinvoice'] = $this->request->getPost('kategoriinvoice');
        model(KategoriInvoice::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data kategoriinvoice berhasil ditambahkan.',
        ]);
    }

    public function update($id) {

        $request['kategoriinvoice'] = $this->request->getPost('kategoriinvoice');
        $request['id'] = $id;
        model(KategoriInvoice::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data kategoriinvoice berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(KategoriInvoice::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data kategoriinvoice berhasil diubah.',
        ]);
    }
}
