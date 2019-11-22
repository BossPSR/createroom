<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'funtion/Index_ctr/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['Login'] = 'funtion/Login_ctr/login';
$route['LoginMe'] = 'funtion/Login_ctr/loginMe';
$route['LogOut'] = 'funtion/Login_ctr/logout';

$route['index'] = 'funtion/Index_ctr/index'; 
$route['add_room'] = 'funtion/Index_ctr/add_room';
$route['add_room_process'] = 'funtion/Index_ctr/add_room_process';

$route['Category'] = 'funtion/Category_ctr';
$route['Edit_category'] = 'funtion/Category_ctr/Edit_category';
$route['Edit_category_Complete'] = 'funtion/Category_ctr/Edit_category_Complete';
$route['Category_delete'] = 'funtion/Category_ctr/category_delete';
$route['Type_Job'] = 'funtion/Type_ctr';
$route['Add_Type_job'] = 'funtion/Type_ctr/add_type_job';
$route['Add_Type_job_Complete'] = 'funtion/Type_ctr/add_type_job_com';
$route['Edit_type_job'] = 'funtion/Type_ctr/Edit_type_job';
$route['Edit_Type_job_Complete'] = 'funtion/Type_ctr/Edit_type_job_Complete';
$route['type_job_delete'] = 'funtion/Type_ctr/type_job_delete';
$route['Account'] = 'funtion/Profile_ctr';
$route['Account_edit'] = 'funtion/Profile_ctr/profile';
$route['Province'] = 'funtion/Province_ctr'; 
$route['Add_Province'] = 'funtion/Province_ctr/add_province'; 
$route['Add_province_Complete'] = 'funtion/Province_ctr/add_province_com';
$route['Province_delete'] = 'funtion/Province_ctr/province_delete';
$route['Amphures'] = 'funtion/Province_ctr/amphures'; 
$route['Add_amphures'] = 'funtion/Province_ctr/add_amphures'; 
$route['Add_amphures_Complete'] = 'funtion/Province_ctr/add_amphures_com'; 
$route['Amphures_delete'] = 'funtion/Province_ctr/amphures_delete';
$route['Jobpost'] = 'funtion/Jobpost_ctr'; 
$route['Job_post_delete'] = 'funtion/Jobpost_ctr/job_post_delete';
