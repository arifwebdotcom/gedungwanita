<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Invoice',
    'items' => [
        ['name' => 'Invoice', 'active' => false],
        ['name' => 'Detail', 'active' => true]
    ]
];
?>


<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Invoice</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Invoice</span>
        </h3>
        <div class="card-toolbar">
            <button id="print2" class="btn btn-warning" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class='box-header with-border p-0 mb-4'>
            <div class='row '>            
                <section class="invoice printableArea">
                    <div class="row">
                        <div class="col-12">
                        <div class="page-header">
                            <h2 class="d-inline"><span class="fs-30">Invoice <?= $invoice['noinvoice'] ?></span></h2>
                            <div class="pull-right text-end">
                                <h3><?= date('d-m-Y',strtotime($invoice['created_at'])); ?></h3>
                            </div>	
                        </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row invoice-info">
                        <div class="col-md-6 invoice-col">                        
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 invoice-col text-end">
                        <strong>Kepada</strong>
                        <address>
                            <strong class="text-blue fs-24"><?= $invoice['namapeternak'] ?></strong><br>
                            <?= $invoice['alamat'] ?><br>
                            <strong>Phone: <?= $invoice['notelp'] ?> &nbsp;&nbsp;&nbsp;&nbsp; Email: <?= $invoice['email'] ?></strong>
                        </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 invoice-col mb-15">
                            <div class="invoice-details row no-margin">
                            <div class="col-md-6 col-lg-3"><b>Status </b>
                            <?php if($invoice['status'] == "PENDING"){
                                echo "<span class='badge badge-light-warning'>Pending Payment</span>";
                            }else if($invoice['status'] == "LUNAS"){
                                echo "<span class='badge badge-light-success me-2'>Lunas</span>";
                            }else{
                                echo "<span class='badge badge-light-danger me-2'>Tagihan</span>";
                            }
                            ?>
                            
                        </div>
                            </div>
                        </div>
                    <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                            <th>#</th>
                            <th>Nama Tagihan</th>
                            <th>Keterangan #</th>
                            <th class="text-end">Jumlah</th>
                            <th class="text-end">Harga</th>
                            <th class="text-end">Subtotal</th>
                            </tr>
                            <?php 
                            $i=0;
                            $total = 0;
                            $subtotal = 0;
                            foreach($invoice['detail'] as $row){
                                $subtotal = $row->qty*$row->harga;
                                $total = $total+$subtotal;
                                $i++;
                                echo "
                                <tr>
                                    <td>".$i."</td>
                                    <td>".$row->nama."</td>
                                    <td>".$row->keterangan."</td>
                                    <td class='text-end'>".$row->qty."</td>
                                    <td class='text-end'>".number_to_currency($row->harga, 'IDR', 'id_ID', 2)."</td>
                                    <td class='text-end'>".number_to_currency(($subtotal), 'IDR', 'id_ID', 2)."</td>
                                </tr>   
                                ";
                            }
                            ?>
                                                     
                            </tbody>
                        </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12 text-end">
                            <p class="lead"><b>Tanggal Jatuh Tempo</b><span class="text-danger"> <?= date('d-m-Y',strtotime($invoice['expired'])); ?> </span></p>
                            <div class="total-payment">
                                <h3><b>Total :</b> <?= number_to_currency(($total), 'IDR', 'id_ID', 2) ?></h3>
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    
                    </section>
                    <?php if(strtolower($invoice['status']) == 'lunas'){}else{ ?>
                    <div class="row no-print">
                        <div class="col-12">
                        <button type="button" class="btn btn-primary pull-right" id="btn_lunas"><i class="fa fa-credit-card"></i> Lunaskan 
                        </button>
                        <button type="button" class="btn btn-success pull-right" id="btn_bayar"><i class="fa fa-credit-card"></i> Bayar Invoice 
                        </button>
                        </div>
                    </div>
                    <div class="col-12" id="snap-container"></div>
                    <?php } ?>
            </div>
        </div>
        <!--begin::Table container-->
        
    </div>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 11-->
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>

<script src="<?= base_url() ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script>
    
    $(function () {
        "use strict";   

            
        $("#print1").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("section.printableArea").printArea(options);
            }); 

            
        $("#print2").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("section.printableArea").printArea(options);
            });
        
    }); 

   

    $('#btn_bayar').on('click', function() {
        Swal.fire({ 
                    allowOutsideClick: false,
                    title: 'Harap Menunggu',
                    text: 'Permintaan sedang di proses.',
                    showCancelButton: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                })
        $.ajax({
            url: '<?= route_to('dashboard.payment') ?>',
            method: 'POST',
            dataType: 'json',
            data: { amount: '<?= $subtotal; ?>', namapeternak:  '<?= $invoice['namapeternak'] ?>', email: '<?= $invoice['email'] ?>',notelp: '<?= $invoice['notelp'] ?>', id: '<?= $invoice['id'];?>'},
            success: function(data) {	
                Swal.close()	
                def = 1;
                window.snap.embed(data.snapToken, {
                    embedId: 'snap-container'
                });
                // SnapToken acquired from previous step
                snap.pay(data.snapToken, {
                // Optional
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    alert("payment success!"); console.log(result);
                },
                onPending: function(result){
                    /* You may add your own implementation here */
                    alert("wating your payment!"); console.log(result);
                },
                onError: function(result){
                    /* You may add your own implementation here */
                    alert("payment failed!"); console.log(result);
                },
                onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
                });						
            }
        });
    
        $("#snap-container").show();
           
    });

    $('#btn_lunas').on('click', function() {

        const today = new Date().toISOString().split('T')[0];

        Swal.fire({
            title: "Apakah anda yakin?",
            html: `
                <p>Lunaskan Invoice <?= $invoice['noinvoice'] ?></p>
                <input type="date" id="tgl_dibayar" class="swal2-input" value="${today}" placeholder="Tanggal Dibayar">
            `,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Silahkan!",
            cancelButtonText: "Tidak, Jangan dilunaskan!",
            reverseButtons: true,
            preConfirm: () => {
                const tglDibayar = document.getElementById('tgl_dibayar').value;
                if (!tglDibayar) {
                    Swal.showValidationMessage('Silakan pilih tanggal dibayar terlebih dahulu');
                }
                return { tgl_dibayar: tglDibayar };
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                const tglDibayar = result.value.tgl_dibayar;
                $.ajax({
                    url: `<?= base_url() ?>invoice/<?= $invoice['id'];?>/lunaskan`,
                    method: 'POST',
                    dataType: 'json',
                    data: { id: '<?= $invoice['id'];?>',tgldibayar : tglDibayar },
                    success: function(data) {	
                        toastr.success("Invoice <?= $invoice['noinvoice'] ?> berhasil dilunaskan");    
                        Swal.close()
                        location.reload();                					
                    }
                });
            } else if (result.dismiss === "cancel") {
                toastr.error("Invoice <?= $invoice['noinvoice'] ?> tidak jadi dihapus");                
            }
        });
        
           
    });

    
</script>
<?= $this->endSection() ?>