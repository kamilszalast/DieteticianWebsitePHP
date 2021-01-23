<?php
require_once 'core/init.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user = new User();

HTMLCodeInserter::printHead();
?>
<html lang="pl">
    <body>
        <!--navbar-->
        <?php
        if ($user->isLoggedIn()) {
            HTMLCodeInserter::printNav($user, true);
            ?>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <h5>Witaj <?php echo $user->getData()->name ?></h5>
                        <h8>Wybierz jedną z opcji:</h5><br>
                            <!--tutaj opcje do przeniesienia się do strony ze zmianą danych i do strony ze zmianą hasła-->
                            <div class="btn-group-vertical">
                                <a href="update.php" class="btn btn-info mb-3 mt-3">Zmień dane</a>
                                <a href="changepassword.php" class="btn btn-info mb-3">Zmień hasło</a>
                                <a href="delete_account.php" class="btn btn-info mb-3">Usuń konto</a>
                                <?php
                                //jeżeli użytkownik ma uprawnienia administratora
                                if ($user->isAdmin()) {
                                    HTMLCodeInserter::printAdminButton();
                                }
                                ?>
                            </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            HTMLCodeInserter::printNav($user);
            HTMLCodeInserter::printLogoutMessage();
        }
        HTMLCodeInserter::printFooter();
        ?>

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
</html>

