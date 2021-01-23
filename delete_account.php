<?php
require_once 'core/init.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user = new User();

if (Input::exists()) {
    if (isset($_POST['delete_account'])) {
        $user->deleteAccount();
        Redirect::to('login_register.php');
    }
}
HTMLCodeInserter::printHead();
?>

<html lang="pl">
    <body>
        <!--navbar-->
        <?php
        HTMLCodeInserter::printNav($user, true);
        if ($user->isLoggedIn()) {
            ?>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <h5>Czy na pewno chcesz usunąć konto?</h5>
                        <p class="mt-2">Po usunieciu konta zostaniesz przekierowany do strony logowania.</p>
                        <!--tutaj opcje do przeniesienia się do strony ze zmianą danych i do strony ze zmianą hasła-->
                        <div class="btn-group">
                            <form action="delete_account.php" method="post">
                                <input type="submit" name="delete_account" value="Tak, usuń konto" class="btn btn-danger mr-3"></a>
                                <a href="user_panel.php" class="btn btn-primary">Anuluj</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            HTMLCodeInserter::printLogoutMessage();
        }
        HTMLCodeInserter::printStickyFooter();
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

