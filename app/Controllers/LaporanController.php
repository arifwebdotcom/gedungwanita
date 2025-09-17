<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori;
use App\Models\Kelas;
use App\Models\JadwalPendaftaran;
use CodeIgniter\API\ResponseTrait;

class LaporanController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $kategori = $this->request->getVar('kategori');
        $kelas = $this->request->getVar('kelas');
        $numrows = $this->request->getVar('numrows');
        $data = model(JadwalPendaftaran::class)->getDaftarTransaksi($kategori,$kelas, $numrows);

        return json_encode(compact('data'));
    }    

    public function index()
    {
        $this->data['laporan'] = model(JadwalPendaftaran::class)->findAll();
        $this->data['kategori'] = model(Kategori::class)->findAll();
        $this->data['kelas'] = model(Kelas::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/laporan/index',$this->data);
    }

    public function store() {
        // $setRules = [            
        //     'laporan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom laporan wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['laporan'] = $this->request->getPost('laporan');
        model(JadwalPendaftaran::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data laporan berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'laporan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom laporan wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }
        
        $request['laporan'] = $this->request->getPost('laporan');
        $request['id'] = $id;
        model(JadwalPendaftaran::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data laporan berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(JadwalPendaftaran::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data laporan berhasil diubah.',
        ]);
    }
}
