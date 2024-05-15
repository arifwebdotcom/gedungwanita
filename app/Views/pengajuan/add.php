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
            <span class="card-label fw-bolder fs-3 mb-1">Tambah Pengajuan</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Pengajuan</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <form method="post" enctype="multipart/form-data" id="form_import">
    <div class="card-body py-3 row">
        <!--begin::Table container-->
        <div class="fv-row mb-10 col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">Nama Peternak</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Peternak"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-lg form-control-solid" name="first_name" id="first_name" placeholder="" value="<?= $user->username; ?>" readonly="true"/>
            <input type="hidden" class="form-control form-control-lg form-control-solid" name="email" id="email" placeholder="" value="<?= $user->email; ?>" />
            <input type="hidden" class="form-control form-control-lg form-control-solid" name="user_id" id="user_id" placeholder="" value="<?= user()->id; ?>" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">No Telpon Kantor</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nomor Telfon Kantor"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-lg form-control-solid" name="notelp" placeholder="" value="<?= $user->notelp; ?>" readonly="true"/>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">No HP</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nomor HP Pemilik"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-lg form-control-solid" name="nohp" id="nohp" placeholder="" value="<?= $user->nohp; ?>" readonly="true"/>
            <!--end::Input-->
        </div>
        <!--end::Input group--> 
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6 notmodal">
            <label class="required fs-6 fw-bold mb-2">Asosiasi</label>
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="asosiasifk" readonly="true">
            <?php foreach ($asosiasi as $row) : 
                if($row->id == $user->asosiasifk) {?>
                <option value="<?= $row->id ?>"><?= $row->asosiasi ?></option>
            <?php }
            endforeach ?>
            </select>
            <input type="hidden" name="asosiasi" id="asosiasi" value="<?= $user->asosiasifk ?>">
        </div>
        
        <div class="fv-row mb-10 col-lg-6">
        <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">Nama Peternakan</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Peternakan"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-lg form-control-solid" name="namapeternakan" placeholder="" value="<?= $user->namapeternakan; ?>" readonly="true" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--end::Input group--> 
        <div class="fv-row mb-10 col-lg-6">
            <label class='form-label'>Alamat <span class='text-danger'>*</span></label>
            <textarea rows='5' class='form-control form-control-lg form-control-solid' placeholder='Alamat' name='alamat' readonly="true"><?= $user->alamat; ?></textarea>
        </div>
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6">
            <label class="required fs-6 fw-bold mb-2">Periode</label>
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select Periode" name="periodefk" readonly="true">
            <?php foreach ($periode as $row) :  {?>
                <option value="<?= $row->id ?>"><?= $row->nama ?></option>
            <?php }
            endforeach ?>
            </select>
        </div>
        <div class="fv-row mb-10 col-lg-6">
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">Populasi (Ekor)</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Populasi"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="number" class="form-control form-control-lg form-control-solid" name="populasi" placeholder="" value="<?= $user->populasi; ?>" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->   
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">Kebutuhan Jagung (Ton)</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Kebutuhan Jagung"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="number" class="form-control form-control-lg form-control-solid" name="kebutuhan" placeholder="" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->  
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">Status Keanggotaan</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Status Keanggotaan"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-lg form-control-solid" name="statuskeanggotaan" placeholder="" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->  
        <!--end::Input group--> 
        <div class="fv-row mb-10 col-lg-12">
            <label class='form-label'>Keterangan <span class='text-danger'>*</span></label>
            <textarea rows='5' class='form-control form-control-lg form-control-solid' placeholder='Keterangan' name='keterangan' ><?= $user->keterangan; ?></textarea>
        </div>
        <!--end::Table container-->
        <div class="text-center pt-15">
            <button type="submit" class="btn btn-primary">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </div>
   
    <!--begin::Body-->
</div>
<!--end::Tables Widget 11-->
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>

<script src="<?= base_url() ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script>
    $(document).ready(function(){
        $("#periode").flatpickr({
            enableTime: false,
            dateFormat: "m-Y",
            mode: "single",
            minDate: "today",
            // Disable keyboard input
            allowInput: false        
            
        });
        // $('#periode').datepicker({
        // format: "yyyy-mm-dd",
        // startView: "months",
        // minViewMode: "months",
        // autoclose: true
        // });
    });
    $('#form_import').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
       
        
        $.ajax({
            url: '<?= route_to('pengajuan.store') ?>',
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
                    toastr.success(response.messages);
                    window.location.href = "<?= route_to('pengajuan.index') ?>";
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