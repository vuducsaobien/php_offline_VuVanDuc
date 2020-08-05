<?php
	$connect = @mysqli_connect('localhost', 'root', '');
	if(!$connect) die('<h3>Fail</h3>');
	mysqli_select_db($connect, 'manage_user');

	// INSERT Nhiều Array
	$arrData = array(
					array('name'=>'Thành viên', 'status' => 0, 'ordering' => 8, 'id' => 1),
					array('name'=>'Người Sáng Lập', 'status' => 1, 'ordering' => 9, 'id' => 2),
					array('name'=>'Người Quản Lý', 'status' => 1, 'ordering' => 10, 'id' => 3),
				);
				
	function createInsertSQL($data){
		$newQuery = [];
		$vals = '';
		$cols = '';
		if(!empty($data)){
			foreach($data as $key => $value){
				$cols .= ", `$key`";
				$vals .= ", '$value'";
			}
		}
		$newQuery['cols'] = substr($cols, 2);
		$newQuery['vals'] = substr($vals, 2);
		return $newQuery;
	}
			
	foreach($arrData as $value){
		$newQuery = createInsertSQL($value);
		$query 	  = "INSERT INTO `group`(".$newQuery['cols'].") VALUES (".$newQuery['vals'].")";
		mysqli_query($connect, $query);
	}
