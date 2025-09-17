<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\KategoriController;
use App\Controllers\AnnouncementController;
use App\Controllers\PengajuanController;
use App\Controllers\InvoiceController;
use App\Controllers\KelasController;
use App\Controllers\LaporanController;
use App\Controllers\PaketController;
use App\Controllers\MemberController;
use App\Controllers\UserController;
use App\Controllers\JadwalController;
use App\Controllers\ProfileController;
use App\Controllers\DashboardController;
use App\Controllers\AuthController;
use App\Controllers\PeriodeController;
use App\Controllers\NotificationController;
use App\Config\Auth as AuthConfig;

/**
 * @var RouteCollection $routes
 */

/** @var RouteCollection $routes */

// Myth:Auth routes file.
$routes->group('', [], static function ($routes) {
    // Load the reserved routes from Auth.php
    $config         = config(AuthConfig::class);
    $reservedRoutes = $config->reservedRoutes;

    // Login/out
    $routes->get($reservedRoutes['login'], 'AuthController::login', ['as' => $reservedRoutes['login']]);
    $routes->post($reservedRoutes['login'], 'AuthController::attemptLogin');
    $routes->get($reservedRoutes['logout'], 'AuthController::logout');

    // Registration
    $routes->get($reservedRoutes['register'], 'AuthController::register', ['as' => $reservedRoutes['register']]);
    $routes->post($reservedRoutes['register'], 'AuthController::attemptRegister');
    $routes->post('member/save-member', 'AuthController::create', ['as' => 'member.store']);

    // Activation
    $routes->get($reservedRoutes['activate-account'], 'AuthController::activateAccount', ['as' => $reservedRoutes['activate-account']]);
    $routes->get($reservedRoutes['resend-activate-account'], 'AuthController::resendActivateAccount', ['as' => $reservedRoutes['resend-activate-account']]);

    // Forgot/Resets
    $routes->get($reservedRoutes['forgot'], 'AuthController::forgotPassword', ['as' => $reservedRoutes['forgot']]);
    $routes->post($reservedRoutes['forgot'], 'AuthController::attemptForgot');
    $routes->get($reservedRoutes['reset-password'], 'AuthController::resetPassword', ['as' => $reservedRoutes['reset-password']]);
    $routes->post($reservedRoutes['reset-password'], 'AuthController::attemptReset');
});

$routes->get('/', 'Home::index', ['filter' => 'login','as' => 'home']);

$routes->group('profile', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [ProfileController::class, 'index'], ['as' => 'profile.index']);
    $routes->post('editharga', [ProfileController::class, 'update'], ['as' => 'profile.update']);
});

$routes->group('kategori', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [KategoriController::class, 'index'], ['as' => 'kategori.index']);
    $routes->post('store', [KategoriController::class, 'store'], ['as' => 'kategori.store']);
    $routes->get('datatable', [KategoriController::class, 'datatable'], ['as' => 'kategori.datatable']);
    $routes->post('(:num)/edit', [KategoriController::class, 'update'], ['as' => 'kategori.update']);
    $routes->post('delete/(:num)', [KategoriController::class, 'delete'], ['as' => 'kategori.delete']);    
});

$routes->group('laporan', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [LaporanController::class, 'index'], ['as' => 'laporan.index']);
    $routes->get('terbesar', [LaporanController::class, 'terbesar'], ['as' => 'laporan.terbesar']);    
    $routes->get('datatable', [LaporanController::class, 'datatable'], ['as' => 'laporan.datatable']);
    $routes->get('datatablemember', [LaporanController::class, 'datatablemember'], ['as' => 'laporan.datatablemember']);
    $routes->get('exportdata', [LaporanController::class, 'exportInvoice'], ['as' => 'laporan.exportdata']);
    $routes->get('detailmember/(:num)', [LaporanController::class, 'detailmember'], ['as' => 'laporan.detailmember']);
   // $routes->get('get-dataPengajuan', [PengajuanController::class, 'getPengajuan'], ['as' => 'pengajuan_get']);
});

$routes->group('periode', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [PeriodeController::class, 'index'], ['as' => 'periode.index']);
    $routes->post('store', [PeriodeController::class, 'store'], ['as' => 'periode.store']);
    $routes->get('datatable', [PeriodeController::class, 'datatable'], ['as' => 'periode.datatable']);
    $routes->post('(:num)/edit', [PeriodeController::class, 'update'], ['as' => 'periode.update']);
    $routes->post('delete/(:num)', [PeriodeController::class, 'delete'], ['as' => 'periode.delete']);
});

$routes->group('announcement', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [AnnouncementController::class, 'index'], ['as' => 'announcement.index']);
    $routes->post('store', [AnnouncementController::class, 'store'], ['as' => 'announcement.store']);
    $routes->get('datatable', [AnnouncementController::class, 'datatable'], ['as' => 'announcement.datatable']);
    $routes->post('(:num)/edit', [AnnouncementController::class, 'update'], ['as' => 'announcement.update']);
    $routes->post('delete/(:num)', [AnnouncementController::class, 'delete'], ['as' => 'announcement.delete']);
});

$routes->group('pengajuan', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [PengajuanController::class, 'index'], ['as' => 'pengajuan.index']);
    $routes->post('store', [PengajuanController::class, 'store'], ['as' => 'pengajuan.store']);
    $routes->get('datatable', [PengajuanController::class, 'datatable'], ['as' => 'pengajuan.datatable']);
    $routes->post('(:num)/edit', [PengajuanController::class, 'update'], ['as' => 'pengajuan.update']);
    $routes->post('(:num)/tolak', [PengajuanController::class, 'tolak'], ['as' => 'pengajuan.tolak']);
    $routes->post('delete/(:num)', [PengajuanController::class, 'delete'], ['as' => 'pengajuan.delete']);
    $routes->get('pengajuan-baru', [PengajuanController::class, 'PengajuanBaru'], ['as' => 'pengajuan.pengajuan_baru']);
    $routes->get('pengajuan-ubah/(:num)', [PengajuanController::class, 'PengajuanUbah'], ['as' => 'pengajuan.pengajuan_ubah']);
    $routes->get('get-dataPengajuan', [PengajuanController::class, 'getPengajuan'], ['as' => 'pengajuan_get']);
    $routes->get('exportdata', [PengajuanController::class, 'exportPengajuan'], ['as' => 'pengajuan.exportdata']);
});

$routes->group('invoice', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [InvoiceController::class, 'index'], ['as' => 'invoice.index']);
    $routes->post('store', [InvoiceController::class, 'store'], ['as' => 'invoice.store']);
    $routes->get('datatable', [InvoiceController::class, 'datatable'], ['as' => 'invoice.datatable']);
    $routes->post('(:num)/edit', [InvoiceController::class, 'update'], ['as' => 'invoice.update']);
    $routes->get('detail/(:num)', [InvoiceController::class, 'detail'], ['as' => 'invoice.detail']);
    $routes->post('delete/(:num)', [InvoiceController::class, 'delete'], ['as' => 'invoice.delete']);
    $routes->get('invoice-baru', [InvoiceController::class, 'InvoiceBaru'], ['as' => 'invoice.invoice_baru']);
    $routes->get('invoice-edit/(:num)', [InvoiceController::class, 'InvoiceEdit'], ['as' => 'invoice.invoice_edit']);
    $routes->get('get-dataInvoice', [InvoiceController::class, 'getInvoice'], ['as' => 'invoice_get']);
    $routes->post('checkstatus/(:num)', [InvoiceController::class, 'checkstatus'], ['as' => 'invoice.checkstatus']);
    $routes->get('upload', [InvoiceController::class, 'upload'], ['as' => 'invoice.upload']);
    $routes->post('import', [InvoiceController::class, 'import'], ['as' => 'invoice.import']);
    $routes->post('(:num)/lunaskan', [InvoiceController::class, 'lunaskan'], ['as' => 'invoice.lunaskan']);
});

$routes->group('kelas', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [KelasController::class, 'index'], ['as' => 'kelas.index']);
    $routes->post('store', [KelasController::class, 'store'], ['as' => 'kelas.store']);
    $routes->get('datatable', [KelasController::class, 'datatable'], ['as' => 'kelas.datatable']);
    $routes->post('(:num)/edit', [KelasController::class, 'update'], ['as' => 'kelas.update']);
    $routes->post('delete/(:num)', [KelasController::class, 'delete'], ['as' => 'kelas.delete']);
});

$routes->group('jadwal', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [JadwalController::class, 'index'], ['as' => 'jadwal.index']);
    $routes->post('store', [JadwalController::class, 'store'], ['as' => 'jadwal.store']);
    $routes->get('datatable', [JadwalController::class, 'datatable'], ['as' => 'jadwal.datatable']);
    $routes->post('(:num)/edit', [JadwalController::class, 'update'], ['as' => 'jadwal.update']);
    $routes->post('delete/(:num)', [JadwalController::class, 'delete'], ['as' => 'jadwal.delete']);
    $routes->post('getkategoribyusiakelas', [JadwalController::class, 'getKategoriByUsiaKelas'], ['as' => 'kategori.getkategori']);
    $routes->post('jadwalpendaftaran', [JadwalController::class, 'updatejadwalpendaftaran'], ['as' => 'kategori.updatejadwalpendaftaran']);
});

$routes->group('laporan', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [LaporanController::class, 'index'], ['as' => 'laporan.index']);
    $routes->post('store', [LaporanController::class, 'store'], ['as' => 'laporan.store']);
    $routes->get('datatable', [LaporanController::class, 'datatable'], ['as' => 'laporan.datatable']);
    $routes->post('(:num)/edit', [LaporanController::class, 'update'], ['as' => 'laporan.update']);
    $routes->post('delete/(:num)', [LaporanController::class, 'delete'], ['as' => 'laporan.delete']);
});

$routes->group('paket', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [PaketController::class, 'index'], ['as' => 'paket.index']);
    $routes->post('store', [PaketController::class, 'store'], ['as' => 'paket.store']);
    $routes->get('datatable', [PaketController::class, 'datatable'], ['as' => 'paket.datatable']);
    $routes->post('getpaketbyid/(:num)', [PaketController::class, 'getPaketById'], ['as' => 'paket.getpaketbyid']);
    $routes->post('(:num)/edit', [PaketController::class, 'update'], ['as' => 'paket.update']);
    $routes->post('delete/(:num)', [PaketController::class, 'delete'], ['as' => 'paket.delete']);
});

$routes->group('member', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [MemberController::class, 'index'], ['as' => 'member.index']);
    $routes->post('store', [MemberController::class, 'store'], ['as' => 'member.store']);
    $routes->get('datatable', [MemberController::class, 'datatable'], ['as' => 'member.datatable']);
    $routes->post('(:num)/edit', [MemberController::class, 'update'], ['as' => 'member.update']);
    $routes->post('delete/(:num)', [MemberController::class, 'delete'], ['as' => 'member.delete']);
});

$routes->group('user', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [UserController::class, 'index'], ['as' => 'user.index']);
    //$routes->get('user-edit/(:num)', 'UserController::userEdit/$1', ['as' => 'user.user_edit']);
    $routes->get('user-edit/(:num)', [UserController::class, 'UserEdit'], ['as' => 'user.user_edit']);
    $routes->get('membercard/(:num)', [UserController::class, 'Membercard'], ['as' => 'user.membercard']);
    $routes->get('user-baru', [UserController::class, 'UserBaru'], ['as' => 'user.user_baru']);
    $routes->post('(:num)/update-password', [UserController::class, 'updatepassword'], ['as' => 'user.updatepassword']);
    $routes->post('store', [UserController::class, 'store'], ['as' => 'user.store']);
    $routes->get('datatable', [UserController::class, 'datatable'], ['as' => 'user.datatable']);
    $routes->post('(:num)/edit', [UserController::class, 'update'], ['as' => 'user.update']);
    $routes->post('(:num)/editmodal', [UserController::class, 'updatemodal'], ['as' => 'user.updatemodal']);
    $routes->get('search2', [UserController::class, 'search2'], ['as' => 'user.search2']);
    $routes->post('delete/(:num)', [UserController::class, 'delete'], ['as' => 'user.delete']);
});

$routes->group('dashboard', ['filter' => 'login'], function ($routes) {
    $routes->get('/', [DashboardController::class, 'index'], ['as' => 'dashboard.index']);    
    $routes->post('payment', [DashboardController::class, 'payment'], ['as' => 'dashboard.payment']); 
    $routes->get('datapie', [DashboardController::class, 'datapie'], ['as' => 'dashboard.datapie']); 
    $routes->post('(:num)/edit', [DashboardController::class, 'update'], ['as' => 'dashboard.update']);
});

$routes->group('notification', function ($routes) {
    $routes->get('/', [NotificationController::class, 'index'], ['as' => 'notification.index']);    
    $routes->post('save', [NotificationController::class, 'saveTransaction'], ['as' => 'notification.saveTransaction']);   
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}