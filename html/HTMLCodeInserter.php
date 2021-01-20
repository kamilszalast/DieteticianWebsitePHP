<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HTMLCodeInserter
 *
 * @author kamil
 */
class HTMLCodeInserter {

    //put your code here

    public static function printNav() {

    }

    public static function printLoginRegisterButton() {
        echo'
        <li class="nav-item active">
            <a class="nav-link" id="login_button" href="login_register.php">
                <button class="btn btn-sm btn-success" type="button">
                    Logowanie/Rejestracja
                </button>
            </a>
        </li>';
    }

    public static function printLogoutButton() {
        echo'
        <li class = "nav-item active">
            <a class = "nav-link" id = "login_button" href = "logout.php">
                <button class = "btn btn-sm btn-success" type = "button">
                Wyloguj
            </button>
            </a>
        </li>';
    }

    public static function printUserPanelButton() {
        echo'
        <li class="nav-item active">
            <a class="nav-link" id="login_button" href="user_panel.php">
                <button class="btn btn-sm btn-success" type="button">
                    Mój profil
                </button>
            </a>
        </li>';
    }

    public static function printLogoutMessage() {
        echo'
        <div class = "container">
            <div class = "row justify-content-md-center">
                <div class = "col-md-6">
                    <a href="login_register.php"><h5 style = "color:red;">Zostałeś wylogowany lub sesja wygasła</h5></a>
                </div>
             </div>
        </div>';
    }

}
