<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Client',
    'items' => [
        ['name' => 'Master', 'active' => false],
        ['name' => 'Client', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Master</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Client</span>
        </h3>
        <div class="card-toolbar">            
            <a href="!#" id='btn_create' class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#client_modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->Tambah Client</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <div class="table-responsive text-nowrap">
                <table class="table" id="client_table"  style="width:100%">
                <thead>
                    <tr>
                    <th class="w-25px rounded-start">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">
                        </div>
                    </th>
                    <th>Pemesan</th>
                    <th>Mempelai</th>
                    <th>Tanggal</th>
                    <th>Paket</th>
                    <th>Status</th>
                    <th>Tgl Booking</th>
                    <th>NoHP</th>
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
<div class="modal fade" id="client_modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-simple" role="document">
    <form id="client_form" class="form" >
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="col-md-12 mb-2">
            <div class="form-floating form-floating-outline">
                <select id="tipefk" name="tipefk" class="form-select">
                    <?php foreach($tipe as $t): ?>
                        <option value="<?= $t->id ?>"><?= $t->tipeevent ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="tipefk">Tipe Event</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">                
                    <input type="hidden" id="id" name="id" class="form-control">
                    <input type="text" id="pemesan" name="pemesan" class="form-control" placeholder="Pemesan">
                    <label for="pemesan">Pemesan</label>
                </div>
            </div>
            <!-- No HP Saudara -->
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="nohpsaudara" name="nohpsaudara" class="form-control" placeholder="No HP Saudara">
                    <label for="nohpsaudara">No HP Saudara</label>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- No HP -->
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="nohp" name="nohp" class="form-control" placeholder="No HP">
                    <label for="nohp">No HP</label>
                </div>
            </div>
            <!-- Email -->
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                    <label for="email">Email</label>
                </div>
            </div>
        </div>
        <!-- Alamat -->
        <div class="col-md-12 mb-2">
            <div class="form-floating form-floating-outline">
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat">
                <label for="alamat">Alamat</label>
            </div>
        </div>
        
        <div class="row">
            <!-- CPP -->
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="cpp" name="cpp" class="form-control" placeholder="Nama CPP">
                    <label for="cpp">Nama CPP</label>
                </div>
            </div>

            <!-- IG CPP -->
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="igcpp" name="igcpp" class="form-control" placeholder="Instagram CPP">
                    <label for="igcpp">IG CPP</label>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- CPW -->
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="cpw" name="cpw" class="form-control" placeholder="Nama CPW">
                    <label for="cpw">Nama CPW</label>
                </div>
            </div>

            <!-- IG CPW -->
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="igcpw" name="igcpw" class="form-control" placeholder="Instagram CPW">
                    <label for="igcpw">IG CPW</label>
                </div>
            </div>
        </div>
        

       

        <!-- Tanggal -->
        <div class="col-md-12 mb-2">
            <div class="form-floating form-floating-outline">
                <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal">
                <label for="tanggal">Tanggal</label>
            </div>
        </div>

        <div class="row">
            <!-- Sesi -->
            <div class="col-md-4 mb-2">
                <div class="form-floating form-floating-outline">
                    <select id="sesi" name="sesi" class="form-select">
                        <option value="PAGI">PAGI</option>
                        <option value="SIANG">SIANG</option>
                        <option value="MALAM">MALAM</option>
                    </select>
                    <label for="sesi">Sesi</label>
                </div>
            </div>

        <!-- Status -->
         
           <div class="col-md-4 mb-2">
                <div class="form-floating form-floating-outline">
                    <select id="status" name="status" class="form-select">
                        <option value="KEEP">KEEP</option>
                        <option value="DP">DP</option>
                        <option value="50%">50%</option>
                        <option value="LUNAS">LUNAS</option>
                    </select>
                    <label for="status">Status</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-floating form-floating-outline">
                    <select id="paket" name="paket" class="form-select">
                        <?php foreach($paket as $p): ?>
                            <option value="<?= $p->id ?>"><?= $p->paket ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="paket">Paket</label>
                </div>
            </div>
         </div>

            <!-- Paket -->
            
        <div class="row">
            <div class="col-md-4 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="number" step="1" id="kursi" name="kursi" class="form-control" placeholder="Jumlah Tamu">
                    <label for="kursi">Jumlah Tamu</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="eo" name="eo" class="form-control" placeholder="Event Organizer">
                    <label for="eo">Event Organizer</label>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="katering" name="katering" class="form-control" placeholder="Katering">
                    <label for="katering">Katering</label>
                </div>
            </div>
        </div>

        <!-- Detail -->
        <div class="col-md-12 mb-2">
            <div class="form-floating form-floating-outline">
                <textarea id="keterangan" name="keterangan" class="form-control" style="height: 120px" placeholder="Detail"></textarea>
                <label for="keterangan">Keterangan</label>
            </div>
        </div>
        <div class="row">
            <!-- Harga Asli -->
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="number" step="1" id="hargaasli" name="hargaasli" class="form-control" placeholder="Harga Asli">
                    <label for="hargaasli">Harga Asli</label>
                </div>
            </div>

        <!-- Harga Deal -->
            <div class="col-md-6 mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="number" step="0.01" id="hargadeal" name="hargadeal" class="form-control" placeholder="Harga Deal">
                    <label for="hargadeal">Harga Deal</label>
                </div>
            </div>    
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
        </div>        
    </div>
    </form>
    </div>
</div>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>


<script>
    $(document).ready(function() {
        $("#client_table").DataTable();
        showClient();

       
    });


    function showClient() {      
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
                name: "Pemesan",
                data: "pemesan"
            },
            {
                name: "Mempelai",
                data: "null", 
                render: function(data, type, row) {
                    return row.cpp + ' & ' + row.cpw;
                }
            },
            {
                name: "Tanggal",
                data: "null", 
                render: function(data, type, row) {
                    return row.tanggal + ' ~ ' + row.sesi;
                }
            },
            {
                name: "Paket",
                data: "paket"
            },
            {
                name: "Status",
                data: "status"
            },
            {
                name: "Tgl Booking",
                data: "created_at"
            },
            {
                name: "NoHP",
                data: "nohp"
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


        var table = $('#client_table').DataTable({
            searching: true,
            destroy: true,
            lengthChange: false,
            ajax: {
                url: "<?= route_to('client.datatable') ?>",
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
        $("#client_modal #modal_title").text("Tambah Client");
        $("#client_modal").modal("show");
    });

    $('#client_table tbody').on('click', '#edit', function() {
        var data = $('#client_table').DataTable().row($(this).parents('tr')).data();
        let id = data.bookingid;
        window.location.href = "<?= base_url('client/show') ?>/" + id;
    });

    $('#client_table tbody').on('click', '#delete', function() {
        var data = $('#client_table').DataTable().row($(this).parents('tr')).data();
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "data "+data.client+" akan dihapus dari sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Silahkan!",
            cancelButtonText: "Tidak, Jangan dihapus!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `<?= base_url() ?>client/delete/${data.id}`,
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
                            showClient();
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
                toastr.error("data "+data.client+" tidak jadi dihapus");                
            }
        });
        
        

    });


    $('#client_modal').on('hidden.bs.modal', function(e) {
        $(this).find("input,textarea").val('').end();
    }) 

    $('#client_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#client_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>client/${id}/edit` :
            "<?= route_to('client.store') ?>";
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            success: function(response) {     
                console.log(response);           
                if (response.status) {
                    $("#client_modal").modal("hide");
                    showClient();
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