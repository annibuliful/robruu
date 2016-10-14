<?php

declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/authen/authen_DB.php';
class Co_func
{
    private $sql;
    private $user_id;
    private $detail;
    private $follow_id;
    private $price;
    private $course_id;
    public function __construct(int $user_id)
    {
        $this->sql = new PDO('mysql:dbname=robruu_online;host=127.0.0.1', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->user_id = $user_id;
    }
    public function new_feed(string $detail)
    {
        $this->detail = $detail;
        $return = '';
        $prepare = $this->sql->prepare('SELECT * FROM user WHERE id=:user_id ;');
        $prepare->bindParam(':user_id', $this->user_id);
        $prepare->execute();
        $fetch = $prepare->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $prepare = $this->sql->prepare('INSERT INTO post(id_user,detail,time)
                                            VALUES (:user_id , :detail ,CURDATE());');
            $prepare->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
            $prepare->bindParam(':detail', $this->detail, PDO::PARAM_STR);
            $prepare->execute();
        } else {
            $return = 'ไม่มืชื่อผู้ใช้นี้';
        }

        return (string) $return;
    }
    public function following(int $follow_id)
    {
        $return = '';
        $this->follow_id = $follow_id;
        $sql = $this->sql->prepare('SELECT * FROM user WHERE id = :user_id ;');
        $sql->bindParam(':user_id', $this->user_id);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('INSERT INTO following(id_u,if_f,time)
                                        VALUES (:id_u , :id_f , CURDATE()) ;');
            $sql->bindParam(':id_u', $this->user_id);
            $sql->bindParam(':id_f', $this->follow_id);
            $sql->execute();
            $return = 'ติดตามแล้ว';

            return (string) $return;
        }
    }
    public function buy(int $course_id)
    {
        $this->course_id = $course_id;
        $sql = $this->sql->prepare('SELECT money FROM user WHERE id = :user_id');
        $sql->bindParam(':user_id', $this->user_id);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('SELECT price FROM video_playlist WHERE id = :id ;');
            $sql->bindParam(':id', $this->course_id);
            $sql->execute();
            $fetch1 = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch1) {
                if ($fetch['money'] >= $fetch1['price']) {
                    $sql = $this->sql->prepare('INSERT INTO course(id_user,id_course)
                                                VALUES (:id_user ,:id_course ) ;');
                    $sql->bindParam(':id_user', $this->user_id);
                    $sql->bindParam(':id_course', $this->course_id);
                    $sql->execute();
                    $sql = $this->sql->prepare('UPDATE user SET
                                                money = money - :price WHERE id = :id_user ; ');
                    $sql->bindParam(':price', $fetch1['price'], PDO::PARAM_INT);
                    $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                    $sql->execute();
                } else {
                    echo 'เงินหรือคะแนนของคุณไม่พอ';
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
    public function comment(int $id_user, string $comment, int $id_post)
    {
        $id_users = $id_user;
        $comments = $comment;
        $id_posts = $id_post;
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
