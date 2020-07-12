<?php
require_once '1.cat.class.php';
// catA
$arrayCatA = array (
                'name'   => 'Tom',
                'color'  => 'blue',
                'age'    => '2',
                'weight' => '5kg',
            );
$catA = new Cat($arrayCatA);
$catA->showInfo();

// $catB = new Cat();
// $catB->showInfo();