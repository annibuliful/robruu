<?php
if (isset($_POST['id_user'])) {
  require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
  $detail = new student_controller();
  $detail->note($_POST['id_user'],$_POST['id_playlist'],$_POST['note']);
}

 ?>
