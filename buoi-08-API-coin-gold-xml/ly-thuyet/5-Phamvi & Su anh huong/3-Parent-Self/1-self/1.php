<?php
/*
- self : Đại diện cho cách khởi tạo Lớp hiện thời & thường được sử 
dụng gọi đến biến số có khóa STATIC or hàm nào đó trong lớp hiện tại.
- parent : Đại diện của lớp Cha & thường được sử dụng gọi đến biến
số có khóa STATIC or PThức nào đó trong lớp Cha của lớp hiện tại.
*/
require_once 'cat.class.php';

$cat = new Cat('Tom', 'blue', 5, '3kg');
$cat->showInfo();

echo '<pre>';
print_r($cat);
echo '</pre>';