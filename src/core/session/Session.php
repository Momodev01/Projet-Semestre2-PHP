<?php

namespace App\Core\Session;

class Session {
    public static function open():void {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function keyExist(string $key):bool {
        return isset($_SESSION[$key]);
    }

    public static function setObject(string $key, array $value):void {
        $_SESSION[$key] = json_decode(json_encode(($value)));
    }

    public static function set(string $key, array $value):void {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key):mixed {
        if (!self::keyExist($key)) { return false; }
        return $_SESSION[$key];
    }
    
    public static function remove($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public static function close():void {
        unset($_SESSION['userConnected']);
        session_destroy();
    }
    
}
