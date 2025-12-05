<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">          
            <div class="row">
                <div class="col-md-12">
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="pages-account-settings-account.html"><i class="icon-base ri ri-group-line icon-sm me-1_5"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active waves-effect waves-light" href="javascript:void(0);"><i class="icon-base ri ri-notification-4-line icon-sm me-1_5"></i> Notifikasi</a>
                    </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card-header">
                        <h5 class="mb-1">Notifikasi</h5>
                        <p class="mb-1 card-subtitle mt-0">Setting Notifikasi</p>
                        </div>
                        <div class="card-body">
                        <form id="notifForm" class="mb-5" action="<?= route_to('profile.update') ?>" method="POST">
                        <div class="d-flex mb-4 align-items-center">
                            <div class="flex-shrink-0">
                            <img src="../assets/img/icons/brands/wa.png" alt="whatsapp" class="me-4" height="32">
                            </div>
                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                            <div class="mb-sm-0 mb-2">
                                <h6 class="mb-0">Whatsapp</h6>
                                <small>Aktifkan Notifikasi Whatsapp</small>
                            </div>
                            <div class="text-end">
                                <div class="form-check form-switch mb-0">
                                <input type="checkbox" class="form-check-input" name="whatsappaktif" <?= ($whatsappaktif == 'true') ? 'checked' : '' ?>>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                            <input type="text" class="form-control me-4" placeholder="Masukkan apiKey" name="apikey" value="<?= $apikey ?? '' ?>" />
                            <label for="apikey" class="visually-hidden">Masukkan apiKey</label>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                            <input type="text" class="form-control me-4" placeholder="Masukkan numberKey" name="numberkey" value="<?= $numberkey ?? '' ?>" />
                            <label for="numberkey" class="visually-hidden">Masukkan numberKey</label>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                            <div class="flex-shrink-0">
                            <img src="../assets/img/icons/brands/telegram.png" alt="telegram" class="me-4" height="32">
                            </div>
                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                            <div class="mb-sm-0 mb-2">
                                <h6 class="mb-0">Telegram</h6>
                                <small>Aktifkan Notifikasi Telegram</small>
                            </div>
                            <div class="text-end">
                                <div class="form-check form-switch mb-0">
                                <input type="checkbox" class="form-check-input" name="telegramaktif" <?= ($telegramaktif == 'true') ? 'checked' : '' ?>>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                            <input type="text" class="form-control me-4" placeholder="Masukkan Telegram id" name="telegramid" value="<?= $telegramid ?? '' ?>" />
                            <label for="telegramid" class="visually-hidden">Masukkan Telegram id</label>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                            <input type="text" class="form-control me-4" placeholder="Masukkan Screet Token" name="screettoken" value="<?= $screettoken ?? '' ?>" />
                            <label for="screettoken" class="visually-hidden">Masukkan Screet Token</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                            <img src="../assets/img/icons/brands/email.png" alt="email" class="me-4" height="32">
                            </div>
                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                            <div class="mb-sm-0 mb-2">
                                <h6 class="mb-0">Email <?= $emailaktif ?></h6>
                                <small>Aktifkan Notifikasi EMail</small>
                            </div>
                            <div class="text-end">
                                <div class="form-check form-switch mb-0">
                                <input type="checkbox" class="form-check-input" name="emailaktif" <?= ($emailaktif == 'true') ? 'checked' : '' ?>>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Simpan Perubahan</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card-header">
                        <h5 class="mb-1">Social Accounts</h5>
                        <p class="mb-1 card-subtitle mt-0">Display content from social accounts on your site</p>
                        </div>
                        <div class="card-body">
                        <!-- Social Accounts -->
                        <div class="d-flex mb-4 align-items-center">
                            <div class="flex-shrink-0">
                            <img src="../../assets/img/icons/brands/facebook.png" alt="facebook" class="me-4" height="32">
                            </div>
                            <div class="flex-grow-1 row  align-items-center">
                            <div class="col-7">
                                <h6 class="mb-0">Facebook</h6>
                                <small>Not Connected</small>
                            </div>
                            <div class="col-5 text-end">
                                <button class="btn btn-outline-secondary btn-icon waves-effect"><i class="icon-base ri ri-link icon-22px"></i></button>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                            <div class="flex-shrink-0">
                            <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/icons/brands/twitter-light.png" alt="twitter" class="me-4" height="32" data-app-dark-img="icons/brands/twitter-dark.png" data-app-light-img="icons/brands/twitter-light.png" style="visibility: visible;">
                            </div>
                            <div class="flex-grow-1 row  align-items-center">
                            <div class="col-7">
                                <h6 class="mb-0">Twitter</h6>
                                <a href="https://x.com/Theme_Selection" target="_blank" class="small">@ThemeSelection</a>
                            </div>
                            <div class="col-5 text-end">
                                <button class="btn btn-outline-danger btn-icon waves-effect"><i class="icon-base ri ri-delete-bin-line icon-22px"></i></button>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                            <div class="flex-shrink-0">
                            <img src="../../assets/img/icons/brands/instagram.png" alt="instagram" class="me-4" height="32">
                            </div>
                            <div class="flex-grow-1 row  align-items-center">
                            <div class="col-7">
                                <h6 class="mb-0">instagram</h6>
                                <a href="https://www.instagram.com/themeselection/" target="_blank" class="small">@ThemeSelection</a>
                            </div>
                            <div class="col-5 text-end">
                                <button class="btn btn-outline-danger btn-icon waves-effect"><i class="icon-base ri ri-delete-bin-line icon-22px"></i></button>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                            <div class="flex-shrink-0">
                            <img src="../../assets/img/icons/brands/dribbble.png" alt="dribbble" class="me-4" height="32">
                            </div>
                            <div class="flex-grow-1 row  align-items-center">
                            <div class="col-7">
                                <h6 class="mb-0">Dribbble</h6>
                                <small>Not Connected</small>
                            </div>
                            <div class="col-5 text-end">
                                <button class="btn btn-outline-secondary btn-icon waves-effect"><i class="icon-base ri ri-link icon-22px"></i></button>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                            <img src="../../assets/img/icons/brands/behance.png" alt="behance" class="me-4" height="32">
                            </div>
                            <div class="flex-grow-1 row  align-items-center">
                            <div class="col-7">
                                <h6 class="mb-0">Behance</h6>
                                <small>Not Connected</small>
                            </div>
                            <div class="col-5 text-end">
                                <button class="btn btn-outline-secondary btn-icon waves-effect"><i class="icon-base ri ri-link icon-22px"></i></button>
                            </div>
                            </div>
                        </div>
                        <!-- /Social Accounts -->
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

                    </div>
                    <!-- / Content -->

                    
                    

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                
            </div>
            </footer>
            <!-- / Footer -->

                    
                </div>
<!--end::Navbar-->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>

<script>

    document.getElementById("notifForm").addEventListener("submit", function(e) {
        e.preventDefault(); // hentikan submit dulu

        Swal.fire({
            title: 'Simpan Perubahan?',
            text: "Pastikan pengaturan notifikasi sudah benar.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#d33',  
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Lanjut submit form
                e.target.submit();
            }
        });

    });


    $('#chage_password_form').on('submit', function(e) {
        e.preventDefault()
        var passwordField = $("#password").val();
        if (!passwordField) {
            toastr.error("Password tidak boleh kosong");
            return;
        }
        var repasswordField = $("#repassword").val();
        if (!repasswordField) {
            toastr.error("Re Password tidak boleh kosong");
            return
        }
        var form_data = $(this).serializeArray();
        let id = $('#chage_password_form #id').val();
        let route = (id != '') ?
            `<?= base_url() ?>user/${id}/update-password` :
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
                    toastr.success(response.messages);
                    $("#password").val("");
                    $("#repassword").val("");            
                } else {
                    toastr.error(response.messages);
                }
            },
            error: function(err) {
                Swal.close()
                toastr.error(err);
            }
        });    
    });

</script>

<?= $this->endSection(); ?>

