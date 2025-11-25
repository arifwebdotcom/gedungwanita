<?php

namespace App\Controllers;

class IndexController extends BaseController
{

    //use ResponseTrait;

    public function index(): string
    {               
        $this->data['asd'] = "-";
        return view('index',$this->data);
    }
}
