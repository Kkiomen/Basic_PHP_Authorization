<?php

namespace Classes\User;

use Classes\Database\Database;
use Classes\Secure;

class User
{
    protected $db;

    private $id;
    private $login;
    private $password;
    private $firstname;
    private $secondname;
    private $sex;

    private $logged;

    public function __construct($login, Database $db)
    {
        $this->login = $login;
        $this->db = $db;
    }

    public function hashPassword($password)
    {
        return Secure::hashPassword($password);

    }

    public function init(){
        if(!is_null($this->login) && $this->db->countUserByLogin($this->login) == 1){
            $getFieldsFromDatabase = $this->db->getUserByLogin($this->login);
            $this->setId($getFieldsFromDatabase['id']);
            $this->setLogin($getFieldsFromDatabase['login']);
            $this->setFirstname($getFieldsFromDatabase['firstname']);
            $this->setSecondname($getFieldsFromDatabase['secondname']);
            $this->setPassword($getFieldsFromDatabase['password']);
            $this->setSex($getFieldsFromDatabase['sex']);
        }
    }

    /**
     * @return bool
     */
    public function isLogged(): bool
    {
        return $this->logged;
    }

    /**
     * @param mixed $logged
     */
    public function setLogged($logged): void
    {
        $this->logged = $logged;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getSecondname(): string
    {
        return $this->secondname;
    }

    /**
     * @param string $secondname
     */
    public function setSecondname(string $secondname): void
    {
        $this->secondname = $secondname;
    }

    /**
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }

    public function getSexName(): string
    {
        return ($this->sex) ? "Mężczyzna" : "Kobieta";
    }

    /**
     * @param string $sex
     */
    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }

    public function save(){
        $fields = [
            'login' => $this->getLogin(),
            'password' => $this->getPassword(),
            'firstname' => $this->getFirstname(),
            'secondname' => $this->getSecondname(),
            'sex' => $this->getSex()
        ];
        $this->db->saveUser($fields);
    }

}