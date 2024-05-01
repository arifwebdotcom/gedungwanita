<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields  = [
        'suplierpakanfk','email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash','asosiasifk',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at','first_name','last_name','lat','long','nohp',
        'groupwa','namapeternakan','populasi','notelp','jenispakan','replacement','pullet','frequensireplacement','ktp','bersediamembayar','alasantidakbersedia','ktp','buktipembayaran','kodeanggota'
    ];

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

}