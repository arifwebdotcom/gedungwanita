<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Paket;
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

        $request['keterangan'] = $this->request->getPost('keterangan');
        $request['periodebulan'] = $this->request->getPost('bulan');
        $request['perminggu'] = $this->request->getPost('minggu');
        $request['totalsesi'] = $this->request->getPost('totalsesi');
        $request['biaya'] = $this->request->getPost('biaya');
        $request['biayapersesi'] = $this->request->getPost('biayapersesi');
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

        $request['keterangan'] = $this->request->getPost('keterangan');
        $request['periodebulan'] = $this->request->getPost('bulan');
        $request['perminggu'] = $this->request->getPost('minggu');
        $request['totalsesi'] = $this->request->getPost('totalsesi');
        $request['biaya'] = $this->request->getPost('biaya');
        $request['biayapersesi'] = $this->request->getPost('biayapersesi');
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
            'messages' => 'Data paket berhasil diubah.',
        ]);
    }
}
