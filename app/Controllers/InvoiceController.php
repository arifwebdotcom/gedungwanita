<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Invoice;
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
        ->join('users','users.id=invoice_t.user_id')
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

    public function InvoiceBaru()
    {
        $data['user'] = model(UserModels::class)
        ->select('users.*,alamat_m.*,suplierpakan_m.nama,suplierpakan_m.id as idsuplierpakan')
        ->join('alamat_m','alamat_m.usersfk = users.id','left')
        ->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id','left')
        ->where('users.id',user()->id)->first();
        $data['id'] =  user()->id;
        $data['suplierpakan'] =  $this->suplier;
        $data['asosiasi'] =  model(Asosiasi::class)->select('*')->findAll(); 
        $data['suplierpakan'] =  $this->suplier;
        return view('invoice/add', $data);
    }

    public function store() {
        
        $query = model(Invoice::class)->selectMax('id')->get();
        $result = $query->getRow();
        $maxId = $result->id;

        $request['noinvoice'] =  "P".date("Ym")."/".$this->numberToRoman($this->request->getPost('asosiasi'))."/".$maxId+1;
        $request['populasi'] = $this->request->getPost('populasi');
        $request['kebutuhan'] = $this->request->getPost('kebutuhan');
        $request['statuskeanggotaan'] = $this->request->getPost('statuskeanggotaan');
        $request['keterangan'] = $this->request->getPost('keterangan');
        $request['user_id'] = $this->request->getPost('user_id');
        $request['periode'] = $this->request->getPost('periode');
        $request['tahun'] = date("Y");
        
        model(Invoice::class)->insert($request);

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

    public function delete($id)
    {
        model(Invoice::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data invoice berhasil diubah.',
        ]);
    }
}
