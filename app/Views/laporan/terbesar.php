<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Laporan',
    'items' => [
        ['name' => 'Laporan', 'active' => false],
        ['name' => 'Total Simpanan Per Anggota', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Laporan</span>
            <span class="text-muted mt-1 fw-bold fs-7">Total Simpanan Per Anggota</span>
        </h3>
        <div class="card-toolbar">
            
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <div class='box-header with-border p-0 mb-4'>
            <div class='row ' style='padding-left: 1.5rem;'>            
                <div class='col-md-12'>
                    <div class="row">
                        <div class='<?= (user()->isadmin == 1?'col-md-3':'col-md-4'); ?>'>
                            <div class='form-group'>
                                <label class='col-form-label col-md-12'>Kode Anggota</label>
                                <input class='form-control' type='text' name='kodeanggota' placeholder='Kode Anggota' id='kodeanggota'>
                            </div>
                        </div>          
                        <div class='<?= (user()->isadmin == 1?'col-md-3':'col-md-4'); ?>'>
                            <div class='form-group'>
                                <label class='col-form-label col-md-12'>Nama Anggota</label>
                                <input class='form-control' type='text' name='namaanggota' placeholder='Nama Anggota' id='namaanggota'>
                            </div>
                        </div>   
                        <div class='<?= (user()->isadmin == 1?'col-md-3':'col-md-4'); ?>'>
                            <div class='form-group'>
                                <label class='col-form-label col-md-12'>Nama Peternakan</label>
                                <input class='form-control' type='text' name='namapeternakan' placeholder='Nama Peternakan' id='namapeternakan'>
                            </div>
                        </div>                                                              
                        <div class='<?= (user()->isadmin == 1?'col-md-1':'col-md-2'); ?>'>
                            <div class='form-group'>
                                <label class='col-form-label col-md-12'>Jml</label>
                                <input class='form-control' type='text' name='number' placeholder='80' id='numrows' value='50'>
                            </div>
                        </div>
                        <div class='col-md-1'>
                            <button class='waves-effect waves-light btn btn-social-icon btn btn-primary mt-12' id='export'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                                    <path d="M16 6V3H4V21H16V18H18V21C18 21.55 17.55 22 17 22H3C2.45 22 2 21.55 2 21V2C2 1.45 2.45 1 3 1H17C17.55 1 18 1.45 18 2V6H16Z" fill="white"/>
                                    <path opacity="0.3" d="M19 10H14C13.45 10 13 10.45 13 11V19C13 19.55 13.45 20 14 20H19C19.55 20 20 19.55 20 19V11C20 10.45 19.55 10 19 10ZM19 18H14V12H19V18Z" fill="white"/>
                                    <path opacity="0.3" d="M15 13H16V17H15V13Z" fill="white"/>
                                    <path opacity="0.3" d="M17 13H18V17H17V13Z" fill="white"/>
                                    <path d="M18 8H22V10H18V8Z" fill="white"/>
                                    <path d="M20 6H18V4H16V6H18V8H20V6Z" fill="white"/>
                                </svg>
                            </button>
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
            <table class="table align-middle gs-0 gy-4" id="laporan_table">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="w-25px rounded-start">
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">
                            </div>
                        </th>
                        <th class="ps-4 ">Kode Anggota</th>
                        <th class="ps-4 ">Nama Peternak</th>
                        <th class="ps-4 ">Nama Peternakan</th>
                        <th class="ps-4 ">Jumlah Setoran</th>
                        <th class="ps-4 ">Jumlah Tunggakan</th>      
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

<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>

<script src="<?= base_url() ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script>
    $(document).ready(function() {
        //$("#laporan_table").DataTable();
        init();
    });

    $("#cari").click(function() {
        init();
    });

    $("#export").click(function() {
        var namaanggota = "";
        if ($("#namaanggota").val()) {
            namaanggota = "&namaanggota=" + $("#namaanggota").val();
        }

        var kodeanggota = "";
        if ($("#kodeanggota").val()) {
            kodeanggota = "&kodeanggota=" + $("#kodeanggota").val();
        }

        var namapeternakan = "";
        if ($("#namapeternakan").val()) {
            namapeternakan = "&namapeternakan=" + $("#namapeternakan").val();
        }

        var tahun = "";
        if ($("#tahun").val() && $("#tahun").val() != "0") {
            tahun = "&tahun=" + $("#tahun").val();
        }

        var numrows = "0";
        if ($("#numrows").val()) {
            numrows = $("#numrows").val();
        }

        let url = '<?= route_to('laporan.exportdata') ?>' + `?numrows=${numrows}&namaanggota=${namaanggota}&tahun=${tahun}&kodeanggota=${kodeanggota}`;
        Swal.fire({ 
            allowOutsideClick: false,
            title: 'Harap Menunggu',
            text: 'Permintaan sedang di proses.',
            showCancelButton: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });
        
        var win = window.open(url, '_blank');
        if (win) {
            win.focus();
        } else {
            alert('Please allow popups for this website');
        }
        
        Swal.close();

    });

    function init() {

        var namaanggota = "";
        if ($("#namaanggota").val()) {
            namaanggota = "&namaanggota=" + $("#namaanggota").val();
        }

        var kodeanggota = "";
        if ($("#kodeanggota").val()) {
            kodeanggota = "&kodeanggota=" + $("#kodeanggota").val();
        }

        var namapeternakan = "";
        if ($("#namapeternakan").val()) {
            namapeternakan = "&namapeternakan=" + $("#namapeternakan").val();
        }

        var tahun = "";
        if ($("#tahun").val() && $("#tahun").val() != "0") {
            tahun = "&tahun=" + $("#tahun").val();
        }

        var numrows = "0";
        if ($("#numrows").val()) {
            numrows = $("#numrows").val();
        }
        $('#laporan_table').DataTable().destroy();
        var table = $('#laporan_table').DataTable().destroy();
        $('#laporan_table').DataTable({
            "destroy": true,
            "searching": false,
            'info': true,
            "lengthChange": false,
            ajax: {
                type: "GET",
                url: '<?= route_to('laporan.datatable') ?>' + `?numrows=${numrows}${kodeanggota}${namaanggota}${namapeternakan}${tahun}`,
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
                    name: "Kode Anggota",
                    data: "kodeanggota"
                },
                {
                    name: "Nama Pemilik",
                    data: "nama"
                },
                {
                    name: "Nama Peternakan",
                    data: "namapeternakan"
                },
                {
                    name: "Jumlah Setoran",
                    data: "setoran",
                    render: function(data, type, row, meta) {
                        return rupiah(data)
                    }
                },
                {
                    name: "Jumlah Tunggakan",
                    data: "tunggakan",
                    render: function(data, type, row, meta) {
                        return rupiah(data)
                    }
                },                                                    
            ]         
        })

        table.draw();

    }

    $('#laporan_table tbody').on('click', '#edit', function() {
        var data = $('#laporan_table').DataTable().row($(this).parents('tr')).data();
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

    $('#laporan_table tbody').on('click', '#tolak', function() {
        var data = $('#laporan_table').DataTable().row($(this).parents('tr')).data();
        $("#penolakan_modal #nopengajuan").val(data.nopengajuan);
        $("#penolakan_modal #populasi").val(data.populasi);
        $("#penolakan_modal #kebutuhan").val(data.kebutuhan);
        $("#penolakan_modal #hargasekilo").val(data.hargasekilo);
        $("#penolakan_modal #user_id").val(data.user_id);
        $("#penolakan_modal #asosiasifk").val(data.asosiasifk);
        $("#penolakan_modal #periodefk").val(data.periodefk);
        $("#penolakan_modal #id").val(data.idpengajuan);

        $("#penolakan_modal #modal_title").text("Penolakan Pengajuan");
        $("#penolakan_modal").modal("show");
    });

    $('#laporan_table tbody').on('click', '#delete', function() {
        var data = $('#laporan_table').DataTable().row($(this).parents('tr')).data();
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

    const rupiah = (number) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(number);
    }

    const desimal = (number) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(number);
    }


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

    $('#penolakan_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#penolakan_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>pengajuan/${id}/tolak` :
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
                    $("#penolakan_modal").modal("hide");
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