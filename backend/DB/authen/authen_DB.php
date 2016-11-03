<?php

class authen_DB
{
    private $id_user;
    private $user;
    private $password;
    private $grade;
    private $birth_date;
    private $sql;
    private $email;
    public function __construct()
    {
        $this->sql = new PDO('mysql:dbname=robruu_online;host=127.0.0.1', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function register(string $user, string $password, string $email,int $flag)
    {
        if ($user != null && $password != null && $email != null && $flag != null) {
            $hash_pass = password_hash($password, PASSWORD_DEFAULT);
            $sql = $this->sql->prepare('SELECT * FROM user WHERE username = :user OR email= :email ;');
            $sql->bindParam(':user', $user);
            $sql->bindParam(':email', $email);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                return 'have_user';
            } else {
                $sql = $this->sql->prepare('INSERT INTO user(username,password,image,email,score,money,rating,flag)
                                      VALUES (:user ,:password ,0,:email ,0,0,0,:flag );');
                $sql->bindParam(':user', $user,PDO::PARAM_STR);
                $sql->bindParam(':password', $hash_pass,PDO::PARAM_STR);
                $sql->bindParam(':email', $email,PDO::PARAM_STR);
                $sql->bindParam(':flag',$flag,PDO::PARAM_INT);
                $sql->execute();
                return 'registered';
            }
        }else {
          echo "ใส่ข้อมูลไม่ครบ";
        }
    }
    public function login($user, $password, $email)
    {
        try {
            $sql = $this->sql->prepare('SELECT * FROM user WHERE username= :username OR email= :email ;');
            $sql->bindParam(':username', $user, PDO::PARAM_STR, 64);
            $sql->bindParam(':email', $email, PDO::PARAM_STR, 64);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                if (password_verify($password, $fetch['password'])) {
                    return (int)$fetch['id'];
                } else {
                    return 'failed';
                }
            } else {
                return 'please_register';
            }
        } catch (PDOException $e) {
            echo 'error : '.$e->getMessage();
        }
    }
    public function check_session($id_user)
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

        return false;
    }
}
