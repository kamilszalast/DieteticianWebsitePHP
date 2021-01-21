<?php
ob_start();
include_once 'core/init.php';

//uruchomi się dopiero po przesłaniu formularza
if (Input::exists()) {
    if (isset($_POST['submit_registration'])) {
        $validator = new Validation();
        $validator->isRegisterFormValid();
    }
    if (isset($_POST['submit_login'])) {
        $loginValidator = new Validation();
    }
}
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
                        <li class="nav-item">
                            <a class="nav-link" href="kontakt.php">Kontakt</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" id="login_button" href="login_register.php">
                                <button class="btn btn-sm btn-success" type="button">
                                    Logowanie/Rejestracja
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <!-- formularz logowania -->
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
                    <?php
                    if (Input::exists()) {
                        if (isset($_POST['submit_registration'])) {
                            if ($validator->getPassed()) {
                                $user = new User();
                                try {
                                    $user->create(array(
                                        'name' => Input::get('name'),
                                        'surname' => Input::get('surname'),
                                        'age' => Input::get('age'),
                                        'weight' => Input::get('weight'),
                                        'height' => Input::get('height'),
                                        'email' => Input::get('email'),
                                        'password' => Hash::make(Input::get('password')),
                                        'groupType' => 0
                                    ));
                                    echo "<h5 style='color:green;'>Zostałeś zarejestrowany, możesz się zalogować</h5>";
                                } catch (Exception $e) {
                                    die($e->getMessage());
                                }
                            } else {
                                echo "<h5 style='color:red;'>Niepoprawne dane rejestracji:</h5>";
                                $errorArray = $validator->getErrors();
                                foreach ($errorArray as $error) {
                                    echo "{$error} <br>";
                                }
                            }
                        }

                        if (isset($_POST['submit_login'])) {
                            if ($loginValidator->isLoginFormValid()) {
                                $user = new User();

                                $remember = (Input::get('remember') === 'on') ? true : false;
                                $login = $user->login(Input::get('username'), Input::get('passwd'), $remember);
                                if ($login) {
                                    //czyszczenie bufora
                                    ob_clean();
                                    Redirect::to('user_panel.php');
                                } else {
                                    echo "<h5 style='color:red;'>Niepoprawne dane logowania</h5>";
                                }
                            }
                        }
                    }
                    ?>
                </div>

            </div>
            <!--tutaj ma pojawic sie div z formularzem rejestracji po kliknieciu przycisku utwórz konto-->
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
                                    <input type="number" step="0.01" id="weight" name="weight" class="form-control" placeholder="Waga [kg] np. 75" required="required" >
                                </div>
                                <div class="form-group">
                                    <input type="number" step="0.01" id="height" name="height"  class="form-control" placeholder="Wzrost [cm] np. 170" required="required">
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

        </div>

    </div>
    <div style="clear:both;"></div>
    <!-- Stopka powtarzalna na każdej stronie - tutaj dodane style aby stopka była przyklejona do dołu strony -->
    <footer class="mt-auto py-3" style="position: fixed; left: 0; bottom: 0; width: 100%">
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