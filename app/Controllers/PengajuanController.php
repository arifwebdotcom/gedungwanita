<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengajuan;
use App\Models\UserModels;
use App\Models\Asosiasi;
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

    public function PengajuanBaru()
    {
        $data['user'] = model(UserModels::class)
        ->select('users.*,alamat_m.*,suplierpakan_m.nama,suplierpakan_m.id as idsuplierpakan')
        ->join('alamat_m','alamat_m.usersfk = users.id','left')
        ->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id','left')
        ->where('users.id',user()->id)->first();
        $data['id'] =  user()->id;
        $data['suplierpakan'] =  $this->suplier;
        $data['asosiasi'] =  model(Asosiasi::class)->select('*')->findAll(); 
        $data['suplierpakan'] =  $this->suplier;
        return view('pengajuan/add', $data);
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

        $request['populasi'] = $this->request->getPost('populasi');
        $request['kebutuhan'] = $this->request->getPost('kebutuhan');
        $request['statuskeanggotaan'] = $this->request->getPost('statuskeanggotaan');
        $request['keterangan'] = $this->request->getPost('keterangan');
        $request['periode'] = $this->request->getPost('periode');
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
