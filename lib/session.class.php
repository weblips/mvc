<?php

/**
 * Description of session
 *
 * @author uasynzheryanua
 */
class Session {
    
    protected static $flash_massege;
    
    public static function setFlash($message){
        self::$flash_massege = $message;
    }
    
    public static function hasFlash(){
        return !is_null(self::$flash_massege);
    }
    
    public static function flash(){
        echo self::$flash_massege;
        self::$flash_massege = null;
    }
}
