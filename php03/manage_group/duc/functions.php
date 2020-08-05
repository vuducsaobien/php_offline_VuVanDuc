<?php
// Kiểm tra dữ liệu khác rỗng ?
function checkEmpty($value){
    $flag = false; 
    if (!isset ($value) || trim($value) == "" ){
        $flag = true;
    }
    return $flag;
}

// Kiểm tra chiều dài min max của dữ liệu ?
function checkLength($value, $min, $max){
    $flag   = false;
    $length = strlen($value); 
    if ($length < $min || $length > $max){
        $flag = true;
    }
    return $flag;
}

// Random file name
function randomString($fileName, $length = 5){
    $ext            = pathinfo($fileName, PATHINFO_EXTENSION);
    $arrCharacter   = array_merge(range('A','Z'), range('a','z'), range(0,9));
    $arrCharacter   = implode($arrCharacter, '');
    $arrCharacter   = str_shuffle($arrCharacter);
    $result		    = substr($arrCharacter, 0, $length) . '.' . $ext;
    return $result;
}

// echo '<pre>';
// print_r($data);
// echo '</pre>';
    
// Size
function convertSize($size, $totalDigit = 2, $ditance = ' '){
    $units	= array('B', 'KB', 'MB', 'GB', 'TB');

    $length	= count($units);
    for($i = 0; $i < $length; $i++){
        if($size > 1024) {
            $size	= $size / 1024;
        }else {
            $unit	= $units[$i];
            break;
        }
    }

    $result = round($size, $totalDigit) . $ditance . $unit;
    return $result;
}

// Check file size
function checkSize($size, $min, $max){
    $flag = false;
    if($size >= $min && $size <= $max) $flag = true;
    return $flag;
}

// Check file extensions
function checkExtension($fileName, $arrExtension){
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $flag = false;
    if(in_array(strtolower($ext), $arrExtension)==true)
    $flag = true;
    return $flag;
}
