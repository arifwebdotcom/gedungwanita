<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\AgamaController;
use App\Controllers\AnnouncementController;
use App\Controllers\AsosiasiController;
use App\Controllers\DocController;
use App\Controllers\JenisPakanController;
use App\Controllers\UserController;
use App\Controllers\SuplierPakanController;
use App\Controllers\ProfileController;
use App\Controllers\DashboardController;
use App\Controllers\AuthController;
use App\Config\Auth as AuthConfig;

/**
 * @var RouteCollection $routes
 */

/** @var RouteCollection $routes */

// Myth:Auth routes file.
$routes->group('', ['namespace' => 'Myth\Auth\Controllers'], static function ($routes) {
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
});

$routes->group('agama', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [AgamaController::class, 'index'], ['as' => 'agama.index']);
    $routes->post('store', [AgamaController::class, 'store'], ['as' => 'agama.store']);
    $routes->get('datatable', [AgamaController::class, 'datatable'], ['as' => 'agama.datatable']);
    $routes->post('(:num)/edit', [AgamaController::class, 'update'], ['as' => 'agama.update']);
    $routes->post('delete/(:num)', [AgamaController::class, 'delete'], ['as' => 'agama.delete']);
});

$routes->group('announcement', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [AnnouncementController::class, 'index'], ['as' => 'announcement.index']);
    $routes->post('store', [AnnouncementController::class, 'store'], ['as' => 'announcement.store']);
    $routes->get('datatable', [AnnouncementController::class, 'datatable'], ['as' => 'announcement.datatable']);
    $routes->post('(:num)/edit', [AnnouncementController::class, 'update'], ['as' => 'announcement.update']);
    $routes->post('delete/(:num)', [AnnouncementController::class, 'delete'], ['as' => 'announcement.delete']);
});

$routes->group('asosiasi', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [AsosiasiController::class, 'index'], ['as' => 'asosiasi.index']);
    $routes->post('store', [AsosiasiController::class, 'store'], ['as' => 'asosiasi.store']);
    $routes->get('datatable', [AsosiasiController::class, 'datatable'], ['as' => 'asosiasi.datatable']);
    $routes->post('(:num)/edit', [AsosiasiController::class, 'update'], ['as' => 'asosiasi.update']);
    $routes->post('delete/(:num)', [AsosiasiController::class, 'delete'], ['as' => 'asosiasi.delete']);
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

$routes->group('user', ['filter' => 'login'],function ($routes) {
    $routes->get('/', [UserController::class, 'index'], ['as' => 'user.index']);
    //$routes->get('user-edit/(:num)', 'UserController::userEdit/$1', ['as' => 'user.user_edit']);
    $routes->get('user-edit/(:num)', [UserController::class, 'UserEdit'], ['as' => 'user.user_edit']);
    $routes->get('user-baru', [UserController::class, 'UserBaru'], ['as' => 'user.user_baru']);
    $routes->post('store', [UserController::class, 'store'], ['as' => 'user.store']);
    $routes->get('datatable', [UserController::class, 'datatable'], ['as' => 'user.datatable']);
    $routes->post('(:num)/edit', [UserController::class, 'update'], ['as' => 'user.update']);
    $routes->post('delete/(:num)', [UserController::class, 'delete'], ['as' => 'user.delete']);
});

$routes->group('dashboard', ['filter' => 'login'], function ($routes) {
    $routes->get('/', [DashboardController::class, 'index'], ['as' => 'dashboard.index']);    
    $routes->post('payment', [DashboardController::class, 'payment'], ['as' => 'dashboard.payment']); 
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}