<?php session_start();
if (isset($_GET['id_course']) && isset($_GET['id_user'])) {
    require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
    require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/co_controller.php';
    $detail = new student_controller();
    $comment = new co_controller();
}

 ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="lib/jquery.js"></script>
        <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="lib/notify.js"></script>
        <script src="node_modules/video.js/dist/video.js"></script>
        <script src="node_modules/videojs-youtube/dist/Youtube.js"></script>
        <script src="dist/videojs-playlist.js"></script>
        <script src="http://cdn.ckeditor.com/4.6.0/standard-all/ckeditor.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="node_modules/video.js/dist/video-js.css" rel="stylesheet">
        <link href="dist/videojs-playlist.css" rel="stylesheet">
        <title></title>
        <style>
            @font-face {
                font-family: thaisan;
                src: url(thaisanslite_r1.ttf);
            }

            * {
                font-family: thaisan;
                !important;
            }
            .video-js {
              width: 100%;
              height: 450px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#comment_click").click(function() {
                    $("#comment").load("comment.php", {
                        id_user: '<?php echo $_SESSION['id']; ?>',
                        comment: $("#commen").val(),
                        id_course: '<?php echo $_GET['id_course']; ?>'
                    });
                });
            });
        </script>
        <script type="text/javascript">
        </script>

    </head>

    <body>
        <div class="navbar navbar-default navbar-static-top" style="background-color:#ffffff; height:15%">
            <div class="container" style="; width:90%">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                    <a href="main.php"><span></span><img src="pic/brand.png" style="height: 80px"></a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-xs">
                            <a href="mycourse.php"><img src="icon/study.png" style="height:50px">
                                <font size="5">บทเรียนของฉัน</font>
                            </a>
                        </li>
                        <li active="" class="hidden-xs">
                            <a href="main-t.php"><img src="icon/course.png" style="height:50px">
                                <font size="5">บทเรียนที่ฉันสอน</font>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar navbar-default navbar-static-top" style="background-color:#2169a5;">
        </div>
        <div class="section" style="background-color:ffffff;opacity:0.97;margin-top:2.3%">
            <div class="container">
                <div class="row">
                    <div class="col-md-7" style="background-color:#ffffff;opacity:0.97">
                      <video id="videojs-playlist-player" class="video-js vjs-default-skin" controls>

                      </video>
                        <a href="main.php"><br><br>
                            <button type="button" name="button" class="btn btn-danger btn-lg">ย้อนกลับ</button></a>
                    </div>
                    <div class="col-md-1">
                        <input type="hidden" name="id_playlist" value="<?php echo $_GET['id_course']; ?>">
                        <textarea rows="4" cols="8" id="note" name="note">
                            <?php if (isset($_GET['id_course'])) {
     $detail->note($_SESSION['id'], $_GET['id_course'], '');
 } ?>
                </textarea>
                        <button id="notes" type="button" class="btn btn-primary btn-lg" name="button">บันทึก</button>
                        <br><br><br>
<script type="text/javascript">
(function(window, videojs) {
      var playlist = [
        <?php $detail->list_playlist($_GET['id_course']); ?>
      ];

      var player = window.player = videojs('videojs-playlist-player', { preload: true, techOrder: ["youtube", "html5"], controls: true});
      player.playlist({ videos: playlist, playlist : { hideSidebar: false, upNext: true, hideIcons: false, thumbnailSize: 200, items: 3 } });
    }(window, window.videojs));
</script>
                        <script>
                            var editor = CKEDITOR.replace('note', {
                                extraPlugins: 'mathjax',
                                mathJaxLib: 'http://cdn.mathjax.org/mathjax/2.6-latest/MathJax.js?config=TeX-AMS_HTML',
                                height: 270,
                                width: 550
                            });
                            $(document).ready(function() {
                                $.notify.addStyle('happyblue', {
                                    html: "<div><h1>☺<span data-notify-text/>☺</h1></div>",
                                    classes: {
                                        base: {
                                            "white-space": "nowrap",
                                            "background-color": "lightblue",
                                            "padding": "5px"
                                        },
                                        superblue: {
                                            "color": "white",
                                            "background-color": "blue"
                                        }
                                    }
                                });
                                $("#notes").click(function() {
                                    $.post("save_note.php", {
                                            id_user: '<?php echo $_SESSION['id']; ?>',
                                            id_playlist: '<?php echo $_GET['id_course']; ?>',
                                            note: editor.getData()
                                        },
                                        function(result) {
                                            $.notify("บันทึกเรียบร้อย", {
                                                style: 'happyblue'
                                            });
                                        }
                                    );

                                });
                            });
                        </script>
                    </div>
                </div>
                <br><br><br>
                <div class="container">
                    <input id="commen" class="form-control"type="text" name="" value="" placeholder="แสดงความคิดเห็น">
                    <button type="button" id="comment_click" name="button" class="btn btn-info ">แสดงความคิดเห็น</button>
                </div>
                <div>
                    <div class="container" id="comment" style="margin-top: 80px">
                        <div class="row">
                            <?php if (isset($_POST['comment'])) {
     $comment->comment_course($_SESSION['id'], $_POST['comment'], $_GET['id_course']);
 } else {
     $comment->comment_course($_SESSION['id'], '', $_GET['id_course']);
 } ?>

                        </div>

                    </div>

                </div>
            </div>
        </div>


    </body>

    </html>
