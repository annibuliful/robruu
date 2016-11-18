<?php

class intructor
{
    private $sql;
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
    private $uuid;
    public function __construct()
    {
        $this->sql = new pdo('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->uuid = uniqid('question_');
    }
    public function video_upload(string $id_user, array $video, string $description = null, string $course_name, string $price = null)
    {
        $sql = $this->sql->prepare('SELECT id FROM user WHERE id= :id_user ;');
        $sql->bindParam(':id_user', $id_user);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('INSERT INTO video_playlist(id_playlist,course_name,
                                             description,price,id_video,id_author,flag_num)
                                            VALUES (:id_playlist ,:course_name ,:description ,:price ,
                                                    :id_video ,:id_author ,1)');
            $sql->bindParam(':id_playlist', uniqid());
            $sql->bindParam(':course_name', $course_name, PDO::PARAM_STR);
            $sql->bindParam(':description', $description, PDO::PARAM_STR);
            $sql->bindParam(':price', $price, PDO::PARAM_INT);
            $name = uniqid('video_').'.mp4';
            $sql->bindParam(':id_video', $name, PDO::PARAM_STR);
            $sql->bindParam(':id_author', $id_user, PDO::PARAM_INT);
            $sql->execute();
            move_uploaded_file($video['tmp_name'],
                               '../../frontend/store/videos/'.$name);

            return true;
        } else {
            echo 'ไม่มีชื่อผู้ใช้งาน';
            echo 'กำลังพาไปหน้าหลัก....';
            header('refresh: 3; url=index.html');
        }
    }
    public function make_course(int $id_user, int $id_video, string $course_name, int $price)
    {
        $sql = $this->sql->prepare('SELECT COUNT(id_video),id_video,id_playlist FROM video_playlist WHERE
                                    course_name = :course_name AND id_video = :id_video
                                    AND id_author = :id_author ;');
        $sql->bindParam(':course_name', $course_name, PDO::PARAM_STR);
        $sql->bindParam(':id_video', $id_video, PDO::PARAM_INT);
        $sql->bindParam(':id_author', $id_user, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        $flag = $fetch['COUNT(id_video)'] + 1;
        if ($fetch['id_video'] != $id_video) {
            $sql = $this->sql->prepare('INSERT INTO video_playlist(id_playlist,course_name,price,
                                      id_video,id_author,flag_num) VALUES (:id_playlist ,:course_name ,:price,
                                      :id_video,:id_author,:flag_num ) ;');
            $sql->bindParam(':id_playlist', uniqid(), PDO::PARAM_STR);
            $sql->bindParam(':course_name', $course_name, PDO::PARAM_STR);
            $sql->bindParam(':price', $price, PDO::PARAM_INT);
            $sql->bindParam(':id_video', $id_video, PDO::PARAM_INT);
            $sql->bindParam(':id_author', $id_user, PDO::PARAM_INT);
            $sql->bindParam(':flag_num', $flag, PDO::PARAM_INT);
            $sql->execute();
            echo 'inserted';

            return true;
        } else {
            $this->update_course($id_video, $id_user, $course_name, $flag, $fetch['id_playlist']);
            echo 'updated';
        }
    }
    public function update_course(int $id_video, int $id_user, string $course_name, int $flag_num, string $id_playlist)
    {
        $sql = $this->sql->prepare('INSERT INTO video_playlist(id_playlist,course_name,price,id_video,id_author,flag_num)
                                VALUES (:id_playlist,:course_name ,0,:id_video ,:id_author ,:flag_num ) ;');
        $sql->bindParam(':id_playlist', $id_playlist, PDO::PARAM_STR);
        $sql->bindParam(':course_name', $course_name, PDO::PARAM_STR, 120);
        $sql->bindParam(':id_video', $id_video, PDO::PARAM_INT, 50);
        $sql->bindParam(':id_author', $id_user, PDO::PARAM_INT, 10);
        $sql->bindParam(':flag_num', $flag_num, PDO::PARAM_INT);
        $sql->execute();
    }
    public function list_course(string $id_author)
    {
        $sql = $this->sql->prepare('SELECT * FROM video_playlist WHERE id_author = :id_author ;');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function del_question(string $id_author, string $id_question)
    {
        $sql = $this->sql->prepare('SELECT id FROM picture WHERE id = :id_question AND id_author = :id_author ;');
        $sql->bindParam(':id_question', $id_question, PDO::PARAM_STR);
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('DELETE FROM picture WHERE id = :id_question AND id_author = :id_author ;');
            $sql->bindParam(':id_question', $id_question, PDO::PARAM_STR);
            $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }
    public function question_detail(string $id_author, string $id_picture)
    {
        $sql = $this->sql->prepare('SELECT * FROM picture WHERE id_author = :id_author
                                  AND id = :id_picture ;');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->bindParam(':id_picture', $id_picture, PDO::PARAM_STR);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }
    public function get_question(string $id_author, string $id_question)
    {
        $sql = $this->sql->prepare('SELECT * FROM picture WHERE id = :id_question
                                  AND id_author = :id_author ;');
        $sql->bindParam(':id_question', $id_question, PDO::PARAM_STR);
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->execute();

        return (array) $sql->fetch(PDO::FETCH_ASSOC);
    }
    public function edit_question(string $id_author, string $id_question, string $id_answer, string $answer1, string $answer2, string $answer3, string $answer4, int $score)
    {
        $id_answer1 = (int) $id_answer - 1;
        $sql = $this->sql->prepare('SELECT id FROM picture WHERE id = :id_question AND id_author = :id_author ;');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->bindParam(':id_question', $id_question, PDO::PARAM_STR);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('UPDATE picture SET id_answer = :id_answer ,
                                   score = :score ,answer1 = :answer1 ,answer2 = :answer2
                                   answer3 = :answer3 ,answer4 = :answer4 WHERE id = :id_question
                                  AND id_author = :id_author ;');
            $sql->bindParam(':id_answer', $id_answer, PDO::PARAM_INT);
            $sql->bindParam(':score', $score, PDO::PARAM_INT);
            $sql->bindParam(':answer1', $answer1, PDO::PARAM_STR);
            $sql->bindParam(':answer2', $answer2, PDO::PARAM_STR);
            $sql->bindParam(':answer3', $answer3, PDO::PARAM_STR);
            $sql->bindParam(':answer4', $answer4, PDO::PARAM_STR);
            $sql->bindParam(':id_question', $id_question, PDO::PARAM_STR);
            $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }
    public function make_question(string $id_author,string $question,string $id_answer,string $answer1,string $answer2,string $answer3,string $answer4,string $score)
    {
      $sql = $this->sql->prepare('SELECT id FROM user WHERE id = :id_author');
      $sql->bindParam(':id_author',$id_author,PDO::PARAM_INT);
      $sql->execute();
      $fetch = $sql->fetch(PDO::FETCH_COLUMN);
      if ($fetch == true) {
          $sql = $this->sql->prepare('INSERT INTO question VALUES
                                      (:id ,:id_author,:question ,:answer1 ,:answer2 ,:answer3 ,:answer4,
                                       :score ,:id_answer,0)');
          $sql->bindParam(':id', $this->uuid, PDO::PARAM_STR);
          $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
          $sql->bindParam(':question', $question, PDO::PARAM_STR);
          $sql->bindParam(':answer1', $answer1, PDO::PARAM_STR);
          $sql->bindParam(':answer2', $answer2, PDO::PARAM_STR);
          $sql->bindParam(':answer3', $answer3, PDO::PARAM_STR);
          $sql->bindParam(':answer4', $answer4, PDO::PARAM_STR);
          $sql->bindParam(':score', $score, PDO::PARAM_INT);
          $sql->bindParam(':id_answer', $id_answer, PDO::PARAM_INT);
          $sql->execute();
          return true;
      }else {
        return false;
      }
    }
}
?>
