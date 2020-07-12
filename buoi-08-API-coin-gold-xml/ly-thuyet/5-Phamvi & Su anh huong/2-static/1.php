<?php

class Sample{
    static $a = 1000;

    static function showInfo(){
        echo '<h3>showInfo</h3>';
    }
}

echo Sample::$a;
Sample::showInfo();

/* Cách 1: bình thường ko có static (public function);
                            class Sample{
                            public $a = 1000;

                            public function showInfo(){
                                echo '<h3>showInfo</h3>';
                            }

                        $sample = new Sample();
                        echo $sample->a;
                        $sample->showInfo();
*/

/*Cách 2: STATIC public
                            class Sample{
                            static $a = 1000;

                            static function showInfo(){
                                echo '<h3>showInfo</h3>';
                            }

                        echo Sample::$a;
                        Sample::showInfo();
*/


