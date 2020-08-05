<?php
require_once 'cat.class.php';
// 1
// class Lion extends Cat{

// }


// 2
class Lion extends Cat{

public $height = '1m3';
public function getHeight(){
    return $this->height;
}

public function showInfo(){
    echo '<br>Name: ' . $this->name;
    echo '<br>Color: ' . $this->color;
    echo '<br>Age: ' . $this->age;
    echo '<br>Weight: ' . $this->weight;
    echo '<br>Height: ' . $this->getHeight();
    echo '<hr>';
}
}

