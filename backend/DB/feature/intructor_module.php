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
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function picture_upload(array $picture, int $id_author, int $id_answer, int $score)
    {
        $sql = $this->pdo->prepare('SELECT * FROM user WHERE id= :username ;');
        $sql->bindParam(':username', $id_author, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->pdo->prepare('INSERT INTO picture(id_author,name,score,id_answer,rating)
                                      VALUES (:id_author ,:name ,:score ,:id_answer ,0);');
            $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
            $sql->bindParam(':name', $picture['name'], PDO::PARAM_STR);
            $sql->bindParam(':score', $score, PDO::PARAM_INT);
            $sql->bindParam(':id_answer', $id_answer, PDO::PARAM_INT);
            $sql->execute();
            move_uploaded_file($this->picture['tmp_name'],
                             'C:/Users/Dell/Documents/GitHub/robruu/backend/store/videos/'.$picture['name']);

            return true;
        } else {
            echo 'ไม่มีชื่อผู้ใช้งาน';
            echo 'กำลังพาไปหน้าหลัก....';
            //header('refresh: 3; url=index.php');

            return false;
        }
    }
    public function make_choices(array $choices, int $id_author, int $id_question, int $check_c)
    {
        $sql = $this->pdo->prepare('SELECT id FROM picture WHERE id_author = :id ;');
        $sql->bindParam(':id', $id_question, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->pdo->prepare('SELECT id_question FROM choice_question WHERE id_question = :id_question ;');
            $sql->bindParam(':id_question', $id_question, PDO::PARAM_INT);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if (!$fetch) {
                foreach ($choices as $key => $value) {
                    $sql = $this->pdo->prepare('INSERT INTO choice_question(id_question,id_user,detail,num_choice)
                                      VALUES (:id_question ,:id_user ,:detail ,:num_choice );');
                    $sql->bindParam(':id_question', $id_question, PDO::PARAM_INT);
                    $sql->bindParam(':id_user', $id_question, PDO::PARAM_INT);
                    $sql->bindParam(':detail', $value, PDO::PARAM_STR);
                    $sql->bindParam(':num_choice', $key, PDO::PARAM_INT);
                    $sql->execute();
                }
            } else {
                return 'โจทย์นี้มี choice แล้ว ';
            }

            return true;
        } else {
            return false;
        }

        return false;
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
            $sql->bindParam(':video', $this->video['name'].$this->user_id, PDO::PARAM_STR);
            $sql->bindParam(':id_user', $this->user_id, PDO::PARAM_INT);
            $sql->bindParam('date', date('d / m / Y'));
            $sql->bindParam(':price', $this->price, PDO::PARAM_INT);
            $sql->execute();
            move_uploaded_file($this->video['tmp_name'],
                               'C:/Users/Dell/Documents/GitHub/robruu/backend/store/videos/'.$video['name']);
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
        $sql->bindParam(':id_user', $this->id, PDO::PARAM_INT);
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
                update_course($id_video, $id_user, $course_name, $fetch[0]);
            }
        } else {
            echo 'คุณยังไม่ได้เข้าสู่ระบบ';
            echo 'กำลังพาไปหน้าหลัก....';
            header('refresh: 3; url=index.php');
        }
    }
    public function update_course(int $id_video,int $id_user,int $id_course,int $flag_num)
    {
        $sql = $this->pdo->prepare('INSERT INTO video_playlist(course_name,price,id_video,id_user,flag_num)
                                VALUES (:course_name ,0,:id_video ,:id_user ,:flag_num)');
        $sql->bindParam(':course_name', $course_name, PDO::PARAM_STR, 120);
        $sql->bindParam(':id_video', $id_video, PDO::PARAM_INT, 50);
        $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT, 10);
        $sql->bindParam(':flag_num', $flag_num, PDO::PARAM_INT, 4);
        $sql->execute();
    }
}
?>
