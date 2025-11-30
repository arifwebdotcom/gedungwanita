<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Paket;
use App\Models\Tipe;
use CodeIgniter\API\ResponseTrait;

class PaketController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Paket::class)->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $this->data['paket'] = model(Paket::class)->findAll();
        $this->data['tipe'] = model(Tipe::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/paket/index',$this->data);
    }

    public function store() {
        // $setRules = [            
        //     'paket' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom paket wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['paket'] = $this->request->getPost('paket');
        $request['tipefk'] = $this->request->getPost('tipe');
        $request['harga'] = $this->request->getPost('harga');
        $request['fasilitas'] = $this->request->getPost('fasilitas');
        $request['catatan'] = $this->request->getPost('catatan');
        $request['syarat'] = $this->request->getPost('syarat');
        $request['file'] = $this->request->getPost('file');
        model(Paket::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data paket berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'paket' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom paket wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['paket'] = $this->request->getPost('paket');
        $request['tipefk'] = $this->request->getPost('tipe');
        $request['harga'] = $this->request->getPost('harga');
        $request['fasilitas'] = $this->request->getPost('fasilitas');
        $request['catatan'] = $this->request->getPost('catatan');
        $request['syarat'] = $this->request->getPost('syarat');
        $request['file'] = $this->request->getPost('file');
        $request['updated_at'] = date("Y-m-d H:i:s");
        $request['id'] = $id;
        model(Paket::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data paket berhasil diubah.',
        ]);
    }

    public function getPaketById($id)
    {
        $Qpaket = model(Paket::class)->where('id', $id)->first();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data paket berhasil ditampilkan.',
            'data' => $Qpaket
        ]);
    }

    public function delete($id)
    {
        model(Paket::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data paket berhasil dihapus.',
        ]);
    }
}
