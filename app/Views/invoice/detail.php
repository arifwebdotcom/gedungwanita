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
                                <h3><b>Total :</b> <?= number_to_currency(($subtotal), 'IDR', 'id_ID', 2) ?></h3>
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    
                    </section>
                    <div class="row no-print">
                        <div class="col-12">
                        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Bayar Invoice
                        </button>
                        </div>
                    </div>
            </div>
        </div>
        <!--begin::Table container-->
        
    </div>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 11-->
<div class="modal fade" id="invoice_modal" tabindex="-1" aria-hidden="true" style="z-index:10000;">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 id="modal_title">Persetujuan Pengajuan</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="invoice_form" class="form" >
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-7 fv-row">
                        <input type="hidden" name="id" id="id">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Disetujui</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Di setujui"></i>
                        </label>
                        <!--end::Label-->
                        <input type="number" class="form-control form-control-solid" placeholder="" id="disetujui" name="disetujui" />
                    </div>                    
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-7 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Keterangan</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Keterangan"></i>
                        </label>
                        <!--end::Label-->
                        <textarea rows='5' class='form-control form-control-lg form-control-solid' placeholder='Keterangan' name='keterangan'></textarea>                        
                    </div>                    
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Card-->
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

    $(document).ready(function() {
        //$("#invoice_table").DataTable();
        init();
        $(".periode").flatpickr({
            enableTime: false,
            dateFormat: "d-m-Y",
            mode: "single",
            // Disable keyboard input
            allowInput: false        
            
        });
    });

    $("#cari").click(function() {
        init();
    });
    
    function init() {

        var noinvoice = "";
        if ($("#noinvoice").val()) {
            noinvoice = "&noinvoice=" + $("#noinvoice").val();
        }

        var awal = "&awal=<?= date("1-m-Y"); ?>";
        if ($("#awal").val() && $("#awal").val() != "0") {
            awal = "&awal=" + $("#awal").val();
        }

        var akhir = "&akhir=<?= date("t-m-Y"); ?>";
        if ($("#akhir").val() && $("#akhir").val() != "0") {
            akhir = "&akhir=" + $("#akhir").val();
        }

        var asosiasi = "";
        if ($("#asosiasi").val() && $("#asosiasi").val() != "0") {
            asosiasi = "&asosiasi=" + $("#asosiasi").val();
        }

        var numrows = "0";
        if ($("#numrows").val()) {
            numrows = $("#numrows").val();
        }
        $('#invoice_table').DataTable().destroy();
        //var table = $('#invoice_table').DataTable().destroy();
        var table = $('#invoice_table').DataTable({
            "destroy": true,
            "searching": false,
            'info': true,
            "lengthChange": false,
            ajax: {
                type: "GET",
                url: '<?= route_to('invoice_get') ?>' + `?numrows=${numrows}${noinvoice}${awal}${akhir}${asosiasi}`,
                dataType: 'JSON',
                error: function(e) {
                    alert(e);
                },
            },
            columns: [                
                {
                    width: "10%",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return `<button class="waves-effect waves-light btn btn-social-icon btn-bitbucket btn-primary btn-sm expand" data-toggle="tooltip" data-placement="top" title="Expand" id="expand"><i class="fa  fa-chevron-circle-right"></i></button>`;
                    }
                },
                {
                    name: "Peternak",
                    data: "namapeteranak"
                },
                {
                    name: "Asosiasi",
                    data: "asosiasi"
                },
                {
                    name: "No Invoice",
                    data: "noinvoice"
                },
                {
                    name: "Expired",
                    data: "expired"
                },
                {
                    name: "Total",
                    data: "total"
                },
                {
                    name: "Status",
                    data: "status"
                },         
                {
                    width: "10%",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return `
                        <button class="waves-effect waves-light btn btn-social-icon btn-bitbucket btn-primary btn-sm expand" data-toggle="tooltip" data-placement="top" title="Expand" id="expand">Bayar</button>
                        <!--<button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit" id="edit">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                        </svg>
                                    </span>
                                </button>
                                <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete" id="delete">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                        </svg>
                                    </span>
                                </button>-->
                                `;
                    }
                },
                
            ]
        })

        table.draw();

        $('#invoice_table tbody').on('click', 'button.expand', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
                $(this).find($(".fa")).toggleClass('fa-chevron-circle-right').toggleClass('fa-chevron-circle-down');
            } else {
                // Open this row
                row.child(expandFormat(row.data())).show();
                tr.addClass('shown');
                $(this).find($(".fa")).toggleClass('fa-chevron-circle-down').toggleClass('fa-chevron-circle-right');
            }
        });

    }

    const expandFormat = (data) => {
        var detail = "";

        $.each(data.detail, function(key, val) {
            detail = detail + "<tr><td>" + val.nama + "</td><td>" + val.harga + "</td><td>" + val.keterangan + "</td></tr>";

        });

        return (
            '<table class="table table-hover table-striped table-row-gray-100 align-middle gs-0 gy-3"><thead>' +
            '<tr>' +
            '<th><b>Nama</b></th>' +
            '<th><b>Harga</b></th>' +
            '<th><b>Keterangan</b></th>' +
            '</tr></thead><tbody>' +
            detail +
            '</tbody></table>'
        );
    }

    $('#btn_create').on('click', function() {
        $("#invoice_modal #modal_title").text("Tambah Pengajuan");
        $("#invoice_modal").modal("show");
    });

    $('#invoice_table tbody').on('click', '#edit', function() {
        var data = $('#invoice_table').DataTable().row($(this).parents('tr')).data();
        $("#invoice_modal #noinvoice").val(data.noinvoice);
        $("#invoice_modal #id").val(data.idinvoice);

        $("#invoice_modal #modal_title").text("Persetujuan Pengajuan");
        $("#invoice_modal").modal("show");
    });

    $('#invoice_table tbody').on('click', '#delete', function() {
        var data = $('#invoice_table').DataTable().row($(this).parents('tr')).data();
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "data "+data.noinvoice+" akan dihapus dari sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Silahkan!",
            cancelButtonText: "Tidak, Jangan dihapus!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `<?= base_url() ?>invoice/delete/${data.idinvoice}`,
                    type: 'post',
                    dataType: 'json',
                    data: "id="+data.idinvoice,
                    beforeSend: function() {
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
                    },
                    success: function(response) {
                        Swal.close()
                        if (response.status) {                
                            showPengajuan();
                            toastr.warning(response.messages);
                        } else {
                            toastr.error("Gagal!");
                        }
                    },
                    error: function(err) {
                        toastr.error(err);
                    }
                });
            } else if (result.dismiss === "cancel") {
                toastr.error("data "+data.invoice+" tidak jadi dihapus");                
            }
        });
        
        

    });


    $('#invoice_modal').on('hidden.bs.modal', function(e) {
        $(this).find("input,textarea").val('').end();
    }) 

    $('#invoice_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#invoice_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>invoice/${id}/edit` :
            "<?= route_to('invoice.store') ?>";
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            beforeSend: function() {
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
            },
            success: function(response) {
                Swal.close()
                if (response.status) {
                    $("#invoice_modal").modal("hide");
                    init();
                    toastr.success(response.messages);
                } else {
                    toastr.error("Gagal!");
                }
            },
            error: function(err) {
                Swal.close()
                toastr.error(err);
            }
        });    
    });
</script>
<?= $this->endSection() ?>