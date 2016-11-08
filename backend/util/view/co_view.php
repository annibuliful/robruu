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
    public function search(string $id_user,array $list){
      echo "<div class=\"table-responsive\">
              <table class=\"table\">
              <thead>
                <tr>
                  <th>ชื่อคอสเรียน</th>
                  <th>ราคา</th>
                  <th>#</th>
               </tr>
              </thead>";
      for ($i=0; $i <count($list) ; $i++) {
        echo "
                  <tbody>
                       <th>
                         {$list[$i]["course_name"]}
                       </th>
                       <th>
                         {$list[$i]["price"]}
                       </th>
                       <th>
                       <form action=\"\" method=\"post\" id=\"{$i}\">
                       <input type=\"hidden\" value=\"{$id_user}\" name=\"id_user\">
                         <button class=\"btn btn-danger\" type=\"submit\" form=\"{$i}\"name=\"id_playlist\" value=\"{$list[$i]['id_playlist']}\">ซื้อ</button>

                          </form>
                       </th>
                  </tbody>
                ";
      }
      echo " </table></div>";
    }
}
