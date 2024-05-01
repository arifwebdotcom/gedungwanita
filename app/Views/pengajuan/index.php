<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Pengajuan',
    'items' => [
        ['name' => 'Master', 'active' => false],
        ['name' => 'Pengajuan', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Pengajuan</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Pengajuan</span>
        </h3>
        <div class="card-toolbar">
            <a href="<?= route_to('pengajuan.pengajuan_baru');?>" id='btn_create' class="btn btn-sm btn-light-primary" >
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->Tambah Pengajuan</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class='box-header with-border p-0 mb-4'>
            <div class='row ' style='padding-left: 1.5rem;'>            
                <div class='col-md-12'>
                    <div class="row">
                        <div class='col-md-4'>
                            <div class='form-group'>
                                <label class='col-form-label col-md-12'>No Pengajuan</label>
                                <input class='form-control' type='text' name='nopengajuan' placeholder='No Pengajuan' id='nopengajuan'>
                            </div>
                        </div>                        
                        <div class='col-md-3'>
                            <div class='form-group notmodal'>
                                <label class='col-form-label col-md-12'>Tahun</label>
                                <select class='form-control' name='tahun' id='tahun' data-control="select2" data-hide-search="false" style="z-index:1">
                                    <option value='0' > Pilih Tahun </option>
                                    <?php foreach($tahun as $row){ ?>
                                        <option value='<?= $row->tahun ?>'><?= $row->tahun ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class='col-md-3'>
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
            <table class="table align-middle gs-0 gy-4" id="pengajuan_table">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="w-25px rounded-start">
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">
                            </div>
                        </th>
                        <th class="ps-4 ">Tahun</th>
                        <th class="ps-4 ">Periode</th>
                        <th class="ps-4 ">No Pengajuan</th>
                        <th class="ps-4 ">Nama Peternak</th>
                        <th class="ps-4 ">Asosiasi</th>
                        <th class="ps-4 ">Alamat</th>
                        <th class="ps-4 ">No HP</th>
                        <th class="ps-4 ">Populasi</th>
                        <th class="ps-4 ">Kebutuhan</th>
                        <th class="ps-4 ">Status Keanggotaan</th>
                        <th class="ps-4 ">Disetujui</th>
                        <th class="ps-4 ">Keterangan</th>
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
<div class="modal fade" id="pengajuan_modal" tabindex="-1" aria-hidden="true" style="z-index:10000;">
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
                <form id="pengajuan_form" class="form" >
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-7 fv-row">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="hidden" name="asosiasifk" id="asosiasifk">
                        <input type="hidden" name="periodefk" id="periodefk">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">No Pengajuan</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="No Pengajuan"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="" id="nopengajuan" name="nopengajuan" readonly/>
                    </div>  
                    <div class="row" >
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Populasi</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Populasi"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="" id="populasi" name="populasi" readonly/>
                        </div> 
                        <div class="d-flex flex-column mb-7 fv-row col-md-6">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Kebutuhan (dalam Kg)</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Kebutuhan"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="" id="kebutuhan" name="kebutuhan" readonly/>
                        </div>  
                    </div>
                    <div class="d-flex flex-column mb-7 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Harga perkilo</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Harga Sekilo"></i>
                        </label>
                        <!--end::Label-->
                        <input type="number" class="form-control form-control-solid" placeholder="" id="hargasekilo" name="hargasekilo" readonly/>
                    </div>  
                    <div class="d-flex flex-column mb-7 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Disetujui (dalam Kg)</span>
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
        //$("#pengajuan_table").DataTable();
        init();
    });

    $("#cari").click(function() {
        init();
    });
    
    function init() {

        var nopengajuan = "";
        if ($("#nopengajuan").val()) {
            nopengajuan = "&nopengajuan=" + $("#nopengajuan").val();
        }

        var tahun = "";
        if ($("#tahun").val() && $("#tahun").val() != "0") {
            tahun = "&tahun=" + $("#tahun").val();
        }

        var asosiasi = "";
        if ($("#asosiasi").val() && $("#asosiasi").val() != "0") {
            asosiasi = "&asosiasi=" + $("#asosiasi").val();
        }

        var numrows = "0";
        if ($("#numrows").val()) {
            numrows = $("#numrows").val();
        }
        $('#pengajuan_table').DataTable().destroy();
        var table = $('#pengajuan_table').DataTable().destroy();
        $('#pengajuan_table').DataTable({
            "destroy": true,
            "searching": false,
            'info': true,
            "lengthChange": false,
            ajax: {
                type: "GET",
                url: '<?= route_to('pengajuan_get') ?>' + `?numrows=${numrows}${nopengajuan}${tahun}${asosiasi}`,
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
                        return `<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input widget-13-check" type="checkbox" value="${row.id}">
                                </div>`;
                    }
                },
                {
                    name: "Tahun",
                    data: "tahun"
                },
                {
                    name: "Periode",
                    data: "periode"
                },
                {
                    name: "No Pengajuan",
                    data: "nopengajuan"
                },
                {
                    name: "Nama Peternak",
                    data: "username"
                },
                {
                    name: "Asosiasi",
                    data: "asosiasi"
                },
                {
                    name: "Alamat",
                    data: "alamat"
                },
                {
                    name: "No HP",
                    data: "nohp"
                },
                {
                    name: "Populasi",
                    data: "populasi"
                },
                {
                    name: "Kebutuhan",
                    data: "kebutuhan"
                },
                {
                    name: "Status Keanggotaan",
                    data: "statuskeanggotaan"
                },
                {
                    name: "Disetujui",
                    data: "disetujui"
                },
                {
                    name: "Keterangan",
                    data: "keterangan"
                },            
                {
                    width: "10%",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit" id="edit">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete" id="delete">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                `;
                    }
                },
                
            ]
        })

        table.draw();

    }

    // const showPengajuan = () => {
    //     const columns = [
    //         {
    //             width: "10%",
    //             sortable: false,
    //             render: function(data, type, row, meta) {
    //                 return `<div class="form-check form-check-sm form-check-custom form-check-solid">
    //                             <input class="form-check-input widget-13-check" type="checkbox" value="${row.id}">
    //                         </div>`;
    //             }
    //         },
    //         {
    //             name: "Tahun",
    //             data: "tahun"
    //         },
    //         {
    //             name: "Periode",
    //             data: "periode"
    //         },
    //         {
    //             name: "No Pengajuan",
    //             data: "nopengajuan"
    //         },
    //         {
    //             name: "Nama Peternak",
    //             data: "username"
    //         },
    //         {
    //             name: "Asosiasi",
    //             data: "asosiasi"
    //         },
    //         {
    //             name: "Alamat",
    //             data: "alamat"
    //         },
    //         {
    //             name: "No HP",
    //             data: "nohp"
    //         },
    //         {
    //             name: "Populasi",
    //             data: "populasi"
    //         },
    //         {
    //             name: "Kebutuhan",
    //             data: "kebutuhan"
    //         },
    //         {
    //             name: "Status Keanggotaan",
    //             data: "statuskeanggotaan"
    //         },
    //         {
    //             name: "Disetujui",
    //             data: "disetujui"
    //         },
    //         {
    //             name: "Keterangan",
    //             data: "keterangan"
    //         },            
    //         {
    //             width: "10%",
    //             sortable: false,
    //             render: function(data, type, row, meta) {
    //                 return `<button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit" id="edit">
    //                             <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
    //                             <span class="svg-icon svg-icon-3">
    //                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    //                                     <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
    //                                     <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
    //                                 </svg>
    //                             </span>
    //                             <!--end::Svg Icon-->
    //                         </button>
    //                         <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete" id="delete">
    //                             <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
    //                             <span class="svg-icon svg-icon-3">
    //                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    //                                     <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
    //                                     <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
    //                                     <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
    //                                 </svg>
    //                             </span>
    //                             <!--end::Svg Icon-->
    //                         </button>
    //                         `;
    //             }
    //         },
            
    //     ];

    //     // var table = $('#pengajuan_table').DataTable({
    //     //     searching: true,
    //     //     destroy: true,
    //     //     lengthChange: false,
    //     //     ajax: {
    //     //         url: "",
    //     //     },
    //     //     columns: columns,
    //     //     "dom":
    //     //         "<'row'" +
    //     //         "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
    //     //         "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
    //     //         ">" +

    //     //         "<'table-responsive'tr>" +

    //     //         "<'row'" +
    //     //         "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
    //     //         "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
    //     //         ">"
    //     // });
    // }

    $('#btn_create').on('click', function() {
        $("#pengajuan_modal #modal_title").text("Tambah Pengajuan");
        $("#pengajuan_modal").modal("show");
    });

    $('#pengajuan_table tbody').on('click', '#edit', function() {
        var data = $('#pengajuan_table').DataTable().row($(this).parents('tr')).data();
        $("#pengajuan_modal #nopengajuan").val(data.nopengajuan);
        $("#pengajuan_modal #populasi").val(data.populasi);
        $("#pengajuan_modal #kebutuhan").val(data.kebutuhan);
        $("#pengajuan_modal #hargasekilo").val(data.hargasekilo);
        $("#pengajuan_modal #user_id").val(data.user_id);
        $("#pengajuan_modal #asosiasifk").val(data.asosiasifk);
        $("#pengajuan_modal #periodefk").val(data.periodefk);
        $("#pengajuan_modal #id").val(data.idpengajuan);

        $("#pengajuan_modal #modal_title").text("Persetujuan Pengajuan");
        $("#pengajuan_modal").modal("show");
    });

    $('#pengajuan_table tbody').on('click', '#delete', function() {
        var data = $('#pengajuan_table').DataTable().row($(this).parents('tr')).data();
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "data "+data.nopengajuan+" akan dihapus dari sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Silahkan!",
            cancelButtonText: "Tidak, Jangan dihapus!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `<?= base_url() ?>pengajuan/delete/${data.idpengajuan}`,
                    type: 'post',
                    dataType: 'json',
                    data: "id="+data.idpengajuan,
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
                toastr.error("data "+data.pengajuan+" tidak jadi dihapus");                
            }
        });
        
        

    });


    $('#pengajuan_modal').on('hidden.bs.modal', function(e) {
        $(this).find("input,textarea").val('').end();
    }) 

    $('#pengajuan_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#pengajuan_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>pengajuan/${id}/edit` :
            "<?= route_to('pengajuan.store') ?>";
        
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
                    $("#pengajuan_modal").modal("hide");
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