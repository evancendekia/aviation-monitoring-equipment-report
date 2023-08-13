<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login']['GET'] = 'Login/index';
$route['login']['POST'] = 'Login/do_login';
$route['logout']['GET'] = 'Login/logout';

$route['dashboard']['GET'] = 'Dashboard/index';

$route['user']['GET'] = $route['user-delete']['GET'] = $route['reset-password']['GET'] ='Master Data/User/index';
$route['user']['POST'] = 'Master Data/User/create_user';
$route['user-delete']['POST'] = 'Master Data/User/delete_user';
$route['reset-password']['POST'] = 'Master Data/User/reset_password';

$route['checklist']['GET'] = 'Modul/Checklist/index';
$route['checklist/add']['GET'] = 'Modul/Checklist/add_form';
$route['checklist/add']['POST'] = 'Modul/Checklist/add';
$route['checklist/detail']['GET'] = 'Modul/Checklist/detail';
$route['checklist/related-report']['GET'] = 'Modul/Checklist/related';

$route['maintenance']['GET'] = 'Modul/Maintenance/index';
$route['maintenance/add']['GET'] = 'Modul/Maintenance/index';
$route['maintenance/add']['POST'] = 'Modul/Maintenance/add_laporan';
$route['maintenance/proses']['GET'] = 'Modul/Maintenance/index';
$route['maintenance/proses']['POST'] = 'Modul/Maintenance/proses_laporan';
$route['maintenance/finish']['GET'] = 'Modul/Maintenance/index';
$route['maintenance/finish']['POST'] = 'Modul/Maintenance/finish_laporan';
$route['maintenance/approve']['GET'] = 'Modul/Maintenance/index';
$route['maintenance/approve']['POST'] = 'Modul/Maintenance/approve_laporan';
$route['maintenance/add-evident']['GET'] = 'Modul/Maintenance/index';
$route['maintenance/add-evident']['POST'] = 'Modul/Maintenance/add_evident';


// $route['sarfas']['GET'] = 'Modul/Sarfas/index';
$route['sarfas']['GET'] = 'Modul/Equipment/index';

$route['inventory']['GET'] = 'Modul/Inventory/index';
$route['inventory/add']['GET'] = 'Modul/Inventory/index';
$route['inventory/add']['POST'] = 'Modul/Inventory/add_inventory';
$route['inventory/edit']['GET'] = 'Modul/Inventory/index';
$route['inventory/edit']['POST'] = 'Modul/Inventory/edit_inventory';