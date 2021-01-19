<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Token
 *
 * @author kamil
 */
class Token {

    //put your code here
    public static function generate() {
        return Session::put(Config::get('session/token_name'), md5(uniqid()));
    }

    public static function check($token) {
        $tokenName = Config::get('session/token_name');

        if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }

}
