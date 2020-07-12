<?php
require_once 'cat.class.php';

class Lion extends Cat{
    public $maxSpeed = '50km/h';

    public function showInfo(){

        //             1
        // echo '<br>Name: ' . $this->name;
        // echo '<br>Color: ' . $this->color;
        // echo '<br>Age: ' . $this->age;
        // echo '<br>Weight: ' . $this->weight;
        // echo '<br>maxSpeed: ' . $this->maxSpeed;
        // Thay =                            parent::showInfo();

        //             2
        echo '<br>Name: ' . parent::getName();
        echo '<br>Color: ' . parent::getColor();
        echo '<br>Age: ' . parent::getAge();
        echo '<br>Weight: ' . parent::getWeight();
        echo '<br>maxSpeed: ' . $this->maxSpeed;
        echo '<br>Them Lion';
        echo '<hr>';
    }

}

