<?php

namespace App\Controllers;
use App\Models\Announcement;
use App\Models\Setting;
use App\Models\Invoice;

class Home extends BaseController
{

    public function index(): string
    {        
        
        $this->data['username'] =  user()->username;
        
        //return view('layouts/app');
        //return view('dashboard/dashboard',$data);
        return view('dashboard/dashboard',$this->data);
    }
}
