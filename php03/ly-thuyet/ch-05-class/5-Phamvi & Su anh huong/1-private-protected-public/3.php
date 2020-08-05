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

}

$sample = new Sample();

// 1
// echo '<br>TRUY CAP NGOAI LOP' ;
// echo '<br>private $a: ' . $sample->a;

// 2
// echo '<br>TRUY CAP NGOAI LOP' ;
// echo '<br>protected $b: ' . $sample->b;

// 3
echo '<br>TRUY CAP NGOAI LOP' ;
echo '<br>public $c: ' . $sample->c;
