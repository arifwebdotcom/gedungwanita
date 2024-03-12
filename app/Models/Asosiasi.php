<?php

namespace App\Models;

use CodeIgniter\Model;

class Asosiasi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'asosiasi_m';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'asosiasi', 'ketua','alamat','nohp'];

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


    public function get_asosiasi($numrows,$keywords)
    {
        $builder = $this->select('asosiasi_m.*')
        ->when($keywords, static function ($query, $keywords) {
            $query->like('asosiasi_m.asosiasi', $keywords);
        })
        ->findAll($numrows);
        return $builder;
    }

}