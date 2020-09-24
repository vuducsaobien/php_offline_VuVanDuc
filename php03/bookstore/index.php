<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once 'define.php';
require_once 'define_notice.php';
date_default_timezone_set(DEFAULT_TIMEZONE);


function __autoload($clasName)
{
	require_once LIBRARY_PATH . "{$clasName}.php";
}
Session::init();

$bootstrap = new Bootstrap();
$bootstrap->init();

// NOTICE 1: video book default P1 phút 19, category_id URL == Category được chọn.