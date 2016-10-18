<?php
declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/feature/co_module.php';

class co_controller
{
  private $co ;
  function __construct()
  {
    $this->co = new co_func();
  }
  public function buy(string $id_course,int $id_user)
  {
    $this->co->buy($id_course,$id_user);
  }
  public function comment(int $id_user, string $comment, string $id_video)
  {
    $this->co->comment($id_user,$comment,$id_video);
  }
}

 ?>
