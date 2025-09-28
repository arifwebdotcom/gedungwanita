<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi_t';
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


    public function get_user_transaction_t($numrows,$keywords)
    {
        $builder = $this->select('user_transaction_t.*')
        ->when($keywords, static function ($query, $keywords) {
            $query->like('user_transaction_t.user_transaction_t', $keywords);
        })
        ->findAll($numrows);
        return $builder;
    }

}