<?php
session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
$list = new student_controller();
$authen = new authen_controller();
if (isset($_POST['user']) && isset($_POST['pass'])) {
    $authen->login($_POST['user'], $_POST['pass'], $_POST['user']);
} elseif (isset($_SESSION['id'])) {
} else {
    header('location: index.html');
    exit(0);
}?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="lib/jquery.js"></script>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <style>
    @font-face {
            font-family: thaisan;
            src: url(thaisanslite_r1.ttf);
        }

        * {
            font-family: thaisan;
            !important;
        }
    }
    </style>
</head>

<body style="background-color:#09b99a">
    <div class="navbar navbar-default navbar-static-top" style="background-color:#ffffff; height:15%">
        <div class="container" style="; width:90%">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a href="#"><span></span><img src="pic/brand.png" style="height: 80%"></a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active hidden-xs">
                        <a href="mycourse.php"><img src="icon/study.png" style="height:50%">
                            <font size="5">บทเรียนของฉัน</font>
                        </a>
                    </li>
                    <li class="hidden-xs">
                        <a href="main-t.php"><img src="icon/course.png" style="height:50%">
                            <font size="5">บทเรียนที่ฉันสอน</font>
                        </a>
                    </li>
                    <div class="nav navbar-nav navbar-right" id="div1" align="right" style="font-size:25;">
                        <?php $authen->check_session($_SESSION['id']); ?>
                    </div>
                </ul>
            </div>
        </div>
        <div class="navbar navbar-default navbar-static-top" style="background-color:#ff630a">
            <div class="navbar-header"></div>
            <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li>
                            <form class="navbar-form" action="buy.php" method="post">
                                <div class="input-group">
                                    <input type="text" name="course_name" class="form-control" placeholder="ค้นหาบทเรียน">
                                    <div class="input-group-btn">
                                        <button class="btn btn" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                        <i class="icon-search"></i>
                      </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <ul class="nav navbar-nav">
                            <li class="hidden-lg hidden-md hidden-sm">
                                <center>
                                    <a href="mycourse.php">
                                        <font size="5" color="white">บทเรียนของฉัน<img src="icon/studyin.png" style="height:20%"></font>
                                    </a>
                                </center>
                            </li>
                            <li class="hidden-lg hidden-md hidden-sm">
                                <center>
                                    <a href="main-t.php"><img src="icon/coursein.png" style="height:20%">
                                        <font size="5" color="white">บทเรียนที่ฉันสอน</font>
                                    </a>
                                </center>
                            </li>
                        </ul>
                        <li style="background-color:#ededed; margin-left:50;font-weight: bold">
                            <a href="mycourse.php">
                                <font color="ff630a" size="4">หน้าหลัก</font>
                            </a>
                        </li>
                        <li>
                            <a href="mycourse.php?major=math">
                                <font color="white" size="4">คณิตศาสตร์</font>
                            </a>
                        </li>
                        <li>
                            <a href="mycourse.php?major=sci">
                                <font color="white" size="4">วิทยาศาสตร์</font>
                            </a>
                        </li>
                        <li>
                            <a href="mycourse.php?major=thai">
                                <font color="white" size="4">ภาษาไทย</font>
                            </a>
                        </li>
                        <li>
                            <a href="mycourse.php?major=eng">
                                <font color="white" size="4">ถาษาอังกฤษ</font>
                            </a>
                        </li>
                        <li>
                            <a href="mycourse.php?major=social">
                                <font color="white" size="4">สังคมศึกษา</font>
                            </a>
                        </li>
                        <li>
                            <a href="mycourse.php?major=health">
                                <font color="white" size="4">สุขศึกษาและพลศึกษา</font>
                            </a>
                        </li>
                        <li>
                            <a href="mycourse.php?major=art">
                                <font color="white" size="4">ทัศนศิลป์</font>
                            </a>
                        </li>
                        <li>
                            <a href="mycourse.php?major=it">
                                <font color="white" size="4">การงานอาชีพและเทคโนโลยี</font>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="navbar-ex-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li class="active"></li>
        </ul>
    </div>
    <div class="section">
        <div class="container" style="width:98%">
            <div class="row">
                <div class="col-md-2 hidden-sm hidden-xs" style="background-color:#ffffff;margin-top:34px">
                    <center>
                        <img src="icon\rank.png" width="60%" style="margin-top:20px">
                    </center>
                    <div align="center">
                        <font size="6" color="154b40">
                            <b>Point Ranking</b>
                        </font>
                        <br>
                    </div>
                    <ur style="font-size:180%">
                        <?php
                                 $list->ranking()?>

                    </ur>
                    <br>
                    <br>
                </div>
                <div class="col-md-9" style="background-color: rgb(255, 255, 255); margin-left:6px;margin-top:50px;">
                    <div class="col-md-12" style="background-color:#fffad5">
                        <font size="6" color="#6b6b6b" style="font-weight: bold">บทเรียนที่ฉันมี </font>
                        <i class="fa fa-3x fa-fw fa-leanpub" style="color:ff630a"></i>
                    </div>
                    <ul class="media-list" style="margin-top: 80px">
                        <div class="col-md-12">
                                <?php
                              if (isset($_GET['major'])) {
                                $list->list_course($_SESSION['id'],$_GET['major']);
                              }else {
                                  $list->list_course($_SESSION['id'],'');
                              }
                              ?>
                                <br><br>

                        </div>

                    </ul>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    <!--<script type="text/javascript">
            $(window).load(function(){
                $('#myModal').modal('show');
            });
        </script>
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <center><h1>คุณได้รับ </h1><br><p style="font-size: 90px">100 <img src="icon/point.png" style="width:65px;height:65px"></p></center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>-->

</body>

</html>
