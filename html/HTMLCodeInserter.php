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

    public static function printHead() {
        echo'
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="img/favicon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style_kontakt.css">
        <title>Dietetycy znad Bystrzycy</title>
        <script src="https://kit.fontawesome.com/953fca80ac.js" crossorigin="anonymous"></script>
    </head>
        '
        ;
    }

    public static function printNav($user, $isUserPanel = false) {

        $beginingNav = '
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="img/logo.jpg" width="30" height="30" alt="logo"
                                                              class="d-inline-block mr-1 align-middle">
                    Dietetycy ZB</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php">Strona domowa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="onas.php">O nas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="galeria.php">Galeria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kontakt.php">Kontakt</a>
                        </li>
        ';


        if ($user->isLoggedIn()) {
            if ($isUserPanel === false) {
                $userButton = self::getUserPanelButton();
            } else {
                $userButton = self::getLogoutButton();
            }
        } else {
            $userButton = self::getLoginRegisterButton();
        }
        $endNav = '
                    </ul>
                </div>
            </div>
        </nav>
                ';
        echo $beginingNav . $userButton . $endNav;
    }

    public static function printLoginForm() {

        echo '
        <form id="loginForm" name="loginForm" action="login_register.php" method="post">
            <div class="login-form">
                <h2 class="text-center mb-3">Zaloguj się</h2>
                <div class="form-group">
                    <input type="text" name ="username" class="form-control" placeholder="Nazwa użytkownika - email" required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="passwd" class="form-control" placeholder="Hasło" required="required">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit_login" value="Zaloguj się" class="btn btn-primary btn-block"></input>
                </div>
                <div class="clearfix">
                    <label class="pull-left checkbox-inline"><input type="checkbox" name="remember"> Zapamiętaj mnie</label>
                </div>
                <button type = "button" class = "btn btn-warning btn-block mb-3" data-toggle = "modal" data-target = "#exampleModalCenter">
                    <p class = "text-dark m-0"> Utwórz konto</p>
                </button>
            </div>
        </form>
        ';
    }

    public static function printRegisterModal() {
        echo'
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Fromularz rejestracji</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >
                            <form id="registerForm" name="registerForm" action="login_register.php" method="post">
                                <!--tutaj ma pojawic sie formularz rejestracji-->
                                <div class="form-group">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Imię np. Kamil" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="surname" name="surname" class="form-control" placeholder="Nazwisko np. Szalast" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="number" id="age" name="age" class="form-control" placeholder="Wiek [lata]" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="number" step="0.01" id="weight" name="weight" class="form-control" placeholder="Waga [kg] np. 75,50" required="required" >
                                </div>
                                <div class="form-group">
                                    <input type="number" step="0.01" id="height" name="height"  class="form-control" placeholder="Wzrost [cm] np. 170,15" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required="required" >
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Hasło (min. 3 znaki, w tym jedna cyfra)" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password2" name="password2" class="form-control" placeholder="Powtórz hasło" required="required">
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                <input type="submit" name="submit_registration" value="Zarejestruj" class="btn btn-primary"></input>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }

    public static function getLoginRegisterButton() {
        return '
        <li class="nav-item active">
            <a class="nav-link" id="login_button" href="login_register.php">
                <button class="btn btn-sm btn-success" type="button">
                    Logowanie/Rejestracja
                </button>
            </a>
        </li>';
    }

    public static function getLogoutButton() {
        return'
        <li class = "nav-item active">
            <a class = "nav-link" id = "login_button" href = "logout.php">
                <button class = "btn btn-sm btn-success" type = "button">
                Wyloguj
            </button>
            </a>
        </li>';
    }

    public static function getUserPanelButton() {
        return'
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
            if (!$value->groupType) {
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
        }
        self::printTableEnd();
    }

    public static function printFooter() {
        echo'
        <footer class="mt-3 py-3">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Kamil Szalast Websites 2021</p>
            </div>
        </footer>
        ';
    }

    public static function printStickyFooter() {
        echo'
        <footer class="footer mt-3 py-3">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Kamil Szalast Websites 2021</p>
            </div>
        </footer>
        ';
    }

}
