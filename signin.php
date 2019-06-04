<?php
session_start();

include "config.php";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select * from user where UserName='".$username."' and UsePassword ='".$password."' ";
$query = mysqli_query($connect, $sql);
$row = mysqli_num_rows($query);
if ($row == 0) {
   echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
   echo "<meta http-equiv='refresh' content='0;URL=login.php' />";
} else {
    $data = mysqli_fetch_array($query);
    $_SESSION['ss_login'] = session_id();
    $_SESSION['ss_UserName'] = $data['UserName'];
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}
?>