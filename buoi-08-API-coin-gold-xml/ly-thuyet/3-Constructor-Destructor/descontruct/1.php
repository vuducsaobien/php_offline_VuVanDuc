<?php
session_start();
require_once 'user.class.php';

$userA = new User();

echo '<pre>';
print_r($userA);
echo '</pre>';

?>
