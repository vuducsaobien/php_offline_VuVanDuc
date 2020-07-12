<?php
require_once 'define.php';
session_start();

echo '<h3>Xin chào: ADMIN '.$_SESSION['fullName'].'</h3>';
echo '<a href="logout.php">Đăng xuất</a>';
$timeoutXML = simplexml_load_file(DIR_DATA . 'timeout.xml');

if(isset($_POST['timeout'])){
$timeoutXML->time = $_POST['timeout'];
file_put_contents(DIR_DATA . 'timeout.xml', $timeoutXML->saveXML());  //Lưu File XML saveXML()
}
?>

<form action="#" method="post" name="">
    <div class="row">
        <p>Username</p>
        <input type="text" name="timeout" value="<?php echo  $timeoutXML -> time ?>" />
        <button type="submit">Save</button>
    </div>
</form>

