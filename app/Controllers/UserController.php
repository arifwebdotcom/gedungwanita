<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModels;
use App\Models\Kelurahan;
use App\Models\Alamat;
use App\Models\SuplierPakan;
use App\Models\Asosiasi;
use CodeIgniter\API\ResponseTrait;

class UserController extends BaseController
{
    use ResponseTrait;
    protected $db;
    protected $alamat;
    //protected $suplier;
    public function __construct()
    {
        $this->db = db_connect();
        $this->alamat = new Alamat();
       // $this->suplier = new SuplierPakan();
    }

    public function datatable() {
        $data = model(UserModels::class)->select('users.*,alamat_m.provinsi,alamat_m.kotakabupaten,alamat_m.kecamatan,alamat_m.kelurahan,alamat_m.alamat,COALESCE(suplierpakan_m.nama, "-") AS namasuplier,suplierpakan_m.alamat,suplierpakan_m.nohp as nohpsuplier')->join('alamat_m','alamat_m.usersfk = users.id','left')->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id','left')->findAll();
        //$data = model(UserModels::class)->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id','left')->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $data['user'] = model(UserModels::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/user/index',$data);
    }

    public function store() {
        // $setRules = [            
        //     'user' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom user wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['user'] = $this->request->getPost('user');
        $request['reportdisplay'] = $this->request->getPost('user');
        model(UserModels::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data user berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'user' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom user wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $idref = model(Alamat::class)->select('id')->where('usersfk', $id)->get()->getRow();

        if ($idref !== null && isset($idref->id)) {
            $data_tambahan_alamat = [
                'usersfk' => $id,
                'kodepos' => $this->request->getVar('kodepos'),
                'kelurahanfk' => $this->request->getVar('kelurahanfk'),
                'kelurahan' => $this->request->getVar('kelurahan'),
                'kecamatan' => $this->request->getVar('kecamatan'),
                'kecamatanfk' => $this->request->getVar('kecamatanfk'),
                'kotakabupaten' => $this->request->getVar('kotakabupaten'),
                'kotakabupatenfk' => $this->request->getVar('kotakabupatenfk'),
                'provinsi' => $this->request->getVar('provinsi'),
                'provinsifk' => $this->request->getVar('provinsifk'),
                'alamat' => $this->request->getVar('alamat'),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->alamat->where('id', $idref->id)->set($data_tambahan_alamat)->update();
        }else{
            $data_alamat = [
                'usersfk' => $id,
                'kodepos' => $this->request->getVar('kodepos'),
                'kelurahanfk' => $this->request->getVar('kelurahanfk'),
                'kelurahan' => $this->request->getVar('kelurahan'),
                'kecamatan' => $this->request->getVar('kecamatan'),
                'kecamatanfk' => $this->request->getVar('kecamatanfk'),
                'kotakabupaten' => $this->request->getVar('kotakabupaten'),
                'kotakabupatenfk' => $this->request->getVar('kotakabupatenfk'),
                'provinsi' => $this->request->getVar('provinsi'),
                'provinsifk' => $this->request->getVar('provinsifk'),
                'alamat' => $this->request->getVar('alamat'),
                'created_at' => date('Y-m-d H:i:s'),
    
            ];
            $this->alamat->insert($data_alamat);
        }

        

        $JP = json_decode($this->request->getPost('jenispakan'),true);
        $jenispakan = "";
        foreach($JP as $row){
            $jenispakan .= $row['value'].",";
        }
        $Pul = json_decode($this->request->getPost('pullet'),true);
        $pullet = "";
        foreach($Pul as $row){
            $pullet .= $row['value'].",";
        }
        $request['username'] = $this->request->getPost('username');
        $request['notelp'] = $this->request->getPost('notelp');
        $request['nohp'] = $this->request->getPost('nohp');
        $request['namapeternakan'] = $this->request->getPost('namapeternakan');
        $request['populasi'] = $this->request->getPost('populasi');
        $request['suplierpakanfk'] = $this->request->getPost('suplierpakanfk');
        $request['jenispakan'] = $jenispakan;
        $request['pullet'] = $pullet;
        $request['frekuensireplacement'] = $this->request->getPost('frekuensireplacement');
        $request['replacement'] = $this->request->getPost('replacement');
        $request['replacement'] = $this->request->getPost('replacement');
        $request['id'] = $id;
        model(UserModels::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data user berhasil diubah.',
        ]);
    }

    public function updatemodal($id) {
        // $setRules = [            
        //     'user' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom user wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $idref = model(Alamat::class)->select('id')->where('usersfk', $id)->get()->getRow();

        if ($idref !== null && isset($idref->id)) {
            $data_tambahan_alamat = [
                'usersfk' => $id,
                'kodepos' => $this->request->getVar('kodepos'),
                'kelurahanfk' => $this->request->getVar('kelurahanmodalfk'),
                'kelurahan' => $this->request->getVar('kelurahanmodal'),
                'kecamatan' => $this->request->getVar('kecamatanmodal'),
                'kecamatanfk' => $this->request->getVar('kecamatanmodalfk'),
                'kotakabupaten' => $this->request->getVar('kotakabupatenmodal'),
                'kotakabupatenfk' => $this->request->getVar('kotakabupatenmodalfk'),
                'provinsi' => $this->request->getVar('provinsimodal'),
                'provinsifk' => $this->request->getVar('provinsimodalfk'),
                'alamat' => $this->request->getVar('alamat'),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->alamat->where('id', $idref->id)->set($data_tambahan_alamat)->update();
        }else{
            $data_alamat = [
                'usersfk' => $id,
                'kodepos' => $this->request->getVar('kodepos'),
                'kelurahanfk' => $this->request->getVar('kelurahanmodalfk'),
                'kelurahan' => $this->request->getVar('kelurahanmodal'),
                'kecamatan' => $this->request->getVar('kecamatanmodal'),
                'kecamatanfk' => $this->request->getVar('kecamatanmodalfk'),
                'kotakabupaten' => $this->request->getVar('kotakabupatenmodal'),
                'kotakabupatenfk' => $this->request->getVar('kotakabupatenmodalfk'),
                'provinsi' => $this->request->getVar('provinsimodal'),
                'provinsifk' => $this->request->getVar('provinsimodalfk'),
                'alamat' => $this->request->getVar('alamat'),
                'created_at' => date('Y-m-d H:i:s'),
    
            ];
            $this->alamat->insert($data_alamat);
        }

        

        $JP = json_decode($this->request->getPost('jenispakan'),true);
        $jenispakan = "";
        foreach($JP as $row){
            $jenispakan .= $row['value'].",";
        }
        $Pul = json_decode($this->request->getPost('pullet'),true);
        $pullet = "";
        foreach($Pul as $row){
            $pullet .= $row['value'].",";
        }
        $request['username'] = $this->request->getPost('username');
        $request['notelp'] = $this->request->getPost('notelp');
        $request['nohp'] = $this->request->getPost('nohp');
        $request['namapeternakan'] = $this->request->getPost('namapeternakan');
        $request['populasi'] = $this->request->getPost('populasi');
        $request['suplierpakanfk'] = $this->request->getPost('suplierpakanfk');
        $request['jenispakan'] = $jenispakan;
        $request['pullet'] = $pullet;
        $request['frekuensireplacement'] = $this->request->getPost('frekuensireplacement');
        $request['replacement'] = $this->request->getPost('replacement');
        $request['replacement'] = $this->request->getPost('replacement');
        $request['id'] = $id;
        model(UserModels::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data user berhasil diubah.'.$this->request->getPost('suplierpakanfk'),
        ]);
    }

    public function delete($id)
    {
        model(UserModels::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data user berhasil diubah.',
        ]);
    }

    public function UserBaru()
    {
        $data['suplierpakan'] =  $this->suplier;
        return view('master/user/add', $data);
    }

    public function UserEdit(int $id)
    {
        $data['user'] = model(UserModels::class)
        ->select('users.*,alamat_m.*,suplierpakan_m.nama,suplierpakan_m.id as idsuplierpakan')
        ->join('alamat_m','alamat_m.usersfk = users.id','left')
        ->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id','left')
        ->where('users.id',$id)->first();
        $data['id'] =  $id;
        $data['suplierpakan'] =  $this->suplier;
        $data['asosiasi'] =  model(Asosiasi::class)->select('*')->findAll(); 
        return view('master/user/edit', $data);
    }

    public function search2()
    {
        $searchTerm = $this->request->getVar('q');
        $results = model(Kelurahan::class)->searchData($searchTerm);
        echo json_encode($results);
    }
}
