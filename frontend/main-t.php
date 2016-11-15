<?php
session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/intructor_controller.php';
$list = new intructor_controller();
if (isset($_SESSION['id'])) {
} else {
    //header('refresh: 2; url=../../frontend/index.html');
    header('location: ../../frontend/index.html');
    exit(0);
}?>
    <html>

    <head>
        <title>Rob-Roo l รอบรู้ทุกการศึกษาของวัยเรียน วัยTEEN</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="lib/jquery.js"></script>
        <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
        <link href="lib/pingendo.css" rel="stylesheet" type="text/css">
        <link href="lib/front_awesome.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
            $(document).ready(function() {
                $.post("controller/check_session.php", {
                        session: <?php echo $_SESSION['id'] ?>
                    },
                    function(result) {
                        $("#session").html(result);
                    }
                );
            });
        </script>
    </head>

    <body background="bg main.png">
      <div class="modal fade" id="topup" role="dialog">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-body">
                      <form class="" action="../../backend/DB/feature/tmtopup_api.php" method="get">
                        <div class="form-group">
                          <label for=""></label>
                          <img src="../../frontend/true.png" class="img-responsive img-circle" />
                          <input type="text" class="form-control" name="number"  placeholder="รหัสบัตรทรูมันนี่">
                          <br>
                          <input type="submit" class="btn" name="name" value="เติมเงิน">
                        </div>
                      </form>
                  </div>
              </div>

          </div>
      </div>
      <div class="modal fade" id="quiz" role="dialog">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-body" id="video">
                      <div class="container">
                        <div class="col-md-5">
                          <form  class="form-horizontal"
                          action="controller/create_question.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" class="form-control" name="img" placeholder="video">
                        </div>
                        <input type="hidden" name="id_author" value="<?php echo $_SESSION['id']?>" >
                        <div class="form-group">
                            <input type="text" class="form-control" name="answer1" placeholder="คำตอบที่ 1">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="answer2" placeholder="คำตอบที่ 2">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="answer3" placeholder="คำตอบที่ 3">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="answer4" placeholder="คำตอบที่ 4">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="id_answer" placeholder="คำตอบที่ถูกต้อง">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="score" placeholder="คะแนน">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="name" value="สร้างคำถาม">
                        </div>

                          </form>
                        </div>

                      </div>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>

          </div>
      </div>
      <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
                  <a class="navbar-brand" href="#"><img src="picture/brand.png" style="width: 90; height: 50px;" /></a>
              </div>
              <div class="collapse navbar-collapse" id="navbar">
                  <ul class="nav navbar-nav navbar-right" id="session">
                  </ul>
                  <ul class="nav navbar-nav" style="margin-top: 10px;margin-left: 35%">
                    <form class="form-inline float-xs-left" action="buy.php" method="post">
                        <input class="form-control" type="text" name="course_name" placeholder="ค้นหาคอสเรียน">
                        <input type="submit" class="btn btn-outline-success"name="name" value="ค้นหา">
                      </form>
                  </ul>
                  <ul class="nav navbar-nav navbar-right" >
                    <a class="navbar-brand" href="main.php"><img src="../../frontend/picture/mycourse.png" class="img-responsive" style="width: 110px ;height: 40px"/></a>
                    <a class="navbar-brand" href="main-t.php"><img src="../../frontend/picture/course.png" class="img-responsive" style="width: 110px ;height: 40px"/></a>
                    <a class="navbar-brand" href="quiz.php"><img src="../../frontend/picture/quiz-t.png" class="img-responsive" style="width: 110px ;height: 40px" /></a>
                  </ul>
              </div>

          </div>
      </nav>
        <div class="modal fade" id="create" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" id="video">
                        <div class="container">
                          <div class="col-md-5">
                            <form class="form-horizontal" action="controller/create_course.php"
                                method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="video" placeholder="video">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="course_name" placeholder="ชื่อคอสเรียน">
                                    <input type="hidden" class="form-control" name="id" hidden="hidden" value="<?php echo $_SESSION['id']?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="description" placeholder="คำอธิบาย">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price" placeholder="ราคา">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control" name="name" value="upload">
                                </div>
                            </form>
                          </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>

        </div>
        <div class="section" style=" background-color: f5f5f5;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table text-center" style="color: #666666; font-size: 19px">
                            <thead>
                                <tr class=" text-center" style="color: #434343; font-size: 25px">
                                    <th class=" text-center">ชื่อบทเรียน</th>
                                    <th class=" text-center">ราคา</th>
                                    <th class=" text-center">ความนิยม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $list->list_course($_SESSION['id']); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" style="background-color:ffffff;opacity: 0.85;margin-top:1%">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <center>
                            <img src="button\upload_sheet.png" style="height:25%" data-toggle="modal" data-target="#create"><br><br>
                            <img src="button\upload_quiz.png" style="height:25%" data-toggle="modal" data-target="#quiz">
                        </center>
                    </div>
                    <div class="col-md-7">
                        <br>
                        <h2>ไฟล์ที่ต้องจัดการเตรียมก่อนนำมาลงเว็บรอบรู้</h2>
                        <h4>
              <ul type="disc">
                <li>เนื้อหาที่เรียน เป็นไฟล์ .pdf</li>
                <li>วิดีโอสอน ไฟล์สกุลใดก็ได้</li>
                <li>แบบสอบที่จะใช้วัดความรู้ผู้เรียน</li>
              </ul>
            </h4>
                        <h2>ขั้นตอนการลงบทเรียน
              <br>
            </h2>
                        <h4>
              <ol value="1">
                <li>คลิ๊กปุ่มเครื่องหมาย +</li>
                <li>อัพโหลดไฟล์ 3 ไฟล์ที่ได้กล่าวไว้ในตอนแรก</li>
                <ul type="disc">
                  <li>แบบทดสอบใช้เขียนเอานะบลาๆๆ</li>
                </ul>
                <li>กดอัพโหลดไฟล์ ก็เป็นอันเสร็จสิ้น</li>
              </ol>
            </h4>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>
