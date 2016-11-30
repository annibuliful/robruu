<?php
declare(strict_types=1);
 ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title></title>
        <script type="text/javascript" src="lib/jquery.js"></script>
    </head>

    <body>
        <form action="controller/create_question.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" class="form-control" name="img" placeholder="video">
            </div>
            <input type="hidden" name="id_author" value="1">
            <div class="form-group">
                <input type="text" class="form-control" name="answer1" placeholder="คำตอบที่ 1">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="answer2" placeholder="คำตอบที่ 2">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="answer3" placeholder="คำตอบที่ 3">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="answer4" placeholder="คำตอบที่ 4">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="id_answer" placeholder="คำตอบที่ถูกต้อง">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="score" placeholder="คะแนน">
            </div>
            <div class="form-group">
                <input type="submit" name="name" value="สร้างคำถาม">
            </div>
            <div class="test">

            </div>
            <br>
            <button type="button" id="btn2" name="button">เพิ่มคำถาม</button>
        </form>

    </body>

    </html>
