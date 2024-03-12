<?php

namespace App\Cells;

use App\Models\PermissionModel;
use CodeIgniter\View\Cells\Cell;

class SubNavCell
{
    public function setMenuBarModul()
    {
        $menu = model(PermissionModel::class)->findAll();

        return view('cells/sub_nav_cell', compact('menu'));
    }
}
