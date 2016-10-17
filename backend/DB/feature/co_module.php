<?php

declare(strict_types=1);
class co_func
{
    private $sql;
    private $user_id;
    private $detail;
    private $follow_id;
    private $price;
    private $course_id;
    public function __construct()
    {
        $this->sql = new PDO('mysql:dbname=robruu_online;host=127.0.0.1', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    }
    public function buy(string $id_course,int $id_user)
    {
        $sql = $this->sql->prepare('SELECT money FROM user WHERE id = :user_id');
        $sql->bindParam(':user_id', $id_user,PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('SELECT price,flag_num FROM video_playlist WHERE id_playlist = :id ;');
            $sql->bindParam(':id', $id_course,PDO::PARAM_INT);
            $sql->execute();
            $fetch1 = $sql->fetch(PDO::FETCH_ASSOC);
            print_r($fetch1);
            if ($fetch1 == true && $fetch1['flag_num'] == 1) {
              $sql = $this->sql->prepare('SELECT * FROM course_user WHERE user_id = :id_user ;');
              $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
              $sql->execute();
              $fetch3 = $sql->fetch(PDO::FETCH_ASSOC);
              print_r($fetch3);
              if (!$fetch3) {
                if ($fetch['money'] >= $fetch1['price']) {
                    $sql = $this->sql->prepare('INSERT INTO course_user(user_id,course_id)
                                                VALUES (:id_user ,:id_course ) ;');
                    $sql->bindParam(':id_user', $id_user);
                    $sql->bindParam(':id_course', $id_course);
                    $sql->execute();
                    $sql = $this->sql->prepare('UPDATE user SET
                                                money = money - :price WHERE id = :id_user ; ');
                    $sql->bindParam(':price', $fetch1['price'], PDO::PARAM_INT);
                    $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                    $sql->execute();
                } else {
                    echo 'เงินหรือคะแนนของคุณไม่พอ';
                }
              }else {
                echo "คุณมีคอสเรียนนี้แล้ว";
              }

            } else {
                echo 'ไม่มีคอร์สเรียนนี้';
            }
        } else {
            echo 'คุณยังไม่ได้เข้าสู่ระบบ';
            echo 'กำลังพาไปหน้าหลัก....';
            header('refresh: 3; url=index.php');
        }
    }
    public function comment(int $id_user, string $comment, int $id_video) // ยังไม่เสร็จเปลียน ใช้สำหรับวิดีโอ
    {
        $sql = $this->sql->prepare('SELECT id_post,COUNT(id_post) FROM comment WHERE id_post = :id_post ;');
        $sql->bindParam(':id_post', $id_post, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            if ($comments != null) {
                $sql = $this->sql->prepare('INSERT INTO comment(id_post,id_N,comment,time,id_user)
                                        VALUES (:id_post ,:id_N ,:comment ,:time , :id_user)');
                $this->sql->bindParam(':id_post', $id_post, PDO::PARAM_INT);
                $this->sql->bindParam(':id_N', $fetch['COUNT(id_post)'], PDO::PARAM_INT);
                $this->sql->bindParam(':comment', $comment, PDO::PARAM_STR);
                $this->sql->bindParam(':time', date('D / m / Y'), PDO::PARAM_STR);
                $this->sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $this->sql->execute();
            }
        }
    }
    public function rating(int $id_user, int $id_question, int $id_video, int $id_playlist)
    {
        if ($id_question != null) {
            $sql = $this->sql->prepare('SELECT id FROM question WHERE id = :id ; ');
            $this->sql->bindParam(':id', $id_question, PDO::PARAM_INT);
            $this->execute();
            $fetch = $this->sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                $sql = $this->sql->prepare('INSERT INTO rating(id_user,id_rating,type)
                                        VALUES (:id_user ,:id_rating ,1);');
                $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $sql->bindParam(':id_rating', $id_question, PDO::PARAM_INT);
                $sql->execute();
            }
        } elseif ($id_playlist != null) {
            $sql = $this->sql->prepare('SELECT id FROM playlist WHERE id = :id ;');
            $this->sql->bindParam(':id', $id_playlist, PDO::PARAM_INT);
            $this->execute();
            $fetch = $this->sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                $sql = $this->sql->prepare('INSERT INTO rating(id_user,id_rating,type)
                                        VALUES (:id_user ,:id_rating ,2);');
                $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $sql->bindParam(':id_rating', $id_playlist, PDO::PARAM_INT);
                $sql->execute();
            }
        }
    }
    public function search(int $type, string $detail)
    {
        $return = array();
        $detail = '%'.$detail.'%';
        if ($type == 1) {
            print_r($detail);
            $course = $this->sql->prepare('SELECT course_name,price,id_author
                                           FROM video_playlist WHERE course_name
                                           LIKE :detail ; ');
            $question = $this->sql->prepare('SELECT name,num_question FROM question_playlist
                                             WHERE name LIKE :detail ; ');
            $question->bindParam(':detail', $detail, PDO::PARAM_STR);
            $question->execute();
            $question_f = $question->fetchAll();
            $course->bindParam(':detail', $detail, PDO::PARAM_STR);
            $course->execute();
            $course_f = $course->fetchAll(PDO::FETCH_ASSOC);
            $return = array_merge($course_f, $question_f);

            return (array) $return;
        } elseif ($type == 2) {
            $intructor = $this->sql->prepare('SELECT id_author
                                         FROM video_playlist WHERE course_name
                                         LIKE :detail ; ');
            $intructor->bindParam(':detail', $detail, PDO::PARAM_STR);
            $intructor->execute();

            return $intructor->fetchAll(PDO::FETCH_ASSOC);
        } elseif ($type == 3) {
            $course = $this->sql->prepare('SELECT id_author
                                       FROM video_playlist WHERE course_name
                                       LIKE :detail ; ');
            $course->bindParam(':detail', $detail, PDO::PARAM_STR);
            $course->execute();

            return $course->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
?>
