<?php

class authen_view
{

  function __construct()
  {

  }
  public function registered()
  {
    echo 'สมัครเรียบร้อยแล้ว';
    header('refresh: 3; url=../../index.php');

  }
  public function have_user()
  {
    echo 'มีชื่อผู้ใช้หรือ email นี้แล้ว';
    header('refresh: 3; url=../../index.php');
  }
  public function login_failed()
  {
    echo 'รหัสผ่านไม่ถูกต้อง';
  }
  public function please_register()
  {
    header('refresh: 2; url=index.html');
    exit(0);
  }
  public function loged(array $detail)
  {
    echo "เข้าสู่ระบบสำเร็จ";
  }
  public function check_session(array $detail)
  {
    echo "
    <ul class=\"nav navbar-nav navbar-right\">
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

 ?>
