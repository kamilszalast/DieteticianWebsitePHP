<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author kamil
 */
class Config {

    //put your code here
    //funkcja która pozwoli pobrać dany element z pliku init.php za pomocą przekazanej
    //ścieżki np przekazujac mysql/host jako parametr, funkcja zwróci nam localhost
    public static function get($path) {
        if ($path) {
            $config = $GLOBALS['config']; //zmienna config jako tablica globals
            $path = explode('/', $path); // sciezka podana w parametrze zamieniona na tablice
            //dla kazdego elementu tablicy, ważne że pętla idzie do końca
            // a funkcja zwraca element na końcu czyli zagnieżdżony najgłębiej
            foreach ($path as $bit) {
                // spradzamy czy jest ustawiony (czy nie jest nullem)
                if (isset($config[$bit])) {
                    $config = $config[$bit];
                }
            }
            return $config;
        }
        return false;
    }

}
