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
$route['detail_room'] = 'funtion/Index_ctr/detail_room';
$route['edit_room'] = 'funtion/Index_ctr/edit_room';
$route['edit_room_process'] = 'funtion/Index_ctr/edit_room_process';

