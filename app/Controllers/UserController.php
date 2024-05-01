<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModels;
use App\Models\ModelUser;
use App\Models\Kelurahan;
use App\Models\Alamat;
use App\Models\SuplierPakan;
use App\Models\Asosiasi;
use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Password;

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

        $ktp ="";
        $username = $this->request->getPost('username');
        $namapeternakan = $this->request->getPost('namapeternakan');
        if($this->request->getVar('avatar_remove')){
            $file_name = $this->request->getVar('avatar_remove');
            $file_path = './uploads/' . $file_name; 
            
            if (file_exists($file_path)) {
                unlink($file_path);
            } 
        }
        
        if($this->request->getFile('avatar')) {
            $file = $this->request->getFile('avatar');

            $upload_path = './uploads/';
            $extension = $file->getExtension();
            $ktp = "ktp_".$namapeternakan."_".date("YmdHis").".".$extension;
            
            $file->move($upload_path, $ktp);
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
        $request['first_name'] = $this->request->getPost('first_name');
        $request['username'] = $username;
        $request['notelp'] = $this->request->getPost('notelp');
        $request['nohp'] = $this->request->getPost('nohp');
        $request['namapeternakan'] = $namapeternakan;
        $request['populasi'] = $this->request->getPost('populasi');
        $request['asosiasifk'] = $this->request->getPost('asosiasifk');
        $request['suplierpakanfk'] = $this->request->getPost('suplierpakanfk');
        $request['jenispakan'] = $jenispakan;
        $request['pullet'] = $pullet;
        $request['frekuensireplacement'] = $this->request->getPost('frekuensireplacement');
        $request['replacement'] = $this->request->getPost('replacement');
        $request['ktp'] = $ktp;
        $request['active'] = 1;
        $request['email'] = $this->request->getPost('email');
        $request['password_hash'] = Password::hash($this->request->getPost('password'));
        $request['tglgabung'] = date("Y-m-d");

        $UserModel = new ModelUser();
        $UserModel->save($request);       
        $userfk = $UserModel->insertID();
        
        $data_alamat = [
            'usersfk' => $userfk,
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

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Member baru berhasil didaftarkan.',
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
        $ktp ="";
        if($this->request->getVar('avatar_remove')){
            $file_name = $this->request->getVar('avatar_remove');
            $file_path = './uploads/' . $file_name; 
            
            if (file_exists($file_path)) {
                unlink($file_path);
            } 
        }
        

        $namapeternakan = $this->request->getPost('namapeternakan');
        if($this->request->getFile('avatar')) {
            $file = $this->request->getFile('avatar');

            $upload_path = './uploads/';
            $extension = $file->getExtension();
            $ktp = "ktp_".$namapeternakan."_".date("YmdHis").".".$extension;
            
            $file->move($upload_path, $ktp);
        
        } 

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
        $request['namapeternakan'] = $namapeternakan;
        $request['populasi'] = $this->request->getPost('populasi');
        $request['suplierpakanfk'] = $this->request->getPost('suplierpakanfk');
        $request['jenispakan'] = $jenispakan;
        $request['pullet'] = $pullet;
        $request['frekuensireplacement'] = $this->request->getPost('frekuensireplacement');
        $request['replacement'] = $this->request->getPost('replacement');
        $request['ktp'] = $ktp;
        $request['id'] = $id;
        model(UserModels::class)->save($request);

        return redirect()->to(site_url('/user/user-edit/'.$id));
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

        $query = model(Asosiasi::class)->selectMax('id')->get();
        $result = $query->getRow();
        $maxId = $result->id;

        //select count user order by user.created_at where asosiasifk

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
        $request['iscomplete'] = 1;
        $request['kodeanggota'] = sprintf("%04d", $id)."/";
        $request['id'] = $id;
//         kode member 
// nomor urut nasional / no cabang / kode cabang (romawi) / th gabung
// 0001 / 001 / VI / 23
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
        $data['asosiasi'] =  $this->asosiasi;
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

    public function Membercard(int $id)
    {
        $data['user'] = model(UserModels::class)
        ->select('users.*')
        ->where('users.id',$id)->first();
        $data['id'] =  $id;
        return view('master/user/membercard', $data);
    }

    public function search2()
    {
        $searchTerm = $this->request->getVar('q');
        $results = model(Kelurahan::class)->searchData($searchTerm);
        echo json_encode($results);
    }
}
