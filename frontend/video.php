<?php session_start();
if (isset($_GET['id_course']) && isset($_GET['id_user'])) {
    require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
    require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/co_controller.php';
    $detail = new student_controller();
    $comment = new co_controller();
}

 ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="lib/jquery.js"></script>
        <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <title></title>
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
        <script type="text/javascript">
            $(document).ready(function() {
                $("#comment_click").click(function() {
                    $("#comment").load("comment.php", {
                        id_user: '<?php echo $_SESSION['id']; ?>',
                        comment: $("input").val(),
                        id_course: '<?php echo $_GET['id_course']; ?>'
                    });
                });
            });
        </script>
    </head>

    <body>
        <div class="navbar navbar-default navbar-static-top" style="background-color:#ffffff; height:15%">
            <div class="container" style="; width:90%">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                    <a href="main.php"><span></span><img src="pic/brand.png" style="height: 80px"></a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-xs">
                            <a href="main.php"><img src="icon/study.png" style="height:50px">
                                <font size="5">บทเรียนของฉัน</font>
                            </a>
                        </li>
                        <li active="" class="hidden-xs">
                            <a href="main-t.php"><img src="icon/course.png" style="height:50px">
                                <font size="5">บทเรียนที่ฉันสอน</font>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar navbar-default navbar-static-top" style="background-color:#2169a5;">
        </div>
        <div class="section" style="background-color:ffffff;opacity:0.97;margin-top:2.3%">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="background-color:#ffffff;opacity:0.97">
                        <?php   $detail->showdetail_course($_GET['id_course'], $_GET['id_user']); ?>
                        <a href="main.php"><br><br>
                            <button type="button" name="button" class="btn btn-danger btn-lg">ย้อนกลับ</button></a>
                    </div>
                </div>
                <br><br><br>
                <div class="container">
                <button type="button" id="comment_click"name="button" class="btn btn-info ">แสดงความคิดเห็น</button>
                <input type="text">
                </div>
                <div>
                <div class="container"id="comment" style="margin-top: 80px">
                    <?php if (isset($_POST['comment'])) {
                           $comment->comment_course($_SESSION['id'], $_POST['comment'], $_GET['id_course']);
                          } else {
                           $comment->comment_course($_SESSION['id'], '', $_GET['id_course']);
                          } ?>
                </div>
            </div>
        </div>


    </body>

    </html>
