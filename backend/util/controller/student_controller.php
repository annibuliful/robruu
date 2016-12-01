<?php

declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/feature/student_module.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/view/student_view.php';
class student_controller
{
    private $student;
    private $view;
    public function __construct()
    {
        $this->student = new student();
        $this->view = new student_view();
    }
    public function answer(string $id_question, string $id_answer, string $id_user)
    {
        $this->student->answer($id_question, $id_answer, $id_user);
      /*if ($check == 'true') {
        $this->view->answer_true();
      }elseif ($check == 'false') {
        $this->view->answer_false();
      }elseif ($check == 'answered') {
        $this->view->answer_answered();
      }*/
    }
    public function list_course(string $id_user)
    {
        $check = $this->student->list_course($id_user);
        if ($check != null && gettype($check) == 'array') {
            $this->view->list_course($check, $id_user);
        } else {
            echo 'error';
        }
    }
    public function showdetail_course(string $id_course)
    {
        $check = $this->student->showdetail_course($id_course);
        if ($check != null && gettype($check) == 'array') {
            $this->view->showdetail_course($check);
        } else {
            echo 'error';
        }
    }
    public function show_question(string $id_course)
    {
        $check = $this->student->show_question($id_course);
        if ($check != null && gettype($check) == 'array') {
            $this->view->question($check);
        }
    }
    public function exam(array $id_answer, array $id_question, string $id_user)
    {
        $check = $this->student->answer_exam($id_answer, $id_question, $id_user);
    }
    public function ranking()
    {
      $check = $this->student->ranking();
      $this->view->ranking($check);

    }
}
