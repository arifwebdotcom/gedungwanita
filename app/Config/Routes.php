<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\ClientController;
use App\Controllers\FaqController;
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

$routes->get('/', 'IndexController::index', );
$routes->post('/booking/submit', 'IndexController::bookingStore', ['as' => 'booking.store'] );
$routes->get('/booking', 'IndexController::booking', );
$routes->post('/cekavailable', 'IndexController::cekavailable', );
$routes->get('/datacalendar', 'IndexController::datacalendar', );
$routes->get('/captcha', 'IndexController::captcha', );
$routes->post('/sendwa', 'IndexController::sendWa', );
$routes->post('/cekkode', 'IndexController::cekKode', );
$routes->get('/cekjadwal', 'IndexController::cekjadwal', );
$routes->post('/cari', 'IndexController::cari', );
$routes->get('/login', 'IndexController::index', ['filter' => 'login','as' => 'home']);

$routes->group('profile', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [ProfileController::class, 'index'], ['as' => 'profile.index']);
    $routes->post('/update', [ProfileController::class, 'update'], ['as' => 'profile.update']);    
});

$routes->group('client', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [ClientController::class, 'index'], ['as' => 'client.index']);
    $routes->post('store', [ClientController::class, 'store'], ['as' => 'client.store']);
    $routes->get('datatable', [ClientController::class, 'datatable'], ['as' => 'client.datatable']);
    $routes->get('show/(:num)', [ClientController::class, 'show'], ['as' => 'client.show']);
    $routes->post('(:num)/edit', [ClientController::class, 'update'], ['as' => 'faq.update']);
    $routes->post('addcicilan/(:num)', [ClientController::class, 'addCicilan'], ['as' => 'client.addCicilan']);
    $routes->post('delete/(:num)', [ClientController::class, 'delete'], ['as' => 'client.delete']);
});

$routes->group('faq', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [FaqController::class, 'index'], ['as' => 'faq.index']);
    $routes->post('store', [FaqController::class, 'store'], ['as' => 'faq.store']);
    $routes->get('datatable', [FaqController::class, 'datatable'], ['as' => 'faq.datatable']);
    $routes->post('(:num)/edit', [FaqController::class, 'update'], ['as' => 'faq.update']);
    $routes->post('delete/(:num)', [FaqController::class, 'delete'], ['as' => 'faq.delete']);
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
    $routes->get('datatablelist', [JadwalController::class, 'datatablelist'], ['as' => 'jadwal.datatablelist']);
    $routes->post('(:num)/edit', [JadwalController::class, 'update'], ['as' => 'jadwal.update']);
    $routes->post('delete/(:num)', [JadwalController::class, 'delete'], ['as' => 'jadwal.delete']);
    $routes->post('hapus', [JadwalController::class, 'hapus'], ['as' => 'jadwal.hapus']);
    $routes->post('getkategoribyusiakelas', [JadwalController::class, 'getKategoriByUsiaKelas'], ['as' => 'kategori.getkategori']);
    $routes->post('jadwalpendaftaran', [JadwalController::class, 'updatejadwalpendaftaran'], ['as' => 'kategori.updatejadwalpendaftaran']);
});

$routes->group('laporan', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [LaporanController::class, 'index'], ['as' => 'laporan.index']);
    $routes->get('pembayaran', [LaporanController::class, 'pembayaran'], ['as' => 'laporan.pembayaran']);
    $routes->get('vendor', [LaporanController::class, 'vendor'], ['as' => 'laporan.vendor']);
    $routes->get('biayaadmin', [LaporanController::class, 'biayaadmin'], ['as' => 'laporan.biayaadmin']);
    $routes->post('store', [LaporanController::class, 'store'], ['as' => 'laporan.store']);
    $routes->get('export', [LaporanController::class, 'export'], ['as' => 'laporan.export']);
    $routes->get('exportpembayaran', [LaporanController::class, 'exportpembayaran'], ['as' => 'laporan.exportpembayaran']);
    $routes->get('datatable', [LaporanController::class, 'datatable'], ['as' => 'laporan.datatable']);
    $routes->get('datatablekelas', [LaporanController::class, 'datatablekelas'], ['as' => 'laporan.datatablekelas']);
    $routes->get('datatablepembayaran', [LaporanController::class, 'datatablepembayaran'], ['as' => 'laporan.datatablepembayaran']);
    $routes->get('datatablevendor', [LaporanController::class, 'datatablevendor'], ['as' => 'laporan.datatablevendor']);
    $routes->get('datatablebiayaadmin', [LaporanController::class, 'datatablebiayaadmin'], ['as' => 'laporan.datatablebiayaadmin']);
    $routes->post('(:num)/edit', [LaporanController::class, 'update'], ['as' => 'laporan.update']);
    $routes->post('(:num)/editpembayaran', [LaporanController::class, 'updatepembayaran'], ['as' => 'laporan.updatepembayaran']);
    $routes->post('delete/(:num)', [LaporanController::class, 'delete'], ['as' => 'laporan.delete']);
    $routes->get('terbesar', [LaporanController::class, 'terbesar'], ['as' => 'laporan.terbesar']);    
    $routes->get('datatable', [LaporanController::class, 'datatable'], ['as' => 'laporan.datatable']);
    $routes->get('datatablemember', [LaporanController::class, 'datatablemember'], ['as' => 'laporan.datatablemember']);    
    $routes->get('detailmember/(:num)', [LaporanController::class, 'detailmember'], ['as' => 'laporan.detailmember']);
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
    $routes->post('storeupload', [MemberController::class, 'storeupload'], ['as' => 'member.storeupload']);
    $routes->get('datatable', [MemberController::class, 'datatable'], ['as' => 'member.datatable']);
    $routes->post('(:num)/edit', [MemberController::class, 'update'], ['as' => 'member.update']);
    $routes->post('(:num)/editupload', [MemberController::class, 'updateupload'], ['as' => 'member.updateupload']);
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
    $routes->get('datapie', [DashboardController::class, 'datapie'], ['as' => 'dashboard.datapie']); 
    $routes->get('grouped', [DashboardController::class, 'grouped'], ['as' => 'dashboard.grouped']); 
});

$routes->group('notification', function ($routes) {
    $routes->get('/', [NotificationController::class, 'index'], ['as' => 'notification.index']);    
    $routes->post('save', [NotificationController::class, 'saveTransaction'], ['as' => 'notification.saveTransaction']);   
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}