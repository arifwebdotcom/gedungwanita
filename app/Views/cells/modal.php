<!--begin::Modal - Create App-->
<div class="modal fade" id="kt_modal_create_app"  aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2><?php if(user()->isadmin != 1)
                { echo "Lengkapi Data Pemilik";}else{
                                        echo "Tambah Anggota";
                                    } ?></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-lg-10 px-lg-10">
                <!--begin::Stepper-->
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
                    <!--begin::Aside-->
                    <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                        <!--begin::Nav-->
                        <div class="stepper-nav ps-lg-10">
                            <!--begin::Step 1-->
                            <div class="stepper-item current" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Data diri</h3>
                                    <div class="stepper-desc">Input Data Pemilik</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">2</span>
                                </div>
                                <!--begin::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Peternakan</h3>
                                    <div class="stepper-desc">Data Peternakan</div>
                                </div>
                                <!--begin::Label-->
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 2-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">3</span>
                                </div>
                                <!--begin::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Alamat</h3>
                                    <div class="stepper-desc">Data Alamat</div>
                                </div>
                                <!--begin::Label-->
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 3-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">4</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Replacement</h3>
                                    <div class="stepper-desc">Select the app database type</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 3-->
                            <!--begin::Step 4-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">5</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Pembayaran</h3>
                                    <div class="stepper-desc">Pembayaran Pedaftaran Anggota</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 4-->
                            <!--begin::Step 5-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">6</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Completed</h3>
                                    <div class="stepper-desc">Review and Submit</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 5-->
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--begin::Aside-->
                    <!--begin::Content-->
                    <div class="flex-row-fluid py-lg-5 px-lg-15">
                        <!--begin::Form-->
                        <form class="form" action="<?= base_url() ?>user/<?= user()->id; ?>/editmodal" method="post" enctype="multipart/form-data" novalidate="novalidate" id="kt_modal_create_app_form">
                            <!--begin::Step 1-->
                            <div class="current" data-kt-stepper-element="content">
                                <div class="w-100">                                    
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                            <span class="required">Nama Peternak</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"  title="Masukkan Nama Peternak"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="username" id="username" placeholder="" value="<?= user()->username; ?>" />
                                        <input type="hidden" class="form-control form-control-lg form-control-solid" name="email" id="email" placeholder="" value="<?= user()->email; ?>" />
                                        <input type="hidden" class="form-control form-control-lg form-control-solid" name="id" id="id" placeholder="" value="<?= user()->id; ?>" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                            <span class="required">No Telpon Kantor</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nomor Telfon Kantor"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="notelp" placeholder="" value="<?= user()->notelp; ?>" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                            <span class="required">No HP</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nomor HP Pemilik"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="nohp" id="nohp" placeholder="" value="<?= user()->nohp; ?>" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->                                    
                                </div>
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div data-kt-stepper-element="content">
                                <div class="w-100">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                            <span class="required">Nama Peternakan</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Peternakan"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="namapeternakan" placeholder="" value="<?= user()->namapeternakan; ?>" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                            <span class="required">Populasi</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Populasi"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control form-control-lg form-control-solid" name="populasi" placeholder="" value="<?= user()->populasi; ?>" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <label class="required fs-6 fw-bold mb-2">Suplier Pakan</label>
                                        <select class="form-select form-select-solid" data-dropdown-parent="#kt_modal_create_app" data-dropdown-parent="body" data-control="select2" data-hide-search="false" data-placeholder="Tampilkan Suplier Pakan" name="suplierpakanfk">
                                        <?php foreach ($suplierpakan as $row) : ?>
                                            <option value="<?= $row->id ?>" <?= ($row->id == user()->suplierpakanfk?"selected":"") ?>><?= $row->nama ?></option>
                                        <?php endforeach ?>
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Jenis Pakan</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Jenis Pakan"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input class="form-control form-control-solid" value="<?= user()->jenispakan; ?>" name="jenispakan" id="jenispakan" />
                                    </div>
                                    <!--end::Input group-->                                    
                                </div>
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 2-->
                            <div data-kt-stepper-element="content">
                                <div class="w-100">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                    <div class='form-group'>
                                        <label class='form-label'>Alamat <span class='text-danger'>*</span></label>
                                        <textarea rows='5' class='form-control form-control-lg form-control-solid' placeholder='Alamat' name='alamat'><?= $alamat->alamat; ?></textarea>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                    <div class='form-group'>
                                        <label class='form-label'>Kelurahan</label>
                                        <select class='form-control form-control-lg form-control-solid' name="kelurahanmodalfk" style='width: 100%;' id='kelurahanmodalfk' placeholder="<?= $alamat->kelurahan ?>">
                                            
                                        </select>
                                        <input type='hidden' class='form-control form-control-lg form-control-solid' name='kelurahanmodal' id='kelurahanmodal' value="<?= $alamat->kelurahan ?>">
                                    </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                    <div class='form-group'>
                                        <label class='form-label'>Kecamatan</label>
                                        <input type='text' class='form-control form-control-lg form-control-solid' name='kecamatanmodal' id='kecamatanmodal' placeholder='Kecamatan' readonly value="<?= $alamat->kecamatan ?>">
                                        <input type='hidden' class='form-control form-control-lg form-control-solid' name='kecamatanmodalfk' id='kecamatanmodalfk' value="<?= $alamat->kecamatanfk ?>">
                                    </div>
                                    </div>
                                    <!--end::Input group--> 
                                    <div class="fv-row mb-10">
                                    <div class='form-group'>
                                        <label class='form-label'>Kabupaten</label>
                                        <input type='text' class='form-control form-control-lg form-control-solid' name='kotakabupatenmodal' id='kotakabupatenmodal' placeholder='Kabupaten' readonly value="<?= $alamat->kotakabupaten ?>">
                                        <input type='hidden' class='form-control form-control-lg form-control-solid' name='kotakabupatenmodalfk' id='kotakabupatenmodalfk' value="<?= $alamat->kotakabupatenfk ?>">                                        
                                    </div>
                                    </div> 
                                    <div class="fv-row mb-10">
                                    <div class='form-group'>
                                        <label class='form-label'>Provinsi</label>
                                        <input type='text' class='form-control form-control-lg form-control-solid' name='provinsimodal' id='provinsimodal' placeholder='Provinsi' readonly value="<?= $alamat->provinsi ?>">
                                        <input type='hidden' class='form-control form-control-lg form-control-solid' name='provinsimodalfk' id='provinsimodalfk' value="<?= $alamat->provinsifk ?>">
                                    </div>
                                    </div>                                 
                                </div>
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 3-->
                            <div data-kt-stepper-element="content">
                                <div class="w-100">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Jenis Pullet</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Jenis Pullet"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input class="form-control form-control-solid" value="<?= user()->pullet; ?>" name="pullet" id="pullet" />
                                    </div>
                                    <!--end::Input group-->   
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <label class="required fs-6 fw-bold mb-2">Frekuensi</label>
                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="frequensireplacement">                                        
                                            <option value="2 Kali" <?= (user()->frequensireplacement == "2 Kali"?"selected":"") ?>>2 Kali</option>
                                            <option value="2 - 3 Kali" <?= (user()->frequensireplacement == "2 - 3 Kali"?"selected":"") ?>>>2 - 3 Kali</option>
                                            <option value="3 - 5 Kali" <?= (user()->frequensireplacement == "3 - 5 Kali"?"selected":"") ?>>>3 - 5 Kali</option>
                                            <option value="> 5 Kali" <?= (user()->frequensireplacement == "> 5 Kali"?"selected":"") ?>>>> 5 Kali</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->                                
                                    <div class="fv-row">
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
                                                <input class="form-check-input" type="radio" <?= (user()->replacement == "doc" ?'checked="checked"':'') ?> name="replacement" value="doc" />
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
                                                <input class="form-check-input" type="radio" name="replacement" <?= (user()->replacement=="pullet"?'checked="checked"':'') ?> value="pullet" />
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
                                                <input class="form-check-input" type="radio" name="replacement" <?= (user()->replacement == "kedua"?'checked="checked"':'') ?> value="kedua" />
                                            </span>
                                            <!--end:Input-->
                                        </label>
                                        <!--end::Option-->                                        
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <!--end::Step 3-->
                            <!--begin::Step 4-->
                            <div data-kt-stepper-element="content">
                                <div class="w-100">                                    
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Label-->
                                        <div class="me-5">
                                            <label class="fs-6 fw-bold form-label">Persetujuan</label>
                                            <div class="fs-7 fw-bold text-muted">Seluruh Calon Anggota dan Anggota Koperasi diwajibkan melakukan pembayaran :
                                            <ol>
                                                <li>Simpanan Pokok sebesar Rp. 2.500.000,-</li>
                                                <li>Simpanan Wajib sebesar Rp. 50.000,-/Bulan</li>
                                            </ol>
                                            <p>
                                            Pembayaran melalui No. Rekening Koperasi :
                                            <b> BCA 015748 0088</b>
                                            <br>
                                            <b> Apakah Anda Bersedia Membayar Biaya Tersebut ? </b>
                                        
                                        </div>
                                        </div>
                                        <!--end::Label-->
                                        
                                    </div>
                                    <div class="d-flex flex-stack">
                                        <!--begin::Switch-->
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" id="bersedia" type="checkbox" value="<?= user()->isbayar; ?>" <?= (user()->isbayar?'checked="checked"':'') ?>/>
                                                <span class="form-check-label fw-bold text-muted">Bersedia</span>
                                            </label>
                                            <!--end::Switch-->
                                        <!--end::Input group-->
                                    </div>
                                    <div id="snap-container"></div>
                                </div>
                            </div>
                            <!--end::Step 4-->
                            <!--begin::Step 5-->
                            <div data-kt-stepper-element="content">
                                <div class="w-100 text-center">
                                    <!--begin::Heading-->
                                    <h1 class="fw-bolder text-dark mb-3">Berhasil!</h1>
                                    <!--end::Heading-->
                                    <!--begin::Description-->
                                    <div class="text-muted fw-bold fs-3">Anda berhasil melengkapi data diri Peternak.</div>
                                    <!--end::Description-->
                                    <!--begin::Illustration-->
                                    <div class="text-center px-4 py-15">
                                        <img src="<?= base_url() ?>assets/media/illustrations/sigma-1/9.png" alt="" class="w-100 mh-300px" />
                                    </div>
                                    <!--end::Illustration-->
                                </div>
                            </div>
                            <!--end::Step 5-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                                <div class="me-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                    <span class="svg-icon svg-icon-3 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
                                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Back</button>
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                                <div>
                                    <button type="submit" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                        <span class="indicator-label">Submit
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                        <span class="svg-icon svg-icon-3 ms-2 me-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-3 ms-1 me-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></button>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Create App-->

<?= $this->section('script') ?>

<script>
    $(document).ready(function() {
        $('#kt_modal_create_app').on('shown.bs.modal', function () {
            $('#kelurahanmodalfk').select2({
                dropdownParent: $("#kt_modal_create_app .modal-content"),
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
                        kelurahanmodal: item.kelurahan,
                        kecamatanmodal: item.kecamatan,
                        kecamatanmodalfk: item.kecamatanfk,
                        kotakabupatenmodal: item.kotakabupaten,
                        kotakabupatenmodalfk: item.kotakabupatenfk,
                        provinsimodal: item.provinsi,
                        provinsimodalfk: item.provinsifk,
                        })
                    })
                    return {
                        results: arr

                    };
                    },
                    cache: true
                },
                placeholder: '<?= $alamat->kelurahan; ?>',
                minimumInputLength: 1
                })
        });
    //$('.select2').select2()

    

    $('#kelurahanmodalfk').on("select2:select", function(e) {
      console.log(e);
      $('#provinsimodalfk').val(e.params.data.provinsimodalfk);
      $('#provinsimodal').val(e.params.data.provinsimodal);
      $('#kotakabupatenmodalfk').val(e.params.data.kotakabupatenmodalfk);
      $('#kotakabupatenmodal').val(e.params.data.kotakabupatenmodal);
      $('#kecamatanmodalfk').val(e.params.data.kecamatanmodalfk);
      $('#kelurahanmodal').val(e.params.data.kelurahanmodal);
      $('#kecamatanmodal').val(e.params.data.kecamatanmodal);
    });

  })

    $('#kt_modal_create_app_form').on('submit', function(e) {
        e.preventDefault()
        var form_data = $(this).serializeArray();
        let id = $('#kt_modal_create_app_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>user/${id}/editmodal` :
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