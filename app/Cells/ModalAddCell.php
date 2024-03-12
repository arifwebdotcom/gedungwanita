<?php

namespace App\Cells;

use App\Models\SuplierPakan;
use App\Models\Doc;
use CodeIgniter\View\Cells\Cell;

class ModalAddCell
{
    public function getDataModal()
    {       
        $suplierpakan = model(SuplierPakan::class)->findAll();
        $doc = model(Doc::class)->findAll();

        return view('cells/modal', compact('suplierpakan','doc'));
    }
}
