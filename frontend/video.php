<?php session_start();
if (isset($_GET['id_course']) && isset($_GET['id_user'])) {
    require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
    require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/co_controller.php';
    require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/authen_controller.php';
    $authen = new authen_controller();
    $detail = new student_controller();
    $comment = new co_controller();
}

 ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="lib/jquery.js"></script>
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="lib/notify.js"></script>
        <script src="node_modules/video.js/dist/video.js"></script>
        <script src="node_modules/videojs-youtube/dist/Youtube.js"></script>
        <script src="dist/videojs-playlist.js"></script>
        <script src="http://cdn.ckeditor.com/4.6.0/standard-all/ckeditor.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="node_modules/video.js/dist/video-js.css" rel="stylesheet">
        <link href="dist/videojs-playlist.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
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
    </head>

    <body style="background-color:#ffa862">
      <nav class="navbar navbar-default navbar-static-top" style="background-color:white">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li>
              <a class="navbar-brand" href="#"><img src="pic/brand.png" style="height: 60px">
                          </a>
            </li>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </ul>
        </div>
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <div class="navbar-header">
              <ul class="nav navbar-nav">
                <li>
                  <form class="navbar-form" action="buy.php" method="post">
                      <div class="input-group">
                          <input type="text" name="course_name" class="form-control" placeholder="ค้นหาบทเรียน">
                          <div class="input-group-btn">
                              <button class="btn btn" type="button">
                             <span class="glyphicon glyphicon-search"></span>
                             <i class="icon-search"></i>
                             </button>
                          </div>
                      </div>
                  </form>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right" align="center">
                <?php $authen->check_session($_SESSION['id']); ?>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="row" style="background-color:#ec7237">
        <div class="col-md-2" style="background-color:#f39d51">
          <center>
            <a href="main.php"><i class="fa fa-2x fa-fw text-inverse fa-chevron-left" style="margin-top:9px"></i>
                <font style="font-weight: bold;color:ffffff;font-size:150%">ย้อนกลับ</font></a>
          </center>
        </div>
        <div class="col-md-8">
        </div>
      </div>
                <div class="row" style="background-color:#ffffff;box-shadow: 0px 10px 10px #cd9b5b;">
                    <div class="col-md-7">
                      <video id="videojs-playlist-player" class="video-js vjs-default-skin" controls>

                      </video>
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
                            $(document).ready(function() {
                                $(".comment_click").click(function() {
                                    $("#comment").load("comment.php", {
                                        id_user: '<?php echo $_SESSION['id']; ?>',
                                        comment: $("#commen").val(),
                                        id_course: '<?php echo $_GET['id_course']; ?>'
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
                <br><br><br>
                <div class="container" style="background-color:#fff3e1;box-shadow: 0px 10px 10px #f4ede3;">
                  <div class="row">
                 <div class="col-md-12" style="background-image: url(pic/shadow.png);background-repeat: no-repeat;">
                   <br><br>
                    <input id="commen" class="form-control"type="text" placeholder="แสดงความคิดเห็น">
<br>
                    <button type="button" id="comment_click" name="button" class="btn btn-info comment_click">แสดงความคิดเห็น</button>
                    <br><br>
                </div>
                            <?php if (isset($_POST['comment'])) {
     $comment->comment_course($_SESSION['id'], $_POST['comment'], $_GET['id_course']);
 } else {
     $comment->comment_course($_SESSION['id'], '', $_GET['id_course']);
 } ?>

                    </div>
</div></div>
                </div>


    </body>

    </html>
