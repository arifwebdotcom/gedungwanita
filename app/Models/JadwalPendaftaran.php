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

    public function getDaftarTransaksi($kategori,$kelas, $numrows){
        $builder = $this
            ->select("jadwalpendaftaran_t.*,member_m.nama,member_m.jeniskelamin,member_m.tgllahir,kategori_m.namakategori,kelas_m.kelas,pendaftaran_t.status")
            ->join('pendaftaran_t','pendaftaran_t.id=jadwalpendaftaran_t.pendaftaranfk')
            ->join('kelas_m','kelas_m.id=jadwalpendaftaran_t.kelasfk')
            ->join('kategori_m','kategori_m.id=jadwalpendaftaran_t.kategorifk')
            ->join('member_m','member_m.id=pendaftaran_t.memberfk')
            ->when($kategori, static function ($query, $kategori) {
                $query->like('jadwalpendaftaran_t.kategorifk', $kategori);
            })
            ->when($kelas, static function ($query, $kelas) {
                $query->like('jadwalpendaftaran_t.kelasfk', $kelas);
            })        
            ->orderBy('jadwalpendaftaran_t.tanggal', 'DESC')
            ->findAll($numrows);
            return $builder;         
    }

    public function getDaftarTransaksiVendor($status,$bulan){
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
    
    

}