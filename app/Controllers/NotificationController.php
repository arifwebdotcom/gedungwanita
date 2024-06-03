<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogNotificationModel;
use App\Models\TransactionModel;
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

        $dataupdate['status'] = $json['transaction_status'];
        $dataupdate['type'] = $json['payment_type'];
        $dataupdate['updatemidtrans'] = date("Y-m-d H:i:s");
        $dataupdate['fraudstatus'] = $json['fraud_status'];
        if($json['order_id']){
            $dataupdate['id'] = $json['order_id'];
            model(TransactionModel::class)->save($dataupdate);
        }
        
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data Transaksi berhasil diubah.',
        ]);
        
    }    

}
