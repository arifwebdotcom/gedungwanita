<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Client;
use App\Models\Tipe;
use App\Models\Paket;
use App\Models\Pendaftaran;
use App\Models\JadwalPendaftaran;
use CodeIgniter\API\ResponseTrait;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanController extends BaseController
{
    use ResponseTrait;

    public function datatable() {
        $kategori = $this->request->getVar('kategori');
        $keywords = $this->request->getVar('keywords');
        $kelas = $this->request->getVar('kelas');
        $numrows = $this->request->getVar('numrows');
        $bulan = $this->request->getVar('bulan');
        $data = model(Client::class)->getDaftarTransaksi($kategori,$kelas, $numrows, $keywords,$bulan);

        return json_encode(compact('data'));
    }    

    public function index()
    {       
        $this->data['tipe'] = model(name: Tipe::class)->findAll();
        $this->data['paket'] = model(Paket::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/laporan/index',$this->data);
    }

    public function export() {

        $kategori = $this->request->getVar('kategori');
        $keywords = $this->request->getVar('keywords');
        $kelas = $this->request->getVar('kelas');
        $numrows = $this->request->getVar('numrows');
        $bulan = $this->request->getVar('bulan');
        $data = model(Client::class)->getDaftarTransaksi($kategori,$kelas, $numrows, $keywords,$bulan);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // ========== HEADER ==========
        $headers = [
            'A1' => 'No',
            'B1' => 'Hari & Tanggal',
            'C1' => 'Jml Tamu',
            'D1' => 'Katering',
            'E1' => 'EO',
            'F1' => 'Harga Deal',
            'G1' => 'Lain-lain',
            'H1' => 'Total Pendapatan',
            'I1' => 'Penyewa'
        ];

        foreach ($headers as $col => $text) {
            $sheet->setCellValue($col, $text);
        }

        // ========== DATA ==========
        $rowNumber = 2;

        $namaHari = [
            "Minggu", "Senin", "Selasa", "Rabu",
            "Kamis", "Jumat", "Sabtu"
        ];

        $namaBulan = [
            "Januari", "Februari", "Maret", "April",
            "Mei", "Juni", "Juli", "Agustus",
            "September", "Oktober", "November", "Desember"
        ];

        $i = 1;
        foreach ($data as $d) {

            $dateObj = strtotime($d->tanggal);
            $hari  = $namaHari[date('w', $dateObj)];
            $tanggal = date('j', $dateObj);
            $bulan = $namaBulan[date('n', $dateObj) - 1];
            $tahun = date('Y', $dateObj);

            $tanggalIndo = "$hari, $tanggal $bulan $tahun";

            // Hitung Total Pendapatan
            $hargaDeal  = (int) $d->hargadeal;
            $lainLain   = (int) $d->lainlain;
            $totalPendapatan = $hargaDeal + $lainLain;

            $sheet->setCellValue('A' . $rowNumber, $i++);
            $sheet->setCellValue('B' . $rowNumber, $tanggalIndo." ".$d->sesi );
            $sheet->setCellValue('C' . $rowNumber, $d->kursi);
            $sheet->setCellValue('D' . $rowNumber, $d->katering);
            $sheet->setCellValue('E' . $rowNumber, $d->eo);
            $sheet->setCellValue('F' . $rowNumber, $hargaDeal);
            $sheet->setCellValue('G' . $rowNumber, $lainLain);
            $sheet->setCellValue('H' . $rowNumber, $totalPendapatan);
            $sheet->setCellValue('I' . $rowNumber, $d->pemesan);

            $sheet->getStyle('F'.$rowNumber)
                ->getNumberFormat()
                ->setFormatCode('#,##0');

            $sheet->getStyle('G'.$rowNumber)
                ->getNumberFormat()
                ->setFormatCode('#,##0');

            $sheet->getStyle('H'.$rowNumber)
                ->getNumberFormat()
                ->setFormatCode('#,##0');
            $rowNumber++;

        }

        // Simpan file
        $filename = 'laporan_' . $bulan . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        return $this->response->download($filename, null)->setFileName($filename);
    }    

    public function exportpembayaran() {

        $kategori = $this->request->getVar('kategori');
        $keywords = $this->request->getVar('keywords');
        $kelas = $this->request->getVar('kelas');
        $numrows = $this->request->getVar('numrows');
        $bulan = $this->request->getVar('bulan');
        $data = model(Client::class)->getDaftarTransaksiPembayaran($kategori,$kelas, $numrows, $keywords,$bulan);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // ========== HEADER ==========
        $headers = [
            'A1' => 'No',
            'B1' => 'Hari & Tanggal',
            'C1' => 'Jml Tamu',
            'D1' => 'Harga Deal',
            'E1' => 'Lain-lain',
            'F1' => 'Total Pendapatan',
            'G1' => 'Sudah Bayar',
            'H1' => 'Piutang',
            'I1' => 'Penyewa'
        ];

        foreach ($headers as $col => $text) {
            $sheet->setCellValue($col, $text);
        }

        // ========== DATA ==========
        $rowNumber = 2;

        $namaHari = [
            "Minggu", "Senin", "Selasa", "Rabu",
            "Kamis", "Jumat", "Sabtu"
        ];

        $namaBulan = [
            "Januari", "Februari", "Maret", "April",
            "Mei", "Juni", "Juli", "Agustus",
            "September", "Oktober", "November", "Desember"
        ];

        $i = 1;
        foreach ($data as $d) {

            $dateObj = strtotime($d->tanggal);
            $hari  = $namaHari[date('w', $dateObj)];
            $tanggal = date('j', $dateObj);
            $bulan = $namaBulan[date('n', $dateObj) - 1];
            $tahun = date('Y', $dateObj);

            $tanggalIndo = "$hari, $tanggal $bulan $tahun";

            // Hitung Total Pendapatan
            $hargaDeal  = (int) $d->hargadeal;
            $lainLain   = (int) $d->lainlain;
            $totalPendapatan = $hargaDeal + $lainLain;

            $sheet->setCellValue('A' . $rowNumber, $i++);
            $sheet->setCellValue('B' . $rowNumber, $tanggalIndo." ".$d->sesi );
            $sheet->setCellValue('C' . $rowNumber, $d->kursi);
            $sheet->setCellValue('D' . $rowNumber, $hargaDeal);
            $sheet->setCellValue('E' . $rowNumber, $lainLain);
            $sheet->setCellValue('F' . $rowNumber, $totalPendapatan);
            $sheet->setCellValue('G' . $rowNumber, $d->total_bayar);
            $sheet->setCellValue('H' . $rowNumber, $d->piutang);
            $sheet->setCellValue('I' . $rowNumber, $d->pemesan);

            $sheet->getStyle('D'.$rowNumber)
                ->getNumberFormat()
                ->setFormatCode('#,##0');

            $sheet->getStyle('E'.$rowNumber)
                ->getNumberFormat()
                ->setFormatCode('#,##0');

            $sheet->getStyle('F'.$rowNumber)
                ->getNumberFormat()
                ->setFormatCode('#,##0');

            $sheet->getStyle('G'.$rowNumber)
                ->getNumberFormat()
                ->setFormatCode('#,##0');

            $sheet->getStyle('H'.$rowNumber)
                ->getNumberFormat()
                ->setFormatCode('#,##0');
            $rowNumber++;

        }

        // Simpan file
        $filename = 'laporan_pembayaran_' . $bulan . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        return $this->response->download($filename, null)->setFileName($filename);
    }    

    public function datatablepembayaran() {
        $kategori = $this->request->getVar('kategori');
        $keywords = $this->request->getVar('keywords');
        $kelas = $this->request->getVar('kelas');
        $numrows = $this->request->getVar('numrows');
        $bulan = $this->request->getVar('bulan');
        $data = model(Client::class)->getDaftarTransaksiPembayaran($kategori,$kelas, $numrows, $keywords,$bulan);


        return json_encode(compact('data'));
    }    

    public function pembayaran()
    {
        $this->data['tipe'] = model(name: Tipe::class)->findAll();
        $this->data['paket'] = model(Paket::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/laporan/pembayaran',$this->data);
    }


    public function datatablevendor() {
        $status = $this->request->getVar('status');
        $bulan = $this->request->getVar('bulan');
        $nama = $this->request->getVar('nama');
        $data = model(JadwalPendaftaran::class)->getDaftarTransaksiVendor($status,$bulan,$nama);

        return json_encode(compact('data'));
    }    
    
    public function datatablebiayaadmin() {
        $status = $this->request->getVar('status');
        $bulan = $this->request->getVar('bulan');
        $data = model(JadwalPendaftaran::class)->getDaftarTransaksiBiayaAdmin($status,$bulan);

        return json_encode(compact('data'));
    }    

    public function vendor()
    {
        $this->data['laporan'] = model(JadwalPendaftaran::class)->findAll();
        $this->data['kategori'] = model(Kategori::class)->findAll();
        $this->data['kelas'] = model(Kelas::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/laporan/vendor',$this->data);
    }
    
    
    public function biayaadmin()
    {
        $this->data['laporan'] = model(JadwalPendaftaran::class)->findAll();
        $this->data['kategori'] = model(Kategori::class)->findAll();
        $this->data['kelas'] = model(Kelas::class)->findAll();

        // print_r(json_encode(compact('data')));
        return view('master/laporan/biayaadmin',$this->data);
    }

    public function store() {
        // $setRules = [            
        //     'laporan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom laporan wajib diisi.'
        //         ],
        //     ],
        // ];  

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $request['laporan'] = $this->request->getPost('laporan');
        model(JadwalPendaftaran::class)->insert($request);

        return $this->respondCreated([
            'status' => true,
            'messages' => 'Data laporan berhasil ditambahkan.',
        ]);
    }

    public function update($id) {
        // $setRules = [            
        //     'laporan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Kolom laporan wajib diisi.'
        //         ],
        //     ],
        // ];

        // if (!$this->validate($setRules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }
        
        $request['laporan'] = $this->request->getPost('laporan');
        $request['id'] = $id;
        model(JadwalPendaftaran::class)->save($request);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data laporan berhasil diubah.',
        ]);
    }

    public function updatepembayaran($id) {       
        
        $request['jumlahbayar'] = $this->request->getPost('jumlahbayar');
        $request['status'] = $this->request->getPost('status');
        $request['tglbayar'] = $this->request->getPost('tglbayar');
        $request['id'] = $id;
        model(Pendaftaran::class)->save($request);

        $namaanak = $this->request->getPost('namaanak');

        $requesttransaksi['jumlah'] = $this->request->getPost('jumlahbayar');
        $requesttransaksi['transaksi'] = "Pembayaran atas nama ".$namaanak;
        $requesttransaksi['userfk'] = user()->id;
        $requesttransaksi['jenis'] = "D";
        $requesttransaksi['pendaftaranfk'] = $id;
        model(Transaksi::class)->save($requesttransaksi);

        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data laporan berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        model(Pendaftaran::class)->where('id', $id)->delete();
        return $this->respondUpdated([
            'status' => true,
            'messages' => 'Data laporan berhasil diubah.',
        ]);
    }
}
