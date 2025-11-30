<?php

namespace App\Models;

use CodeIgniter\Model;

class Tipe extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tipe_m';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [];
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


    public function get_tipe($numrows,$keywords)
    {
        $builder = $this->select('tipe_m.*')
        ->when($keywords, static function ($query, $keywords) {
            $query->like('tipe_m.tipe', $keywords);
        })
        ->findAll($numrows);
        return $builder;
    }

}