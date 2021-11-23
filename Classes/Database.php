<?php

namespace Classes\Database;

use Config;
use Interfaces\IDatabase;
use PDO;
use PDOException;

class Database implements IDatabase
{
    private $db;
    private $database_user = "users";

    public function connect(){
        try {
            $db_conn = new PDO('mysql:host='.Config::DB_HOST.';dbname='.Config::DB_NAME , Config::DB_USER, Config::DB_PASS);
            $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $db_conn;
            return $db_conn;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function findAll(string $database){
        $sql = 'SELECT * FROM ' . $database;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByLogin($login){
        $sql = 'SELECT * FROM ' . $this->database_user . ' WHERE login =:login';
        $query = $this->db->prepare($sql);
        $query->bindParam(":login", $login);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function countUserByLogin($login){
        $sql = 'SELECT count(*) FROM ' . $this->database_user . ' WHERE login =:login';
        $query = $this->db->prepare($sql);
        $query->bindParam(":login", $login);
        $query->execute();
        return $query->fetchColumn();
    }


    public function saveUser($fields){
        $sql = 'INSERT INTO ' . $this->database_user . ' (login, password, firstname, secondname, sex) VALUES (:login, :password, :firstname, :secondname, :sex)';
        $query = $this->db->prepare($sql);
        $query->bindParam(":login", $fields['login']);
        $query->bindParam(":password", $fields['password']);
        $query->bindParam(":firstname", $fields['firstname']);
        $query->bindParam(":secondname", $fields['secondname']);
        $query->bindParam(":sex", $fields['sex']);
        $query->execute();
    }

}