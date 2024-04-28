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
    protected $allowedFields    = ['id', 'usersfk', 'nama','expired','noinvoice','total','status'];

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


    public function get_invoice_all($noinvoice, $awal, $akhir ,$asosiasi, $numrows)
    {
        $builder = $this
            ->select('invoice_t.id as idinvoice,invoice_t.*,users.username as namapeteranak,users.nohp,users.populasi,asosiasi_m.asosiasi')
            ->join('users','users.id=invoice_t.usersfk')
            ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk')
            //->join('alamat_m','alamat_m.usersfk = users.id','left')
            //->where('invoice_t.user_id', user()->klienfk)
            ->when($noinvoice, static function ($query, $noinvoice) {
                $query->like('invoice_t.noinvoice', $noinvoice);
            })
            ->when($noinvoice, static function ($query, $noinvoice) {
                $query->like('invoice_t.noinvoice', $noinvoice);
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
            ->findAll($numrows);

        $data = [];
        foreach ($builder as $row) {
            $detail_invoice = $this->getDetailInvoice($row->id);

            $data[] = [
                "id" => $row->idinvoice,
                "total" => number_to_currency($row->total, 'IDR', 'id_ID', 2),
                "namapeteranak" => $row->namapeteranak,
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
            ->select('invoice_t.id as idinvoice,invoice_t.*,users.username as namapeternak,users.nohp,users.notelp,users.populasi,asosiasi_m.asosiasi,alamat_m.alamat,users.email')
            ->join('users','users.id=invoice_t.usersfk')
            ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk')
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

    public function get_invoice_user($noinvoice, $awal, $akhir , $asosiasi, $numrows)
    {
        $builder = $this
            ->select('invoice_t.id as idinvoice,invoice_t.*,users.username,users.nohp,users.populasi,asosiasi_m.asosiasi')
            ->join('users','users.id=invoice_t.user_id')
            ->join('asosiasi_m','asosiasi_m.id=users.asosiasifk')
            ->where('invoice_t.user_id', user()->klienfk)
            ->when($noinvoice, static function ($query, $noinvoice) {
                $query->like('invoice_t.noinvoice', $noinvoice);
            })
            ->when($noinvoice, static function ($query, $noinvoice) {
                $query->like('invoice_t.noinvoice', $noinvoice);
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
            ->findAll($numrows);
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