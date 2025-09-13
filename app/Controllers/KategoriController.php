<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori;
use CodeIgniter\API\ResponseTrait;

class KategoriController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Kategori::class)->findAll();

        return json_encode(compact('data')); 
    }

    public function index()
    {
        $this->data['kategori'] = model(Kategori::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/kategori/index',$this->data);
    }

    public function store() {
        $request['kategori'] = $this->request->getPost('kategori');
        $request['reportdisplay'] = $this->request->getPost('kategori');
        model(Kategori::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data kategori berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        $request['kategori'] = $this->request->getPost('kategori');
        $request['id'] = $id;
        model(Kategori::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data kategori berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Kategori::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data kategori berhasil diubah.',
        ]);
    }
}
