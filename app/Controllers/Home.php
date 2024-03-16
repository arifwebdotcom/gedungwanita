<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index(): string
    {        
        $this->data['suplierpakan'] =  $this->dataglobal;
        //return view('layouts/app');
        //return view('dashboard/dashboard',$data);
        return view('dashboard/dashboard',$this->data);
    }
}
