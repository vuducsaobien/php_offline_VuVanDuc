<?php
    $input = '65';
    $strID = "78,60,62,68, 69,68,73,85,66, 69, 65, 74,63,67,65,64,68,73,75,69,73,169";
//3
$info = explode(",",$strID);
echo "<pre>";
print_r($info);
echo "</pre>";
$result = 0;


for ($i = 0; $i < count($info); $i++ ){
    if ( $input == $info[$i] ){
        $result = ++$result;
    }
}
echo $result;