<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kelas;
use CodeIgniter\API\ResponseTrait;

class KelasController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Kelas::class)->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $this->data['kelas'] = model(Kelas::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/kelas/index',$this->data);
    }

    public function store() {
        // $setRules = [            
        //     'kelas' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom kelas wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['kelas'] = $this->request->getPost('kelas');
        $request['keterangan'] = $this->request->getPost('keterangan');
        $request['untukvendor'] = $this->request->getPost('untukvendor');
        $request['untukfunfit'] = $this->request->getPost('untukfunfit');
        model(Kelas::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data kelas berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'kelas' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom kelas wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['kelas'] = $this->request->getPost('kelas');
        $request['keterangan'] = $this->request->getPost('keterangan');
        $request['untukvendor'] = $this->request->getPost('untukvendor');
        $request['untukfunfit'] = $this->request->getPost('untukfunfit');
        $request['id'] = $id;
        model(Kelas::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data kelas berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Kelas::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data kelas berhasil diubah.',
        ]);
    }
}
