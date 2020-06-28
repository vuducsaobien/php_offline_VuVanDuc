<?php
$input  = "D:/GoogleDrive/Doing/__psd/luutruonghailan/youtube-luutruonghailan-tamsu.psd";
$input1  = "D:/GoogleDrive/Doing/__psd/luutruonghailan/youtube-luutruonghailan-tamsu.psd";

function getInfo01($input) {
    $info = explode ('/', $input);
    $result = $info[count($info)-1];
    return $result;
}
echo getInfo01($input) . "<br/>";


function getInfo01($input1) {
    $info1 = explode ('.', $input1);
    $result1 = $info1[count($info1)-1];
    return $result1;
}
echo getInfo01($input1);
?>