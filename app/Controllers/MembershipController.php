<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Membership;
use CodeIgniter\API\ResponseTrait;

class MembershipController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Membership::class)->findAll();

        return json_encode(compact('data')); 
    }

    public function index()
    {
        $this->data['periode'] = model(Membership::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/periode/index',$this->data);
    }

    public function store() {
        // $setRules = [            
        //     'periode' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom periode wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['nama'] = $this->request->getPost('nama');
        $request['periode'] = $this->request->getPost('periode');
        $request['status'] = $this->request->getPost('status');
        $request['hargasekilo'] = $this->request->getPost('hargasekilo');
        $request['expired'] = date("Y-m-d",strtotime($this->request->getPost('expired')));
        model(Membership::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data periode berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'periode' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom periode wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['periode'] = $this->request->getPost('periode');
        $request['status'] = $this->request->getPost('status');
        $request['hargasekilo'] = $this->request->getPost('hargasekilo');
        $request['nama'] = $this->request->getPost('nama');
        $request['expired'] = $this->request->getPost('expired');
        $request['id'] = $id;
        model(Membership::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data periode berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Membership::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data periode berhasil diubah.',
        ]);
    }
}
