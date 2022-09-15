<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Admin');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('admin', ['filter' => 'role:admin,superadmin'], function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('profile', 'Admin::profile');
});

$routes->group('kamar', ['filter' => 'role:admin,superadmin'], function ($routes) {
    $routes->get('/', 'Kamar::index');
    $routes->get('index', 'Kamar::index');
    $routes->get('tambah', 'Kamar::tambah');
    $routes->get('edit', 'Kamar::edit');
    $routes->get('hapus', 'Kamar::hapus');
});

$routes->group('tipe', ['filter' => 'role:admin,superadmin'], function ($routes) {
    $routes->get('/', 'Tipe::index');
    $routes->get('index', 'Tipe::index');
    $routes->get('tambah', 'Tipe::tambah');
    $routes->get('edit', 'Tipe::edit');
    $routes->get('hapus', 'Tipe::hapus');
});

$routes->group('penghuni', ['filter' => 'role:admin,superadmin'], function ($routes) {
    $routes->get('/', 'Penghuni::index');
    $routes->get('index', 'Penghuni::index');
    $routes->get('tambah', 'Penghuni::tambah');
    $routes->get('edit', 'Penghuni::edit');
    $routes->get('hapus', 'Penghuni::hapus');
});

$routes->group('pembayaran', ['filter' => 'role:admin,superadmin'], function ($routes) {
    $routes->get('/', 'Pembayaran::index');
    $routes->get('index', 'Pembayaran::index');
    $routes->get('tambah', 'Pembayaran::tambah');
    $routes->get('edit', 'Pembayaran::edit');
    $routes->get('hapus', 'Pembayaran::hapus');
});

$routes->group('penyewaan', ['filter' => 'role:admin,superadmin'], function ($routes) {
    $routes->get('/', 'Penyewaan::index');
    $routes->get('index', 'Penyewaan::index');
    $routes->get('tambah', 'Penyewaan::tambah');
    $routes->get('edit', 'Penyewaan::edit');
    $routes->get('hapus', 'Penyewaan::hapus');
});

$routes->group('metode', ['filter' => 'role:admin,superadmin'], function ($routes) {
    $routes->get('/', 'Metode::index');
    $routes->get('index', 'Metode::index');
    $routes->get('tambah', 'Metode::tambah');
    $routes->get('edit', 'Metode::edit');
    $routes->get('hapus', 'Metode::hapus');
});




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
