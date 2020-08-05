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
				require_once 'class/Database.class.php';
				
				session_start();
				//Nếu Guest đã là Admin hoặc Member rồi. ??
				if(isset($_SESSION['flagPermission'])==true){

					$timeoutXML = simplexml_load_file(DIR_DATA . 'timeout.xml');
					
					//Check timeout
					if(time() < $_SESSION['timeout'] + $timeoutXML-> time){ 

						echo '<h3>Xin chào: '.$_SESSION['userInfo']['fullname'].'</h3>';
						echo '<a href="logout.php">Đăng xuất</a>';
					}else{
						session_unset();
						header('location: login.php');
					}
				}else{ //Nếu Guest chưa là Admin hoặc Member.
					// Nếu Guest ĐÃ TYPE & nhấn Submit ô input Username & Pass ở trang login rồi.
					// (Nếu đã tồn tại $_POST['username'] && $_POST['password'])
					if(!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])){
						$username 	= $_POST['username'];
						$password 	= md5($_POST['password']);

						// $data = file_get_contents(DIR_DATA . 'users.json');
						// $data = json_decode($data, TRUE);
						// $userInfo = [];
						// CONNECT DATABASE
						$params		= array(
							'server' 	=> 'localhost',
							'username'	=> 'root',
							'password'	=> '',
							'database'	=> 'manage_user',
							'table'		=> 'user',
						);
						$database = new Database($params);

						// $query[] 	= "SELECT `g`.`id`,`g`.`name`,`g`.`status`,`g`.`ordering`, COUNT(`u`.id) AS total";
						$query[] 	= "SELECT `id`,`username`,`email`,`birthday`, CONCAT_WS(`firstname`, ' ', `lastname`) AS `fullname`, `address`";
						$query[] 	= "FROM `user`";
						$query[] 	= "WHERE `username` = '". $username ."' ";
						$query[] 	= "AND `password` = '". $password ."' ";
						$query		= implode(" ", $query);

						$database->query($query);
						$userInfo = $database->singleRecord();
						echo '<pre>';
						print_r($userInfo);
						echo '</pre>';
					

						// Check username & pass của Guest đã nhập ở trang login
						// có trùng với 1 trong các username & pass ở trang user.json hay ko ??
						foreach($data as $user){
							if($user['username'] == $username && $user['password'] == $password){
								$userInfo = $user;
								break;
							}
						}

						// Nếu username & pass của Guest đã nhập ở trang login ==  với username & pass ở trang user.json
						// if(isset($userInfo['username'])){
						if(!empty($userInfo)){
							$_SESSION['userInfo'] 		= $userInfo;
							$_SESSION['flagPermission'] = true; // Guest đã trở thành Admin hoặc
							$_SESSION['timeout'] 		= time();
							$_SESSION['level'] 			= $userInfo['level'];
							if($_SESSION['level']=='admin'){
								header('location: admin.php');
							} else {
								header('location: member.php'); // //Guest chưa là Admin hoặc Member.
							}
						}else{
							header('location: login.php');
						}
					// Nếu user chưa Type user & pass ở trang login.
					}else{
						header('location: login.php');
					}
				}
			?>
        </div>
        
    </div>
</body>
</html>
