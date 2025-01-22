<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengajuan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengajuan_t';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'user_id', 'populasi','kebutuhan','disetujui','keterangan','periodefk','tahun','statuskeanggotaan','nopengajuan','status'];

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


    public function get_tahunpengajuan(){
        $builder = $this->select('tahun')
        ->groupBy('tahun')->findAll();
        return $builder;
    }
    public function get_pengajuan_all($nopengajuan, $tahun, $asosiasi, $numrows)
    {
        $builder = $this
            ->select('pengajuan_t.id as idpengajuan,pengajuan_t.*,users.username,users.nohp,users.populasi,asosiasi_m.asosiasi,alamat_m.*,periode_t.nama as periode,periode_t.hargasekilo,users.asosiasifk')
            ->join('users','users.id=pengajuan_t.user_id','left')
            ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk','left')
            ->join('alamat_m','alamat_m.usersfk = users.id','left')
            ->join('periode_t','periode_t.id = pengajuan_t.periodefk','left')
            //->where('pengajuan_t.user_id', user()->klienfk)
            ->when($nopengajuan, static function ($query, $nopengajuan) {
                $query->like('pengajuan_t.nopengajuan', $nopengajuan);
            })
            ->when($nopengajuan, static function ($query, $nopengajuan) {
                $query->like('pengajuan_t.nopengajuan', $nopengajuan);
            })
            ->when($tahun, static function ($query, $tahun) {
                $query->like('pengajuan_t.tahun', $tahun);
            })
            ->when($asosiasi, static function ($query, $asosiasi) {
                $query->like('users.asosiasifk', $asosiasi);
            })
            ->orderBy('pengajuan_t.id', 'DESC')
            ->findAll($numrows);
        return $builder;
    }

    public function get_pengajuan_user($nopengajuan, $tahun, $asosiasi, $numrows)
    {

        // select pengajuan_t.id as idpengajuan,pengajuan_t.*,users.username,users.nohp,users.populasi,asosiasi_m.asosiasi,alamat_m.*
        // from pengajuan_t join users on users.id=pengajuan_t.user_id join asosiasi_m on asosiasi_m.id=users.asosiasifk join alamat_m on alamat_m.usersfk = users.id
        // where pengajuan_t.user_id=24
        $builder = $this
            ->select('pengajuan_t.id as idpengajuan,pengajuan_t.*,users.username,users.nohp,users.populasi,asosiasi_m.asosiasi,alamat_m.*,periode_t.nama as periode,periode_t.hargasekilo,users.asosiasifk')
            ->join('users','users.id=pengajuan_t.user_id')
            ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk')
            ->join('alamat_m','alamat_m.usersfk = users.id','left')
            ->join('periode_t','periode_t.id = pengajuan_t.periodefk','left')
            ->where('pengajuan_t.user_id', user()->id)
            ->when($nopengajuan, static function ($query, $nopengajuan) {
                $query->like('pengajuan_t.nopengajuan', $nopengajuan);
            })
            ->when($nopengajuan, static function ($query, $nopengajuan) {
                $query->like('pengajuan_t.nopengajuan', $nopengajuan);
            })
            ->when($tahun, static function ($query, $tahun) {
                $query->like('pengajuan_t.tahun', $tahun);
            })
            ->when($asosiasi, static function ($query, $asosiasi) {
                $query->like('users.asosiasifk', $asosiasi);
            })
            ->orderBy('pengajuan_t.id', 'DESC')
            ->findAll($numrows);
        return $builder;
    }

}