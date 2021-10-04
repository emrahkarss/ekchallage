<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';


$route['event/(:any)'] = 'home/etkinlik/$1';

$route['registercheck'] = 'home/registercheck';
$route['purchase'] = 'home/purchase';
$route['checkSub'] = 'home/checkSub';
$route['worker'] = 'home/worker';
$route['callback'] = 'home/callback';
$route['stats'] = 'home/stats';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
