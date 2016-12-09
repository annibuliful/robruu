<?php session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/intructor_controller.php';
$list = new intructor_controller();
if (isset($_GET['id_question'])) {
  $list->del_question($_SESSION['id'],$_GET['id_question']);
}
if (isset($_GET['id_video'])) {
  $list->del_video($_GET['id_video']);
}
?>
