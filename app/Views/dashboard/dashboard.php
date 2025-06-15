<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
  
<!--begin::Row-->
<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-6">
        <!--begin::List Widget 6-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title fw-bolder text-dark">Pengumuman</h3>
                <div class="card-toolbar">                    
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-0">
                <!--begin::Item-->
                <img alt="Logo" src="<?= base_url() ?>uploads/leafletharga/<?= $leafletharga->value ?>" style="width:100%;margin-bottom:20px"/>
                <?php foreach($notification as $row_notif){ ?>
                <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-warning me-5">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6"><?= $row_notif->title; ?></a>
                        <span class="text-muted fw-bold d-block"><?= date("d-m-Y",strtotime($row_notif->created_at)); ?></span>
                        <span class="text-muted fw-bold d-block"><?= $row_notif->description; ?></span>
                    </div>
                    <!--end::Title-->
                    <!--begin::Lable-->
                    <span class="fw-bolder text-warning py-1">
                        <a href="<?= base_url() ?>assets/pengumuman/<?= $row_notif->file; ?>" target='_blank' class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <i class="fas fa-download"></i>
                            <!--end::Svg Icon-->
                        </a>
                    </span>
                    <!--end::Lable-->
                </div>
                <?php } ?>
                <!--end::Item-->
               
            </div>
            <!--end::Body-->
        </div>
        <!--end::List Widget 6-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xl-6">
        <div class="row gx-5 gx-xl-8 mb-8">
            <!--begin::Col-->
            <div class="col-xxl-6">
                <!--begin::Tiles Widget 5-->
                <a href="<?= route_to('invoice.index') ?>" class="card bg-primary card-xxl-stretch">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-white svg-icon-2hx ms-n1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="black"/>
                                <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="black"/>
                                <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <div class="text-inverse-primary fw-bolder fs-1 mb-2 mt-5"><?= rupiah($setoran->total) ?></div>
                        <div class="fw-bold text-inverse-primary fs-6">Setoran</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Tiles Widget 5-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xxl-6">
                <!--begin::Tiles Widget 5-->
                <a href="<?= route_to('invoice.index') ?>" class="card bg-bg-body card-xxl-stretch">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2hx svg-icon-danger d-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="black"></path>
                                <path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <div class="text-inverse-bg-body fw-bolder fs-1 mb-2 mt-5"><?= rupiah($tungakan->total) ?></div>
                        <div class="fw-bold text-inverse-bg-body fs-6">Tunggakan</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Tiles Widget 5-->
            </div>
            <!--end::Col-->
        </div>
        <!--begin::List Widget 4-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">Asosiasi</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Rekap Anggota Asosiasi</span>
                </h3>
                <div class="card-toolbar">
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-5">
                <!--begin::Item-->
                <?php foreach($asosiasi as $row_asos){ ?>
                    <div class="d-flex align-items-sm-center mb-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label">
                                <img alt="Logo" src="<?= base_url() ?>assets/media/logos/logo-demo2.png" class="logo-default h-25px" />
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder"><?= $row_asos->asosiasi; ?></a>
                                <span class="text-muted fw-bold d-block fs-7"><?= $row_asos->nohp; ?></span>
                            </div>
                            <span class="badge badge-light fw-bolder my-2"><?= $row_asos->jumlah; ?></span>
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Item-->   
                <?php }?>            
            </div>
            <!--end::Body-->
        </div>
        <!--end::List Widget 4-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
<!--begin::Tables Widget 9-->

    
<?php if(user()->isadmin == 1){ ?>
<div class="card card-xxl-stretch mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Anggota</span>
            <span class="text-muted mt-1 fw-bold fs-7"></span>
        </h3>
        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
            <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->New Member</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="user_table">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted">
                    <th class="w-25px rounded-start">
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">
                            </div>
                        </th>
                        <th class="ps-4 ">Nama Peternakan</th>
                        <th class="ps-4 ">No HP</th>
                        <th class="ps-4 ">Alamat</th>
                        <th class="ps-4 ">Populasi</th>
                        <th class="ps-4 ">Jenis Pakan</th>
                        <th class="ps-4 ">Suplier</th>
                        <?php if(user()->isadmin){ ?>
                        <th class="min-w-200px rounded-end">Action</th>
                        <?php } ?>
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
<!--end::Tables Widget 9-->
<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xxl-6">
        <!--begin::Mixed Widget 2-->
         <!--begin::Mixed Widget 10-->
         <div class="card mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden">
                <!--begin::Hidden-->
                <div class="d-flex flex-stack flex-wrap flex-grow-1 px-9 pt-9 pb-3">
                    <div class="me-2">
                        <span class="fw-bolder text-gray-800 d-block fs-3">Permintaan & Distribusi Jagung</span>
                        <span class="text-gray-400 fw-bold">2024</span>
                    </div>
                    <div class="fw-bolder fs-3 text-primary">0 Ton</div>
                </div>
                <!--end::Hidden-->
                <!--begin::Chart-->
                <div class="mixed-widget-10-chart" data-kt-color="primary" style="height: 175px"></div>
                <!--end::Chart-->
            </div>
        </div>
        <!--end::Mixed Widget 10-->
        
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xxl-6">
        <div class="card  mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <!--begin::Stats-->
                <div class="flex-grow-1 card-p pb-0">
                    <div class="d-flex flex-stack flex-wrap">
                        <div class="me-2">
                            <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Asosiasi</a>
                            <div class="text-muted fs-7 fw-bold">Finance and accounting reports</div>
                        </div>
                        <div class="fw-bolder fs-3 text-primary">$24,500</div>
                    </div>
                <canvas id="myPieChart" width="350" height="350"></canvas>
                </div>
                <!--end::Stats-->                
                <!--end::Chart-->
            </div>
            <!--end::Body-->
        </div>
        <!--begin::Mixed Widget 7-->
        
           
    </div>
    
    </div>
    <!--end::Col-->
    
<?php } ?>

<!--end::Row-->
<!--begin::Tables Widget 5-->

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url() ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>

<script>
    $(document).ready(function() {
        //$("#user_table").DataTable();
        showUser();

            $.ajax({
                url: '<?= route_to('dashboard.datapie') ?>',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Create the pie chart using fetched data
                    const ctx = document.getElementById('myPieChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: response.labels,
                            datasets: [{
                                data: response.data,
                                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56','#eff2f5','#e8fff3','#f1416c','#fff5f8']
                            }]
                        },
                        options: {
                            responsive: true
                        }
                    });
                },
                error: function(err) {
                    console.error('Error fetching data:', err);
                }
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
                name: "Nama Peternakan",
                data: "namapeternakan"
            },
            {
                name: "No Hp",
                data: "nohp"
            },
            {
                name: "Alamat",
                data: "alamat"
            },
            {
                name: "Populasi",
                data: "populasi"
            },
            {
                name: "Jenis Pakan",
                data: "jenispakan"
            },
            {
                name: "Suplier",
                data: "namasuplier"
            }
            <?php if(user()->isadmin){ ?>
            ,{
                width: "10%",
                sortable: false,
                render: function(data, type, row, meta) {
                    return `<a href="<?= base_url() ?>user/user-edit/`+row.id+`" target='_blank' >
                            <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit" id="edit">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            </a>
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
                            <a href="https://maps.google.com/?q=`+row.lat+`,`+row.long+`" target='_blank' class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                            <span class="svg-icon svg-icon-4 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
                                    <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon--></a>`;
                }
            },
            <?php } ?>
            
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

</script>
<?= $this->endSection() ?>