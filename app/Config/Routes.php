<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/customers', 'CustomerController::index');
$routes->get('/customers/create', 'CustomerController::create');
$routes->post('/customers/store', 'CustomerController::store');
$routes->get('customers/edit/(:num)', 'CustomerController::edit/$1');  // <-- Tambahkan ini
$routes->post('customers/update/(:num)', 'CustomerController::update/$1');  // <-- Tambahkan ini
$routes->get('customers/delete/(:num)', 'CustomerController::delete/$1');  // <-- Tambahkan ini
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/processLogin', 'AuthController::processLogin');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/profile', 'ProfileController::index', ['filter' => 'auth']);
$routes->post('/profile/update', 'ProfileController::update', ['filter' => 'auth']);
$routes->get('/haircuts', 'HaircutController::index');
$routes->get('/haircuts/create', 'HaircutController::create');
$routes->post('/haircuts/store', 'HaircutController::store');
$routes->get('haircuts', 'HaircutController::index');
$routes->get('haircuts/edit/(:num)', 'HaircutController::edit/$1');  // Tambahkan ini
$routes->post('haircuts/update/(:num)', 'HaircutController::update/$1'); // Tambahkan ini
$routes->get('haircuts/delete/(:num)', 'HaircutController::delete/$1'); // Tambahkan ini
