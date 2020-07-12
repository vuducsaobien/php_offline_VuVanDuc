<?php
class Cat{

    //Properties
    public $name;
    public $color;
    public $age;
    public $weight;
    static $maxSpeed = '20km/h';


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

            //self ; Cat
        echo '<br>maxSpeed - self: ' . self::$maxSpeed;
        echo '<br>maxSpeed - Cat: ' . Cat::$maxSpeed;
        
        echo '<hr>';
    }
}
