<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Agama;
use CodeIgniter\API\ResponseTrait;

class AgamaController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Agama::class)->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $data['agama'] = model(Agama::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/agama/index',$data);
    }

    public function store() {
        // $setRules = [            
        //     'agama' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom agama wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['agama'] = $this->request->getPost('agama');
        $request['reportdisplay'] = $this->request->getPost('agama');
        model(Agama::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data agama berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'agama' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom agama wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['agama'] = $this->request->getPost('agama');
        $request['id'] = $id;
        model(Agama::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data agama berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Agama::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data agama berhasil diubah.',
        ]);
    }
}
