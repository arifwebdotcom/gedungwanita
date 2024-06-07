<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisPakan;
use CodeIgniter\API\ResponseTrait;

class JenisPakanController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(JenisPakan::class)->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $this->data['jenispakan'] = model(JenisPakan::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/jenispakan/index',$this->data);
    }

    public function store() {
        // $setRules = [            
        //     'jenispakan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom jenispakan wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['jenispakan'] = $this->request->getPost('jenispakan');
        model(JenisPakan::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data jenispakan berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'jenispakan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom jenispakan wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['jenispakan'] = $this->request->getPost('jenispakan');
        $request['id'] = $id;
        model(JenisPakan::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data jenispakan berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(JenisPakan::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data jenispakan berhasil diubah.',
        ]);
    }
}
