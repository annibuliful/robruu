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
    public function answer(array $id_question, array $id_answer, string $id_user)
    {
      $return_score = 0;
      if (count($id_answer) == count($id_question)) {
        for ($i=0; $i <count($id_question) ; $i++) {
          $sql = $this->sql->prepare('SELECT * FROM check_user WHERE id_user = :id_user
                                      AND id_question = :id_question ;');
          $sql->bindparam(':id_user',$id_user,PDO::PARAM_INT);
          $sql->bindparam(':id_question',$id_question[$i],PDO::PARAM_STR);
          $sql->execute();
          $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if (!$fetch) {
          $sql = $this->sql->prepare('SELECT score,id FROM question WHERE id = :id_question AND id_answer = :id_answer ;');
          $sql->bindparam(':id_question', $id_question[$i], PDO::PARAM_STR);
          $sql->bindparam(':id_answer',$id_answer[$i],PDO::PARAM_STR);
          $sql->execute();
          $fetch = $sql->fetch(PDO::FETCH_ASSOC);
          if ($fetch) {
              $sql = $this->sql->prepare('UPDATE user SET score = score + :score
                                          WHERE id = :id_user ;');
              $sql->bindParam(':score',$fetch['score'],PDO::PARAM_INT);
              $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
              $sql->execute();
              $sql = $this->sql->prepare('INSERT INTO check_user(id_user,id_question)
                                          VALUES (:id_user ,:id_question )');
              $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
              $sql->bindParam(':id_question',$id_question[$i],PDO::PARAM_STR);
              $sql->execute();
              $return_score = (int)$return_score+ $fetch['score'];

          }
        }
        }
        echo"<h2>คุณได้คะแนน ".$return_score."</h2>";
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
    public function list_course(string $id_user,string $major = null)
    {
      if ($major == null) {
        $sql = $this->sql->prepare('SELECT * FROM course_user WHERE user_id = :id_user ');
        $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $sql->execute();
        return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
      }elseif ($major != null) {
        $sql = $this->sql->prepare('SELECT * FROM course_user WHERE user_id = :id_user AND major = :major ;');
        $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $sql->bindparam(':major',$major,PDO::PARAM_STR);
        $sql->execute();
        return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
      }



    }
    public function showdetail_course(string $id_course)
    {
        $sql = $this->sql->prepare('SELECT * FROM course WHERE id_playlist = :id_playlist AND flag_num >1 ;');
        $sql->bindParam(':id_playlist', $id_course, PDO::PARAM_INT);
        $sql->execute();

        return (array)$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function answer_exam($id_answer,$id_question,string $id_user)
    {
      $return_score = 0;
      if (count($id_answer) == count($id_question)) {
        for ($i=0; $i <count($id_question) ; $i++) {
          $sql = $this->sql->prepare('SELECT * FROM check_user WHERE id_user = :id_user AND id_question = :id_question ;');
          $sql->bindparam(':id_user',$id_user,PDO::PARAM_INT);
          $sql->bindparam(':id_question',$id_question[$i],PDO::PARAM_STR);
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
              $sql->bindParam(':id_question',$id_question[$i],PDO::PARAM_STR);
              $sql->execute();
              $return_score = (int)$return_score+ $fetch['score'];

          }
        }
        }
          return $return_score;
      }else {
        echo "<h1>โปรดตอบให้ครบทุกคำถาม</h1>";
      }


    }
    public function show_question(string $id_course)
    {
      $sql = $this->sql->prepare("SELECT * FROM question WHERE id_playlist = :id_course AND id LIKE '%exam_%' ");
      $sql->bindParam(':id_course',$id_course,PDO::PARAM_STR);
      $sql->execute();
      return (array)$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function show_exercise(string $id_course)
    {
      $sql = $this->sql->prepare("SELECT * FROM question WHERE id_playlist = :id_course AND
                                  id LIKE '%question_%' ");
      $sql->bindParam(':id_course',$id_course,PDO::PARAM_STR);
      $sql->execute();
      return (array)$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function ranking()
    {
      $sql = $this->sql->prepare('SELECT username FROM user ORDER BY money DESC');
      $sql->execute();
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function content(string $id_course)
    {
      $sql = $this->sql->prepare('SELECT data FROM content WHERE id_course = :id_course; ');
      $sql->bindParam(':id_course',$id_course,PDO::PARAM_STR);
      $sql->execute();
      return (array)$sql->fetch(PDO::FETCH_ASSOC);
    }
    public function history(string $id_user)
    {
      $sql = $this->sql->prepare('SELECT id_question FROM check_user WHERE id_user = :id_user ;');
      $sql->bindparam(':id_user',$id_user,PDO::PARAM_INT);
      $sql->execute();
      $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
      if ($fetch != null) {

      }
    }

}
    ?>
