<?php
require_once 'core/init.php';
ob_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('login_register.php');
}
HTMLCodeInserter::printHead();
?>

<html lang="pl">
    <body>
        <!--navbar-->
        <?php HTMLCodeInserter::printNav($user, true); ?>
        <?php if ($user->isLoggedIn()) { ?>
            <div class="container wrapper">
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
                        <?php
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
                                $validator->translateErrors()->printErrors();
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
        ?>
        <footer class="mt-3 py-3">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Kamil Szalast Websites 2021</p>
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
</html>

