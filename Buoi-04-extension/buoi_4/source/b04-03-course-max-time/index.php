<?php
    $zend = array(
                    'php'=>127,
                    'zend'=>20,
                    'html'=>32,
                    'type'=>12,
                    'javascript'=>150
    );

    // In ra khóa học có thời lượng video nhiều nhất
//php - 127

$max = max ($zend);
$key = array_search ($max,$zend);
echo $key . " - " . $max;