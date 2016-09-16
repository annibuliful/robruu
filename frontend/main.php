<?php include 'DB/authen.php';?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="lib/jquery.js"></script>
    <script type="text/javascript" src="lib/angular.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <title></title>
</head>
<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
  $login = new authen($_POST['username'], $_POST['password']);
  $login->login();
}elseif (isset($_POST['username_reg'])&&isset($_POST['password_reg'])) {
  $reg = new authen($_POST['username_reg'], $_POST['password_reg'], $_POST['email_reg'],
                    $_POST['date_reg'].'/'.$_POST['month_reg'].'/'.$_POST['year_reg']);
  $reg->register();
}


 ?>
<body style="background-color:#999999;">
    <nav class="navbar navbar-default" role="navigation" style="background-color:#CCFF99; width: 100%;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">

                </button>
                <a class="navbar-brand" href="#">Robruu Online</a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
              <ul class="nav navbar-nav navbar-left">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="ค้นหา">
                    </div>
                    <button type="submit" class="btn btn-default">ค้นหา</button>
                </form>
              </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" style="background-color:#FFFFFF;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="..." alt="..." class="img-circle" style="background-color:#999999;">
                            Message
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <!--  ตรงนี้ทำเป็น loop สำหรับ ข้อความ<li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">change username</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">change myself</a>
                            </li>!-->
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color:#FFFFFF;">
                            <img src="..." alt="..." class="img-circle" style="background-color:#999999;"> setting
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">ชื่อผู้ใช้งาน</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">รหัสผ่าน</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">ตัวตนของคุณ</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">วิชาที่ชอบ</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</body>

</html>
