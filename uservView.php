<?php
session_start();
include "config.php";
if($_SESSION['ss_login'] != session_id() or $_SESSION['UserName']==['UserName'] ){
    echo "<script>alert('กรุณาลงชื่อเข้าสู่ระบบก่อน');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
    exit();
    
$sql = "select * from user  ORDER BY UserTel ";
							  
$query = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($query);
    
       if($array['UserSex']=="1"){
                $sex="ชาย";
            }else{
                $sex="หญิง";
            }
}
?>
<?php
if ($_GET['mode'] == "") {
    $mode = "add";
    $id1 = "Select Max(substr(UserTel,-8))+1 as MaxID from user";
    $id2 = mysqli_query($connect, $id1);
   
} else {
    $mode = "edit";
    $sql = "select * from user where UserTel='".$_GET['UserTel']."'";
    $query = mysqli_query($connect, $sql);
    $array = mysqli_fetch_array($query);
    $autoid=$array['UserTel'];
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
	<body>
		<div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                  <a class="navbar-brand" href="index.php"><h4> TRAVEL IN KHONKEAN</h4></a>
				<a></a>
            </div>

            
        </nav>

</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> ข้อมูลผู้ใช้</h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal"  action="usersave.php"  id="myform" method="post" enctype="multipart/form-data">
							
                            <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
                                <div class="col-sm-4">
                                    <input type="tel"  placeholder="กรุณากรอกเบอร์โทร" name="UserTel" class="form-control numbersOnly"  maxlength="10" value="<?=$array['UserTel']?>"  required>
                                </div>
                            </div>
							
							 <div class="form-group">
                                <label  class="col-sm-2 control-label">รูปภาพ</label>
                                <div class="col-sm-4">
    
                                 
                                  <input type="file" name="'UserImg"><br>
	                             
                                </div>
                            </div>
							
							 <div class="form-group">
                                <label  class="col-sm-2 control-label">อีเมล์</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกอีเมล์" name="UserEMail"  class="form-control" value="<?=$array['UserEMail']?>" autofocus required>
                                </div>
                            </div>
							 <div class="form-group">
                                <label  class="col-sm-2 control-label">ชื่อผู้ใช้ระบบ</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกชื่อผู้ใช้ระบบ" name="UserName"  class="form-control" value="<?=$array['UserName']?>" autofocus required>
                                </div>
                            </div>
							 <div class="form-group">
                                <label  class="col-sm-2 control-label">รหัสผ่าน</label>
                                <div class="col-sm-4">
                                    <input type="text"  maxlength="10" placeholder="กรุณากรอกรหัส" name="UsePassword"  class="form-control" value="<?=$array['UsePassword']?>" autofocus required>
                                </div>
                            </div>
							
							 <div class="form-group">
                                <label  class="col-sm-2 control-label">ชื่อจริง</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="ชื่อจริง" name="UseFull"  class="form-control" value="<?=$array['UseFull']?>" autofocus required>
                                </div>
                            </div>
							 <div class="form-group">
                                <label  class="col-sm-2 control-label">นามสกุล</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกนามสกุล" name="UseLast"  class="form-control" value="<?=$array['UseLast']?>" autofocus required>
                                </div>
                            </div>
							 <div class="form-group">
                                <label class="control-label col-sm-2">เพศ</label>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="UserSex" value="1" <?php if($array['UserSex']=="1"){echo "checked" ;} ?> >ชาย
                                            </label>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="UserSex" value="2" <?php if($array['UserSex']=="2"){echo "checked" ;} ?> >หญิง
                                            </label>
                                        </div>
                                    </div>
</div></div>
 

							 <div class="form-group">
                                <label  class="col-sm-2 control-label">วันเกิด</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกวันเกิด" name="UerBDay"  class="form-control" value="<?=$array['UerBDay']?>" autofocus required>
                                </div>
                            </div>
						
							 <!-- ส่วนเมนูคำสั่ง ย้อนกลับ บันทึก Reset -->
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <input type="hidden" name="mode" value="<?= $mode ?>">
                                    <a type="reset" class="btn btn-danger" href="user.php">ยกเลิก</a>
                                    <button type="reset" class="btn btn-success">Reset</button>
                                    <button type="submit"  class="btn btn-primary "  >บันทึก</button>
                                </div>
                            </div>
                        </form> <!-- /form -->
                    </div>
                </div> <!-- ./container -->
            </div>
        </div>
    </div>
    
</div><!--/row-->
		    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- Morris Chart Js -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>