<?php
declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/feature/student_module.php';
class student_controller
{
  private $sql;
  private $student;
    public function __construct()
    {
        $this->student = new student();
    }
    public function answer(int $id_question,int $id_answer,int $id_user)
    {
      $this->student->answer($id_question,$id_answer,$id_user);
    }
}


 ?>
