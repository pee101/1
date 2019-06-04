<?php
session_start();
include "config.php";
if($_POST['mode']=="add"){
 
  if(move_uploaded_file($_FILES["'UserImg"]["tmp_name"],"img/".$_FILES["'UserImg"]["name"]))
	{
		echo "Copy/Upload Complete<br>";

		//*** Insert Record ***//
	
$sql = "insert into user(UserTel,UserImg,UserEMail ,UserName,UsePassword,UseFull,UseLast,UserSex,UerBDay) 
values('" . $_POST['UserTel'] . "','" .$_FILES["'UserImg"]["name"]."','" . $_POST['UserEMail'] . "'". ",'" . $_POST['UserName'] . "','" . $_POST['UsePassword'] . "','" . $_POST['UseFull'] . "','" . $_POST['UseLast'] . "','" . $_POST['UserSex'] . "','" . $_POST['UerBDay'] . "')";
$query = mysqli_query($connect, $sql);
echo "<META http-equiv='refresh' Content='0; URL=user.php'> ";
	}
	
	


 }elseif($_POST['mode']=="edit"){
  if(move_uploaded_file($_FILES["'UserImg"]["tmp_name"],"img/".$_FILES["'UserImg"]["name"]))
	{ 
    if ($_FILES["'UserImg"]["tmp_name"]!="") //มีการอัพรูป
    echo "Copy/Upload Complete<br>";
    $sql = "update  user set UserImg='".$_FILES["'UserImg"]["tmp_name"]. "',UserEMail='" . $_POST['UserEMail'] . "',UserName='" . $_POST['UserName'] . "',UsePassword='" . $_POST['UsePassword'] . "',UseFull='" . $_POST['UseFull'] . "',UseLast='" . $_POST['UseLast'] . "',UserSex='" . $_POST['UserSex'] . "',UerBDay='" . $_POST['UerBDay'] . "' where UserTel='" . $_POST['UserTel'] . "'";
  
      $query = mysqli_query($connect, $sql);
     echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
      echo "<META http-equiv='refresh' Content='0; URL=user.php'> ";


  }else{ //ไม่มี

    $sql = "update  user set UserEMail= '". $_POST['UserEMail']. "',UserName='" . $_POST['UserName'] . "',UsePassword='" . $_POST['UsePassword'] . "',UseFull='" . $_POST['UseFull'] . "',UseLast='" . $_POST['UseLast'] . "',UserSex='" . $_POST['UserSex'] . "',UerBDay='" . $_POST['UerBDay'] . "' where UserTel='" . $_POST['UserTel'] . "'";
  
    $query = mysqli_query($connect, $sql);
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<META http-equiv='refresh' Content='0; URL=user.php'> ";


  }
  
  
}elseif($_GET['mode']=="delete"){
    
    $sql = "delete from user  where UserTel='". $_GET['UserTel'] . "'";
    $query = mysqli_query($connect, $sql);
    echo "<META http-equiv='refresh' Content='0; URL=user.php'> ";
    }
    
    
?>