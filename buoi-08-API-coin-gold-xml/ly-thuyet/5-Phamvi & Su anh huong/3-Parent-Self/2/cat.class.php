<?php
class Cat{

    //Properties
    public $name;
    public $color;
    public $age;
    public $weight;

    // Static ở cat thì ở con lion ko hiển thị được
    // static $maxSpeed = '20km/h';
    public $maxSpeed = '20km/h';


    //Methods

    //Methods Construct
    public function __construct($name = 'Doraemon', $color = 'blue', $age = 10, $weight = '2kg'){
        $this->name     = $name;
        $this->color    = $color;
        $this->age      = $age;
        $this->weight   = $weight;
    }

    public function getName(){
        return $this->name;
    }

    public function getColor(){
        return $this->color;
    }

    public function getAge(){
        return $this->age;
    }

    public function getWeight(){
        return $this->weight;
    }


    public function showInfo(){
        echo '<br>Name: ' . $this->name;
        echo '<br>Color: ' . $this->color;
        echo '<br>Age: ' . $this->age;
        echo '<br>Weight: ' . $this->weight;

        echo '<br>maxSpeed: ' . $this->maxSpeed;
        //echo '<br>maxSpeed - Cat: ' . Cat::$maxSpeed;
    }
}
