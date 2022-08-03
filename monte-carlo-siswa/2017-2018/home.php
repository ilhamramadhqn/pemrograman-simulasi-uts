<?php
$con = mysqli_connect('localhost', 'root', '', 'siswa') or die(mysqli_error());
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Sofyan Marta Pratama</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

    <style>
        .disable {
            pointer-events: none;
            opacity: 0.6;
        }
    </style>

</head>

<body class="">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header-wrap">
                    <!-- <div class="header__logo">
                        <a href="#">
                            <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div> -->
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <?php if ( $_GET['p'] == 'home' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>
                                <a href="home.php?p=home">
                                    <i class="fas fa-tachometer-alt"></i>Home
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <?php if ( $_GET['p'] == 'distribusi-frekuensi' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>
                            <a href="home.php?p=distribusi-frekuensi">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span class="bot-line"></span>Frekuensi</a>
                            </li>
                            <?php if ( $_GET['p'] == 'distribusi-probabilitas' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>
                                <a href="home.php?p=distribusi-probabilitas">
                                    <i class="fas fa-trophy"></i>
                                    <span class="bot-line"></span>Probabilitas</a>
                            </li>
                            <?php if ( $_GET['p'] == 'probabilitas-kumulatif' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>
                                <a href="home.php?p=probabilitas-kumulatif">
                                    <i class="fas fa-copy"></i>
                                    <span class="bot-line"></span>Prob Kumulatif</a>
                            </li>
                            <?php if ( $_GET['p'] == 'interval' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>
                                <a href="home.php?p=interval">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span class="bot-line"></span>Intreval</a>
                            </li>
                            <?php if ( $_GET['p'] == 'random-number' || $_GET['p'] == 'generate' ) { ?> <li class="active"> <?php } else if ( empty($_SESSION['random-number']) ) { ?> <li class="disable"> <?php } else { ?> <li> <?php } ?>
                                <a href="home.php?p=generate">
                                    <i class="fas fa-desktop"></i>
                                    <span class="bot-line"></span>Random Number</a>
                            </li>
                            <?php if ( $_GET['p'] == 'hasil-simulasi' ) { ?> <li class="active"> <?php } else if ( empty($_SESSION['hasil']) ) { ?> <li class="disable"> <?php } else { ?> <li> <?php } ?>                            
                                <a href="home.php?p=hasil-simulasi">
                                    <i class="fas fa-table"></i>
                                    <span class="bot-line"></span>Hasil Simulasi</a>
                            </li>
                            <?php if ( $_GET['p'] == 'keluar' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>                            
                                <a href="home.php?p=keluar">
                                    <i class="fas fa-power-off"></i>
                                    <span class="bot-line"></span>Keluar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                    <?php if ( $_GET['p'] == 'home' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>
                        <a href="home.php?p=home">
                            <i class="fas fa-tachometer-alt"></i>Home
                            <span class="bot-line"></span>
                        </a>
                    </li>
                    <?php if ( $_GET['p'] == 'distribusi-frekuensi' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>
                    <a href="home.php?p=distribusi-frekuensi">
                            <i class="fas fa-shopping-basket"></i>
                            <span class="bot-line"></span>Frekuensi</a>
                    </li>
                    <?php if ( $_GET['p'] == 'distribusi-probabilitas' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>
                        <a href="home.php?p=distribusi-probabilitas">
                            <i class="fas fa-trophy"></i>
                            <span class="bot-line"></span>Probabilitas</a>
                    </li>
                    <?php if ( $_GET['p'] == 'probabilitas-kumulatif' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>
                        <a href="home.php?p=probabilitas-kumulatif">
                            <i class="fas fa-copy"></i>
                            <span class="bot-line"></span>Prob Kumulatif</a>
                    </li>
                    <?php if ( $_GET['p'] == 'interval' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>
                        <a href="home.php?p=interval">
                            <i class="fas fa-calendar-alt"></i>
                            <span class="bot-line"></span>Intreval</a>
                    </li>
                    <?php if ( $_GET['p'] == 'random-number' || $_GET['p'] == 'generate' ) { ?> <li class="active"> <?php } else if ( empty($_SESSION['random-number']) ) { ?> <li class="disable"> <?php } else { ?> <li> <?php } ?>
                        <a href="home.php?p=generate">
                            <i class="fas fa-desktop"></i>
                            <span class="bot-line"></span>Random Number</a>
                    </li>
                    <?php if ( $_GET['p'] == 'hasil-simulasi' ) { ?> <li class="active"> <?php } else if ( empty($_SESSION['hasil']) ) { ?> <li class="disable"> <?php } else { ?> <li> <?php } ?>                            
                        <a href="home.php?p=hasil-simulasi">
                            <i class="fas fa-table"></i>
                            <span class="bot-line"></span>Hasil Simulasi</a>
                    </li>
                    <?php if ( $_GET['p'] == 'keluar' ) { ?> <li class="active"> <?php } else { ?> <li> <?php } ?>                            
                        <a href="home.php?p=keluar">
                            <i class="fas fa-power-off"></i>
                            <span class="bot-line"></span>Keluar</a>
                    </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <?php
        if ( $_GET['p'] == 'distribusi-frekuensi' ) {
            include('distribusi-frekuensi.php');
        } else if ( $_GET['p'] == 'home' || $_GET['p'] == 'welcome' ) {
            include('beranda.php');
        } else if ( $_GET['p'] == 'distribusi-probabilitas' ) {
            include('distribusi-probabilitas.php');
        } else if ( $_GET['p'] == 'probabilitas-kumulatif' ) {
            include('probabilitas-kumulatif.php');
        } else if ( $_GET['p'] == 'interval' ) {
            include('interval.php');
        } else if ( $_GET['p'] == 'generate' ) {
            include('generate.php');
        } else if ( $_GET['p'] == 'random-number' ) {
            include('random-number.php');
        } else if ( $_GET['p'] == 'hasil-simulasi' ) {
            include('hasil-simulasi.php');
        } else if ( $_GET['p'] == 'keluar' ) {
            include('logout.php');
        }


        
        ?>





            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Distributed by <a href="https://blogbugabagi.blogspot.com" target="_blank" rel="noopener noreferrer">BlogBugaBagi</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->