<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Kategori',
    'items' => [
        ['name' => 'Master', 'active' => false],
        ['name' => 'Kategori', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Master Kategori</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Kategori</span>
        </h3>
        <div class="card-toolbar">            
            <a href="!#" id='btn_create' class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kategori_modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->Tambah Kategori</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <div class="table-responsive text-nowrap">
                <table class="table" id="kategori_table"  style="width:100%">
                <thead>
                    <tr>
                    <th class="w-25px rounded-start">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">
                        </div>
                    </th>
                    <th>Kategori</th>
                    <th>Usia</th>
                    <th>Durasi</th>
                    <th>Kapasitas</th>
                    <th>Tipe</th>
                    <th>Warna</th>
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
<div class="modal fade" id="kategori_modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="kategori_form" class="form" >
        <div class="row">
            <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
                <input type="hidden" name="id" id="id">
                <select class="form-control" name="kelasfk">
                    <?php foreach($kelas as $row) {?>
                        <option value="<?= $row->id; ?>"><?= $row->kelas; ?></option>
                    <?php } ?> 
                </select>
                <label for="kelas">Kelas</label>
            </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col mb-2">
            <div class="form-floating form-floating-outline">
                <input type="text" id="namakategori" name="namakategori" class="form-control" placeholder="Enter Name">
                <label for="namakategori">Kategori</label>
            </div>
            </div>            
        </div>
        <div class="row g-4">
            <div class="col mb-2">
                <div class="form-floating form-floating-outline">                    
                    <label class="form-label" style="padding-left: 0px!important;">Warna</label><br><p>
                    <div id="picker"></div>
                    <input type="hidden" id="warna" name="warna" value="#000000">                    
                </div>
            </div>                               
        </div>
        <div class="row g-4">
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="number" step="0.1" id="usiaawal" name="usiaawal" class="form-control" placeholder="Enter Name">
                    <label for="usiaawal">Usia Awal</label>
                </div>
            </div>            
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="number" step="0.1" id="usiaakhir" name="usiaakhir" class="form-control" placeholder="Enter Name">
                    <label for="usiaakhir">Usia Akhir</label>
                </div>
            </div>            
        </div>
        <div class="row g-4">
            <div class="col mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="durasi" name="durasi" class="form-control" placeholder="Durasi">
                    <label for="durasi">Durasi</label>
                </div>
            </div>                               
        </div>
        <div class="row g-4">
            <div class="col mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="kapasitas" name="kapasitas" class="form-control" placeholder="Kapasitas">
                    <label for="kapasitas">Kapasitas</label>
                </div>
            </div>                               
        </div>        
        <div class="row g-4">
            <div class="col mb-2">
                <div class="form-floating form-floating-outline">
                    <select class="form-control" name="tipe">                        
                        <option value="REGULER">REGULER</option>                        
                        <option value="TRIAL">TRIAL</option>                        
                    </select>
                    <label for="tipe">Tipe</label>
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
        //$("#kategori_table").DataTable();
        showKategori();

       
    });

    const pickr = Pickr.create({
            el: '#picker',
            theme: 'classic',
            default: '#000000',
            components: {
                preview: true,
                opacity: true,
                hue: true,
                interaction: {
                hex: true,
                rgba: true,
                input: true,
                save: true
                }
            }
            });

            // kalau mau update saat selesai klik di luar (close dialog)
            pickr.on('hide', (instance) => {
            let hexa = instance.getColor().toHEXA().toString();
            $('#warna').val(hexa);
            });

    const showKategori = () => {
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
                name: "Kategori",
                data: "namakategori"
            },
            {
                name: "Usia",
                data: null, 
                render: function(data, type, row) {
                    return row.usiaawal + ' - ' + row.usiaakhir+ ' Tahun';
                }
            },
            {
                name: "Durasi",
                data: "null", 
                render: function(data, type, row) {
                    return row.durasi + ' menit ';
                }
            },
            {
                name: "Kapasitas",
                data: "kapasitas"
            },
            {
                name: "Tipe",
                data: "tipe"
            },
            {
                name: "Warna",
                data: "color",
                render: function (data, type, row) {
                    if (!data) return '';
                    return `<span class="badge rounded-pill" 
                                style="background-color:${data}; color:#fff;">
                                ${data}
                            </span>`;
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


        var table = $('#kategori_table').DataTable({
            searching: true,
            destroy: true,
            lengthChange: false,
            ajax: {
                url: "<?= route_to('kategori.datatable') ?>",
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
        $("#kategori_modal #modal_title").text("Tambah Kategori");
        $("#kategori_modal").modal("show");
    });

    $('#kategori_table tbody').on('click', '#edit', function() {
        var data = $('#kategori_table').DataTable().row($(this).parents('tr')).data();
        $("#kategori_modal #namakategori").val(data.namakategori);
        $("#kategori_modal #usiaawal").val(data.usiaawal);
        $("#kategori_modal #usiaakhir").val(data.usiaakhir);
        $("#kategori_modal #durasi").val(data.durasi);
        $("#kategori_modal #kapasitas").val(data.kapasitas);
        $("#kategori_modal #warna").val(data.color);
        let color = data.color; // ambil dari atribut data-color
        pickr.setColor(color); // set default sesuai warna row
        //pickr.show();
        $("#kategori_modal #id").val(data.id);
        $("#kategori_modal #modal_title").text("Edit Kategori");
        $("#kategori_modal").modal("show");
    });

    $('#kategori_table tbody').on('click', '#delete', function() {
        var data = $('#kategori_table').DataTable().row($(this).parents('tr')).data();
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "data "+data.kategori+" akan dihapus dari sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Silahkan!",
            cancelButtonText: "Tidak, Jangan dihapus!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `<?= base_url() ?>kategori/delete/${data.id}`,
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
                            showKategori();
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
                toastr.error("data "+data.kategori+" tidak jadi dihapus");                
            }
        });
        
        

    });


    $('#kategori_modal').on('hidden.bs.modal', function(e) {
        $(this).find("input,textarea").val('').end();
    }) 

    $('#kategori_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#kategori_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>kategori/${id}/edit` :
            "<?= route_to('kategori.store') ?>";
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            success: function(response) {                
                if (response.status) {
                    $("#kategori_modal").modal("hide");
                    showKategori();
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