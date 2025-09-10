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
        // $setRules = [            
        //     'kategori' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom kategori wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['kelas'] = $this->request->getPost('kelas');
        $request['keterangan'] = $this->request->getPost('keterangan');
        model(Kategori::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data kategori berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'kategori' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom kategori wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['kelas'] = $this->request->getPost('kelas');
        $request['keterangan'] = $this->request->getPost('keterangan');
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
