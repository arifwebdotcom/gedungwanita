<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pendaftaran;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Kategori;
use App\Models\Kelas;
use App\Models\JadwalPendaftaran;
use CodeIgniter\API\ResponseTrait;

class JadwalController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $model = model(Pendaftaran::class)
                ->select('jadwalpendaftaran_t.id as id,
                        member_m.nama,
                        jadwalpendaftaran_t.kategorifk as idkategori,
                        kategori_m.color,
                        kategori_m.namakategori,
                        jadwalpendaftaran_t.tanggal,
                        jadwalpendaftaran_t.checkin,
                        jadwalpendaftaran_t.kelasfk')
                ->join('member_m','member_m.id=pendaftaran_t.memberfk')        
                ->join('jadwalpendaftaran_t','jadwalpendaftaran_t.pendaftaranfk = pendaftaran_t.id')
                ->join('kategori_m','kategori_m.id=jadwalpendaftaran_t.kategorifk')
                ->where('jadwalpendaftaran_t.deleted_at','!=',null);

            $data = $model->findAll();

            $grouped = [];

            // group by tanggal (jam harus sama persis)
            foreach ($data as $row) {
                $key = $row->tanggal; // YYYY-mm-dd HH:ii:ss

                if (!isset($grouped[$key])) {
                    $grouped[$key] = [
                        'id' => $row->id,
                        'start' => $row->tanggal,
                        'title' => $row->nama,
                        'color' => $row->color,
                        'checkin' => $row->checkin,
                        'kelas' => $row->kelasfk,
                        'kategori_id' => $row->idkategori,
                    ];
                } else {
                    // tambahkan nama pasien lain dengan <br>
                    $grouped[$key]['title'] .= "\n" . $row->nama;
                }
            }

            $events = array_values($grouped);

            return $this->response->setJSON($events);
    }
    
    public function datatablelist() {
        $model = model(Pendaftaran::class)
        ->select('jadwalpendaftaran_t.id as id,member_m.nama,jadwalpendaftaran_t.kategorifk as idkategori,kategori_m.color,kategori_m.namakategori,jadwalpendaftaran_t.tanggal,jadwalpendaftaran_t.checkin,jadwalpendaftaran_t.kelasfk') 
        ->join('member_m','member_m.id=pendaftaran_t.memberfk') 
        ->join('jadwalpendaftaran_t','jadwalpendaftaran_t.pendaftaranfk = pendaftaran_t.id') 
        ->join('kategori_m','kategori_m.id=jadwalpendaftaran_t.kategorifk')
        ->where('jadwalpendaftaran_t.deleted_at',null); 
        //$model = new Pendaftaran(); 
        $data = $model->findAll(); 
        $events = []; 
        foreach ($data as $row) { 
            $events[] = [ 
                'id' => $row->id, 
                'title' => $row->nama, 
                'start' => $row->tanggal, 
                'color' => $row->color, 
                'checkin' => $row->checkin, 
                'kelas' => $row->kelasfk, 
                'kategori_id' => $row->idkategori, ]; 
        }

        return $this->response->setJSON($events);
    }

    public function getKategoriByUsiaKelas() {
        $usia = $this->request->getPost('usia');
        $kelasId = $this->request->getPost('kelasId');

        $kategori = model(Kategori::class)
            ->where('kelasfk', $kelasId)
            ->where('usiaawal <=', $usia)
            ->where('usiaakhir >=', $usia)
            ->get()
            ->getRow();

        return $this->response->setJSON($kategori);
    }

    public function index()
    {
        $this->data['kategori'] = model(Kategori::class)->findAll();
        $this->data['kelas'] = model(Kelas::class)->findAll();
        $this->data['member'] = model(Member::class)->findAll();
        $this->data['paket'] = model(Paket::class)->findAll();

        foreach ($this->data['member'] as &$m) {
            $birthDate = new \DateTime($m->tgllahir);   // 🔹 pakai \DateTime
            $today     = new \DateTime('today');          // 🔹 pakai \DateTime
            $diff      = $birthDate->diff($today);

            // usia dalam tahun bulat
            $m->usia = $diff->y;
        }

        // print_r(json_encode(compact('data')));
        return view('master/jadwal/index',$this->data);
    }

    public function store() {        

        $request['memberfk'] = $this->request->getPost('memberfk');
        $request['kelasfk'] = $this->request->getPost('kelasfk');
        $request['kategorifk'] = $this->request->getPost('kategorifk');
        $request['paketfk'] = $this->request->getPost('paketfk');
        //$request['hari'] = $this->request->getPost('hari');
        $request['mulai'] = $this->request->getPost('mulai');
        $request['selesai'] = $this->request->getPost('selesai');
        $request['biaya'] = $this->request->getPost('biaya');
        $request['biayapendaftaran'] = $this->request->getPost('biayapendaftaran');

        $Qpaket = model(Paket::class)->where("id",$request['paketfk'])->first();
        $request['perminggu'] = $Qpaket->perminggu;
        $pendaftaranModel = model(Pendaftaran::class);
        $pendaftaranModel->insert($request);
        $pendaftaranId = $pendaftaranModel->getInsertID();


        $hariDipilih = $this->request->getPost('hari'); // array hari [1,3,5]
        $mulai  = new \DateTime($request['mulai']);
        $selesai = new \DateTime($request['selesai']);

        $jadwalModel = model(JadwalPendaftaran::class);

        $jamsesi1 = $this->request->getPost('jamsesi1');
        $jamsesi2 = $this->request->getPost('jamsesi2');
        $jamsesi3 = $this->request->getPost('jamsesi3');

        $currentWeek = null;
        $sesiCount = 0;

        for ($date = clone $mulai; $date <= $selesai; $date->modify('+1 day')) {
            $dayOfWeek = $date->format('N'); // 1=Senin, ... 7=Minggu
            $weekNumber = $date->format('oW'); // tahun+minggu (misal 202537)

            // reset sesi tiap ganti minggu
            if ($weekNumber !== $currentWeek) {
                $currentWeek = $weekNumber;
                $sesiCount = 0;
            }

            if (in_array($dayOfWeek, $hariDipilih)) {
                if ($sesiCount == 0) {
                    // sesi pertama minggu ini
                    $jam = $jamsesi1;
                } elseif ($sesiCount == 1) {
                    // sesi kedua minggu ini
                    $jam = $jamsesi2;
                }  elseif ($sesiCount == 2) {
                    // sesi kedua minggu ini
                    $jam = $jamsesi3;
                } else {
                    continue; // skip kalau sudah lebih dari 2 sesi
                }

                $jadwalModel->insert([
                    'pendaftaranfk' => $pendaftaranId,
                    'kelasfk'       => $request['kelasfk'],
                    'kategorifk'    => $request['kategorifk'],
                    'checkin'       => 0,
                    'biaya'         => $Qpaket->biayapersesi,
                    'tanggal'       => $date->format('Y-m-d') . ' ' . $jam . ':00',
                ]);

                $sesiCount++;
            }
        }

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data jadwal berhasil ditambahkan.',
        ]);
    }

    public function updatejadwalpendaftaran(){
        $id         = $this->request->getPost('id');          // id event/jadwal
        $checkin    = $this->request->getPost('checkin');     // 0/1
        $kelasfk    = $this->request->getPost('kelasfk');     // id kelas
        $kategorifk = $this->request->getPost('kategorifk');  // id kategori
        $tanggal = $this->request->getPost('tanggal');  // id kategori
        
        $jadwalModel = new JadwalPendaftaran();

        // pastikan data ada
        $jadwal = $jadwalModel->find($id);
        if (!$jadwal) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Jadwal tidak ditemukan'
            ])->setStatusCode(ResponseInterface::HTTP_NOT_FOUND);
        }

        // update data
        $updateData = [
            'checkin'    => $checkin,
            'kategorifk' => $kategorifk,
            'kelasfk'    => $kelasfk,
            'tanggal'    => date("Y-m-d H:i:s",strtotime($tanggal))
        ];

        try {
            $jadwalModel->update($id, $updateData);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Jadwal berhasil diperbarui',
                'data' => $updateData
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

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
        model(JadwalPendaftaran::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data jadwal berhasil diubah.',
        ]);
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        model(JadwalPendaftaran::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data jadwal berhasil dihapus.',
        ]);
    }
}
