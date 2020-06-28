<?php
    $height = 5;
    $character = "+";

    function printCharacter($length) {
        for ($i = 1; $i <= $length; $i++) {
            echo "+" . " ";
        }
    }

    //bootstrap template login form

    //require_once //goi ham ra

    for ($j = 1; $j <= 3; $j++) {
        printCharacter($j);
        echo '<br/>';
    }
?>