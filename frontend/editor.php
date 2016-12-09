<?php session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/intructor_controller.php';
$list = new intructor_controller();
if (isset($_SESSION['id'])) {
} else {
    header('location: ../../frontend/index.html');
    exit(0);
}
if (isset($_GET['id_course'])) {
    $_SESSION['id_course'] = $_GET['id_course'];
}
if (isset($_POST['course_name'])) {
    $list->make_course($_SESSION['id'], '', $_POST['description'], $_POST['course_name'], $_POST['price'], $major, $_FILES['cover']);
}
if (isset($_POST['id_course'])) {
    $list->update_course($_SESSION['id'], $_POST['id_course'], $_FILES['video'], $_POST['description']);
}
if (isset($_POST['question']) && isset($_POST['id_answer'])) {
    $list->make_exam($_SESSION['id'], $_POST['question'], $_POST['id_answer'], $_POST['answer1'], $_POST['answer2'], $_POST['answer3'], $_POST['answer4'], $_POST['id_course2'], $_POST['score']);
}

 ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://cdn.ckeditor.com/4.6.0/standard-all/ckeditor.js"></script>
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
    </script>
    <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
    </script>
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

<body style="background-image:url(pic/1847066832.jpg);">
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
    <div class="navbar navbar-default navbar-static-top" style="background-color:#373737">
        <div class="navbar-header"></div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <div class="container">
                <ul class="nav navbar-nav">
                    </li>
                </ul>
                <div class="col-md-9">
                    <form class="navbar-form" action="buy.php" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="ค้นหาบทเรียน">
                            <div class="input-group-btn">
                                <button class="btn btn" type="button">
                          <span class="glyphicon glyphicon-search"></span>
                          <i class="icon-search"></i>
                        </button>
                            </div>
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-nav">
                    <li class="hidden-lg hidden-md hidden-sm">
                        <center>
                            <a href="main.php">
                                <font size="5" color="white">บทเรียนของฉัน</font>
                            </a>
                        </center>
                    </li>
                    <li class="hidden-lg hidden-md hidden-sm">
                        <center>
                            <a href="main-t.php">
                                <font size="5" color="white">บทเรียนที่ฉันสอน</font>
                            </a>
                        </center>
                    </li>
                    <?php $list->check_session($_SESSION['id']); ?>
                </ul>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">

            </ul>
        </div>
    </div>
    <div class="section" style="margin-top:5px;margin-left:30px;">
        <div class="row">
            <div class="col-md-6" style="background-color:#ffffff;">
                <center>
                    <img src="button/upload_sheet.png" style="width:20%;height:20%;margin-top:20px" data-toggle="collapse" data-target="#content">
                    <img src="button/upload_video.png" style="width:20%;height:20%;margin-top:20px" data-toggle="collapse" data-target="#video">
                    <img src="button/upload_quiz.png" style="width:20%;height:20%;margin-top:20px" data-toggle="collapse" data-target="#exercise">
                </center>
                <div class="collapse" id="exercise">
                    <form class="form-inline" action="editor.php" method="post" enctype="multipart/form-data">
                        <textarea rows="4" cols="8" id="editor1" name="question">
                            </textarea>
                        <input type="hidden" name="id_course2" value="<?php echo$_SESSION['id_course']; ?>">
                        <div class="form-group">
                            <label for="">ตัวเลือกที่ถูก</label>
                            <input type="text" name="id_answer" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">ตัวเลือกที่ 1</label>
                            <input type="text" name="answer1" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">ตัวเลือกที่ 2</label>
                            <input type="text" name="answer2" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">ตัวเลือกที่ 3</label>
                            <input type="text" name="answer3" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">ตัวเลือกที่ 4</label>
                            <input type="text" name="answer4" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">คะแนน</label>
                            <input type="text" name="score" class="form-control" id="" placeholder="">
                        </div>
                        <input type="submit" name="submit" value="สร้าง">
                    </form>
                </div>
                <div id="video" class="collapse">
                    <form class="form-inline" action="editor.php" method="post" enctype="multipart/form-data">
                        <br><br>
                        <input type="hidden" name="id_course" value="<?php echo$_GET['id_course']; ?>">
                        <div class="col-md-6" align="right">
                            <div class="form-group">
                                <label for="">ไฟล์วิดีโอ</label>
                                <input type="file" name="video" class="form-control" style="margin-left:10px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">คำอธิบาย</label>
                            <input type="text" class="form-group" name="description" value="">
                        </div>
                        <button type="submit" class="btn btn-info btn-lg" name="button">อัพโหลด</button>
                    </form><br><br>
                </div>
                <?php if (isset($_GET['id_course'])) {
     ?>
                <form action="" method="get">
                    <input type="hidden" name="id_course" value="<?php echo$_GET['id_course']; ?>">
                    <input type="hidden" name="flag" value="public">
                    <div id="content" class="collapse">
                        <textarea cols="10" id="editor2" name="data" rows="10">
                   <?php $list->draft($_SESSION['id'], $_GET['id_course'], $_GET['data'], $_GET['flag']); ?>
                 </textarea>
                        <input type="submit" name="submit" value="สร้าง">
                    </div>
                    <?php
 } ?>
                </form>
            </div>

            <div class="col-md-6" style="background-color:#ffffff;">
              <button type="button" class="btn btn-info btn-lg" data-toggle="collapse" data-target="#list_question">ดูรายละเอียดโจทย์</button>
              <button type="button" class="btn btn-info btn-lg" data-toggle="collapse" data-target="#list_video">ดูรายละเอียดวิดีโอ</button>
                <br><br>
               <?php $list->list_question($_SESSION['id'],$_SESSION['id_course']) ?>
               <?php $list->list_video($_SESSION['id'],$_SESSION['id_course']); ?>
            </div>
        </div>
    </div>


    <script>
        var editor = CKEDITOR.replace('editor1', {
            extraPlugins: 'mathjax',
            mathJaxLib: 'http://cdn.mathjax.org/mathjax/2.6-latest/MathJax.js?config=TeX-AMS_HTML',
            height: 100,
            width: 635
        });
    </script>
    <script>
        var editor1 = CKEDITOR.replace('editor2', {
            extraPlugins: 'mathjax',
            mathJaxLib: 'http://cdn.mathjax.org/mathjax/2.6-latest/MathJax.js?config=TeX-AMS_HTML',
            height: 280,
            width: 635
        });
    </script>

</body>

</html>
