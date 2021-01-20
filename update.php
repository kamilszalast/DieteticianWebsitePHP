<?php
require_once 'core/init.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('login_register.php');
}
if (Input::exists()) {
    $validator = new Validation();
    $validator->isUpdateFormValid();

    if ($validator->getPassed()) {
        $user->updateData(array(
            'name' => Input::get('name'),
            'surname' => Input::get('surname'),
            'age' => Input::get('age'),
            'weight' => Input::get('weight'),
            'height' => Input::get('height')
        ));
        Redirect::to('update.php');
    } else {
        //co jeżeli wpiszemy niepoprawne dane
        echo 'Nie przeszła walidacja';
    }
}
?>
<!--head-->
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
    <!--navbar-->
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
                    <?php
                    if ($user->isLoggedIn()) {
                        HTMLCodeInserter::printLogoutButton();
                    } else {
                        HTMLCodeInserter::printLoginRegisterButton();
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
    <?php if ($user->isLoggedIn()) { ?>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <form action="update.php" method="post">
                        <div class="form-group">
                            <label for="name">Imię: </label>
                            <input type="text" name="name" class="form-control" value="<?php echo $user->getData()->name; ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="surname">Nazwisko: </label>
                            <input type="text" name="surname" class="form-control" value="<?php echo $user->getData()->surname; ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="age">Wiek: </label>
                            <input type="number"  name="age" class="form-control" value="<?php echo $user->getData()->age; ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="weight">Waga: </label>
                            <input type="number"step="0.01" name="weight" class="form-control" value="<?php echo $user->getData()->weight; ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="height">Wzrost: </label>
                            <input type="number"step="0.01" name="height" class="form-control" value="<?php echo $user->getData()->height; ?>"></input>
                        </div>
                        <input type="submit" class="btn btn-danger" value="Zmień dane"></input>
                        <a href="user_panel.php" class="btn btn-primary">Wróć do strony głównej</a>
                    </form>
                </div>
            </div>
        </div>
        <?php
    } else {
        HTMLCodeInserter::printLogoutMessage();
    }
    ?>
    <!--Stopka powtarzalna na każdej stronie - tutaj dodane style aby stopka była przyklejona do dołu strony-->
    <footer class = "mt-auto py-3" style = "position: fixed;
            left: 0;
            bottom: 0;
            width: 100%">
        <div class = "container">
            <p class = "m-0 text-center text-white">Copyright &copy;
                Kamil Szalast Websites 2021</p>
        </div>
    </footer>
    <!--Poniżej skrypty bootstrapa z pakietu startowego-->
    <script src = "https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity = "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin = "anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <script src="js/obliczanieBMI.js"></script>
    <script src="js/listaPacjentow.js"></script>
</body>


