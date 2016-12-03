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
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="lib/jquery.js"></script>
        <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
        <link href="lib/front_awesome.css" rel="stylesheet" type="text/css">
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

    <body style="background-color:#28c4f7">
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
                            <a href="main.php"><img src="icon/study.png" style="height:50%">
                                <font size="5">บทเรียนของฉัน</font>
                            </a>
                        </li>
                        <li class="hidden-xs">
                            <a href="main-t.php"><img src="icon/course.png" style="height:50%">
                                <font size="5">บทเรียนที่ฉันสอน</font>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="navbar navbar-default navbar-static-top" style="background-color:#ff630a">
                <div class="navbar-header"></div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <div class="container">
                        <ul class="nav navbar-nav">
                            <li class="hidden-lg hidden-md hidden-sm">
                                <center>
                                    <img src="pic/user.png" class="img-circle" style="width:20%;">
                                    <a href="#">
                                        <font size="5" color="white" style="font-weight:bold"><br>Username
                                            <br>1000 </font>
                                    </a>
                                </center>
                            </li>
                        </ul>
                        <div class="col-md-9">
                            <ul class="nav navbar-nav">
                                <li></li>
                            </ul>
                        </div>
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
                                        <a href="main.php">
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
                            <li style="background-color:#008489; margin-left:50">
                                <a href="#">
                                    <font color="white" size="4">หน้าหลัก</font>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <font color="white" size="4">คณิตศาสตร์</font>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <font color="white" size="4"> วิทยาศาสตร์</font>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <font color="white" size="4">ภาษาไทย</font>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <font color="white" size="4"> ภาษาอังกฤษ</font>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">อื่นๆ
        <span class="caret"></span></a>
                                <!-- ;; v ;; ดรอปดาวไม่ขึ้นอ่ะ น้ำตาจะไหล!-->
                            </li>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        <font color="white" size="4">สังคมศึกษา</font>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <font color="white" size="4">การงานอาชีพ</font>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <font color="white" size="4">สุขศึกษา</font>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <font color="white" size="4">ศิลปะ</font>
                                    </a>
                                </li>
                            </ul>
                            <div class="nav navbar-nav navbar-right" id="div1" align="right" style="font-size:25;">
                                <?php $authen->check_session($_SESSION['id']); ?>
                            </div>
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
                    <div class="col-md-9" style="background-color: rgb(255, 255, 255); margin-left:6px;margin-top:34px">
                        <font size="7" style="margin-left:3%">
                            <b>บทเรียนที่ฉันมี</b>
                            <img src="hs.png" align="right" class="hidden-sm hidden-xs">
                            <hr>
                        </font>
                        <ul class="media-list">
                            <?php $list->list_course($_SESSION['id']); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>
