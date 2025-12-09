<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
    <i class="icon-base ri ri-menu-line icon-md"></i>
    </a>
</div>

<div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
    <ul class="navbar-nav flex-row align-items-center ms-md-auto">
    <!-- User -->

    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
        <a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill waves-effect" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
            <span class="position-relative">
            <i class="icon-base ri ri-notification-2-line icon-22px"></i>
            <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
            </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end p-0 " data-bs-popper="static">
            <li class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
                <h6 class="mb-0 me-auto">Notification</h6>
                <div class="d-flex align-items-center h6 mb-0">
                <span class="badge bg-label-primary rounded-pill me-2">1 New</span>                
                </div>
            </div>
            </li>
            <li class="dropdown-notifications-list scrollable-container ps ps--active-y">
            <ul class="list-group list-group-flush">
                <li class="list-group-item list-group-item-action dropdown-notifications-item waves-effect">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                    <div class="avatar">
                        <img src="../../assets/img/avatars/1.png" alt="alt" class="rounded-circle">
                    </div>
                    </div>
                    <div class="flex-grow-1">
                    <h6 class="small mb-50">Warning 🚀</h6>
                    <small class="mb-1 d-block text-body">Paket Nafira akan habis</small>
                    <small class="text-body-secondary">1 minggu lagi</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                    <a href="javascript:void(0)" class="dropdown-notifications-read"> <span class="badge badge-dot"></span></a>
                    <a href="javascript:void(0)" class="dropdown-notifications-archive"> <span class="icon-base ri ri-close-line"></span></a>
                    </div>
                </div>
                </li>                
            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px; height: 412px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 175px;"></div></div></li>
            <li class="border-top">
            <div class="d-grid p-4">
                <a class="btn btn-primary btn-sm d-flex h-px-34 waves-effect waves-light" href="javascript:void(0);">
                <small class="align-middle">View all notifications</small>
                </a>
            </div>
            </li>
        </ul>
        </li>
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a
        class="nav-link dropdown-toggle hide-arrow p-0"
        href="javascript:void(0);"
        data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
            <img src="../assets/img/avatars/1.png" alt="alt" class="rounded-circle" />
        </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item" href="#">
            <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt="alt" class="w-px-40 h-auto rounded-circle" />
                </div>
                </div>
                <div class="flex-grow-1">
                <h6 class="mb-0"><?= user()->username; ?></h6>
                <small class="text-body-secondary"><?= user()->role; ?></small>
                </div>
            </div>
            </a>
        </li>
        <li>
            <div class="dropdown-divider my-1"></div>
        </li>
        <li>
            <a class="dropdown-item" href="<?= route_to('profile.index') ?>">
            <i class="icon-base ri ri-user-line icon-md me-3"></i>
            <span>My Profile</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="#">
            <i class="icon-base ri ri-settings-4-line icon-md me-3"></i>
            <span>Settings</span>
            </a>
        </li>                   
        <li>
            <div class="dropdown-divider my-1"></div>
        </li>
        <li>
            <div class="d-grid px-4 pt-2 pb-1">
            <a class="btn btn-danger d-flex" href="<?= url_to('logout') ?>">
                <small class="align-middle">Logout</small>
                <i class="ri ri-logout-box-r-line ms-2 ri-xs"></i>
            </a>
            </div>
        </li>
        </ul>
    </li>
    <!--/ User -->
    </ul>
</div>
</nav>

<!-- / Navbar -->