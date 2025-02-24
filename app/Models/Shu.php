<?php

namespace App\Models;

use CodeIgniter\Model;

class Shu extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'shu_t';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'keterangan', 'periode','pir','jmlpir','jumlah'];

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


    public function get_shu($numrows,$keywords)
    {
        $builder = $this->select('shu_t.*')
        ->when($keywords, static function ($query, $keywords) {
            $query->like('shu_t.shu', $keywords);
        })
        ->findAll($numrows);
        return $builder;
    }

}