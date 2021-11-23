<?php

namespace Classes\User;

use Classes\Database\Database;
use Classes\Error\Alert;
use Classes\Secure;

class Login
{
    private $fields;
    private $db;

    public function __construct($fields,Database $db)
    {
        $this->fields = $fields;
        $this->db = $db;
    }

    public function handle(){
        if(isset($this->fields['login']) && isset($this->fields['password'])){
            if($this->issetUser()){
                if($this->checkPassword()){

                    $_SESSION['login'] = $this->fields['login'];
                    $_SESSION['logged'] = true;
                    Alert::add("Zalogowano pomyślnie", "success");
                    Helper::redirect('index.php');
                }else{
                    Alert::add('Hasło jest niepoprawne', 'danger');
                }
            }else{
                Alert::add('Taki użytkownik nie istnieje', 'danger');
            }
        }else{
            Alert::add('Login bądź hasło nie zostało podane', 'danger');
        }
    }

    public function issetUser(){
        return ($this->db->countUserByLogin($this->fields['login']) > 0) ? true : false;
    }

    public function checkPassword(){
        $result = false;
        $user = new User($this->fields['login'], $this->db);
        $user->init();
        if($user->getPassword() == $user->hashPassword($this->fields['password'])){
            $result = true;
        }
        return $result;
    }


    public static function logout(){
        unset($_SESSION['login']);
        unset($_SESSION['logged']);
        Alert::add("Poprawnie wylogowano", "success");
        Helper::redirect('login.php');
    }

}

