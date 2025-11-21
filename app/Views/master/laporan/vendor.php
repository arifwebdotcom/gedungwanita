<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Laporan',
    'items' => [
        ['name' => 'Laporan', 'active' => false],
        ['name' => 'Pembayaran Vendor', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Laporan</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Laporan Vendor</span>
        </h3>
        <div class="card-toolbar">                                  
        </div>
        <div class="row card-header mx-0 px-2">
            <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto">
                <h5 class="card-title mb-0" id="total">
                    Total : 
                </h5><br>
                <h5 class="card-title mb-0" id="totaladmin">
                    Total Biaya Admin: 
                </h5>
            </div>
            <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto">
                <div class="dt-buttons btn-group flex-wrap"> 
                    <div class='form-group me-2'>                        
                        <input type="text" class="form-control" id="nama" name="nama">                    
                    </div>
                    <div class='form-group me-2'>                        
                        <input type="month" class="form-control" id="bulan" name="monthYear">                    
                    </div>
                    <div class='form-group me-2'>
                        <select id="status" name="status" class="form-control select2" style="width: 100%;">
                            <option value="0">Pilih Status Pembayaran</option>                            
                            <option value="LUNAS">LUNAS</option>
                            <option value="BELUM BAYAR">BELUM BAYAR</option>                            
                        </select>                        
                    </div>
                    <div class="btn-group">                        
                        <button class="btn btn-outline-success btn-primary waves-effect waves-light" type="button" id="cari">
                            <svg class="aa-SubmitIcon" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M16.041 15.856c-0.034 0.026-0.067 0.055-0.099 0.087s-0.060 0.064-0.087 0.099c-1.258 1.213-2.969 1.958-4.855 1.958-1.933 0-3.682-0.782-4.95-2.050s-2.050-3.017-2.050-4.95 0.782-3.682 2.050-4.95 3.017-2.050 4.95-2.050 3.682 0.782 4.95 2.050 2.050 3.017 2.050 4.95c0 1.886-0.745 3.597-1.959 4.856zM21.707 20.293l-3.675-3.675c1.231-1.54 1.968-3.493 1.968-5.618 0-2.485-1.008-4.736-2.636-6.364s-3.879-2.636-6.364-2.636-4.736 1.008-6.364 2.636-2.636 3.879-2.636 6.364 1.008 4.736 2.636 6.364 3.879 2.636 6.364 2.636c2.125 0 4.078-0.737 5.618-1.968l3.675 3.675c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414z"></path></svg>
                        </button>
                    </div>                     
                </div>
            </div>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <div class="table-responsive text-nowrap">
                <table class="table" id="laporan_table"  style="width:100%">
                <thead>
                    <tr>
                    <th class="w-25px rounded-start">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">
                        </div>
                    </th>
                    <th>Nama</th>            
                    <th>Usia</th>                    
                    <th>Checkin</th>
                    <th>Kategori</th>
                    <th>Kelas</th>
                    <th>Paket</th>
                    <th>Biaya</th>
                    <th>Biaya Vendor</th>
                    <th>Biaya Admin</th>
                    <th>Pembayaran</th>
                    <th>Check In</th>
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
<div class="modal fade" id="laporan_modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="laporan_form" class="form" >
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
                <input type="text" id="namalaporan" name="namalaporan" class="form-control" placeholder="Enter Name">
                <label for="namalaporan">Laporan</label>
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
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>

<div class="modal fade" id="vendor_modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="vendor_form" class="form" >        
        <div class="row g-4">
            <div class="col mb-2">
            <div class="form-floating form-floating-outline">
                <input type="text" id="namaanak" name="namaanak" class="form-control" placeholder="Enter Name">
                <label for="namaanak">Nama Anak</label>
            </div>
            </div>            
        </div>
        <div class="row g-4">
            <div class="col mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="kategori" name="kategori" class="form-control" placeholder="Kategori">
                    <label for="kategori">Kategori</label>
                </div>
            </div>                               
        </div>
        <div class="row g-4">
            <div class="col mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas">
                    <label for="kelas">Kelas</label>
                </div>
            </div>                               
        </div>        
        <div class="row g-4">
            <label class="form-check-label" id='totaltagihan'>Total Tagihan : </label>
            <div class="col mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="text" id="jumlahbayar" name="jumlahbayar" class="form-control" placeholder="Jumlah Dibayar">
                    <label for="jumlahbayar">Jumlah Dibayar</label>
                </div>
            </div>                               
        </div>        
        <div class="row">
            <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
                <input type="hidden" name="id" id="id">
                <select class="form-control" name="status" id="status">                                       
                        <option value="BELUM BAYAR">BELUM BAYAR</option>                    
                        <option value="BELUM LUNAS">BELUM LUNAS</option>                    
                        <option value="LUNAS">LUNAS</option>                    
                </select>
                <label for="kelas">Status</label>
            </div>
            </div>
        </div>
         <div class="row g-4">
            <div class="col mb-2">
                <div class="form-floating form-floating-outline">
                    <input type="date" id="tglbayar" name="tglbayar" class="form-control" placeholder="Tanggal Bayar">
                    <label for="tglbayar">Tanggal Bayar</label>
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
        //$("#laporan_table").DataTable();
        init();

       
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

    $("#cari").click(function() {
        init();
    });

    function init() {

        var bulan = "";
        if ($("#bulan").val() && $("#bulan").val() != "0") {
            bulan = "&bulan=" + $("#bulan").val();
        }
        var nama = "";
        if ($("#nama").val() && $("#nama").val() != "0") {
            nama = "&nama=" + $("#nama").val();
        }

        var status = "";
        if ($("#status").val() && $("#status").val() != "0") {
            status = "&status=" + $("#status").val();
        }

        $('#laporan_table').DataTable().destroy();
        //var table = $('#invoice_table').DataTable().destroy();
        var table = $('#laporan_table').DataTable({
            "destroy": true,
            "searching": false,
            'info': true,
            "lengthChange": false,
            ajax: {
                type: "GET",
                url: "<?= route_to('laporan.datatablevendor') ?>"+ `?1=1${bulan}${status}${nama}`,
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
                    name: "Nama",
                    data: "nama",
                    render: function (data, type, row) {
                    if (row.jeniskelamin === 'L') {
                        return `<span class="badge rounded-pill bg-label-danger">${data}</span>`;
                    } else if (row.jeniskelamin === 'P') {
                        return `<span class="badge rounded-pill bg-label-info">${data}</span>`;
                    } else {
                        return data; // fallback, kalau kosong/tidak ada
                    }
                    }
                },
                {
                    name: "Tgl Lahir",
                    data: "tgllahir",
                    render: function (data, type, row) {
                    if (!data) return "-";

                    // parsing tanggal
                    const dob = new Date(data); // data harus format YYYY-MM-DD dari server
                    const day = String(dob.getDate()).padStart(2, '0');
                    const month = String(dob.getMonth() + 1).padStart(2, '0');
                    const year = dob.getFullYear();

                    // hitung umur
                    const today = new Date();
                    let age = today.getFullYear() - year;
                    const m = today.getMonth() - dob.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                        age--;
                    }

                    return `${day}-${month}-${year} (${age} Tahun)`;
                    }
                },
                {
                    name: "Checkin",
                    data: "tanggal"
                },
                {
                    name: "Kategori",
                    data: "namakategori"
                },
                {
                    name: "Kelas",
                    data: "kelas"
                },           
                {
                    name: "Paket",
                    data: "namapaket"
                },           
                {
                    name: "Biaya",
                    data: "biaya",
                    render: function(data, type, row, meta) {
                        return rupiah(data)
                    }
                },           
                {
                    name: "Biaya Vendor",
                    data: "biaya_vendor",
                    render: function(data, type, row, meta) {
                        return rupiah(data)
                    }
                },           
                {
                    name: "Biaya Admin",
                    data: "biaya_admin",
                    render: function(data, type, row, meta) {
                        return rupiah(data)
                    }
                },           
                {
                    name: "Pembayaran",
                    data: "status",
                    render: function(data,type,row,meta){
                        if(row.status == 'LUNAS'){
                            return ` <span class="badge rounded-pill  bg-label-success">LUNAS</span>`;
                        }else if(row.status == 'BELUM LUNAS'){
                            return ` <span class="badge rounded-pill  bg-label-warning">BELUM LUNAS</span>`;
                        }else{
                            return ` <span class="badge rounded-pill  bg-label-danger">BELUM BAYAR</span>`;
                        }
                    }
                },           
                {
                    name: "Checkin",
                    data: "",
                    render: function(data,type,row,meta){
                        if(row.checkin == 1){
                            return ` <span class="badge rounded-pill  bg-label-success">Sudah</span>`;
                        }else{
                            return ` <span class="badge rounded-pill  bg-label-warning">Belum</span>`;
                        }
                    }
                },           
                {
                    width: "10%",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return `
                                <button class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit delete" id="delete">
                                    <i class="icon-base ri ri-delete-bin-fill icon-22px"></i>
                                </button>
                                `;
                    }
                },
            ]
        })

        table.on('draw', function () {
            var total = 0;
            // ambil semua data dari kolom biaya_vendor
            table.column(6, { page: 'all' }).data().each(function (value, index) {
                total += parseFloat(value) || 0;
            });

            var totaladmin = 0;
            // ambil semua data dari kolom biaya_vendor
            table.column(7, { page: 'all' }).data().each(function (value, index) {
                totaladmin += parseFloat(value) || 0;
            });

            // tampilkan ke elemen #total pakai helper rupiah()
            $('#total').text('Total : ' + rupiah(total));
            $('#totaladmin').text('Total Admin : ' + rupiah(totaladmin));
        });

    }

    const showLaporan = () => {
        
    }

    const rupiah = (number) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(number);
    }

    $('#btn_create').on('click', function() {
        $("#laporan_modal #modal_title").text("Tambah Laporan");
        $("#laporan_modal").modal("show");
    });

    $('#laporan_table tbody').on('click', '#edit', function() {
        var data = $('#laporan_table').DataTable().row($(this).parents('tr')).data();
        $("#vendor_modal #kategori").val(data.namakategori);
        $("#vendor_modal #kelas").val(data.kelas);
        $("#vendor_modal #namaanak").val(data.nama);
        $("#vendor_modal #status").val(data.status);
        $("#vendor_modal #id").val(data.id);
        $("#vendor_modal #modal_title").text("Edit Laporan");
        $("#vendor_modal #totaltagihan").html("Biaya Pendaftaran :"+rupiah(data.biayapendaftaran)+"<br> Biaya :"+rupiah(data.biaya)+"<p>Total :"+rupiah(parseInt(data.biayapendaftaran)+parseInt(data.biaya)));
        $("#vendor_modal").modal("show");
    });

    $('#laporan_table tbody').on('click', '#delete', function() {
        var data = $('#laporan_table').DataTable().row($(this).parents('tr')).data();
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "data "+data.laporan+" akan dihapus dari sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Silahkan!",
            cancelButtonText: "Tidak, Jangan dihapus!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `<?= base_url() ?>laporan/delete/${data.id}`,
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
                toastr.error("data "+data.laporan+" tidak jadi dihapus");                
            }
        });
        
        

    });


    $('#laporan_modal').on('hidden.bs.modal', function(e) {
        $(this).find("input,textarea").val('').end();
    }) 

    $('#laporan_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#laporan_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>laporan/${id}/edit` :
            "<?= route_to('laporan.store') ?>";
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            success: function(response) {                
                if (response.status) {
                    $("#laporan_modal").modal("hide");
                    init();
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

    $('#vendor_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#vendor_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>laporan/${id}/editvendor` :
            "<?= route_to('laporan.store') ?>";
        
        $.ajax({
            url: route,
            type: 'post',
            dataType: 'json',
            data: form_data,
            success: function(response) {                
                if (response.status) {
                    $("#vendor_modal").modal("hide");
                    init();
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