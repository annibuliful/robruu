<?php
declare(strict_types=1);
class student_view
{
  function __construct()
  {
  }
  public function answer_true()
  {
    echo "คุณตอบได้ถูกต้อง ";
  }
  public function answer_false(){
    echo "คุณตอบไม่ถูกต้อง";
  }
  public function answer_answered(){
    echo "โจทย์ข้อนี้คุณตอบไปแล้ว";
  }
  public function showdetail_course(array $detail)
  {
    for ($i=0; $i <count($detail) ; $i++) {
      echo "<h3>{$detail[$i]['description']}</h3>
      <button type=\"button\" class=\"btn btn-info\" data-toggle=\"collapse\" data-target=\"#demo{$i}\">กดดูวิดีโอ</button>
       <div id=\"demo{$i}\" class=\"collapse\">
        <center><video width=\"100%\" height=\"50%\" controls >
         <source src=\"../../frontend/store/videos/{$detail[$i]['id_video']}\" type=\"video/mp4\"/>
      </video></center>
    </div>";
    }

  }
  public function list_course(array $list,$id_user)
  {
    for ($i=0; $i < count($list) ; $i++) {
      echo "<li class=\"media\">
                <a class=\"pull-left\" href=\"#\"><img class=\"media-object\" src=\"store/pictures/\" height=\"150\" width=\"150\"></a>
                <div class=\"media-body\">
                  <font size=\"5\" style=\"font-weight:bold\">{$list[$i]['course_name']}</font>
                  <pre style=\"font-size:18\">{$list[$i]['description']}</pre>
                  <button type=\"button\" class=\"btn btn-info\" data-toggle=\"collapse\" data-target=\"#c1{$i}\">Do it!</button>
                  <div id=\"c1{$i}\" class=\"collapse\">
                    <img src=\"button/sheet.png\" width=\"50\">
                    <a href=\"video.php?id_course={$list[$i]['course_id']}&id_user={$id_user}\"><img src=\"button/video.png\" width=\"50\"></a>
                    <img src=\"button/exercise.png\" width=\"50\">
                    <img src=\"button/quiz.png\" width=\"50\">
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
  public function question( array $question,$id_user)
  {
    for ($i=0; $i < count($question) ; $i++) {
    echo "<div class=\"col-md-12\">
            <img src=\"../../frontend/store/pictures/{$question[$i]['name']}\" class=\"img-responsive\"/>
            <form class=\"\" action=\"\" method=\"post\">
              <div class=\"radio\">
                <label><input type=\"radio\" name=\"id_answer\" value=\"0\">{$question[$i]['answer1']}</label>
              </div>
              <div class=\"radio\">
                <label><input type=\"radio\" name=\"id_answer\" value=\"1\">{$question[$i]['answer2']}</label>
              </div>
              <div class=\"radio\">
                <label><input type=\"radio\" name=\"id_answer\" value=\"2\">{$question[$i]['answer3']}</label>
              </div>
              <div class=\"radio\">
                <label><input type=\"radio\" name=\"id_answer\" value=\"3\">{$question[$i]['answer4']}</label>
              </div>
              <input type=\"hidden\" name=\"id_user\" value=\"{$id_user}\">
              <input type=\"hidden\" name=\"id_question\" value=\"{$question[$i]['id']}\">
              <input type=\"submit\" name=\"submit\" value=\"ส่งคำตอบ\">
            </form>


          </div><br>";
    }
  }
}
 ?>
