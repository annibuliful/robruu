<?php session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/co_controller.php';
$comment = new co_controller();
if (isset($_SESSION['id'])) {
}else {
  header('location: index.html');
}
if (isset($_GET['id_playlist']) && isset($_GET['id_N'])) {

}else {
  header('location: index.html');
}


 ?>
 <?php if (isset($_POST['id_playlist']) && isset($_POST['id_N']) && isset($_POST['comment'])) {
     $comment->answer_board($_SESSION['id'],$_POST['comment'],$_POST['id_playlist'],$_POST['id_N']);
 } ?>
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

   </head>
   <body>
     <div class="navbar navbar-default navbar-static-top" style="background-color:#ff630a">
         <div class="navbar-header"></div>
         <div class="collapse navbar-collapse" id="navbar-ex-collapse">
             <div class="container">

                 <div class="col-md-12">
                     <a href="main.php"><button type="button" class="btn btn-lg btn-danger" name="button">กลับ</button></a>
                 </div>
             </div>
         </div>
     </div>
   </body>
   <div class="container">
     <?php $comment->list_answer_board($_GET['id_playlist'],$_GET['id_N']); ?>
     <form class="" action="" method="post">
       <h3>กล่องตอบข้อสงสัย<h3>
         <input type="hidden" name="id_playlist" value="<?php echo $_GET['id_playlist']; ?>">
         <input type="hidden" name="id_N" value="<?php echo $_GET['id_N']; ?>">
         <textarea rows="4" cols="8" id="editor1" name="comment">
</textarea>
         <input type="submit" class="btn btn-primary btn-default" name="submit" value="ส่ง">
 </div><br><br><br>

 <script>
     var editor = CKEDITOR.replace('editor1', {
         extraPlugins: 'mathjax',
         mathJaxLib: 'http://cdn.mathjax.org/mathjax/2.6-latest/MathJax.js?config=TeX-AMS_HTML',
         height: 100,
         width: 1000
     });
 </script>
 </form>
   </div>
 </html>
