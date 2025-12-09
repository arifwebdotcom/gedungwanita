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
                        <a class="nav-link active waves-effect waves-light" href="<?= route_to('profile.ubahpassword') ?>"><i class="icon-base ri ri-group-line icon-sm me-1_5"></i> Profile</a>
                    </li>
                    <?php if(user()->role == '1'){ ?>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="<?= route_to('profile.index') ?>"><i class="icon-base ri ri-notification-4-line icon-sm me-1_5"></i> Notifikasi</a>
                    </li>
                    <?php } ?>
                    </ul>
                </div>
                <div class="card">
                    <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card-header">
                        <h5 class="mb-1">Profil</h5>
                        <p class="mb-1 card-subtitle mt-0">Ubah Profil</p>
                        </div>
                        <div class="card-body">
                        <form id="notifForm" class="mb-5" action="<?= route_to('profile.updateprofil') ?>" method="POST">
                        
                        <div class="d-flex mb-4 align-items-center form-floating form-floating-outline">
                            <input type="email" class="form-control me-4" placeholder="Email" name="email" value="<?= $profile->email ?? '' ?>" />
                            <label for="email" >Email</label>
                        </div>
                        <div class="d-flex mb-4 align-items-center form-floating form-floating-outline">
                            <input type="text" class="form-control me-4" placeholder="Username" name="username" value="<?= $profile->username ?? '' ?>" />
                            <label for="username" >Username</label>
                        </div>      
                        <div class="d-flex mb-4 align-items-center form-floating form-floating-outline">
                            <input type="text" class="form-control me-4" placeholder="Password" name="password" id="password"  />
                            <label for="password" >Password</label>
                        </div>         
                        <div class="d-flex mb-4 align-items-center form-floating form-floating-outline">
                            <input type="text" class="form-control me-4" placeholder="Re Password" name="repassword" id="repassword"  />
                            <label for="repassword" >Re Password</label>
                        </div>                           
                        <div class="mt-6">
                            <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Simpan Perubahan</button>
                        </div>
                        </form>
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

    $(document).ready(function() {

        function validatePassword() {
            let pass  = $("#password").val();
            let repass = $("#repassword").val();

            if (pass !== "" && repass !== "" && pass === repass) {
                $("#btnSubmit").prop("disabled", false);
                $("#repassword").removeClass("is-invalid").addClass("is-valid");
            } else {
                $("#btnSubmit").prop("disabled", true);
                $("#repassword").removeClass("is-valid").addClass("is-invalid");
            }
        }

        $("#password, #repassword").on("keyup change", function () {
            validatePassword();
        });

    });

    document.getElementById("notifForm").addEventListener("submit", function(e) {
        e.preventDefault(); // hentikan submit dulu
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

        if ( passwordField != repasswordField) {
                toastr.error("Password & Re Password tidak sama");
                return
            }

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

