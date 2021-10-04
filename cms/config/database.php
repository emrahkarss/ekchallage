<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Kodlarda İkili db connection bulunmakradır
not : localüzerinde ip ile çalışan sistemler if($sunucu == "localhost") yerini if($sunucu == "İp Gelecek yer ") Olarak Değştirilmelidir
*/
$sunucu = $_SERVER['HTTP_HOST'];
if ($sunucu == "domain.com") {
	$active_group = 'db2';
	$query_builder = TRUE;
}else{
	$active_group = 'default';
	$query_builder = TRUE;
}

//localhost Üzerinde Calışan Bağlantı
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => 'mysql',
	'database' => 'ekch',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

//Hosting  Üzerinde Çalışan Bağlantı Bağlantı
$db['db2'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => '',
	'password' => '',
	'database' => '',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
