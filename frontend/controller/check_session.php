<?php
declare(strict_types=1);
require '../../backend/util/controller/authen_controller.php';
$check = new authen_controller();
$check->check_session($_POST['session']);
 ?>
