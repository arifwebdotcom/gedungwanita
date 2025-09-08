<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\AgamaController;
use App\Controllers\AnnouncementController;
use App\Controllers\PengajuanController;
use App\Controllers\InvoiceController;
use App\Controllers\KategoriController;
use App\Controllers\DocController;
use App\Controllers\JenisPakanController;
use App\Controllers\KategoriInvoiceController;
use App\Controllers\UserController;
use App\Controllers\SuplierPakanController;
use App\Controllers\ProfileController;
use App\Controllers\DashboardController;
use App\Controllers\AuthController;
use App\Controllers\PeriodeController;
use App\Controllers\NotificationController;
use App\Controllers\LaporanController;
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

$routes->group('agama', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [AgamaController::class, 'index'], ['as' => 'agama.index']);
    $routes->post('store', [AgamaController::class, 'store'], ['as' => 'agama.store']);
    $routes->get('datatable', [AgamaController::class, 'datatable'], ['as' => 'agama.datatable']);
    $routes->post('(:num)/edit', [AgamaController::class, 'update'], ['as' => 'agama.update']);
    $routes->post('delete/(:num)', [AgamaController::class, 'delete'], ['as' => 'agama.delete']);
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

$routes->group('kategori', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [KategoriController::class, 'index'], ['as' => 'kategori.index']);
    $routes->post('store', [KategoriController::class, 'store'], ['as' => 'kategori.store']);
    $routes->get('datatable', [KategoriController::class, 'datatable'], ['as' => 'kategori.datatable']);
    $routes->post('(:num)/edit', [KategoriController::class, 'update'], ['as' => 'kategori.update']);
    $routes->post('delete/(:num)', [KategoriController::class, 'delete'], ['as' => 'kategori.delete']);
});

$routes->group('suplierpakan', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [SuplierPakanController::class, 'index'], ['as' => 'suplierpakan.index']);
    $routes->post('store', [SuplierPakanController::class, 'store'], ['as' => 'suplierpakan.store']);
    $routes->get('datatable', [SuplierPakanController::class, 'datatable'], ['as' => 'suplierpakan.datatable']);
    $routes->post('(:num)/edit', [SuplierPakanController::class, 'update'], ['as' => 'suplierpakan.update']);
    $routes->post('delete/(:num)', [SuplierPakanController::class, 'delete'], ['as' => 'suplierpakan.delete']);
});

$routes->group('doc', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [DocController::class, 'index'], ['as' => 'doc.index']);
    $routes->post('store', [DocController::class, 'store'], ['as' => 'doc.store']);
    $routes->get('datatable', [DocController::class, 'datatable'], ['as' => 'doc.datatable']);
    $routes->get('tagify', [DocController::class, 'tagify'], ['as' => 'doc.tagify']);
    $routes->post('(:num)/edit', [DocController::class, 'update'], ['as' => 'doc.update']);
    $routes->post('delete/(:num)', [DocController::class, 'delete'], ['as' => 'doc.delete']);
});

$routes->group('jenispakan', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [JenisPakanController::class, 'index'], ['as' => 'jenispakan.index']);
    $routes->post('store', [JenisPakanController::class, 'store'], ['as' => 'jenispakan.store']);
    $routes->get('datatable', [JenisPakanController::class, 'datatable'], ['as' => 'jenispakan.datatable']);
    $routes->post('(:num)/edit', [JenisPakanController::class, 'update'], ['as' => 'jenispakan.update']);
    $routes->post('delete/(:num)', [JenisPakanController::class, 'delete'], ['as' => 'jenispakan.delete']);
});

$routes->group('kategoriinvoice', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [KategoriInvoiceController::class, 'index'], ['as' => 'kategoriinvoice.index']);
    $routes->post('store', [KategoriInvoiceController::class, 'store'], ['as' => 'kategoriinvoice.store']);
    $routes->get('datatable', [KategoriInvoiceController::class, 'datatable'], ['as' => 'kategoriinvoice.datatable']);
    $routes->post('(:num)/edit', [KategoriInvoiceController::class, 'update'], ['as' => 'kategoriinvoice.update']);
    $routes->post('delete/(:num)', [KategoriInvoiceController::class, 'delete'], ['as' => 'kategoriinvoice.delete']);
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