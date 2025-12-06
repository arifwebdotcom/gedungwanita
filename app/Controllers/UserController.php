<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModels;
use App\Models\ModelUser;
use App\Models\Kelurahan;
use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Password;

class UserController extends BaseController
{
    use ResponseTrait;
    protected $db;    
    //protected $suplier;
    public function __construct()
    {
        $this->db = db_connect();
       // $this->suplier = new SuplierPakan();
    }

    public function datatable() {
        $data = model(UserModels::class)->select('users.*')->findAll();
        //$data = model(UserModels::class)->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id','left')->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $this->data['user'] = model(UserModels::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/user/index',$this->data);
    }

    public function updatepassword($id) {    
        $password = $this->request->getPost('password');
        $repassword = $this->request->getPost('repassword');
        if($password != $repassword){
            return $this->respondUpdated([
                'status' => false,
                'messages' => 'Password & Re Password tidak sama',
            ]);
        }
        $request['password_hash'] = Password::hash($this->request->getPost('password'));
        $request['id'] = $id;
        model(UserModels::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Password berhasil diubah.',
        ]);    
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
        $request['nama'] = $this->request->getPost('nama');
        $request['email'] = $this->request->getPost('email');
        $request['username'] = $this->request->getPost('username');
        $request['password_hash'] = Password::hash($this->request->getPost('password'));
        $request['status'] = $this->request->getPost('status');
        $request['status_message'] = '1';
        $request['active'] = $this->request->getPost('status');
        $request['role'] = $this->request->getPost('role');
        
        model(UserModels::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data User berhasil disimpan.',
        ]);
    }

    public function update($id) {
        $request['nama'] = $this->request->getPost('nama');
        $request['email'] = $this->request->getPost('email');
        $request['username'] = $this->request->getPost('username');
        $request['password_hash'] = Password::hash($this->request->getPost('password'));
        $request['status'] = $this->request->getPost('status');
        $request['active'] = $this->request->getPost('status');
        $request['status_message'] = '1';
        $request['role'] = $this->request->getPost('role');        
        $request['id'] = $id;
        model(UserModels::class)->save($request);

       return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data User berhasil diubah.',
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
        $request['frequensireplacement'] = $this->request->getPost('frequensireplacement');
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
        $request['status'] = 0;
        $request['active'] = 0;
        $request['id'] = $id;
        model(UserModels::class)->save($request);
        model(UserModels::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data user berhasil diubah.',
        ]);
    }

    public function UserBaru()
    {
        $this->data['suplierpakan'] =  $this->suplier;
        $this->data['asosiasi'] =  model(Asosiasi::class)->findAll();
        return view('master/user/add', $this->data);
    }

    public function UserEdit(int $id)
    {
        $this->data['user'] = model(UserModels::class)
        ->select('users.*,alamat_m.*,suplierpakan_m.nama,suplierpakan_m.id as idsuplierpakan')
        ->join('alamat_m','alamat_m.usersfk = users.id','left')
        ->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id','left')
        ->where('users.id',$id)->first();
        $this->data['id'] =  $id;
        $this->data['suplierpakan'] =  $this->suplier;
        $this->data['asosiasi'] =  model(Asosiasi::class)->select('*')->findAll(); 
        return view('master/user/edit', $this->data);
    }

    public function Membercard(int $id)
    {
        $this->data['user'] = model(UserModels::class)
        ->select('users.*')
        ->where('users.id',$id)->first();
        $this->data['id'] =  $id;
        return view('master/user/membercard', $this->data);
    }

    public function search2()
    {
        $searchTerm = $this->request->getVar('q');
        $results = model(Kelurahan::class)->searchData($searchTerm);
        echo json_encode($results);
    }
}
