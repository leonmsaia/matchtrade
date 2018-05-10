<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['about'] = "Internal/about";
$route['contact'] = "Internal/contact";
$route['terms'] = "Internal/terms";
$route['support'] = "Internal/about";
$route['privacity'] = "Internal/privacity";

$route['profiles/sales'] = "Landing/sales";
$route['profiles/provider'] = "Landing/provider";

$route['user/dashboard'] = "User/dashboard";
$route['user/profile'] = "User/profile";
$route['user/settings'] = "User/settings";
$route['user/tax'] = "User/taxInformation";
$route['user/company'] = "User/companyInformation";
$route['user/type'] = "User/create_type";
$route['user/create/(:any)'] = "User/create/$1";
$route['user/login'] = "User/login";
$route['user/recover'] = "User/Recover";
$route['user/movements'] = "Store/movements";

$route['user/createAdvise'] = "Internal/provider";
$route['user/adviseList'] = "Internal/provider";
$route['user/my_matches'] = "User/matchList";

$route['user/references'] = "User/getMyReferences";
$route['user/reviews'] = "User/getMyReviews";

$route['blog'] = "Blog/index";
$route['blog/article/(:any)'] = "Blog/Post/$1";
$route['blog/category/(:any)'] = "Blog/Category/$1";
$route['blog/search/(:any)'] = "Blog/Search/$1";

$route['list'] = "List_Advise/list";
$route['list/category/(:any)'] = "List_Advise/list_by_category/$1";
$route['list/subcategory/(:any)'] = "List_Advise/list_by_subcategory/$1";
$route['list/advise/(:any)'] = "List_Advise/singular/$1";
$route['advise/create'] = "List_Advise/create_advise";
$route['advise/edit/(:any)'] = "List_Advise/edit_advise/$1";
$route['advise/my_advises'] = "List_Advise/getAllMyAdvises/";


$route['store/prices'] = "Store/prices";
$route['store/payPlan/(:any)'] = "Store/payPlan/$1";
$route['store/confirmed'] = "Store/confirmed_transaction";
$route['store/refused'] = "Store/refused_transaction";
$route['store/pleasewait'] = "Store/please_wait_transaction";
$route['store/response/(:any)/(:any)'] = "Store/response/$1/$2";

$route['success/list'] = "Landing/successCase";

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
