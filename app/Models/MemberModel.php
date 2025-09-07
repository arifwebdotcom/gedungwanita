<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table            = 'member_m';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    // Jika field ID tidak auto increment, ubah ke false
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;

    protected $allowedFields    = [
        'nama',
        'jeniskelamin',
        'tgllahir',
        'alamat',
        'sekolah',
        'kelas',
        'namaortu',
        'waortu',
        'tidurteratur',
        'tidurmulai',
        'bangun',
        'cukupistirahat',
        'malasgerak',
        'sulitfokus',
        'mudahlelah',
        'ikutekstra',
        'namaekstra',
        'bisatenang',
        'keluhan',
        'sukafisik',
        'kegiatanfavorit',
        'tertarikolahraga',
        'jenisolahraga',
        'perludiperhatikan',
        'jelaskanperludiperhatikan',
        'diawasidokter',
        'terapi',
        'gangguankesehatan',
        'jenisgangguankesehatan',
        'postopname',
        'kapan',
        'merangkak',
        'harapanortu',
        'tglsetuju',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Soft Deletes
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
