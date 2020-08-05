<?php
	$connect = @mysqli_connect('localhost', 'root', '');
	if(!$connect) die('<h3>Fail</h3>');
	
	// INSERT
	mysqli_select_db($connect, 'manage_user');
	
	echo $query = "INSERT INTO `group`(`name`, `status`, `ordering`, `id`) VALUES 
					('Member1', '1', '10', '1')";

	// echo $query = "INSERT INTO `group`(`name`, `status`, `ordering`, `id`) VALUES 
	// ('Member 2', '1', '10', '2'), ('Member1', '1', '10', '1')";

	$result = mysqli_query($connect, $query);
	
	if($result){
		echo $total = mysqli_affected_rows($connect);
	}else{
		echo mysqli_error($connect);
	}

	mysqli_close($connect);