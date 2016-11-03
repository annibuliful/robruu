<?php
declare(strict_types=1);
class user
{
  private $sql;
  function __construct()
  {
    $this->sql = new PDO('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
    $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  public function user_detail(int $id_user)
  {
    $sql = $this->sql->prepare('SELECT * FROM user WHERE id = :id_user ');
    $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
    $sql->execute();
    return $sql->fetch(PDO::FETCH_ASSOC);
  }
}

 ?>
