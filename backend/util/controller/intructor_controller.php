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
    public function question(array $picture,string $answer1,string $answer2,string $answer3,string $answer4, string $id_author, string $id_answer, string $score)
    {
        $check1 = $this->intructor->picture_upload($picture,$answer1,$answer2,$answer3,$answer4, $id_author, $id_answer, $score);
        if ($check1 == true) {
            echo 'สร้างโจทย์สำเร็จ';
        } else {
            echo 'error';
        }

    }
}
?>
