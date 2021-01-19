<?php

/**
 * Description of Hash
 *
 * @author kamil
 */
class Hash {

    //put your code here
    public static function make($string) {
        return hash('sha256', $string);
    }

    public static function unique() {
        return self::make(uniqid());
    }

}
