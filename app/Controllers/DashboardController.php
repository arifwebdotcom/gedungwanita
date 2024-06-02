<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Agama;
use App\Models\Asosiasi;
use App\Models\Invoice;
use App\Models\UserModels;
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
        $datatransaction['status'] = 'inquiry';
        $datatransaction['amount'] = $this->request->getPost('amount');
        $TransactionModel = new TransactionModel();
        $TransactionModel->insert($datatransaction);

        // Get the last insert ID
        $users_transaction_id = $TransactionModel->getInsertID();
        
        $detailinvoice = model(Invoice::class)->getDetailInvoiceNumber($this->request->getPost('id'));
        //dd($detailinvoice);
        $item_details = array();
        $gross_amount = 0;
        foreach($detailinvoice  as $key => $row){
            $datatransactiondetail['users_transaction_id'] = $users_transaction_id;
            $datatransactiondetail['name'] = $row->nama;
            $datatransactiondetail['qty'] = $row->qty;
            $datatransactiondetail['price'] = $row->harga;
            $datatransactiondetail['subtotal'] = $row->subtotal;
            $gross_amount = $gross_amount+$row->subtotal;
        
            $TransactionDetailModel = new TransactionDetailModel();
            $TransactionDetailModel->insert($datatransactiondetail);
            $users_transaction_detail_id = $TransactionModel->getInsertID();
            array_push($item_details,array("id"=>$users_transaction_detail_id,"price"=>$row->harga,"quantity"=>$row->qty,"name"=>$row->nama));
            
        }
        
        
        



        $params = array(
            'transaction_details' => array(
                'order_id' => $users_transaction_id,
                'gross_amount' => $gross_amount,
            ),
            "item_details" => $item_details,
            'customer_details' => array(
                'first_name' => $this->request->getPost('namapeternak'),
                'last_name' => ' ',
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('notelp'),
            ),
        );
        
        //print_r($params);
        
        return $this->respondCreated([
            'status' => true,
            'params' => $params,
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

    public function update($id) {

        $request['bersediamembayar'] = ($this->request->getPost('bersediamembayar')?"1":"0");
        $request['id'] = $id;
        model(UserModels::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Terima kasih anda Bersedia membayar.',
        ]);
    }

}