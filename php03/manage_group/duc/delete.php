<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE - Delete</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cancel-button').click(function(){
			window.location = "index.php";
		});
	});
</script>
</head>
<body>
<?php
	require_once 'define.php';
	$id				= $_GET['id'];
	$id 			= $id . '.txt';
	$content		= file_get_contents(DIR_FILES . $id);
	$content		= explode('||', $content);
	$title			= $content[0];
	$description	= $content[1];
	$image 			= $content[2];
	$realPathId 	= realpath(DIR_FILES . $id);
	$realPathImage  = realpath(DIR_IMAGES . $image);
	// Người dùng đã ấn Delete, Post ID hidden, lấy id để xóa file .txt
	$flag = false;
	if (isset($_POST['id'])){
		$id = $_POST['id'];
		@unlink(DIR_IMAGES . $image);
		@unlink(DIR_FILES . $id);
		$flag = true;
	}

echo    
	'<div id="wrapper">
    	<div class="title">PHP FILE - Delete</div>
        <div id="form">';
			if ($flag == false){ echo
				'<form action="" method="post" name="main-form">
				
					<div class="row">
						<p>File:</p>
						<span>'.$realPathId.'</span>
					</div>

					<div class="row">
						<p>Title:</p>
						<span> '.$title.' </span>
					</div>

					<div class="row">
						<p>Description:</p>
						<span> '.$description.' </span>
					</div>

					<div class="row">
						<p>Image:</p>
						<span>'.$realPathImage.'</span>
					</div>

					<div class="row">
						<input type="hidden" value = '.$id.' name="id" >
						<input type="submit" value="Delete" 			name="submit">
						<input type="button" value="Cancel" 			name="cancel" id="cancel-button">
					</div>';
			} else { echo '<p>Xóa thành công!<a href = "index.php">Ấn vào đây</a> để quay lại</p>'; }
			echo	'</form>    
        </div>
        
	</div>';
	?>

</body>
</html>
