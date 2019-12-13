<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//route cho crud phòng
$route['phong/get']             = 'crud_phong_controller/get_all';
$route['phong/get/(:num)']      = 'crud_phong_controller/get_by_id/$1';
$route['phong/delete/(:num)']   = 'crud_phong_controller/delete/$1';
$route['phong/insert']          = 'crud_phong_controller/insert';
$route['phong/update/(:num)']   = 'crud_phong_controller/update/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
