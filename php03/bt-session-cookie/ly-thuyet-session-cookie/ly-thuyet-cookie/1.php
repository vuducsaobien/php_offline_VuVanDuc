<?php
// echo 'Hello';
    
    // setcookie('name');
    // echo '<pre>';
    // print_r($_COOKIE);
    // echo '</pre>';
    if(isset($_COOKIE['lastLogin']) ){
        $time = $_COOKIE['lastLogin'];
        echo 'Last Login:' . date('d/m/y H:i:s', $time);
        setcookie('lastLogin', time());
    }else{
        setcookie('lastLogin', time(), time() +3600);
    }
?>