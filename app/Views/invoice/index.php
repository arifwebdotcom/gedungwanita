<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Invoice',
    'items' => [
        ['name' => 'Master', 'active' => false],
        ['name' => 'Invoice', 'active' => true]
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
            <a href="<?= route_to('invoice.invoice_baru');?>" id='btn_create' class="btn btn-sm btn-light-primary" >
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->Tambah Invoice</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class='box-header with-border p-0 mb-4'>
            <div class='row '>            
                <div class='col-md-12'>
                    <div class="row">
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <label class='col-form-label col-md-12'>No Invoie</label>
                                <input class='form-control' type='text' name='noinvoice' placeholder='No Invoie' id='noinvoice'>
                            </div>
                        </div>      
                        <div class='col-md-3'>     
                            <!--begin::Input group-->
                            <div class="fv-row ">
                                <label class='col-form-label col-md-12'>Periode Awal</label>
                                <!--begin::Input-->
                                <div class="position-relative d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                    <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
                                            <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
                                            <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--end::Icon-->
                                    <!--begin::Datepicker-->
                                    <input class="form-control form-control-solid ps-12 periode" placeholder="Select a date" name="periode"  id="awal" />
                                    <!--end::Datepicker-->
                                </div>
                                <!--begin::Label-->
                            </div>  
                        </div>    
                        <div class='col-md-3'>     
                            <!--begin::Input group-->
                            <div class="fv-row ">
                                <label class='col-form-label col-md-12'>Periode Akhir</label>
                                <!--begin::Input-->
                                <div class="position-relative d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                    <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
                                            <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
                                            <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--end::Icon-->
                                    <!--begin::Datepicker-->
                                    <input class="form-control form-control-solid ps-12 periode" placeholder="Select a date" name="periode"  id="awal" />
                                    <!--end::Datepicker-->
                                </div>
                                <!--begin::Label-->
                            </div>  
                        </div>                                   
                        <div class='col-md-2'>
                            <div class='form-group notmodal'>
                                <label class='col-form-label col-md-12'>Asosiasi</label>                                
                                <select class='form-control' name='asosiasi' id='asosiasi' data-control="select2" data-hide-search="false">
                                    <option value='0' > Pilih Asosiasi </option>
                                    <?php foreach($asosiasi as $row){ ?>
                                        <option value='<?= $row->id ?>'><?= $row->asosiasi ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class='col-md-1'>
                            <div class='form-group'>
                                <label class='col-form-label col-md-12'>Jml</label>
                                <input class='form-control' type='text' name='number' placeholder='80' id='numrows' value='50'>
                            </div>
                        </div>
                        <div class='col-md-1'>
                            <button class='waves-effect waves-light btn btn-social-icon btn btn-primary mt-12' id='cari'><i class='fa fa-search'></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="invoice_table">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="w-25px rounded-start">
                            
                        </th>
                        <th class="ps-4 ">Peternak</th>
                        <th class="ps-4 ">Asosiasi</th>
                        <th class="ps-4 ">No Invoice</th>
                        <th class="ps-4 ">Expired</th>
                        <th class="ps-4 ">Total</th>
                        <th class="ps-4 ">Status</th>
                        <th class="min-w-200px rounded-end">Action</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>            
                         
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
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
            "createdRow": function(row, data, dataIndex) {
                // Apply styles directly to the specific column (e.g., Age column which is the 4th column, index 3)
                $('td:eq(7)', row).css({
                    'display': 'flex'
                });
            },
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
                    data: "namapeternak"
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
                        if (row.status === "LUNAS") {
                            return `  
                                <button class="waves-effect waves-light btn btn-social-icon btn-bitbucket btn-info btn-sm check" id="check" >
                                    Check Status
                                </button>
                                        <!--<button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete" id="delete">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                </svg>
                                            </span>
                                        </button>-->
                                        `;
                            } else {
                                return `
                                <a href="<?= base_url() ?>invoice/detail/`+row.id+`"> <button class="waves-effect waves-light btn btn-social-icon btn-bitbucket btn-primary btn-sm" >Bayar</button></a>
                                <a href="<?= base_url() ?>invoice/invoice-edit/`+row.id+`"><button class="waves-effect waves-light btn btn-social-icon btn-bitbucket btn-warning btn-sm edit" id="edit" style="display:<?= (user()->isadmin == 1?'block':'none'); ?>">
                                            Edit
                                        </button></a>
                                <button class="waves-effect waves-light btn btn-social-icon btn-bitbucket btn-info btn-sm check" id="check" >
                                    Check Status
                                </button>
                                        <!--<button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete" id="delete">
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
                        
                    }
                },
                
            ]
        })

        //table.draw();        

        // $('#invoice_table').on('click', 'button.expand', function() {
        //     var tr = $(this).closest('tr');
        //     var row = $('#invoice_table').DataTable().row(tr);

        //     if (row.child.isShown()) {
        //         // This row is already open - close it
        //         row.child.hide();
        //         tr.removeClass('shown');
        //         $(this).find($(".fa")).toggleClass('fa-chevron-circle-right').toggleClass('fa-chevron-circle-down');
        //     } else {
        //         // Open this row
        //         row.child(expandFormat(row.data())).show();
        //         tr.addClass('shown');
        //         $(this).find($(".fa")).toggleClass('fa-chevron-circle-down').toggleClass('fa-chevron-circle-right');
        //     }
        // });

    }

    $('#invoice_table tbody').on('click', 'button.expand', function() {
            var tr = $(this).closest('tr');
            var row = $('#invoice_table').DataTable().row(tr);

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
                $(this).find($(".fa")).toggleClass('fa-chevron-circle-right fa-chevron-circle-down');
            } else {
                row.child(expandFormat(row.data())).show();
                tr.addClass('shown');
                $(this).find($(".fa")).toggleClass('fa-chevron-circle-down fa-chevron-circle-right');
            }
        });

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
        $("#invoice_modal #id").val(data.id);

        $("#invoice_modal #modal_title").text("Persetujuan Pengajuan");
        $("#invoice_modal").modal("show");
    });

    $('#invoice_table tbody').on('click', '#check', function() {
        var data = $('#invoice_table').DataTable().row($(this).parents('tr')).data();

        $.ajax({
            url: `<?= base_url() ?>invoice/checkstatus/${data.id}`,
            type: 'post',
            dataType: 'json',
            data: "id="+data.id,
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
                    init();
                    toastr.success(response.messages);
                } else {
                    toastr.error("Gagal!");
                }
            },
            error: function(err) {
                toastr.error(err);
            }
        });
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
                    url: `<?= base_url() ?>invoice/delete/${data.id}`,
                    type: 'post',
                    dataType: 'json',
                    data: "id="+data.id,
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
                            init();
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