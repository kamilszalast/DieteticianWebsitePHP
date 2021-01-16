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
    static function printLoginForm() {
        echo'<form id="loginForm" name="loginForm" action="/userPanel.php" method="post">
                        <div class="login-form">
                            <h2 class="text-center mb-3">Zaloguj się</h2>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nazwa użytkownika - email" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Hasło" required="required">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Zaloguj się</button>
                            </div>
                            <div class="clearfix">
                                <label class="pull-left checkbox-inline"><input type="checkbox"> Zapamiętaj mnie</label>
                                <a href="#" class="pull-right">Zapomniałeś hasła?</a>
        </div>
        <button type = "button" class = "btn btn-warning btn-block" data-toggle = "modal" data-target = "#exampleModalCenter">
        <p class = "text-dark m-0"> Utwórz konto</p>
        </button>
        </div>
        </form>';
    }

    static function printNav() {
        echo'<nav class="navbar navbar-dark navbar-expand-lg">
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
                            <a class="nav-link" href="html_static/index.html">Strona domowa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="html_static/onas.html">O nas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="html_static/galeria.html">Galeria</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="html_static/kontakt.html">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="login_button" href="login_register.php">
                                <button class="btn btn-sm btn-success" type="button">
                                    Logowanie/Rejestracja
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>';
    }

    static function printModal() {
        echo'<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Fromularz rejestracji</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="registerForm" name="registerForm" action="/login_rejestracja.php" method="post">
                                <!--tutaj ma pojawic sie formularz rejestracji-->
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Imię" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nazwisko" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Wiek" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Waga" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Wzrost" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="E-mail" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Hasło" required="required">
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                <button type="submit" class="btn btn-primary">Zarejestruj</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>';
    }

}
