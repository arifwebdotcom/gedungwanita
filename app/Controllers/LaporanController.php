<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Invoice;
use CodeIgniter\API\ResponseTrait;

class LaporanController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $kodeanggota = $this->request->getVar('kodeanggota');
        $namaanggota = $this->request->getVar('namaanggota');
        $namapeternakan = $this->request->getVar('namapeternakan');
        $tahun = $this->request->getVar('tahun');
        $numrows = $this->request->getVar('numrows');
        $data = model(Invoice::class)->getSetoranPerAnggota($kodeanggota,$namaanggota,$namapeternakan, $tahun, $numrows);
    
        return json_encode(compact('data'));
    }

    public function exportPengajuan()
    {
        $kodeanggota = $this->request->getVar('kodeanggota');
        $namaanggota = $this->request->getVar('namaanggota');
        $namapeternakan = $this->request->getVar('namapeternakan');
        $tahun = $this->request->getVar('tahun');
        $numrows = $this->request->getVar('numrows');
        $data = model(Invoice::class)->getSetoranPerAnggota($kodeanggota,$namaanggota,$namapeternakan, $tahun, $numrows);

        $data = json_decode(json_encode($data), true);
        //return $data;
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set header row values
        $sheet->setCellValue('A1', 'Kode Anggota');
        $sheet->setCellValue('B1', 'Nama Anggota');
        $sheet->setCellValue('C1', 'Nama Peternakan');
        $sheet->setCellValue('D1', 'Jumlah Setoran');
        $sheet->setCellValue('E1', 'Jumlah Tunggakan');
        // Add more columns as needed 

        // Populate data rows
        $row = 2; // Starting from the second row
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['kodeanggota']);
            $sheet->setCellValue('B' . $row, $item['nama']);
            $sheet->setCellValue('C' . $row, $item['namapeternakan']);
            $sheet->setCellValue('D' . $row, rupiah($item['setoran']));
            $sheet->setCellValue('E' . $row, rupiah($item['tunggakan']));            
            // Add more columns as needed
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Setoran Anggota.xlsx';

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

    public function terbesar()
    {
        $this->data['tahun'] = model(Invoice::class)->get_tahuninvoice();
        return view('laporan/terbesar',$this->data);
    }

}