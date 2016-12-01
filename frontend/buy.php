<?php
session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/co_controller.php';
$list = new student_controller();
$authen = new authen_controller();
$search = new co_controller();
 if (isset($_SESSION['id'])) { } else { header('location: index.html'); exit(0); } ?>

        <html>

        <head>
            <meta charset="utf-8">
            <script type="text/javascript" src="lib/jquery.js"></script>
            <script type="text/javascript" src="lib/angular.min.js"></script>
            <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
            <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        </head>
        <style>
            @font-face {
                font-family: thaisan;
                src: url(thaisanslite_r1.ttf);
            }

            * {
                font-family: thaisan;
                !important;
            }
        </style>
        </head>

        <body style="background-color:#f7f7f7 ">
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
                            <li class="hidden-xs">
                                <a href="main.php"><img src="icon/study.png" style="height:50%">
                                    <font size="5">บทเรียนของฉัน</font>
                                </a>
                            </li>
                            <li active="" class="hidden-xs">
                                <a href="main-t.php"><img src="icon/course.png" style="height:50%">
                                    <font size="5">บทเรียนที่ฉันสอน</font>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-default navbar-static-top" style="background-color:#ff630a">
                <div class="navbar-header"></div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <div class="container">
                        <ul class="nav navbar-nav">
                            <li class="hidden-lg hidden-md hidden-sm" style="background-color:#ffffff">
                                <center>
                                    <a href="#">
                                        <font size="5">บทเรียนของฉัน</font>
                                    </a>
                                </center>
                            </li>
                            <hr class="hidden-lg hidden-md hidden-sm">
                            <li class="hidden-lg hidden-md hidden-sm" style="background-color:#ffffff">
                                <center>
                                    <a href="#">
                                        <font size="5">บทเรียนที่ฉันสอน</font>
                                    </a>
                                </center>
                            </li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section" style="background-color:#ffd754;box-shadow: 0px 10px 10px #d1d1d1;">
                <div class="container" align="center">
                    <div class="row">
                      <?php if (isset($_GET['id_course'])) {
                          $search->buy($_GET['id_course'],$_SESSION['id']);
                      } ?>
                          <div class="col-md-12">
                              <?php if (isset($_POST['course_name']) && isset($_SESSION['id'])) {
                              $search->search($_POST['course_name'],$_SESSION['id']);
                            }else {

                            } ?>
                    </div>
                </div>
            </div>

        </body>

        </html>
