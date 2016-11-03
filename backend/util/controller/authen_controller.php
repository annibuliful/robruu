<?php

session_start();
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/authen/authen_DB.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/view/authen_view.php';
class authen_controller
{
    private $authen;
    private $view;
    public function __construct()
    {
        $this->authen = new authen_DB();
        $this->view = new authen_view();
    }
    public function register($user, $password, $email, $flag)
    {
        $check = $this->authen->register($user, $password, $email, $flag);
        if ($check == 'registered') {
            $this->view->registered();
        } elseif ($check == 'have_user') {
            $this->view->have_user();
        }
    }
    public function login($user, $password, $email)
    {
        $check = $this->authen->login($user, $password, $email);
        if ($check != null && gettype($check) == 'integer') {
          $_SESSION['id'] = $check;
        } elseif ($check == 'please_register') {
            $this->view->please_register();
        } elseif ($check == 'failed') {
            $this->view->login_failed();
        }
    }
    public function check_session(int $user)
    {
        $check = $this->authen->check_session($user);
        if ($check != null && gettype($check) == 'integer') {
            $this->view->check_session($check);
        } elseif ($check == false) {
        }
    }
}
