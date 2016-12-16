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
    public function exercise(array $id_answer, array $id_question, string $id_user)
    {
        $check = $this->student->answer($id_answer, $id_question, $id_user);
    }
    public function list_course(string $id_user,string $major)
    {
        $check = $this->student->list_course($id_user,$major);
        if ($check != null && gettype($check) == 'array') {
            $this->view->list_course($check, $id_user);
        } else {
            echo '<h1>ยังไม่พบคอร์สเรียนนี้</h1>';
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
    public function show_exercise(string $id_course)
    {
        $check = $this->student->show_exercise($id_course);
        if ($check != null && gettype($check) == 'array') {
            $this->view->exercise($check);
        }
    }
    public function exam($id_answer,$id_question, string $id_user)
    {
        $check = $this->student->answer_exam($id_answer, $id_question, $id_user);
        if ($check != null) {
          echo "<br><h2>คุณได้คะแนน ".$check." คะแนน</h2>";
        }
    }
    public function ranking()
    {
      $check = $this->student->ranking();
      $this->view->ranking($check);

    }
    public function content(string $id_course)
    {
      $check = $this->student->content($id_course);
      if ($check != null) {
        echo $check['data'];
      }
    }
    public function history(string $id_user)
    {
      $check = $this->student->history($id_user);
      if ($check != null && gettype($check) == 'array') {

      }
    }
}
