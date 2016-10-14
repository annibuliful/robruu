<?php

class intruction
{
    private $pdo;
    private $id_user;
    private $detail;
    private $score;
    private $video = array();
    private $dir;
    private $price;
    private $course_name;
    private $id_video;
    private $flag_num;
    private $question;
    private $level;
    private $concept;
    private $hint;
    private $answer;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
    }
    public function make_question($id_user, $detail, $score, $level, $answer, $hint, $concept)
    {
        $this->id_user = $id_user;
        $this->detail = $detail;
        $this->score = $score;
        $this->level = $level;
        $this->answer = $answer;
        $this->hint = $hint;
        $this->concept = $concept;
        $sql = $this->pdo->prepare('SELECT * FROM user WHERE id_user= :id_user ;');
        $sql->bindParam(':id_user', $this->id_user);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            try {
                $make = $this->pdo->prepare('INSERT INTO question(id_user,detail,score,level,
                                                         answer,hint,concept)
                                              VALUES (:id_user ,:detail ,:score ,:level ,
                                                      :answer ,:hint ,:concept );');
                $make->bindParam(':id_user', $this->id_user, PDO::PARAM_INT);
                $make->bindParam(':detail', $this->detail, PDO::PARAM_STR);
                $make->bindParam(':score', $this->score, PDO::PARAM_INT);
                $make->bindParam(':level', $this->level, PDO::PARAM_INT);
                $make->bindParam(':answer', $this->answer, PDO::PARAM_STR);
                $make->bindParam(':hint', $this->hint, PDO::PARAM_STR);
                $make->bindParam(':concept', $this->concept0, PDO::PARAM_STR);
                $make->execute();
            } catch (PDOException $e) {
                echo 'error: '.$e->getMessage();
            }
        }
    }
    public function return_savedraft($id_user)
    {
        $this->id_user = $id_user;
        $sql = $this->pdo->prepare('SELECT * FROM save_draft WHERE id_user = :id_user ;');
        $sql->bindParam(':id_user', $this->id_user, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);

        return (array) $fetch;
    }
    public function save_draft($id_user, $question)
    {
        $return = array();
        $this->id_user = $id_user;
        $this->question = $question;
        $sql = $this->pdo->prepare('SELECT * FROM save_draft WHERE id = :id_user ;');
        $sql->bindParam(':id_user', $this->id_user);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            if ($data != null) {
                $sql->prepare('UPDATE user SET question = :question WHERE id_user = :id_user ;');
                $sql->bindParam(':id_user', $this->id_user, PDO::PARAM_INT);
                $sql->bindParam(':question', $this->question, PDO::PARAM_INT);
                $sql->execute();
            } else {
                $return = $fetch;
            }
        } else {
            $sql = $this->pdo->prepare('INSERT INTO save_draft(id_user,question)
                                    VALUES (:id_user ,:question ) ;');
            $sql->bindParam(':id_user');
            $sql->bindParam(':question');
            $sql->execute();
        }

        return $return;
    }
    public function picture_upload(array $picture)
    {
      $sql = $this->pdo->prepare('SELECT * FROM user WHERE username= :username ;');
      $sql->bindParam(':username', $this->id_user);
      $sql->execute();
      $fetch = $sql->fetch(PDO::FETCH_ASSOC);
      if ($fetch) {
          $sql = $this->pdo->prepare('INSERT INTO picture(id_auther,name,score,rating)
                                      VALUES (:id_author ,:name ,:score ,0);');
          $sql->bindParam(':id_author',$id_autho,PDO::PARAM_INT);
          $sql->bindParam(':name',$picture['name'],PDO::PARAM_STR);
          $sql->bindParam(':score',$score,PDO::PARAM_INT);
          $sql->execute();
          move_uploaded_file($this->picture['tmp_name'],
                             "C:/Users/Dell/Documents/GitHub/robruu/backend/store/videos/".$picture['name']);
      } else {
          echo 'ไม่มีชื่อผู้ใช้งาน';
          echo 'กำลังพาไปหน้าหลัก....';
          header('refresh: 3; url=index.php');
      }
    }
    public function video_upload($id_user, array $video, $dir, $price)
    {
        $this->price = $price;
        $this->dir = $dir;
        $this->video = $video;
        $this->id_user = $id_user;
        $sql = $this->pdo->prepare('SELECT * FROM user WHERE username= :username ;');
        $sql->bindParam(':username', $this->id_user);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->pdo->prepare('INSERT INTO video(name,id_author,date,price)
                                        VALUES (:video , :id_user , :date ,:price);');
            $sql->bindParam(':video', $this->video['name'].$this->user_id,PDO::PARAM_STR);
            $sql->bindParam(':id_user', $this->user_id,PDO::PARAM_INT);
            $sql->bindParam('date', date('d / m / Y'));
            $sql->bindParam(':price', $this->price,PDO::PARAM_INT);
            $sql->execute();
            move_uploaded_file($this->video['tmp_name'],
                               "C:/Users/Dell/Documents/GitHub/robruu/backend/store/videos/".$video['name']);
        } else {
            echo 'ไม่มีชื่อผู้ใช้งาน';
            echo 'กำลังพาไปหน้าหลัก....';
            header('refresh: 3; url=index.php');
        }
    }
    public function make_course($id_user, $id_video, $course_name, $price)
    {
        $this->id_user = $id_user;
        $this->id_video = $id_video;
        $this->course_name = $course_name;
        $this->price = $price;
        $sql = $this->pdo->prepare('SELECT id FROM user WHERE id = :id_user');
        $sql->bindParam(':id_user', $this->id,PDO::PARAM_INT);
        $Sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->pdo->prepare('SELECT COUNT(id_video) FROM video_playlist WHERE
                                    course_name = :course_name AND id_user = :id_author ;');
            $sql->bindParam(':course_name', $this->course_name);
            $sql->bindParam('id_author', $this->id_user);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_COLUMN);
            if (!$fetch) {
                $sql = $this->pdo->prepare('INSERT INTO video_playlist(course_name,price,id_video,id_user,flag_num)
                                      VALUES (:course_name ,0,:id_video ,:id_user ,1);');
                $sql->bindParam(':course_name', $this->course_name);
                $sql->bindParam(':id_video', $this->video_id);
                $sql->bindParam(':id_user', $this->id_user);
                $sql->execute();
                echo 'สร้าง playlist เรียบร้อย';
            } else {
                update_playlist($id_video, $id_user, $course_name, $fetch[0]);
            }
        } else {
            echo 'คุณยังไม่ได้เข้าสู่ระบบ';
            echo 'กำลังพาไปหน้าหลัก....';
            header('refresh: 3; url=index.php');
        }
    }
    public function update_course($id_video, $id_user, $course_name, $flag_num)
    {
        $this->id_video = $id_video;
        $this->course_name = $course_name;
        $this->id_user = $id_user;
        $this->flag_num = $flag_num;
        $sql = $this->pdo->prepare('INSERT INTO video_playlist(course_name,price,id_video,id_user,flag_num)
                                VALUES (:course_name ,0,:id_video ,:id_user ,:flag_num)');
        $sql->bindParam(':course_name', $this->course_name, PDO::PARAM_STR, 120);
        $sql->bindParam(':id_video', $this->id_video, PDO::PARAM_INT, 50);
        $sql->bindParam(':id_user', $this->id_user, PDO::PARAM_INT, 10);
        $sql->bindParam(':flag_num', $this->flag_num, PDO::PARAM_INT, 4);
        $sql->execute();
    }
}
