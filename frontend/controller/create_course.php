<?php
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/intructor_controller.php';
$create = new intructor_controller();
if (isset($_POST['id']) && isset($_FILES['video'])) {
  $create->make_course($_POST['id'],$_FILES['video'],$_POST['description'],$_POST['course_name'],$_POST['price']);
  header('refresh: 2; url=../../frontend/main-t.php');
  exit(0);
}else {
  header('refresh: 1; url=../../frontend/main-t.php');
  exit(0);
}


 ?>
