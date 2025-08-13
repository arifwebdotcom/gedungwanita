<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\UserModels;
use App\Models\Asosiasi;
use App\Models\LogNotificationModel;
use App\Models\TransactionModel;
use App\Models\KategoriInvoice;
use CodeIgniter\API\ResponseTrait;
use PhpOffice\PhpSpreadsheet\IOFactory;

class InvoiceController extends BaseController
{
    use ResponseTrait;

    public function upload()
    {
        return view('invoice/upload');
    }

    public function import()
    {
        $file = $this->request->getFile('excel_file');

        if ($file->isValid() && !$file->hasMoved()) {
            $spreadsheet = IOFactory::load($file->getTempName());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();
            $highestColumn = $sheet->getHighestColumn(); // Contoh: 'D'
            $jumlahKolom = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

            $db = \Config\Database::connect();
            $j = 0;
            foreach ($rows as $row) {
                if ($j == 0) {
                    $j++; // Tambahkan ini agar tidak terus-terusan skip
                    continue; // Lewati baris pertama
                }
                $Qall = model(UserModels::class)->select('*')->where("deleted_at",null)->where("kodeanggota",$row[0])->first(); 
                

                for($i = 1; $i <= $jumlahKolom-1; $i++){
                    //dd($rows[0][1]." ".date("Y-m",strtotime($rows[0][1])));
                    //echo $row[$i]."<br>";
                    $query = model(Invoice::class)->selectCount('id')->get();
                    $result = $query->getRow();
                    $maxId = $result->id+1;  

                    $bulan = strtotime($rows[0][$i]);
                    if($row[$i] === null | $row[$i] === ''){
                        
                    }elseif (str_replace(['.', ','], '', $row[$i]) === -50000 || str_replace(['.', ','], '', $row[$i]) === "-50000") {                                                
                        $request['noinvoice'] =  "IV".date("Y/m",$bulan)."/".$this->numberToRoman($Qall->asosiasifk)."/".$maxId++;
                        $request['expired'] = date("Y-m-t 23:59:59",$bulan);
                        $request['nama'] = "Simpanan Wajib";
                        $request['total'] = 50000;
                        $request['kategoriinvoicefk'] = 2;
                        $request['status'] = 'BELUM LUNAS';
                        $request['tgldibayar'] = date("Y-m-d",strtotime($row[$i]));
                        $request['usersfk'] = $Qall->id;
                        $InvoiceDetailModel = new Invoice();
                        $InvoiceDetailModel->insert($request);       
                        $invoicefk = $InvoiceDetailModel->getInsertID();

                        $requestd['invoicefk'] = $invoicefk;
                        $requestd['nama'] = "Simpanan Wajib";    
                        $requestd['qty'] = 1;
                        $requestd['harga'] =  50000;
                        $requestd['subtotal'] = 50000;
                        $requestd['keterangan'] = "Simpanan Wajib";

                        model(InvoiceDetail::class)->insert($requestd);

                    } else {
                        //$bulan = strtotime($row[$i]);

                        $request['noinvoice'] =  "IV".date("Y/m",$bulan)."/".$this->numberToRoman($Qall->asosiasifk)."/".$maxId++;
                        $request['expired'] = date("Y-m-t 23:59:59",$bulan);
                        $request['nama'] = "Simpanan Wajib";
                        $request['total'] = 50000;
                        $request['kategoriinvoicefk'] = 2;
                        $request['status'] = 'LUNAS';
                        $request['tgldibayar'] = date("Y-m-d",strtotime($row[$i]));
                        $request['usersfk'] = $Qall->id;
                        $InvoiceDetailModel = new Invoice();
                        $InvoiceDetailModel->insert($request);       
                        $invoicefk = $InvoiceDetailModel->getInsertID();

                        $requestd['invoicefk'] = $invoicefk;
                        $requestd['nama'] = "Simpanan Wajib";    
                        $requestd['qty'] = 1;
                        $requestd['harga'] =  50000;
                        $requestd['subtotal'] = 50000;
                        $requestd['keterangan'] = "Simpanan Wajib";

                        model(InvoiceDetail::class)->insert($requestd);
                    }
                }
                
                //$value = $row[1];

                // if ($value === null || $value === '') {
                //     $harga = 0;
                //     $created_at = null;
                // } elseif (strpos((string) $value, '50.000') !== false || (int)$value === -50000) {
                //     $harga = 0;
                //     $created_at = null;
                // } else {
                //     $harga = 50000;
                //     $date = \DateTime::createFromFormat('d/m/y', $value);
                //     $created_at = $date ? $date->format('Y-m-d') : null;
                // }

                // $Qall = model(UserModels::class)->select('*')->where("deleted_at",null)->where("kodeanggota",$usersfk)->first(); 
                    
                // $request['noinvoice'] =  "IV".date("Ym")."/".$this->numberToRoman($Qall->asosiasifk)."/".$maxId++;
                // $request['expired'] = $expired;
                // $request['nama'] = $nama;
                // $request['total'] = $total;
                // $request['kategoriinvoicefk'] = $kategoriinvoicefk;
                // $request['status'] = $status;
                // $request['usersfk'] = $usersfk;
                // $InvoiceDetailModel = new Invoice();
                // $InvoiceDetailModel->insert($request);       
                // $invoicefk = $InvoiceDetailModel->getInsertID();

         
                // $requestd['invoicefk'] = $invoicefk;
                // $requestd['nama'] = $invoice_detail['nama'];    
                // $requestd['qty'] = $invoice_detail['qty'];
                // $requestd['harga'] =  $invoice_detail['harga'];
                // $requestd['subtotal'] = $invoice_detail['subtotal'];
                // $requestd['keterangan'] = $invoice_detail['keterangan'];

                // model(InvoiceDetail::class)->insert($requestd);
            
                $j++;
            }

            //return redirect()->to('/invoice/upload')->with('success', 'Data berhasil diimpor.');
        }

        //return redirect()->back()->with('error', 'File tidak valid.');
    }

    public function getInvoice() {
        $noinvoice = $this->request->getVar('noinvoice');
        $namaanggota = $this->request->getVar('namaanggota');
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
        $asosiasi = $this->request->getVar('asosiasi');
        $status = $this->request->getVar('status');
        $numrows = $this->request->getVar('numrows');
        $isadmin = user()->isadmin;        

        if($isadmin == 1){
            $data = model(Invoice::class)->get_invoice_all($noinvoice, $awal, $akhir, $asosiasi, $status, $numrows,$namaanggota);
        }else{
            $data = model(Invoice::class)->get_invoice_user($noinvoice, $awal, $akhir, $asosiasi, $status, $numrows,$namaanggota);
        }
        
        return json_encode(compact('data'));
    }
    public function datatable() {
        $data = model(Invoice::class)->select('invoice_t.id as idinvoice,invoice_t.*,users.username,users.nohp,users.populasi,asosiasi_m.asosiasi,alamat_m.*,users.nama as namapeternak')
        ->join('users','users.id=invoice_t.usersfk')
        ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk')
        ->join('alamat_m','alamat_m.usersfk = users.id','left')->findAll();

        return json_encode(compact('data'));
    }

    public function index()
    {
        //$data['tahun'] = model(Invoice::class)->get_tahuninvoice();
        $this->data['invoice'] = model(Invoice::class)->findAll();
        $this->data['asosiasi'] = model(Asosiasi::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('invoice/index',$this->data);
    }

    public function detail($id)
    {
        $this->data['invoice'] = model(Invoice::class)->get_invoice_by_id($id)[0];
        return view('invoice/detail',$this->data);
    }

    public function InvoiceBaru()
    {
        $this->data['user'] = model(UserModels::class)
        ->select('*')->where("deleted_at",null)->findAll();
        $this->data['id'] =  user()->id;
        $this->data['asosiasi'] = model(Asosiasi::class)->findAll();
        $this->data['kategoriinvoice'] = model(KategoriInvoice::class)->findAll();
        
        return view('invoice/add', $this->data);
    }

    public function InvoiceEdit(int $id)
    {
        $this->data['user'] = model(UserModels::class)->select('*')->where("deleted_at",null)->findAll();
        $this->data['invoice'] = model(Invoice::class)->where('id',$id)->first();
        $this->data['invoiced'] = model(InvoiceDetail::class)->where('invoicefk',$id)->findAll();
        $this->data['id'] =  $id;
        $this->data['asosiasi'] =  model(Asosiasi::class)->select('*')->findAll(); 
        $this->data['kategoriinvoice'] = model(KategoriInvoice::class)->findAll();
        return view('invoice/edit', $this->data);
    }

    public function store() {
        
        $query = model(Invoice::class)->selectCount('id')->like('expired', date("Y").'-', 'after')->get();
        $result = $query->getRow();
        $urutan = $result->id;        
    
        $untuk = $this->request->getPost('untuk');
        $nama = $this->request->getPost('namainvoice');
        $kategoriinvoicefk = $this->request->getPost('kategoriinvoicefk');
        $status = $this->request->getPost('status') ?? "TAGIHAN";
        $expired = date("Y-m-d",strtotime($this->request->getPost('expired')));
        $tgldibayar = date("Y-m-d",strtotime($this->request->getPost('tgldibayar')));
        $tglinvoice = date("Y-m-d",strtotime($this->request->getPost('tglinvoice')));
        $total = preg_replace("/[^0-9]/", "",$this->request->getPost('total_harga'));       
        

        if($untuk ==  1){
            $Qall = model(UserModels::class)->select('*')->where("deleted_at",null)->where("isadmin",0)->whereNotIn("id", [111, 62, 116, 67, 64, 76])->findAll();

            foreach($Qall as $row){
                
                $tahun = date('Y', strtotime($tglinvoice));
                $bulanAngka = date('m', strtotime($tglinvoice));

                // Format invoice baru
                $noInvoiceBaru = sprintf("INV/SP/%04d/%s/%s", $urutan++, $this->numberToRoman($bulanAngka), $tahun);

                $tglgabung = date("Y/m",strtotime($row->tglgabung));
                // $request['noinvoice'] =  "IV".$tglgabung."/".$this->numberToRoman($row->asosiasifk)."/".$maxId++;
                $request['noinvoice'] =  $noInvoiceBaru;
                $request['expired'] = $expired;
                $request['tgldibayar'] = $tgldibayar;
                $request['tglinvoice'] = date("Y-m-d 00:00:00",strtotime($tglinvoice));
                $request['nama'] = $nama;
                $request['total'] = $total;
                $request['kategoriinvoicefk'] = $kategoriinvoicefk;
                $request['status'] = $status;
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

                $this->sendwa($row->nama,$row->nohp,$noInvoiceBaru,$tglinvoice,$expired,$total);
            }
            
        }else if($untuk == 2){
            $asosiasifk = $this->request->getPost('asosiasifk');
            $tahun = date('Y', strtotime($tglinvoice));
            $bulanAngka = date('m', strtotime($tglinvoice));

            // Format invoice baru
            $noInvoiceBaru = sprintf("INV/SP/%04d/%s/%s", $urutan++, $this->numberToRoman($bulanAngka), $tahun);
            
            $Qall = model(UserModels::class)->select('*')->where("deleted_at",null)->where("asosiasifk",$asosiasifk)->findAll();

            foreach($Qall as $row){
                //$request['noinvoice'] =  "IV".date("Y/m")."/".$this->numberToRoman($row->asosiasifk)."/".$maxId++;
                $request['noinvoice'] =  $noInvoiceBaru;
                $request['expired'] = $expired;
                $request['tglinvoice'] = date("Y-m-d 00:00:00",strtotime($tglinvoice));
                $request['nama'] = $nama;
                $request['total'] = $total;
                $request['kategoriinvoicefk'] = $kategoriinvoicefk;
                $request['status'] = $status;
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
                $this->sendwa($row->nama,$row->nohp,$noInvoiceBaru,$tglinvoice,$expired,$total);
            }
        }else if($untuk == 3){
            $asosiasifk = $this->request->getPost('asosiasifk');
            $usersfk = $this->request->getPost('usersfk');
            $Qall = model(UserModels::class)->select('*')->where("deleted_at",null)->where("id",$usersfk)->first(); 
            $tahun = date('Y', strtotime($tglinvoice));
            $bulanAngka = date('m', strtotime($tglinvoice));

            // Format invoice baru
            $noInvoiceBaru = sprintf("INV/SP/%04d/%s/%s", $urutan++, $this->numberToRoman($bulanAngka), $tahun);
                    
            $request['noinvoice'] =  $noInvoiceBaru;
            $request['expired'] = $expired;
            $request['tglinvoice'] = date("Y-m-d 00:00:00",strtotime($tglinvoice));
            $request['nama'] = $nama;
            $request['total'] = $total;
            $request['kategoriinvoicefk'] = $kategoriinvoicefk;
            $request['status'] = $status;
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

            $this->sendwa($Qall->nama,$Qall->nohp,$noInvoiceBaru,$tglinvoice,$expired,$total);
            
        }

        return $this->respondCreated([
            'status' => true,
            //'sendwa' => $result,
            'messages' => 'Data invoice berhasil ditambahkan.',
        ]);
    }

    public function sendwa($nama,$nohp,$noInvoiceBaru,$tglinvoice,$expired,$total){
        $curl = curl_init();

        $nohp = preg_replace('/^08/', '628', $nohp);

        // Your API credentials
        $token = "I0bhH8HpmnBQ71P4ySvGYOJq2yF0YZg4DWVZlxM1wEYF9Hl1lsGo7oX";
        $secret_key = "GificTm4";

        $jamSekarang = date('H');

        if ($jamSekarang >= 5 && $jamSekarang < 12) {
            $salam = "Selamat Pagi";
        } elseif ($jamSekarang >= 12 && $jamSekarang < 15) {
            $salam = "Selamat Siang";
        } elseif ($jamSekarang >= 15 && $jamSekarang < 18) {
            $salam = "Selamat Sore";
        } else {
            $salam = "Selamat Malam";
        }

        // Prepare message data for multiple recipients
        $payload = [
            "data" => [
                [
                    'phone' => $nohp,
                    'message' => $salam.' Bp/ibu '.$nama.'\n*Pemberitahuan Invoice Baru.*\nNo Invoice : *'.$noInvoiceBaru.'\nNama   : *'.$nama.'*\nTotal   : *'.rupiah($total).'*\nTgl Invoice : '.date('d-m-Y',strtotime($tglinvoice)).'\nTgl Jatuh Tempo : '.date('d-m-Y',strtotime($expired)).'\n\nSilahkan kirimkan bukti transfer ke nomor ini \nTerima Kasih.',
                    'isGroup' => 'false'
                ]
            ]
        ];

        // Set up the API request headers
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: $token.$secret_key",
            "Content-Type: application/json"
        ]);

        // Configure cURL options
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($curl, CURLOPT_URL, "https://tegal.wablas.com/api/v2/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        // Execute the request
        $result = curl_exec($curl);

        // Check for errors
        if(curl_errno($curl)) {
            echo 'Request failed: ' . curl_error($curl);
        }

        // Close cURL session
        curl_close($curl);
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
        $request['kategoriinvoicefk'] = $this->request->getPost('kategoriinvoice');
        $request['id'] = $id;
        model(Invoice::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data invoice berhasil diubah.',
        ]);
    }

    public function lunaskan($id) {

        $request['status'] = "LUNAS";
        $request['tgldibayar'] = date("Y-m-d H:i:s",strtotime($this->request->getPost('tgldibayar')));
        $request['id'] = $id;
        model(Invoice::class)->save($request);

        $Qinvoice = model(Invoice::class)
                ->select('*')
                ->where('id',$id)->first();
        
        $Quser = model(UserModels::class)->select('*')->where("id",$Qinvoice->usersfk)->first(); 

        $curl = curl_init();

        $nohp = preg_replace('/^08/', '628', $Quser->nohp);
        $nama = $Quser->nama;

        // Your API credentials
        $token = "I0bhH8HpmnBQ71P4ySvGYOJq2yF0YZg4DWVZlxM1wEYF9Hl1lsGo7oX";
        $secret_key = "GificTm4";

        $jamSekarang = date('H');

        if ($jamSekarang >= 5 && $jamSekarang < 12) {
            $salam = "Selamat Pagi";
        } elseif ($jamSekarang >= 12 && $jamSekarang < 15) {
            $salam = "Selamat Siang";
        } elseif ($jamSekarang >= 15 && $jamSekarang < 18) {
            $salam = "Selamat Sore";
        } else {
            $salam = "Selamat Malam";
        }

        // Prepare message data for multiple recipients
        $payload = [
            "data" => [
                [
                    'phone' => $nohp,
                    'message' => $salam.' Bp/ibu '.$nama.'\n*Pemberitahuan Transaksi Invoice.*\nNo Invoice : *'.$Qinvoice->noinvoice.'*\nNama   : '.$nama.'\nTotal   : *'.rupiah($Qinvoice->total).'*\nTgl Invoice : '.date('d-m-Y',strtotime($Qinvoice->tglinvoice)).'\nTelah dibayar *LUNAS* pada : '.date('d-m-Y',strtotime($Qinvoice->tgldibayar)).'\n\nTerima Kasih.',
                    'isGroup' => 'false'
                ]
            ]
        ];

        // Set up the API request headers
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: $token.$secret_key",
            "Content-Type: application/json"
        ]);

        // Configure cURL options
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($curl, CURLOPT_URL, "https://tegal.wablas.com/api/v2/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        // Execute the request
        $result = curl_exec($curl);

        // Check for errors
        if(curl_errno($curl)) {
            echo 'Request failed: ' . curl_error($curl);
        }

        // Close cURL session
        curl_close($curl);

        
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data invoice berhasil diubah.',
        ]);
    }

    public function checkstatus($id){
        $server_key = 'SB-Mid-server-c_BeG1nsGdJxwveXVqhagZOu';

        $QOrder_id = model(TransactionModel::class)
                ->select('max(id) as id')
                ->where('invoicefk',$id)->first();

        $order_id = $QOrder_id->id;

        // Midtrans API endpoint
        $url = "https://api.sandbox.midtrans.com/v2/{$order_id}/status";

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
            return $this->respondUpdated([
                'status' => false,
                'messages' => 'Gagal Menghubungkan ke server.'.curl_error($ch),
            ]);
            
        } else {
            // Decode the JSON response
            // print_r($response);
            // exit;
            $response_data = json_decode($response, true);

            $request['request'] = $response;        
            model(LogNotificationModel::class)->insert($request);  

            $dataupdate['periode'] = $response_data['transaction_status'];
            $dataupdate['type'] = $response_data['payment_type'];
            $dataupdate['updatemidtrans'] = date("Y-m-d H:i:s");
            $dataupdate['fraudstatus'] = $response_data['fraud_status'];
            if($response_data['order_id']){
                $dataupdate['id'] = $response_data['order_id'];
                model(TransactionModel::class)->save($dataupdate);

                $Qtransaction = model(TransactionModel::class)
                ->select('invoicefk')
                ->where('id',$response_data['order_id'])->first();

                if($response_data['transaction_status'] == 'capture' || $response_data['transaction_status'] == 'settlement'){
                    $datainvoice['status'] = 'LUNAS';
                    $datainvoice['id'] = $Qtransaction->invoicefk;
                    model(Invoice::class)->save($datainvoice);
                }else{
                    $datainvoice['status'] = $response_data['transaction_status'];
                    $datainvoice['id'] = $Qtransaction->invoicefk;
                    model(Invoice::class)->save($datainvoice);
                }
            }

            return $this->respondUpdated([
                'status' => true,
                'messages' => 'Data invoice berhasil diubah.',
            ]);
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
