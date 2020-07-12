<?php
require_once 'lion.class.php';
// 1 2
$arrayInfo = array('name' => 'Lion A', 
                    'color' => 'yellow', 
                    'age' => 4, 
                    'weight' => '15kg'
                );
$lionA = new Lion($arrayInfo);

echo '<pre>';
print_r($lionA);
echo '</pre>';

echo $lionA->name . '<br>';
echo $lionA->showInfo();
