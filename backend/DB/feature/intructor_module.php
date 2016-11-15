<?php

class intructor
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
    private $uuid;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->uuid = uniqid('question_');
    }
    public function picture_upload(array $picture,string $answer1,string $answer2,string $answer3,string $answer4, string $id_author, string $id_answer, string $score)
    {
        $sql = $this->pdo->prepare('SELECT * FROM user WHERE id= :username ;');
        $sql->bindParam(':username', $id_author, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->pdo->prepare('INSERT INTO picture(id,id_author,name,answer1,answer2,answer3,answer4,score,id_answer,rating)
                                      VALUES (:id ,:id_author ,:name,:answer1 ,:answer2 ,:answer3 ,:answer4 ,:score ,:id_answer ,0);');
            $sql->bindParam(':id',$this->uuid,PDO::PARAM_STR);
            $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
            $sql->bindParam(':name', $picture['name'], PDO::PARAM_STR);
            $sql->bindParam(':answer1',$answer1,PDO::PARAM_STR);
            $sql->bindParam(':answer2',$answer2,PDO::PARAM_STR);
            $sql->bindParam(':answer3',$answer3,PDO::PARAM_STR);
            $sql->bindParam(':answer4',$answer4,PDO::PARAM_STR);
            $sql->bindParam(':score', $score, PDO::PARAM_INT);
            $sql->bindParam(':id_answer', $id_answer, PDO::PARAM_INT);
            $sql->execute();
            move_uploaded_file($picture['tmp_name'],
                             '../../frontend/store/pictures/'.$picture['name']);

            return true;
        } else {
            echo 'ไม่มีชื่อผู้ใช้งาน';
            echo 'กำลังพาไปหน้าหลัก....';
            //header('refresh: 3; url=index.php');

            return false;
        }
    }
  /*  public function make_choices(array $choices, string $id_author)
    {
        $sql = $this->pdo->prepare('SELECT id FROM picture WHERE id_author = :id ;');
        $sql->bindParam(':id', $id_author, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->pdo->prepare('SELECT id_question FROM choice_question
                                        WHERE id_question = :id_question ;');
            $sql->bindParam(':id_question', $this->uuid, PDO::PARAM_STR);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if (!$fetch) {
                for ($i = 0; $i < count($choices); ++$i) {
                    $sql = $this->pdo->prepare('INSERT INTO choice_question(id_question,id_user,detail,num_choice)
                            VALUES (:id_question ,:id_user ,:detail ,:num_choice );');
                    $sql->bindParam(':id_question', $this->uuid, PDO::PARAM_STR);
                    $sql->bindParam(':id_user', $id_author, PDO::PARAM_INT);
                    $sql->bindParam(':detail', $choices[$i], PDO::PARAM_STR);
                    $sql->bindParam(':num_choice', $i, PDO::PARAM_INT);
                    $sql->execute();
                }
              return true;
            } else {
                return 'โจทย์นี้มี choice แล้ว ';
                return false;
            }
            return true;
        } else {
            return false;
        }

        return false;
    }
*/
    public function video_upload(string $id_user, array $video, string $description = null, string $course_name, string $price = null)
    {
        $sql = $this->pdo->prepare('SELECT id FROM user WHERE id= :id_user ;');
        $sql->bindParam(':id_user', $id_user);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->pdo->prepare('INSERT INTO video_playlist(id_playlist,course_name,
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
        $sql = $this->pdo->prepare('SELECT COUNT(id_video),id_video,id_playlist FROM video_playlist WHERE
                                    course_name = :course_name AND id_video = :id_video
                                    AND id_author = :id_author ;');
        $sql->bindParam(':course_name', $course_name, PDO::PARAM_STR);
        $sql->bindParam(':id_video', $id_video, PDO::PARAM_INT);
        $sql->bindParam(':id_author', $id_user, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        $flag = $fetch['COUNT(id_video)'] + 1;
        if ($fetch['id_video'] != $id_video) {
            $sql = $this->pdo->prepare('INSERT INTO video_playlist(id_playlist,course_name,price,
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
        $sql = $this->pdo->prepare('INSERT INTO video_playlist(id_playlist,course_name,price,id_video,id_author,flag_num)
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
        $sql = $this->pdo->prepare('SELECT * FROM video_playlist WHERE id_author = :id_author ;');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function question_detail(int $id_author,string $id_picture)
    {
      $sql = $this->sql->prepare('SELECT * FROM picture WHERE id_author = :id_author AND id = :id_picture ;');
      $sql->bindParam(':id_author',$id_author,PDO::PARAM_INT);
      $sql->bindParam(':id_picture',$id_picture,PDO::PARAM_STR);
      $sql->execute();
      return $sql->fetch(PDO::FETCH_ASSOC);
    }
}
