<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

// tablica asocjacyjna z tablicą config przechowującą tablice potrzebne aplikacji webowej
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'databaseName' => 'dietetycyzb'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800 //tutaj tydzień wyrazony w sekundach
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
);
// dołączanie klas do wszystkich plików znajdujących się bezpośrednio w projekcie
require_once 'classes/Config.php';
require_once 'classes/Cookie.php';
require_once 'classes/Database.php';
require_once 'classes/Hash.php';
require_once 'classes/Input.php';
require_once 'classes/Redirect.php';
require_once 'classes/Session.php';
require_once 'classes/Token.php';
require_once 'classes/User.php';
require_once 'classes/Validation.php';
require_once 'functions/sanitize.php';

//sprawdzamy, czy istnieje ciasteczko (czyli czy w tablicy $_COOKIE istnieje vawrtośc przy kluczu 'hash'
//oraz czy sesja nie istnieje (czyli czy w tablicy $_SESSION istnieje wartośc przy kluczu 'user'
if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = Database::getInstance()->get('logged_in_users', array('hash', '=', $hash));

    if ($hashCheck->getCount()) {
        $user = new User($hashCheck->getFirstResult()->user_id);
        $user->login();
    }
}