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
        $this->data['agama'] = model(Agama::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/agama/index',$this->data);
    }

    public function store() {
        $request['agama'] = $this->request->getPost('agama');
        $request['reportdisplay'] = $this->request->getPost('agama');
        model(Agama::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data agama berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
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
