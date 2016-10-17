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
    $co = $this->co->buy($id_course,$id_user);
  }
}
$s = new co_func();
$s->buy('58043b652e3cb',1);

 ?>
