<?php
	// Kết nối
	$connect = @mysqli_connect('localhost', 'root', '');
	
	// Kiểm tra kết nối
	if(!$connect){
		die('<h3>Fail</h3>');
	}
	
	echo '<h3>Success</h3>';
	
	// Số lượng các database hiện costrong Localhost
	// mysqli_result Object
	$databases = mysqli_query($connect, "SHOW DATABASES");
	// /*

	// Danh sách database
	// C1
	while($row = mysqli_fetch_array($databases)){
		echo '<pre>';
		print_r($row);
		echo '</pre>';
	}
	// */

	// C2
	// while($row = mysqli_fetch_object($databases)){
	// 	echo '<h3>' . $row->Database . '</h3>';
	// }
	
	// Đóng kết nối
	mysqli_close($connect);
