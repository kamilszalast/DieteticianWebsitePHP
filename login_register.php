<?php
include_once './HTMLCodeInserter.php';
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
        <?php
        HTMLCodeInserter::printNav();
        ?>

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <!-- formularz logowania -->
                    <?php
                    HTMLCodeInserter::printLoginForm();
                    ?>
                </div>
            </div>
            <!--tutaj ma pojawic sie div z formularzem rejestracji po kliknieciu przycisku utwórz konto-->
            <?php
            HTMLCodeInserter::printModal();
            ?>
        </div>

    </div>
    <!-- Stopka powtarzalna na każdej stronie - tutaj dodane style aby stopka była przyklejona do dołu strony -->
    <footer class="mt-auto py-3" style="position: fixed; left: 0; bottom: 0; width: 100%">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Kamil Szalast Websites 2020</p>
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