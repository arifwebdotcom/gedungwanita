<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Booking;
use App\Models\Setting;
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
        $this->data['userData'] = '-';
        //return view('layouts/app');
        return view('dashboard/dashboard',$this->data);
    }

    public function grouped()
    {
        $start = $this->request->getGet('start_date');
        $end   = $this->request->getGet('end_date');

        // Default awal & akhir tahun ini jika tidak diberikan
        if (!$start || !$end) {
            $start = date('Y-01-01');
            $end   = date('Y-12-31');
        }

        $bookingModel = new Booking();

        // Gunakan alias 'bulan' untuk DATE_FORMAT supaya aman dipakai di GROUP/ORDER
        $builder = $bookingModel->select("
                DATE_FORMAT(tanggal, '%Y-%m') AS bulan,
                SUM(status = 'KEEP')  AS keep_count,
                SUM(status = 'DP')    AS dp_count,
                SUM(status = '50%')   AS fifty_count,
                SUM(status = 'LUNAS') AS lunas_count
            ")
            ->where('tanggal >=', $start)
            ->where('tanggal <=', $end)
            ->groupBy('bulan')                   // gunakan alias
            ->orderBy('bulan', 'ASC');           // gunakan alias

        $data = $builder->get()->getResultArray();

        $months = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        // Optional: pastikan angka dikembalikan sebagai integer (bukan string)
        foreach ($data as &$row) {
            $parts = explode('-', $row['bulan']); // [0]=tahun , [1]=bulan

            $tahun = $parts[0];
            $bulan = $parts[1];

            $row['bulan_indonesia'] = $months[$bulan] . " " . $tahun;

            $row['keep_count']  = (int) $row['keep_count'];
            $row['dp_count']    = (int) $row['dp_count'];
            $row['fifty_count'] = (int) $row['fifty_count'];
            $row['lunas_count'] = (int) $row['lunas_count'];
        }

        return $this->respond($data);
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