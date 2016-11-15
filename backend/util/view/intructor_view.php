<?php

class intructor_view
{
  function __construct()
  {

  }
  public function list_course(array $detail)
  {
    for ($i=0; $i <count($detail) ; $i++) {
      echo "
      <tr>
        <td>{$detail[$i]['course_name']}</td>
        <td>{$detail[$i]['price']}</td>
        <td>{$detail[$i]['rating']}</td>
      </tr>";
    }

  }
  public function detail_question(array $detail)
  {
    echo "
    <img src=\"../../frontend/store/pictures/{$detail['name']}\">
    <div class\"form-grou\">
      <label for=\"\">คำตอบที่ถูก</label>
      <input type=\"text\" name=\"id_answer\" class=\"form-control\" placeholder=\"\"value=\"{$detail['id_answer']}\">
      <p class=\"help-block\">Help text here.</p>
    </div>
    <div class=\"form-group\">
      <label for=\"\">ข้อที่1</label>
      <input type=\"text\" name=\"answer1\"class=\"form-control\" placeholder=\"\"value=\"{$detail['id_answer']}\">
    </div>
    <div class=\"form-group\">
      <label for=\"\">ข้อที่2</label>
      <input type=\"text\" name=\"answer2\"class=\"form-control\" placeholder=\"\"value=\"{$detail['id_answer']}\">
    </div>
    <div class=\"form-group\">
      <label for=\"\">ข้อที่3</label>
      <input type=\"text\" name=\"answer3\"class=\"form-control\" placeholder=\"\"value=\"{$detail['id_answer']}\">
    </div>
    <div class=\"form-group\">
      <label for=\"\">ข้อที่4</label>
      <input type=\"text\" name=\"answer4\"class=\"form-control\" placeholder=\"\"value=\"{$detail['id_answer']}\">
    </div>
    <div class=\"form-group\">
      <label for=\"\">คะแนน</label>
      <input type=\"text\" name=\"score\"class=\"form-control\" placeholder=\"\"value=\"{$detail['id_answer']}\">
    </div>
<button type=\"submit\" name=\"submit\">แก้ไข</button>

    ";

  }
  public function del_question_true()
  {
    echo "ลบโจทย์ข้อนี้แล้ว";
  }
  public function del_question_false()
  {
    echo "เกิดปัญหาระหว่างการลบ";
  }


}
 ?>
