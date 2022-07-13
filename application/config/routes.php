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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'C_Index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// defafult routes
$route["login"] = "C_Index/login";
$route["logout"] = "C_Index/logout";

// user routes
$route["user"] = "C_Client";
$route["user/book-categories/(:any)"] = "C_Client/user_book_categories/$1";

$route["about"] = "C_Client/about";

// admin routes
$route["admin"] = "C_Admin";

$route["admin/user-role"] = "C_UserRole/user_role";
$route["admin/user-role/create"] = "C_UserRole/create_or_edit_user_role";
$route["admin/user-role/update/(:any)"] = "C_UserRole/create_or_edit_user_role/$1";
$route["admin/user-role/delete/(:any)"] = "C_UserRole/delete_user_role/$1";

$route["admin/user"] = "C_User/user";
$route["admin/user/create"] = "C_User/create_or_edit_user";
$route["admin/user/update/(:any)"] = "C_User/create_or_edit_user/$1";
$route["admin/user/delete/(:any)"] = "C_User/delete_user/$1";
$route["admin/user/detail/(:any)"] = "C_User/detail_user/$1";

$route["admin/book-category"] = "C_BookType/book_category";
$route["admin/book-category/create"] = "C_BookType/create_or_edit_book_cat";
$route["admin/book-category/update/(:any)"] = "C_BookType/create_or_edit_book_cat/$1";
$route["admin/book-category/delete/(:any)"] = "C_BookType/delete_book_cat/$1";

$route["admin/book"] = "C_Book/book";
$route["admin/book/create"] = "C_Book/create_or_edit_book";
$route["admin/book/update/(:any)"] = "C_Book/create_or_edit_book/$1";
$route["admin/book/delete/(:any)"] = "C_Book/delete_book/$1";