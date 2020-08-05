<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE - Multi Delete</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>
<body>
<?php
require_once 'functions.php';
require_once 'define.php';

if( isset ($_POST['checkbox'])  ){

    $checkBox = $_POST['checkbox'];

    foreach($checkBox as $key => $value){
        $content		= file_get_contents(DIR_FILES . $value);
        $content		= explode('||', $content);
        $file           = $content[2];
        @unlink(DIR_IMAGES . $file);
    }
    
    foreach($checkBox as $key => $value){
        @unlink(DIR_FILES . $value);
        $flag = true;
    }

} else {
    $flag = false;
    }

?>
	<div id="wrapper">
    	<div class="title">PHP FILE - Multi Delete</div>
        <div id="form">
           <?php
               if ($flag == true){
                   echo '<p>Dữ liệu đã được xóa thành công! <a href="index.php">Click vào đây</a> để quay về trang chủ.</p>';
               } else {
                   echo '<p>Không có File nào được chọn cả! <a href="index.php">Click vào đây</a> để quay về trang chủ.</p>';
               }
           ?>
        </div>
    </div>
</body>
</html>
