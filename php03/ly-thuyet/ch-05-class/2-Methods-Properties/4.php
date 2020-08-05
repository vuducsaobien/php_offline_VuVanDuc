<?php
require_once '4.cat.class.php';
// catA
$catA = new Cat();

$catA->setName('Tom');
$catA->setColor('blue');
$catA->showInfo();

// catB
$catB = new Cat();

$catB->setName('Kitty');
$catB->setColor('pink');
$catB->setAge(3);
$catB->showInfo();
