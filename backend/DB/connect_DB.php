<?php

include 'config/config_DB.php';
class connect_DB extends config
{
    private $pdo;
    public function __construct()
    {
        try {
            $pdo = new PDO('mysql:dbname=;host=127.0.0.1', parent::$user, parent::$password);
        } catch (PDOException $e) {
            echo 'error : '.$e->getMessage();
        }
    }
    public function select($command, $logic)
    {
        $sql = $this->$pdo->prepare('SELECT * FROM :command WHERE :logic ;');
        $sql->bindparam(':command', $command);
        $sql->bindparam(':logic', $logic);
        $this->$pdo->execute();
        if ($this->$pdo->fetch()) {
            return true;
        }

        return false;
    }
    public function insert($table, $column, $values)
    {
        try {
            $sql = $this->$pdo->prepare("INSERT INTO :table (:column) VALUES (':values');");
            $sql->bindparam(':table', $table, PDO::PARAM_STR, 20);
            $sql->bindparam(':column', $column, PDO::PARAM_STR);
            $sql->bindparam(':values', $values);
            $sql->execute();
        } catch (PDOException $e) {
            echo 'error : '.$e->getMessage();
        }
    }
    public function update($table, $column, $values, $logic)
    {
        try {
            $sql = $this->$pdo->prepare('UPDATE :table SET :column = :value WHERE :logic;');
            $sql->bindparam(':table', $table);
            $sql->bindparam('column', $column);
            $sql->bindparam(':value', $values);
            $sql->bindparam(':logic', $logic);
            $sql->execute();
        } catch (PDOException $e) {
            echo 'error : '.$e->getMessage();
        }
    }
}?>
