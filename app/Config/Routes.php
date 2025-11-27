<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/akun1', 'Akun1::index');
$routes->get('/akun1/new', 'Akun1::new');
$routes->post('/akun1', 'Akun1::store', ['filter' => 'role:admin']);
$routes->get('akun1/edit/(:num)', 'Akun1::edit/$1', ['filter' => 'role:admin']);
$routes->put('/akun1/edit/(:any)', 'Akun1::update/$1', ['filter' => 'role:admin']);
$routes->delete('/akun1/(:any)', 'Akun1::destroy/$1', ['filter' => 'role:admin']);
$routes->post('/akun2/(:any)', 'Akun2::delete/$1', ['filter' => 'role:admin']);

$routes->resource('akun2');
$routes->resource('akun3');
$routes->resource('transaksi');
$routes->get('/Transaksi/akun3', 'Transaksi::akun3');
$routes->get('/Transaksi/status', 'Transaksi::status');
$routes->resource('penyesuaian');
$routes->get('/Penyesuaian/akun3', 'Penyesuaian::akun3');
$routes->get('/Penyesuaian/status', 'Penyesuaian::status');

$routes->get('/jurnalumum', 'JurnalUmum::index');
$routes->post('/jurnalumum', 'JurnalUmum::index');
$routes->post('/jurnalumum/cetakjupdf', 'JurnalUmum::cetakjupdf');

$routes->get('/posting', 'Posting::index');
$routes->post('/posting', 'Posting::index');
$routes->post('/posting/postingpdf', 'Posting::postingpdf');

$routes->get('/jurnalpenyesuaian', 'JurnalPenyesuaian::index');
$routes->post('/jurnalpenyesuaian', 'JurnalPenyesuaian::index');
$routes->post('/jurnalpenyesuaian/jurnalpenyesuaianpdf', 'JurnalPenyesuaian::jurnalpenyesuaianpdf');

$routes->get('/neracasaldo', 'NeracaSaldo::index');
$routes->post('/neracasaldo', 'NeracaSaldo::index');
$routes->post('/neracasaldo/neracasaldopdf', 'NeracaSaldo::neracasaldopdf');

$routes->get('/neracalajur', 'NeracaLajur::index');
$routes->post('/neracalajur', 'NeracaLajur::index');
$routes->post('/neracalajur/neracalajurpdf', 'NeracaLajur::neracalajurpdf');

$routes->get('/labarugi', 'Labarugi::index');
$routes->post('/labarugi', 'Labarugi::index');
$routes->post('/labarugi/labarugipdf', 'Labarugi::labarugipdf');

$routes->get('/pmodal', 'Pmodal::index');
$routes->post('/pmodal', 'Pmodal::index');
$routes->post('/pmodal/pmodalpdf', 'Pmodal::pmodal');

$routes->get('/neraca', 'Neraca::index');
$routes->post('/neraca', 'Neraca::index');
$routes->post('/neraca/neracapdf', 'Neraca::neracapdf');

$routes->get('/aruskas', 'Aruskas::index');
$routes->post('/aruskas', 'Aruskas::index');
$routes->post('/aruskas/aruskaspdf', 'Aruskas::aruskaspdf');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);