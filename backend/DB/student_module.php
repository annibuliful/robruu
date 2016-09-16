<?php

include 'connect_DB.php';
class student
{
    private $ID_user;
    private $grade;
    private $sql;
    private $question_id;
    private $answer;
    public function __construct($user_id, $level)
    {
        $this->ID_user = $user_id;
        $this->grade = $level;
        $this->sql = new PDO("mysql:host=localhost;dbname=robruu_online", 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function answer($question_id, $answer)
    {
        $this->question_id = $question_id;
        $this->answer = $answer;
        $answer = $this->sql->prepare('SELECT * FROM user WHERE id = :user;');
        $answer->bindparam(':user', $this->ID_user, PDO::PARAM_INT);
        $answer->execute();
        $fetch = $answer->fetch();
        if ($fetch) {
            $answer = $this->sql->prepare('SELECT * FROM question WHERE id= :question_id AND id_answer= :answer');
            $answer->bindparam(':question_id', $this->question_id, PDO::PARAM_INT);
            $answer->bindparam(':answer', $this->answer, PDO::PARAM_STR);
            $answer->execute();
            $fetch = $answer->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                $score = $this->sql->prepare('UPDATE score = socre + :score WHERE id= :id ;');
                $score->bindparam(':score', $fetch['score'], PDO::PARAM_INT);
                $score->bindparam(':id', $this->ID_user);
                $score->execute();
                $show_score = $score->fetch();
                echo 'คุณได้คะแนน '.$this->sql->fetch['score'];
            } else {
                echo 'ตอบไม่ถูก';
            }
        } else {
            echo 'ไม่มีชื่อผู้ใช้นี้ โปรดลงชื่อเข้าใช้ก่อน';
            header('refresh: 2; url=XXXXXXXXX');
        }
    }
    public function list_tutor()
    {
        $list = $this->sql->prepare('SELECT * FROM following WHERE id_u = :ID_user');
        $list->bindparam(':ID_user', $this->ID_user, PDO::PARAM_INT);
        $list->execute();
        $fetch = $list->fetch(PDO::FETCH_ASSOC);

        return (array) $fetch;
    }
}?>
