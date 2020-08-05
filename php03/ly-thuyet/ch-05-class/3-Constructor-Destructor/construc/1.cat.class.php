<?php
class Cat{

    //Properties
    public $name;
    public $color;
    public $age;

    //Methods

                            //Methods Construct
    //Cách 1: Gọi ngay từ đầu cùng với __construct()

    //  $catA = new Cat();
    // public function __construct(){
    //     $this->name = 'Tom';
    //     $this->color = 'pink';
    //     $this->age = 2;
    // }
    

    //Cách 2: __construct() với tham số

    // $catA = new Cat('Tom', 'pink', 3;
    // public function __construct($name, $color, $age){
    //     $this->name  = $name;
    //     $this->color = $color;
    //     $this->age   = $age;
    // }
    

    //Cách 3: __construct() với tham số mặc định
    
    //  $catB = new Cat();
    // public function __construct($name = 'Doraemon', $color = 'blue', $age = 10){
    //     $this->name  = $name;
    //     $this->color = $color;
    //     $this->age   = $age;
    // }
    

    //Cách 4: __construct() với cách đặt tên trùng với tên class 'Cat'

    // $catB = new Cat();
    // public function Cat($name = 'Doraemon', $color = 'blue', $age = 10){
    //     $this->name  = $name;
    //     $this->color = $color;
    //     $this->age   = $age;
    // }
    

    //Cách 5: __construct() với tham số là mảng
    public function __construct($arrayInfo){
        $this->name   = $arrayInfo['name'];
        $this->color  = $arrayInfo['color'];
        $this->age    = $arrayInfo['age'];
        $this->weight = $arrayInfo['weight'];
    }

                    //Methods set
    // public function setName($value){
    //     $this->name = $value;
    // }

    // public function setColor($value){
    //     $this->color = $value;
    // }

    // public function setAge($value){
    //     $this->age = $value;
    // }

    // public function setWeight($value){
    //     $this->weight = $value;
    // }

                //Methods get
    // public function getName(){
    //     return $this->name;
    // }

    // public function getColor(){
    //     return $this->color;
    // }

    // public function getAge(){
    //     return $this->age;
    // }

    // public function getWeight(){
    //     return $this->weight;
    // }

    public function showInfo(){
        echo '<br>Name: ' . $this->name;
        echo '<br>Color: ' . $this->color;
        echo '<br>Age: ' . $this->age;
        echo '<br>Weight: ' . $this->weight;
        echo '<hr>';
    }
}
