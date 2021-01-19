<?php

require_once 'core/init.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$user = new User();
if ($user->isLoggedIn()) {
    echo 'Logged in';
}