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
            <span class="text-muted mt-1 fw-bold fs-7">Data Laporan</span>
        </h3>
        <div class="card-toolbar">            
            <a href="!#" id='btn_create' class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#laporan_modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->Tambah Laporan</a>            
        </div>
        <div class="row card-header mx-0 px-2">
            <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto">
                <h5 class="card-title mb-0">
                    Filter
                </h5>
            </div>
            <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto">
                <div class="dt-buttons btn-group flex-wrap"> 
                    <div class='form-group me-2'>                        
                        <input type="month" class="form-control" id="bulan" name="monthYear">                    
                    </div>
                    <div class='form-group me-2'>
                        <select id="kelas" name="kelasfk" class="form-control select2" style="width: 100%;">
                            <option value="0">Pilih Kelas</option>
                            <?php foreach($kelas as $row) {?>
                            <option value="<?= $row->id; ?>"><?= $row->kelas; ?></option>
                            <?php } ?>                            
                        </select>                      
                    </div>
                    <div class='form-group me-2'>
                        <select id="kategori" name="kategorifk" class="form-control select2" style="width: 100%;">
                            <option value="0">Pilih Kategori</option>
                            <?php foreach($kategori as $row) {?>
                            <option value="<?= $row->id; ?>"><?= $row->namakategori; ?></option>
                            <?php } ?>                            
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
                    <th>No</th> 
                    <th>Nama Kelas</th>            
                    <th>Biaya</th>                    
                    <th>Admin</th>
                    <th>Omset</th>
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

<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>


<script>
    $(document).ready(function() {
        //$("#laporan_table").DataTable();
        init();

       
    });

    $("#cari").click(function() {
        init();
    });

    function init() {

        var bulan = "";
        if ($("#bulan").val() && $("#bulan").val() != "0") {
            bulan = "&bulan=" + $("#bulan").val();
        }

        var kelas = "";
        if ($("#kelas").val() && $("#kelas").val() != "0") {
            kelas = "&kelas=" + $("#kelas").val();
        }

        var kategori = "";
        if ($("#kategori").val() && $("#kategori").val() != "0") {
            kategori = "&kategori=" + $("#kategori").val();
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
                url: "<?= route_to('laporan.datatablekelas') ?>"+ `?1=1${kelas}${kategori}${bulan}`,
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
                {
                    name: "Nama Kelas",
                    data: "namakategori"
                },           
                {
                    name: "Biaya",
                    data: "total_biaya",
                    render: function(data,type,row,meta){
                        return rupiah(data);
                    }
                },           
                {
                    name: "Admin",
                    data: "total_biaya_admin",
                    render: function(data,type,row,meta){
                        return rupiah(data);
                    }
                },           
                {
                    name: "Omset",
                    data: "omset",
                    render: function(data,type,row,meta){
                        return rupiah(data);
                    }
                },
            ]
        })

    }

    function rupiah(number) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(number);
    }

</script>
<?= $this->endSection() ?>