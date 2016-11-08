<?php
session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
$authen = new authen_controller();
if (isset($_POST['user']) && isset($_POST['pass'])) {
    $authen->login($_POST['user'], $_POST['pass'], $_POST['user']);
} elseif (isset($_SESSION['id'])) {
    $authen->check_session($_SESSION['id']);
} else {
    header('refresh: 2; url=index.php');
    exit(0);
}?>
