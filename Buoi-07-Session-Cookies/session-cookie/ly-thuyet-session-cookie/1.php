<?php
    session_start();
    // String Session
    $variable = 'A string';
    $_SESSION['variable'] = $variable;

    // Array Session
    // session_start();
    $array = array (
                    array('course' => 'Joomla' , 'time' => 80),
                    array('course' => 'Zend' , 'time' => 100),
                    array('course' => 'jQuery' , 'time' => 120)
    );    
    $_SESSION['array'] = $array;

    // Functions Session
    // session_start();
    $_SESSION['function'] = '<?php 
                            function checkNumber($number){
                                return ($number % 2 == 0) ? "Số chẵn" : "Số lẻ";
                            }
                            ?>';

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    eval ('?>' . $_SESSION['function']);
    echo checkNumber(3);
