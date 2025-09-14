<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pendaftaran;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Kategori;
use App\Models\Kelas;
use CodeIgniter\API\ResponseTrait;

class JadwalController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $model = model(Pendaftaran::class)->select('pendaftaran_t.id as id,member_m.nama,kategori_m.id as idkategori,kategori_m.color,kategori_m.namakategori,jadwalpendaftaran_t.tanggal')
        ->join('member_m','member_m.id=pendaftaran_t.memberfk')
        ->join('kategori_m','kategori_m.id=pendaftaran_t.kategorifk')
        ->join('jadwalpendaftaran_t','jadwalpendaftaran_t.pendaftaranfk = pendaftaran_t.id');
        //$model = new Pendaftaran();
        $data = $model->findAll();

        $events = [];
        foreach ($data as $row) {
            $events[] = [
                'id'    => $row->id,
                'title' => $row->nama . ' - ' . $row->namakategori,
                'start' => $row->tanggal,
                'color' => $row->color,
                'kategori_id' => $row->idkategori,
            ];
        }

        return $this->response->setJSON($events);
    }

    public function index()
    {
        $this->data['kategori'] = model(Kategori::class)->findAll();
        $this->data['member'] = model(Member::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/jadwal/index',$this->data);
    }

    public function store() {
        // $setRules = [            
        //     'jadwal' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom jadwal wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['nama'] = $this->request->getPost('jadwalpakan');
        $request['alamat'] = $this->request->getPost('alamat');
        $request['nohp'] = $this->request->getPost('nohp');
        model(Pendaftaran::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data jadwal berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'jadwal' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom jadwal wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }
        
        $request['nama'] = $this->request->getPost('jadwalpakan');
        $request['alamat'] = $this->request->getPost('alamat');
        $request['nohp'] = $this->request->getPost('nohp');
        $request['id'] = $id;
        model(Pendaftaran::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data jadwal berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Pendaftaran::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data jadwal berhasil diubah.',
        ]);
    }
}
