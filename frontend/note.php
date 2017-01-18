<?php session_start();
if (isset($_SESSION['id'])) {
  # code...
}else {
  header('location: index.html');
}
 ?>
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
         #myModal{

         }
     </style>
     <script type="text/javascript">
         $(document).ready(function() {
             $("#detail").click(function() {
                 $("#preview").load("detail_note.php", {
                     id_course: $(this).val()
                 },function () {
                   $("#myModal").modal();
                   MathJax.Hub.Queue(["Typeset",MathJax.Hub,"preview"]);
              });
             });
         });
     </script>
 </head>
 <script type="text/x-mathjax-config">
     MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
 </script>
 <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
 </script>

 <body style="background-image:url(pic/1847066831.jpg);">
   <div class="modal fade" id="myModal" role="dialog">
       <div class="modal-dialog ">

           <!-- Modal content-->
           <div class="modal-content">
               <div id="preview"class="modal-body">

               </div>
           </div>

       </div>
   </div>
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
     <div class="navbar navbar-default navbar-static-top" style="background-color:#fd2686">

     </div>
     <div class="section" style="background-color:#ffffff">
       <br><br><br>
         <div class="container">
           <?php require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
           $list = new student_controller();
             $list->list_note($_SESSION['id']);
           ?>
         </div>

     </div>
 </body>

 </html>
