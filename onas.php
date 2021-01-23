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
        <link rel="stylesheet" href="css/style_onas.css">
        <title>Dietetycy znad Bystrzycy</title>
    </head>

    <body>
        <?php HTMLCodeInserter::printNav($user); ?>

        <div id="tlo">
            <h1>Poznaj nasz zespół.</h1>
            <img class="img-fluid" src="img/onas_tlo.jpg" alt="obrazek_zdrowych_owoców">
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center">
                    <h1 class="font-weight-bold">Anna Kowalska</h1>
                    <h2>dr n. med. Dietetyk</h2>
                    <p>Specjalistka w leczeniu otyłości u dzieci, oraz w zmianie nawyków żywieniowych naszych
                        młodocianych podopiecznych.</p>
                </div>
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="img/dietetyk1.jpg" alt="obrazek_zdrowych_produktów">
                </div>

            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="img/dietetyk2.jpg" alt="obrazek_nadasanego_dziecka">
                </div>
                <div class="col-lg-6 text-center">
                    <h1 class="font-weight-bold">Eugeniusz Nowak</h1>
                    <h2>prof. dr hab. n. med. Dietetyk</h2>
                    <p>Dietetyk klinyczny z wieloletnim stażem, specjalizuje się w dietach dla sportowców z chorobami
                        wrodzonymi.</p>
                </div>
            </div>
            <div class="row align-items-center">

                <div class="col-lg-6 text-center">
                    <h1 class="font-weight-bold">Martyna Gołębiowska</h1>
                    <h2>mgr Dietetyk</h2>
                    <p>Specjalistka w żywieniu osób z cukrzycą.</p>
                </div>
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="img/dietetyk3.jpg" alt="obrazek_zdrowych_produktów">
                </div>

            </div>

        </div>
        <!-- Stopka powtarzalna na każdej stronie -->
        <?php HTMLCodeinserter::printFooter(); ?>
        <!-- Poniżej skrypty bootstrapa z pakietu startowego -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

    </body>

</html>