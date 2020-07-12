<?php
/* __destruct
Là phương thức tự động chạy khi đối tượng được khởi tạo.
Nó chỉ được thực thi ở cuối trang mà đối tượng đưuọc tạo ra.
Phương thức này được dùng để tạo hoặc hủy 1 session, giải phóng bộ nhớ,
đóng kết nối của ứng dụng đến database, đóng kết nối đến tập tin, ...
*/
require_once 'user.class.php';
// 1
// $userA = new User();
// echo '<h1>This is a test</h1>';

// 2
// <?php
// $userA = new User();
// echo '<h1>This is a test</h1>';
/* ?> 
<h3>This is a test 3</h3>
*/

// 3
$userA = new User();
echo '<pre>';
print_r($userA);
echo '</pre>';
// => sang 2.php
?>
