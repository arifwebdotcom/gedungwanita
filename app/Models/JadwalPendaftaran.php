<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalPendaftaran extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jadwalpendaftaran_t';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getDaftarTransaksi($kategori, $kelas, $numrows, $keywords)
    {
        $builder = $this
            ->select("
                jadwalpendaftaran_t.*,
                member_m.namaortu,
                member_m.nama,
                member_m.jeniskelamin,
                member_m.tgllahir,
                kategori_m.namakategori,
                kelas_m.kelas,
                pendaftaran_t.status,
                pendaftaran_t.mulai,
                pendaftaran_t.selesai,
                pendaftaran_t.perminggu,
                CONCAT(
                    SUM(CASE WHEN jadwalpendaftaran_t.checkin = 1 THEN 1 ELSE 0 END),
                    '/',
                    COUNT(jadwalpendaftaran_t.id)
                ) AS jumlahcheckin,
                GROUP_CONCAT(
                    DISTINCT CONCAT(
                        CASE DAYNAME(jadwalpendaftaran_t.tanggal)
                            WHEN 'Monday' THEN 'Senin'
                            WHEN 'Tuesday' THEN 'Selasa'
                            WHEN 'Wednesday' THEN 'Rabu'
                            WHEN 'Thursday' THEN 'Kamis'
                            WHEN 'Friday' THEN 'Jum\\'at'
                            WHEN 'Saturday' THEN 'Sabtu'
                            WHEN 'Sunday' THEN 'Minggu'
                        END,
                        ' ',
                        DATE_FORMAT(jadwalpendaftaran_t.tanggal, '%H:%i')
                    )
                    ORDER BY jadwalpendaftaran_t.tanggal SEPARATOR ', '
                ) AS pilihanjadwal
            ")
            ->join('pendaftaran_t','pendaftaran_t.id=jadwalpendaftaran_t.pendaftaranfk')
            ->join('kelas_m','kelas_m.id=jadwalpendaftaran_t.kelasfk')
            ->join('kategori_m','kategori_m.id=jadwalpendaftaran_t.kategorifk')
            ->join('member_m','member_m.id=pendaftaran_t.memberfk')
            ->when($kategori, static function ($query, $kategori) {
                $query->like('jadwalpendaftaran_t.kategorifk', $kategori);
            })
            ->when($keywords, static function ($query, $keywords) {
                $query->like('member_m.nama', $keywords);
            })
            ->when($kelas, static function ($query, $kelas) {
                $query->like('jadwalpendaftaran_t.kelasfk', $kelas);
            })
            ->where('jadwalpendaftaran_t.deleted_at IS NULL')
            ->groupBy('jadwalpendaftaran_t.pendaftaranfk')
            ->orderBy('member_m.nama', 'ASC')
            ->findAll($numrows);

        // Tambahkan kolom 'planning' setelah hasil query didapat
        foreach ($builder as $row) {
            $row->planning = $this->hitungPlanningLengkap(
                $row->mulai,
                $row->selesai,
                $row->perminggu
            );
        }

        return $builder;
    }

    public function hitungPlanningLengkap($mulai, $selesai, $perminggu)
    {
        $start = new \DateTime($mulai);
        $end = new \DateTime($selesai);
        $diff = $start->diff($end);

        // Hitung jumlah bulan antara mulai dan selesai
        $bulan = $diff->m + ($diff->y * 12);
        if ($diff->d > 15) $bulan++;

        // Jika tanggal mulai dan selesai sama
        if ($start->format('Y-m-d') === $end->format('Y-m-d')) {
            $bulan = 1;         // tetap dianggap 1 bulan
            $perminggu = 1;     // jadikan 1x seminggu minimal
        }

        $bulan = max($bulan, 1); // minimal 1 bulan

        // Format tanggal ke bahasa Indonesia singkat
        $bulanIndo = [
            'Jan' => 'Jan', 'Feb' => 'Feb', 'Mar' => 'Mar', 'Apr' => 'Apr',
            'May' => 'Mei', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Agu',
            'Sep' => 'Sep', 'Oct' => 'Okt', 'Nov' => 'Nov', 'Dec' => 'Des'
        ];
        $mulaiFmt = strtr($start->format('d M Y'), $bulanIndo);
        $selesaiFmt = strtr($end->format('d M Y'), $bulanIndo);

        return "{$perminggu}x seminggu ({$mulaiFmt} – {$selesaiFmt}, ±{$bulan} bulan)";
    }

    public function getDaftarTransaksiVendor($status,$bulan,$nama){
        $builder = $this
            ->select("jadwalpendaftaran_t.*,member_m.nama,member_m.jeniskelamin,member_m.tgllahir,kategori_m.namakategori,kelas_m.kelas,pendaftaran_t.status
            ,(jadwalpendaftaran_t.biaya * kelas_m.untukvendor / 100) as biaya_vendor, pendaftaran_t.biayapendaftaran as biaya_admin")
            ->join('pendaftaran_t','pendaftaran_t.id=jadwalpendaftaran_t.pendaftaranfk')
            ->join('kelas_m','kelas_m.id=jadwalpendaftaran_t.kelasfk')
            ->join('kategori_m','kategori_m.id=jadwalpendaftaran_t.kategorifk')
            ->join('member_m','member_m.id=pendaftaran_t.memberfk')
            ->where('kelas_m.id',2)
            ->where('kategori_m.tipe','REGULER')
            ->where('jadwalpendaftaran_t.checkin',1)
            ->when($status, static function ($query, $status) {
                $query->like('pendaftaran_t.status', $status);
            })
            ->when($nama, static function ($query, $nama) {
                $query->like('member_m.nama', $nama);
            })
            ->when($bulan, static function ($query, $bulan) {
                $startDate = $bulan . '-01';
                $endDate   = date('Y-m-t', strtotime($bulan . '-01'));

                $query->where('jadwalpendaftaran_t.tanggal >=', $startDate)
                    ->where('jadwalpendaftaran_t.tanggal <=', $endDate);
            })       
            ->orderBy('jadwalpendaftaran_t.tanggal', 'DESC')
            ->findAll();
            return $builder;         
    }
    
    public function getDaftarTransaksiBiayaAdmin($status,$bulan){
        $builder = $this
            ->select("jadwalpendaftaran_t.*,member_m.nama,member_m.jeniskelamin,member_m.tgllahir,kategori_m.namakategori,kelas_m.kelas,pendaftaran_t.status
            ,pendaftaran_t.biayapendaftaran as biayapendaftaran")
            ->join('pendaftaran_t','pendaftaran_t.id=jadwalpendaftaran_t.pendaftaranfk')
            ->join('kelas_m','kelas_m.id=jadwalpendaftaran_t.kelasfk')
            ->join('kategori_m','kategori_m.id=jadwalpendaftaran_t.kategorifk')
            ->join('member_m','member_m.id=pendaftaran_t.memberfk')
            ->where('kelas_m.id',2)
            ->where('kategori_m.tipe','REGULER')
            ->where('jadwalpendaftaran_t.checkin',1)
            ->when($status, static function ($query, $status) {
                $query->like('pendaftaran_t.status', $status);
            })
            ->when($bulan, static function ($query, $bulan) {
                $startDate = $bulan . '-01';
                $endDate   = date('Y-m-t', strtotime($bulan . '-01'));

                $query->where('jadwalpendaftaran_t.tanggal >=', $startDate)
                    ->where('jadwalpendaftaran_t.tanggal <=', $endDate);
            })       
            ->orderBy('jadwalpendaftaran_t.tanggal', 'DESC')
            ->findAll();
            return $builder;         
    }
    
    public function getDaftarTransaksiKelas($kategori,$kelas,$bulan){
        $builder = $this->db->table('pendaftaran_t p')
            ->select('k.namakategori, SUM(p.biaya) AS total_biaya, SUM(p.biayapendaftaran) AS total_biaya_admin, SUM(p.biaya + p.biayapendaftaran) AS omset')
            ->join('kategori_m k', 'k.id = p.kategorifk')
            ->where('p.deleted_at IS NULL')
            ->groupBy('k.namakategori')
            ->when($bulan, static function ($query, $bulan) {
                $startDate = $bulan . '-01';
                $endDate   = date('Y-m-t', strtotime($bulan . '-01'));

                $query->where('p.mulai >=', $startDate)
                    ->where('p.mulai <=', $endDate);
            })  
            ->when($kategori, static function ($query, $kategori) {
                $query->like('p.kategorifk', $kategori);
            })
            ->when($kelas, static function ($query, $kelas) {
                $query->like('p.kelasfk', $kelas);
            })
            ->orderBy('omset', 'DESC')
            ->get()
            ->getResult();

        return $builder;       
    }
    
    

}