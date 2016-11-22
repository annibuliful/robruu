<?php

declare(strict_types=1);
require 'C:/Users/Dell/Documents/GitHub/robruu/backend/DB/authen/authen_DB.php';

class intructor
{
    private $sql;
    private $video = array();
    private $uuid;
    private $authen;
    private $uuid_exam;
    private $uuid_course;
    public function __construct()
    {
        $this->sql = new pdo('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->uuid = uniqid('question_');
        $this->uuid_exam = uniqid('exam_');
        $this->authen = new authen_DB();
        $this->uuid_course = uniqid('course_');
    }
    public function make_course(string $id_user, array $video, string $description = null, string $course_name, string $price = null, string $major)
    {
        $sql = $this->sql->prepare('SELECT id FROM user WHERE id= :id_user ;');
        $sql->bindParam(':id_user', $id_user);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('INSERT INTO course(id_playlist,course_name,
                                             description,major,price,id_video,id_author,flag_num)
                                            VALUES (:id_playlist ,:course_name ,:description,:major ,:price ,
                                                    :id_video ,:id_author ,1)');
            $sql->bindParam(':id_playlist', $this->uuid_course, PDO::PARAM_STR);
            $sql->bindParam(':course_name', $course_name, PDO::PARAM_STR);
            $sql->bindParam(':description', $description, PDO::PARAM_STR);
            $sql->bindParam(':major', $major, PDO::PARAM_INT);
            $sql->bindParam(':price', $price, PDO::PARAM_INT);
            $name = uniqid('video_').'.mp4';
            $sql->bindParam(':id_video', $name, PDO::PARAM_STR);
            $sql->bindParam(':id_author', $id_user, PDO::PARAM_INT);
            $sql->execute();
            move_uploaded_file($video['tmp_name'],
                               '../../frontend/store/videos/'.$name);

            return array(true, $this->uuid_course, $id_user);
        } else {
            echo 'ไม่มีชื่อผู้ใช้งาน';
            echo 'กำลังพาไปหน้าหลัก....';
            header('refresh: 3; url=../../index.php');
        }
    }
    public function list_course(string $id_author)
    {
        $sql = $this->sql->prepare('SELECT * FROM course WHERE id_author = :id_author ;');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update_course(string $id_author, string $id_course, array $video, string $description = null)
    {
        $sql = $this->sql->prepare('SELECT course_name,COUNT(course_name),price,major,description
                                  FROM course WHERE id_playlist = :id_playlist
                                  AND id_author = :id_author ;');
        $sql->bindParam(':id_playlist', $id_course, PDO::PARAM_STR);
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        $flag_num = (int) $fetch['COUNT(course_name)'] + 1;
        if ($fetch == true) {
            if ($description == null) {
                $sql = $this->sql->prepare('INSERT INTO course(id_playlist,course_name,
                                      description,major,price,id_video,id_author,flag_num)
                                      VALUES (:id_playlist ,:course_name ,:description,:major ,:price ,
                                              :id_video ,:id_author ,:flag_num ) ;');
                $sql->bindParam(':id_playlist', $id_course, PDO::PARAM_STR);
                $sql->bindParam(':course_name', $fetch['course_name'], PDO::PARAM_STR);
                $sql->bindParam(':description', $fetch['description'], PDO::PARAM_STR);
                $sql->bindParam(':major', $fetch['major'], PDO::PARAM_INT);
                $sql->bindParam(':price', $fetch['price'], PDO::PARAM_INT);
                $name = uniqid('video_').'.mp4';
                $sql->bindParam(':id_video', $name, PDO::PARAM_STR);
                $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
                $sql->bindParam(':flag_num',$flag_num,PDO::PARAM_INT);
                $sql->execute();
                return true;
            }elseif ($description != null) {
              $sql = $this->sql->prepare('INSERT INTO course(id_playlist,course_name,
                                    description,major,price,id_video,id_author,flag_num)
                                    VALUES (:id_playlist ,:course_name ,:description,:major ,:price ,
                                            :id_video ,:id_author ,:flag_num ) ;');
              $sql->bindParam(':id_playlist', $id_course, PDO::PARAM_STR);
              $sql->bindParam(':course_name', $fetch['course_name'], PDO::PARAM_STR);
              $sql->bindParam(':description', $description, PDO::PARAM_STR);
              $sql->bindParam(':major', $fetch['major'], PDO::PARAM_INT);
              $sql->bindParam(':price', $fetch['price'], PDO::PARAM_INT);
              $name = uniqid('video_').'.mp4';
              $sql->bindParam(':id_video', $name, PDO::PARAM_STR);
              $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
              $sql->bindParam(':flag_num',$flag_num,PDO::PARAM_INT);
              $sql->execute();
              return true;
            }
        }else {
          return false;
        }
    }
    public function get_list_video_course(string $id_course)
    {
        $sql = $this->sql->prepare('SELECT * FROM course WHERE id_playlist = :id_playlist ;');
        $sql->bindParam(':id_playlist', $id_course, PDO::PARAM_STR);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function del_video(string $id_video)
    {
        $sql = $this->sql->prepare('DELETE FROM id_video = :id_video ;');
        $sql->bindParam(':id_video', $id_video, PDO::PARAM_STR);
        $sql->execute();
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
    public function make_question(string $id_author, string $question, string $id_answer, string $answer1, string $answer2, string $answer3, string $answer4, string $score)
    {
        $sql = $this->sql->prepare('SELECT id FROM user WHERE id = :id_author');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
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
        } else {
            return false;
        }
    }
    public function make_exam(string $id_author, string $question, string $id_answer, string $answer1, string $answer2, string $answer3, string $answer4, string $id_course)
    {
        $sql = $this->sql->prepare('SELECT id FROM user WHERE id = :id_author');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_COLUMN);
        if ($fetch == true) {
            $sql = $this->sql->prepare('SELECT id FROM course WHERE id_playlist = :id_course ;');
            $sql->bindParam(':id_course', $id_course, PDO::PARAM_STR);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_COLUMN);
            if ($fetch != null) {
                $sql = $this->sql->prepare('INSERT INTO question VALUES
                                      (:id ,:id_author,:question ,:answer1 ,:answer2 ,
                                        :answer3 ,:answer4 ,0,:id_answer,:id_course ,0)');
                $sql->bindParam(':id', $this->uuid_exam, PDO::PARAM_STR);
                $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
                $sql->bindParam(':question', $question, PDO::PARAM_STR);
                $sql->bindParam(':answer1', $answer1, PDO::PARAM_STR);
                $sql->bindParam(':answer2', $answer2, PDO::PARAM_STR);
                $sql->bindParam(':answer3', $answer3, PDO::PARAM_STR);
                $sql->bindParam(':answer4', $answer4, PDO::PARAM_STR);
                $sql->bindParam(':id_answer', $id_answer, PDO::PARAM_INT);
                $sql->bindParam(':id_course', $id_course, PDO::PARAM_STR);
                $sql->execute();

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
