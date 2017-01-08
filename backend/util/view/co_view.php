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
    public function list_comment_course(array $data)
    {
        for ($i = 0; $i < count($data); ++$i) {
            echo "<div class=\"media\">
              <a class=\"pull-left\" href=\"#\"><img class=\"img-circle\" src=\"store/pictures/{$data[$i]['image']}\" style=\"width:80px;height:80px\"></a>
              <div class=\"media-body\">
                <font size=\"5\" style=\"font-weight:bold\">{$data[$i]['name']}</font>
                <pre style=\"font-size:18\">{$data[$i]['comment']}</pre>
              </div>
            </div>";
        }
    }
    public function rating_error()
    {
        echo '<h3>เกิดปัญหาการกดไลค์</h3>';
    }
    public function search(string $id_user, array $list)
    {
        for ($i = 0; $i < count($list); ++$i) {
            echo "<div class=\"col-md-3\" align=\"center\">
            <img src=\"store/pictures/{$list[$i]['cover']}\" style=\"width:200;height:200\">
            <h3>{$list[$i]['course_name']}</h3>
            <div style=\"font-size:25\">ราคา {$list[$i]['price']} Point</div>
            <a href =\"buy.php?id_course={$list[$i]['id_playlist']}\"class=\"btn btn-danger\" style=\"font-size:25;width:70%;margin-bottom:5%\">Buy</a>
            <button id=\"id_playlist\"class=\"btn btn-info preview\" value=\"{$list[$i]['id_playlist']}\"style=\"font-size:25;width:70%;margin-bottom:5%\" data-toggle=\"modal\" data-target=\"#myModal\">detail</button>
        </div>";
        }
    }
    public function list_preview(array $detail)
    {
        for ($i = 0; $i < count($detail); ++$i) {
            echo "<br>
                  <pre>{$detail[$i]}</pre>
                    <video style=\"width:50%;height:50%\" controls >
                      <source src=\"/frontend/store/videos/{$detail[$i]['id_video']}\" />
                    </video>
  ";
        }
    }
    public function list_answer_board(array $data)
    {
      for ($i=0; $i <count($data) ; $i++) {
        if ($i == 0) {
          echo "<div class=\"media\">
            <a class=\"pull-left\" href=\"#\"><img class=\"img-circle\" src=\"store/pictures/{$data[$i]['image']}\" style=\"width:80px;height:80px\"></a>
            <div class=\"media-body\">
              <div class=\"col-md-10 col-xs-10\">
              <font size=\"3\" style=\"font-weight:bold\">{$data[$i]['name']}</font>
              <font size=\"6\" style=\"font-weight:bold;margin-left:50px\">{$data[$i]['head']}</font>
              <font size=\"4\"style=\"font-weight:bold\">{$data[$i]['comment']}</font>
              </div>
            </div>
          </div><br><br><br><br>";
        }else {
          echo "<div class=\"media\">
            <a class=\"pull-left\" href=\"#\"><img class=\"img-circle\" src=\"store/pictures/{$data[$i]['image']}\" style=\"width:80px;height:80px\"></a>
            <div class=\"media-body\">
              <div class=\"col-md-10 col-xs-10\">
              <font size=\"5\" style=\"font-weight:bold\">{$data[$i]['name']}</font>
              <font size=\"7\" style=\"font-weight:bold;margin-left:50px\">{$data[$i]['head']}</font>
              <font size=\"6\"style=\"font-weight:bold\">{$data[$i]['comment']}</font>
              </div>
            </div>
          </div><br><br><br><br>";
        }
      }
    }
    public function list_comment_board(array $data)
    {
      for ($i=0; $i <count($data) ; $i++) {
        echo "<div class=\"media\">
          <a class=\"pull-left\" href=\"#\"><img class=\"img-circle\" src=\"store/pictures/{$data[$i]['image']}\" style=\"width:80px;height:80px\"></a>
          <div class=\"media-body\">
            <div class=\"col-md-10 col-xs-10\">
            <font size=\"3\" style=\"font-weight:bold\">{$data[$i]['name']}</font>
            <font size=\"6\" style=\"font-weight:bold;margin-left:50px\">{$data[$i]['head']}</font>
            <font size=\"4\"style=\"font-weight:bold\">{$data[$i]['comment']}</font>
            </div>
            <div class=\"col-md-2 col-xs-2\"><a href=\"answer_board.php?id_playlist={$data[$i]['id_playlist']}&id_N={$data[$i]['id_N']}\"><button class=\"btn btn-info\"><h3>ตอบข้อสงสัย</h3></button></a></div>
          </div>
        </div><br><br><br><br>";
      }
    }
}
