<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Agama;
use App\Models\Asosiasi;
use App\Models\TransactionDetailModel;
use App\Models\TransactionModel;

use CodeIgniter\API\ResponseTrait;

class DashboardController extends BaseController
{
    use ResponseTrait;

    public function index(){
        $data['userData'] = $this->userData;
        //return view('layouts/app');
        return view('dashboard/dashboard',$data);
    }

    public function payment(){
        \Midtrans\Config::$serverKey = 'SB-Mid-server-c_BeG1nsGdJxwveXVqhagZOu';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $datatransaction['user_id'] = user()->id;
        $datatransaction['status'] = 'pending';
        $datatransaction['amount'] = '250000';
        $TransactionModel = new TransactionModel();
        $TransactionModel->insert($datatransaction);

        // Get the last insert ID
        $users_transaction_id = $TransactionModel->getInsertID();

        $datatransactiondetail['users_transaction_id'] = $users_transaction_id;
        $datatransactiondetail['name'] = 'Biaya Pendaftaran';
        $datatransactiondetail['qty'] = 1;
        $datatransactiondetail['price'] = '250000';
        $datatransactiondetail['subtotal'] = '250000';
        

        $TransactionDetailModel = new TransactionDetailModel();
        $TransactionDetailModel->insert($datatransactiondetail);
        $users_transaction_detail_id = $TransactionModel->getInsertID();



        $params = array(
            'transaction_details' => array(
                'order_id' => $users_transaction_id,
                'gross_amount' => 250000,
            ),
            "item_details" => array(
                [
                  "id" => $users_transaction_detail_id,
                  "price" => 250000,
                  "quantity" => 1,
                  "name" => "Biaya Pendaftaran"
                ]
            ),
            'customer_details' => array(
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => ' ',
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
            ),
        );
        
        
        return $this->respondCreated([
            'status' => true,
            'snapToken' => \Midtrans\Snap::getSnapToken($params),
            'messages' => 'Data doc berhasil ditambahkan.',
        ]);
    }

    public function datapie()
    {

        $groupedData = model(Asosiasi::class)
        ->select('asosiasi_m.asosiasi,count(users.id) as count')
        ->join('users','users.asosiasifk=asosiasi_m.id')
        ->groupby('users.asosiasifk')
        ->get()->getResultArray(); 

        $labels = [];
        $data = [];

        foreach ($groupedData as $row) {
            $labels[] = $row['asosiasi']; // Replace 'your_column' with the column you grouped by
            $data[] = $row['count'];
        }

        // Return the data as JSON
        return $this->respond([
            'labels' => $labels,
            'data' => $data
        ]);

    }

}