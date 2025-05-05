<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/blog', 'Blog::index');
$routes->post('/blog/save', 'Blog::save');
$routes->get('/blog/list', 'Blog::list');
$routes->get('/blog/api', 'Blog::api'); 
$routes->get('/signup', 'Auth::signup');
$routes->post('/register', 'Auth::register');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');
$routes->get('api/get-data', 'ApiController::getData');
$routes->post('/api/store-data', 'ApiController::storeData');

