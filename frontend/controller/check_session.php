<?php
declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
$check = new authen_controller();
$check->check_session($_POST['session']);
 ?>
