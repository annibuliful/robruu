<?php

declare(strict_types=1);
class student_view
{
    public function __construct()
    {
    }
    public function ranking(array $detail)
    {
        for ($i = 0; $i < count($detail); ++$i) {
            echo "<li type=\"1\">{$detail[$i]['username']}</li>";
        }
    }
    public function answer_true()
    {
        echo 'คำตอบถูกต้อง ';
    }
    public function answer_false()
    {
        echo 'คำตอบไม่ถูกต้อง';
    }
    public function answer_answered()
    {
        echo 'โจทย์ข้อนี้คุณตอบไปแล้ว';
    }
    public function showdetail_course(array $detail)
    {
        echo '<div class="btn-group">';
        for ($i = 0; $i < count($detail); ++$i) {
            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"collapse\" data-target=\"#demo{$i}\">กดดูวิดีโอ</button>";
        }
        echo '</div>';
        for ($i = 0; $i < count($detail); ++$i) {
            echo "<br>
       <div id=\"demo{$i}\" class=\"collapse\"><video width=\"600px\" height=\"500px\" controls >
         <source src=\"../../frontend/store/videos/{$detail[$i]['id_video']}\" type=\"video/mp4\"/>
      </video>
    </div>
    ";
        }
    }
    public function list_course(array $list, $id_user)
    {
        for ($i = 0; $i < count($list); ++$i) {
            echo "<li class=\"media\">
                <a class=\"pull-left\" href=\"#\"><img class=\"media-object\" src=\"store/pictures/{$list[$i]['cover']}\" height=\"150\" width=\"150\"></a>
                <div class=\"media-body\">
                  <font size=\"5\" style=\"font-weight:bold\">{$list[$i]['course_name']}</font>
                  <pre style=\"font-size:18\">{$list[$i]['description']}</pre>
                  <button type=\"button\" class=\"btn btn-info\" data-toggle=\"collapse\" data-target=\"#c1{$i}\">Do it!</button>
                  <div id=\"c1{$i}\" class=\"collapse\">
                    <a href=\"content.php?id_course={$list[$i]['course_id']}\"><img src=\"button/sheet.png\" width=\"50\"></a>
                    <a href=\"video.php?id_course={$list[$i]['course_id']}&id_user={$id_user}\"><img src=\"button/video.png\" width=\"50\"></a>
                    <a href=\"exercise.php?id_course={$list[$i]['course_id']}\"><img src=\"button/exercise.png\" width=\"50\"></a>
                    <a href=\"exam.php?id_course={$list[$i]['course_id']}\"><img src=\"button/quiz.png\" width=\"50\"></a>
                  </div>
                </div>
              </li>";
        }
    }
    public function detail_video(string $detail)
    {
        echo "<center><video width=\"300\" height=\"200\" controls autoplay>
         <source src=\"../../frontend/store/videos/{$detail}\" type=\"video/mp4\" />
      </video></center>";
    }
    public function question(array $question)
    {
        echo '<form class="" action="" method="post">';
        echo '<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">';
        echo '<ol class="carousel-indicators">';
        for ($i = 0; $i < count($question); ++$i) {
            if ($i == 0) {
                echo "<li data-target=\"#myCarousel\" data-slide-to=\"{$i}\" class=\"active\" ></li>";
            } else {
                echo "<li data-target=\"#myCarousel\" data-slide-to=\"{$i}\" ></li>";
            }
        }
        echo '</ol>';
        echo '<div class="carousel-inner" role="listbox">';
        for ($i = 0; $i < count($question); ++$i) {
            if ($i == 0) {
                echo "<div class=\"item active\">
              <div class=\"col-md-9\" style=\"margin-left: 30px\">
              <center>
              <h2>
                <div class=\"col-md-12\">{$question[$i]['name']}</div>

                  <div class=\"checkbox\">
                    <label><input type=\"checkbox\" name=\"id_answer[]\" value=\"0\">{$question[$i]['answer1']}</label>
                  </div>
                  <div class=\"checkbox\">
                    <label><input type=\"checkbox\" name=\"id_answer[]\" value=\"1\">{$question[$i]['answer2']}</label>
                  </div>
                  <div class=\"checkbox\">
                    <label><input type=\"checkbox\" name=\"id_answer[]\" value=\"2\">{$question[$i]['answer3']}</label>
                  </div>
                  <div class=\"checkbox\">
                    <label><input type=\"checkbox\" name=\"id_answer[]\" value=\"3\">{$question[$i]['answer4']}</label>
                  </div>
                  <input type=\"hidden\" name=\"id_question[]\" value=\"{$question[$i]['id']}\">
                    </h2>
                  </center>
              </div></div><br>";
            } else {
                echo "<div class=\"item \">

              <div class=\"col-md-12\">
              <center>
              <h2>
                <div class=\"col-md-12\">{$question[$i]['name']}</div>

                  <div class=\"checkbox\">
                    <label><input type=\"checkbox\" name=\"id_answer[]\" value=\"0\">{$question[$i]['answer1']}</label>
                  </div>
                  <div class=\"checkbox\">
                    <label><input type=\"checkbox\" name=\"id_answer[]\" value=\"1\">{$question[$i]['answer2']}</label>
                  </div>
                  <div class=\"checkbox\">
                    <label><input type=\"checkbox\" name=\"id_answer[]\" value=\"2\">{$question[$i]['answer3']}</label>
                  </div>
                  <div class=\"checkbox\">
                    <label><input type=\"checkbox\" name=\"id_answer[]\" value=\"3\">{$question[$i]['answer4']}</label>
                  </div>
                  <input type=\"hidden\" name=\"id_question[]\" value=\"{$question[$i]['id']}\">
                  <center>
                  </h2>
              </div></div><br>";
            }
        }
        echo '<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>';
        echo '</div><center><input type="submit" class="btn btn-info btn-lg"name="submit" value="ส่งคำตอบ"></center></form>';
    }
    public function exercise(array $question)
    {
        echo '<form class="" action="" method="POST">';
        for ($i = 0; $i < count($question); ++$i) {
            echo "<div class=\"col-md-12\">
              <center>
              <h2>
                <div class=\"col-md-12\">{$question[$i]['name']}</div>

                  <div class=\"radio\">
                    <label><input type=\"radio\" name=\"id_answer[]\" value=\"0\">{$question[$i]['answer1']}</label>
                  </div>
                  <div class=\"radio\">
                    <label><input type=\"radio\" name=\"id_answer[]\" value=\"1\">{$question[$i]['answer2']}</label>
                  </div>
                  <div class=\"radio\">
                    <label><input type=\"radio\" name=\"id_answer[]\" value=\"2\">{$question[$i]['answer3']}</label>
                  </div>
                  <div class=\"radio\">
                    <label><input type=\"radio\" name=\"id_answer[]\" value=\"3\">{$question[$i]['answer4']}</label>
                  </div>
                  <input type=\"hidden\" name=\"id_question[]\" value=\"{$question[$i]['id']}\">
                    </h2>
                  </center>
              </div><br></div><center><input type=\"submit\" name=\"submit\" class=\"btn btn-info btn-lg\"value=\"ส่งคำตอบ\"></center></form>";
        }
    }

}
