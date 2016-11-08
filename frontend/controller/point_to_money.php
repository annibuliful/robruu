<?php
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/co_controller.php';
$list = new co_controller();
if (isset($_GET['id_user'])) {
  $list->point_to_money($_GET['id_user']);
  header('location: ../../frontend/main.php');
}
 ?>
