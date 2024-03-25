<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengajuan;
use CodeIgniter\API\ResponseTrait;

class PengajuanController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Pengajuan::class)->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $data['pengajuan'] = model(Pengajuan::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('pengajuan/index',$data);
    }

    public function store() {
        // $setRules = [            
        //     'pengajuan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom pengajuan wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['pengajuan'] = $this->request->getPost('pengajuan');
        $request['reportdisplay'] = $this->request->getPost('pengajuan');
        model(Pengajuan::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data pengajuan berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'pengajuan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom pengajuan wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['pengajuan'] = $this->request->getPost('pengajuan');
        $request['id'] = $id;
        model(Pengajuan::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data pengajuan berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Pengajuan::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data pengajuan berhasil diubah.',
        ]);
    }
}
