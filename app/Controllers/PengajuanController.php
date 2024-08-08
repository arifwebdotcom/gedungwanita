<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengajuan;
use App\Models\UserModels;
use App\Models\Asosiasi;
use App\Models\Periode;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use CodeIgniter\API\ResponseTrait;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\HTTP\ResponseInterface;


class PengajuanController extends BaseController
{
    use ResponseTrait;

    public function getPengajuan() {
        $nopengajuan = $this->request->getVar('nopengajuan');
        $tahun = $this->request->getVar('tahun');
        $asosiasi = $this->request->getVar('asosiasi');
        $numrows = $this->request->getVar('numrows');
        $isadmin = user()->isadmin;        

        if($isadmin == 1){
            $data = model(Pengajuan::class)->get_pengajuan_all($nopengajuan, $tahun, $asosiasi, $numrows);
        }else{
            $data = model(Pengajuan::class)->get_pengajuan_user($nopengajuan, $tahun, $asosiasi, $numrows);
        }
        
        return json_encode(compact('data'));
    }
    public function datatable() {
        $data = model(Pengajuan::class)->select('pengajuan_t.id as idpengajuan,pengajuan_t.*,users.username,users.nohp,users.populasi,asosiasi_m.asosiasi,alamat_m.*')
        ->join('users','users.id=pengajuan_t.user_id')
        ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk')
        ->join('alamat_m','alamat_m.usersfk = users.id','left')->findAll();

        return json_encode(compact('data'));
    }

    public function exportPengajuan()
    {
        $nopengajuan = $this->request->getVar('nopengajuan');
        $tahun = $this->request->getVar('tahun');
        $asosiasi = $this->request->getVar('asosiasi');
        $numrows = $this->request->getVar('numrows');
        $isadmin = user()->isadmin;        

        if($isadmin == 1){
            $data = model(Pengajuan::class)->get_pengajuan_all($nopengajuan, $tahun, $asosiasi, $numrows);
        }else{
            $data = model(Pengajuan::class)->get_pengajuan_user($nopengajuan, $tahun, $asosiasi, $numrows);
        }

        $data = json_decode(json_encode($data), true);
        //return $data;
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set header row values
        $sheet->setCellValue('A1', 'Tahun');
        $sheet->setCellValue('B1', 'Periode');
        $sheet->setCellValue('C1', 'Nomor Pengajuan');
        $sheet->setCellValue('D1', 'Nama Peteranak');
        $sheet->setCellValue('E1', 'Asosiasi');
        $sheet->setCellValue('F1', 'Alamat');
        $sheet->setCellValue('G1', 'No HP');
        $sheet->setCellValue('H1', 'Populasi');
        $sheet->setCellValue('I1', 'Kebutuhan');
        $sheet->setCellValue('J1', 'Disetujui');
        $sheet->setCellValue('K1', 'Harga Perkilo');
        $sheet->setCellValue('L1', 'Harga Total');
        $sheet->setCellValue('M1', 'Keterangan');
        $sheet->setCellValue('N1', 'Status');
        // Add more columns as needed 

        // Populate data rows
        $row = 2; // Starting from the second row
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['tahun']);
            $sheet->setCellValue('B' . $row, $item['periode']);
            $sheet->setCellValue('C' . $row, $item['nopengajuan']);
            $sheet->setCellValue('D' . $row, $item['username']);
            $sheet->setCellValue('E' . $row, $item['asosiasi']);
            $sheet->setCellValue('F' . $row, $item['alamat']);
            $sheet->setCellValue('G' . $row, $item['nohp']);
            $sheet->setCellValue('H' . $row, $item['populasi']);
            $sheet->setCellValue('I' . $row, $item['kebutuhan']);
            $sheet->setCellValue('J' . $row, $item['disetujui']);
            $sheet->setCellValue('K' . $row, $item['hargasekilo']);
            $sheet->setCellValue('L' . $row, $item['disetujui']*$item['hargasekilo']);
            $sheet->setCellValue('M' . $row, $item['keterangan']);
            $sheet->setCellValue('N' . $row, $item['status']);
            // Add more columns as needed
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'pengajuan.xlsx';

        $response = $this->response->setContentType('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                                   ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"');

        $writer->save('php://output');

        return $response;
        

        // Redirect output to a client’s web browser (Xlsx)
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment;filename="' . $filename . '"');
        // header('Cache-Control: max-age=0');
        // // If you're serving to IE 9, then the following may be needed
        // header('Cache-Control: max-age=1');

        // $writer->save('php://output');
        // die;
    }

    public function index()
    {
        $this->data['tahun'] = model(Pengajuan::class)->get_tahunpengajuan();
        $this->data['pengajuan'] = model(Pengajuan::class)->findAll();
        $this->data['asosiasi'] = model(Asosiasi::class)->findAll();


        // print_r(json_encode(compact('data')));
        return view('pengajuan/index',$this->data);
    }

    public function PengajuanBaru()
    {
        $this->data['user'] = model(UserModels::class)
        ->select('users.*,alamat_m.*,suplierpakan_m.nama,suplierpakan_m.id as idsuplierpakan')
        ->join('alamat_m','alamat_m.usersfk = users.id','left')
        ->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id','left')
        ->where('users.id',user()->id)->first();
        $this->data['id'] =  user()->id;
        $this->data['suplierpakan'] =  $this->suplier;
        $this->data['asosiasi'] =  model(Asosiasi::class)->select('*')->findAll(); 
        $this->data['periode'] =  model(Periode::class)->select('*')->findAll(); 
        $this->data['suplierpakan'] =  $this->suplier;
        return view('pengajuan/add', $this->data);
    }

    public function PengajuanUbah($id)
    {
        $this->data['user'] = model(UserModels::class)
        ->select('users.*,alamat_m.*,suplierpakan_m.nama,suplierpakan_m.id as idsuplierpakan')
        ->join('alamat_m','alamat_m.usersfk = users.id','left')
        ->join('suplierpakan_m','users.suplierpakanfk = suplierpakan_m.id','left')
        ->where('users.id',user()->id)->first();
        $this->data['id'] =  user()->id;
        $this->data['suplierpakan'] =  $this->suplier;
        $this->data['asosiasi'] =  model(Asosiasi::class)->select('*')->findAll(); 
        $this->data['periode'] =  model(Periode::class)->select('*')->findAll(); 
        $this->data['suplierpakan'] =  $this->suplier;
        return view('pengajuan/add', $this->data);
    }

    public function store() {
        
        $query = model(Pengajuan::class)->selectMax('id')->get();
        $result = $query->getRow();
        $maxId = $result->id;
        $kebutuhankilo = 1000*$this->request->getPost('kebutuhan');
        $userid = $this->request->getPost('user_id');
        $populasi = $this->request->getPost('populasi');
        $asosiasi = $this->request->getPost('asosiasi');
        $periodefk =  $this->request->getPost('periodefk');

        $request['nopengajuan'] =  "P".date("Ym")."/".$this->numberToRoman($asosiasi)."/".$maxId+1;
        $request['populasi'] = $populasi;
        $request['kebutuhan'] = $kebutuhankilo;
        $request['status'] = "PENDING";
        $request['statuskeanggotaan'] = "Anggota Aktif";
        $request['keterangan'] = $this->request->getPost('keterangan');
        $request['user_id'] = $userid;
        $request['periodefk'] = $periodefk;
        $request['tahun'] = date("Y");
        
        model(Pengajuan::class)->insert($request);

        
        

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data pengajuan berhasil ditambahkan.',
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

        $userid = $this->request->getPost('user_id');
        $populasi = $this->request->getPost('populasi');
        $asosiasi = $this->request->getPost('asosiasifk');
        $periodefk =  $this->request->getPost('periodefk');
        $disetujui =  $this->request->getPost('disetujui');

        $request['disetujui'] = $disetujui;
        $request['status'] = "DISETUJUI";
        $request['keterangan'] = $this->request->getPost('keterangan');
        $request['id'] = $this->request->getPost('id');

        model(Pengajuan::class)->save($request);

        $Qperiode =  model(Periode::class)->where('id',$periodefk)->select('*')->first(); 

        $query = model(Invoice::class)->selectMax('id')->get();
        $result = $query->getRow();
        $maxId = $result->id;
        
        $datainvoice['usersfk'] = $userid;
        $datainvoice['nama'] = "Disetujui Pembelian Jagung untuk populasi ".$populasi." dengan ketentuan ".$disetujui." Kg";        
        $datainvoice['expired'] = $Qperiode->expired;
        $datainvoice['noinvoice'] =  "IV".date("Ym")."/".$this->numberToRoman($asosiasi)."/".$maxId+1;
        $datainvoice['total'] = $disetujui*$Qperiode->hargasekilo;
        $datainvoice['status'] = "TAGIHAN";
        //dd($datainvoice);
        
        $InvoiceDetailModel = new Invoice();
        $InvoiceDetailModel->insert($datainvoice);       
        $invoicefk = $InvoiceDetailModel->getInsertID();

        $invoicedetail['invoicefk'] = $invoicefk;
        $invoicedetail['nama'] = "Pengajuan Pembelian Jagung sejumlah ".$disetujui." Kg";    
        $invoicedetail['qty'] = $disetujui;
        $invoicedetail['harga'] =  $Qperiode->hargasekilo;
        $invoicedetail['subtotal'] = $disetujui*$Qperiode->hargasekilo;
        $invoicedetail['keterangan'] = "Pengajuan Pembelian Jagung sejumlah ".$disetujui." Kg";
        
        model(InvoiceDetail::class)->insert($invoicedetail);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data pengajuan berhasil diubah.',
        ]);
    }

    public function tolak($id) {

        $userid = $this->request->getPost('user_id');
        $populasi = $this->request->getPost('populasi');
        $asosiasi = $this->request->getPost('asosiasifk');
        $periodefk =  $this->request->getPost('periodefk');
        $disetujui =  $this->request->getPost('disetujui');

        $request['disetujui'] = $disetujui;
        $request['status'] = "DITOLAK";
        $request['keterangan'] = $this->request->getPost('keterangan');
        $request['id'] = $this->request->getPost('id');

        model(Pengajuan::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data pengajuan berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Pengajuan::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data pengajuan berhasil diubah.',
        ]);
    }
}
