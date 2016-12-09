<?php

class intructor_view
{
    public function __construct()
    {
    }
    public function list_video(array $detail)
    {
        echo '<div id="list_video"class="collapse"';
        for ($i = 0; $i < count($detail); ++$i) {
          echo "<form class=\"form-inline\" action=\"question_editor.php\">";
          echo "<h3>{$detail[$i]['name']}</h3>
                   <div class=\"form-group\">
            <input type=\"text\" class=\"form-control\" name=\"description\" value=\"{$detail[$i]['description']}\">
            <input type=\"hidden\" class=\"form-control\" name=\"id_video\"value=\"{$detail[$i]['id_video']}\">
            <input type=\"submit\" class=\"btn btn-info btn-lg\"name=\"submit\" value=\"แก้ไข\">
          </div>
          ";
          echo "</form>";
        }
        echo '</div>';
    }
    public function list_question(array $detail)
    {
        echo '<div id="list_question"class="collapse">';
        for ($i = 0; $i < count($detail); ++$i) {
            echo "<h3>{$detail[$i]['name']}</h3>
              <a href=\"question_editor.php?id_question={$detail[$i]['id']}\">
                <button type=\"submit\" class=\"btn btn-info btn-lg\">แก้ไข</button></a>";
            echo '';
            echo "<a href=\"del_question.php?id_question={$detail[$i]['id']}\">
                <button type=\"submit\" class=\"btn btn-info btn-lg\">ลบ</button></a><br>";
        }
        echo '</div>';
    }
    public function question_detail(array $detail)
    {
        echo '<form class="form-inline" action="" method="post">';
        echo "<textarea id=\"question_data\" name=\"question_data\">{$detail['name']}</textarea>";
        echo "<div class=\"form-group\">
      <label for=\"\">ข้อที่ถูก</label>
      <input type=\"text\" name=\"id_answer\"class=\"form-control\" value=\"{$detail['id_answer']}\" placeholder=\"\">
    </div>";
        echo "<div class=\"form-group\">
      <label for=\"\">ข้อที่ 1</label>
      <input type=\"text\" name=\"answer1\"class=\"form-control\" value=\"{$detail['answer1']}\" placeholder=\"\">
    </div>";
        echo "<div class=\"form-group\">
      <label for=\"\">ข้อที่ 2</label>
      <input type=\"text\" name=\"answer2\"class=\"form-control\" value=\"{$detail['answer2']}\" placeholder=\"\">
    </div>";
        echo "<div class=\"form-group\">
      <label for=\"\">ข้อที่ 3</label>
      <input type=\"text\" name=\"answer3\"class=\"form-control\" value=\"{$detail['answer3']}\" placeholder=\"\">
    </div>";
        echo "<div class=\"form-group\">
      <label for=\"\">ข้อที่ 4</label>
      <input type=\"text\" name=\"answer4\"class=\"form-control\" value=\"{$detail['answer4']}\" placeholder=\"\">
    </div>";
        echo "<div class=\"form-group\">
      <label for=\"\">คะแนน</label>
      <input type=\"text\" name=\"score\"class=\"form-control\" value=\"{$detail['score']}\" placeholder=\"\">
    </div>";
        echo "<input type=\"hidden\" name=\"id_question\" value=\"{$detail['id']}\"><br>";
        echo '<input type="submit" class="btn btn-info btn-lg"name="submit" value="แก้ไข"></form>';
    }
    public function list_course(array $detail)
    {
        for ($i = 0; $i < count($detail); ++$i) {
            echo "<tr>
          <td>{$detail[$i]['course_name']}</td>
          <td>{$detail[$i]['price']}</td>
          <td>
              <a href=\"editor.php?id_course={$detail[$i]['id_playlist']}\">แก้ไข/ลบ</a>
          </td>
          <td>
              <span class=\"glyphicon glyphicon-star\"></span>
              <span class=\"glyphicon glyphicon-star\"></span>
              <span class=\"glyphicon glyphicon-star\"></span>
          </td>
      </tr>";
        }
    }
    public function detail_question(array $detail)
    {
        $id_answer = (int) $detail['id_answer'] + 1;
        echo "
    <h3>{$detail['name']}</h3>
    <input type=\"hidden\" name=\"id_author\" value=\"{$detail['id_author']}\">
    <div class\"form-grou\">
      <label for=\"\">คำตอบที่ถูก</label>
      <input type=\"text\" name=\"id_answer\" class=\"form-control\" value=\"{$id_answer}\">
    </div>
    <div class=\"form-group\">
      <label for=\"\">ข้อที่1</label>
      <input type=\"text\" name=\"answer1\"class=\"form-control\" value=\"{$detail['answer1']}\">
    </div>
    <div class=\"form-group\">
      <label for=\"\">ข้อที่2</label>
      <input type=\"text\" name=\"answer2\"class=\"form-control\" value=\"{$detail['answer2']}\">
    </div>
    <div class=\"form-group\">
      <label for=\"\">ข้อที่3</label>
      <input type=\"text\" name=\"answer3\"class=\"form-control\" value=\"{$detail['answer3']}\">
    </div>
    <div class=\"form-group\">
      <label for=\"\">ข้อที่4</label>
      <input type=\"text\" name=\"answer4\"class=\"form-control\" value=\"{$detail['answer4']}\">
    </div>
    <div class=\"form-group\">
      <label for=\"\">คะแนน</label>
      <input type=\"text\" name=\"score\"class=\"form-control\" value=\"{$detail['score']}\">
    </div>
<button type=\"submit\" name=\"submit\">แก้ไข</button>

    ";
    }
    public function detail_question_false()
    {
        echo 'เกิดปัญหาระหว่างการดูรายละเอียดโจทย์ของคุณ';
    }
    public function del_question_true()
    {
        echo 'ลบโจทย์ข้อนี้แล้ว';
    }
    public function del_question_false()
    {
        echo 'เกิดปัญหาระหว่างการลบ';
    }
    public function question_true()
    {
        echo 'สร้างโจทย์สำเร็จ';
    }
    public function question_false()
    {
        echo 'เกิดปัญหาการสร้างโจทย์ โปรดลองใหม่ภายหลัง';
    }
    public function make_exam_true()
    {
        echo 'เพิ่มข้อสอบสำเร็จ';
    }
    public function make_exam_false()
    {
        echo 'เกิดปัญหาในการเพิ่มข้อสอบ';
    }
    public function get_list_video_course(array $detail)
    {
        for ($i = 0; $i < count($detail); ++$i) {
            echo "<div class=\"table-responsive\">
              <table class=\"table\">
                <tbody>
                     <th>
                       {$detail[$i]['description']}
                     </th>
                     <th>
                        <button id=\"del\" class=\"btn-warning\" value=\"{$detail[$i]['id_video']}\">ลบวิดีโอ</button>
                        <button id =\"detail\"class\"btn-info\" value=\"{$detail[$i]['id_video']}\">รายละเอียด</button>
                     </th>
                </tbody>
              </table>
            </div>";
        }
    }
    public function update_course_true()
    {
        echo 'เพิ่มวิดีโอเรียบร้อย';
    }
    public function update_course_false()
    {
        echo 'เกิดปัญหาในการเพิ่มวิดีโอ';
    }
    public function return_draft(array $draft)
    {
        echo $draft['data'];
    }
    public function check_session(array $detail)
    {
        echo "
    <ul class=\"nav navbar-nav navbar-right\" >
     <li ><a href=\"#\">{$detail['score']}
     <img src=\"picture/Point.png\" style=\"width: 15px; height:15px;margin-bottom: 5px\" ><br>
     </a></li>
      <li class=\"dropdown\">
        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
          <img src=\"../../frontend/store/pictures/{$detail['image']}\" class=\"img-circle\"
          style=\"width: 30px; height: 30px; !important\" />
        <span class=\"caret\"></span></a>
        <ul class=\"dropdown-menu\">
          <li><a href=\"logout.php\">logout</a></li>
        </ul>
      </li>
    </ul>";
    }
}
