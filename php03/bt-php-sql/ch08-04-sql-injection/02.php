<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
	$connect = @mysqli_connect('localhost', 'root', '');
	if(!$connect) die('<h3>Fail</h3>');
	mysqli_select_db($connect, 'manage_user');
	mysqli_query($connect, "SET NAMES 'utf8'");
	mysqli_query($connect,"SET CHARACTER SET 'utf8'");

	echo $id = $_GET['id'];
	echo '<br />' .$id = mysql_real_escape_string($id);
	
	echo $query	= "SELECT * FROM `group` WHERE `id` = '$id'";

	$result = @mysql_query($query);
	while($row = mysql_fetch_assoc($result)){
		echo '<pre>';
		print_r($row);
		echo '</pre>';
	}

	mysql_close($connect);
?>            


	
	
	
	
	
	