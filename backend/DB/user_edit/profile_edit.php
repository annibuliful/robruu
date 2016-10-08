<?php

class profile
{
    private $user;
    private $password;
    private $email;
    private $myself;
    private $sql;
    private $user_id;
    private $major;
    private $image = array();
    private $dir;
    public function __construct($user_id, $username)
    {
        $this->sql = new PDO('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->user_id = $user_id;
        $this->$user = $username;
    }
    public function change_password($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
        $check = $this->sql->prepare("SELECT * FROM user WHERE username=':username' AND password = ':password';");
        $check->bindParam(':username', $this->user, PDO::PARAM_STR, 64);
        $check->bindParam(':password', $this->password, PDO::PARAM_STR, 64);
        $check->execute();
        $fetch = $check->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            try {
                $sql = $this->sql->prepare("UPDATE user SET password=':password' WHERE username=':username';");
                $sql->bindParam(':password', $this->password, PDO::PARAM_STR, 64);
                $sql->bindParam(':username', $this->user, PDO::PARAM_STR, 64);
                $sql->execute();
                echo 'เปลี่ยนข้อมูลส่วนตัวสำเร็จ';
            } catch (PDOException $e) {
                echo 'error: '.$e->getMessage();
            }
        } else {
            echo 'ไม่สามารถลงชื่อได้';
            header('refresh: 2; url=index.php');
        }
    }
    public function change_username($new_user, $password, $email)
    {
        $this->user = $new_user;
        $this->password = $password;
        $this->email = $email;
        $check = $this->sql->prepare("SELECT * FROM user WHERE username=':username' AND email = ':email';");
        $check->bindParam(':username', $this->user, PDO::Param_STR, 64);
        $check->bindParam(':email', $this->password, PDO::Param_STR, 64);
        $check->execute();
        $fetch = $check->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            try {
                $sql = $this->sql->prepare("UPDATE user SET username=':username' WHERE email=':email';");
                $sql->bindParam(':email', $this->email, PDO::Param_STR, 64);
                $sql->bindParam(':username', $this->new_user, PDO::Param_STR, 64);
                $sql->execute();
                echo 'เปลี่ยนข้อมูลส่วนตัวสำเร็จ';
            } catch (PDOException $e) {
                echo 'error: '.$e->getMessage();
            }
        } else {
            echo 'ไม่สามารถลงชื่อได้';
            header('refresh: 2; url=index.php');
        }
    }
    public function major($major)
    {
        $return = '';
        $this->major = $major;
        try {
            $sql = $this->sql->prepare('SELECT * FROM user WHERE id = :user_id ;');
            $sql->bindParam(':user_id', $this->user_id);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'error : '.$e->getMessage();
        }
        if ($fetch) {
            $sql = $this->sql->prepare('UPDATE user SET major = :major WHERE id = :id ;');
            $sql->bindParam(':major', $this->major);
            $sql->bindParam(':id', $this->user_id);
            $sql->execute();
            $return = 'เปลี่ยนสาขาการสอนของคุณแล้ว';
        } else {
            $return = 'ไม่มีชื่อผู้ใช้นี้';
        }
    }
    public function upload_image($image, $dir) // incomplete
    {
        $return = '';
        $this->dir = $dir;
        $this->image = $image;
        if (move_uploaded_file($this->image, $this->dir)) {
            rename($this->dir.$this->image, $dir.$this->image.$this->user);
            $return = 'เปลี่ยนภาพโปรไฟล์เรียบร้อย';
        } else {
            $return = 'เกิดปัญหาในการเปลี่ยนภาพ';
        }

        return $return;
    }
    public function change_myself($myself)
    {
        $return = '';
        $this->myself = $myself;
        $sql = $this->sql->prepare('SELECT * FROM user WHERE username= :username ;');
        $sql->bindParam(':username', $this->user);
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $sql->prepare('UPDATE user SET myself = :myself ;');
            $sql->bindParam(':myself', $this->myself);
            $sql->execute();
            $return = 'เปลี่ยนแปลงสำเร็จ';
        } else {
            $return = 'ไม่มีชื่อผู้ใช้นี้';
        }
    }
}
?>
