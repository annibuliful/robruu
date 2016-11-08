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
}

?>

    <html>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="lib/jquery.js"></script>
        <script type="text/javascript" src="lib/angular.min.js"></script>
        <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
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
        <script type="text/javascript">
            $(document).ready(function() {

                $("#detail").click(function() {

                    $.post("controller/detail_video.php", {
                            id_video: $("#detail").val()
                        },
                        function(result) {
                            $("#video").html(result);
                        }
                    );

                });
            });
        </script>
    </head>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="video">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="topup" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="" action="" method="post">
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
    <body>
      <div class="modal fade" id="topup" role="dialog">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-body">
                      <form class="" action="" method="post">
                        <div class="form-group">
                          <label for=""></label>
                          <input type="text" class="form-control" name="number"  placeholder="รหัสบัตรทรูมันนี่">
                          <br>
                          <input type="submit" class="btn"name="name" value="เติมเงิน">
                        </div>
                      </form>
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
                      <form class="form-inline float-xs-left" action="" method="post">
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
        <div class="container">
          <?php if (isset($_POST['id_playlist']) && isset($_POST['id_user'])) {
              $search->buy($_POST['id_playlist'],$_POST['id_user']);
          } ?>
            <div class="col-md-12">
                <?php if (isset($_POST['course_name']) && isset($_SESSION['id'])) {
                  $search->search($_POST['course_name'],$_SESSION['id']);
                }else {

                } ?>
            </div>
        </div>
        <br>

    </body>

    </html>
