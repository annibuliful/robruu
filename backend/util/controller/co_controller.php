<?php
declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/feature/co_module.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/view/co_view.php';

class co_controller
{
  private $co ;
  private $view;
  function __construct()
  {
    $this->co = new co_func();
    $this->view = new co_view();
  }
  public function buy(string $id_course,int $id_user)
  {
    $check = $this->co->buy($id_course,$id_user);
    if ($check == 'have_course') {
      $this->view->buy_have();
    }elseif ($check == 'not_enough_money') {
      $this->view->buy_not_enough();
    }elseif ($chec == 'error') {
      $this->view->buy_error();
    }elseif ($check == 'not_login') {
      $this->view->buy_not_login();
    }elseif ($check == 'complete') {
      $this->view->buy_complete();
    }
  }
  public function comment(int $id_user, string $comment, string $id_video)
  {
    $this->co->comment($id_user,$comment,$id_video);
  }
  public function search(int $type, string $detail)
  {
    $this->co->search($type,$detail);
  }

}

 ?>
