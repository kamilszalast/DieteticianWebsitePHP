<?php
ob_start();
include_once 'core/init.php';
$user = new User();

//uruchomi się dopiero po przesłaniu formularza
if (Input::exists()) {
    if (isset($_POST['submit_registration'])) {
        $validator = new Validation();
        $validator->isRegisterFormValid();
    }
    if (isset($_POST['submit_login'])) {
        $loginValidator = new Validation();
        $loginValidator->isLoginFormValid();
    }
}
HTMLCodeInserter::printHead();
?>
<html lang="pl">
    <body>
        <?php HTMLCodeInserter::printNav($user); ?>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <!-- formularz logowania -->
                    <?php
                    HTMLCodeInserter::printLoginForm();
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
                                $validator->translateErrors()->printErrors();
                            }
                        }

                        if (isset($_POST['submit_login'])) {
                            if ($loginValidator->getPassed()) {
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
            <?php HTMLCodeInserter::printRegisterModal(); ?>

        </div>

        <?php HTMLCodeinserter::printFooter(); ?>

        <!-- Stopka powtarzalna na każdej stronie - tutaj dodane style aby stopka była przyklejona do dołu strony -->

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
