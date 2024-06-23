<?php

namespace App\Controllers;
use App\Models\Announcement;
use App\Models\Setting;

class Home extends BaseController
{

    public function index(): string
    {        
        $this->data['suplierpakan'] =  $this->suplier;
        $this->data['asosiasi'] =  $this->asosiasi;
        $this->data['notification'] =  model(Announcement::class)->findAll();
        $this->data['leafletharga'] =  model(Setting::class)->where('param','leafletharga')->first();
        //return view('layouts/app');
        //return view('dashboard/dashboard',$data);
        return view('dashboard/dashboard',$this->data);
    }
}
