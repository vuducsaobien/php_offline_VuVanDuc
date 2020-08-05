<?php
	// Kết nối
	$connect = @mysqli_connect('localhost', 'root', '');
	if(!$connect) die('<h3>Fail</h3>');

		// Số lượng các database hiện có trong Localhost
	// $databases = mysqli_query($connect, "SHOW DATABASES");

		// Danh sách database
	// C1
	// while($row = mysqli_fetch_array($databases)){
	// 	echo '<pre>';
	// 	print_r($row);
	// 	echo '</pre>';
	// }

	// C2
	// while($row = mysqli_fetch_object($databases)){
	// 	echo '<h3>' . $row->Database . '</h3>';
	// }

	// Chọn database
	// mysqli_select_db('manage_user', $connect);

		// Số lượng các Tables hiện có trong manage_user
	$databases = mysqli_query($connect, "SHOW TABLES FROM manage_user");

	// C1
	while($row = mysqli_fetch_array($databases)){
		// echo '<pre>';
		// print_r($row);
		// echo '</pre>';
		echo '<h3>' . $row[0] . '</h3>';
	}

	// C2
	// while($row = mysqli_fetch_object($databases)){
	// 	echo '<h3>' . $row->Tables_in_manage_user . '</h3>';
	// }
	
	// Đóng kết nối
	mysqli_close($connect);