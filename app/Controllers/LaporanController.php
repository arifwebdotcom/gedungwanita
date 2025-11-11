<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori;
use App\Models\Kelas;
use App\Models\Transaksi;
use App\Models\Pendaftaran;
use App\Models\JadwalPendaftaran;
use CodeIgniter\API\ResponseTrait;

class LaporanController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $kategori = $this->request->getVar('kategori');
        $keywords = $this->request->getVar('keywords');
        $kelas = $this->request->getVar('kelas');
        $numrows = $this->request->getVar('numrows');
        $data = model(JadwalPendaftaran::class)->getDaftarTransaksi($kategori,$kelas, $numrows, $keywords);

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

    public function datatablepembayaran() {
        $kategori = $this->request->getVar('kategori');
        $kelas = $this->request->getVar('kelas');
        $numrows = $this->request->getVar('numrows');
        $data = model(Pendaftaran::class)->getDaftarTransaksiPembayaran($kategori,$kelas, $numrows);

        return json_encode(compact('data'));
    }    

    public function pembayaran()
    {
        $this->data['laporan'] = model(JadwalPendaftaran::class)->findAll();
        $this->data['kategori'] = model(Kategori::class)->findAll();
        $this->data['kelas'] = model(Kelas::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/laporan/pembayaran',$this->data);
    }

    public function datatablekelas() {
        $kategori = $this->request->getVar('kategori');
        $kelas = $this->request->getVar('kelas');
        $bulan = $this->request->getVar('bulan');
        $data = model(JadwalPendaftaran::class)->getDaftarTransaksiKelas($kategori,$kelas,$bulan);

        return json_encode(compact('data'));
    }    

    public function kelas()
    {
        $this->data['laporan'] = model(JadwalPendaftaran::class)->findAll();
        $this->data['kategori'] = model(Kategori::class)->findAll();
        $this->data['kelas'] = model(Kelas::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/laporan/kelas',$this->data);
    }

    public function datatablevendor() {
        $status = $this->request->getVar('status');
        $bulan = $this->request->getVar('bulan');
        $data = model(JadwalPendaftaran::class)->getDaftarTransaksiVendor($status,$bulan);

        return json_encode(compact('data'));
    }    
    
    public function datatablebiayaadmin() {
        $status = $this->request->getVar('status');
        $bulan = $this->request->getVar('bulan');
        $data = model(JadwalPendaftaran::class)->getDaftarTransaksiBiayaAdmin($status,$bulan);

        return json_encode(compact('data'));
    }    

    public function vendor()
    {
        $this->data['laporan'] = model(JadwalPendaftaran::class)->findAll();
        $this->data['kategori'] = model(Kategori::class)->findAll();
        $this->data['kelas'] = model(Kelas::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/laporan/vendor',$this->data);
    }
    
    
    public function biayaadmin()
    {
        $this->data['laporan'] = model(JadwalPendaftaran::class)->findAll();
        $this->data['kategori'] = model(Kategori::class)->findAll();
        $this->data['kelas'] = model(Kelas::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/laporan/biayaadmin',$this->data);
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

    public function updatepembayaran($id) {       
        
        $request['jumlahbayar'] = $this->request->getPost('jumlahbayar');
        $request['status'] = $this->request->getPost('status');
        $request['tglbayar'] = $this->request->getPost('tglbayar');
        $request['id'] = $id;
        model(Pendaftaran::class)->save($request);

        $namaanak = $this->request->getPost('namaanak');

        $requesttransaksi['jumlah'] = $this->request->getPost('jumlahbayar');
        $requesttransaksi['transaksi'] = "Pembayaran atas nama ".$namaanak;
        $requesttransaksi['userfk'] = user()->id;
        $requesttransaksi['jenis'] = "D";
        $requesttransaksi['pendaftaranfk'] = $id;
        model(Transaksi::class)->save($requesttransaksi);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data laporan berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Pendaftaran::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data laporan berhasil diubah.',
        ]);
    }
}
