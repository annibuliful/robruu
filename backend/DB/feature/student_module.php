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
        $this->sql = new PDO("mysql:host=localhost;dbname=robruu_online", 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function answer(int $id_question,int $id_answer,int $id_user)
    {
        $answer = $this->sql->prepare('SELECT * FROM user WHERE id = :id ;');
        $answer->bindparam(':id', $id_user, PDO::PARAM_INT);
        $answer->execute();
        $fetch = $answer->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
          $sql = $this->sql->prepare('SELECT * FROM check_user WHERE id_question =:id_question AND id_user = :id_user');
          $sql->bindParam(':id_question',$id_question,PDO::PARAM_INT);
          $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
          $sql->execute();
          $fetch = $sql->fetch(PDO::FETCH_ASSOC);
          if ($fetch['id_question'] != $id_question) {
            $sql = $this->sql->prepare('SELECT id_answer,score FROM picture
                                        WHERE id = :id_question AND id_answer = :id_answer ');
            $sql->bindParam(':id_question',$id_question,PDO::PARAM_INT);
            $sql->bindParam(':id_answer',$id_answer,PDO::PARAM_INT);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch['id_answer'] == $id_answer) {
              $sql = $this->sql->prepare('UPDATE user SET score = score + :score WHERE id = :id_user ;');
              $sql->bindParam(':score',$fetch['score'],PDO::PARAM_INT);
              $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
              $sql->execute();
              $sql = $this->sql->prepare('INSERT INTO check_user(id_question,id_user) VALUES(:id_question, :id_user) ;');
              $sql->bindParam(':id_question',$id_question,PDO::PARAM_INT);
              $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
              $sql->execute();
              return true ;
            }else {
              return false;
            }
          }else {
          }

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
    public function list_course(int $id_user)
    {
      $sql = $this->sql->prepare('SELECT * FROM course_user WHERE id_user = :id_user');
      $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
      $sql->execute();
      $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
      return (array) $fetch ;
    }
}
?>
