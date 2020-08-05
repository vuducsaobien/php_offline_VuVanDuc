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
	
	$data 	= array('status' => 0, 'ordering' => 10, 'name' => 'ss');
	$where	= array(
						array('ordering', 9, 'and'),
						array('status', 1)
				);
	$database->update($data, $where);
	
