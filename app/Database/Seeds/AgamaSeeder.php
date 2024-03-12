<?php

namespace App\Database\Seeds;

use App\Models\Agama;
use CodeIgniter\Database\Seeder;

class AgamaSeeder extends Seeder
{
    public function run()
    {
        $agama_model = model(Agama::class);

        $agama = [
            ['klienfk' => '1', 'agama' => 'Katolik', 'reportdisplay' => 'Katolik'],
            ['klienfk' => '1', 'agama' => 'Islam', 'reportdisplay' => 'Islam'],
            ['klienfk' => '1', 'agama' => 'Kristen', 'reportdisplay' => 'Kristen'],
            ['klienfk' => '1', 'agama' => 'Hindu', 'reportdisplay' => 'Hindu'],
            ['klienfk' => '1', 'agama' => 'Buddha', 'reportdisplay' => 'Buddha'],
            ['klienfk' => '1', 'agama' => 'Konghucu', 'reportdisplay' => 'Konghucu'],
        ];

        $agama_model->insertBatch($agama);
    }
}
