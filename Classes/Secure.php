<?php

namespace Classes;

class Secure
{
    public static function hashPassword($password){
        return md5($password);
    }
}