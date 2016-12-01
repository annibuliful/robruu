<?php
declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/model/get_data_main.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/view/main_view.php';

class main_controller
{
  private $user;
  private $view;
  function __construct()
  {
    $this->view = new main_view();
  }
  public function user(int $user)
  {
    $check = $this->user->user_detail($user);
    if ($check != null) {
      $this->view->loged($check);
    }
  }
  public function ranking()
  {
    $check = $this->user->ranking();
    $this->view->ranking($check);
  }
}
 ?>
