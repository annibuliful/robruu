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
    public function make_course(string $id_user, array $video, string $description = null, string $course_name, string $price = null)
    {
        $check = $this->intructor->video_upload($id_user, $video, $description, $course_name, $price);
        if ($check == true) {
            echo 'สร้างคอสเรียนสำเร็จ';
        } else {
            echo 'error';
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
$s->make_exam('2','asdasdasdwwww','1','awsfwss','3ewewrr','4ertstsdsa','rtst','58203fc2adc63');

?>
