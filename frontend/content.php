<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="lib/jquery.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
    </script>
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
    </script>

    <style>
        @font-face {
            font-family: thaisan;
            src: url(thaisanslite_r1.ttf);
        }

        * {
            font-family: thaisan;
            !important;
        }
    </style>
    <style>
        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            width: 70%;
            margin: auto;
        }
    </style>
    <style>
        .center {
            text-align: center;
        }
    </style>
</head>
<script type="text/x-mathjax-config">
    MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
</script>
<script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
</script>

<body><body style="background-color:#f6d7e2">
    <div class="navbar navbar-default navbar-static-top" style="background-color:#ffffff; height:15%">
      <div class="container" style=" width:90%">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="main.php"><span></span><img src="pic/brand.png" style="height: 80%"></a>
        </div>
        <div>
          <ul class="nav navbar-nav navbar-right">
            <li class="hidden-xs">
              <a href="mycourse.php"><img src="icon/study.png" style="height:50%"><font size="5">บทเรียนของฉัน</font></a>
            </li>
            <li active="" class="hidden-xs">
              <a href="main-t.php"><img src="icon/course.png" style="height:50%"><font size="5">บทเรียนที่ฉันสอน</font></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row" style="background-color: fff8bf;border:1px solid #d8bac9 ;box-shadow: 0px 10px 10px #d8bac9;">
     <div class="col-md-2" style="background-color:fff498;">
       <center>
         <a href="main.php"><i class="fa fa-2x fa-chevron-left fa-fw text-danger" style="margin-top:9px"></i>
             <font style="font-weight: bold;color:fa4b4b;font-size:150%">ย้อนกลับ</font></a>
       </center>
     </div>
   </div>
   <div class="section">
      <div class="container" style="background-color:ffffff">
        <div class="row">
          <div class="col-md-12" style="border:1px solid #d8bac9 ;box-shadow: 0px 0px 15px #d8bac9;">
            <div class="col-md-10" style="margin-top:2%;font-size:22px;">
              <h2>
              <?php require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
              $list = new student_controller();
              if (isset($_GET['id_course'])) {
                $list->content($_GET['id_course']);
              } ?></h2></div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>
