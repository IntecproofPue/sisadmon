<?php
require_once('../includes/pandora.php');
require_once('../includes/load.php');
require_once('../includes/functions.php');

session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?php echo $tituloPagina; ?>
    </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css"/>
    <link rel="stylesheet" href="../assets/css/et-line.css"/>
    <link rel="stylesheet" href="../assets/css/bootstrap-select.min.css"/>
    <link rel="stylesheet" href="../assets/css/plyr.css"/>
    <link rel="stylesheet" href="../assets/css/flag.css"/>
    <link rel="stylesheet" href="../assets/css/slick.css"/>
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="../assets/css/jquery.nstSlider.min.css"/>

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../dashboard/css/dashboard.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="../images/favicon.png">
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../images/icon-114x114.png">

</head>

<body>

<header class="header-2">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header-top">
                    <div class="logo-area">
                        <a href="../../inicio.php"><img src="../../images/logo-2.png" alt=""></a>
                    </div>
                    <div class="header-top-toggler">
                        <div class="header-top-toggler-button"></div>
                    </div>
                    <div class="top-nav">
                        <div class="dropdown header-top-notification">
                            <a href="#" class="notification-button">Notification</a>
                            <div class="notification-card">
                                <div class="notification-head">
                                    <span>Notifications</span>
                                    <a href="#">Mark all as read</a>
                                </div>
                                <div class="notification-body">
                                    <a href="../../home-2.html" class="notification-list">
                                        <i class="fas fa-bolt"></i>
                                        <p>Your Resume Updated!</p>
                                        <span class="time">5 hours ago</span>
                                    </a>
                                    <a href="#" class="notification-list">
                                        <i class="fas fa-arrow-circle-down"></i>
                                        <p>Someone downloaded resume</p>
                                        <span class="time">11 hours ago</span>
                                    </a>
                                    <a href="#" class="notification-list">
                                        <i class="fas fa-check-square"></i>
                                        <p>You applied for Project Manager <span>@homeland</span></p>
                                        <span class="time">11 hours ago</span>
                                    </a>
                                    <a href="#" class="notification-list">
                                        <i class="fas fa-user"></i>
                                        <p>You changed password</p>
                                        <span class="time">5 hours ago</span>
                                    </a>
                                    <a href="#" class="notification-list">
                                        <i class="fas fa-arrow-circle-down"></i>
                                        <p>Someone downloaded resume</p>
                                        <span class="time">11 hours ago</span>
                                    </a>
                                </div>
                                <div class="notification-footer">
                                    <a href="#">See all notification</a>
                                </div>
                            </div>
                        </div>

                        <?php

                        $user = obtenerUsuario($_SESSION['user_id']);
                        $row = $GLOBALS['rowObtenerNombre'];
                        $nombrePersona = $row['nombrePersona'];
                        $emailPersona = $row['contacto'];

                        ?>

                        <div class="dropdown header-top-account">
                            <a href="#" class="account-button">My Account</a>
                            <div class="account-card">
                                <div class="header-top-account-info">
                                    <a href="#" class="account-thumb">
                                        <img src="../../images/account/thumb-1.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="account-body">
                                        <h5><a href="#">
                                                <?php echo $nombrePersona; ?>
                                            </a></h5>
                                        <span class="mail">
                        <?php echo $emailPersona; ?>
                      </span>
                                    </div>
                                </div>
                                <ul class="account-item-list">
                                    <li><a href="#"><span class="ti-user"></span>Account</a></li>
                                    <li><a href="#"><span class="ti-settings"></span>Settings</a></li>
                                    <li><a href="../../includes/logout.php"><span class="ti-power-off"></span>Log
                                            Out</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <nav class="navbar navbar-expand-lg cp-nav-2">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="menu-item active"><a title="PERSONA" href="consultaPuesto.php">PUESTO</a></li>
                            <li class="menu-item active"><a title="DOMICILIO" href="consultaDomicilio.php">DOMICILIO</a>
                            </li>
                            <li class="menu-item active"><a title="CONTACTO" href="consultaContacto.php">CONTACTO</a>
                            </li>
                            <li class="menu-item active"><a title="CONTACTO" href="consultaEmpleado.php">EMPLEADO</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb-area">
                    <h1>REGISTRO DE INVENTARIO</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">INICIO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">INVENTARIO</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-form">
                    <form action="#">
                        <input type="text" placeholder="BUSCAR">
                        <button><i data-feather="search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
        <div class="row no-gliters">
            <div class="col">
                <div class="post-content-wrapper">
                    <form action="#" class="job-post-form">
                        <div class="basic-info-input">
                            <h4><i data-feather="plus-circle"></i>AGREGAR PRODUCTO</h4>

                            <div id="information" class="row">
                                <label class="col-md-3 col-form-label">Information</label>
                                <div class="col-md-9">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>TIPO DE PRODUCTO</option>
                                                    <option>Accounting / Finance</option>
                                                    <option>Health Care</option>
                                                    <option>Garments / Textile</option>
                                                    <option>Telecommunication</option>
                                                </select>
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>TIPO DE ASIGNACION</option>
                                                    <option>Accounting / Finance</option>
                                                    <option>Health Care</option>
                                                    <option>Garments / Textile</option>
                                                    <option>Telecommunication</option>
                                                </select>
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>TIPO SUBPRODUCTO</option>
                                                    <option>Part Time</option>
                                                    <option>Full Time</option>
                                                    <option>Temperory</option>
                                                    <option>Permanent</option>
                                                    <option>Freelance</option>
                                                </select>
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>ASIGNADO</option>
                                                    <option>Less than 1 Year</option>
                                                    <option>2 Year</option>
                                                    <option>3 Year</option>
                                                    <option>4 Year</option>
                                                    <option>Over 5 Year</option>
                                                </select>
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>MARCA</option>
                                                    <option>Accounting / Finance</option>
                                                    <option>Health Care</option>
                                                    <option>Garments / Textile</option>
                                                    <option>Telecommunication</option>
                                                </select>
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>PROYECTO ASIGNADO</option>
                                                    <option>Matriculation</option>
                                                    <option>Intermidiate</option>
                                                    <option>Gradute</option>
                                                </select>
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="MODELO">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="date" placeholder="FECHA DE INGRESO" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="SERIE">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>STATUS</option>
                                                    <option>Matriculation</option>
                                                    <option>Intermidiate</option>
                                                    <option>Gradute</option>
                                                </select>
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>TIPO DE MOVIMIENTO</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                                <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="signin-option">
                                <div class="buttons">
                                    <a href="#" class="btn button primary-bg">Sign in</a>
                                    <a href="#" class="btn button primary-bg">Register</a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>
</div>
</div>
</div>

<!-- Footer -->
<footer class="footer-bg">
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-bottom border-top">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 order-lg-2">
                            </div>
                            <div class="col-xl-4 col-lg-4 order-lg-1">
                                <a href="#">
                                    <img src="images/footer-logo.png" class="img-fluid" alt="">
                                </a>
                                <p class="copyright-text">Copyright <a href="#">Intecproof</a> 2024, All right
                                    reserved</p>
                            </div>
                            <div class="col-xl-4 col-lg-3 order-lg-3">
                                <div class="back-to-top">
                                    <a href="#">Back to top<i class="fas fa-angle-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/feather.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/jquery.nstSlider.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/visible.js"></script>
<script src="assets/js/jquery.countTo.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/plyr.js"></script>
<script src="assets/js/tinymce.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/html5-simple-date-input-polyfill.min.js"></script>

<script src="js/custom.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="js/map.js"></script>

</body>

</html>