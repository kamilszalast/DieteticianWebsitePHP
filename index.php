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
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style_galeria.css">

        <title>Dietetycy znad Bystrzycy</title>
    </head>

    <body>

        <!--klasy bootstrap
            MARGINESY/PADDINGI:
            mx-md-2 - margines lewy i prawy będzie 2 od rozmiaru medium
            m,p - margin, padding
            kierunki: x,y,t,l,r,b (top, left, right, bottom)
            wielkość: 0,1,2,3,4,5, auto
            rozmiar: sm, md, lg, xl
            DOPASOWANIE w pionie (dla elementów inline):
            align-baseline/top/middle/bottom/text-bottom/text-top
        -->
        <!-- Belka nawigacyjna taka sama na każdej stronie -->
        <?php HTMLCodeInserter::printNav($user) ?>

        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="img/zdjecie1.jpg" alt="obrazek_zdrowych_owoców">
                </div>
                <div class="col-lg-6">
                    <h1 class="font-weight-bold">Dietetycy znad Bystrzycy</h1>
                    <p>Zapraszamy do wkroczenia w zdrowy tryb życia razem z nami! Prowadzenie zdrowej diety nie jest
                        trudne, jeżeli zachowamy zdrowe podejście!</p>
                    <a class="btn btn-primary" href="kontakt.php">Skontaktuj się z nami!</a>
                </div>
            </div>
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <h1 class="font-weight-bold">Jedz smacznie i zdrowo.</h1>
                    <p>Zapraszamy do wkroczenia w zdrowy tryb życia razem z nami! Prowadzenie zdrowej diety nie jest
                        trudne, jeżeli zachowamy zdrowe podejście!</p>
                    <a class="btn btn-primary" href="galeria.php">Galeria dań</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="img/zdjecie2.JPG" alt="obrazek_zdrowych_produktów">
                </div>

            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="img/zdjecie3.jpg" alt="obrazek_nadasanego_dziecka">
                </div>
                <div class="col-lg-6">
                    <h1 class="font-weight-bold">Dziecko niejadek?</h1>
                    <p>Nasi specjaliści mają wieloletnie doświadczenie w dopasowywaniu diety pod preferencje dzieci, które
                        jak wiemy są bardzo kapryśne. Zatroszcz się o zdrowie swojego dziecka.</p>
                    <a class="btn btn-primary" href="onas.php">Poznaj naszych specjalistów.</a>
                </div>
            </div>
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <h1 class="font-weight-bold">Chudnij z nami!</h1>
                    <p>Jeżeli Twoja waga wygląda jak ta na zdjęciu, zapraszamy do kontaktu, na pewno pomożemy w Twoim
                        problemie, niezależnie czy jest on spowodowany chorobą czy złymi nawykami żywieniowymi.</p>
                    <a class="btn btn-primary" href="kontakt.php">Zadzwoń do nas!</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="img/zdjecie4.jpg" alt="obrazek_zdrowych_produktów">
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
        <script src="js/galeria_slider.js"></script>
    </body>

</html>