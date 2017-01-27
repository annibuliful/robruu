<?php session_start();
$_SESSION['id_course'] = $_GET['id_course'];
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
$list = new student_controller();
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
    <script type="text/javascript" async
      src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
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
        .button {padding:8px 15px;
               font-size:24px;
               font-family:inherit;
               width:54px;
               height:54px;
               line-height:44px
                                                                                 }

                      .choice {margin:0;
                        padding:0;
                        font-weight:400;
                        cursor:pointer;
                        font-size:25px;
                        padding:0px 12px;
                        overflow:hidden;
                        border-width:0;
                        border-radius:50%;
                        background:#ffffff;
                        margin-top:20px;
                        box-shadow:0 2px 5px 0 rgba(0,0,0,.18),0 1px 5px 0 rgba(0,0,0,.15);
                        color:#000000;
                        -webkit-transition:all .25s cubic-bezier(.02,.01,.47,1);
                        transition:all .25s cubic-bezier(.02,.01,.47,1);
                        -webkit-transform:translateZ(0);
                        transform:translateZ(0)		}

                         .choice:hover{box-shadow:0 5px 11px 0 rgba(0,0,0,.18),0 4px 15px 0 rgba(0,0,0,.15);
                           background:#f55d5d;
                           font-size:25px;
                        padding:0px 12px;
                           color:#ffffff;
                           -webkit-transition:box-shadow .4s ease-out;
                           transition:box-shadow .4s ease-out		}
    </style>
    <style>
        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            width: 70%;
            margin: auto;
        }
    </style>
</head>

<body style="background-color:#d7d7d7">
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
    <div class="container" style="background-color:ea4444;margin-top:2.5%">
      <div class="row">
        <div class="col-md-2" style="background-color:ff7272;">
          <center>
            <a href="main.php"><i class="fa fa-2x fa-fw text-inverse fa-chevron-left" style="margin-top:9px"></i>
              <font style="font-weight: bold;color:ffffff;font-size:150%">ย้อนกลับ</font></a>
          </center>
        </div>
      </div>
    </div>
    <br>
    <div class="container" style="background-color: white">
      <div class="col-md-12">
        <a href="main.php">
          <?php if (isset($_POST['id_answer'])) {
        $list->exam($_POST['id_answer'], $_POST['id_question'], $_SESSION['id']);
        }
        ?></a>
          <?php if (isset($_SESSION['id'])) {
        $list->show_exercise($_SESSION['id_course']);
        } else {
        header('location: index.html');
        } ?>

      </div>


    </div>
</body>

</html>
