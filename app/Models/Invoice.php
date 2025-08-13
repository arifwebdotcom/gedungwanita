<?php

namespace App\Models;

use CodeIgniter\Model;

class Invoice extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'invoice_t';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'usersfk', 'nama','expired','tglinvoice','noinvoice','total','status','kategoriinvoicefk','tgldibayar'];

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


    public function get_invoice_all($noinvoice, $awal, $akhir ,$asosiasi, $status, $numrows,$namaanggota)
    {
        $builder = $this
            ->select('invoice_t.id as idinvoice,invoice_t.*,users.nama as namapeternak,users.nohp,users.populasi,asosiasi_m.asosiasi')
            ->join('users','users.id=invoice_t.usersfk')
            ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk','left')
            //->join('alamat_m','alamat_m.usersfk = users.id','left')
            //->where('invoice_t.user_id', user()->klienfk)
            ->when($noinvoice, static function ($query, $noinvoice) {
                $query->like('invoice_t.noinvoice', $noinvoice);
            })
            ->when($namaanggota, static function ($query, $namaanggota) {
                $query->like('users.nama', $namaanggota);
            })
            ->when($status, static function ($query, $status) {
                $query->like('invoice_t.status', $status);
            })
            ->when($awal, static function ($query, $awal) {
                //dd(date("Y-m-d 00:00:00", strtotime($awal)));
                $query->where('invoice_t.created_at >=', date("Y-m-d 00:00:00", strtotime($awal)));
            })
            ->when($akhir, static function ($query, $akhir) {
                $query->where('invoice_t.created_at <=', date("Y-m-d 23:59:00",strtotime($akhir)));
            })
            ->when($asosiasi, static function ($query, $asosiasi) {
                $query->like('users.asosiasifk', $asosiasi);
            })
            ->orderBy('invoice_t.created_at', 'DESC')
            ->findAll($numrows);

        $data = [];
        foreach ($builder as $row) {
            $detail_invoice = $this->getDetailInvoice($row->id);

            $data[] = [
                "id" => $row->idinvoice,
                "total" => number_to_currency($row->total, 'IDR', 'id_ID', 2),
                "namapeternak" => $row->namapeternak,
                "asosiasi" => $row->asosiasi,
                "noinvoice" => $row->noinvoice,
                "expired" => $row->expired,
                "status" => $row->status,
                "detail" => $detail_invoice
            ];
        }

        return $data;
    }

    public function get_invoice_by_id($id)
    {
        $builder = $this
            ->select('invoice_t.id as idinvoice,invoice_t.*,users.nama as namapeternak,users.nohp,users.notelp,users.populasi,asosiasi_m.asosiasi,alamat_m.alamat,users.email')
            ->join('users','users.id=invoice_t.usersfk')
            ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk','left')
            ->join('alamat_m','alamat_m.usersfk = users.id','left')
            //->where('invoice_t.user_id', user()->klienfk)
            ->when($id, static function ($query, $id) {
                $query->like('invoice_t.id', $id);
            })            
            ->findAll();

        $data = [];
        foreach ($builder as $row) {
            $detail_invoice = $this->getDetailInvoiceNumber($row->id);

            $data[] = [
                "id" => $row->idinvoice,
                "total" => number_to_currency($row->total, 'IDR', 'id_ID', 2),
                "namapeternak" => $row->namapeternak,
                "asosiasi" => $row->asosiasi,
                "noinvoice" => $row->noinvoice,
                "expired" => $row->expired,
                "alamat" => $row->alamat,
                "status" => $row->status,
                "notelp" => $row->notelp,
                "email" => $row->email,
                "created_at" => $row->created_at,
                "detail" => $detail_invoice
            ];
        }

        return $data;
    }

    public function get_invoice_user($noinvoice, $awal, $akhir , $asosiasi, $status, $numrows,$namaanggota)
    {
        $builder = $this
            ->select('invoice_t.id as idinvoice,invoice_t.*,users.nama as namapeternak,users.nohp,users.populasi,asosiasi_m.asosiasi')
            ->join('users','users.id=invoice_t.usersfk')
            ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk','left')
            ->where('invoice_t.usersfk', user()->id)
            ->when($noinvoice, static function ($query, $noinvoice) {
                $query->like('invoice_t.noinvoice', $noinvoice);
            })
            ->when($namaanggota, static function ($query, $namaanggota) {
                $query->like('users.nama', $namaanggota);
            })
            ->when($status, static function ($query, $status) {
                $query->like('invoice_t.status', $status);
            })
            ->when($awal, static function ($query, $awal) {
                $query->where('invoice_t.created_at >=', date("Y-m-d 00:00:00",strtotime($awal)));
            })
            ->when($akhir, static function ($query, $akhir) {
                $query->where('invoice_t.created_at <=', date("Y-m-d 00:00:00",strtotime($akhir)));
            })
            ->when($asosiasi, static function ($query, $asosiasi) {
                $query->like('users.asosiasifk', $asosiasi);
            })
            ->orderBy('invoice_t.created_at', 'DESC')
            ->findAll($numrows);

            $data = [];
            foreach ($builder as $row) {
                $detail_invoice = $this->getDetailInvoice($row->id);
    
                $data[] = [
                    "id" => $row->idinvoice,
                    "total" => number_to_currency($row->total, 'IDR', 'id_ID', 2),
                    "namapeternak" => $row->namapeternak,
                    "asosiasi" => $row->asosiasi,
                    "noinvoice" => $row->noinvoice,
                    "expired" => $row->expired,
                    "status" => $row->status,
                    "detail" => $detail_invoice
                ];
            }
    
            return $data;
    
    }

    public function get_invoice_per_user($noinvoice, $awal, $akhir , $asosiasi, $status, $numrows,$idmember)
    {
        $builder = $this
            ->select('invoice_t.id as idinvoice,invoice_t.*,users.nama as namapeternak,users.nohp,users.populasi,asosiasi_m.asosiasi')
            ->join('users','users.id=invoice_t.usersfk')
            ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk','left')
            //->where('invoice_t.usersfk', user()->id)
            ->when($idmember, static function ($query, $idmember) {
                $query->where('invoice_t.usersfk', $idmember);
            })
            ->when($noinvoice, static function ($query, $noinvoice) {
                $query->like('invoice_t.noinvoice', $noinvoice);
            })
            ->when($noinvoice, static function ($query, $noinvoice) {
                $query->like('invoice_t.noinvoice', $noinvoice);
            })
            ->when($status, static function ($query, $status) {
                $query->like('invoice_t.status', $status);
            })
            ->when($awal, static function ($query, $awal) {
                $query->where('invoice_t.created_at >=', date("Y-m-d 00:00:00",strtotime($awal)));
            })
            ->when($akhir, static function ($query, $akhir) {
                $query->where('invoice_t.created_at <=', date("Y-m-d 00:00:00",strtotime($akhir)));
            })
            ->when($asosiasi, static function ($query, $asosiasi) {
                $query->like('users.asosiasifk', $asosiasi);
            })
            ->orderBy('invoice_t.id', 'DESC')
            ->findAll($numrows);

            $data = [];
            foreach ($builder as $row) {
                $detail_invoice = $this->getDetailInvoice($row->id);
    
                $data[] = [
                    "id" => $row->idinvoice,
                    "total" => number_to_currency($row->total, 'IDR', 'id_ID', 2),
                    "namapeternak" => $row->namapeternak,
                    "asosiasi" => $row->asosiasi,
                    "noinvoice" => $row->noinvoice,
                    "expired" => $row->expired,
                    "status" => $row->status,
                    "detail" => $detail_invoice
                ];
            }
    
            return $data;
    
    }

    public function getSetoranPerAnggota($id,$namaanggota,$namapeternakan, $tahun, $numrows){
        $builder = $this
            ->select("users.id,users.kodeanggota, users.nama, users.namapeternakan, SUM(CASE WHEN invoice_t.status = 'LUNAS' THEN invoice_t.total ELSE 0 END) as setoran,SUM(CASE WHEN invoice_t.status = 'BELUM LUNAS' THEN invoice_t.total ELSE 0 END) as tunggakan")
            ->join('users','users.id=invoice_t.usersfk')
            ->where('invoice_t.usersfk', user()->id)
            ->groupBy('invoice_t.usersfk')
            ->when($namaanggota, static function ($query, $namaanggota) {
                $query->like('users.nama', $namaanggota);
            })
            ->when($namapeternakan, static function ($query, $namapeternakan) {
                $query->like('users.namapeternakan', $namapeternakan);
            })
            ->when($id, static function ($query, $id) {
                $query->like('users.id', $id);
            })
            ->when($tahun, static function ($query, $tahun) {
                $query->where('pengajuan_t.tahun', $tahun);
            })
            ->orderBy('setoran', 'DESC')
            ->findAll($numrows);
            return $builder;         
    }

    public function getSetoranPerAnggotaAdmin($kodeanggota,$namaanggota,$namapeternakan, $tahun, $numrows){
        $builder = $this
            ->select("users.id,users.kodeanggota, users.nama, users.namapeternakan, SUM(CASE WHEN invoice_t.status = 'LUNAS' THEN invoice_t.total ELSE 0 END) as setoran,SUM(CASE WHEN invoice_t.status = 'BELUM LUNAS' THEN invoice_t.total ELSE 0 END) as tunggakan")
            ->join('users','users.id=invoice_t.usersfk')
            ->groupBy('invoice_t.usersfk')
            ->when($namaanggota, static function ($query, $namaanggota) {
                $query->like('users.nama', $namaanggota);
            })
            ->when($namapeternakan, static function ($query, $namapeternakan) {
                $query->like('users.namapeternakan', $namapeternakan);
            })
            ->when($kodeanggota, static function ($query, $kodeanggota) {
                $query->like('users.kodeanggota', $kodeanggota);
            })
            ->when($tahun, static function ($query, $tahun) {
                $query->where('pengajuan_t.tahun', $tahun);
            })
            ->orderBy('setoran', 'DESC')
            ->findAll($numrows);
            return $builder;         
    }

    public function get_tahuninvoice(){
        $builder = $this->select('YEAR(expired) as tahun')
        ->groupBy('tahun')->orderBy('tahun')->findAll();
        return $builder;       
    }

    public function getDetailInvoice($invoice_id){
		$tindakan_detail = model(InvoiceDetail::class)->select("invoiced_t.*")
            ->where("invoiced_t.invoicefk",$invoice_id)
            ->findAll();

        $tindakan_detail = array_map(function ($td) {
            $td->harga = number_to_currency($td->harga, 'IDR', 'id_ID', 2);
            return $td;
        }, $tindakan_detail);

        return $tindakan_detail;
	}

    public function getDetailInvoiceNumber($invoice_id){
		$tindakan_detail = model(InvoiceDetail::class)->select("invoiced_t.*")
            ->where("invoiced_t.invoicefk",$invoice_id)
            ->findAll();

        $tindakan_detail = array_map(function ($td) {
            $td->harga = $td->harga;
            return $td;
        }, $tindakan_detail);

        return $tindakan_detail;
	}

}