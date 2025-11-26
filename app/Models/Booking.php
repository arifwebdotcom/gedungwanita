<?php

namespace App\Models;

use CodeIgniter\Model;

class Booking extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'booking_t';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;

    // 🔑 ini yang diubah
    protected $protectFields    = false; 
    protected $allowedFields    = []; // boleh kosong kalau protectFields = false

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
