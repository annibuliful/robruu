<?php

class get_data
{
    private $sql;
    private $id_user;
    private $flag;
    public function __construct()
    {
        $this->sql = new PDO('mysql:host=localhost;dbname=robruu_online', 'root', '@PeNtesterMYSQL');
    }
    public function get_profile($id_user)
    {
        $this->id_user = $id_user;
        $sql = $this->sql->prepare('SELECT * FROM user WHERE id = :id_user ;');
        $sql->bindParam(':id_user', $this->id_user);
        $sql->execute();

        return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function question_user(int $id_intructor, int $flag = 1)
    {
        $this->id_user = $id_intructor;
        $this->flag = $flag - 1;
        $sql = $this->sql->prepare('SELECT * FROM question WHERE id_user = :id_user LIMIT :flag ,15 ;');
        $sql->bindParam(':flag', $this->flag, PDO::PARAM_INT);
        $sql->bindParam(':id_user', $this->id_intructor, PDO::PARAM_INT);
        $sql->execute();

        return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function courses(int $id_user, int $flag = 1)
    {
        $this->flag = $flag - 1;
        $this->id_user = $id_user;
        $sql = $this->sql->prepare('SELECT * FROM course WHERE id_user = :id_user LIMIT :flag ,5 ;');
        $sql->bindParam(':flag', $this->flag, PDO::PARAM_INT);
        $sql->bindParam(':id_user',$this->id_user);
        $sql->execute();

        return (array) $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
