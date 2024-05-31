<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogNotificationModel;
use CodeIgniter\API\ResponseTrait;

class NotificationController extends BaseController
{
    use ResponseTrait;

    public function index() {

        $json = $this->request->getJSON();
        
        $request['request'] = $json;
        model(LogNotificationModel::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data agama berhasil ditambahkan.',
        ]);
    }

    public function saveTransaction()
    {
        $json = $this->request->getJSON(true);
        //dd(json_encode($json));

        $request['request'] = json_encode($json);
        
        model(LogNotificationModel::class)->insert($request);        
        return $this->respondCreated($json);
        
    }

}
