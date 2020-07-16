<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/style1.css">
<title>manage-rss</title>
</head>
<body>
	<div id="wrapper">
    	<div class="title">Manage-Rss</div>
        <div id="form">   

			<?php
			require_once '../define.php';
			session_start();
			// echo '<pre>';
			// print_r($_SESSION);
			// echo '</pre>';
			$timeoutXML = simplexml_load_file('../' . DIR_DATA . 'timeout.xml');

			if(time() < $_SESSION['timeout'] + $timeoutXML -> time ){ //Check Time < Timeout

				// Check level = ADMIN or MEMBER ??
				if($_SESSION['level']== 'admin'){ // Level = ADMIN
					echo 
					'<h3>Xin chào: ADMIN '.$_SESSION['fullName'].'</h3>
					Bạn có '.$timeoutXML-> time.'s để chỉnh sửa!<br>';
		
					if(isset($_POST['textarea'])){ // Level = ADMIN
						file_put_contents('../'.DIR_DATA . 'rss.txt',$_POST['textarea']);
					}
				?> 
					<!-- Level = ADMIN -->
					<form action="#" method="post">
						<div class="row">
							<p>List-Rss</p>
							<textarea rows="7" cols="50" name="textarea"><?php 
								echo file_get_contents('../' . DIR_DATA . 'rss.txt', true);?>
							</textarea>
							<br><br>
							<input type="submit" value="Save">
							<button><a href='../index.php'>Logout</a></button>
						</div>
					</form>

				<?php 
				} else { // Level = MEMBER
				echo 
				'<h3>Xin chào: MEMBER '.$_SESSION['fullName'].'</h3>
				Bạn chỉ có '.$timeoutXML-> time.'s để xem thôi đó!<br>';
				?>
					<!-- Level = MEMBER -->
					<form action="#" method="post">
						<div class="row">
							<p>List-Rss</p>
							<textarea rows="7" cols="50" name="textarea" readonly><?php 
								echo file_get_contents('../' . DIR_DATA . 'rss.txt', true);?>
							</textarea>
							<br><br>
							<button><a href='../index.php'>Logout</a></button>
						</div>
					</form>
				
				<?php
				}
			} else header('location: ../index.php'); // Time > Timeout
				?>
        </div>
    </div>
</body>
</html>
