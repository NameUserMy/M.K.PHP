<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/registration', 'Registration::index');
$routes->post('/registration/AddUser', 'Registration::AddUser');
$routes->post('loggin', 'Loggin::loggin');

