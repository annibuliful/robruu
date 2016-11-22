<?php

declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/feature/intructor_module.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/view/intructor_view.php';
class intructor_controller
{
    private $intructor;
    private $view;
    public function __construct()
    {
        $this->intructor = new intructor();
        $this->view = new intructor_view();
    }
    public function make_course(string $id_user, array $video, string $description = null, string $course_name, string $price = null,string $major)
    {
        $check = $this->intructor->make_course($id_user, $video, $description, $course_name, $price,$major);
        if ($check[0]= true && gettype($check) == 'array') {
            header("refresh: 3; url=../../edit_course.php?id_course={$check[1]}&id_user={$check[2]}");
        } else {
            echo '<h1>เกิดปัญหาการอัพโหลด</h1>';
        }
    }
    public function update_course(string $id_author, string $id_course, array $video, string $description = null)
    {
      $check = $this->intructor->update_course($id_author,$id_course,$video,$description);
      if ($check == true) {
        $this->view->update_course_true();
      }else {
        $this->view->update_course_false();
      }
    }
    public function get_list_video_course(string $id_course)
    {
        $check = $this->intructor->get_list_video_course($id_course);
        if ($check != null &&gettype($check) == 'array') {
          $this->view->get_list_video_course($check);
        }else {
          echo "เกิดปัญหาในการแก้ไข";
        }
    }
    public function list_course(string $id_author)
    {
        $check = $this->intructor->list_course($id_author);
        if ($check != null && gettype($check) == 'array') {
          $this->view->list_course($check);
        }else {
          echo "error";
        }
    }
    public function question(string $id_author,string $question,string $id_answer,string $answer1,string $answer2,string $answer3,string $answer4,string $score)
    {
        $check = $this->intructor->make_question($id_author,$question,$id_answer,$answer1,$answer2,$answer3,$answer4,$score);
        if ($check == true) {
            $this->view->question_true();
        } else {
            $this->view->question_false();
        }

    }
    public function get_question(string $id_author,string $id_question)
    {
      $check = $this->intructor->get_question($id_author,$id_question);
      if ($check != null && gettype($check) == 'array') {
        $this->view->detail_question($check);
      }else {
        $this->view->detail_question_false();
      }
    }
    public function del_question(string $id_author,string $id_question)
    {
      $check = $this->intructor->del_question($id_author,$id_question);
      if ($check == true) {
        $this->view->del_question_true();
      }else {
        $this->view->del_question_false();
      }
    }
    public function make_exam(string $id_author,string $question,string $id_answer,string $answer1,string $answer2,string $answer3,string $answer4,string $id_course)
    {
      $check = $this->intructor->make_exam($id_author, $question,$id_answer,$answer1,$answer2,$answer3,$answer4,$id_course);
      if ($check == true) {
        $this->view->make_exam_true();
      }else {
        $this->view->make_exam_false();
      }
    }
}
$s = new intructor_controller();
$s->update_course($_POST['id_author'],$_POST['id_course'],$_FILES['video'],$_POST['description']);

?>
