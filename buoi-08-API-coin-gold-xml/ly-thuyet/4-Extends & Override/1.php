<?php
require_once 'lion.class.php';
$arrayInfo = array('name' => 'LionA', 'color' => 'yellow', 'age' => 4, 'weight' => '15kg');

$lionA = new Lion($arrayInfo);

echo '<pre>';
print_r($lionA);
echo '</pre>';

echo $lionA->showInfo();
