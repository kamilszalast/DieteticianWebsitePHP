<?php
require_once 'core/init.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user = new User();
ob_start();
//head
HTMLCodeInserter::printHead();
?>
<html lang="pl">
    <body>
        <!--navbar-->

        <?php
        HTMLCodeInserter::printNav($user, true);
        if ($user->isLoggedIn() && $user->isAdmin()) {
            ?>
            <div class="container wrapper">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <h5>Obecni pacjenci:</h5>
                        <h8>Kliknij przycisk "usuń" aby usunąć pacjenta</h5><br>
                            <!--tutaj wydruk rekordów z bazy danych-->
                            <?php
                            $database = Database::getInstance();
                            HTMLCodeInserter::generateUsersTableFromDB($database);
                            if (Input::exists()) {
                                $userID = Input::get('userID');
                                $database->delete('users', array('id', '=', $userID));
                                $database->delete('logged_in_users', array('user_id', '=', $userID));
                                ob_clean();
                                Redirect::to('admin_panel.php');
                            }
                            ?>
                            <a href="user_panel.php" class="btn btn-primary">Wróć do strony głównej</a>
                    </div>
                </div>
            </div>
            <?php
            HTMLCodeInserter::printFooter();
        } else {
            HTMLCodeInserter::printLogoutMessage();
            HTMLCodeInserter::printStickyFooter();
        }
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

