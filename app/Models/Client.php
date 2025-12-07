<?php

namespace App\Models;

use CodeIgniter\Model;

class Client extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'client_m';
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

    public function getDaftarTransaksi($kategori, $kelas, $numrows, $keywords,$bulan)
    {
        $builder = $this
            ->select("
                client_m.*,
                booking_t.tanggal,
                booking_t.sesi,
                booking_t.status,
                booking_t.keterangan,
                booking_t.paketfk,
                paket_m.paket,
                booking_t.hargaasli,
                booking_t.hargadeal,
                booking_t.kursi,
                booking_t.id as bookingid,
                booking_t.eo,
                booking_t.katering,
                booking_t.lainlain
            ")
            ->join('booking_t', 'booking_t.clientfk = client_m.id')
            ->join('paket_m', 'booking_t.paketfk = paket_m.id', 'left');

        if (!empty($bulan)) {
            $startDate = $bulan . '-01 00:00:01';
            $endDate   = date('Y-m-t 23:59:59', strtotime($bulan . '-01'));
            $builder->where('booking_t.tanggal >=', $startDate)
                    ->where('booking_t.tanggal <=', $endDate);
        }

        if (!empty($kategori)) {
            $builder->where('client_m.tipefk', $kategori);
        }

        if (!empty($kelas)) {
            $builder->where('client_m.kelasfk', $kelas);
        }

        if (!empty($keywords)) {
            $builder->groupStart()
                    ->like('client_m.nama', $keywords)
                    ->orLike('client_m.email', $keywords)
                    ->orLike('client_m.telepon', $keywords)
                    ->groupEnd();
        }

        if (!empty($numrows)) {
            $builder->limit($numrows);
        }

        return $builder->get()->getResult();
    }   

    public function getDaftarTransaksiPembayaran($kategori, $kelas, $numrows, $keywords,$bulan)
    {
    $builder = $this
        ->select("
            client_m.*,
            booking_t.tanggal,
            booking_t.sesi,
            booking_t.status,
            booking_t.keterangan,
            booking_t.paketfk,
            paket_m.paket,
            booking_t.hargaasli,
            booking_t.hargadeal,
            booking_t.kursi,
            booking_t.id as bookingid,
            booking_t.eo,
            booking_t.katering,
            booking_t.lainlain,

            -- Total bayar (SUM nominal dari booking_transaksi_t)
            COALESCE(SUM(booking_transaksi_t.nominal), 0) AS total_bayar,

            -- Total tagihan (harga_deal + lainlain)
            (booking_t.hargadeal + booking_t.lainlain) AS total_tagihan,

            -- Piutang = total tagihan - total bayar
            ((booking_t.hargadeal + booking_t.lainlain) - COALESCE(SUM(booking_transaksi_t.nominal), 0)) 
                AS piutang
        ")
        ->join('booking_t', 'booking_t.clientfk = client_m.id')
        ->join('paket_m', 'booking_t.paketfk = paket_m.id', 'left')

        // join transaksi
        ->join('booking_transaksi_t', 
               'booking_transaksi_t.bookingfk = booking_t.id 
                AND booking_transaksi_t.deleted_at IS NULL',
               'left')
        ->groupBy('booking_t.id');

        if (!empty($bulan)) {
            $startDate = $bulan . '-01 00:00:01';
            $endDate   = date('Y-m-t 23:59:59', strtotime($bulan . '-01'));
            $builder->where('booking_t.tanggal >=', $startDate)
                    ->where('booking_t.tanggal <=', $endDate);
        }

        if (!empty($kategori)) {
            $builder->where('client_m.tipefk', $kategori);
        }

        if (!empty($kelas)) {
            $builder->where('client_m.kelasfk', $kelas);
        }

        if (!empty($keywords)) {
            $builder->groupStart()
                    ->like('client_m.nama', $keywords)
                    ->orLike('client_m.email', $keywords)
                    ->orLike('client_m.telepon', $keywords)
                    ->groupEnd();
        }

        if (!empty($numrows)) {
            $builder->limit($numrows);
        }

        return $builder->get()->getResult();
    }   
}
