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
            <span class="card-label fw-bolder fs-3 mb-1">Master User</span>
            <span class="text-muted mt-1 fw-bold fs-7">Data User</span>
        </h3>
        <div class="card-toolbar">
            <a href="!#" id='btn_create' class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#user_modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->User Baru</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle gs-0 gy-4" id="user_table">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="w-25px rounded-start">
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">
                            </div>
                        </th>
                        <th class="ps-4 ">Email</th> 
                        <th class="ps-4 ">Username</th> 
                        <th class="ps-4 ">Nama</th>
                        <th class="ps-4 ">Status</th>
                        <th class="ps-4 ">Role</th>
                        <th class="min-w-200px rounded-end">Action</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>            
                         
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
<div class="modal fade" id="user_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h5 class="modal-title" id="modal_title">Modal title</h5>
                <!--end::Modal title-->
                <!--begin::Close-->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="user_form" class="form" >
                    <!--begin::Input group-->
                    <div class="col-md-12 mb-2">
                        <div class="form-floating form-floating-outline">                
                            <input type="hidden" id="id" name="id" class="form-control">
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                            <label for="nama">Nama</label>
                        </div>
                    </div>       
                    <div class="col-md-12 mb-2">
                        <div class="form-floating form-floating-outline">                
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                            <label for="email">Email</label>
                        </div>
                    </div>       
                    <div class="col-md-12 mb-2">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                            <label for="username">Username</label>
                        </div>
                    </div> 
                    <div class="col-md-12 mb-2">
                        <div class="form-floating form-floating-outline">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                    </div>    
                    <div class="col-md-12 mb-2">
                        <div class="form-floating form-floating-outline">
                            <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Re Password">
                            <label for="repassword">Re Password</label>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-floating form-floating-outline">
                                <select id="status" name="status" class="form-select">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                        </div>   
                        <div class="col-md-6 mb-2">
                            <div class="form-floating form-floating-outline">
                                <select id="role" name="role" class="form-select">
                                    <option value="1">ADMIN</option>
                                    <option value="2">MARKETING</option>
                                    <option value="3">KEUANGAN</option>
                                </select>
                                <label for="role">Role</label>
                            </div>
                        </div>   
                    </div>        
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="btnSubmit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                    </div> 
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Card-->
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>

<script src="<?= base_url() ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script>
    $(document).ready(function() {
        //$("#user_table").DataTable();
        showUser();

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

    const showUser = () => {
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
                name: "Email",
                data: "email"
            },
            {
                name: "Username",
                data: "username"
            },            
            {
                name: "Nama",
                data: "nama"
            },
            {
                name: "Status",
                data: "",
                render: function(data, type, row, meta) {
                    if (row.status === '1') {
                        return `Aktif`;
                    } else {
                        return `Tidak Aktif`;
                    } 
                }
            },
            {
                name: "Role",
                data: "",
                render: function(data, type, row, meta) {
                    if (row.role === '1') {
                        return `ADMIN`;
                    } else if (row.role === '2') {
                        return `MARKETING`;
                    }else {
                        return `KEUANGAN`;  
                    }
                }
            },            
            {
                width: "10%",
                sortable: false,
                render: function(data, type, row, meta) {
                    return `
                            <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit"  id="edit" >
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete" id="delete">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            `;
                }
            },
            
        ];

        var table = $('#user_table').DataTable({
            searching: true,
            destroy: true,
            lengthChange: false,
            ajax: {
                url: "<?= route_to('user.datatable') ?>",
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
        $("#user_modal #modal_title").text("Tambah User");
        $("#user_modal").modal("show");
    });

    $('#user_table tbody').on('click', '#edit', function() {
        var data = $('#user_table').DataTable().row($(this).parents('tr')).data();
        $("#user_modal #nama").val(data.nama);
        $("#user_modal #email").val(data.email);
        $("#user_modal #username").val(data.username);
        $("#user_modal #status").val(data.status);
        $("#user_modal #role").val(data.role);
        $("#user_modal #id").val(data.id);

        $("#user_modal #modal_title").text("Edit User");
        $("#user_modal").modal("show");
    });

    $('#user_table tbody').on('click', '#delete', function() {
        var data = $('#user_table').DataTable().row($(this).parents('tr')).data();
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "data "+data.user+" akan dihapus dari sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Silahkan!",
            cancelButtonText: "Tidak, Jangan dihapus!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `<?= base_url() ?>user/delete/${data.id}`,
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
                            showUser();
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
                toastr.error("data "+data.user+" tidak jadi dihapus");                
            }
        });
        
        

    });


    $('#user_modal').on('hidden.bs.modal', function(e) {
        $(this).find("input,textarea").val('').end();
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