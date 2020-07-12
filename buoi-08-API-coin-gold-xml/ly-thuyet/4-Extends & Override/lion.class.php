<?php
require_once 'cat.class.php';

class Lion extends Cat{
    public $height = '1m2';

    public function showInfo(){
        echo '<br>Name: ' . $this->name;
        echo '<br>Color: ' . $this->color;
        echo '<br>Age: ' . $this->age;
        echo '<br>Weight: ' . $this->weight;
        echo '<br>Height: ' . $this->height;
        echo '<hr>';
    }
}
