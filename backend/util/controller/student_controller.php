<?php
declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/feature/student_module.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/view/student_view.php';
class student_controller
{
  private $student;
  private $view ;
    public function __construct()
    {
        $this->student = new student();
        $this->view = new student_view();
    }
    public function answer(int $id_question,int $id_answer,int $id_user)
    {
       $check = $this->student->answer($id_question,$id_answer,$id_user);
      if ($check == 'true') {
        echo "1";
        $this->view->answer_true();
      }elseif ($check == 'false') {
        echo "2";
        $this->view->answer_false();
      }elseif ($check == 'answered') {
        echo "3";
        $this->view->answer_answered();
      }

    }
    public function list_course(int $id_user)
    {
        $check = $this->student->list_course($id_user);
        if ($check != null) {
          $this->view->list_course($check);
        }
    }
}
// tested with answer function
// tested with list course function 
 ?>
