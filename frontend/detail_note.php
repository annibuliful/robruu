
          <h2><?php require 'C:/Users/Dell/Documents/GitHub/robruu/backend/util/controller/student_controller.php';
          $list = new student_controller();
          if (isset($_POST['id_course'])) {
            $list->detail_note($_POST['id_course']);
          } ?></h2>
