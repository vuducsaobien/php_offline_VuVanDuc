<?php
/* Static
- Được dùng với Phương Thức & Biến
- Truy cập nhanh PThức mà không cần khởi tạo đối tượng
*/
// 1 2 3
class Sample{
    static $a = 1000;
}

// 1 Không gọi được
// $sample = new Sample();
// echo 'Static $a: ' . $sample->a;

// 2 Không gọi được
// $sample = new Sample();
// echo 'Static $a: ' . $sample->$a;

// 3 Hiển thị được
$sample = new Sample();
echo 'Static $a: ' . Sample::$a;


