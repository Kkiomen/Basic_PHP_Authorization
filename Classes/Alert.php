<?php

namespace Classes\Error;

class Alert
{

    public static function init(){
        if(!isset($_SESSION['errors'])){
            $_SESSION['errors'] = array();
        }
    }

    public static function getListAlertHtml()
    {
        $result = '';
        if(count($_SESSION['errors']) > 0){
            foreach ($_SESSION['errors'] as $error){
                $result .= '<div class="alert alert-'. $error['type'] .'">';
                $result .= $error['text'];
                $result .= '</div>';
            }
        }
        return $result;
    }

    public static function get()
    {
        return $_SESSION['errors'];
    }

    public static function add(string $errorText,string $type)
    {
        array_push($_SESSION['errors'], ['type' => $type, 'text' => $errorText]);
    }

    public static function clear()
    {
        $_SESSION['errors'] = array();
    }

}