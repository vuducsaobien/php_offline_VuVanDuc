<?php
require_once 'lion.class.php';

$lion = new lion('Lion A', 'yellow', 3, '25kg');
$lion->showInfo();

echo '<pre>';
print_r($lion);
echo '</pre>';