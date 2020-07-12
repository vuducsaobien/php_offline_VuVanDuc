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

    public function setAge($value){
        $this->age = $value;
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

// catB
$catB = new Cat();

$catB->setName('Kitty');
echo '<br>Name: ' . $catB->getName();

$catB->setColor('pink');
echo '<br>Color: ' . $catB->color;

$catB->setAge(3);
echo '<br>Age: ' . $catB->age;

echo '<pre>';
print_r($catB);
echo '</pre>';
echo '<hr>';
