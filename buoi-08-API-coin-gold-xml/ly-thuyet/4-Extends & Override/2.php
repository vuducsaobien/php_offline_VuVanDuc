<?php
/*Final
- Đối với Methods: Lớp con không thể override các
Ph-Thức ở lớp cha NẾU các PThức ở lớp cha có khóa FINAL
- Đối với Class: Khi chúng ta dùng từ khóa FINAL THÌ
chúng ta KHÔNG THỂ extends từ class đó.

// 1 2
*/
require_once '2.lion.class.php';
$arrayInfo = array('name' => 'LionA', 
                    'color' => 'yellow', 
                    'age' => 4, 
                    'weight' => '15kg'
                );

$lionA = new Lion($arrayInfo);

echo '<pre>';
print_r($lionA);
echo '</pre>';

echo $lionA->showInfo();
