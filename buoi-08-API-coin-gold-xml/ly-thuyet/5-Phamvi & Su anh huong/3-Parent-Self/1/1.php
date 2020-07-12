<?php
require_once 'cat.class.php';

$cat = new Cat('Tom', 'blue', 5, '3kg');
$cat->showInfo();

echo '<pre>';
print_r($cat);
echo '</pre>';