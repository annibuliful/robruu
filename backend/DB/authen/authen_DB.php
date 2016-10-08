<?php
session_start();
class authen
{
    private $id_user;
    private $user;
    private $password;
    private $grade;
    private $birth_date;
    private $sql;
    private $email;
    public function __construct($user, $password, $email, $birth_date = null, $grade = null)
    {
        $this->user = filter_var($user, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->birth_date = filter_var($birth_date, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->grade = filter_var($grade, FILTER_SANITIZE_NUMBER_INT);
        $this->sql = new PDO('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function register()
    {
        $return = '';
        $hash_pass = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = $this->sql->prepare('SELECT * FROM user WHERE username= :username OR email= :email ;');
        $sql->bindParam('username', $this->user);
        $sql->bindParam('email', $this->email);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        if ($fetch) {
            $return = 'ชื่อนี้มีผู้ใช้งานแล้ว';
        } else {
            $sql = $this->sql->prepare('INSERT INTO user(username,password,image,email,birth_date,score,money,rating,grade,major,myself)
                                      VALUES (:user ,:password ,0,:email ,:birth_date,0,0,0,:grade,0,0);');
            $sql->bindParam(':user', $this->user);
            $sql->bindParam(':password', $hash_pass);
            $sql->bindParam(':email', $this->email);
            $sql->bindParam('birth_date', $this->birth_date);
            $sql->bindParam('grade', $this->grade);
            $sql->execute();
            $return = 'สมัครสมาชิกเรียบร้อย';
        }

        return (string) $return;
    }
    public function login()
    {
        try {
            $sql = $this->sql->prepare('SELECT * FROM user WHERE username= :username OR email= :email ;');
            $sql->bindParam(':username', $this->user, PDO::PARAM_STR, 64);
            $sql->bindParam(':email', $this->email, PDO::PARAM_STR, 64);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                if (password_verify($this->password, $fetch['password'])) {
                    $_SESSION['id'] = $fetch['id'];
                    return $_SESSION['id'];
                } else {
                    $return = array('1' =>"รหัสผ่านไม่ถูกต้อง");
                    header('refresh: 3; url=index.php');
                    return ;
                }
            } else {
                echo 'ไม่มีชื่อนี้ในฐานข้อมูล';
                echo 'กำลังพาไปหน้าหลัก....';
                header('refresh: 3; url=index.php');
            }
        } catch (PDOException $e) {
            echo 'error : '.$e->getMessage();
        }

    }
    public function check_session($id_user)
    {
        $this->id_user = $id_user;
        if ($this->id_user != null) {
            $sql = $this->sql->prepare('SELECT * FROM user WHERE id = :id_user ; ');
            $sql->bindParam(':id_user', $this->id_user, PDO::PARAM_INT, 11);
            $sql->execute();
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);
            if ($fetch) {
                return true;
            } else {
                echo 'ไม่มีชื่อนี้ในฐานข้อมูล';
                echo 'กำลังพาไปหน้าหลัก....';
                header('refresh: 3; url=index.php');
            }
        } else {
            echo 'คุณยังไม่ลงชื่อเข้าใช้';
            echo 'กำลังพาไปหน้าหลัก....';
            header('refresh: 3; url=index.php');
        }

        return false;
    }
}
?>
