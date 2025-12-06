<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Laporan',
    'items' => [
        ['name' => 'Master', 'active' => false],
        ['name' => 'Laporan', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Laporan</span>
            <span class="text-muted mt-1 fw-bold fs-7">Laporan Pemakaian Pendopo</span>
        </h3>        
        <div class="row card-header mx-0 px-2">
            <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto">
                <h5 class="card-title mb-0">
                    Filter
                </h5>
            </div>
            <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto">
                <div class="dt-buttons btn-group flex-wrap"> 
                    <div class='form-group me-2'>
                        <select id="tipe" name="tipefk" class="form-control select2" style="width: 100%;">
                            <option value="0">Pilih Event</option>
                            <?php foreach($tipe as $row) {?>
                            <option value="<?= $row->id; ?>"><?= $row->tipeevent; ?></option>
                            <?php } ?>                            
                        </select>                      
                    </div>
                    <div class='form-group me-2'>
                        <select id="paket" name="paketfk" class="form-control select2" style="width: 100%;">
                            <option value="0">Pilih Paket</option>
                            <?php foreach($paket as $row) {?>
                            <option value="<?= $row->id; ?>"><?= $row->paket; ?></option>
                            <?php } ?>                            
                        </select>                        
                    </div>
                    <div class='form-group me-2'>                        
                        <input type="month" class="form-control" id="bulan" name="monthYear">                    
                    </div>
                    <div class='form-group me-2'>
                        <input type="text" class="form-control" placeholder="Keywords" id="keywords"/>                       
                    </div>
                    <div class="btn-group">
                        <input type="text" class="form-control" placeholder="Masukkan nilai" id="numrows" value="50" style="width: 70px;" />
                        <button class="btn btn-outline-success btn-primary waves-effect waves-light" type="button" id="cari">
                            <svg class="aa-SubmitIcon" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M16.041 15.856c-0.034 0.026-0.067 0.055-0.099 0.087s-0.060 0.064-0.087 0.099c-1.258 1.213-2.969 1.958-4.855 1.958-1.933 0-3.682-0.782-4.95-2.050s-2.050-3.017-2.050-4.95 0.782-3.682 2.050-4.95 3.017-2.050 4.95-2.050 3.682 0.782 4.95 2.050 2.050 3.017 2.050 4.95c0 1.886-0.745 3.597-1.959 4.856zM21.707 20.293l-3.675-3.675c1.231-1.54 1.968-3.493 1.968-5.618 0-2.485-1.008-4.736-2.636-6.364s-3.879-2.636-6.364-2.636-4.736 1.008-6.364 2.636-2.636 3.879-2.636 6.364 1.008 4.736 2.636 6.364 3.879 2.636 6.364 2.636c2.125 0 4.078-0.737 5.618-1.968l3.675 3.675c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414z"></path></svg>
                        </button>
                        <button class="btn btn-outline-success btn-primary waves-effect waves-light" type="button" id="export">
                            <i class="icon-base ri ri-file-excel-line"></i>
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
                    <th>No</th>            
                    <th>Hari & Tanggal</th>            
                    <th>Jml Tamu</th>            
                    <th>Katering</th>                    
                    <th>EO</th>                    
                    <th>Harga Deal</th>
                    <th>Lain-lain</th>
                    <th>Total Pendapatan</th>
                    <th>Penyewa</th>
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

<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>


<script>
    $(document).ready(function() {
        $("#laporan_table").DataTable();
        init();

       
    });


    $("#cari").click(function() {
        init();
    });

    $("#export").click(function() {
        var bulan  = $("#bulan").val()  && $("#bulan").val() != "0" ? "&bulan=" + $("#bulan").val() : "";
        var tipe   = $("#tipe").val()   && $("#tipe").val() != "0"  ? "&tipe=" + $("#tipe").val()  : "";
        var paket = $("#paket").val() && $("#paket").val() != "0" ? "&paket=" + $("#paket").val() : "";

        // download langsung
        window.location.href = "<?= route_to('laporan.export') ?>"+ `?1=1${tipe}${paket}${bulan}`;
    });

    function init() {

        var bulan = "";
        if ($("#bulan").val() && $("#bulan").val() != "0") {
            bulan = "&bulan=" + $("#bulan").val();
        }

        var tipe = "";
        if ($("#tipe").val() && $("#tipe").val() != "0") {
            tipe = "&tipe=" + $("#tipe").val();
        }

        var paket = "";
        if ($("#paket").val() && $("#paket").val() != "0") {
            paket = "&paket=" + $("#paket").val();
        }

        var numrows = "0";
        if ($("#numrows").val()) {
            numrows = $("#numrows").val();
        }

        var keywords = "";
        if ($("#keywords").val() && $("#keywords").val() != "0") {
            keywords = "&keywords=" + $("#keywords").val();
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
                url: "<?= route_to('laporan.datatable') ?>"+ `?numrows=${numrows}${tipe}${paket}${keywords}${bulan}`,
                dataType: 'JSON',
                error: function(e) {
                    alert(e);
                },
            },
            columns: [                
                {
                    width: "10%",
                    sortable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + 1; // nomor urut dimulai dari 1
                    }
                },
                // {
                //     name: "Nama",
                //     data: "nama",
                //     render: function (data, type, row) {
                //     if (row.jeniskelamin === 'L') {
                //         return `<span class="badge rounded-pill bg-label-danger">${data}</span>`;
                //     } else if (row.jeniskelamin === 'P') {
                //         return `<span class="badge rounded-pill bg-label-info">${data}</span>`;
                //     } else {
                //         return data; // fallback, kalau kosong/tidak ada
                //     }
                //     }
                // },
                {
                    name: "Hari & Tanggal",
                    data: "tanggal",
                    render: function (data) {

                        if (!data) return "-";

                        // daftar nama hari & bulan Indonesia
                        const namaHari = [
                            "Minggu", "Senin", "Selasa", "Rabu",
                            "Kamis", "Jumat", "Sabtu"
                        ];

                        const namaBulan = [
                            "Januari", "Februari", "Maret", "April",
                            "Mei", "Juni", "Juli", "Agustus",
                            "September", "Oktober", "November", "Desember"
                        ];

                        // ubah string tanggal ke object Date
                        const d = new Date(data);

                        // ambil hari, tanggal, bulan, tahun
                        const hari = namaHari[d.getDay()];
                        const tanggal = d.getDate();
                        const bulan = namaBulan[d.getMonth()];
                        const tahun = d.getFullYear();

                        return `${hari}, ${tanggal} ${bulan} ${tahun}`;
                    }
                },
                {
                    name: "Jml Tamu",
                    data: "kursi"
                },
                {
                    name: "Katering",
                    data: "katering"
                },
                {
                    name: "Event Organizer",
                    data: "eo"
                },           
                {
                    name: "Harga Deal",
                    data: "hargadeal",
                    render: function (data, type, row) {
                        return rupiah(data) ? rupiah(data) : '0';
                    }
                },
                {
                    name: "Lain-lain",
                    data: "lainlain",
                    render: function (data, type, row) {
                        return rupiah(data) ? rupiah(data) : '0';
                    }
                },           
                {
                    name: "Total Pendapatan",
                    data: null,
                    render: function (data, type, row) {

                        // ubah ke angka (hindari NaN jika null / kosong)
                        const hargaDeal   = parseInt(row.hargadeal)  || 0;
                        const lainLain    = parseInt(row.lainlain)   || 0;

                        const total = hargaDeal + lainLain;

                        // Format rupiah
                        return rupiah(total);
                    }
                },           
                {
                    name: "Penyewa",
                    data: "pemesan"
                }        
                // {
                //     name: "Checkin",
                //     data: "",
                //     render: function(data,type,row,meta){
                //         if(row.checkin == 1){
                //             return ` <span class="badge rounded-pill  bg-label-success">Sudah</span>`;
                //         }else{
                //             return ` <span class="badge rounded-pill  bg-label-warning">Belum</span>`;
                //         }
                //     }
                // },           
                // {
                //     width: "10%",
                //     sortable: false,
                //     render: function(data, type, row, meta) {
                //         return `<button class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit edit" id="edit">
                //                     <i class="icon-base ri ri-edit-box-line icon-22px"></i>
                //                 </button>
                //                 <button class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit delete" id="delete">
                //                     <i class="icon-base ri ri-delete-bin-fill icon-22px"></i>
                //                 </button>
                //                 `;
                //     }
                // },
            ]
        })

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
        $("#laporan_modal #namalaporan").val(data.namalaporan);
        $("#laporan_modal #usiaawal").val(data.usiaawal);
        $("#laporan_modal #usiaakhir").val(data.usiaakhir);
        $("#laporan_modal #durasi").val(data.durasi);
        $("#laporan_modal #kapasitas").val(data.kapasitas);
        let color = data.color; // ambil dari atribut data-color
        pickr.setColor(color); // set default sesuai warna row
        //pickr.show();
        $("#laporan_modal #id").val(data.id);
        $("#laporan_modal #modal_title").text("Edit Laporan");
        $("#laporan_modal").modal("show");
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
</script>
<?= $this->endSection() ?>