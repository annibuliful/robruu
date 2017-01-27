<?php
session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/co_controller.php';
$list = new student_controller();
$authen = new authen_controller();
$search = new co_controller();
 if (isset($_SESSION['id'])) {
 } else {
     header('location: index.html');
     exit(0);
 } ?>

<html>

<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="lib/jquery.js"></script>
    <script type="text/javascript" src="lib/angular.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<style>
      @font-face {font-family: thaisan;
                                                                                                                                                                       src: url(thaisanslite_r1.ttf);}
                                                                                                                                                                     * {font-family: thaisan; !important;}

                                                            .button {
                                                            background-color: #4CAF50; /* Green */
                                                            border: none;
                                                            color: white;
                                                            padding: 6px 1px;
                                                            text-align: center;
                                                            text-decoration: none;
                                                            display: inline-block;
                                                            font-size: 16px;
                                                            margin: 4px 2px;
                                                            -webkit-transition-duration: 0.4s; /* Safari */
                                                            transition-duration: 0.4s;
                                                            cursor: pointer;
                                                        }

                                                        .button2 {
                                                            background-color: #f9f7ef;
                                                            color: black;
                                                          	 border-radius: 4px;
                                                          border: 1px solid #c9c9c9;
                                                          box-shadow:0px 0px 15px 0px #d3d3d3 inset;
                                                        }

                                                        .button2:hover {
                                                            background-color: #008CBA;
                                                            color: white;
                                                           border-radius: 4px;
                                                        }

                                                      .button3 {
                                                            background-color: #f9f7ef;
                                                            color: black;
                                                          	 border-radius: 4px;
                                                          border: 1px solid #c9c9c9;
                                                          box-shadow:0px 0px 15px 0px #d3d3d3 inset;
                                                        }

                                                        .button3:hover {
                                                            background-color: 00baab;
                                                            color: white;
                                                           border-radius: 4px;
                                                        }

                                                      .button4 {
                                                            background-color: #f9f7ef;
                                                            color: black;
                                                          	 border-radius: 4px;
                                                          border: 1px solid #c9c9c9;
                                                          box-shadow:0px 0px 15px 0px #d3d3d3 inset;
                                                        }

                                                        .button4:hover {
                                                            background-color: #00ba46;
                                                            color: white;
                                                           border-radius: 4px;
                                                        }

                                                      .button1 {
                                                            background-color: #f9f7ef;
                                                            color: black;
                                                          	 border-radius: 4px;
                                                          border: 1px solid #c9c9c9;
                                                          box-shadow:0px 0px 15px 0px #d3d3d3 inset;
                                                        }

                                                        .button1:hover {
                                                            background-color: #818181;
                                                            color: white;
                                                           border-radius: 4px;
                                                        }

                                                        }
    </style>
<script type="text/javascript">
$(document).ready(function(){

$(".preview").click(function(){

  $.post("preview.php", {
  id_playlist:  $(this).val()},
    function(result){
      $("#myModal").modal();
      $("#preview").html(result);

    }
  );

});
});
</script>
</head>

<body style="background-color:#f7f7f7 ">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div id="preview"class="modal-body">

                </div>
            </div>

        </div>
    </div>
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
                        <a href="mycourse.php"><img src="icon/study.png" style="height:50%">
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
    <div style="background-color:#ff630a">
        <div class="container">
            <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#demo">
          <font size="6" color="white">หมวดหมู่</font>
        </button>
        </div>
    </div>
    <div class="collapse" style="background-color:feeec5;box-shadow:0px 0px 15px 0px #ac8e40 inset;" id="demo">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section">
                        <div class="container">
                            <div class="row">
                              <br>
                                <div class="col-md-6" align="center">
                                    <a href="buy.php?major=sci"><img src="icon/subject/sci.png" style="height:60;margin-bottom:20"></a>
                                    <a href="buy.php?major=math"><img src="icon/subject/math.png" style="height:60;margin-bottom:20"></a>
                                    <a href="buy.php?major=thai"><img src="icon/subject/thai.png" style="height:60;margin-bottom:20"></a>
                                    <a href="buy.php?major=eng"><img src="icon/subject/eng.png" style="height:60;margin-bottom:20"></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" align="center">
                                    <a href="buy.php?major=social"><img src="icon/subject/social.png" style="height:60;margin-bottom:20"></a>
                                    <a href="buy.php?major=it"><img src="icon/subject/it.png" style="height:60;margin-bottom:20"></a>
                                    <a href="buy.php?major=art"><img src="icon/subject/art.png" style="height:60;margin-bottom:20"></a>
                                    <a href="buy.php?major=health"><img src="icon/subject/health.png" style="height:60;margin-bottom:20"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" align="center" style="margin-top:25px">
                    <a href="buy.php?major=GTPT"><button class="button button2" style="font-size:25;width:250;;margin-bottom:20">Gat-Pat</button></a>
                    <a href="buy.php?major=nine"><button class="button button3" style="font-size:25;width:250;;margin-bottom:20">9วิชาสามัญ</button></a>
                    <a href="buy.php?major=onet"><button class="button button4" style="font-size:25;width:250;;margin-bottom:20">O-net</button></a>
                    <a href="buy.php?major=etc"><button class="button button1" style="font-size:25;width:250;;margin-bottom:20">อื่นๆ</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="section" style="background-color:#ffd754;box-shadow: 0px 10px 10px #d1d1d1;">
        <div class="container" align="center">
          <br>
            <div class="row">
                <?php if (isset($_GET['id_course'])) {
     $search->buy($_GET['id_course'], $_SESSION['id']);
 } ?>
                    <div class="col-md-12">
                        <?php if ( isset($_SESSION['id'])) {
     $search->search($_POST['course_name'], $_SESSION['id'],$_GET['major']);
 } else {
 } ?>
                    </div>
            </div>
        </div>

</body>

</html>
