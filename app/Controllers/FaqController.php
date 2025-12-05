<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Faq;
use CodeIgniter\API\ResponseTrait;

class FaqController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Faq::class)->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $this->data['faq'] = model(Faq::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/faq/index',$this->data);
    }

    public function store() {
        // $setRules = [            
        //     'faq' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom faq wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['pertanyaan'] = $this->request->getPost('pertanyaan');
        $request['jawaban'] = $this->request->getPost('jawaban');
        $request['prioritas'] = $this->request->getPost('prioritas');
        model(Faq::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data faq berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'faq' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom faq wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['pertanyaan'] = $this->request->getPost('pertanyaan');
        $request['jawaban'] = $this->request->getPost('jawaban');
        $request['prioritas'] = $this->request->getPost('prioritas');
        $request['id'] = $id;
        model(Faq::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data faq berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Faq::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data faq berhasil diubah.',
        ]);
    }
}
