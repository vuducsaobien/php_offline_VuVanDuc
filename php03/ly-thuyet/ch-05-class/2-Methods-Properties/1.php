<?php

class Cat{

//Properties
public $name = 'Tom';
public $color = 'blue';
public $age = 1;
}

// catA
$catA = new Cat();
echo '<br>Name: ' . $catA->name;
echo '<br>Color: ' . $catA->color;
echo '<br>Age: ' . $catA->age;

echo '<hr>';
echo '<pre>';
print_r($catA);
echo '</pre>';