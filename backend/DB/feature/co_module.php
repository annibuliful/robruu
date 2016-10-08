<?php
require 'C:\Users\Dell\Documents\GitHub\robruu\backend\DB\authen\authen_DB.php';
class Co_func
{
    private $sql;
    private $user_id;
    private $detail;
    private $follow_id;
    private $price;
    private $course_id;
    public function __construct($user_id)
    {
        $this->sql = new PDO('mysql:dbname=robruu_online;host=127.0.0.1', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->user_id = $user_id;
    }
    public function new_feed($detail)
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
    public function following($follow_id)
    {
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
        }
    }
    public function buy($course_id)
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
                    $sql->bindParam(':price',$fetch1['price'],PDO::PARAM_INT);
                    $sql->bindParam(':id_user',$id_user,PDO::PARAM_INT);
                    $sql->execute();
                } else {
                    echo 'เงินหรือคะแนนของคุณไม่พอ';
                }
            }else {
              echo "ไม่มีคอร์สเรียนนี้";
            }
        } else {
            echo 'คุณยังไม่ได้เข้าสู่ระบบ';
            echo 'กำลังพาไปหน้าหลัก....';
            header('refresh: 3; url=index.php');
        }
    }
}?>
