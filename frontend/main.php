<?php
session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/co_controller.php';
$list = new student_controller();
$authen = new authen_controller();
$course = new co_controller();
if (isset($_POST['user']) && isset($_POST['pass'])) {
    $authen->login($_POST['user'], $_POST['pass'], $_POST['user']);
} elseif (isset($_SESSION['id'])) {
} else {
    header('location: index.html');
    exit(0);
}?>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <style>
      @font-face {font-family: thaisan;
                  src: url(thaisanslite_r1.ttf);}
      * {font-family: thaisan; !important;}}
    </style>
    <title>Robruu | </title>
  </head><body style="background-color:ffe776">
    <nav class="navbar navbar-default navbar-static-top" style="background-color:white">
      <div class="navbar-header">
        <ul class="nav navbar-nav">
          <li>
            <a class="navbar-brand" href="#"><img src="pic/brand.png" style="height: 60">
                        </a>
          </li>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </ul>
      </div>
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <div class="navbar-header">
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
            </ul>
          </div>
          <ul class="nav navbar-nav navbar-right" align="center">
            <?php $authen->check_session($_SESSION['id']); ?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="background-color:white">
          <div class="carousel slide" id="fullcarousel-example" data-interval="false" data-ride="carousel">
            <div class="carousel-inner">
              <div class="item active">
                <img src="pic/bb.png">
                <div class="carousel-caption">
                  <h2>Title</h2>
                  <p>Description</p>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#fullcarousel-example" data-slide="prev"><i class="icon-prev fa fa-angle-left"></i></a>
            <a class="right carousel-control" href="#fullcarousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="background-color:white">
      <div class="row">
        <div class="col-md-4">
          <center>
            <a href="mycourse.php"><img src="button/01study.png" class="img-responsive"></a>
          </center>
        </div>
        <div class="col-md-4">
          <center>
            <a href="main-t.php"><img src="button/02teach.png " class="img-responsive"></a>
          </center>
        </div>
        <div class="col-md-4">
          <center>
            <a href="chat.php"><img src="button/04chat.png" class="img-responsive"></a>
          </center>
        </div>
      </div>
    </div>
    <!--<div class="container" style="background-color:white">
          <br><br>
      <div class="row">
        <?php  //$course->list_course_rank($_SESSION['id']);?>
      </div>
    </div>-->


</body></html>
