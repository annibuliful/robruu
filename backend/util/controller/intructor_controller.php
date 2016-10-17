<?php

declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/feature/intructor_module.php';
class intructor_controller
{
  private $intructor;
    public function __construct()
    {
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
    public function video(int $id_user, array $video)
    {
      $this->intructor->video_upload($id_user,$video);
    }
    public function make_course(int $id_user,int $id_video,string $course_name,int $price)
    {
      $this->intructor->make_course($id_user,$id_video,$course_name,$price);
    }
}
?>
