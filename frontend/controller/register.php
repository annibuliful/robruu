<?php

require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
$login = new authen_controller();
if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['email'])) {
    $user = $_POST['user'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    //$flag = $_POST['flag'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $image = $_FILES['image'];
    $payment_number = $_POST['payment_number'];
    if ($payment_number == null) {
        $payment_number = '1';
        $login->register($user, $password, $email, 1, $name, '1', $image, $payment_number);
    } else {
        $login->register($user, $password, $email, $flag, $name, $surname, $image, $payment_number);
    }
} else {
    echo 'error';
}
