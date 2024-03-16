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
        $data['suplierpakan'] = model(SuplierPakan::class)->findAll();
        $data['doc'] = model(Doc::class)->findAll();
        //model(Ruangan::class)->join('kunjunganpasien_t', 'kunjunganpasien_t.ruanganfk = ruangan_m.id')->select(['ruangan_m.*'])->where('kunjunganpasien_t.id', $id)->findAll();
        $data['profile'] = model(UserModels::class)->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id')->join('asosiasi_m','users.asosiasifk = asosiasi_m.id')->join('alamat_m','alamat_m.usersfk = users.id')->where('users.id', user_id())->first();

        return view('profile/index',$data);
    }

}