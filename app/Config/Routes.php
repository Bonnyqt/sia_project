<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Blog::home');
$routes->get('/blog/about', 'Blog::about');
$routes->get('/blog/myposts', 'Blog::myposts');
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
$routes->post('/auth/markFirstLoginDone', 'Auth::markFirstLoginDone');
$routes->get('/blog/search', 'Blog::search');
$routes->post('/blog/update/(:num)', 'Blog::update/$1');
$routes->get('/blog/delete/(:num)', 'Blog::delete/$1');
$routes->get('/blog/getPost/(:num)', 'Blog::getPost/$1');
$routes->post('/blog/like/(:num)', 'Blog::like/$1');
$routes->post('/blog/comment/(:num)', 'Blog::comment/$1');