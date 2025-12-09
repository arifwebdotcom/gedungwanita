<?php

namespace App\Models;

use CodeIgniter\Model;

class WaLog extends Model
{
    protected $table      = 'wa_log';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'phone_no',
        'message',
        'payload',
        'response',
        'status',
        'created_at'
    ];

    protected $useTimestamps = true; // created_at otomatis
}
