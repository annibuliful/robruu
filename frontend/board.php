<?php session_start();
  require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/co_controller.php';
  $comment = new co_controller();
  if (isset($_POST['head'])) {
    $comment->comment_board($_SESSION['id'], $_POST['head'] ,$_POST['comment'], $_POST['id_playlist']);
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
        </style>
    </head>

    <body>
      <script src="http://cdn.ckeditor.com/4.6.0/standard-all/ckeditor.js"></script>
      <script type="text/x-mathjax-config">
          MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
      </script>
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
        <div class="container">
            <form class="" action="" method="post">
                <div class="form-group">
                    <label for=""><h3>หัวข้อ</h3></label>
                    <input type="text" class="form-control" name="head" value="">
                </div>
                <input type="hidden" name="id_playlist" value="<?php echo $_GET['id_course'];?>">
                <textarea rows="4" cols="8" id="editor1" name="comment">
      </textarea>
                <input type="submit" class="btn btn-primary btn-default" name="submit" value="สร้าง">
        </div>

        <script>
            var editor = CKEDITOR.replace('editor1', {
                extraPlugins: 'mathjax',
                mathJaxLib: 'http://cdn.mathjax.org/mathjax/2.6-latest/MathJax.js?config=TeX-AMS_HTML',
                height: 100,
                width: 1000
            });
        </script>
        </form>
        <?php
if (isset($_GET['id_course'])) {
  $comment->list_comment_board($_GET['id_course']);
}else {
  header('location: main.php');
}
 ?>
    </body>

    </html>
