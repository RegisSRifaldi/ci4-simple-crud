<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->get('/contact', 'Pages::contact');
$routes->get('/cars', 'Cars::index');
$routes->get('/car/create', 'Cars::create');
$routes->post('/car/create', 'Cars::create');
$routes->post('/car/save', 'Cars::save');
$routes->get('/car/(:any)', 'Cars::detail/$1');
$routes->delete('/car/(:num)', 'Cars::delete/$1');
$routes->get('/cars/(:segment)', 'Cars::edit/$1');
$routes->post('/carr/(:num)', 'Cars::update/$1');
