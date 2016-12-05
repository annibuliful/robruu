<?php session_start();
if (isset($_GET['id_course']) && isset($_GET['id_user'])) {
  require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
  $detail = new student_controller();
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
  </head>
  <body>
<div class="container">
<?php   $detail->showdetail_course($_GET['id_course'],$_GET['id_user']); ?>
<a href="main.php"><br><br><button type="button" name="button" class="btn btn-danger btn-lg">ย้อนกลับ</button></a>
</div>
  </body>
</html>
