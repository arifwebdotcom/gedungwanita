<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index(): string
    {        
        $this->data['suplierpakan'] =  $this->dataglobal;
        return view('layouts/app',$this->data);
    }
}
