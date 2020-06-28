<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>
<body>
<?php
$checkBox = $_POST['checkbox'];

if(!empty($checkBox)){

    foreach($checkBox as $key => $value){
        $content		= file_get_contents("./files/$value");
        $content		= explode('||', $content);
        $file           = $content[2];
        @unlink("./images/$file");
    }
    
    foreach($checkBox as $key => $value){
        @unlink("./files/$value");
    }
} 

?>
	<div id="wrapper">
    	<div class="title">PHP FILE - Multi Delete</div>
        <div id="form">   
       		<p>Dữ liệu đã được xóa thành công!  <a href="index.php">Click vào đây</a> đê quay về trang chủ.</p>
        </div>
    </div>
</body>
</html>
