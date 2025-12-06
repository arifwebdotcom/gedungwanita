<!doctype html>

<html
  lang="en"
  class="layout-menu-fixed layout-compact"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />

    <title>Sasana Krida Kusuma</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/iconify-icons.css') ?>" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css -->

    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/node-waves/node-waves.css') ?>" />

    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/core.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/custom.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />

    <link rel="stylesheet" href="<?= base_url('assets/css/app-calendar.css') ?>" />
    <style>
      .is-invalid { border-color: #dc3545 !important; }
      .is-valid { border-color: #198754 !important; }
    </style>

    <!-- Color Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr"></script>

   
	<!-- <link rel="stylesheet" href="../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css"> -->
	<!-- DataTables CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
 <!-- TinyMCE JS -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>



    <!-- Vendors CSS -->

    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />

    <!-- endbuild -->

    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/apex-charts/apex-charts.css') ?>" />
    <!-- Choice  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url('assets/vendor/js/helpers.js') ?>"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config: Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file. -->

    <script src="<?= base_url('assets/js/config.js') ?>"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" style="width:100%">
            <a href="<?= route_to('jadwal.index') ?>" class="app-brand-link">
              <img src="/assets/img/logo.png" class="img" style="width: 100%;height: auto;max-height: 35px;object-fit: scale-down">
              Sasana Krida Kusuma
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="menu-toggle-icon d-xl-inline-block align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item <?= url_is('jadwal*') ? 'active' : '' ?>">
              <a href="<?= route_to('jadwal.index') ?>" class="menu-link ">
                <i class="menu-icon icon-base ri ri-home-smile-line"></i>
                <div data-i18n="Dashboards">Dashboards</div>
              </a>              
            </li>
            <!-- Apps & Pages -->
            <li class="menu-header mt-7">
              <span class="menu-header-text">Master Data</span>
            </li>
            <li class="menu-item <?= url_is('client*') ? 'active' : '' ?>">
              <a href="<?= route_to('client.index') ?>" class="menu-link">
                <i class="menu-icon icon-base ri ri-grid-line"></i>
                <div data-i18n="Email">Client</div>
                <!-- <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">Pro</div> -->
              </a>
            </li>                  
            <li class="menu-item <?= url_is('paket*') ? 'active' : '' ?>">
              <a href="<?= route_to('paket.index') ?>" class="menu-link">
                <i class="menu-icon icon-base ri ri-grid-line"></i>
                <div data-i18n="Email">Paket</div>
                <!-- <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">Pro</div> -->
              </a>
            </li> 
            <li class="menu-item <?= url_is('faq*') ? 'active' : '' ?>">
              <a href="<?= route_to('faq.index') ?>" class="menu-link">
                <i class="menu-icon icon-base ri ri-grid-line"></i>
                <div data-i18n="Email">Faq</div>
                <!-- <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">Pro</div> -->
              </a>
            </li>  
            <li class="menu-item <?= url_is('user*') ? 'active' : '' ?>">
              <a href="<?= route_to('user.index') ?>" class="menu-link">
                <i class="menu-icon icon-base ri ri-grid-line"></i>
                <div data-i18n="User">User</div>
                <!-- <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">Pro</div> -->
              </a>
            </li>  
            <li class="menu-header mt-7">
              <span class="menu-header-text">Menu</span>
            </li> 
            <li class="menu-item <?= url_is('dashboard*') ? 'active' : '' ?>">
              <a href="<?= route_to('dashboard.index') ?>" class="menu-link ">
                <i class="menu-icon icon-base ri ri-home-smile-line"></i>
                <div data-i18n="Dashboards">Dashboards</div>
              </a>              
            </li>
             <li class="menu-header mt-7">
              <span class="menu-header-text">Laporan</span>
            </li>
            <li class="menu-item">
              <a href="<?= route_to('laporan.index') ?>" class="menu-link">
                <i class="menu-icon icon-base ri ri-grid-line"></i>
                <div data-i18n="Email">Laporan</div>
                <!-- <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">Pro</div> -->
              </a>
            </li>
            <li class="menu-item">
              <a href="<?= route_to('laporan.kelas') ?>" class="menu-link">
                <i class="menu-icon icon-base ri ri-grid-line"></i>
                <div data-i18n="Email">Laporan Kelas</div>
                <!-- <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">Pro</div> -->
              </a>
            </li>    
            <li class="menu-item">
              <a href="<?= route_to('laporan.pembayaran') ?>" class="menu-link">
                <i class="menu-icon icon-base ri ri-grid-line"></i>
                <div data-i18n="Email">Laporan Pembayaran</div>
                <!-- <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">Pro</div> -->
              </a>
            </li> 
            <li class="menu-item">
              <a href="<?= route_to('laporan.vendor') ?>" class="menu-link">
                <i class="menu-icon icon-base ri ri-grid-line"></i>
                <div data-i18n="Email">Laporan Vendor</div>
                <!-- <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">Pro</div> -->
              </a>
            </li> 
            <li class="menu-item">
              <a href="<?= route_to('laporan.biayaadmin') ?>" class="menu-link">
                <i class="menu-icon icon-base ri ri-grid-line"></i>
                <div data-i18n="Email">Laporan Admin</div>
                <!-- <div class="badge rounded-pill bg-label-primary fs-tiny ms-auto">Pro</div> -->
              </a>
            </li>            
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- navbar -->
          <?= $this->include('layouts/navbar'); ?>
		
		  	<div class="content-wrapper">
            	<div class="container-xxl flex-grow-1 container-p-y">
					<!--begin::Row-->
					<?= $this->renderSection('content'); ?>						
				</div>
          	</div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
	<div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 2000;"></div>
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>

    <script src="<?= base_url('assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/node-waves/node-waves.js') ?>"></script>

    <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>

    <script src="<?= base_url('assets/vendor/js/menu.js') ?>"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url('assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>

    <!-- Main JS -->

    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>
    <script src="<?= base_url('assets/js/ui-modals.js') ?>"></script>
    <script src="<?= base_url('assets/js/ui-toasts.js') ?>"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets/js/dashboards-analytics.js') ?>"></script>

	<!-- DataTables JS -->
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Select2 JS -->
  <!-- Select2 Core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Theme Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet">

  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- Choice -->
  <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>



    <!-- Place this tag before closing body tag for github widget button. -->
    <script async="async" defer="defer" src="https://buttons.github.io/buttons.js"></script>

	<?= $this->renderSection('script'); ?>
  </body>
</html>
