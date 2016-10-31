<?php
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
$login = new authen_controller();
$login->register($_POST['user'],$_POST['pass'],$_POST['email']);
 ?>
