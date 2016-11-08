<?php
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
$list = new student_controller();
$list->list_course($_POST['id_video']);

 ?>
