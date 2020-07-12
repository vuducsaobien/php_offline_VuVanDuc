<?php
// 4
// session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';


// 5
session_start();
if(isset($_SESSION['userA'])){
    $userA = unserialize($_SESSION['userA']);
    echo '<pre>';
    print_r($userA);
    echo '</pre>';
}

?>
