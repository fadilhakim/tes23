<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'fundamental';
$route['404_override'] = 'fundamental/page404';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'fundamental';
$route['about'] = 'fundamental/about';
$route['contact'] = 'fundamental/contact';
$route['product'] = 'fundamental/product';


//admin route
$route['admin'] = 'admin';

//insert
$route['admin/insert/product'] = 'insert/insert_product';

//delete
$route['admin/delete/product/(:num)'] = 'delete/delete_product';

//edit view
$route['admin/edit/product/(:num)'] = 'admin/edit_product/$1';

//edit function
$route['admin/edit/product_f'] = 'update/update_product';


