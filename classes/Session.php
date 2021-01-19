<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author kamil
 */
class Session {

    public static function put($name, $value) {
        return $_SESSION[$name] = $value;
    }

    public static function exists($name) {
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function delete($name) {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function get($name) {
        return $_SESSION[$name];
    }

    public static function flash($name, $string = '') {
        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
    }

}
