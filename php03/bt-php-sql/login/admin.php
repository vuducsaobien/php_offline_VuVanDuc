<?php
session_start();
require_once 'define.php';
$timeoutXML = simplexml_load_file(DIR_DATA . 'timeout.xml');

if( time() < $_SESSION['timeout'] + $timeoutXML -> time ){

    // Lỗi không tìm thấy $_SESSION['fullName']
    if (isset($_SESSION['fullName'])){

        // Nếu Admin đã cập nhật timeout mới.
        if(isset($_POST['timeout'])){

        $timeoutXML->time = $_POST['timeout']; //Cập nhật timeout mới ??
        file_put_contents(DIR_DATA . 'timeout.xml', $timeoutXML->saveXML());  //Lưu File XML saveXML()
        
        echo 
        '<h3>Xin chào: ADMIN '.$_SESSION['fullName'].'</h3>
        Bạn có '.$timeoutXML-> time.'s để hoạt động!<br>
        <a href="logout.php">Đăng xuất</a>

        <form action="#" method="post" name="">
            <div class="row">
                <p>Username</p>
                <input type="text" name="timeout" value='.$timeoutXML -> time.' />
                <button type="submit">Save</button>
            </div>
        </form>';


    } else {
        echo 
        '<h3>Xin chào: ADMIN '.$_SESSION['fullName'].'</h3>
        Bạn có '.$timeoutXML-> time.'s để hoạt động!<br>
        <a href="logout.php">Đăng xuất</a>
    
        <form action="#" method="post" name="">
            <div class="row">
                <p>Username</p>
                <input type="text" name="timeout" value='.$timeoutXML -> time.' />
                <button type="submit">Save</button>
            </div>
        </form>';
        }

    } else {
        session_unset();
        header('location: login.php');
    }
} else {
session_unset();
header('location: login.php');
}