<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Shu;
use CodeIgniter\API\ResponseTrait;

class ShuController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Shu::class)->findAll();

        return json_encode(compact('data')); 
    }

    public function index()
    {
        $this->data['shu'] = model(Shu::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/shu/index',$this->data);
    }

    public function store() {
        // $setRules = [            
        //     'shu' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom shu wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['nama'] = $this->request->getPost('nama');
        $request['shu'] = $this->request->getPost('shu');
        $request['status'] = $this->request->getPost('status');
        $request['hargasekilo'] = $this->request->getPost('hargasekilo');
        $request['expired'] = date("Y-m-d",strtotime($this->request->getPost('expired')));
        model(Shu::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data shu berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'shu' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom shu wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['shu'] = $this->request->getPost('shu');
        $request['status'] = $this->request->getPost('status');
        $request['hargasekilo'] = $this->request->getPost('hargasekilo');
        $request['nama'] = $this->request->getPost('nama');
        $request['expired'] = $this->request->getPost('expired');
        $request['id'] = $id;
        model(Shu::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data shu berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Shu::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data shu berhasil diubah.',
        ]);
    }
}
