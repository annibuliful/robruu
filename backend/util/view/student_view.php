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
  public function list_course(array $list)
  {
    for ($i=0; $i < count($list) ; $i++) {
      echo "<div class=\"table-responsive\">
              <table class=\"table\">
                <tbody>
                     <th>
                       {$list[$i]["course_name"]}
                     </th>
                     <th>
                       <input type=\"image\" class=\"img-responsive img-circle\"src=\"picture/video.png\"
                           style=\"width: 60px; height: 60px\" value=\"{$list[$i]['id_video']}\" id=\"detail\" data-toggle=\"modal\"
                           data-target=\"#myModal\">
                     </th>
                </tbody>
              </table>
            </div>";
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
