<?php
session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/intructor_controller.php';
$list = new intructor_controller();
if (isset($_SESSION['id'])) {
} else {
    header('location: ../../frontend/index.html');
    exit(0);
}
if (isset($_POST['course_name'])) {
    $list->make_course($_SESSION['id'], '', $_POST['description'], $_POST['course_name'], $_POST['price'], $major, $_FILES['cover']);
}
?>
    <html>

    <head>
        <title>Rob-Roo l รอบรู้ทุกการศึกษาของวัยเรียน วัยTEEN</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        </style>
    </head>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog " style="width:41%">
            <div class="modal-content">
                <div class="modal-body">
                  <form class="form-group" action="main-t.php" method="post" enctype="multipart/form-data">
                    <div class="">
                            <div class="form-group">
                                <label for="">ชื่อคอสเรียน</label>
                                <input type="text" name="course_name" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">รายละเอียด</label>
                                <input type="text" name="description" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">ราคา</label>
                                <input type="text" name="price" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">ภาพ cover</label>
                                <input type="file" name="cover" class="form-control" id="" placeholder="">
                            </div>
                    </div>
                        <input type="submit" class="btn btn-info" name="submit" value="สร้างคอสเรียน">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <body style="background-color:#058277">
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
                        <?php $list->check_session($_SESSION['id']); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar navbar-default navbar-static-top" style="background-color:#ff630a">
            <div class="navbar-header"></div>
            <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                <div class="container">

                    <div class="col-md-12">
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

                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container" style="width:95%;background-color:#ffffff">
                <div class="row">
                    <div class="col-md-12">
                        <font size="7">บทเรียนที่ฉันสอน</font>
                        <div align="center">
                            <button style="width:230; opacity:0.9;" type="button" class="btn btn-default">
                <span data-toggle="modal" data-target="#myModal"style="font-size:19;font-weight:bold;">
                  <img src="icon/plus2.png">เพิ่มบทเรียน</span>
              </button>
                        </div>
                        <center>
                            <table class="table" style="font-size:20;text-align:center;width:90%">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>ชื่อบทเรียน</center>
                                        </th>
                                        <th width="15%">
                                            <center>ราคา</center>
                                        </th>
                                        <th width="10%">
                                            <center>จัดการ</center>
                                        </th>
                                        <th width="10%">
                                            <center>Rating</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $list->list_course($_SESSION['id']); ?>
                                </tbody>
                            </table>
                        </center>
                    </div>
                </div>
            </div>
        </div>



    </body>

    </html>
