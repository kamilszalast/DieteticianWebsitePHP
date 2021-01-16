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
        'session_name' => 'user'
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
