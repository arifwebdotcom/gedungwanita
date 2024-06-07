<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModels;
use CodeIgniter\API\ResponseTrait;
use App\Models\SuplierPakan;
use App\Models\Doc;

class ProfileController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $this->data['suplierpakan'] = model(SuplierPakan::class)->findAll();
        $this->data['doc'] = model(Doc::class)->findAll();
        //model(Ruangan::class)->join('kunjunganpasien_t', 'kunjunganpasien_t.ruanganfk = ruangan_m.id')->select(['ruangan_m.*'])->where('kunjunganpasien_t.id', $id)->findAll();
        $this->data['profile'] = model(UserModels::class)->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id','left')->join('asosiasi_m','users.asosiasifk = asosiasi_m.id','left')->join('alamat_m','alamat_m.usersfk = users.id','left')->where('users.id', user_id())->first();
        //dd($data['profile']);
        return view('profile/index',$this->data);
    }

}