<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Asosiasi;
use CodeIgniter\API\ResponseTrait;

class AsosiasiController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Asosiasi::class)->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $data['asosiasi'] = model(Asosiasi::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/asosiasi/index',$data);
    }

    public function store() {
        // $setRules = [            
        //     'asosiasi' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom asosiasi wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['asosiasi'] = $this->request->getPost('asosiasi');
        $request['ketua'] = $this->request->getPost('ketua');
        $request['alamat'] = $this->request->getPost('alamat');
        $request['nohp'] = $this->request->getPost('nohp');
        model(Asosiasi::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data asosiasi berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'asosiasi' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom asosiasi wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['asosiasi'] = $this->request->getPost('asosiasi');
        $request['ketua'] = $this->request->getPost('ketua');
        $request['alamat'] = $this->request->getPost('alamat');
        $request['nohp'] = $this->request->getPost('nohp');
        $request['id'] = $id;
        model(Asosiasi::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data asosiasi berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Asosiasi::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data asosiasi berhasil diubah.',
        ]);
    }
}
