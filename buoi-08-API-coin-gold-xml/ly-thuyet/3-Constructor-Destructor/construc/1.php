<?php
require_once '1.cat.class.php';
// catA
// $catB = new Cat();
// $catA = new Cat('Tom', 'pink', 3);

//Cách 5: __construct() với tham số là mảng
$arrayCatA = array (
                'name'   => 'Tom',
                'color'  => 'blue',
                'age'    => '2',
                'weight' => '5kg',
            );
$catA = new Cat($arrayCatA);

$catA->showInfo();
// $catB->showInfo();