<?php
	// Kết nối
	$connect = @mysqli_connect('localhost', 'root', '');
	
	// Kiểm tra kết nối
	if(!$connect){
		die('<h3>Fail</h3>');
	}
	
	echo '<h3>Success</h3>';
	
	// Chọn database
	mysqli_select_db('manage_user', $connect);

	
	// Đóng kết nối
	mysqli_close($connect);