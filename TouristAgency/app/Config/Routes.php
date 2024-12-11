<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/registration', 'Registration::index');
$routes->get('/userManagement', 'UserManagement::userManagement');
$routes->get('/tours', 'Tours::index');
$routes->get('/comments', 'CommentAdd::index');

$routes->get('/hotelManagement/country', 'HotelManagement::country');
$routes->get('/hotelManagement/city', 'HotelManagement::city');
$routes->get('/hotelManagement/hotel', 'HotelManagement::hotel');
$routes->get('/hotelManagement/photo', 'HotelManagement::photo');

$routes->get('/hotels', 'Hotels::index');

$routes->post('/registration/AddUser', 'Registration::AddUser');
$routes->post('loggin', 'Loggin::loggin');
$routes->post('/userManagement/SetAdmin', 'UserManagement::SetAdmin');
$routes->post('/hotelManagement/AddCountry', 'HotelManagement::AddCountry');
$routes->post('/hotelManagement/UpdateCountry', 'HotelManagement::UpdateCountry');

$routes->post('/hotelManagement/AddCity', 'HotelManagement::AddCity');
$routes->post('/hotelManagement/UpdateCity', 'HotelManagement::UpdateCity');

$routes->post('/hotelManagement/AddHotel', 'HotelManagement::AddHotel');
$routes->post('/hotelManagement/UpdateHotel', 'HotelManagement::UpdateHotel');

$routes->post('/hotelManagement/AddPhoto', 'HotelManagement::AddPhoto');

$routes->post('tours', 'Tours::SelectCity');
$routes->post('/comments', 'CommentAdd::AddComment');


