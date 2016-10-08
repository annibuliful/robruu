<?php

class view
{
  function __construct()
  {}
  public function viewdata(array $data)
  {
    $result = $data ;
    foreach ($result as $key => $value) {
      echo "{$key} => {$value} ";
    }
  }
}
 ?>
