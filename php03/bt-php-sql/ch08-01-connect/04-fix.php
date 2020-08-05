<?php
	// Kết nối
	$connect = @mysqli_connect('localhost', 'root', '');
	
	// Kiểm tra kết nối
	if(!$connect){
		die('<h3>Fail</h3>');
	}
	
	echo '<h3>Success</h3>';
	
	// Danh sách table
	$tables = mysqli_query($connect, 'SHOW TABLES FROM manage_user');
	
	while($row = mysqli_fetch_array($tables)){
 		echo '<h3>' . $row[0] . '</h3>';
	}
	
	// Đóng kết nối
	mysqli_close($connect);