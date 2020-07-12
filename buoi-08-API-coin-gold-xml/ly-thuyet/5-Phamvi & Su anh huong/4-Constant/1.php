<?php
// 1
// class Sample{
//     const money = 1000;
//     public $money = 'This is a test';
// }

// $sample = new Sample();
// echo $sample->money . '<br>';  // => This is a test.
// echo $sample::money . '<br>';  // => 1000.
// echo Sample::money;            // => 1000.


// 2
class Sample{
    const money = 1000;

    public function showInfo(){
        echo '<h2>C1: ' . Sample::money . '</h2>';    //  C1: 1000
        echo '<h2>C2: ' . self::money . '</h2>';      //  C2: 1000
        echo '<h2>C3: ' . $this::money . '</h2>';     //  C3: 1000
    }
}

$sample = new Sample();
echo $sample -> showInfo();

