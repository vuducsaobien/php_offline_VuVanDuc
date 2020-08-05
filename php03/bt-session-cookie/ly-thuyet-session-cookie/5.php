<?php    
    //Session_encode ; decode
    session_start();
    $_SESSION['course'] = 'PHP progame';
    $_SESSION['info']   = array(
                            'teacher' => 'ZendVN',
                            'time'    => 100,
                        );
    echo $session = session_encode(); // Lưu mảng $_SESSION thành 1 chuỗi
    session_unset();
    session_decode($session); // 1 chuỗi $_SESSION thành 1 mảng              

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
