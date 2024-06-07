<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuplierPakan;
use CodeIgniter\API\ResponseTrait;

class SuplierPakanController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(SuplierPakan::class)->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $this->data['suplier'] = model(SuplierPakan::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/suplier/index',$this->data);
    }

    public function store() {
        // $setRules = [            
        //     'suplier' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom suplier wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['nama'] = $this->request->getPost('suplierpakan');
        $request['alamat'] = $this->request->getPost('alamat');
        $request['nohp'] = $this->request->getPost('nohp');
        model(SuplierPakan::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data suplier berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'suplier' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom suplier wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }
        
        $request['nama'] = $this->request->getPost('suplierpakan');
        $request['alamat'] = $this->request->getPost('alamat');
        $request['nohp'] = $this->request->getPost('nohp');
        $request['id'] = $id;
        model(SuplierPakan::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data suplier berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(SuplierPakan::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data suplier berhasil diubah.',
        ]);
    }
}
