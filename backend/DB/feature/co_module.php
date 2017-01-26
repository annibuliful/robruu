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
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function list_preview(string $id_playlist)
    {
        $sql = $this->sql->prepare('SELECT id_video,description FROM course
                                  WHERE id_playlist = :id_playlist AND flag_num =2 ;');
        $sql->bindParam(':id_playlist', $id_playlist, PDO::PARAM_STR);
        $sql->execute();

        return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function list_comment(string $id_post)
    {
        $sql = $this->sql->prepare('SELECT comment,name,image FROM comment WHERE id_post = :id_post
                                    AND flag = 1 ORDER BY id_N DESC;');
        $sql->bindParam(':id_post', $id_post, PDO::PARAM_STR);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function comment_course(string $id_user, string $comment = null, string $id_post)
    {
        $sql = $this->sql->prepare('SELECT image,name FROM user WHERE id = :id_user');
        $sql->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $sql->execute();
        $fetch1 = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch1) {
            $sql = $this->sql->prepare('SELECT COUNT(id_N) FROM comment WHERE id_post = :id_post ;');
            $sql->bindParam(':id_post', $id_post, PDO::PARAM_STR);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch != null) {
                $id_N = (int) $fetch['COUNT(id_N)'] + 1;
                $sql = $this->sql->prepare('INSERT INTO comment VALUES (:id_post ,:id_N ,:comment ,
                                        :id_user,:name,:image ,1 ) ;');
                $sql->bindParam(':id_post', $id_post, PDO::PARAM_STR);
                $sql->bindParam(':id_N', $id_N, PDO::PARAM_INT);
                $sql->bindParam(':comment', $comment, PDO::PARAM_STR);
                $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $sql->bindParam(':name', $fetch1['name'], PDO::PARAM_STR);
                $sql->bindParam(':image', $fetch1['image'], PDO::PARAM_STR);
                $sql->execute();

                return true;
            } else {
                $sql = $this->sql->prepare('INSERT INTO comment VALUES (:id_post ,1,:comment ,
                                        :id_user ,:name,:image ,1 ) ;');
                $sql->bindParam(':id_post', $id_post, PDO::PARAM_STR);
                $sql->bindParam(':comment', $comment, PDO::PARAM_STR);
                $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $sql->bindParam(':name', $fetch1['name'], PDO::PARAM_STR);
                $sql->bindParam(':image', $fetch1['image'], PDO::PARAM_STR);
                $sql->execute();

                return true;
            }
        }

        return false;
    }
    public function comment_board(int $id_user, string $head, string $comment, string $id_post)
    {
        $sql = $this->sql->prepare('SELECT image,name FROM user WHERE id = :id_user');
        $sql->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $sql->execute();
        $fetch1 = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch1) {
            $sql = $this->sql->prepare('SELECT id_playlist,COUNT(id_N) FROM qanda WHERE id_playlist = :id_playlist ;');
            $sql->bindParam(':id_playlist', $id_post, PDO::PARAM_STR);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                $id_N = (int) $fetch['COUNT(id_N)'] + 1;
                $sql = $this->sql->prepare('INSERT INTO qanda VALUES (:id_post ,:id_N,0 ,:id_user ,:head
                                            ,:comment,:name,:image ) ;');
                $sql->bindParam(':id_post', $id_post, PDO::PARAM_STR);
                $sql->bindParam(':id_N', $id_N, PDO::PARAM_INT);
                $sql->bindParam(':head', $head, PDO::PARAM_STR);
                $sql->bindParam(':comment', $comment, PDO::PARAM_STR);
                $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $sql->bindParam(':name', $fetch1['name'], PDO::PARAM_STR);
                $sql->bindParam(':image', $fetch1['image'], PDO::PARAM_STR);
                $sql->execute();

                return true;
            } else {
                $sql = $this->sql->prepare('INSERT INTO qanda VALUES (:id_post ,1,0 ,:id_user ,:head
                                          ,:comment ,:name,:image ) ;');
                $sql->bindParam(':id_post', $id_post, PDO::PARAM_STR);
                $sql->bindParam(':head', $head, PDO::PARAM_STR);
                $sql->bindParam(':comment', $comment, PDO::PARAM_STR);
                $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $sql->bindParam(':name', $fetch1['name'], PDO::PARAM_STR);
                $sql->bindParam(':image', $fetch1['image'], PDO::PARAM_STR);
                $sql->execute();

                return true;
            }
        }

        return false;
    }
    public function answer_board(string $id_user, string $comment, string $id_post, string $id_N)
    {
        $sql = $this->sql->prepare('SELECT image,name FROM user WHERE id = :id_user');
        $sql->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $sql->execute();
        $fetch1 = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch1) {
            $sql = $this->sql->prepare('SELECT id_playlist,COUNT(comment_N),head FROM qanda WHERE
                                      id_playlist = :id_playlist AND id_N = :id_N ;');
            $sql->bindParam(':id_playlist', $id_post, PDO::PARAM_STR);
            $sql->bindParam(':id_N', $id_N, PDO::PARAM_STR);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                $comment_N = (int) $fetch['COUNT(comment_N)'] + 1;
                $sql = $this->sql->prepare('INSERT INTO qanda VALUES (:id_post ,:id_N ,:comment_N,:id_user
                                          ,:head,:comment,:name,:image ) ;');
                $sql->bindParam(':id_post', $id_post, PDO::PARAM_STR);
                $sql->bindParam(':id_N', $id_N, PDO::PARAM_INT);
                $sql->bindParam(':comment_N', $comment_N, PDO::PARAM_INT);
                $sql->bindParam(':head', $fetch['head'], PDO::PARAM_STR);
                $sql->bindParam(':comment', $comment, PDO::PARAM_STR);
                $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $sql->bindParam(':name', $fetch1['name'], PDO::PARAM_STR);
                $sql->bindParam(':image', $fetch1['image'], PDO::PARAM_STR);
                $sql->execute();

                return true;
            } else {
                $sql = $this->sql->prepare('INSERT INTO qanda VALUES (:id_post ,:id_N ,1,:id_user
                                        ,:head,:comment,:name,:image ) ;');
                $sql->bindParam(':id_post', $id_post, PDO::PARAM_STR);
                $sql->bindParam(':id_N', $id_N, PDO::PARAM_INT);
                $sql->bindParam(':comment_N', $comment_N, PDO::PARAM_INT);
                $sql->bindParam(':head', $fetch['head'], PDO::PARAM_STR);
                $sql->bindParam(':comment', $comment, PDO::PARAM_STR);
                $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $sql->bindParam(':name', $fetch1['name'], PDO::PARAM_STR);
                $sql->bindParam(':image', $fetch1['image'], PDO::PARAM_STR);
                $sql->execute();

                return true;
            }
        }

        return false;
    }
    public function list_answer_board(string $id_playlist, string $id_N)
    {
        $sql = $this->sql->prepare('SELECT id_N,id_playlist,name,image,comment,head FROM qanda WHERE
                                  id_playlist = :id_playlist AND id_N = :id_N ORDER BY comment_N ASC;');
        $sql->bindParam(':id_playlist', $id_playlist, PDO::PARAM_STR);
        $sql->bindParam(':id_N', $id_N, PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function list_comment_board(string $id_playlist)
    {
        $sql = $this->sql->prepare('SELECT id_N,id_playlist,name,image,comment,head FROM qanda WHERE
                                    id_playlist = :id_playlist AND comment_N = 0 ORDER BY id_N DESC;');
        $sql->bindParam(':id_playlist', $id_playlist, PDO::PARAM_STR);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function rating(int $id_user, string $id_question = null, string $id_playlist = null)
    {
        if ($id_question != null) {
            $sql = $this->sql->prepare('SELECT id FROM picture WHERE id = :id ; ');
            $sql->bindParam(':id', $id_question, PDO::PARAM_INT);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                $sql = $this->sql->prepare('SELECT * FROM check_rating WHERE id_post = :id_question
                                            AND type = 1 AND id_user = :id_user ; ');
                $sql->bindParam(':id_question', $id_question, PDO::PARAM_INT);
                $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $sql->execute();
                $fetch = $sql->fetch(PDO::FETCH_ASSOC);
                if (!$fetch) {
                    $sql = $this->sql->prepare('SELECT num FROM rating WHERE id_post = :id_question AND type = 1;');
                    $sql->bindParam(':id_question', $id_question, PDO::PARAM_INT);
                    $sql->execute();
                    $fetch1 = $sql->fetch(PDO::FETCH_ASSOC);
                    if ($fetch1) {
                        $sql = $this->sql->prepare('UPDATE rating SET num = num + 1 WHERE id_post = :id_post AND type = 1;');
                        $sql->bindParam(':id_post', $id_question, PDO::PARAM_INT);
                        $sql->execute();
                        $sql = $this->sql->prepare('INSERT INTO check_rating(id_user,id_post,type)
                                                VALUES (:id_user ,:id_post ,1);');
                        $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                        $sql->bindParam(':id_post', $id_question, PDO::PARAM_INT);
                        $sql->execute();

                        return (array) $fetch1;
                    } else {
                        $sql = $this->sql->prepare('INSERT INTO rating(id_post,type,num)
                                                    VALUES(:id_post ,1,1)');
                        $sql->bindParam(':id_post', $id_question, PDO::PARAM_INT);
                        $sql->execute();
                        $sql = $this->sql->prepare('INSERT INTO check_rating(id_user,id_post,type)
                                              VALUES (:id_user ,:id_post ,1);');
                        $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                        $sql->bindParam(':id_post', $id_question, PDO::PARAM_INT);
                        $sql->execute();

                        return (array) $fetch1;
                    }
                } else {
                    return 'error';
                }
            } else {
                return 'error';
            }
        } elseif ($id_playlist != null) {
            $sql = $this->sql->prepare('SELECT id FROM video_playlist WHERE id_playlist = :id ;');
            $sql->bindParam(':id', $id_playlist, PDO::PARAM_STR);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                $sql = $this->sql->prepare('SELECT * FROM check_rating WHERE id_post = :id_playlist
                                            AND type = 2 AND id_user = :id_user ; ');
                $sql->bindParam(':id_playlist', $id_playlist, PDO::PARAM_STR);
                $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $sql->execute();
                $fetch = $sql->fetch(PDO::FETCH_ASSOC);
                if (!$fetch) {
                    $sql = $this->sql->prepare('SELECT num FROM rating WHERE id_post = :id_playlist
                                                AND type = 2;');
                    $sql->bindParam(':id_playlist', $id_playlist, PDO::PARAM_STR);
                    $sql->execute();
                    $fetch1 = $sql->fetch(PDO::FETCH_ASSOC);
                    if ($fetch1) {
                        $sql = $this->sql->prepare('UPDATE rating SET num = num + 1 WHERE id_post = :id_post AND type = 2;');
                        $sql->bindParam(':id_post', $id_playlist, PDO::PARAM_STR);
                        $sql->execute();
                        $sql = $this->sql->prepare('INSERT INTO check_rating(id_user,id_post,type)
                                                VALUES (:id_user ,:id_post ,2);');
                        $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                        $sql->bindParam(':id_post', $id_playlist, PDO::PARAM_STR);
                        $sql->execute();

                        return (array) $fetch1;
                    } else {
                        $sql = $this->sql->prepare('INSERT INTO rating(id_post,type,num)
                                                    VALUES(:id_post ,2,1)');
                        $sql->bindParam(':id_post', $id_playlist, PDO::PARAM_STR);
                        $sql->execute();
                        $sql = $this->sql->prepare('INSERT INTO check_rating(id_user,id_post,type)
                                              VALUES (:id_user ,:id_post ,2);');
                        $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                        $sql->bindParam(':id_post', $id_playlist, PDO::PARAM_STR);
                        $sql->execute();

                        return (array) $fetch1;
                    }
                } else {
                    return 'error';
                }
            } else {
                return 'error';
            }
        }
    }
    public function buy(string $id_course, int $id_user)
    {
        $sql = $this->sql->prepare('SELECT * FROM course_user WHERE user_id = :id_user
                                  AND course_id = :id_course ;');
        $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $sql->bindParam(':id_course', $id_course, PDO::PARAM_STR);
        $sql->execute();
        $check = $sql->fetch(PDO::FETCH_ASSOC);
        if (!$check) {
            $sql = $this->sql->prepare('SELECT * FROM course
                                    WHERE id_playlist = :id_playlist ;');
            $sql->bindParam(':id_playlist', $id_course, PDO::PARAM_STR);
            $sql->execute();
            $price = $sql->fetch(PDO::FETCH_ASSOC);
            if ($price) {
                $sql = $this->sql->prepare('SELECT score FROM user WHERE id = :id_user ;');
                $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $sql->execute();
                $money = $sql->fetch(PDO::FETCH_ASSOC);
                if ($money['score'] >= $price['price']) {
                    $sql = $this->sql->prepare('UPDATE user SET score = score - :money
                                           WHERE id = :id_user ;');
                    $sql->bindParam(':money', $price['price'], PDO::PARAM_INT);
                    $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                    $sql->execute();
                    $sql = $this->sql->prepare('UPDATE user SET score = score + :money
                                           WHERE id = :id_author');
                    $sql->bindParam(':money', $price['price']);
                    $sql->bindParam(':id_author', $price['id_author']);
                    $sql->execute();
                    $sql = $this->sql->prepare('INSERT INTO course_user(user_id,course_id,course_name,description,id_video,cover,major)
                                           VALUES (:id_user ,:id_course ,:course_name ,:description ,:id_video ,:cover,:major )  ');
                    $sql->bindparam(':id_user', $id_user, PDO::PARAM_INT);
                    $sql->bindparam(':id_course', $id_course, PDO::PARAM_STR);
                    $sql->bindparam(':course_name', $price['course_name']);
                    $sql->bindparam(':id_video', $price['id_video']);
                    $sql->bindparam(':cover', $price['cover']);
                    $sql->bindparam(':description', $price['description']);
                    $sql->bindParam(':major', $price['major']);
                    $sql->execute();
                    echo '<h2>ซื้อคอสสำเร็จ</h2>';
                } else {
                    echo '<h2>เงินคุณไม่พอ</h2>';
                }
            } else {
                echo '<h2>เกิดปัญหาการซื้อคอสนี้</h2>';
            }
        } else {
            echo '<h2>คุณมีคอสเรียนนี้แล้ว</h2>';
        }
    }
    public function search(string $detail = null, string $major = null)
    {
        $detail = "%$detail%";
        if ($major != null) {
            $sql = $this->sql->prepare('SELECT id_playlist,course_name,description,price,cover FROM course
                                     WHERE course_name LIKE :detail AND flag_num = 1 AND major = :major ;');
            $sql->bindParam(':detail', $detail, PDO::PARAM_STR);
            $sql->bindParam(':major', $major, PDO::PARAM_STR);
            $sql->execute();
        } elseif ($detail == null) {
            $sql = $this->sql->prepare('SELECT id_playlist,course_name,description,price,cover FROM course
                                     WHERE flag_num = 1;');
            $sql->execute();
        } else {
            $sql = $this->sql->prepare('SELECT id_playlist,course_name,description,price,cover FROM course
                                     WHERE course_name LIKE :detail AND flag_num = 1;');
            $sql->bindParam(':detail', $detail, PDO::PARAM_STR);
            $sql->execute();
        }

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function list_course_rank()
    {
        $sql = $this->sql->prepare('SELECT id_playlist,course_name,description,price,cover FROM course
                                 WHERE flag_num = 1 LIMIT 4;');
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function point_to_money(string $id_user)
    {
        $sql = $this->sql->prepare('SELECT score FROM user WHERE id = :id_user ;');
        $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $score = (int) $fetch['score'];
            $money = $score / 14;
            $sql = $this->sql->prepare('UPDATE user SET money = money + :money WHERE id = :id_user ;');
            $sql->bindParam(':money', $money, PDO::PARAM_INT);
            $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $sql->execute();
            $sql = $this->sql->prepare('UPDATE user SET score = 0 WHERE id =:id_user ;');
            $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $sql->execute();
            echo '<h2>แลกคะแนนเป็นเงินเรียบร้อย</h2>';
        }
    }
}
