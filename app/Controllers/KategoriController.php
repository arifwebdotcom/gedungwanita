<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori;
use App\Models\Kelas;
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
        $this->data['kelas'] = model(Kelas::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/kategori/index',$this->data);
    }

    public function store() {
        $request['namakategori'] = $this->request->getPost('namakategori');
        $request['usiaawal'] = $this->request->getPost('usiaawal');
        $request['usiaakhir'] = $this->request->getPost('usiaakhir');
        $request['durasi'] = $this->request->getPost('durasi');
        $request['kapasitas'] = $this->request->getPost('kapasitas');
        $request['tipe'] = $this->request->getPost('tipe');
        $request['color'] = $this->request->getPost('warna');
        model(Kategori::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data kategori berhasil ditambahkan.',
        ]);
    }

    public function update($id) {        
        $request['namakategori'] = $this->request->getPost('namakategori');
        $request['usiaawal'] = $this->request->getPost('usiaawal');
        $request['usiaakhir'] = $this->request->getPost('usiaakhir');
        $request['durasi'] = $this->request->getPost('durasi');
        $request['kapasitas'] = $this->request->getPost('kapasitas');
        $request['tipe'] = $this->request->getPost('tipe');
        $request['color'] = $this->request->getPost('warna');
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
