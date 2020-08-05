<?php
class Cat{

    //Properties
    public $name;
    public $color;
    public $age;
    public $weight;
    // static public $maxSpeed = '20km/h'; // 1
    /* - Static ở Properties ở lớp Cha (Cat) thì KHÔNG THỂ Override lên thuộc tính 
    Properties ở lớp Con (Lion)
       - Đối với Properties KHÔNG có khóa STATIC thì dùng SELF là KHÔNG ĐƯỢC
     */
    public $maxSpeed = '20km/h'; // 2
    //Methods
    //Methods Construct
    public function __construct($name = 'Doraemon', 
                                $color = 'blue', 
                                $age = 10, 
                                $weight = '2kg'
                                ){
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
        // echo '<br>max Speed self: ' . self::$maxSpeed; // 1 Cách 1
        // echo '<br>max Speed $this: ' . $this::$maxSpeed; // 1 Cách 2
        // echo '<br>max Speed Class: ' . Lion::$maxSpeed; // 1 Cách 3
        // echo '<br>max Speed Class: ' . Cat::$maxSpeed; // 1 Không hiển thị được

        // echo '<br>max Speed self: ' . self::$maxSpeed; // 2 Không sử dụng được
        echo '<br>max Speed $this: ' . $this->maxSpeed; // 2
    }

}
