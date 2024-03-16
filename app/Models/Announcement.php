<?php

namespace App\Models;

use CodeIgniter\Model;

class Announcement extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'announcement_t';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'title', 'description','file'];

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


    public function get_agama($numrows,$keywords)
    {
        $builder = $this->select('announcement_t.*')
        ->when($keywords, static function ($query, $keywords) {
            $query->like('announcement_t.title', $keywords);
        })
        ->findAll($numrows);
        return $builder;
    }

}