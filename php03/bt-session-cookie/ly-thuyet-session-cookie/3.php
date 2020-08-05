<?php
    // Lưu 1 hình ảnh vào SESSION
    session_start();
    $image = 'nc4.jpeg';

    if (file_exists($image)){
        echo 'File exists';
        $_SESSION['image']['info'] = getimagesize ($image);
        $_SESSION['image']['data'] = file_get_contents($image);
        header('Content-type: image/jpeg');
        echo $_SESSION['image']['data'];
    } else {
        echo 'File not exists';
    }
   
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre>';

