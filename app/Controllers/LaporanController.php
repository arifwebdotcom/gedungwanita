<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Invoice;
use CodeIgniter\API\ResponseTrait;

class LaporanController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $kodeanggota = $this->request->getVar('kodeanggota');
        $namaanggota = $this->request->getVar('namaanggota');
        $namapeternakan = $this->request->getVar('namapeternakan');
        $tahun = $this->request->getVar('tahun');
        $numrows = $this->request->getVar('numrows');
        $data = model(Invoice::class)->getSetoranPerAnggota($kodeanggota,$namaanggota,$namapeternakan, $tahun, $numrows);
    
        return json_encode(compact('data'));
    }

    public function terbesar()
    {
        $this->data['tahun'] = model(Invoice::class)->get_tahuninvoice();
        return view('laporan/terbesar',$this->data);
    }

}