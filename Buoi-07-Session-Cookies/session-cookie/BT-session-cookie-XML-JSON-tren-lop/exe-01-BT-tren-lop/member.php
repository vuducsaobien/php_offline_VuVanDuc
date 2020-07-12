<?php
session_start();
echo '<h3>Xin chào: MEMBER '.$_SESSION['fullName'].'</h3>';
echo '<a href="logout.php">Đăng xuất</a>';
