<?php

use CodeIgniter\Database\Database;

if (!function_exists('sendWa')) {

    /**
     * Kirim WhatsApp via Watzap.id
     * 
     * @param string $to Nomor tujuan (format internasional tanpa +)
     * @param string $message Pesan yang akan dikirim
     * @return array Response API
     */
    function sendWa($to, $message)
    {
        $db = \Config\Database::connect();
        $waLog = model(\App\Models\WaLog::class);

        // Ambil APIKEY & NUMBERKEY
        $setting = $db->table('setting_m')
            ->whereIn('param', ['apikey', 'numberkey'])
            ->get()
            ->getResult();

        $config = [];
        foreach ($setting as $row) {
            $config[$row->param] = $row->value;
        }

        $apikey     = $config['apikey'] ?? '';
        $numberkey  = $config['numberkey'] ?? '';

        if (empty($apikey) || empty($numberkey)) {

            // Log gagal
            $waLog->insert([
                'phone_no' => $to,
                'message'  => $message,
                'payload'  => json_encode([]),
                'response' => 'APIKEY atau NUMBERKEY kosong',
                'status'   => 0
            ]);

            return [
                'status' => false,
                'message' => 'APIKEY atau NUMBERKEY belum disetting.'
            ];
        }

        // URL sesuai Watzap
        $url = "https://api.watzap.id/v1/send_message";

        $payload = [
            'api_key'    => $apikey,
            'number_key' => $numberkey,
            'phone_no'   => $to,
            'message'    => $message
        ];

        // Kirim CURL
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ]
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        // Siapkan data log
        $logData = [
            'phone_no' => $to,
            'message'  => $message,
            'payload'  => json_encode($payload),
            'response' => $error ?: $response,
            'status'   => 0
        ];

        if ($error) {
            // Log gagal
            $waLog->insert($logData);

            return [
                'status' => false,
                'message' => $error
            ];
        }

        // Decode hasil
        $result = json_decode($response, true);

        // Tentukan status
        $logData['status'] = (!empty($result['status']) && $result['status'] === true) ? 1 : 0;

        // Simpan log
        $waLog->insert($logData);

        return $result;
    }


    function normalize_phone($nohp)
    {
        $nohp = trim($nohp);

        // Hilangkan spasi, titik, dash
        $nohp = str_replace([' ', '.', '-', '(', ')'], '', $nohp);

        // Jika diawali dengan +62 → buang plus
        if (substr($nohp, 0, 3) === '+62') {
            return '62' . substr($nohp, 3);
        }

        // Jika diawali 08 → ganti menjadi 62
        if (substr($nohp, 0, 1) === '0') {
            return '62' . substr($nohp, 1);
        }

        // Jika sudah 62xxxx → biarkan
        if (substr($nohp, 0, 2) === '62') {
            return $nohp;
        }

        // Jika format lain → fallback
        return $nohp;
    }
}
