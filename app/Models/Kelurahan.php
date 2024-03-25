<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelurahan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kelurahan_m';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'klienfk', 'provinsifk', 'kotakabupatenfk', 'kecamatanfk', 'kelurahan', 'kdkelurahan', 'urutan'];

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


    public function searchData($searchTerm)
    {
        return $this
            ->select(['kelurahan_m.*', 'provinsi_m.provinsi', 'kotakabupaten_m.kotakabupaten', 'kecamatan_m.kecamatan'])
            ->join('provinsi_m', 'provinsi_m.id = kelurahan_m.provinsifk')
            ->join('kecamatan_m', 'kecamatan_m.id = kelurahan_m.kecamatanfk')
            ->join('kotakabupaten_m', 'kotakabupaten_m.id = kelurahan_m.kotakabupatenfk')
            ->groupStart()
            ->like('kelurahan_m.kelurahan', $searchTerm)
            ->orLike('kecamatan_m.kecamatan', $searchTerm)
            ->orLike('kotakabupaten_m.kotakabupaten', $searchTerm)
            ->orLike('provinsi_m.provinsi', $searchTerm)
            ->groupEnd()
            ->limit(30)
            ->findAll(30);
    }

    public function searchDataModal($searchTerm)
    {
        return $this
            ->select(['kelurahan_m.*', 'provinsi_m.provinsi as provinsimodal', 'kotakabupaten_m.kotakabupaten as kotakabupatenmodal', 'kecamatan_m.kecamatan as kecamatanmodal'])
            ->join('provinsi_m', 'provinsi_m.id = kelurahan_m.provinsifk')
            ->join('kecamatan_m', 'kecamatan_m.id = kelurahan_m.kecamatanfk')
            ->join('kotakabupaten_m', 'kotakabupaten_m.id = kelurahan_m.kotakabupatenfk')
            ->groupStart()
            ->like('kelurahan_m.kelurahan', $searchTerm)
            ->orLike('kecamatan_m.kecamatan', $searchTerm)
            ->orLike('kotakabupaten_m.kotakabupaten', $searchTerm)
            ->orLike('provinsi_m.provinsi', $searchTerm)
            ->groupEnd()
            ->limit(30)
            ->findAll(30);
    }
}
