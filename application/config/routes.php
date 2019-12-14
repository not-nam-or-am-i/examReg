<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//ADMIN: crud students controller
$route['admin']                         = 'crud_students_controller/index';
$route['admin/add-student']             = 'crud_students_controller/create';
$route['admin/update-student/(:num)']   = 'crud_students_controller/update/$1';
$route['admin/delete-student/(:num)']   = 'crud_students_controller/delete/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
