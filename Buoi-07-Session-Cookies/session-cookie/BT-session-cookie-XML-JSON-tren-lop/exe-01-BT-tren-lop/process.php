<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Process</title>
</head>
<body>
	<div id="wrapper">
    	<div class="title">PROCESS</div>
        <div id="form">   
			<?php
				require_once 'functions.php';
				require_once 'define.php';
				
				session_start();
				if(isset($_SESSION['flagPermission'])==true){
					$timeoutXML = simplexml_load_file(DIR_DATA . 'timeout.xml');
					echo $timeoutXML -> time;

					if($_SESSION['timeout'] + $timeoutXML > time()){
						echo '<h3>Xin chào: '.$_SESSION['fullName'].'</h3>';
						echo '<a href="logout.php">Đăng xuất</a>';
					}else{
						session_unset();
						header('location: login.php');
					}
					
				}else{
					if(!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])){
						$username 	= $_POST['username'];
						$password 	= md5($_POST['password']);

						$data = file_get_contents(DIR_DATA . 'users.json');
						$data = json_decode($data, TRUE);
						$userInfo = [];

						foreach($data as $user){
							if($user['username'] == $username && $user['password'] == $password){
								$userInfo = $user;
								break;
							}
						}

						if(isset($userInfo['username'])){
							$_SESSION['fullName'] 		= $userInfo['fullname'];
							$_SESSION['flagPermission'] = true;
							$_SESSION['timeout'] 		= time();
							$_SESSION['level'] 			= $userInfo['level'];
							if($_SESSION['level']=='admin'){
								header('location: admin.php');
							} else {
								header('location: member.php');
							}
							
						}else{
							header('location: login.php');
						}
					}else{
						header('location: login.php');
					}
				}
			?>
        </div>
        
    </div>
</body>
</html>
