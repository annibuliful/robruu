<?php

declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/feature/intructor_module.php';
class intructor_controller
{
  private $sql;
  private $intruction;
    public function __construct()
    {
        $this->sql = new PDO('mysql:dbname=robruu_online;host=127.0.0.1', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->intructor = new intructor();
    }
    public function question(array $picture,int $id_author,int $id_answer,array $choices, int $id_question,int $check_c,int $score)
    {
        $check1 = $this->intructor->picture_upload($picture,$id_author,$id_answer,$score);
        $check2 = $this->intructor->make_choices($choices,$id_author,$id_question, $check_c);
        if ($check1 == true && $check2 == true) {
          echo "yes";
        }else {
          echo "false";
        }
    }
}
$s = new intructor_controller();
$s->question($_FILES['upload'],1,2,$_POST['email'],1,2,1);

?>
