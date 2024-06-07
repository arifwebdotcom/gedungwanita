<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Announcement;
use CodeIgniter\API\ResponseTrait;

class AnnouncementController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $data = model(Announcement::class)->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        $this->data['announcement'] = model(Announcement::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/announcement/index',$this->data);
    }

    public function store() {
        helper(['form', 'url']);
        // $setRules = [            
        //     'announcement' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom announcement wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,application/pdf,image/jpg,image/jpeg,image/png]',
                'max_size[file,6024]',
            ]
        ]);

        if (!$input) {
            return $this->respondCreated([
                'status' => false,
                'messages' => $this->validator->getErrors()['file'],
            ]);
        }

        $file = $this->request->getFile('file');

        $filename = "";
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Perform your file processing here
            $newName = $file->getRandomName(); // Optionally, you can generate a new name for the file
            $file->move('assets/pengumuman', $newName);
            $filename = $file->getName(); 
            
        }

        $request['title'] = $this->request->getPost('title');
        $request['description'] = $this->request->getPost('description');
        $request['file'] = $filename;
        model(Announcement::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data Pengumuman berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'announcement' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom announcement wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['announcement'] = $this->request->getPost('announcement');
        $request['id'] = $id;
        model(Announcement::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data announcement berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Announcement::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data announcement berhasil diubah.',
        ]);
    }
}
