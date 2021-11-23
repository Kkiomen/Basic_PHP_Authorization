<?php

namespace Classes\User;

class Helper
{
    public static function redirect($url) {
        header("Location: $url");
    }

    public static function isLogged(){
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
            return true;
        }
        return false;
    }

    public static function verifyInput($text){
        $tmp = preg_replace("/[^a-zA-Z0-9]+/", "", $text);
        return ($text == $tmp) ? true : false;
    }
}