<?php

namespace App\Cells;

use App\Models\SuplierPakan;
use App\Models\Asosiasi;
use App\Models\Doc;
use App\Models\Alamat;
use CodeIgniter\View\Cells\Cell;

class ModalAddCell
{
    public function getDataModal()
    {       
        $suplierpakan = model(SuplierPakan::class)->findAll();
        $asosiasi = model(Asosiasi::class)->findAll();
        $doc = model(Doc::class)->findAll();
        $alamat = model(Alamat::class)->select("*")->where("usersfk",user()->id)->get()->getRow();


        return view('cells/modal', compact('suplierpakan','doc','alamat','asosiasi'));
    }
}
