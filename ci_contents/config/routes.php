<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "initial";
$route['404_override'] = '';

$route['^((?!admin|resources|ci_contents).)*$'] = "initial";
$route['resources/(:any)'] = "resources/index";

$route['admin/signout'] = "admin/initial/signout";

$route['admin/accounts/(:num)'] = "admin/accounts/account/$1";

$route['admin/accounts/(:num)/delete'] = "admin/accounts/delete/$1";

$route['admin/accounts/(:num)/edit'] = "admin/accounts/edit/$1";

/* INVOICES */
$route['admin/accounts/(:num)/invoices'] = "admin/invoices/index/$1";
$route['admin/accounts/(:num)/invoices/create'] = "admin/invoices/create/$1";
$route['admin/accounts/(:num)/invoices/merge'] = "admin/invoices/merge/$1";
$route['admin/accounts/(:num)/invoices/statement'] = "admin/invoices/statement/$1";
$route['admin/accounts/(:num)/invoices/(:num)'] = "admin/invoices/invoice/$1/$2";
$route['admin/accounts/(:num)/invoices/(:num)/payment'] = "admin/invoices/payment/$1/$2";
$route['admin/accounts/(:num)/invoices/(:num)/charge'] = "admin/invoices/charge/$1/$2";
$route['admin/accounts/(:num)/invoices/(:num)/payment/(:num)/remove'] = "admin/invoices/remove/$1/$2/$3";
$route['admin/accounts/(:num)/invoices/(:num)/charge/(:num)/remove'] = "admin/invoices/remove/$1/$2/$3";
$route['admin/accounts/(:num)/invoices/(:num)/preview'] = "admin/invoices/preview/$2";
$route['admin/accounts/(:num)/invoices/(:num)/cancel'] = "admin/invoices/cancel/$1/$2";
$route['admin/accounts/(:num)/invoices/(:num)/delete'] = "admin/invoices/delete/$1/$2";
$route['admin/accounts/(:num)/invoices/(:num)/send'] = "admin/invoices/send/$1/$2";



/* DOMAINS */
$route['admin/accounts/(:num)/domains'] = "admin/domains/index/$1";
$route['admin/accounts/(:num)/domains/(:num)'] = "admin/domains/domain/$1/$2";



/* PROJECTS */
$route['admin/accounts/(:num)/projects'] = "admin/projects/index/$1";
$route['admin/accounts/(:num)/projects/(:num)'] = "admin/projects/project/$1/$2";
$route['admin/accounts/(:num)/projects/(:num)/milestones'] = "admin/projects/milestones/$1/$2";




$route['admin/accounts/(:num)/hosting'] = "admin/hosting/index/$1";
$route['admin/accounts/(:num)/domains'] = "admin/domains/index/$1";
$route['admin/accounts/(:num)/support'] = "admin/support/index/$1";
$route['admin/accounts/(:num)/contacts'] = "admin/contacts/index/$1";
$route['admin/accounts/(:num)/corrospondence'] = "admin/corrospondence/index/$1";


/* USERS */
$route['admin/utilities/users'] = "admin/users/index";
$route['admin/utilities/users/add'] = "admin/users/add";
$route['admin/utilities/users/delete/(:num)'] = "admin/users/delete/$1";
$route['admin/utilities/users/(:num)'] = "admin/users/edit/$1";
$route['admin/utilities/users/test_email_connection'] = "admin/users/test_email_connection";

/* End of file routes.php */
/* Location: ./application/config/routes.php */