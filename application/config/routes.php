<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'errors';
$route['404-not-found.html'] = 'errors';
$route['translate_uri_dashes'] = FALSE;
#ADMIN
$route['admin/(:any)'] = 'admin/$1';
$route['admin'] = 'admin/index/login';
$route['not-found'] = 'admin/errors/page404';
$route['non-permission'] = 'admin/errors/page401';

#FRONT
$route['language'] = 'language/language';
$route['appointment'] = 'home/ajaxAppointment';
$route['evaluate-records'] = 'page/ajaxEvaluaterecords';
$route['search'] = 'news/search';
$route['sitemap.xml'] = 'sitemap/sitemapXML';
$route['sitemap.html'] = 'sitemap/sitemapHTML';
$route['(:any)-(:num).html'] = 'news/detail/$2';
$route['(:any)-album(:num).html'] = 'album/detail/$2';
$route['(:any)-video(:num).html'] = 'video/detail/$2';
$route['(:any).html'] = 'page/index/$1';
$route['(:any)'] = 'category/index/$1';

