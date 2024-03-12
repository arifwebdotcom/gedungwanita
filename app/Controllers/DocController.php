<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Doc;
use CodeIgniter\API\ResponseTrait;

class DocController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Doc::class)->findAll();

        return json_encode(compact('data'));
    }

    public function tagify() {
        $data = model(Doc::class)->select('doc')->findAll();

        $whitelistData = array();
        foreach($data as $row){
            array_push($whitelistData,$row->doc);
        }       

        // Convert the data to JSON format
        $whitelistJson = json_encode($whitelistData);

        // Output the JSON data
        return $whitelistJson;
    }

    public function index()
    {
        $data['doc'] = model(Doc::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/doc/index',$data);
    }

    public function store() {
        // $setRules = [            
        //     'doc' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom doc wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['doc'] = $this->request->getPost('doc');
        model(Doc::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data doc berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'doc' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom doc wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }
        
        $request['doc'] = $this->request->getPost('doc');
        $request['id'] = $id;
        model(Doc::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data doc berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Doc::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data doc berhasil diubah.',
        ]);
    }
}
