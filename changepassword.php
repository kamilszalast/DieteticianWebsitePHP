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
        HTMLCodeInserter::printNav($user, true);
        if ($user->isLoggedIn()) {
            ?>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <form action="changepassword.php" method="post">
                            <div class="form-group">
                                <label for="name">Aktualne hasło: </label>
                                <input type="password" name="password_current" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="surname">Nowe hasło: </label>
                                <input type="password" name="password" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="age">Powtórz nowe hasło: </label>
                                <input type="password"  name="password2" class="form-control"></input>
                            </div>
                            <input type="submit" class="btn btn-danger" value="Zmień hasło"></input>
                            <a href="user_panel.php" class="btn btn-primary">Wróć do strony głównej</a>
                        </form>
                        <?php
                        if (Input::exists()) {
                            $validator = new Validation();
                            $validator->isPasswordUpdateFormValid();
                            //jeżeli użytkownik prześle dane, najpierw walidujemy czy hasło jest zgodne z hasłem z bazy oraz czy nowe hasła sie zgadzają
                            $inputHashedPassword = Hash::make(Input::get('password_current'));
                            $isInputPassCorrect = $inputHashedPassword === $user->getData()->password;
                            if ($isInputPassCorrect && $validator->getPassed()) {
                                $user->updateData(array(
                                    'password' => Hash::make(Input::get('password'))
                                ));
                            } else {
                                //jeżeli źle podane hasło
                                $validator->translateErrors()->printErrors();
                                if (!$isInputPassCorrect)
                                    echo'"Aktualne hasło" nie gadza się z istniejącym w bazie';
                            }
                        }
                        ?>
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

