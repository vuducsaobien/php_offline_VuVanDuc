<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/style1.css">
<title>Login</title>
</head>
<body>
	<div id="wrapper">
    	<div class="title">LOGIN</div>
        <div id="form">   
        <?php
			session_start();
			// echo '<pre>';
			// print_r($_SESSION);
			// echo '</pre>';

			require_once '../define.php';
			$data = file_get_contents('../' . DIR_DATA . 'users.json');//Lấy nội dung file JSON
			$json = json_decode($data, TRUE);//Chuyển từ 1 chuỗi thành 1 mảng File Json.

			//Nếu Guest đã là Admin hoặc Member rồi.
        	if(isset($_SESSION['flagPermission'])==true){
				$timeoutXML = simplexml_load_file('../' . DIR_DATA . 'timeout.xml'); //Đọc file xml

				//Check timeout
				if( time() < $_SESSION['timeout'] + $timeoutXML -> time ){
					echo '<h3>Xin chào: '.$_SESSION['fullName'].'</h3>';
					echo '<a href="logout.php">Đăng xuất</a>';

					if($_SESSION['level']=='admin'){
						header('location: manage-rss.php');
					} else {
						header('location: manage-rss.php');
					}
					
				}else{
					session_unset(); //??
					header('location: login.php');
				}
			}else{
        ?>
		
			<form action="process.php" method="post" name="add-form">
				<div class="row">
					<p>Username</p>
					<input type="text" name="username" />
				</div>
				
				<div class="row">
					<p>Password</p>
					<input type="password" name="password" />
				</div>
				
				<div class="row">
					<input type="submit" value="Đăng nhập" name="submit">
				</div>
			</form>    

		<?php
			} 
		?>
        </div>
        
    </div>
</body>
</html>
