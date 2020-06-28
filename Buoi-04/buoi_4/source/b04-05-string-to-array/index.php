<?php
    $str = "php/127/typescript/12/jquery/120/angular/50";
    /*
     * Array
     *  (
     *      [php]           => 127
     *      [typescript]    => 12
     *      [jquery]        => 120
     *      [angular]       => 50
     *  )
     *  
     */

$list       = explode("/",$str);
echo "<pre>";
print_r($list);
echo "</pre>";
echo $list[0];


$result = array();

for ($i = 0; $i <count($list); $i+=2){
    $result[ $list[$i] ] = $list[$i+1];
}

echo "<pre>";
print_r($result);
echo "</pre>";
