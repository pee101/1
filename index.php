<?php
session_start();
include "config.php";
if($_SESSION['ss_login'] != session_id() or $_SESSION['UserName']==['UserName'] ){
    echo "<script>alert('กรุณาลงชื่อเข้าสู่ระบบก่อน');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
    exit();
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

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    
                    </a>
                    
                 
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                    
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!-- /ลิ้งในการจัดการข้อมูล  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a>
                    </li>
                    <li>
                        <a href="user.php"><i class="fa fa-desktop"></i> จัดก่ารข้อมูลพื้นฐาน</a>
                    </li>
					<li>
                        <a href="TourAtt.php"><i class="fa fa-bar-chart-o"></i> จัดการข้อมูลสถานที่ท่องเที่ยว</a>
                    </li>  
                    
                    
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
						<h1>ยินดีต้อนรับเข้าสู่ระบบ</h1>
                        <h1 class="page-header">
                       							
                        <small>คุณ <?=$_SESSION['ss_UserName']?>
                       
                    </div>
                </div>
                <!-- /. ROW  -->

                


                <!-- /. ROW  -->
				<footer> การพัฒนาแอพพลิเคชันไปรษณีย์บัตร AR สถานที่ท่องเที่ยวจังหวัด ขอนแก่น TRAVEL IN KHONKEAN </footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
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