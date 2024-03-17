<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<?php
$breadcrumb_items = [
    'title' => 'Member',
    'items' => [
        ['name' => 'Master', 'active' => false],
        ['name' => 'Member', 'active' => true]
    ]
];
?>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Tambah Member</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data Member</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
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
            <input type="text" class="form-control form-control-lg form-control-solid" name="first_name" id="first_name" placeholder="" value="<?= $user->username; ?>" />
            <input type="hidden" class="form-control form-control-lg form-control-solid" name="email" id="email" placeholder="" value="<?= $user->email; ?>" />
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
            <input type="text" class="form-control form-control-lg form-control-solid" name="notelp" placeholder="" value="<?= $user->notelp; ?>" />
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
            <input type="text" class="form-control form-control-lg form-control-solid" name="nohp" id="nohp" placeholder="" value="<?= $user->nohp; ?>" />
            <!--end::Input-->
        </div>
        <!--end::Input group--> 
        <div class="fv-row mb-10 col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">Nama Peternakan</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Peternakan"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-lg form-control-solid" name="namapeternakan" placeholder="" value="" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">Populasi</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Populasi"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="number" class="form-control form-control-lg form-control-solid" name="populasi" placeholder="" value="" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6">
            <label class="required fs-6 fw-bold mb-2">Suplier Pakan</label>
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="target_assign">
            <?php foreach ($suplierpakan as $row) : ?>
                <option value="<?= $row->id ?>"><?= $row->nama ?></option>
            <?php endforeach ?>
            </select>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-8 fv-row col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                <span class="required">Jenis Pakan</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Jenis Pakan"></i>
            </label>
            <!--end::Label-->
            <input class="form-control form-control-solid" value="" name="jenispakan" id="jenispakan" />
        </div>
        <!--end::Input group-->   
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-8 fv-row col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                <span class="required">Jenis Pullet</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Jenis Pullet"></i>
            </label>
            <!--end::Label-->
            <input class="form-control form-control-solid" value="" name="pullet" id="pullet" />
        </div>
        <!--end::Input group-->   
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6">
            <label class="required fs-6 fw-bold mb-2">Frekuensi</label>
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="target_assign">                                        
                <option value="2 Kali">2 Kali</option>
                <option value="2 - 3 Kali">2 - 3 Kali</option>
                <option value="3 - 5 Kali">3 - 5 Kali</option>
                <option value="> 5 Kali">> 5 Kali</option>
            </select>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->                                
        <div class="fv-row col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                <span class="required">Replacement</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your apps framework"></i>
            </label>
            <!--end::Label-->
            <!--begin:Option-->
            <label class="d-flex flex-stack cursor-pointer mb-5">
                <!--begin:Label-->
                <span class="d-flex align-items-center me-2">                                                
                    <!--begin:Info-->
                    <span class="d-flex flex-column">
                        <span class="fw-bolder fs-6">DOC</span>
                        <span class="fs-7 text-muted">Day Old Chick</span>
                    </span>
                    <!--end:Info-->
                </span>
                <!--end:Label-->
                <!--begin:Input-->
                <span class="form-check form-check-custom form-check-solid">
                    <input class="form-check-input" type="radio" checked="checked" name="replacement" value="doc" />
                </span>
                <!--end:Input-->
            </label>
            <!--end::Option-->
            <!--begin:Option-->
            <label class="d-flex flex-stack cursor-pointer mb-5">
                <!--begin:Label-->
                <span class="d-flex align-items-center me-2">                                               
                    <!--begin:Info-->
                    <span class="d-flex flex-column">
                        <span class="fw-bolder fs-6">Pullet</span>
                        <span class="fs-7 text-muted">Ayam siap Produksi</span>
                    </span>
                    <!--end:Info-->
                </span>
                <!--end:Label-->
                <!--begin:Input-->
                <span class="form-check form-check-custom form-check-solid">
                    <input class="form-check-input" type="radio" name="replacement" value="pullet" />
                </span>
                <!--end:Input-->
            </label>
            <!--end::Option-->
            <!--begin:Option-->
            <label class="d-flex flex-stack cursor-pointer mb-5">
                <!--begin:Label-->
                <span class="d-flex align-items-center me-2">                                               
                    <!--begin:Info-->
                    <span class="d-flex flex-column">
                        <span class="fw-bolder fs-6">Keduanya</span>
                        <span class="fs-7 text-muted">DOC & Pullet</span>
                    </span>
                    <!--end:Info-->
                </span>
                <!--end:Label-->
                <!--begin:Input-->
                <span class="form-check form-check-custom form-check-solid">
                    <input class="form-check-input" type="radio" name="replacement" value="kedua" />
                </span>
                <!--end:Input-->
            </label>
            <!--end::Option-->                                        
        </div>
        <!--end::Input group-->     
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
    
    $('#user_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#user_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>user/${id}/edit` :
            "<?= route_to('user.store') ?>";
        
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
                    $("#user_modal").modal("hide");
                    showUser();
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