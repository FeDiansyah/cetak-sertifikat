<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'siswa::index');
$routes->get('/siswa/create', 'siswa::create');
$routes->post('/siswa/store', 'siswa::store');
$routes->get('/siswa/edit/(:num)', 'siswa::edit/$1');
$routes->post('/siswa/update/(:num)', 'siswa::update/$1');
$routes->get('/siswa/delete/(:num)', 'siswa::delete/$1');
$routes->get('/siswa/detail/(:num)', 'siswa::detail/$1');
$routes->match(['get', 'post'], 'siswa', 'siswa::index');

$routes->get('sertifikat/(:num)', 'Sertifikat::generate/$1');


// $routes->get('ruangguru', 'RuangGuru::index');
