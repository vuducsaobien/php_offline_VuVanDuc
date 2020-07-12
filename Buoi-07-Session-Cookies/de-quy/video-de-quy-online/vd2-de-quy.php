<?php
function tong($number){
    $result = 0;
    if ($number >= 1){
        $result = tong($number - 1) + $number;
    }
    return $result;
}

echo tong(5);
?>