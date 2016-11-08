<?php
declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/intructor_controller.php';
$s = new intructor_controller();
if (isset($_FILES['img']) && isset($_POST['id_author'])) {
  $id_answer1 = (int) $_POST['id_answer'] -1 ;
  $id_answer2 = (string) $id_answer1;
  $s->question($_FILES['img'],$_POST['answer1'],$_POST['answer2'],$_POST['answer3'],$_POST['answer4'],$_POST['id_author'],$id_answer2,$_POST['score']);
  header('location: ../../frontend/main-t.php');
}
 ?>
