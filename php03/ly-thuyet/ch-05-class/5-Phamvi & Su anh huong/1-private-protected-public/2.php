<?php
/*
    private: Chỉ sử dụng được ở chính Class đó
    protected: Chỉ sử dụng được ở Class đó & Các Class được kế thừa từ Class đó
    public: Truy cập từ mọi nơi
*/
class Sample {
    private $a = 'A';
    protected $b = 'B';
    public $c = 'C';

    public function showInfo(){
        echo '<br>TRUY CAP TRONG LOP' ;
        echo '<br>private $a: ' . $this->a;
        echo '<br>protected $b: ' . $this->b;
        echo '<br>public $c: ' . $this->c;
        echo '<hr>';
    }
}

class Sample2 extends Sample {
    public function showInfo(){
        echo '<br>TRUY CAP TRONG LOP CON' ;
        echo '<br>private $a: ' . $this->a;
        echo '<br>protected $b: ' . $this->b;
        echo '<br>public $c: ' . $this->c;
        echo '<hr>';
    }
}


$sample = new Sample();
$sample -> showInfo();

$sample2 = new Sample2();
$sample2 -> showInfo();
