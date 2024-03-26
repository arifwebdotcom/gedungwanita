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
    protected $allowedFields    = ['id', 'user_id', 'populasi','kebutuhan','disetujui','keterangan','periode','tahun','statuskeanggotaan'];

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


    public function get_pengajuan($numrows,$keywords)
    {
        $builder = $this->select('pengajuan_m.*')
        ->when($keywords, static function ($query, $keywords) {
            $query->like('pengajuan_m.pengajuan', $keywords);
        })
        ->findAll($numrows);
        return $builder;
    }

}