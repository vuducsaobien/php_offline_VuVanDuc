<?php
class Sample {
    public $a = 'A';
    protected $b = 'B';
    private $c = 'C';

    public function showInfo(){
        echo '<br>TRUY CAP TRONG LOP' ;
        echo '<br>public $a: ' . $this->a;
        echo '<br>protected $b: ' . $this->b;
        echo '<br>private $c: ' . $this->c;
        echo '<hr>';
    }
}

class Sample2 extends Sample {
    public function showInfo(){
        echo '<br>TRUY CAP TRONG LOP CON' ;
        echo '<br>public $a: ' . $this->a;
        echo '<br>protected $b: ' . $this->b;
        echo '<br>private $c: ' . $this->c;
        echo '<hr>';
    }
}


$sample = new Sample();
$sample -> showInfo();

$sample2 = new Sample2();
$sample2 -> showInfo();


echo '<br>TRUY CAP NGOAI LOP' ;
echo '<br>public $a: ' . $sample->a;
echo '<br>protected $b: ' . $sample->b;
echo '<br>private $c: ' . $sample->c;
echo '<hr>';
