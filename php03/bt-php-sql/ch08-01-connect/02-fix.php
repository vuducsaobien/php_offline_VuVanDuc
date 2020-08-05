<?php
	// Kết nối
	$connect = @mysqli_connect('localhost', 'root', '');
	
	// Kiểm tra kết nối
	if(!$connect){
		die('<h3>Fail</h3>');
	}
	
	echo '<h3>Success</h3>';
	
	// Danh sách database
	// $databases = mysql_list_dbs($connect);
	$databases = mysqli_query('SHOW DATABASES');
	
	
	while($row = mysqli_fetch_object($databases)){
		echo '<h3>' . $row->Database . '</h3>';
	}
	
	// Đóng kết nối
	mysqli_close($connect);