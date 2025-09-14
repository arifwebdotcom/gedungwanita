<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Paket',
    'items' => [
        ['name' => 'Master', 'active' => false],
        ['name' => 'Paket', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Master Paket</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Paket</span>
        </h3>
        <div class="card-toolbar">            
            <a href="!#" id='btn_create' class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#paket_modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->Tambah Paket</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <div class="table-responsive text-nowrap">
                <table class="table" id="paket_table" style="width:100%">
                <thead>
                    <tr>
                    <th class="w-25px rounded-start">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">
                        </div>
                    </th>
                    <th>Keterangan</th>
                    <th>Bulan</th>
                    <th>Minggu</th>
                    <th>Sesi</th>
                    <th>Biaya</th>
                    <th>Biaya Per Sesi</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0"> 
                         
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
<div class="modal fade" id="paket_modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="paket_form" class="form" >
        <div class="row">
            <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
                <input type="hidden" name="id" id="id">
                <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                <label for="kelas">Paket</label>
            </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col mb-2">
            <div class="form-floating form-floating-outline">
                <input type="number" id="bulan" name="bulan" class="form-control" placeholder="1 / 3">
                <label for="bulan">Bulan</label>
            </div>
            </div>            
        </div>
        <div class="row g-4">
            <div class="col mb-2">
            <div class="form-floating form-floating-outline">
                <input type="number" id="minggu" name="minggu" class="form-control" placeholder="1 / 2">
                <label for="minggu">Minggu</label>
            </div>
            </div>            
        </div>
        <div class="row g-4">
            <div class="col mb-2">
            <div class="form-floating form-floating-outline">
                <input type="number" id="totalsesi" name="totalsesi" class="form-control" placeholder="Total Sesi">
                <label for="totalsesi">Total Sesi</label>
            </div>
            </div>            
        </div>
        <div class="row g-4">
            <div class="col mb-2">
            <div class="form-floating form-floating-outline">
                <input type="text" id="biaya" name="biaya" class="form-control" placeholder="Biaya">
                <label for="biaya">Biaya</label>
            </div>
            </div>            
        </div>
        <div class="row g-4">
            <div class="col mb-2">
            <div class="form-floating form-floating-outline">
                <input type="text" id="biayapersesi" name="biayapersesi" class="form-control" placeholder="Enter Name">
                <label for="biayapersesi">Biaya Persesi</label>
            </div>
            </div>            
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>


<script>
    $(document).ready(function() {
        //$("#paket_table").DataTable();
        showPaket();

        function hitungBiayaPerSesi() {
            let totalSesi = parseInt($('#totalsesi').val()) || 0;
            let biaya = parseFloat($('#biaya').val().replace(/\./g, '').replace(/,/g, '')) || 0;

            if (totalSesi > 0 && biaya > 0) {
            let perSesi = Math.ceil(biaya / totalSesi); // 🔹 roundup
            $('#biayapersesi').val(perSesi);
            } else {
            $('#biayapersesi').val('');
            }
        }

        $('#totalsesi, #biaya').on('input', function() {
            hitungBiayaPerSesi();
        });

    });

    const showPaket = () => {
        console.log("show");
        const columns = [
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
                name: "Keterangan",
                data: "keterangan"
            },
            {
                name: "Periode Bulan",
                data: null, 
                render: function(data, type, row) {
                    return row.periodebulan + ' Bulan';
                }
            },
            {
                name: "Periode Minggu",
                data: "null", 
                render: function(data, type, row) {
                    return row.perminggu + ' / minggu ';
                }
            },
            {
                name: "Total Sesi",
                data: "totalsesi"
            },
            {
                name: "Biaya",
                data: null, 
                render: function(data, type, row) {
                    return formatRupiah(row.biaya);
                }
            },
            {
                name: "Biaya",
                data: null, 
                render: function(data, type, row) {
                    return formatRupiah(row.biayapersesi);
                }
            },
            {
                width: "10%",
                sortable: false,
                render: function(data, type, row, meta) {
                    return `<button class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit edit" id="edit">
                                <i class="icon-base ri ri-edit-box-line icon-22px"></i>
                            </button>
                            <button class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit delete" id="delete">
                                <i class="icon-base ri ri-delete-bin-fill icon-22px"></i>
                            </button>
                            `;
                }
            },
            
        ];


        var table = $('#paket_table').DataTable({
            searching: true,
            destroy: true,
            lengthChange: false,
            ajax: {
                url: "<?= route_to('paket.datatable') ?>",
            },
            columns: columns,
            "dom":
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    }

    $('#btn_create').on('click', function() {
        $("#paket_modal #modal_title").text("Tambah Paket");
        $("#paket_modal").modal("show");
    });

    $('#paket_table tbody').on('click', '#edit', function() {
        var data = $('#paket_table').DataTable().row($(this).parents('tr')).data();
        $("#paket_modal #bulan").val(data.periodebulan);
        $("#paket_modal #minggu").val(data.perminggu);
        $("#paket_modal #totalsesi").val(data.totalsesi);
        $("#paket_modal #biaya").val(data.biaya);
        $("#paket_modal #biayapersesi").val(data.biayapersesi);
        $("#paket_modal #keterangan").val(data.keterangan);
        $("#paket_modal #id").val(data.id);

        $("#paket_modal #modal_title").text("Edit Paket");
        $("#paket_modal").modal("show");
    });

    $('#paket_table tbody').on('click', '#delete', function() {
        var data = $('#paket_table').DataTable().row($(this).parents('tr')).data();
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "data "+data.paket+" akan dihapus dari sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Silahkan!",
            cancelButtonText: "Tidak, Jangan dihapus!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `<?= base_url() ?>paket/delete/${data.id}`,
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
                            showPaket();
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
                toastr.error("data "+data.paket+" tidak jadi dihapus");                
            }
        });
        
        

    });


    $('#paket_modal').on('hidden.bs.modal', function(e) {
        $(this).find("input,textarea").val('').end();
    }) 

    $('#paket_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#paket_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>paket/${id}/edit` :
            "<?= route_to('paket.store') ?>";
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            success: function(response) {                
                if (response.status) {
                    $("#paket_modal").modal("hide");
                    showPaket();
                    toastr.success(response.messages,"Sukses");
                } else {
                    toastr.error("Gagal!","Error");
                }
            },
            error: function(err) {
                toastr.error(err,"Error");
            }
        });    
    });
</script>
<?= $this->endSection() ?>