<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Input
 *
 * @author kamil
 */
class Input {

    //put your code here
    public static function exists($type = 'post') {
        switch ($type) {
            case 'post':
                return (!empty($_POST)) ? true : false;
            case 'get':
                return (!empty($_GET)) ? true : false;
            default: return false;
        }
    }

    public static function get($item) {
        if (isset($_POST[$item])) {
            return $_POST[$item];
        }
        if (isset($_GET[$item])) {
            return $_GET[$item];
        }
        return '';
    }

}
