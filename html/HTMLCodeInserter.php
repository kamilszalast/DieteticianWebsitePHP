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

    public static function printAdminButton() {
        echo'<a href="admin_panel.php" class="btn btn-info mb-3">Pokaż pacjentów</a>';
    }

    private static function printTableHead() {
        echo'
        <table class="table mt-3">
            <thead>
                <tr>
                  <th scope="col">Nazwisko</th>
                  <th scope="col">Imie</th>
                  <th scope="col">Wiek [lata]</th>
                  <th scope="col">Waga [kg]</th>
                  <th scope="col">Wzrost [cm]</th>
                  <th scope="col">Email</th>
                  <th scope="col">Usuwanie</th>
                </tr>
            </thead>
            <tbody>
                ';
    }

    private static function printTableEnd() {
        echo'

                </tbody>
            </table>';
    }

    public static function generateUsersTableFromDB($database) {
        $rowNumber = $database->get('users', array('1', '=', '1'))->getCount();
        $results = $database->getResults();
        self::printTableHead();
        //tutaj drukowanie poszczególnych rekordów pewnie w pętli
        foreach ($results as $key => $value) {
            echo '<form method="post"><tr><td>' .
            $value->surname .
            '</td><td>' .
            $value->name .
            '</td><td>' .
            $value->age .
            '</td><td>' .
            $value->weight .
            '</td><td>' .
            $value->height .
            '</td><td>' .
            $value->email .
            '</td><td>' .
            '<input type="hidden" name="userID" value="' . $value->id . '"></input>' .
            '<input type="submit" class="btn btn-danger" value="Usuń"></input>' .
            '</td></tr></form>';
        }
        self::printTableEnd();
    }

}
