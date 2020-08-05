<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cancel-button').click(function(){
			window.location = 'index.php';
		});
	});
</script>

<title>PHP FILE - Edit</title>
</head>
<body>
<?php
	require_once 'functions.php';
	require_once 'define.php';
	$configs			= parse_ini_file('configs.ini');
	$id 				= $_GET['id'];
	$id 				= $id . '.txt';
	$content		 	= file_get_contents( DIR_FILES . $id);
	$content 	 		= explode('||', $content);
	$title	 	 		= $content[0];
	$description 		= $content[1];
	$image 				= $content[2];
	$errorTitle			= '';
	$errorDescription	= '';
	$errorImage			= '';

	$flag = false;
    if( isset($_POST['title']) && isset($_POST['description'])) {
        $title          = $_POST['title'];
		$description    = $_POST['description'];
		$fileUpload     = $_FILES['image'];
		$uploadName     = $fileUpload['name'];
		$uploadTmp	    = $fileUpload['tmp_name'];

		//Error Title
		$errorTitle				= '';
		if (checkEmpty($title)) 					$errorTitle = '<p class="error">Dữ liệu ko dc rỗng</p>';
		if (checkLength($title, 1, 100))			$errorTitle .= '<p class="error">Tiêu đề dài từ 1 -100 ký tự</p>';

		//Error Description
		$errorDescription		= '';
		if (checkEmpty($description)) 				$errorDescription = '<p class="error">Dữ liệu ko dc rỗng</p>';
		if (checkLength($description, 1, 5000))		$errorDescription .= '<p class="error">Mô tả dài từ 1 - 5000 ký tự</p>';

		// Error Image
		$flagImageChange = false;
		$errorImage 	 = '';
		if ($uploadName != ''){
			$flagImageChange = true;
			$flagSize 	   = checkSize($fileUpload['size'], $configs['min_size'], $configs['max_size']);
			$flagExtension = checkExtension($uploadName, explode('|', $configs['extension']));

			if (!$flagSize) 	 $errorImage .= '<p class="error">Size File sai</p>';
			if (!$flagExtension) $errorImage .= '<p class="error">Extension File sai</p>';
		}

		// A - Z, a - z, 0 - 9. Put String to File, Đè chông File .txt mới vào File cũ, Xử lý File Image.
		if ($errorTitle == '' && $errorDescription == '' && $errorImage == ''){
			$fileName 		= DIR_FILES . $id;

			if ($flagImageChange){
				$imageChange = 'DUC-' . randomString($uploadName, 5);
				@unlink(DIR_IMAGES . $image);

			} else {
				$imageChange = $image;
			}

			$data		= $title . '||' . $description . '||' . $imageChange;
			if (file_put_contents($fileName, $data)){
				@move_uploaded_file($uploadTmp, DIR_IMAGES . $imageChange);
				$title		 = '';
				$description = '';
				$image		 = $uploadName;
				$flag		 = true;
			}
		}
	}
	
	echo
	'<div id="wrapper">
    	<div class="title">PHP FILE - Add</div>
        <div id="form">   
			<form action="#" method="post" name="add-form" enctype="multipart/form-data">
				<div class="row">
					<p>Title</p>
					<input type="text" name="title" value ="'.$title.'">
					'.$errorTitle.'
                </div>
                
				<div class="row">
					<p>Description</p>
					<textarea name="description" rows="5" cols="100">'.$description.'</textarea>
                    '.$errorDescription.'
                </div>

				<div class="row">
					<p>'.$image.'</p>
					<input type="file" name="image">
					'.$errorImage.'
                </div>

				<div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
				</div>';

					if ($flag == true) echo '<div class="row"><p>Dữ liệu đã được SỬA thành công</p></div>';
	echo	'</form>    
        </div>
    </div>';
	?>

</body>
</html>