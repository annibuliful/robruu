<?php

class intructor_view
{
  function __construct()
  {

  }
  public function list_course(array $detail)
  {
    for ($i=0; $i <count($detail) ; $i++) {
      echo "
      <tr>
        <td>{$detail[$i]['course_name']}</td>
        <td>{$detail[$i]['price']}</td>
        <td>{$detail[$i]['rating']}</td>
      </tr>";
    }

  }

}
 ?>
