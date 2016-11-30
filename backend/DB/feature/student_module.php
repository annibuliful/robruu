<?php

class student
{
    private $ID_user;
    private $grade;
    private $sql;
    private $question_id;
    private $answer;
    public function __construct()
    {
        $this->sql = new PDO('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function answer(string $id_question, string $id_answer, string $id_user)
    {
        $sql = $this->sql->prepare('SELECT * FROM check_user WHERE id_user = :id_user AND id_question = :id_question ;');
        $sql->bindparam(':id_user',$id_user,PDO::PARAM_INT);
        $sql->bindparam(':id_question',$id_question,PDO::PARAM_STR);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
      if (!$fetch) {

        $sql = $this->sql->prepare('SELECT score,id FROM question WHERE id = :id_question AND id_answer = :id_answer ;');
        $sql->bindparam(':id_question', $id_question, PDO::PARAM_STR);
        $sql->bindparam(':id_answer',$id_answer,PDO::PARAM_STR);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('UPDATE user SET score = score + :score WHERE id = :id_user ;');
            $sql->bindParam(':score',$fetch['score'],PDO::PARAM_INT);
            $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
            $sql->execute();
            $sql = $this->sql->prepare('INSERT INTO check_user(id_user,id_question) VALUES (:id_user ,:id_question )');
            $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
            $sql->bindParam(':id_question',$id_question,PDO::PARAM_STR);
            $sql->execute();
            echo"<h2>คุณได้คะแนน ".$fetch['score']."</h2>";
        }else {
          echo "<h2>คุณตอบไม่ถูก</h2>";
        }
      }else {
        echo "<h2>คุณตอบข้อนี้ไปแล้ว</h2>";
      }

    }
    public function list_tutor(int $id_user)
    {
        $list = $this->sql->prepare('SELECT * FROM following WHERE id_u = :ID_user');
        $list->bindparam(':ID_user', $id_user, PDO::PARAM_INT);
        $list->execute();
        $fetch = $list->fetchAll(PDO::FETCH_ASSOC);

        return (array) $fetch;
    }
    public function list_course(string $id_user)
    {
        $sql = $this->sql->prepare('SELECT * FROM course_user WHERE user_id = :id_user');
        $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $sql->execute();

        return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function showdetail_course(string $id_course)
    {
        $sql = $this->sql->prepare('SELECT * FROM course WHERE id_playlist = :id_playlist ;');
        $sql->bindParam(':id_playlist', $id_course, PDO::PARAM_INT);
        $sql->execute();

        return (array)$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function answer_exam(array $id_answer,array $id_question,string $id_user)
    {
      $return_score = 0;
      for ($i=0; $i <count($id_question) ; $i++) {
        $sql = $this->sql->prepare('SELECT * FROM check_user WHERE id_user = :id_user AND id_question = :id_question ;');
        $sql->bindparam(':id_user',$id_user,PDO::PARAM_INT);
        $sql->bindparam(':id_question',$id_question,PDO::PARAM_STR);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
      if (!$fetch) {

        $sql = $this->sql->prepare('SELECT score,id FROM question WHERE id = :id_question AND id_answer = :id_answer ;');
        $sql->bindparam(':id_question', $id_question[$i], PDO::PARAM_STR);
        $sql->bindparam(':id_answer',$id_answer[$i],PDO::PARAM_STR);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('UPDATE user SET score = score + :score WHERE id = :id_user ;');
            $sql->bindParam(':score',$fetch['score'],PDO::PARAM_INT);
            $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
            $sql->execute();
            $sql = $this->sql->prepare('INSERT INTO check_user(id_user,id_question) VALUES (:id_user ,:id_question )');
            $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
            $sql->bindParam(':id_question',$id_question,PDO::PARAM_STR);
            $sql->execute();
            $return_score += (int)$fetch['score'];
        }
      }
      }
      echo"<h2>คุณได้คะแนน ".$return_score."</h2>";
    }
}
    ?>
