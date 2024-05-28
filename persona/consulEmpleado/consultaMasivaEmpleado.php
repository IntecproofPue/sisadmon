<?php
session_start();
require_once('../../includes/pandora.php');
require_once('../../includes/load.php');


if ( isset( $_SESSION['user_id'] ) ) {?>
<?php }else{

    ?>
    <script type="text/javascript">
        //Redireccionamiento tras 5 segundos
        setTimeout( function() { window.location.href = "../../index.html"; }, 1000 );
    </script>
    <?php

}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?= $tituloPagina ?>
    </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="../../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css" />
    <link rel="stylesheet" href="../../assets/css/et-line.css" />
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="../../assets/css/plyr.css" />
    <link rel="stylesheet" href="../../assets/css/flag.css" />
    <link rel="stylesheet" href="../../assets/css/slick.css" />
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../../assets/css/jquery.nstSlider.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../dashboard/css/dashboard.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="../../images/favicon.png">
    <link rel="apple-touch-icon" href="../../images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../images/icon-114x114.png">


    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->



    <script>
        function funcionDesbloquearMensaje() {
            var x = document.getElementById("divOculto");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                //x.style.display = "none";
            }
        }
    </script>
</head>

<body>

<header class="header-2">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header-top">
                    <div class="logo-area">
                        <a href="../../index.html"><img src="../../images/logo-2.png" alt=""></a>
                    </div>
                    <div class="header-top-toggler">
                        <div class="header-top-toggler-button"></div>
                    </div>
                    <div class="top-nav">
                        <div class="dropdown header-top-notification">
                            <a href="#" class="notification-button"> <?= $notificacionesTxt ?> </a>
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
                        $row =$GLOBALS['rowObtenerNombre'];
                        $nombrePersona = $row['nombrePersona'];
                        $emailPersona = $row['contacto'];

                        ?>

                        <div class="dropdown header-top-account">
                            <a href="#" class="account-button"><?= $miCuentaTxt ?></a>
                            <div class="account-card">
                                <div class="header-top-account-info">
                                    <a href="#" class="account-thumb">
                                        <img src="../../images/account/thumb-1.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="account-body">
                                        <h5><a href="#"><?= $nombrePersona ?></a></h5>
                                        <span class="mail"><?= $emailPersona ?></span>
                                    </div>
                                </div>
                                <ul class="account-item-list">
                                    <li><a href="#"><span class="ti-user"></span><?= $Perfil ?></a></li>
                                    <li><a href="#"><span class="ti-settings"></span><?= $herramientas ?></a></li>
                                    <li><a href="../../includes/logout.php"><span class="ti-power-off"></span> <?= $logout ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg cp-nav-2">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                        </ul>
                    </div>
                </nav>
            </div>
            </nav>
        </div>
    </div>
    </div>
</header>

<!-- Breadcrumb -->
<div class="alice-bg padding-top-60 padding-bottom-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb-area">
                    <h1><?= $consultaEmpleadotxt ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><?= $inicioTxt ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $consultaEmpleadoLabeltxt?></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-form">

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
                <script>
                   let datosEmpleadosMasivo =  JSON.parse(localStorage.getItem('datosConsultaMasiva'));
                   console.log(datosEmpleadosMasivo);

                   const Empleados = new Array();

                if  (datosEmpleadosMasivo[0].bResultado === 1) {

                    for (var i= 0; i<datosEmpleadosMasivo.length; i++){
                        Empleados.push(datosEmpleadosMasivo[i]);
                    }
                }
               Empleados.forEach(empleado => {
                   const divEmpleado = document.createElement('div');
                   divEmpleado.innerHTML = `
                    <!--<div style="background-color: #40826D; text-align: center">
                         <i><span style='color: #ededee' size='-2'>${empleado.vchMensaje}</span></i><br />
                    </div>-->
                    <div class='candidate-filter-result'>
                        <div class='candidate'>
                            <div class='thumb'>
                                <a href='#'>
                                    <img src='../../images/candidate/thumb-1.jpg' class='img-fluid' alt=''>
                                </a>
                            </div>
                            <div class='body'>
                                <div class='content'>
                                    <h4><a href='#'>${empleado.vchNombre}</a></h4>
                                    <div class='info'>
                                        <span class='work-post'><a href='#'><i data-feather='check-square'></i>${empleado.vchPuesto}</a></span>
                                        <span class='location'><a href='#'><i data-feather='map-pin'></i>${empleado.vchSede}</a></span>
                                    </div>
                                </div>
                                <div class='button-area' >
                                    <a href='#' id="buttonSiguiente" data-empleado = '${JSON.stringify(empleado)}' >SELECCIONAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                   document.body.appendChild(divEmpleado); // Añade el div al cuerpo del documento
               });
               document.addEventListener('DOMContentLoaded', function(){
                   var botonesSeleccionar = document.querySelectorAll('#buttonSiguiente');
                   botonesSeleccionar.forEach(boton => {
                       boton.addEventListener('click', function (event){
                           localStorage.clear();

                           event.preventDefault();

                           var empleadoSeleccionado = JSON.parse(this.getAttribute('data-empleado'));

                           localStorage.setItem('empleadoSeleccionado', JSON.stringify(empleadoSeleccionado));

                           window.location.href = ("DatosEmpleado.php");
                       })
                   });
               });
                </script>
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
                                <div class="footer-app-download">
                                    <!--<a href="#" class="apple-app">Apple Store</a>
                                <a href="#" class="android-app">Google Play</a>-->
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 order-lg-1">
                                <!-- <p class="copyright-text">Copyright <a href="#">Oficiona</a> 2020, All right reserved</p> -->
                            </div>
                            <div class="col-xl-4 col-lg-3 order-lg-3">
                                <div class="back-to-top">
                                    <a href="#">Subir<i class="fas fa-angle-up"></i></a>
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
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/feather.min.js"></script>
<script src="../../assets/js/bootstrap-select.min.js"></script>
<script src="../../assets/js/jquery.nstSlider.min.js"></script>
<script src="../../assets/js/owl.carousel.min.js"></script>
<script src="../../assets/js/visible.js"></script>
<script src="../../assets/js/jquery.countTo.js"></script>
<script src="../../assets/js/chart.js"></script>
<script src="../../assets/js/plyr.js"></script>
<script src="../../assets/js/tinymce.min.js"></script>
<script src="../../assets/js/slick.min.js"></script>
<script src="../../assets/js/jquery.ajaxchimp.min.js"></script>

<script src="../../js/custom.js"></script>
<script src="../../dashboard/js/dashboard.js"></script>
<script src="../../dashboard/js/datePicker.js"></script>
<script src="../../dashboard/js/upload-input.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
<script src="../../js/map.js"></script>
</body>

</html>
