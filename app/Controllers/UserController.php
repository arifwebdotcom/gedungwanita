<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModels;
use CodeIgniter\API\ResponseTrait;

class UserController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(UserModels::class)->join('alamat_m','alamat_m.usersfk = users.id')->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id')->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $data['user'] = model(UserModels::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/user/index',$data);
    }

    public function store() {
        // $setRules = [            
        //     'user' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom user wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['user'] = $this->request->getPost('user');
        $request['reportdisplay'] = $this->request->getPost('user');
        model(UserModels::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data user berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'user' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom user wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['user'] = $this->request->getPost('user');
        $request['id'] = $id;
        model(UserModels::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data user berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(UserModels::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data user berhasil diubah.',
        ]);
    }
}
