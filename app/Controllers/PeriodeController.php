<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Periode;
use CodeIgniter\API\ResponseTrait;

class PeriodeController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Periode::class)->findAll();

        return json_encode(compact('data')); 
    }

    public function index()
    {
        $data['periode'] = model(Periode::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/periode/index',$data);
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

        $request['periode'] = $this->request->getPost('periode');
        $request['reportdisplay'] = $this->request->getPost('periode');
        model(Periode::class)->insert($request);

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
        $request['id'] = $id;
        model(Periode::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data periode berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Periode::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data periode berhasil diubah.',
        ]);
    }
}
