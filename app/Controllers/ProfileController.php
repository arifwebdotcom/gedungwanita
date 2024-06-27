<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModels;
use CodeIgniter\API\ResponseTrait;
use App\Models\SuplierPakan;
use App\Models\Doc;
use App\Models\Setting;

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
        $this->data['leafletharga'] =  model(Setting::class)->where('param','leafletharga')->first();
        return view('profile/index',$this->data);
    }

    public function update() {
       
        $ktp ="";
        if($this->request->getVar('avatar_remove')){
            $file_name = $this->request->getVar('avatar_remove');
            $file_path = './uploads/leafletharga/' . $file_name; 
            
            
            if (file_exists($file_path)) {
                unlink($file_path);
            } 
        }        
        $file = $this->request->getFile('avatar');
            
        // Check if the file has been uploaded without errors
        if ($file && $file->isValid() && ! $file->hasMoved()) {
        

            $upload_path = './uploads/leafletharga/';
            $extension = $file->getExtension();
            $ktp = "leafletharga_".date("YmdHis").".".$extension;
            
            $file->move($upload_path, $ktp);
        
        } 

        $request['value'] = $ktp;
        $request['id'] = 1;
        model(Setting::class)->save($request);

        return redirect()->to(site_url('/'));
    }

}