<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//LOGIN
$route['login']                         = 'login_controller/login';
$route['logout']                        = 'login_controller/logout';

//ADMIN: CRUD students controller
$route['admin']                         = 'crud_students_controller/index';
$route['admin/add-student']             = 'crud_students_controller/create';
$route['admin/update-student/(:num)']   = 'crud_students_controller/update/$1';
$route['admin/delete-student/(:num)']   = 'crud_students_controller/delete/$1';

//ADMIN: CRUD subjects controller
$route['admin/subject']                 = 'crud_subjects_controller/index';
$route['admin/add-subject']             = 'crud_subjects_controller/create';
$route['admin/update-subject/(:num)']   = 'crud_subjects_controller/update/$1';
$route['admin/delete-subject/(:num)']   = 'crud_subjects_controller/delete/$1';

//ADMIN: import student list
$route['admin/import-student-list']             = 'import_students_info_controller/index';
$route['admin/import-student-list/proceed']     = 'import_students_info_controller/import_excel';

//ADMIN: import student list by subject
$route['admin/import-subject-students/(:num)']              = 'crud_subjects_controller/import_index/$1';
$route['admin/import-subject-students/proceed/(:num)']      = 'crud_subjects_controller/import_excel/$1';

//TODO: import ineligible
$route['admin/import-eligibilities']            = 'import_ineligible_students_controller/index';
$route['admin/import-eligibilities/proceed']    = 'import_ineligible_students_controller/import_excel';
//TODO: export shits


//ADMIN: create exam period
$route['admin/exam-period']                                     = 'create_exam_period_controller/index';
$route['admin/exam-period/create']                              = 'create_exam_period_controller/create';
$route['admin/update-exam-period/(:num)']                       = 'create_exam_period_controller/update/$1';
$route['admin/delete-exam-period/(:num)']                       = 'create_exam_period_controller/delete/$1';

$route['admin/exam-period-details/(:num)']                      = 'create_exam_period_controller/view_detail_index/$1';
$route['admin/exam-period-details/create']                      = 'create_exam_period_controller/create_detail';

//STUDENT: 
$route['student']                       = 'register_exam_session_controller/index';

//TODO: export registered list

// using multiple controller
$route['default_controller'] = 'CRUD_Students_Controller';
$route['crud_subjects_controller'] = 'CRUD_Subjects_Controller';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
