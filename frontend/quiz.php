<?php
session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
if (isset($_SESSION['id'])) {
  $list = new student_controller();

} else {
    header('location: ../../frontend/index.html');
    exit(0);
}?>
<html><head>
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
  </head><body style="background-image: url(bgquiz.png);background-repeat-y: no-repeat;">
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
                  <form class="form-inline float-xs-left" method="post">
                      <input class="form-control" type="text" placeholder="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
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
    <div class="section" style="margin-top:3.6%">
      <div class="container">
      <?php  if (isset($_POST['id_answer'])) {
          $list->answer($_POST['id_question'],$_POST['id_answer'],$_POST['id_user']);
          //print_r($_POST['id_question']);
        }?>
        <div class="row">
          <div class="col-md-12" style="background-color:#ffffff;  opacity:0.9">
            <?php $list->show_question($_SESSION['id']);?>
        </div>
      </div>
    </div>


</body></html>
