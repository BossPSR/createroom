<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'funtion/Index_ctr/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['Login'] = 'funtion/Login_ctr/login';
$route['LoginMe'] = 'funtion/Login_ctr/loginMe';
$route['LogOut'] = 'funtion/Login_ctr/logout';
$route['profile'] = 'funtion/Login_ctr/profile'; 
$route['edit_profile'] = 'funtion/Login_ctr/edit_profile'; 
$route['edit_password'] = 'funtion/Login_ctr/edit_password'; 

$route['index'] = 'funtion/Index_ctr/index'; 
$route['add_room'] = 'funtion/Index_ctr/add_room';
$route['add_room_process'] = 'funtion/Index_ctr/add_room_process';
$route['detail_room'] = 'funtion/Index_ctr/detail_room';
$route['edit_room'] = 'funtion/Index_ctr/edit_room';
$route['edit_room_process'] = 'funtion/Index_ctr/edit_room_process';
$route['delete_room'] = 'funtion/Index_ctr/delete_room';
$route['file_teacher'] = 'funtion/Index_ctr/file_teacher';
$route['file_teacher_process'] = 'funtion/Index_ctr/file_teacher_process';
$route['downloadDocument'] = 'funtion/Index_ctr/downloadDocument';
$route['delete_file_teacher'] = 'funtion/Index_ctr/delete_file_teacher';

$route['Register'] = 'funtion/Register_ctr'; 

$route['Register_complete'] = 'funtion/Register_ctr/regist_complete'; 
$route['teacher_my_room'] = 'funtion/Index_ctr/teacher_my_room'; 

// Student
$route['index_student'] = 'funtion/Index_Student_ctr/index_student'; 
$route['detail_room_student'] = 'funtion/Index_Student_ctr/detail_room_student'; 
$route['student_my_room'] = 'funtion/Index_Student_ctr/student_my_room'; 
$route['profile_student'] = 'funtion/Index_Student_ctr/profile_student'; 