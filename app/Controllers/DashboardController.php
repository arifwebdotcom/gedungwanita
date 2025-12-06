<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Booking;
use App\Models\Setting;
use App\Models\Asosiasi;
use App\Models\Client;

use CodeIgniter\API\ResponseTrait;

class DashboardController extends BaseController
{
    use ResponseTrait;

    public function index(){
        $this->data['tahunini'] = model(Booking::class)
        ->select('sum(hargadeal) as total_harga, sum(lainlain) as lainlain,count(clientfk) as total_client') 
        ->where('YEAR(tanggal)', date('Y'))
        ->first();

        $this->data['piutang'] = model(Booking::class)
            ->select("
                booking_t.id,
                booking_t.hargadeal,
                booking_t.lainlain,
                (booking_t.hargadeal + booking_t.lainlain) AS total_tagihan,
                COALESCE(SUM(t.nominal), 0) AS total_bayar,
                (booking_t.hargadeal + booking_t.lainlain - COALESCE(SUM(t.nominal), 0)) AS piutang
            ")
            ->join('booking_transaksi_t t', 't.bookingfk = booking_t.id AND t.deleted_at IS NULL', 'left')
            //->where('YEAR(booking_t.tanggal)', $year)
            ->groupBy('booking_t.id')
            ->get()
            ->getResult();
       
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


        $bookingModel = new Booking();
        $query = $bookingModel
            ->select("
                DATE_FORMAT(tanggal, '%Y-%m') AS bulan,
                SUM(booking_t.hargadeal + booking_t.lainlain) AS total_tagihan,
                COALESCE(SUM(t.nominal), 0) AS total_bayar,
                SUM(booking_t.hargadeal + booking_t.lainlain) - COALESCE(SUM(t.nominal), 0) AS total_piutang
            ")
            ->join('booking_transaksi_t t', 't.bookingfk = booking_t.id AND t.deleted_at IS NULL', 'left')
            ->where('YEAR(booking_t.tanggal) >=', $start)
            ->where('YEAR(booking_t.tanggal) <=', $end)
            ->groupBy('MONTH(booking_t.tanggal)')
            ->orderBy('MONTH(booking_t.tanggal)', 'ASC')
            ->get()
            ->getResultArray();

        foreach ($query as &$rows) {
            $parts = explode('-', $rows['bulan']); // [0]=tahun , [1]=bulan

            $tahun = $parts[0];
            $bulan = $parts[1];

            $rows['bulan_indonesia'] = $months[$bulan] . " " . $tahun;

            $rows['total_tagihan']  = (int) $rows['total_tagihan'];
            $rows['total_bayar']    = (int) $rows['total_bayar'];
            $rows['total_piutang'] = (int) $rows['total_piutang'];
        }

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
        $arr = array('datapiutang'=>$query,'dataclient'=>$data);

        return $this->respond($arr);
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