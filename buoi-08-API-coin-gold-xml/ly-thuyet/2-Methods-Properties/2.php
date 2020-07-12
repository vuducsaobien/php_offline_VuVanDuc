<?php
class Cat{

    //Properties
    public $name;
    public $color;
    public $age;

    //Methods
    public function setName($value){
        $this->name = $value;
    }

    public function setColor($value){
        $this->color = $value;
    }

    public function getName(){
        return $this->name;
    }

    public function getColor(){
        return $this->color;
    }

}


// catA
$catA = new Cat();

$catA->setName('Tom');
echo '<br>Name: ' . $catA->getName();

$catA->setColor('blue');
echo '<br>Color: ' . $catA->color;

echo '<pre>';
print_r($catA);
echo '</pre>';
echo '<hr>';
