<?php session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/intructor_controller.php';
$list = new intructor_controller();

if (isset($_POST['id_question'])) {
  $list->edit_question($_SESSION['id'],$_POST['id_question'],$_POST['question_data'],$_POST['id_answer'],$_POST['answer1'],$_POST['answer2'],$_POST['answer3'],$_POST['answer4'],$_POST['score']);
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
     <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <script type="text/x-mathjax-config">
         MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
     </script>
     <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
     </script>
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
 </head><body>
<div class="container">
<?php if (isset($_GET['id_question'])) {
  $list->question_detail($_SESSION['id'],$_GET['id_question']);
} ?>
<a href="main-t.php"><button type="button" class="btn btn-danger btn-lg"name="button">กลับ</button></a>
</div>
<script>
    var editor = CKEDITOR.replace('question_data', {
        extraPlugins: 'mathjax',
        mathJaxLib: 'http://cdn.mathjax.org/mathjax/2.6-latest/MathJax.js?config=TeX-AMS_HTML',
        height: 100,
        width: 1100
    });
</script>
 </body></html>
