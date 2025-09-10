<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
 
    <div class="card">
    <h5 class="card-header">Contextual Classes</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
        <thead>
            <tr>
            <th>Project</th>
            <th>Client</th>
            <th>Users</th>
            <th>Status</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <tr class="table-default">
            <td>
                <i class="icon-base ri ri-palette-fill icon-22px text-warning me-3"></i>
                <span>UI/UX Project</span>
            </td>
            <td>Ronnie Shane</td>
            <td>
                <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                </li>
                </ul>
            </td>
            <td>
                <span class="badge rounded-pill bg-label-primary me-1">Active</span>
            </td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow shadow-none" data-bs-toggle="dropdown">
                    <i class="icon-base ri ri-more-2-line icon-18px"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i>
                    Edit</a>
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                    Delete</a>
                </div>
                </div>
            </td>
            </tr>
            <tr class="table-active">
            <td>
                <i class="icon-base ri ri-basketball-fill icon-22px text-info me-3"></i>
                <span>Sports Project</span>
            </td>
            <td>Barry Hunter</td>
            <td>
                <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                </li>
                </ul>
            </td>
            <td>
                <span class="badge rounded-pill bg-label-success me-1">Completed</span>
            </td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow shadow-none" data-bs-toggle="dropdown">
                    <i class="icon-base ri ri-more-2-line icon-18px"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i>
                    Edit</a>
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                    Delete</a>
                </div>
                </div>
            </td>
            </tr>
            <tr class="table-primary">
            <td>
                <i class="icon-base ri ri-suitcase-2-line icon-22px text-danger me-3"></i>
                <span>Tours Project</span>
            </td>
            <td>Albert Cook</td>
            <td>
                <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                </li>
                </ul>
            </td>
            <td>
                <span class="badge rounded-pill bg-label-primary me-1">Active</span>
            </td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow shadow-none" data-bs-toggle="dropdown">
                    <i class="icon-base ri ri-more-2-line icon-18px"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i>
                    Edit</a>
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                    Delete</a>
                </div>
                </div>
            </td>
            </tr>
            <tr class="table-secondary">
            <td>
                <i class="icon-base ri ri-leaf-fill icon-22px text-success me-3"></i>
                <span>Greenhouse Project</span>
            </td>
            <td>Trevor Baker</td>
            <td>
                <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                </li>
                </ul>
            </td>
            <td>
                <span class="badge rounded-pill bg-label-info me-1">Scheduled</span>
            </td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow shadow-none" data-bs-toggle="dropdown">
                    <i class="icon-base ri ri-more-2-line icon-18px"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i>
                    Edit</a>
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                    Delete</a>
                </div>
                </div>
            </td>
            </tr>
            <tr class="table-success">
            <td>
                <i class="icon-base ri ri-bank-fill icon-22px text-primary me-3"></i>
                <span>Bank Project</span>
            </td>
            <td>Jerry Milton</td>
            <td>
                <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                </li>
                </ul>
            </td>
            <td>
                <span class="badge rounded-pill bg-label-warning me-1">Pending</span>
            </td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow shadow-none" data-bs-toggle="dropdown">
                    <i class="icon-base ri ri-more-2-line icon-18px"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i>
                    Edit</a>
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                    Delete</a>
                </div>
                </div>
            </td>
            </tr>
            <tr class="table-danger">
            <td>
                <i class="icon-base ri ri-palette-fill icon-22px text-danger me-3"></i>
                <span>UI/UX Project</span>
            </td>
            <td>Sarah Banks</td>
            <td>
                <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                </li>
                </ul>
            </td>
            <td>
                <span class="badge rounded-pill bg-label-primary me-1">Active</span>
            </td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow shadow-none" data-bs-toggle="dropdown">
                    <i class="icon-base ri ri-more-2-line icon-18px"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i>
                    Edit</a>
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                    Delete</a>
                </div>
                </div>
            </td>
            </tr>
            <tr class="table-warning">
            <td>
                <i class="icon-base ri ri-shield-user-line icon-22px text-info me-3"></i>
                <span>Custom Security</span>
            </td>
            <td>Ted Richer</td>
            <td>
                <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                </li>
                </ul>
            </td>
            <td>
                <span class="badge rounded-pill bg-label-info me-1">Scheduled</span>
            </td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow shadow-none" data-bs-toggle="dropdown">
                    <i class="icon-base ri ri-more-2-line icon-18px"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i>
                    Edit</a>
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                    Delete</a>
                </div>
                </div>
            </td>
            </tr>
            <tr class="table-info">
            <td>
                <i class="icon-base ri ri-bootstrap-fill icon-22px text-primary me-3"></i>
                <span>Latest Bootstrap</span>
            </td>
            <td>Perry Parker</td>
            <td>
                <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                </li>
                </ul>
            </td>
            <td>
                <span class="badge rounded-pill bg-label-warning me-1">Pending</span>
            </td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow shadow-none" data-bs-toggle="dropdown">
                    <i class="icon-base ri ri-more-2-line icon-18px"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i>
                    Edit</a>
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                    Delete</a>
                </div>
                </div>
            </td>
            </tr>
            <tr class="table-light">
            <td>
                <i class="icon-base ri ri-angularjs-fill icon-22px text-danger me-3"></i>
                <span>Angular UI</span>
            </td>
            <td>Ana Bell</td>
            <td>
                <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                </li>
                </ul>
            </td>
            <td>
                <span class="badge rounded-pill bg-label-success me-1">Completed</span>
            </td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow shadow-none" data-bs-toggle="dropdown">
                    <i class="icon-base ri ri-more-2-line icon-18px"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i>
                    Edit</a>
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                    Delete</a>
                </div>
                </div>
            </td>
            </tr>
            <tr class="table-dark">
            <td class="rounded-start-bottom">
                <i class="icon-base ri ri-pulse-line icon-22px text-success me-3"></i>
                <span>Bootstrap UI</span>
            </td>
            <td>Jerry Milton</td>
            <td>
                <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                    <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                </li>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                    <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                </li>
                </ul>
            </td>
            <td>
                <span class="badge rounded-pill bg-label-success me-1">Completed</span>
            </td>
            <td class="rounded-end-bottom">
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow shadow-none" data-bs-toggle="dropdown">
                    <i class="icon-base ri ri-more-2-line icon-18px"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-pencil-line icon-18px me-1"></i>
                    Edit</a>
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                    Delete</a>
                </div>
                </div>
            </td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>

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