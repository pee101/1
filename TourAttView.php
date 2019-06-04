<?php
session_start();
include "config.php";
if($_SESSION['ss_login'] != session_id() or $_SESSION['UserName']==['UserName'] ){
    echo "<script>alert('กรุณาลงชื่อเข้าสู่ระบบก่อน');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
    exit();
    
$sql = "select * from touratt  ORDER BY TourAttID ";
							  
$query = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($query);
}
?>
<?php
if ($_GET['mode'] == "") {
    $mode = "add";
    $id1 = "Select Max(substr(TourAttID,-8))+1 as MaxID from touratt";
    $id2 = mysqli_query($connect, $id1);
   
} else {
    $mode = "edit";
    $sql = "select * from touratt where TourAttID='".$_GET['TourAttID']."'";
    $query = mysqli_query($connect, $sql);
    $array = mysqli_fetch_array($query);
    $autoid=$array['TourAttID'];
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travelinkk</title>
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
                <h2><i class="glyphicon glyphicon-star-empty"></i> เพิ่มข้อมูลสถานที่ท่องเที่ยว</h2>
            </div>
            <div class="box col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal"  action="usersave.php"  id="myform" method="post" enctype="multipart/form-data">
                     <div class="col-lg-6"> <!-- แบ่งซ้ายขวา  -->
                            <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">รหัส</label>
                                <div class="col-sm-4">
                                    <input type="tel"  placeholder="กรุณากรอกรหัส" name="TourAttID" class="form-control numbersOnly"  maxlength="10" value="<?=$array['TourAttID']?>"  required>
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label  class="col-sm-3 control-label">ชื่อสถานที่ท่องเที่ยว</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกชื่อสถานที่ท่องเที่ยว" name="TourAttName"  class="form-control" value="<?=$array['TourAttName']?>" autofocus required>
                                </div>
                            </div>
							 

							 <div class="form-group">
                                <label  class="col-sm-3 control-label">ชื่อสถานที่ท่องเที่ยวEng.</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกชื่อสถานที่ท่องเที่ยวEng" name="TourAttNameEng"  class="form-control" value="<?=$array['TourAttNameEng']?>" autofocus required>
                                    
                                
                                </div>
                            </div>
							
							 <div class="form-group">
                                <label  class="col-sm-3 control-label">คำอธิบายสถานที่ท่องเที่ยว</label>
                                <div class="col-sm-4">
                                 
                                    <textarea type="text"  placeholder="กรุณากรอกคำอธิบายสถานที่ท่องเที่ยว"name="TourAttInt" rows="3" class="form-control" value="<?=$array['TourAttInt']?>" autofocus required rows="3" style="margin: 0px 64px 0px 0px; height: 160px; width: 357px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-3 control-label">คำอธิบายสถานที่ท่องเที่ยวEng.</label>
                                <div class="col-sm-4">
                                   
                                    <textarea type="text"  placeholder="กรุณากรอกคำอธิบายสถานที่ท่องเที่ยวEng."  name="TourAttintEng" rows="3" class="form-control" value="<?=$array['TourAttintEng']?>" autofocus required rows="3" style="margin: 0px 64px 0px 0px; height: 160px; width: 357px;"></textarea>
                                </div>
                            </div> 
                            </div>
                            <div class="col-lg-6">  <!-- แบ่งซ้ายขวา  -->
							 <div class="form-group">
                                <label  class="col-lg-3 control-label">แผนที่</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอแผนที่" name="UserName"  class="form-control" value="<?=$array['UserName']?>" autofocus required>
                                </div>
                            </div>
							 <div class="form-group">
                                <label  class="col-lg-3 control-label col-sm-2"> ตำแหน่งละติจูด</label>
                                <div class="col-sm-4">
                                    <input type="text"  maxlength="10" placeholder="กรุณากรอก ตำแหน่งละติจูด" name="TourMapLa"  class="form-control" value="<?=$array['TourMapLaห']?>" autofocus required>
                                </div>
                            </div>
							
							 <div class="form-group">
                                <label  class="col-sm-3 control-label" >ตำแหน่งลองติจูด</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="ตำแหน่งลองติจูด" name="TourMapLong"  class="form-control" value="<?=$array['TourMapLong']?>" autofocus required>
                                </div>
                            </div>
							 
						 
                            <div class="form-group">
                                <label  class="col-sm-3 control-label">วิดิโอสถานที่ท่องเที่ยว</label>
                                <div class="col-sm-4">
    
                                 
                                  <input type="file" name="'TourAttVDO"><br>
	                             
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-3 control-label">รูปภาพสไล</label>
                                <div class="col-sm-4">
    
                                 
                                  <input type="file" name="'tourattImgSlide1"><br>
	                             
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-3 control-label">รูปภาพสไล2</label>
                                <div class="col-sm-4">
    
                                 
                                  <input type="file" name="'tourattImgSlide2"><br>
	                             
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-3 control-label">รูปภาพสไล3</label>
                                <div class="col-sm-4">
    
                                 
                                  <input type="file" name="'tourattImgSlide3"><br>
	                             
                                </div>
                            </div>
                             <!-- ส่วนเมนูคำสั่ง ย้อนกลับ บันทึก Reset -->
                            <input type="hidden" name="mode" value="<?= $mode ?>">
                                    <a type="reset" class="btn btn-danger" href="Touratt.php">ยกเลิก</a>
                                    <button type="reset" class="btn btn-success">Reset</button>
                                    <button type="submit"  class="btn btn-primary "  >บันทึก</button>
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