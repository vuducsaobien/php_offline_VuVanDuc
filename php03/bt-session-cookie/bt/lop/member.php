<?php
    session_start();
    require_once 'define.php';
    $timeoutXML = simplexml_load_file(DIR_DATA . 'timeout.xml');
    
    if( time() < $_SESSION['timeout'] + $timeoutXML -> time ){

        echo 
        '<h3>Xin chào: MEMBER '.$_SESSION['fullName'].'</h3>
        Bạn có '.$timeoutXML -> time.'s để hoạt động!<br>
        <a href="logout.php">Đăng xuất</a>';

    } else {
        session_unset();
        header('location: login.php');
    }
