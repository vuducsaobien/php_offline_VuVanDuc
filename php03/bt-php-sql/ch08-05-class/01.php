<?php
	require_once 'Database.class.php';
	
	$params		= array(
						'server' 	=> 'localhost',
						'username'	=> 'root',
						'password'	=> '',
						'database'	=> 'manage_user',
						'table'		=> 'group',
					);
	$database = new Database($params);

	/*
	SET CONNECT
	$link = mysqli_connect('localhost', 'root', '');
	$database =->setConnect($link);
	*/

	echo '<pre>';
	print_r($database);
	echo '</pre>';
	
