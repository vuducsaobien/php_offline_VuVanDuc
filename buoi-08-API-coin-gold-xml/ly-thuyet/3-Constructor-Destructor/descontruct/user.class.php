<?php
class User {
    //Properties
    // 1 2
    // private $name     = '';
    // private $pass     = '';
    // private $fullName = '';

    // public function __construct(){
    //     echo __METHOD__;
    // }

    // public function __destruct(){
    //     echo __METHOD__;
    // }

    // 3 4 5 
    private $name     = '';
    private $pass     = '';
    private $fullName = '';

    public function __construct(){
        $this->name = 'Đức';
        $this->pass = 123;
        $this->fullName = 'Văn Đức';
    }

    public function __destruct(){
    $_SESSION['userA'] = serialize($this);
    // serialize($this) chuyển thành 1 chuỗi đặc biệt
    }

}
?>
