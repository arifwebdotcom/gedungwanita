<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class ContentHeaderCell
{
    public function breadcrumb($breadcrumb_items)
    {
        return view('cells/content_header_cell', compact('breadcrumb_items'));
    }
}
