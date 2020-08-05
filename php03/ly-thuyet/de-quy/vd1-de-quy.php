<?php
function giaithua($number){
    $result = 1;
    if ($number > 1){
        $result = $number * giaithua($number -1);
    }
    return $result;
}

echo giaithua(3);
?>