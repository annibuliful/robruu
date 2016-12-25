<?php

declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/feature/co_module.php';
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/view/co_view.php';

class co_controller
{
    private $co;
    private $view;
    public function __construct()
    {
        $this->co = new co_func();
        $this->view = new co_view();
    }
    public function buy(string $id_course, int $id_user)
    {
        $check = $this->co->buy($id_course, $id_user);
    }
    public function comment(int $id_user, string $comment, string $id_video)
    {
        if ($comment == null) {
          $this->view->list_comment_video($this->co->list_comment($id_post));
        }elseif ($comment != null) {
          $check = $this->co->comment_video();
          if ($check == false) {
            echo "เกิดปัญหาการแสดงความคิดเห็น";
          }elseif ($check == true) {
            $this->view->list_comment_video($this->co->list_comment($id_post));
          }
        }
    }
    public function rating(int $id_user, string $id_question = null, string $id_playlist = null)
    {
        $check = $this->co->rating($id_user, $id_question, $id_playlist);
        if ($check == 'error') {
            $this->view->rating_error();
        } else {
            echo'OK';
        }
    }
    public function search(string $detail,string $id_user,string $major=null)
    {
        $check = $this->co->search($detail,$major);
        if ($check != null) {
            $this->view->search($id_user,$check);
        } else {
            echo '<h2>ไม่เจอคอสเรียนนี้</h2>';
        }
    }
    public function point_to_money(string $id_user)
    {
      $check = $this->co->point_to_money($id_user);
    }
}
