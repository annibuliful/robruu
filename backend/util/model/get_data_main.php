<?php

class get_data_main
{
    private $sql;
    private $id_user;
    private $flag;
    public function __construct()
    {
        $this->sql = new PDO('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
        $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function question(int $flag = 1)
    {
        $flag = $flag - 1;
        if ($flag == null) {
          $sql = $this->sql->prepare('SELECT * FROM question LIMIT 0 ,15 ;');
          $sql->execute();
          return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
        }else {
          $sql = $this->sql->prepare('SELECT * FROM question LIMIT :flag ,15 ;');
          $sql->bindParam(':flag',$flag,PDO::PARAM_INT);
          $sql->execute();
          return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    public function courses(int $flag = 1)
    {
      $flag = $flag - 1;
      if ($flag == null) {
          $sql = $this->sql->prepare('SELECT * FROM video_playlist WHERE flag_num = 1 LIMIT 0 ,15 ;');
          $sql->execute();
        return (array) $sql->fetchALL(PDO::FETCH_ASSOC);
      }else {
        $sql = $this->sql->prepare('SELECT * FROM video_playlist WHERE flag_num = 1 LIMIT :flag ,15 ;');
        $sql->bindParam(':flag', $this->flag, PDO::PARAM_INT);
        $sql->execute();
      return (array) $sql->fetchALL(PDO::FETCH_ASSOC);
      }
    }
    public function list_choice(int $id_question){
      $sql = $this->sql->prepare('SELECT * FROM choice_question ');
      $sql->bindParam(':id_question',$id_question,PDO::PARAM_INT);
      $sql->execute();
      return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
