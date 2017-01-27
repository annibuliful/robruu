<?php session_start(); require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
$list = new student_controller();
$_SESSION['id_course'] = $_GET['id_course'];
?>
<?php
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
$authen = new authen_controller();
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="lib/jquery.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
    </script>
    <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
    </script>
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
    <style>
        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            width: 70%;
            margin: auto;
        }
    </style>
    <style>
        .center {
            text-align: center;
        }
    </style>
</head>

<body style="background-color:#ff5a5a">
  <body style="background-color:ffe776">
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
      <div class="col-md-2" style="background-color:d9d9d9;">
          <center>
            <a href="main.php"><i class="fa fa-2x fa-chevron-left fa-fw text-danger" style="margin-top:9px"></i>
              <font style="font-weight: bold;color:fa4b4b;font-size:150%">ย้อนกลับ</font></a>
          </center>
        </div>
          <br><br>
    <div class="container">
        <?php
      $list = new student_controller();
      if (isset($_POST['id_answer'])) {
          $list->exam($_POST['id_answer'], $_POST['id_question'], $_SESSION['id']);
      }

       ?>
            <?php
        if (isset($_SESSION['id'])) {
            $list->show_question($_GET['id_course']);
        } else {
            header('location: index.html');
        } ?>

    </div>
</body>

</html>
