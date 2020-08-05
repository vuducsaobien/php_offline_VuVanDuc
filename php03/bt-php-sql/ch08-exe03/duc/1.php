<!-- <p>Dữ liệu đã được xóa thành công!<a href="index.php">Click vào đây</a>để quay về trang chủ.</p>
<p>Hãy chọn lại File để xóa<a href="index.php">Click vào đây</a>để quay về trang chủ.</p> -->
<?php
$a = array();
echo '<pre>';
print_r($a);
echo '</pre>';

function checkEmpty($value){
    $flag = false; 
    if (!isset ($value) || trim($value) == "" ){
        $flag = true;
    }
    return $flag;
}
echo checkEmpty($a);
?>