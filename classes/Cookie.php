<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cookie
 *
 * @author kamil
 */
class Cookie {

    public static function exists($name) {
        return (isset($_COOKIE[$name])) ? true : false;
    }

    public static function get($name) {
        return $_COOKIE[$name];
    }

    public static function put($name, $value, $expiryTime) {
        if (setcookie($name, $value, time() + $expiryTime, '/')) {
            return true;
        }
        return false;
    }

//tutaj ustawiamy ciasteczko na pusty łańcuch znaków, czas wygaśnięcia dajemy time()-1 aby był to czas przeszły
    public static function delete($name) {
        self::put($name, '', time() - 1);
    }

}
