<?php

class get_data_main
{
    private $sql;
    private $id_user;
    private $flag;
    public function __construct()
    {
        $this->sql = new PDO('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
    }
    public function question(int $flag = 1)
    {
        $this->flag = $flag - 1;
        $sql = $this->sql->prepare('SELECT * FROM question LIMIT :flag ,15 ;');
        $sql->bindParam(':flag', $this->flag, PDO::PARAM_INT);
        $sql->execute();

        return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function courses()
    {
      //about return list of intructor's courses
    }
}
