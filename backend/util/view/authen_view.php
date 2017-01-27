<?php

class authen_view
{
    public function __construct()
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
        echo 'เข้าสู่ระบบสำเร็จ';
    }
    public function check_session(array $detail)
    {
        echo "
        <ul class=\"nav navbar-nav navbar-right\" align=\"center\">
                <li>
                  <a href=\"#\"><font size=\"5\"> {$detail['score']} </font>
                   <img src=\"icon/point2.png\" style=\"height:60px;width:41px;margin-left:2\"></a>
                </li>
                <li>
                  <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                  <img src=\"../../frontend/store/pictures/{$detail['image']}\" class=\"img-circle\"
                  style=\"width: 30px; height: 30px; !important\" />
                                <span class=\"caret\"></span>
                            </a>
                  <ul class=\"dropdown-menu\">
                    <li>
                      <a href=\"#\"><h4>Profile</h4></a>
                    </li>
                    <li>
                      <a href=\"note.php\"><h4>My note</h4></a>
                    </li>
                    <li>
                      <a href=\"#\"><h4>Donate</h4></a>
                    </li>
                    <li>
                      <a href=\"logout.php\"><h4>Logout</h4></a>
                    </li>
                  </ul>
                </li>
                <li class=\"hidden-sm hidden-xs\">
                  <span class=\"icon-bar\"></span>
                  <span class=\"icon-bar\"></span>
                  <span class=\"icon-bar\"></span>
                </li>
              </ul>";
    }
}
