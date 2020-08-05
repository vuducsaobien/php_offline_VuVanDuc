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
				$timeoutXML = simplexml_load_file('../' . DIR_DATA . 'timeout.xml');

				if(time() < $_SESSION['timeout'] + $timeoutXML -> time ){ //Check Time < Timeout
					// Check level = ADMIN or MEMBER ??
					// Level = ADMIN
					if($_SESSION['level']== 'admin'){ 
						$hidden   = '';
						$readOnly = '';
			
						if(isset($_POST['textarea'])){ // Level = ADMIN
							file_put_contents('../'.DIR_DATA . 'rss.txt',$_POST['textarea']);
						}
					// Level = MEMBER
					} else { 
						$hidden   = 'hidden';
						$readOnly = 'readonly';
					}
					$getValue = file_get_contents('../' . DIR_DATA . 'rss.txt', true);
					$upperLevel = strtoupper($_SESSION['level']);
					
					echo 
					'<h3>Xin chào: '.$upperLevel.'   '. " " .'   '.$_SESSION['fullName'].  '</h3>
					Bạn có '.$timeoutXML-> time.'s để chỉnh sửa!<br>

					<form action="#" method="post">
						<div class="row">
							<p>List-Rss</p>
							<textarea rows="7" cols="50" name="textarea" '.$readOnly.'>'.$getValue.'</textarea>
							<br><br>
							<input type="submit" value="Save" '.$hidden.'>
							<button><a href="../index.php">Logout</a></button>
						</div>
					</form>';
				} else header('location: ../index.php'); // Time > Timeout
			?>
        </div>
    </div>
</body>
</html>
