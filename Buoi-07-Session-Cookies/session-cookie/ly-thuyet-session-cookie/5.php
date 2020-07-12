<?php    
    //Session_encode ; decode
    session_start();
    $_SESSION['course'] = 'PHP progame';
    $_SESSION['info']   = array(
                            'teacher' => 'ZendVN',
                            'time'    => 100,
                        );
    echo $session = session_encode(); 
    session_unset();
    session_decode($session);                  

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
