<?php
	$connect = @mysqli_connect('localhost', 'root', '');
	if(!$connect) die('<h3>Fail</h3>');
	mysqli_select_db($connect, 'manage_user');

	// UPDATE
	$query = "UPDATE `group` SET `status` = '1', `name` = 'Admin 1', `ordering` = '1'
				   WHERE `id` = '3' ";
	$result = mysqli_query($connect, $query);
	
	if($result){
		echo $total = mysqli_affected_rows($connect);
	}else{
		echo mysqli_error($connect);
	}
	
	mysqli_close($connect);