<?php
require_once 'core/init.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user = new User();
?>
<html lang="pl">

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

    <body>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="kontakt.php">Kontakt</a>
                        </li>
                        <?php
                        if ($user->isLoggedIn()) {
                            HTMLCodeInserter::printUserPanelButton();
                        } else {
                            HTMLCodeInserter::printLoginRegisterButton();
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">

            <h2 class="font-weight-bold text-center my-4">Witaj na stronie kontaktowej</h2>
            <p class="text-center mb-2">Poniżej znajdzież kalkulator BMI, który da Ci znać w jakiej formie jest Twoja
                sylwetka. <br>Jeżeli chcesz coś zmienić w swojej diecie, skontaktuj się z nami poprzez zamieszczony poniżej
                formularz.
            </p>
            <div class="row justify-content-center">
                <div id="kalkulator" class="col-md-3">
                    <h2 class="text-center">Kalkulator BMI</h2>
                </div>
                <div class="col-md-3">
                    <div class="md-form mb-0">
                        <input type="number" id="waga" name="waga" class="form-control" required>
                        <label for="waga" class="">Waga [kg]</label>
                    </div>
                    <div class="md-form mb-0">
                        <input type="number" id="wzrost" name="wzrost" class="form-control" required>
                        <label for="wzrost" class="">Wzrost [cm]</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="md-form mb-0">
                        <input id="bmi" name="bmi" class="form-control" disabled value="">
                        <label for="waga" class="">BMI</label>
                    </div>
                    <div class="md-form mb-0" id="przyciskBMI">
                        <button class="btn btn-primary" onclick="obliczBMI()">Oblicz BMI</button>
                    </div>
                </div>
            </div>

            <div id="komunikatOtylosci" class="row justify-content-center font-weight-bold mx-1"></div>

            <div class="row">

                <div class="col-md-12 justify-content-center">
                    <h2 class="font-weight-bold text-center my-4">Dodaj się do listy naszych pacjentów</h2>
                </div>


                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="formularzKontaktowy" name="formularzKontaktowy" onsubmit="dodajPacjenta()">

                        <div class=" row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control" required
                                           title="Tu nie mogą być liczby" pattern="^([^0-9]*)$">
                                    <label for="name" class="">Imie i nazwisko</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="email" id="email" name="email" class="form-control" required>
                                    <label for="email" class="">E-mail</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="tel" id="tel" name="tel" class="form-control" pattern="[1-9]{3}[0-9]{6}"
                                           required title="Numer telefonu skłądający się z 9 cyfr, np: 123456789">
                                    <label for="tel">Numer telefonu</label>
                                </div>
                            </div>
                        </div>

                        <div class=" row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="number" id="masaCiala" name="masaCiala" class="form-control" min="20"
                                           max="600" required>
                                    <label for="masaCiala">Masa ciała [kg]</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="number" id="wzrostCiala" name="wzrostCiala" class="form-control" min="120"
                                           max="272" required>
                                    <label for="wzrostCiala">Wzrost [cm]</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-md-left">
                            <button type="submit" class="btn btn-primary mb-3 mx-2 mx-md-0">Dodaj mnie</button>
                            <button type="reset" class="btn btn-primary mb-3 mx-2">Wyczyść dane</button>
                        </div>
                    </form>

                </div>

                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>Lublin, woj. Lubelskie, Polska</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>+ 48 123 456 789</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>dietetycy@znadbystrzycy.com</p>
                        </li>
                    </ul>
                </div>


            </div>
            <div class="row justify-content-center">
                <h2 class="font-weight-bold text-center my-4">Zobacz listę naszych pacjentów</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 text-center"> <input type="button" class="btn btn-secondary mr-3"
                                                          value="Pokaż listę pacjentów" onclick="pokazListe()">
                </div>
                <div class="col-md-4 text-center"> <input type="button" class="btn btn-secondary"
                                                          value="Usuń wszystkich pacjentów" onclick="usunListe()">
                </div>
            </div>
            <div class="row">
                <div id="list"></div>
            </div>




        </div>
        <!-- Stopka powtarzalna na każdej stronie -->
        <footer class="mt-3 py-3">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Kamil Szalast Websites 2021</p>
            </div>
        </footer>
        <!-- Poniżej skrypty bootstrapa z pakietu startowego -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
        <script src="js/obliczanieBMI.js"></script>
        <script src="js/listaPacjentow.js"></script>
    </body>

</html>