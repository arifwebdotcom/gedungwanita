<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Member;
use CodeIgniter\API\ResponseTrait;

class MemberController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Member::class)->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $this->data['member'] = model(Member::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/member/index',$this->data);
    }

    public function store() {    

        $request['member'] = $this->request->getPost('member');
        if ($this->request->getPost('terms')) {
            $request['tglsetuju'] = date('Y-m-d H:i:s'); // simpan waktu sekarang
        } else {
            $request['tglsetuju'] = null; // kalau ga dicentang biarkan null
        }
        
        model(Member::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data member berhasil ditambahkan.',
        ]);
    }

    public function update($id) {

        $request['member'] = $this->request->getPost('member');
        $request['id'] = $id;
        model(Member::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data member berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Member::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data member berhasil diubah.',
        ]);
    }
}
