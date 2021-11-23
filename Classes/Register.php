<?php

namespace Classes\User;

use Classes\Database\Database;
use Classes\Error\Alert;

class Register
{
    private $fields;
    private $db;

    public function __construct($fields,Database $db)
    {
        $this->fields = $fields;
        $this->db = $db;
    }

    public function handle(){
        $result = false;
        if($this->passwordSimilarityCheck()){
            if(Helper::verifyInput($this->fields['login'])){
                if($this->checkLengthInput()){
                    if($this->issetUser()){

                        $user = new User($this->fields['login'], $this->db);
                        $user->setPassword($user->hashPassword($this->fields['password']));
                        $user->setFirstname($this->fields['firstname']);
                        $user->setSecondname($this->fields['secondname']);
                        $user->setSex($this->fields['sex']);
                        $user->save();
                        Alert::add("Rejestracja przebiegła pomyślnie", "success");

                        Helper::redirect('login.php');
                        $result = true;
                    }else{
                        Alert::add("Taki użytkownik już istnieje", "danger");
                    }
                }
            }else{
                Alert::add("Login może składać się tylko z liter i liczb", "danger");
            }
        }else{
            Alert::add("Hasła nie pasują do siebie!", "danger");
        }
        return $result;
    }

    private function passwordSimilarityCheck(){
        return ($this->fields['password'] == $this->fields['password']) ? true : false;
    }

    private function checkLengthInput(){
        $result = true;

        if(strlen($this->fields['password']) <  \Config::passwordMinLength){
            $result = false;
            Alert::add("Hasło musi mieć minimum " . \Config::passwordMinLength ." znaków", "danger");
        }

        if(strlen($this->fields['login']) <  \Config::loginMinLength){
            $result = false;
            Alert::add("Login musi mieć minimum " . \Config::loginMinLength ." znaków", "danger");
        }

        return $result;
    }

    private function issetUser(){
       return ( $this->db->countUserByLogin($this->fields['login']) == 0 ) ? true : false;
    }

}