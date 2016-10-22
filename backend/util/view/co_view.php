<?php

class co_view
{
    public function __construct()
    {
    }
    public function buy_complete()
    {
        echo  '<h3>ซื้อคอสเรียนสำเร็จ</h3>';
    }
    public function buy_have()
    {
        echo '<h3>มีคอสนี้แล้ว</h3>';
    }
    public function buy_error()
    {
        echo '<h3>ไม่มีคอสนี้</h3>';
    }
    public function buy_not_enough()
    {
        echo '<h3>เงินไม่พอ</h3>';
    }
    public function buy_not_login()
    {
        echo '<h3>ยังไม่ได้เข้าสู่ระบบ</h3>';
        header('refresh: 2; url=C:/Users/Dell/Documents/GitHub/robruu/index.php');
        exit(0);
    }
    public function comment_complete()
    {
        echo '<h3>แสดงความคิดเห็นสำเร็จ </h3>';
    }
    public function comment_error()
    {
        echo '<h3>ไม่สามารถแสดงความคิดเห็นได้ </h3>';
    }
    public function rating_error()
    {
      echo "<h3>เกิดปัญหาการกดไลค์</h3>";
    }
    public function search(array $return){
      foreach ($return as $key => $value) {
        echo "{$key} => {$value}";
      }
    }
}
