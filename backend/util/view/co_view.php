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
    }
    public function list_comment(array $data)
    {
        for ($i=0; $i <count($data) ; $i++) {
          echo "string";
        }
    }
    public function rating_error()
    {
      echo "<h3>เกิดปัญหาการกดไลค์</h3>";
    }
    public function search(string $id_user,array $list){

      for ($i=0; $i <count($list); $i++) {
        echo "<div class=\"col-md-3\" align=\"center\">
            <img src=\"store/pictures/{$list[$i]['cover']}\" style=\"width:200;height:200\">
            <h3>{$list[$i]['course_name']}</h3>
            <div style=\"font-size:25\">ราคา {$list[$i]['price']} Point</div>
            <a href =\"buy.php?id_course={$list[$i]['id_playlist']}\"class=\"btn btn-danger\" style=\"font-size:25;width:70%;margin-bottom:5%\">Buy</a>
        </div>";
      }
    }
}
