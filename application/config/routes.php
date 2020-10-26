<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'LandingPageController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;


// Berita Artikel
$route['berita/artikel'] = 'ArtikelController/index';
$route['berita/artikel/create'] = 'ArtikelController/create';
$route['berita/artikel/add'] = 'ArtikelController/add';
$route['berita/artikel/edit/(:any)'] = 'ArtikelController/edit/$1';
$route['berita/artikel/delete/(:any)'] = 'ArtikelController/delete/$1';
$route['berita/artikel/update'] = 'ArtikelController/update';

$route['test'] = 'ArtikelController/test';

//Login Admin dan Karyawan
$route['login'] = 'LoginController';
$route['daftar'] = 'SignUpController/daftar';
$route['daftar/simpan'] = 'SignUpController/simpan';
$route['login/auth'] = 'LoginController/login';
$route['logout'] = 'LoginController/logout';
$route['admin'] = 'DashboardController';
$route['profile'] = 'UserProfile';
$route['profile/edit'] = 'UserProfile/edit';
$route['profile/update'] = 'UserProfile/update';
$route['profile/password'] = 'UserProfile/password';
$route['profile/password/update'] = 'UserProfile/setPassword';


//CRUD karyawan
$route['user'] = 'UserController';
$route['user/create'] = 'UserController/create';
$route['user/store'] = 'UserController/store';
$route['user/delete'] = 'UserController/delete';
$route['user/(:any)'] = 'UserController/edit/$1';
$route['user/(:any)/update'] = 'UserController/update/$1';

//Berita VIdeo
$route['berita/video'] = 'videoController/index';
$route['berita/video/create'] = 'videoController/create';
$route['berita/video/edit/(:any)'] = 'videoController/edit/$1';
$route['berita/video/delete'] = 'videoController/delete';
$route['berita/video/update/(:any)'] = 'videoController/update/$1';
$route['berita/video/store'] = 'videoController/store_video';


//Berita Slide
$route['berita/slide'] = 'SlideController';
$route['berita/slide/create'] = 'SlideController/create';
$route['berita/slide/store'] = 'SlideController/store';

//Landing Page
$route['berita/(:any)'] = 'LandingPageController/showDetailArtikel/$1';
$route['video/(:any)'] = 'LandingPageController/showDetailVideo/$1';
$route['landingpage'] = 'LandingPageController/navbar/home';