<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="lib/jquery.js"></script>
    <script type="text/javascript" src="lib/angular.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<style>
body {
    background-image: url("picture/Knowledge-Hoarding.jpg");
}
</style>
<body style="background-image:picture/Knowledge-Hoarding.jpg;">
    <nav class="navbar navbar-default navbar-static-top " role="navigation" style="background-color:#CCFF99; width: 100%;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Robruu Online</a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left" role="search" action="frontend/main.php" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้งาน">
                            <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน">
                        </div>
                        <button type="submit" class="btn btn-default">เข้าสู่ระบบ</button>
                    </form>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="col-md-4 col-sm-4 img-circle col-xs-4  text-center" style="background-color:#FFFFFF;">

            <h3>รายชื่อติวเตอร์ที่สอนดี</h3>
        </div>
        <div class="col-md-3">

        </div>
        <div class="col-md-5 col-sm-5 img-circle col-xs-5 text-center" style="background-color:#FFFFFF;">
            <h1>สมัครสมาชิก</h1>
            <div class="col-md-1">

            </div>
            <div class="col-md-10 text-center">
                <form action="frontend/main.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username_reg" class="form-control" placeholder="ชื่อผู้ใช้งาน">
                        <input type="text" name="email_reg" class="form-control" placeholder="E-mail">
                        <input type="password" name="password_reg" class="form-control" placeholder="รหัสผ่าน"> วันที่
                        <select name="date_reg">
                            <?php for ($i = 1; $i <= 31; ++$i) {
    echo "<option value=\"$i\">$i</option>";
}  ?>

                        </select>
                        เดือน
                        <select name="month_reg">
                            <?php for ($i = 1; $i <= 12; ++$i) {
    echo "<option value=\"$i\">$i</option>";
} ?>
                        </select>
                        ปี
                        <select name="year_reg">
                            <?php for ($i = 1998; $i < date('Y'); ++$i) {
    echo "<option value=\"$i\">$i</option>";
} ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">สมัครสมาชิก</button>
                </form>
            </div>
        </div>

    </div>

</body>

</html>
