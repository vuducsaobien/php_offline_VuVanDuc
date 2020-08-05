<?php
// 4 function showInfo(){
// class Sample{
//     static $a = 1000;

//     function showInfo(){
//         echo '<h3>showInfo</h3>';
//     }
// }

// 4
// Cách: 1
// $sample = new Sample();
// echo 'Static $a: ' . Sample::$a;
// $sample->showInfo();

// Cách: 2: Hãy dùng !!
// echo 'Static $a: ' . Sample::$a;
// Sample::showInfo();



// 5 STATIC function showInfo(){ NÊN DÙNG !!
class Sample{
    static $a = 1000;

    STATIC function showInfo(){
        echo '<h3>showInfo</h3>';
    }
}

// 5 
// Cách: 1
// $sample = new Sample();
// echo 'Static $a: ' . Sample::$a;
// $sample->showInfo();

// Cách: 2: Hãy dùng !!
echo 'Static $a: ' . Sample::$a;
Sample::showInfo();

