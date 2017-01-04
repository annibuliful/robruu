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
        $this->sql = new PDO('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->uuid = uniqid('question_');
        $this->uuid_exam = uniqid('exam_');
        $this->authen = new authen_DB();
        $this->uuid_course = uniqid('course_');
    }
    public function make_course(string $id_user, $video, string $description = null, string $course_name, string $price = null, string $major = null, array $cover = null)
    {
        if ($video == null) {
            $sql = $this->sql->prepare('SELECT id FROM user WHERE id= :id_user ;');
            $sql->bindParam(':id_user', $id_user);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                $sql = $this->sql->prepare('INSERT INTO course(id_playlist,course_name,
                                             description,major,price,id_video,id_author,flag_num,cover)
                                            VALUES (:id_playlist ,:course_name ,:description,:major ,:price ,
                                                    :id_video ,:id_author ,1,:cover)');
                $sql->bindParam(':id_playlist', $this->uuid_course, PDO::PARAM_STR);
                $sql->bindParam(':course_name', $course_name, PDO::PARAM_STR);
                $sql->bindParam(':description', $description, PDO::PARAM_STR);
                $sql->bindParam(':major', $major, PDO::PARAM_INT);
                $sql->bindParam(':price', $price, PDO::PARAM_INT);
                $name = uniqid('video_').'.mp4';
                $cover_name = uniqid('cover_').'.png';
                $name1 = '';
                $sql->bindParam(':id_video', $name1, PDO::PARAM_STR);
                $sql->bindParam(':id_author', $id_user, PDO::PARAM_INT);
                $sql->bindParam(':cover', $cover_name, PDO::PARAM_STR);
                $sql->execute();
                move_uploaded_file($cover['tmp_name'], 'C:/Users/Dell/Documents/GitHub/robruu/frontend/store/pictures/'.$cover_name);

                return array(true, $this->uuid_course, $id_user);
            } else {
                echo 'ไม่มีชื่อผู้ใช้งาน';
                echo 'กำลังพาไปหน้าหลัก....';
                header('refresh: 3; url=../../index.php');
            }
        }/*else {
        $sql = $this->sql->prepare('SELECT id FROM user WHERE id= :id_user ;');
        $sql->bindParam(':id_user', $id_user);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('INSERT INTO course(id_playlist,course_name,
                                             description,major,price,id_video,id_author,flag_num,cover)
                                            VALUES (:id_playlist ,:course_name ,:description,:major ,:price ,
                                                    :id_video ,:id_author ,1,:cover)');
            $sql->bindParam(':id_playlist', $this->uuid_course, PDO::PARAM_STR);
            $sql->bindParam(':course_name', $course_name, PDO::PARAM_STR);
            $sql->bindParam(':description', $description, PDO::PARAM_STR);
            $sql->bindParam(':major', $major, PDO::PARAM_INT);
            $sql->bindParam(':price', $price, PDO::PARAM_INT);
            $name = uniqid('video_').'.mp4';
            $cover_name = uniqid('cover_').'.png';
            $sql->bindParam(':id_video', $name, PDO::PARAM_STR);
            $sql->bindParam(':id_author', $id_user, PDO::PARAM_INT);
            $sql->bindParam(':cover',$cover_name,PDO::PARAM_STR);
            $sql->execute();
            move_uploaded_file($video['tmp_name'],
                               '../../frontend/store/videos/'.$name);
            move_uploaded_file($cover['tmp_name'],'../../frontend/store/pictures/'.$cover_name);
            return array(true, $this->uuid_course, $id_user);
        } else {
            echo 'ไม่มีชื่อผู้ใช้งาน';
            echo 'กำลังพาไปหน้าหลัก....';
            header('refresh: 3; url=../../index.php');
        }
      }*/
    }
    public function list_course(string $id_author)
    {
        $sql = $this->sql->prepare('SELECT * FROM course WHERE id_author = :id_author AND flag_num = 1 ;');
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
                $sql->bindParam(':flag_num', $flag_num, PDO::PARAM_INT);
                $sql->execute();
                move_uploaded_file($video['tmp_name'], 'C:/Users/Dell/Documents/GitHub/robruu/frontend/store/videos/'.$name);

                return true;
            } elseif ($description != null) {
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
                $sql->bindParam(':flag_num', $flag_num, PDO::PARAM_INT);
                $sql->execute();
                move_uploaded_file($video['tmp_name'], 'C:/Users/Dell/Documents/GitHub/robruu/frontend/store/videos/'.$name);

                return true;
            }
        } else {
            return false;
        }
    }
    public function get_list_video_course(string $id_course)
    {
        $sql = $this->sql->prepare('SELECT description,id_video FROM course WHERE id_playlist = :id_playlist AND flag_num = 1;');
        $sql->bindParam(':id_playlist', $id_course, PDO::PARAM_STR);
        $sql->execute();

        return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function list_video(string $id_author, string $id_course)
    {
        $sql = $this->sql->prepare('SELECT description,id_playlist FROM course
                                    WHERE id_playlist = :id_playlist
                                    AND flag_num = 1 AND id_author = :id_author ;');
        $sql->bindParam(':id_playlist', $id_course, PDO::PARAM_STR);
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_STR);
        $sql->execute();

        return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function del_video(string $id_video)
    {
        $sql = $this->sql->prepare('DELETE FROM id_video = :id_video ;');
        $sql->bindParam(':id_video', $id_video, PDO::PARAM_STR);
        $sql->execute();
    }
    public function del_question(string $id_author, string $id_question)
    {
        $sql = $this->sql->prepare('SELECT id FROM question WHERE id = :id_question AND id_author =
                                    :id_author ;');
        $sql->bindParam(':id_question', $id_question, PDO::PARAM_STR);
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('DELETE FROM question WHERE id = :id_question AND id_author = :id_author ;');
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
        $sql = $this->sql->prepare('SELECT * FROM question WHERE id_author = :id_author
                                  AND id = :id_picture ;');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->bindParam(':id_picture', $id_picture, PDO::PARAM_STR);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }
    public function get_question(string $id_author, string $id_question)
    {
        $sql = $this->sql->prepare('SELECT * FROM question WHERE id = :id_question
                                  AND id_author = :id_author ;');
        $sql->bindParam(':id_question', $id_question, PDO::PARAM_STR);
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->execute();

        return (array) $sql->fetch(PDO::FETCH_ASSOC);
    }
    public function edit_question(string $id_author, string $id_question, string $data, string $id_answer, string $answer1, string $answer2, string $answer3, string $answer4, string $score)
    {
        $id_answer1 = (int) $id_answer - 1;
        $sql = $this->sql->prepare('SELECT id FROM question WHERE id = :id_question AND id_author = :id_author ;');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->bindParam(':id_question', $id_question, PDO::PARAM_STR);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = $this->sql->prepare('UPDATE question SET name = :name ,id_answer = :id_answer ,
                                        score = :score ,answer1 = :answer1 ,answer2 = :answer2,
                                        answer3 = :answer3 ,answer4 = :answer4 WHERE id = :id_question
                                        AND id_author = :id_author ;');
            $sql->bindParam(':id_answer', $id_answer, PDO::PARAM_INT);
            $sql->bindParam(':name', $data, PDO::PARAM_STR);
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
    public function make_question(string $id_author, string $question, string $id_answer, string $answer1, string $answer2, string $answer3, string $answer4, string $id_course, string $score)
    {
        $sql = $this->sql->prepare('SELECT id FROM user WHERE id = :id_author');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_COLUMN);
        if ($fetch == true) {
            $sql = $this->sql->prepare('SELECT id_playlist FROM course WHERE id_playlist = :id_course ;');
            $sql->bindParam(':id_course', $id_course, PDO::PARAM_STR);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_COLUMN);
            if ($fetch != null) {
                $sql = $this->sql->prepare('INSERT INTO question VALUES
                                      (:id ,:id_author,:question ,:answer1 ,:answer2 ,
                                        :answer3 ,:answer4 ,:score ,:id_answer,:id_course ,0)');
                $sql->bindParam(':id', $this->uuid, PDO::PARAM_STR);
                $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
                $sql->bindParam(':question', $question, PDO::PARAM_STR);
                $sql->bindParam(':answer1', $answer1, PDO::PARAM_STR);
                $sql->bindParam(':answer2', $answer2, PDO::PARAM_STR);
                $sql->bindParam(':answer3', $answer3, PDO::PARAM_STR);
                $sql->bindParam(':answer4', $answer4, PDO::PARAM_STR);
                $sql->bindParam(':id_answer', $id_answer, PDO::PARAM_INT);
                $sql->bindParam(':id_course', $id_course, PDO::PARAM_STR);
                $sql->bindParam(':score', $score, PDO::PARAM_INT);
                $sql->execute();

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function make_exam(string $id_author, string $question, string $id_answer, string $answer1, string $answer2, string $answer3, string $answer4, string $id_course, string $score)
    {
        $sql = $this->sql->prepare('SELECT id FROM user WHERE id = :id_author');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_COLUMN);
        if ($fetch == true) {
            $sql = $this->sql->prepare('SELECT id_playlist FROM course WHERE id_playlist = :id_course ;');
            $sql->bindParam(':id_course', $id_course, PDO::PARAM_STR);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_COLUMN);
            if ($fetch != null) {
                $sql = $this->sql->prepare('INSERT INTO question VALUES
                                      (:id ,:id_author,:question ,:answer1 ,:answer2 ,
                                        :answer3 ,:answer4 ,:score ,:id_answer,:id_course ,0)');
                $sql->bindParam(':id', $this->uuid_exam, PDO::PARAM_STR);
                $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
                $sql->bindParam(':question', $question, PDO::PARAM_STR);
                $sql->bindParam(':answer1', $answer1, PDO::PARAM_STR);
                $sql->bindParam(':answer2', $answer2, PDO::PARAM_STR);
                $sql->bindParam(':answer3', $answer3, PDO::PARAM_STR);
                $sql->bindParam(':answer4', $answer4, PDO::PARAM_STR);
                $sql->bindParam(':id_answer', $id_answer, PDO::PARAM_INT);
                $sql->bindParam(':id_course', $id_course, PDO::PARAM_STR);
                $sql->bindParam(':score', $score, PDO::PARAM_INT);
                $sql->execute();

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function return_draft(string $id_author, string $id_course)
    {
        $sql = $this->sql->prepare('SELECT data FROM content WHERE id_author = :id_author AND id_course = :id_course');
        $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
        $sql->bindParam(':id_course', $id_course, PDO::PARAM_STR);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            return (array) $fetch;
        } else {
            $data = '';
            $flag = 'true';
            $sql = $this->sql->prepare('INSERT INTO content VALUES
                                        (:id_author ,:id_course ,:data ,:flag );');
            $sql->bindValue(':data', $data, PDO::PARAM_STR);
            $sql->bindValue(':flag', $flag, PDO::PARAM_STR);
            $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
            $sql->bindParam(':id_course', $id_course, PDO::PARAM_STR);
            $sql->execute();

            return true;
        }
    }
    public function save_draft(string $id_author, string $id_course, string $data = null, string $flag = null)
    {
        if ($flag == 'public') {
            $draft = 'true';
            $sql = $this->sql->prepare('UPDATE content SET draft = :flag ,data =:data WHERE id_author = :id_author
                                      AND id_course = :id_course ;');
            $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
            $sql->bindParam(':id_course', $id_course, PDO::PARAM_STR);
            $sql->bindValue(':flag', $draft, PDO::PARAM_STR);
            $sql->bindParam(':data', $data, PDO::PARAM_STR);
            $sql->execute();
            echo 'บันทึกเรียบร้อย';
        } elseif ($data != null && $flag == 'save') {
            $sql = $this->sql->prepare('UPDATE content SET data = :data WHERE
                                        id_author = :id_author AND id_course = :id_course ;');
            $sql->bindParam(':data', $data, PDO::PARAM_STR);
            $sql->bindParam(':id_author', $id_author, PDO::PARAM_INT);
            $sql->bindParam(':id_course', $id_course, PDO::PARAM_STR);
            $sql->execute();
            echo 'บันทึกเรียบร้อย1';
        }
    }
    public function check_session(string $id_user)
    {
        if ($id_user != null) {
            $sql = $this->sql->prepare('SELECT * FROM user WHERE id = :id_user ; ');
            $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT, 11);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                return $fetch;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function list_question(string $id_user, string $id_course)
    {
        $sql = $this->sql->prepare('SELECT id,name FROM question WHERE id_author = :id_author
                                AND id_playlist = :id_playlist ;');
        $sql->bindParam(':id_author', $id_user, PDO::PARAM_STR);
        $sql->bindParam(':id_playlist', $id_course, PDO::PARAM_STR);
        $sql->execute();

        return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function edit_video(string $id_author, string $id_video, string $description)
    {
        $sql = $this->sql->prepare('UPDATE course SET description= :description WHERE id_video= :id_video ;');
        $sql->bindParam(':id_video', $id_video, PDO::PARAM_STR);
        $sql->bindParam(':description', $description, PDO::PARAM_STR);
        $sql->execute();
    }
    
    public function preview(array $id_video, string $id_playlist)
    {
        $sql = $this->sql->prepare('SELECT preview FROM course WHERE id_playlist = :id_playlist ;');
        $sql->bindParam(':id_playlist', $id_playlist, PDO::PARAM_STR);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql = '';
            for ($i = 0; $i < count($id_video); ++$i) {
                $sql = (string) $sql."UPDATE course SET preview = 1 WHERE id_video = '{$id_video[$i]}' AND id_playlist{$id_playlist} ;";
            }
            $exec = $this->sql->prepare($sql);
            $exec->execute();

            return true;
        }
        return false;
    }
}
