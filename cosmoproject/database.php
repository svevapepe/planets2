<?php

session_start();

$db_host='localhost';
$db_user='root';
$db_pass='Plummo_97';
$db_name='cosmoproject';

$nome=$_SESSION['nome'];
$cognome=$_SESSION['cognome'];
$email=$_SESSION['email'];
$biglietti=$_SESSION['biglietti'];
$datapar=$_SESSION['datapart'];
$dataarr=$_SESSION['dataarr'];
$spapar=$_SESSION['spar'];
$spaar=$_SESSION['spaarr'];
$coupon=$_SESSION['coup'];


$link = mysqli_connect('localhost', 'root', 'Plummo_97');

mysqli_select_db($link,$db_name) or die("Impossibile connettersi al database");

$queryCoup="SELECT coupon FROM biglietto WHERE nome='$nome' and cognome='$cognome' and email='$email' and datapartenza = '$datapar' and dataarrivo='$dataarr' and partenza='$spapar' and arrivo='$spaar'";
$resultCoup = mysqli_query($link,$queryCoup) or die("Impossibile  fare query");
$rowCoup=mysqli_fetch_assoc($resultCoup);

$_SESSION['coupon']=$rowCoup["coupon"];

$query = "SELECT SUM(nbiglietti) FROM biglietto WHERE datapartenza = '$datapar' and dataarrivo='$dataarr' and partenza='$spapar' and arrivo='$spaar' GROUP BY nbiglietti";
$result = mysqli_query($link,$query) or die("Impossibile  fare query");
$row=mysqli_fetch_assoc($result);
if($row["SUM(nbiglietti)"]<10){
      $sql="INSERT INTO biglietto(nome,cognome,email,nbiglietti,datapartenza,dataarrivo,partenza,arrivo,coupon) VALUES ('$nome', '$cognome', '$email','$biglietti','$datapar','$dataarr','$spapar','$spaar','$coupon')";
      if (!mysqli_query($link, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
      }
  }
  else{
      echo "Biglietti non disponibili per questa meta e questa data,ti invitiamo a prenotare per un'altra data!";
  }

mysqli_close($link);


?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cosmoproject - Home page</title>


    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="css/all.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://fontawesome.com/v4.7.0/icon/shopping-cart">

    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

    .team-avatar:after {
        top: -13%;
        left: 24%;
        width: 300px;
        height: 300px;
        content: " ";
        position: absolute;

        transition-duration: 300ms;
        transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);
    }

    .team-avatar img {
        display: block;
        margin: 0 auto;
        text-align: center;
    }

    /* per fare effetto opaco */
    .team-desc {
        left: auto;
        bottom: 20%;
        position: absolute;
        opacity: 0;
        color: #fff;
        -webkit-transform: translate3d(0, 10%, 0);
        transform: translate3d(0, 10%, 0);
        -webkit-transition: opacity 0.3s;
        -moz-transition: opacity 0.3s;
        -ms-transition: opacity 0.3s;
        -o-transition: opacity 0.3s;
        transition: opacity 0.3s;
        border-radius: 50%;

    }
    /* Nomi */
    .team-desc h4 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 0;
        margin-left: 10.5rem;
        color: black;
    }
    /* Per descrizione team */
    .team-desc p {
        display: block;
        font-size: 10px;
        font-weight: 600;
        margin-left: 10.5rem;
        text-transform: uppercase;
        color: black;
    }

    /* effetto cerchio */
    .team-member:hover .team-avatar:after {
        background: rgba(47, 60, 72, 0.5);
        transition-duration: 300ms;
        transition-property: all;
        transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);
        border-radius: 50%;
    }

    .team-member:hover .team-desc {
        -webkit-transform: translate3d(0, -5%, 0);
        transform: translate3d(0, -5%, 0);
        -webkit-transform: translate3d(0, -10%, 0);
        transform: translate3d(0, -10%, 0);
    }

    .team-member:hover .team-desc {
        opacity: 1;
        -webkit-transition: all 0.4s;
        -moz-transition: all 0.4s;
        -ms-transition: all 0.4s;
        -o-transition: all 0.4s;
        transition: all 0.4s;
    }

    .flip-card {
      background-color: transparent;
      margin-right: 50px;
      margin-left: 65px;
      width: 250px;
      height: 250px;
    }


    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.8s;
      transform-style: preserve-3d;
    }

    /* Rotazione orizzontale */
    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    /* Davanti e dietro */
    .flip-card-front, .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
    }

    /* davanti  */
    .flip-card-front {
      background-color: transparent;
      color: black;
    }

    /* dietro */
    .flip-card-back {
      width: 250px;
      background-color: black;
      color: #ffc107;
      transform: rotateY(180deg);
    }

    </style>



  </head>

  <body id="page-top">


    <!-- Nav-bar -->

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-family: 'Ubuntu', sans-serif;">Cosmoproject&nbsp;<i class="fa fa-rocket"></i></a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="destinazioni.html">Destinazioni</a>
            </li>
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="planetario/planetario.html">Planetario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="paginaPrenotazioni/prenotazioni/prenotazioni.php?pianeta=nessuno">Prenota</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
	<div class="modal fade" id="overlay" style="top:30%; ">
    <div class="modal-dialog ">
      <div class="modal-content" style="height:35vh; background:#ffae00;">
          <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">ORDINE EFFETTUATO &nbsp;<img src="immagini/loudspeaker.png"></h4>
          <hr>
          <p>Grazie per aver scelto Cosmoproject!</p>
          <p>A breve riceverai una mail di riepilogo dove potrai rivedere le specifiche del tuo ordine.</p>
        </div>
      </div>
    </div>
  </div>
    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-heading text-uppercase">Viaggia con noi</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="planetario/planetario.html">Prenota subito</a>
        </div>
      </div>
    </header>



    <!--Servizi-->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Servizi</h2>
            <br>
          </div>
        </div>
        <div class="row mr-0 ml-0">
          <div class="flip-card ">
            <div class="flip-card-inner ">
              <div class="team-member flip-card-front">
                <img class="rounded-circle"src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4OS4zIDQ4OS4zIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0ODkuMyA0ODkuMzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxMjhweCIgaGVpZ2h0PSIxMjhweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTc5LjU1LDIyOS42NzVjLTEwLjIsMTAuMi0xMC4yLDI2LjgsMCwzNy4xYzEwLjIsMTAuMiwyNi44LDEwLjIsMzcuMSwwYzcwLjYtNzAuNiwxODUuNS03MC42LDI1Ni4xLDAgICAgYzUuMSw1LjEsMTEuOCw3LjcsMTguNSw3LjdzMTMuNC0yLjYsMTguNS03LjdjMTAuMi0xMC4yLDEwLjItMjYuOCwwLTM3LjFDMzE4Ljc1LDEzOC41NzUsMTcwLjU1LDEzOC41NzUsNzkuNTUsMjI5LjY3NXoiIGZpbGw9IiNGRkRBNDQiLz4KCQk8cGF0aCBkPSJNMTUwLjM1LDMwMC40NzVjLTEwLjIsMTAuMi0xMC4yLDI2LjgsMCwzNy4xYzEwLjIsMTAuMiwyNi44LDEwLjIsMzcuMSwwYzMxLjUtMzEuNiw4Mi45LTMxLjYsMTE0LjQsMCAgICBjNS4xLDUuMSwxMS44LDcuNywxOC41LDcuN3MxMy40LTIuNiwxOC41LTcuN2MxMC4yLTEwLjIsMTAuMi0yNi44LDAtMzdDMjg2Ljk1LDI0OC40NzUsMjAyLjM1LDI0OC40NzUsMTUwLjM1LDMwMC40NzV6IiBmaWxsPSIjRkZEQTQ0Ii8+CgkJPGNpcmNsZSBjeD0iMjQ0LjY1IiBjeT0iMzk0LjY3NSIgcj0iMzQuOSIgZmlsbD0iI0ZGREE0NCIvPgoJCTxwYXRoIGQ9Ik00ODEuNjUsMTU3LjY3NWMtMTMwLjctMTMwLjYtMzQzLjMtMTMwLjYtNDc0LDBjLTEwLjIsMTAuMi0xMC4yLDI2LjgsMCwzNy4xYzEwLjIsMTAuMiwyNi44LDEwLjIsMzcuMSwwICAgIGMxMTAuMi0xMTAuMywyODkuNi0xMTAuMywzOTkuOSwwYzUuMSw1LjEsMTEuOCw3LjcsMTguNSw3LjdzMTMuNC0yLjYsMTguNS03LjdDNDkxLjg1LDE4NC41NzUsNDkxLjg1LDE2Ny45NzUsNDgxLjY1LDE1Ny42NzV6IiBmaWxsPSIjRkZEQTQ0Ii8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
              </div>
              <div class="flip-card-back rounded-circle text-center">
                <h4 class="service-heading mb-1 blockquote">Wi-fi</h4>
                <p class="text-muted text-justify ml-4" style="font-size:13px; width: 200px;">Sulle nostre Navicelle potrai navigare in internet con il tuo PC, Tablet o Smartphone. Per accedere al servizio basta collegarsi alla rete della navicella ed entrare nel Portale di bordo. Avrai Wifi in tutta la galassia, vieni a provarlo!</p>
              </div>
            </div>
          </div>
          <div class="flip-card ">
            <div class="flip-card-inner ">
              <div class="team-member flip-card-front">
                <img class="rounded-circle" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjEyOHB4IiBoZWlnaHQ9IjEyOHB4IiB2aWV3Qm94PSIwIDAgMzgwLjcyMSAzODAuNzIxIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzODAuNzIxIDM4MC43MjE7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMTkwLjM3MiwyOS44MTNjLTg4LjY3MywwLTE2MC41NDYsNzEuODczLTE2MC41NDYsMTYwLjU0N2MwLDYzLjg5MSwzNy40MTgsMTE4Ljg5NCw5MS40NDUsMTQ0LjczNGw1LjAyNS05Ny4wOTggICAgYzAsMC05LjQ1Mi0zLjEwMi0xMS41MjEtNC4xMTJjLTIwLjA0OC04LjgzMS0zNC42MTItMzQuODMzLTM0LjYxMi02OC41OGMwLTM2LjgyNSwyOC41NTktNjguNTQ0LDU2LjE3LTY4LjgwNiAgICBjMC4wMzUsMCwwLjAzNSwwLDAuMDU4LDBjMC4wMTIsMCwwLjAzNSwwLDAuMDQ2LDBjMjcuNjE3LDAuMjYxLDU2LjE3NywzMS45OCw1Ni4xNzcsNjguODA2YzAsMzMuNzQ3LTE0LjU4Miw1OS43MzgtMzQuNTg5LDY4LjU4ICAgIGMtMC4xNTcsMC4wNjktMTEuNjEzLDQuMjI5LTExLjYxMyw0LjIyOWw1LjYxMiwxMDcuOTYxYzEyLjMxNSwzLjAzMSwyNS4xMTksNC44MSwzOC4zNyw0LjgxYzE3Ljg3LDAsMzQuOTg0LTMuMDQ0LDUxLjA0MS04LjQyNCAgICBsNC45NzMtOTYuMjE0Yy0xMy4xMDUtMi44ODItMjQuMjgzLTExLjIyNS0zMS4yODktMjEuNjkyYy04LjY3OS0xMy4wMDEsNi42ODEtMTI4LjA2Nyw2LjY4MS0xMjguMDY3aDkuOTkydjEwNy45NzhoOS45MjNWOTYuNDk5ICAgIGgxMC44NTJ2MTA3Ljk5aDkuODc2Vjk2LjQ5OWgxMS4yNTl2MTA3Ljk5aDkuOTFWOTYuNDk5aDcuNjY4YzAsMCwxNS4zNiwxMTUuMDY2LDYuNjcsMTI4LjA2NyAgICBjLTYuOTM3LDEwLjM2NC0xOC4wMSwxOC42ODMtMzAuOTUyLDIxLjYzNGMtMC4yMzIsMC4wODItMC40NDIsMC4xNjItMC40NDIsMC4xNjJsNC4zMjIsODIuNzYxICAgIGM0Ny44MjMtMjcuODA0LDgwLjA1My03OS40Niw4MC4wNTMtMTM4Ljc2MkMzNTAuOTA3LDEwMS42ODcsMjc5LjAzNCwyOS44MTMsMTkwLjM3MiwyOS44MTN6IiBmaWxsPSIjRkZEQTQ0Ii8+CgkJPHBhdGggZD0iTTEwMy42NjIsMTQ4Ljk4YzAuNTc1LTIuMzQxLDEuMzQ4LTQuNTY2LDEuMzgzLTQuNjA2YzAuMjUtMC44NzctMC4yMTUtMS43NzItMS4xNjgtMi4zNDEgICAgYy0wLjkwNi0wLjQ4OC0yLjAxLTAuMjM4LTIuNTIxLDAuNTQ2YzAsMC0xLjA5OCwxLjc0OS0yLjY5LDQuMzM0Yy0xLjI5NSwyLjIyNS0zLjIxMiw1Ljc4LTQuNTIsMTAuMjA3ICAgIGMtMS4xMzMsMy44OC0yLjQ4Niw5LjAzOS0zLjA5NiwxNC44MTNjLTAuMjYxLDMuMDMzLTAuMzIsNS43NjktMC4yMjcsOC41ODZjMC4yMjcsMy4yMTIsMC43MTQsNS45NiwxLjY0NCw5LjEwMyAgICBjMy4xNTQsOC45NjQsNS41ODMsMTcuNjQ0LDE0LjM0OSwyNi4yMDZjMi43NzEsMi44NDcsNS42MTgsNC43ODcsNy42NzQsNi4yMTZsMC43MjYsMC41MTFjMC40NDIsMC4yOTEsMC44NjYsMC41NTksMS4yODQsMC44MDMgICAgYzEuNzI2LDAuOTA2LDIuODgxLDEuMjMxLDMuMDkxLDEuMjc3YzAuODU5LDAuMjMyLDEuNzQzLTAuMTg2LDIuMTA4LTAuODgzYzAuMzQzLTAuNzMyLDAuMDkzLTEuNjUtMC42MjEtMi4yMyAgICBjMCwwLTEtMC44NzEtMi4yODMtMi40OThjLTAuODc3LTAuOTg4LTEuODMtMi40MTctMi45MzktNC4wMzFjLTAuNzg0LTEuMTM5LTEuNzA4LTIuNDI5LTIuNTY4LTMuNjg0ICAgIGMtNC4yNy02LjUxOC02LjczMi0xNS42MTUtMTAuMTM3LTI0LjkzNGMtMC42NjgtMi4wMjItMS4yMTQtNC42NDItMS40MTgtNi44NjdjLTAuMjcyLTIuNTY4LTAuNC01LjA0Mi0wLjQtNy4zMzcgICAgYy0wLjA5OS01LjMzMywwLjEzOS05LjkxMSwwLjYwNC0xMy42MjNDMTAyLjQ3MSwxNTQuMzYsMTAyLjg4OSwxNTEuMjE3LDEwMy42NjIsMTQ4Ljk4eiIgZmlsbD0iI0ZGREE0NCIvPgoJCTxwYXRoIGQ9Ik0xOTAuMzcyLDBDODUuNDE1LDAsMCw4NS4zOTcsMCwxOTAuMzZDMCwyOTUuMyw4NS40MTUsMzgwLjcyMSwxOTAuMzcyLDM4MC43MjFjMTA0Ljk1MiwwLDE5MC4zNS04NS40MjEsMTkwLjM1LTE5MC4zNjEgICAgQzM4MC43MjEsODUuMzk3LDI5NS4zMjQsMCwxOTAuMzcyLDB6IE0xOTAuMzcyLDM2Ni41MjNjLTk3LjE0NCwwLTE3Ni4xOC03OS4wMy0xNzYuMTgtMTc2LjE2MyAgICBjMC05Ny4xNDQsNzkuMDM2LTE3Ni4xOCwxNzYuMTgtMTc2LjE4Yzk3LjEzMywwLDE3Ni4xNzUsNzkuMDM2LDE3Ni4xNzUsMTc2LjE4QzM2Ni41NDYsMjg3LjQ5MywyODcuNTA0LDM2Ni41MjMsMTkwLjM3MiwzNjYuNTIzeiAgICAiIGZpbGw9IiNGRkRBNDQiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
              </div>
              <div class="flip-card-back rounded-circle text-center">
              <h4 class="service-heading blockquote mt-4 mb-1 text-center" style="font-size:14px;">Servizio Ristorazione</h4>
              <p class="text-muted text-justify ml-4" style="font-size:12px; width: 200px;">A bordo delle nostre navicelle ti offriamo un servizio di ristorazione gratuito in grado di soddisfare tutti i tuoi gusti:proposte innovative, moderne e originali, realizzate partendo da ingredienti freschi e di stagione presi da ogni parte della galassia.</p>
            </div>
          </div>
        </div>
        <div class="flip-card ">
          <div class="flip-card-inner ">
            <div class="team-member flip-card-front">
              <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDAxIDUxMi4wMDEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMDEgNTEyLjAwMTsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxMjhweCIgaGVpZ2h0PSIxMjhweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQ5OS4wMDUsMjE4LjQzMmMtNC41Ny01LjgzNS02LjExMi0xMy41OC00LjEyMi0yMC43MThjNy41NDUtMjcuMDY2LTQuMjc5LTU1LjYxMS0yOC43NTItNjkuNDE0ICAgIGMtNi40NTYtMy42NDItMTAuODQ0LTEwLjIwOC0xMS43MzctMTcuNTY2Yy0zLjM4OC0yNy44OTMtMjUuMjM0LTQ5Ljc0LTUzLjEyOC01My4xMjhjLTcuMzU4LTAuODk0LTEzLjkyMy01LjI4MS0xNy41NjUtMTEuNzM2ICAgIGMtMTMuNTk2LTI0LjEwNi00Mi4xMTktMzYuMzYxLTY5LjQxNC0yOC43NTNjLTcuMzQzLDIuMDQ2LTE1LjAyNCwwLjM0LTIwLjcxOC00LjEyMkMyODIuODk3LDQuNjM2LDI2OS41NTUsMC4wMzMsMjU2LDAuMDMzICAgIGMtMTMuNTU1LDAtMjYuODk3LDQuNjA0LTM3LjU2OCwxMi45NjNjLTUuNjgxLDQuNDUxLTEzLjM1Nyw2LjE3My0yMC43MTgsNC4xMjJjLTI3LjM0MS03LjYyLTU1Ljg0Miw0LjY4OC02OS40MTQsMjguNzUyICAgIGMtMy42NDIsNi40NTYtMTAuMjA4LDEwLjg0NC0xNy41NjYsMTEuNzM3Yy0yNy44OTMsMy4zODgtNDkuNzQsMjUuMjM0LTUzLjEyOCw1My4xMjhjLTAuODk0LDcuMzU4LTUuMjgxLDEzLjkyMy0xMS43MzYsMTcuNTY1ICAgIGMtMjQuNDc0LDEzLjgwNC0zNi4yOTcsNDIuMzQ4LTI4Ljc1Myw2OS40MTRjMS45OSw3LjEzOSwwLjQ1LDE0Ljg4NS00LjEyMiwyMC43MThjLTE3LjMyOCwyMi4xMTktMTcuMzI4LDUzLjAxNiwwLDc1LjEzNSAgICBjNC41Nyw1LjgzNSw2LjExMiwxMy41OCw0LjEyMiwyMC43MThjLTcuNTQ1LDI3LjA2Niw0LjI3OSw1NS42MTEsMjguNzUyLDY5LjQxNGM2LjQ1NiwzLjY0MiwxMC44NDQsMTAuMjA4LDExLjczNywxNy41NjYgICAgYzMuMzg4LDI3Ljg5MywyNS4yMzQsNDkuNzQsNTMuMTI4LDUzLjEyOGM3LjM1OCwwLjg5NCwxMy45MjMsNS4yODEsMTcuNTY1LDExLjczNmMxMC43ODMsMTkuMTE4LDMxLjExMywzMC45OTQsNTMuMDU2LDMwLjk5NCAgICBjMTIuMzE1LDAsMTYuMDcyLTMuMTAxLDIyLjY0MS0zLjEwMWM1LjIwOSwwLDEwLjMzNiwxLjc2OSwxNC40MzcsNC45ODFjMTAuNjcxLDguMzU5LDI0LjAxMywxMi45NjMsMzcuNTY4LDEyLjk2MyAgICBjMTMuNTU1LDAsMjYuODk3LTQuNjA0LDM3LjU2OC0xMi45NjNjNC4xMDEtMy4yMTMsOS4yMjgtNC45ODEsMTQuNDM3LTQuOTgxYzYuNzQ2LDAsMTAuMDg0LDMuMTAyLDIyLjY0MiwzLjEwMSAgICBjMjEuOTQzLTAuMDAxLDQyLjI3My0xMS44NzgsNTMuMDU1LTMwLjk5M2MzLjY0Mi02LjQ1NiwxMC4yMDgtMTAuODQ0LDE3LjU2Ni0xMS43MzdjMjcuODkzLTMuMzg4LDQ5Ljc0LTI1LjIzNCw1My4xMjgtNTMuMTI4ICAgIGMwLjg5NC03LjM1OCw1LjI4MS0xMy45MjMsMTEuNzM2LTE3LjU2NWMyNC40NzQtMTMuODA0LDM2LjI5Ny00Mi4zNDgsMjguNzUzLTY5LjQxNGMtMS45OS03LjEzOS0wLjQ1LTE0Ljg4NSw0LjEyMi0yMC43MTggICAgQzUxNi4zMzIsMjcxLjQ0OCw1MTYuMzMyLDI0MC41NTEsNDk5LjAwNSwyMTguNDMyeiBNNDcyLjg1MSwyNzMuMDc5Yy0xMS4wNTcsMTQuMTE1LTE0Ljc4NiwzMi44NTUtOS45NzEsNTAuMTI3ICAgIGMzLjQzLDEyLjMwNS0xLjk0NiwyNS4yODMtMTMuMDczLDMxLjU1OWMtMTUuNjE4LDguODExLTI2LjIzMiwyNC42OTYtMjguMzk0LDQyLjQ5NmMtMS41NCwxMi42ODEtMTEuNDczLDIyLjYxMy0yNC4xNTQsMjQuMTU0ICAgIGMtMTcuNzk5LDIuMTYyLTMzLjY4NSwxMi43NzYtNDIuNDk3LDI4LjM5NWMtNC45MDIsOC42OTMtMTQuMTQ1LDE0LjA5My0yNC4xMiwxNC4wOTRjLTcuNjgsMC0xMC40NTItMy4xMDEtMjIuNjQtMy4xMDEgICAgYy0xMi42MDIsMC0yNS4wMDUsNC4yOC0zNC45MjUsMTIuMDUxYy00LjkyMSwzLjg1NS0xMC44MjcsNS44OTQtMTcuMDc5LDUuODk0Yy02LjI1MiwwLTEyLjE1OC0yLjAzOC0xNy4wOC01Ljg5NCAgICBjLTkuOTItNy43NzEtMjIuMzIzLTEyLjA1MS0zNC45MjUtMTIuMDUxYy0xMi4xODYsMC0xNC45NTQsMy4xMDEtMjIuNjQxLDMuMTAxYy05Ljk3NCwwLTE5LjIxNy01LjQtMjQuMTItMTQuMDk1ICAgIGMtOC44MTEtMTUuNjE4LTI0LjY5Ni0yNi4yMzItNDIuNDk2LTI4LjM5NGMtMTIuNjgxLTEuNTQtMjIuNjEzLTExLjQ3My0yNC4xNTQtMjQuMTU0Yy0yLjE2Mi0xNy43OTktMTIuNzc2LTMzLjY4NS0yOC4zOTUtNDIuNDk3ICAgIGMtMTEuMTI2LTYuMjc2LTE2LjUwMS0xOS4yNTItMTMuMDcyLTMxLjU1OGM0LjgxNS0xNy4yNzIsMS4wODYtMzYuMDEyLTkuOTcxLTUwLjEyN2MtNy44NzgtMTAuMDU2LTcuODc4LTI0LjEwMywwLTM0LjE1OSAgICBjMTEuMDU3LTE0LjExNSwxNC43ODYtMzIuODU0LDkuOTcxLTUwLjEyN2MtMy40My0xMi4zMDUsMS45NDYtMjUuMjgzLDEzLjA3My0zMS41NTljMTUuNjE4LTguODEsMjYuMjMyLTI0LjY5NiwyOC4zOTQtNDIuNDk2ICAgIGMxLjU0LTEyLjY4MSwxMS40NzMtMjIuNjEzLDI0LjE1NC0yNC4xNTRjMTcuNzk5LTIuMTYyLDMzLjY4NS0xMi43NzYsNDIuNDk3LTI4LjM5NWM2LjE4Ni0xMC45NjksMTkuMTQ3LTE2LjUzLDMxLjU1OC0xMy4wNzIgICAgYzE3Ljc1Niw0Ljk0OSwzNi4zMzMsMC44MzUsNTAuMTI3LTkuOTcxYzQuOTIxLTMuODU1LDEwLjgyNy01Ljg5NCwxNy4wNzktNS44OTRjNi4yNTIsMCwxMi4xNTgsMi4wMzgsMTcuMDgsNS44OTQgICAgYzEzLjgwNCwxMC44MTMsMzIuMzkyLDE0LjkxNSw1MC4xMjcsOS45NzFjMTIuNC0zLjQ1NSwyNS4zNjUsMi4wOTIsMzEuNTU5LDEzLjA3M2M4LjgxLDE1LjYxOCwyNC42OTYsMjYuMjMyLDQyLjQ5NiwyOC4zOTQgICAgYzEyLjY4MSwxLjU0LDIyLjYxMywxMS40NzMsMjQuMTU0LDI0LjE1NGMyLjE2MiwxNy43OTksMTIuNzc2LDMzLjY4NSwyOC4zOTUsNDIuNDk3YzExLjEyNiw2LjI3NiwxNi41MDEsMTkuMjUyLDEzLjA3MiwzMS41NTggICAgYy00LjgxNSwxNy4yNzItMS4wODYsMzYuMDEyLDkuOTcxLDUwLjEyN0M0ODAuNzI5LDI0OC45NzcsNDgwLjcyOSwyNjMuMDIzLDQ3Mi44NTEsMjczLjA3OXoiIGZpbGw9IiNGRkRBNDQiLz4KCTwvZz4KPC9nPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0yNTYsNzcuMDM0Yy05OC42ODIsMC0xNzguOTY2LDgwLjI4NC0xNzguOTY2LDE3OC45NjZTMTU3LjMxOCw0MzQuOTY2LDI1Niw0MzQuOTY2UzQzNC45NjcsMzU0LjY4Miw0MzQuOTY3LDI1NiAgICBTMzU0LjY4Miw3Ny4wMzQsMjU2LDc3LjAzNHogTTI1Niw0MDEuNzQ0Yy04MC4zNjMsMC0xNDUuNzQzLTY1LjM4MS0xNDUuNzQzLTE0NS43NDNTMTc1LjYzOCwxMTAuMjU3LDI1NiwxMTAuMjU3ICAgIHMxNDUuNzQzLDY1LjM4MSwxNDUuNzQzLDE0NS43NDNTMzM2LjM2NCw0MDEuNzQ0LDI1Niw0MDEuNzQ0eiIgZmlsbD0iI0ZGREE0NCIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTE2OC41MTEsMjM3Ljk4aC04LjM1OWwxLjI4Ni0xNy4yMzFoMjguMTYxYzMuODU3LDAsNS43ODYtNC4zNzIsNS43ODYtOC43NDRzLTEuOTI5LTguNzQ0LTUuNzg2LTguNzQ0aC00MS4wMjEgICAgYy0yLjE4NiwwLTMuMjE1LDIuMzE0LTMuNiw2LjE3M2wtMy40NzIsMzIuNDA1Yy0wLjEyOCwxLjQxNC0wLjI1NywyLjQ0My0wLjI1NywzLjcyOWMwLDQuODg3LDEuODAxLDcuODQ0LDcuNzE1LDcuODQ0aDE5LjU0NiAgICBjNy4wNzIsMCwxMS40NDQsNC4xMTUsMTEuNDQ0LDEyLjYwMnYyLjQ0M2MwLDguMzU5LTQuMzcyLDEyLjA4Ny0xMS43MDIsMTIuMDg3Yy02LjMwMSwwLTExLjE4OC0yLjctMTEuMTg4LTcuODQ0ICAgIGMwLTQuMTE1LTEuMjg2LTcuNDU4LTEwLjAzLTcuNDU4Yy02LjMwMSwwLTEwLjAzLDEuOTI5LTEwLjAzLDguODczYzAsMTIuMDg3LDExLjA1OSwyMy45MTgsMzEuNzYyLDIzLjkxOCAgICBjMTcuMjMxLDAsMzEuMjQ4LTguMTAxLDMxLjI0OC0yOS41Nzd2LTIuNDQzQzIwMC4wMTUsMjQ1LjQzOCwxODYuMjU3LDIzNy45OCwxNjguNTExLDIzNy45OHoiIGZpbGw9IiNGRkRBNDQiLz4KCTwvZz4KPC9nPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0yMzguODQ4LDIwMy4yNjFjLTE3Ljc0NSwwLTMxLjUwNSw4LjIzLTMxLjUwNSwzMC4zNDd2MzQuMDc2YzAsMjIuMTE4LDEzLjc2LDMwLjM0NywzMS41MDUsMzAuMzQ3ICAgIHMzMS42MzMtOC4yMywzMS42MzMtMzAuMzQ3di0zNC4wNzZDMjcwLjQ4MiwyMTEuNDksMjU2LjU5NCwyMDMuMjYxLDIzOC44NDgsMjAzLjI2MXogTTI1MC40MjEsMjY3LjY4NCAgICBjMCw4Ljg3My00LjM3MiwxMi44NTktMTEuNTczLDEyLjg1OWMtNy4yMDEsMC0xMS40NDUtMy45ODctMTEuNDQ1LTEyLjg1OXYtMzQuMDc2YzAtOC44NzMsNC4yNDQtMTIuODU5LDExLjQ0NS0xMi44NTkgICAgYzcuMiwwLDExLjU3MywzLjk4NywxMS41NzMsMTIuODU5VjI2Ny42ODR6IiBmaWxsPSIjRkZEQTQ0Ii8+Cgk8L2c+CjwvZz4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMjk3Ljg2NywyMDMuMjYxYy0xMC45MywwLTE5LjI4OSw0LjYyOS0xOS4yODksMTcuMzZ2MTguMjZjMCwxMi43MzEsOC4zNTksMTcuMzYsMTkuMjg5LDE3LjM2ICAgIGMxMC44MDMsMCwxOS4yODktNC42MjksMTkuMjg5LTE3LjM2di0xOC4yNkMzMTcuMTU2LDIwNy44OSwzMDguNjY4LDIwMy4yNjEsMjk3Ljg2NywyMDMuMjYxeiBNMzA0LjI5NiwyMzguODggICAgYzAsNC4yNDQtMi40NDMsNi4xNzMtNi40Myw2LjE3M2MtMy45ODcsMC02LjMtMS45MjktNi4zLTYuMTczdi0xOC4yNmMwLTQuMjQ0LDIuMzE0LTYuMTczLDYuMy02LjE3MyAgICBjMy45ODcsMCw2LjQzLDEuOTI5LDYuNDMsNi4xNzNWMjM4Ljg4eiIgZmlsbD0iI0ZGREE0NCIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTM1Ni44OSwyNDQuNjY3Yy0xMC45MywwLTE5LjI4OSw0LjYyOS0xOS4yODksMTcuMzZ2MTguMjZjMCwxMi43MzEsOC4zNTksMTcuMzYsMTkuMjg5LDE3LjM2ICAgIGMxMC44MDIsMCwxOS4yODktNC42MjksMTkuMjg5LTE3LjM2di0xOC4yNkMzNzYuMTc5LDI0OS4yOTYsMzY3LjY5MiwyNDQuNjY3LDM1Ni44OSwyNDQuNjY3eiBNMzYzLjMyLDI4MC4yODYgICAgYzAsNC4yNDQtMi40NDQsNi4xNzMtNi40Myw2LjE3M2MtMy45ODYsMC02LjMtMS45MjktNi4zLTYuMTczdi0xOC4yNmMwLTQuMjQ0LDIuMzE0LTYuMTczLDYuMy02LjE3MyAgICBjMy45ODYsMCw2LjQzLDEuOTI5LDYuNDMsNi4xNzNWMjgwLjI4NnoiIGZpbGw9IiNGRkRBNDQiLz4KCTwvZz4KPC9nPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zNDkuNDMyLDE5Ny45ODhjLTIuMzE0LDAtNC4zNzIsMS4wMjktNS40MDEsMy4yMTVsLTQ1LjEzNiw5Mi43MTRjLTAuMzg2LDAuNzcyLTAuNjQzLDEuNjcxLTAuNjQzLDIuNDQzICAgIGMwLDMuMjE1LDIuODI5LDYuODE1LDcuMiw2LjgxNWMyLjQ0NCwwLDQuODg3LTEuMjg2LDUuNzg3LTMuMjE1bDQ1LjI2NC05Mi43MTRjMC4zODYtMC43NzIsMC41MTUtMS42NzEsMC41MTUtMi40NDMgICAgQzM1Ny4wMTksMjAwLjY4OCwzNTMuMDMyLDE5Ny45ODgsMzQ5LjQzMiwxOTcuOTg4eiIgZmlsbD0iI0ZGREE0NCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
            </div>
            <div class="flip-card-back rounded-circle text-center">
              <h4 class="service-heading blockquote mb-3 text-center" style="font-size:15px; margin-top:2.0rem;">Sconto CosmoStore</h4>
              <p class="text-muted text-justify ml-4" style="font-size:14px; width: 200px;">Comprando un biglietto avrai diritto ad uno sconto del 50%, valido per 12 mesi, per un acquisto in uno dei nostri CosmoStore, presente in ogni Spazioporto.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Il Team</h2>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-sm-6">
            <div class="team-member ">
              <div class="team-avatar rounded-circle">
                  <img class="img-responsive rounded-circle" src="immagini/team/simone.png" alt="">
              </div>
              <div class="team-desc">
                  <h4 class="mb-2 mr-auto text-center">Simone Tedeschi</h4>
                  <p class="text-center">Studente di Ingegneria Informatica</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="team-member ">
              <div class="team-avatar rounded-circle">
                <img class=" img-responsive rounded-circle" src="immagini/team/sveva.png" alt="">
              </div>
              <div class="team-desc">
                <h4 class="mb-2 mr-auto text-center" style="margin-left:9.5rem;">Sveva Pepe</h4>
                <p class="text-center "style="margin-left:10rem;">Studentessa di Ingegneria Informatica</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>







    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="text-left">
            <span class="copyright">Copyright &copy; Progetto LTW 2018</span>
          </div>
        </div>
      </div>
    </footer>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


    <script src="js/jquery.easing.min.js"></script>
    <script type="js/all.js"></script>
    <script src="path/jquery.slickmodal.min.js"></script>


    <script src="js/style.js"></script>

	<script>
    $('#overlay').modal('show');

          setTimeout(function() {
          $('#overlay').modal('hide');
      }, 10000);
      </script>

  </body>

</html>

