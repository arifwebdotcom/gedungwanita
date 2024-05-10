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
    <form action="<?= base_url() ?>user/store" method="post" enctype="multipart/form-data" id="form_import">
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
            <input type="text" class="form-control form-control-lg form-control-solid" name="first_name" id="first_name" placeholder=""  />
            <input type="hidden" class="form-control form-control-lg form-control-solid" name="email" id="email" placeholder=""  />
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
            <input type="text" class="form-control form-control-lg form-control-solid" name="notelp" placeholder=""  />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">Email</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Email"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="email" class="form-control form-control-lg form-control-solid" name="email" autocomplete="off" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                <span class="required">Password</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Password"></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="password" class="form-control form-control-lg form-control-solid" name="password" autocomplete="off"  />
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
            <input type="text" class="form-control form-control-lg form-control-solid" name="nohp" id="nohp" placeholder=""  />
            <!--end::Input-->
        </div>
        <!--end::Input group--> 
        <!--begin::Input group-->
        <div class="fv-row mb-10 col-lg-6 notmodal">
            <label class="required fs-6 fw-bold mb-2">Asosiasi</label>
            <select class="form-select form-select-solid " data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="asosiasifk">
            <?php foreach ($asosiasi as $row) : ?>
                <option value="<?= $row->id ?>"><?= $row->asosiasi ?></option>
            <?php endforeach ?>
            </select>
        </div>
        <div class='row'>
            <div class='col-md-4'>
            <div class='form-group'>
                <label class='form-label'>Alamat <span class='text-danger'>*</span></label>
                <textarea rows='5' class='form-control form-control-lg form-control-solid' placeholder='Alamat' name='alamat'><?= old('alamat') ?></textarea>
                <div class="invalid-feedback">
                </div>
            </div>
            </div>
            <div class='col-md-8 row alamat' >
            <div class='col-md-6 notmodal' >
                <div class='form-group'>
                <label class='form-label'>Kelurahan</label>
                <select class='form-control form-control-lg form-control-solid' name="kelurahanfk" style='width: 100%;' id='kelurahanfk'>

                </select>
                <input type='hidden' class='form-control form-control-lg form-control-solid' name='kelurahan' id='kelurahan' value="<?= old('kelurahan') ?>">
                </div>
            </div>
            <div class='col-md-6' >
                <div class='form-group'>
                <label class='form-label'>Kecamatan</label>
                <input type='text' class='form-control form-control-lg form-control-solid' name='kecamatan' id='kecamatan' placeholder='Kecamatan' readonly value="<?= old('kecamatan') ?>">
                <input type='hidden' class='form-control form-control-lg form-control-solid' name='kecamatanfk' id='kecamatanfk' value="<?= old('kecamatanfk') ?>">
                </div>
            </div>
            <div class='col-md-6' >
                <div class='form-group'>
                <label class='form-label'>Kabupaten</label>
                <input type='text' class='form-control form-control-lg form-control-solid' name='kotakabupaten' id='kotakabupaten' placeholder='Kabupaten' readonly value="<?= old('kotakabupaten') ?>">
                <input type='hidden' class='form-control form-control-lg form-control-solid' name='kotakabupatenfk' id='kotakabupatenfk' value="<?= old('kotakabupatenfk') ?>">
                </div>
            </div>
            <div class='col-md-6' >
                <div class='form-group'>
                <label class='form-label'>Provinsi</label>
                <input type='text' class='form-control form-control-lg form-control-solid' name='provinsi' id='provinsi' placeholder='Provinsi' readonly value="<?= old('provinsi') ?>">
                <input type='hidden' class='form-control form-control-lg form-control-solid' name='provinsifk' id='provinsifk' value="<?= old('provinsifk') ?>">
                </div>
            </div>
            </div>
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
        <div class="fv-row mb-10 col-lg-6 notmodal">
            <label class="required fs-6 fw-bold mb-2">Suplier Pakan</label>
            <select class="form-select form-select-solid " data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="suplierpakanfk">
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
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="frequensireplacement">                                        
                <option value="2 Kali">2 Kali</option>
                <option value="2 - 3 Kali">2 - 3 Kali</option>
                <option value="3 - 5 Kali">3 - 5 Kali</option>
                <option value="> 5 Kali">> 5 Kali</option>
            </select>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->                                
        <div class="fv-row col-lg-5">
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
                    <input class="form-check-input" type="radio" name="replacement" value="doc" />
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
        <div class="col-lg-7">
                <!--begin::Image input-->
                <?php
                    $ktp = base_url()."assets/media/avatars/ktp.jpeg";
                ?>
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?= $ktp ?>')">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-475px h-300px" style="background-image: url('<?= $ktp ?>')"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="avatar_remove" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                <!--end::Hint-->
            </div>
            <!--end::Input group-->  
            <div class="d-flex flex-stack pt-10">
                <!--begin::Wrapper-->
                <div class="me-2">
                    <a href="<?= route_to('user.index') ?>"><button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                        <span class="svg-icon svg-icon-3 me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black"></rect>
                                <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Back</button>
                    </a>
                </div>
                <!--end::Wrapper-->
                <!--begin::Wrapper-->
                <div>
                    <button type="submit" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                        <span class="indicator-label">Submit
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                        <span class="svg-icon svg-icon-3 ms-2 me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon--></span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>                
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Table container-->    
        <!--end::Input group-->     
        <!--end::Table container-->
    </div>
    </form>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 11-->
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<script src="<?= base_url() ?>assets/js/custom/documentation/forms/select2.js"></script>
<script src="<?= base_url() ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script>

    $(document).ready(function() {
        //$('.select2').select2()
        $('#kelurahanfk').select2({
        ajax: {
            url: '<?= route_to('user.search2') ?>',
            dataType: 'json',
            delay: 250,
            type: 'GET',
            data: function(params) {
            return {
                q: params.term
            };
            },
            processResults: function(data) {
            var arr = [];
            $.each(data, (index, item) => {
                var text = item.kelurahan + ', ' + item.kecamatan + ', ' + item.kotakabupaten + ', ' + item.provinsi
                arr.push({
                id: item.id,
                text: text,
                kelurahan: item.kelurahan,
                kecamatan: item.kecamatan,
                kecamatanfk: item.kecamatanfk,
                kotakabupaten: item.kotakabupaten,
                kotakabupatenfk: item.kotakabupatenfk,
                provinsi: item.provinsi,
                provinsifk: item.provinsifk,
                })
            })
            return {
                results: arr

            };
            },
            cache: true
        },
        placeholder: 'Kelurahan',
        minimumInputLength: 1
        })

        $('#kelurahanfk').on("select2:select", function(e) {
        console.log(e);
        $('#provinsifk').val(e.params.data.provinsifk);
        $('#provinsi').val(e.params.data.provinsi);
        $('#kotakabupatenfk').val(e.params.data.kotakabupatenfk);
        $('#kotakabupaten').val(e.params.data.kotakabupaten);
        $('#kecamatanfk').val(e.params.data.kecamatanfk);
        $('#kelurahan').val(e.params.data.kelurahan);
        $('#kecamatan').val(e.params.data.kecamatan);
        });

    })
    
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