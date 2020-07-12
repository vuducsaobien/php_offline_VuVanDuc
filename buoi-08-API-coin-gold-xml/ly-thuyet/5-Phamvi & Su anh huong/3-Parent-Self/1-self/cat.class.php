<?php
class Cat{
    // 1
    //Properties
    public $name;
    public $color;
    public $age;
    public $weight;
    // public $maxSpeed = '20km/h'; // 1
    static public $maxSpeed = '20km/h'; // 2

    //Methods

    //Methods Construct
    //Cách 3: __construct() với tham số mặc định
    // $catB = new Cat();
    public function __construct($name = 'Doraemon', $color = 'blue', $age = 10, $weight = '2kg'){
        $this->name     = $name;
        $this->color    = $color;
        $this->age      = $age;
        $this->weight   = $weight;
    }

    public function showInfo(){
        echo '<br>Name: ' . $this->name;
        echo '<br>Color: ' . $this->color;
        echo '<br>Age: ' . $this->age;
        echo '<br>Weight: ' . $this->weight;
        // echo '<br>max Speed: ' . $this->maxSpeed; // 1
        echo '<br>max Speed self: ' . self::$maxSpeed; // 2 Cách 1
        echo '<br>max Speed $this: ' . $this::$maxSpeed; // 2 Cách 2
        echo '<br>max Speed Class: ' . Cat::$maxSpeed; // 2 Cách 3


    }
}
