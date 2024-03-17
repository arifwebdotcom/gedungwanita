<?php

namespace App\Controllers;
use App\Models\Announcement;

class Home extends BaseController
{

    public function index(): string
    {        
        $this->data['suplierpakan'] =  $this->dataglobal;
        $this->data['notification'] =  model(Announcement::class)->findAll();
        //return view('layouts/app');
        //return view('dashboard/dashboard',$data);
        return view('dashboard/dashboard',$this->data);
    }
}
