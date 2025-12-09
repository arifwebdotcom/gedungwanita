<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModels;
use CodeIgniter\API\ResponseTrait;
use App\Models\Setting;
use Myth\Auth\Password;

class ProfileController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
       
        //model(Ruangan::class)->join('kunjunganpasien_t', 'kunjunganpasien_t.ruanganfk = ruangan_m.id')->select(['ruangan_m.*'])->where('kunjunganpasien_t.id', $id)->findAll();
        $this->data['profile'] = model(UserModels::class)->select('users.*')->where('users.id', user_id())->first();      
        $this->data['apikey'] = model(Setting::class)->select('value')->where('param', "apikey")->first()->value;      
        $this->data['numberkey'] = model(Setting::class)->select('value')->where('param', "numberkey")->first()->value;      
        $this->data['telegramid'] = model(Setting::class)->select('value')->where('param', "telegramid")->first()->value;      
        $this->data['screettoken'] = model(Setting::class)->select('value')->where('param', "screettoken")->first()->value;      
        $this->data['whatsappaktif'] = model(Setting::class)->select('value')->where('param', "whatsappaktif")->first()->value;      
        $this->data['telegramaktif'] = model(Setting::class)->select('value')->where('param', "telegramaktif")->first()->value;      
        $this->data['emailaktif'] = model(Setting::class)->select('value')->where('param', "emailaktif")->first()->value;      
        return view('profile/index',$this->data);
    }

    public function ubahpassword ()
    {
        $this->data['profile'] = model(UserModels::class)->select('users.*')->where('users.id', user_id())->first();      
        return view('profile/ubahpassword',$this->data);
    }

    public function updateprofil()
    {
        $userId = user_id();
        $data = [
            'email'         => $this->request->getPost('email'),
            'username'      => $this->request->getPost('username'),
            'password_hash' => Password::hash($this->request->getPost('password'))
        ];

        model(UserModels::class)->update($userId, $data);
        return redirect()->to(site_url('profile/ubahpassword'));
    }

    public function update() {
        $whatsappaktif = $this->request->getPost('whatsappaktif')? 'on' : 'off';        
        $telegramaktif = $this->request->getPost('telegramaktif')? 'on' : 'off';        
        $emailaktif = $this->request->getPost('emailaktif') ? 'on' : 'off';     
        $settings = [
            'whatsappaktif' => $whatsappaktif,
            'telegramaktif' => $telegramaktif,
            'emailaktif'    => $emailaktif,
            'apikey'        => $this->request->getPost('apikey'),
            'numberkey'     => $this->request->getPost('numberkey'),
            'telegramid'    => $this->request->getPost('telegramid'),
            'screettoken'   => $this->request->getPost('screettoken'),
        ];

        $settingModel = model(Setting::class);

        foreach ($settings as $param => $value) {
            $settingModel->where('param', $param)
                        ->set(['value' => $value])
                        ->update();
        }

        return redirect()->to(site_url('profile/'));
    }

}