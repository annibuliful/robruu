<?php session_start();
  require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/co_controller.php';
  require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
  $authen = new authen_controller();
  $comment = new co_controller();
  if (isset($_POST['head'])) {
      $comment->comment_board($_SESSION['id'], $_POST['head'], $_POST['comment'], $_POST['id_playlist']);
  }
  ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="lib/jquery.js"></script>
        <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="http://cdn.ckeditor.com/4.6.0/standard-all/ckeditor.js"></script>
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
      @font-face {font-family: thaisan;}
                                                                                                                               src: url(thaisanslite_r1.ttf);}
                                                                                                                             * {font-family: thaisan; !important;}}
        .button {padding:8px 15px;
                        font-size:20px;
                        font-family:inherit;
                }

    .ans {
     font-size:20px;
     padding:5px 12px;
     border-radius:10%;
     background:#13d0d2;
     margin-top:20px;
    color:#ffffff;	}

      .ans:hover{
     font-size:20px;
     padding:5px 12px;
     border-radius:10%;
     background:#0ab589;
     margin-top:20px;
     color:#ffffff;	}
    </style>
        </style>
    </head>

    <body style="background-color:#ffe383">
      <nav class="navbar navbar-default navbar-static-top" style="background-color:white">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li>
              <a class="navbar-brand" href="#"><img src="pic/brand.png" style="height: 60px">
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
              <ul class="nav navbar-nav navbar-right" align="center">
                <?php $authen->check_session($_SESSION['id']); ?>
              </ul>
            </div>
          </div>
        </div>
      </nav>
 <div class="container" style="background-color:#ffffff">
      <div class="row">
        <div class="col-md-12" style="background-color:#44deb6" align="center">
          <font size="6" color="white" style="font-weight: bold">คำถามที่มีอยู่</font>
        </div>
        <div class="col-md-12" style="margin-bottom:2%">
          <?php
  if (isset($_GET['id_course'])) {
        $comment->list_comment_board($_GET['id_course']);
    } else {
        header('location: main.php');
    }
   ?>
        </div>
        <div class="col-md-12" style="background-color:#28b48f" align="center">
          <font size="6" color="white" style="font-weight: bold">สร้างคำถามใหม่</font>
        </div>
        <div class="col-md-12" style="margin-bottom:2%">
          <center><form class="" action="" method="post">
            <div class="form-group">
                <label for=""><h3>หัวข้อ</h3></label>
                <input type="text" class="form-control" style="width:1000px"name="head" value="">
            </div>
            <input type="hidden" name="id_playlist" value="<?php echo $_GET['id_course']; ?>">
            <textarea rows="4" cols="8" id="editor1" name="comment">
  </textarea>
            <input type="submit" class="btn btn-primary btn-default" name="submit" value="สร้าง">
          </form></center>
    </div><br><br><br>

    <script>
        var editor = CKEDITOR.replace('editor1', {
            extraPlugins: 'mathjax',
            mathJaxLib: 'http://cdn.mathjax.org/mathjax/2.6-latest/MathJax.js?config=TeX-AMS_HTML',
            height: 100,
            width: 1000
        });
    </script></div>
      </div>
    </div>
    </body>

    </html>
