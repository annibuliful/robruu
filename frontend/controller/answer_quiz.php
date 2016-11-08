<?php
  require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
  $answer = new student_controller();
  if (isset($_POST['id_question']) &&$_POST['id_user']) {
    $answer->answer($_POST['id_question'],$_POST['id_answer'],$_POST['id_user']);
  }
 ?>
