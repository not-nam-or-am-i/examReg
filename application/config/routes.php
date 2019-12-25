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

//TODO: import eligible students by subject
$route['admin/import-eligibilities/(:num)']                 = 'crud_subjects_controller/import_index_eligible/$1';
$route['admin/import-eligibilities/proceed/(:num)']         = 'crud_subjects_controller/import_excel_eligible/$1';

//TODO: import ineligible students by subject
$route['admin/import-ineligibilities/(:num)']               = 'crud_subjects_controller/import_index_ineligible/$1';
$route['admin/import-ineligibilities/proceed/(:num)']       = 'crud_subjects_controller/import_excel_ineligible/$1';

//ADMIN: export registered list
$route['admin/export-room/(:num)/(:num)']               = 'export_students_list_controller/get_students_list/$1/$2';


//TODO: export shits


//ADMIN: create exam period
$route['admin/exam-period']                                     = 'create_exam_period_controller/index';
$route['admin/exam-period/create']                              = 'create_exam_period_controller/create';
$route['admin/update-exam-period/(:num)']                       = 'create_exam_period_controller/update/$1';
$route['admin/delete-exam-period/(:num)']                       = 'create_exam_period_controller/delete/$1';

$route['admin/exam-period-details/(:num)']                      = 'create_exam_period_controller/view_detail_index/$1';
$route['admin/exam-period-details/(:num)/create-ca']            = 'create_exam_period_controller/create_ca/$1';


$route['admin/exam-period-details/(:num)/(:num)']               = 'create_exam_period_controller/view_detail_room_index/$1/$2';
$route['admin/exam-period-details/(:num)/(:num)/create-room']   = 'create_exam_period_controller/create_room/$1/$2';


//STUDENT: 
$route['student']                       = 'register_exam_session_controller/index';

//STUDENT: export reg result
$route['student/reg-result']            = 'export_registration_result_controller/get_reg_result';



// using multiple controller
$route['default_controller'] = 'CRUD_Students_Controller';
$route['crud_subjects_controller'] = 'CRUD_Subjects_Controller';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
