<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Agama;
use CodeIgniter\API\ResponseTrait;

class DashboardController extends BaseController
{
    use ResponseTrait;

    public function index(){
        $data['userData'] = $this->userData;
        //return view('layouts/app');
        return view('dashboard/dashboard');
    }

}