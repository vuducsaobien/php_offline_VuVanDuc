<?php
class Cat{

    //Properties
    public $name;
    public $color;
    public $age;

    //Methods
    //Methods set
    public function setName($value){
        $this->name = $value;
    }

    public function setColor($value){
        $this->color = $value;
    }

    public function setAge($value){
        $this->age = $value;
    }

    //Methods get
    public function getName(){
        return $this->name;
    }

    public function getColor(){
        return $this->color;
    }

    public function getAge(){
        return $this->age;
    }

    public function showInfo(){
        echo '<br>Name: ' . $this->name;
        echo '<br>Color: ' . $this->getColor();
        echo '<br>Age: ' . $this->getAge();
        echo '<hr>';
    }
}
