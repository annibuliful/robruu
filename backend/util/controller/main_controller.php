<?php
declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/feature/user.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/view/authen_view.php';

class main_controller
{
  private $user;
  private $view;
  function __construct()
  {
    $this->user = new user();
    $this->view = new authen_view();
  }
  public function user(int $user)
  {
    $check = $this->user->user_detail($user);
    if ($check != null) {
      $this->view->loged($check);
    }
  }
}
 ?>
