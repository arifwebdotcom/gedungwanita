<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\UserModels;
use App\Models\Asosiasi;
use CodeIgniter\API\ResponseTrait;

class InvoiceController extends BaseController
{
    use ResponseTrait;

    public function getInvoice() {
        $noinvoice = $this->request->getVar('noinvoice');
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $asosiasi = $this->request->getVar('asosiasi');
        $numrows = $this->request->getVar('numrows');
        $isadmin = user()->isadmin;        

        if($isadmin == 1){
            $data = model(Invoice::class)->get_invoice_all($noinvoice, $awal, $akhir, $asosiasi, $numrows);
        }else{
            $data = model(Invoice::class)->get_invoice_user($noinvoice, $awal, $akhir, $asosiasi, $numrows);
        }
        
        return json_encode(compact('data'));
    }
    public function datatable() {
        $data = model(Invoice::class)->select('invoice_t.id as idinvoice,invoice_t.*,users.username,users.nohp,users.populasi,asosiasi_m.asosiasi,alamat_m.*')
        ->join('users','users.id=invoice_t.usersfk')
        ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk')
        ->join('alamat_m','alamat_m.usersfk = users.id','left')->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        //$data['tahun'] = model(Invoice::class)->get_tahuninvoice();
        $data['invoice'] = model(Invoice::class)->findAll();
        $data['asosiasi'] = model(Asosiasi::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('invoice/index',$data);
    }

    public function detail($id)
    {
        $data['invoice'] = model(Invoice::class)->get_invoice_by_id($id)[0];
        return view('invoice/detail',$data);
    }

    public function InvoiceBaru()
    {
        $data['user'] = model(UserModels::class)
        ->select('*')->where("deleted_at",null)->findAll();
        $data['id'] =  user()->id;
        $data['asosiasi'] = model(Asosiasi::class)->findAll();
        
        return view('invoice/add', $data);
    }

    public function InvoiceEdit(int $id)
    {
        $data['user'] = model(UserModels::class)->select('*')->where("deleted_at",null)->findAll();
        $data['invoice'] = model(Invoice::class)->where('id',$id)->first();
        $data['invoiced'] = model(InvoiceDetail::class)->where('invoicefk',$id)->findAll();
        $data['id'] =  $id;
        $data['asosiasi'] =  model(Asosiasi::class)->select('*')->findAll(); 
        return view('invoice/edit', $data);
    }

    public function store() {
        
        $query = model(Invoice::class)->selectMax('id')->get();
        $result = $query->getRow();
        $maxId = $result->id+1;        
    
        $untuk = $this->request->getPost('untuk');
        $nama = $this->request->getPost('namainvoice');
        $expired = date("Y-m-d",strtotime($this->request->getPost('expired')));
        $total = preg_replace("/[^0-9]/", "",$this->request->getPost('total_harga'));
        

        if($untuk ==  1){
            $Qall = model(UserModels::class)->select('*')->where("deleted_at",null)->findAll();

            foreach($Qall as $row){
                $request['noinvoice'] =  "IV".date("Ym")."/".$this->numberToRoman($row->asosiasifk)."/".$maxId++;
                $request['expired'] = $expired;
                $request['nama'] = $nama;
                $request['total'] = $total;
                $request['status'] = 'TAGIHAN';
                $request['usersfk'] = $row->id;
                $InvoiceDetailModel = new Invoice();
                $InvoiceDetailModel->insert($request);       
                $invoicefk = $InvoiceDetailModel->getInsertID();

                foreach (json_decode($this->request->getVar('invoice_detail'), true) as $key => $invoice_detail) {        
                    
                    $request['invoicefk'] = $invoicefk;
                    $request['nama'] = $invoice_detail['nama'];    
                    $request['qty'] = $invoice_detail['qty'];
                    $request['harga'] =  $invoice_detail['harga'];
                    $request['subtotal'] = $invoice_detail['subtotal'];
                    $request['keterangan'] = $invoice_detail['keterangan'];

                    model(InvoiceDetail::class)->insert($request);
                }
            }
            
        }else if($untuk == 2){
            $asosiasifk = $this->request->getPost('asosiasifk');
            
            $Qall = model(UserModels::class)->select('*')->where("deleted_at",null)->where("asosiasifk",$asosiasifk)->findAll();

            foreach($Qall as $row){
                $request['noinvoice'] =  "IV".date("Ym")."/".$this->numberToRoman($row->asosiasifk)."/".$maxId++;
                $request['expired'] = $expired;
                $request['nama'] = $nama;
                $request['total'] = $total;
                $request['status'] = 'TAGIHAN';
                $request['usersfk'] = $row->id;
                $InvoiceDetailModel = new Invoice();
                $InvoiceDetailModel->insert($request);       
                $invoicefk = $InvoiceDetailModel->getInsertID();

                foreach (json_decode($this->request->getVar('invoice_detail'), true) as $key => $invoice_detail) {        
                    
                    $request['invoicefk'] = $invoicefk;
                    $request['nama'] = $invoice_detail['nama'];    
                    $request['qty'] = $invoice_detail['qty'];
                    $request['harga'] =  $invoice_detail['harga'];
                    $request['subtotal'] = $invoice_detail['subtotal'];
                    $request['keterangan'] = $invoice_detail['keterangan'];

                    model(InvoiceDetail::class)->insert($request);
                }
            }
        }else if($untuk == 3){
            $asosiasifk = $this->request->getPost('asosiasifk');
            $usersfk = $this->request->getPost('usersfk');
            $Qall = model(UserModels::class)->select('*')->where("deleted_at",null)->where("id",$usersfk)->first(); 
                    
            $request['noinvoice'] =  "IV".date("Ym")."/".$this->numberToRoman($$Qall->asosiasifk)."/".$maxId++;
            $request['expired'] = $expired;
            $request['nama'] = $nama;
            $request['total'] = $total;
            $request['status'] = 'TAGIHAN';
            $request['usersfk'] = $usersfk;
            $InvoiceDetailModel = new Invoice();
            $InvoiceDetailModel->insert($request);       
            $invoicefk = $InvoiceDetailModel->getInsertID();

            foreach (json_decode($this->request->getVar('invoice_detail'), true) as $key => $invoice_detail) {        
                    
                $request['invoicefk'] = $invoicefk;
                $request['nama'] = $invoice_detail['nama'];    
                $request['qty'] = $invoice_detail['qty'];
                $request['harga'] =  $invoice_detail['harga'];
                $request['subtotal'] = $invoice_detail['subtotal'];
                $request['keterangan'] = $invoice_detail['keterangan'];

                model(InvoiceDetail::class)->insert($request);
            }
            
        }

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data invoice berhasil ditambahkan.',
        ]);
    }

    public function numberToRoman($number) {
        // Define arrays of Roman numeral equivalents for digits
        $roman_numerals = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        );
    
        $roman = '';
    
        // Iterate through each Roman numeral value
        foreach ($roman_numerals as $key => $value) {
            // Repeat the Roman numeral while the number is greater than or equal to the value
            while ($number >= $value) {
                $roman .= $key;
                $number -= $value;
            }
        }
    
        return $roman;
    }

    public function update($id) {

        $request['disetujui'] = $this->request->getPost('disetujui');
        $request['keterangan'] = $this->request->getPost('keterangan');
        $request['id'] = $id;
        model(Invoice::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data invoice berhasil diubah.',
        ]);
    }

    public function checkstatus($id){
        $server_key = 'SB-Mid-server-c_BeG1nsGdJxwveXVqhagZOu';
        // The order ID of the transaction you want to check
        $order_id = $id;

        // Midtrans API endpoint
        $url = "https://api.midtrans.com/v2/{$order_id}/status";

        // Initialize cURL
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Authorization: Basic ' . base64_encode($server_key . ':')
        ]);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        } else {
            // Decode the JSON response
            $response_data = json_decode($response, true);

            // Print the response
            echo '<pre>';
            print_r($response_data);
            echo '</pre>';
        }

        // Close cURL session
        curl_close($ch);
    }

    public function delete($id)
    {
        model(Invoice::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data invoice berhasil diubah.',
        ]);
    }
}
