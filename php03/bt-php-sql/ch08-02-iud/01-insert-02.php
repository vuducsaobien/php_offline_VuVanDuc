<?php
	$connect = @mysqli_connect('localhost', 'root', '');
	if(!$connect) die('<h3>Fail</h3>');
	mysqli_select_db($connect, 'manage_user');

	// INSERT 1 Array
	$arrData = array('name'=>'Member 5', 'status' => 0, 'ordering' => 9);

	// C1
	// $query = "INSERT INTO `group`(`name`, `status`, `ordering`) VALUES 
	// 	('".$arrData['name']."', '".$arrData['status']."', '".$arrData['ordering']."')";
	
	// C2 Xd 1 function để nhập dữ liệu
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

	$newQuery = createInsertSQL($arrData);
	$query  = "INSERT INTO `group`(".$newQuery['cols'].") VALUES (".$newQuery['vals'].")";
	$result = mysqli_query($connect, $query);

	if($result){
		echo $total = mysqli_affected_rows($connect);
	}else{
		echo mysqli_error($connect);
	}
	
	mysqli_close($connect);