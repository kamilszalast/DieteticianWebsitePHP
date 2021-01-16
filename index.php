<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="img/favicon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
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
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Strona domowa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="html_static/onas.html">O nas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="html_static/galeria.html">Galeria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="html_static/kontakt.html">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="login_button" href="login_rejestracja.php">
                                <button class="btn btn-sm btn-success" type="button">
                                    Logowanie/Rejestracja
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="img/zdjecie1.jpg" alt="obrazek_zdrowych_owoców">
                </div>
                <div class="col-lg-6">
                    <h1 class="font-weight-bold">Dietetycy znad Bystrzycy</h1>
                    <p>Zapraszamy do wkroczenia w zdrowy tryb życia razem z nami! Prowadzenie zdrowej diety nie jest
                        trudne, jeżeli zachowamy zdrowe podejście!</p>
                    <a class="btn btn-primary" href="html_static/kontakt.html">Skontaktuj się z nami!</a>
                </div>
            </div>
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <h1 class="font-weight-bold">Jedz smacznie i zdrowo.</h1>
                    <p>Zapraszamy do wkroczenia w zdrowy tryb życia razem z nami! Prowadzenie zdrowej diety nie jest
                        trudne, jeżeli zachowamy zdrowe podejście!</p>
                    <a class="btn btn-primary" href="html_static/galeria.html">Galeria dań</a>
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
                    <a class="btn btn-primary" href="html_static/onas.html">Poznaj naszych specjalistów.</a>
                </div>
            </div>
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <h1 class="font-weight-bold">Chudnij z nami!</h1>
                    <p>Jeżeli Twoja waga wygląda jak ta na zdjęciu, zapraszamy do kontaktu, na pewno pomożemy w Twoim
                        problemie, niezależnie czy jest on spowodowany chorobą czy złymi nawykami żywieniowymi.</p>
                    <a class="btn btn-primary" href="html_static/kontakt.html">Zadzwoń do nas!</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="img/zdjecie4.jpg" alt="obrazek_zdrowych_produktów">
                </div>

            </div>

        </div>
        <!-- Stopka powtarzalna na każdej stronie -->
        <footer class="mt-3 py-3">
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
    </body>

</html>