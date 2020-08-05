<?php
// Session File
session_start();
$_SESSION['file'] = 
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>This is a test</title>
</head>
<body>
    <h1>This is a File</h1>
</body>
</html>

<?php
    // File Session
    function checkNumber($number){
        return ($number % 2 == 0) ? "Số chẵn" : "Số lẻ";
    }
?>';



// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

eval ('?>' . $_SESSION['file']);
echo checkNumber(3);
?>