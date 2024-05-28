<?php
        require_once('../../includes/pandora.php');
        require_once('../../includes/load.php');

        session_start();

    if ( isset( $_SESSION['user_id'] ) ) {?>
    <?php }else{

        ?>
        <script type="text/javascript">
            //Redireccionamiento tras 5 segundos
            setTimeout( function() { window.location.href = "../../index.html"; }, 0 );
        </script>
        <?php

    }


    function ObtenerEstadoProcedencia()
    {
        $agrupadorEstado = 4;
        if (isset ($_SESSION['CatConstante'])) {
            $datosEdoProcedencia = $_SESSION['CatConstante'];
            $estadoEncontrado = array();


            foreach ($datosEdoProcedencia as $valorEstado) {
                if ($valorEstado['iAgrupador'] == $agrupadorEstado) {
                    $estadoEncontrado [] = $valorEstado;
                }
            }
            return $estadoEncontrado;
        } else {
            echo("No hay datos del Estado de Procedencia");
        }
    }

    $resultadoEstado = ObtenerEstadoProcedencia();

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
        function soloLetras(e) {
            tecla = (document.all) ? e.keyCode : e.which;


            if (tecla == 8) {
                return true;
            }


            patronAceptado = /[A-Z]/;
            tecla_final = String.fromCharCode(tecla);
            return patronAceptado.test(tecla_final);
        }

        function soloNumeros(e) {
            tecla = (document.all) ? e.keyCode : e.which;


            if (tecla == 8) {
                return true;
            }


            patronAceptado = /[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patronAceptado.test(tecla_final);
        }

        function soloRfc(e) {

            tecla = (document.all) ? e.keyCode : e.which;

            if (tecla == 8) {
                return true;
            }

            patronAceptado = /[A-Za-z0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patronAceptado.test(tecla_final);
        }


        function soloNombre(e) {

            tecla = (document.all) ? e.keyCode : e.which;


            if (tecla == 8) {
                return true;
            }
            patronAceptado = /[a-zA-Z áéíóúñÁÉÍÓÚÑ]+/;
            tecla_final = String.fromCharCode(tecla);
            return patronAceptado.test(tecla_final);
        }


    </script>
    <!--<input class="tf w-input" id="txtCurp" name="txtCurp" maxlength="150" onkeypress="return quitarEspeciales(event)" placeholder="No. de CURP" type="text">-->

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
                                <a href="#" class="notification-button"><?php echo $notificacionesTxt; ?></a>
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
                                <a href="#" class="account-button"><?php echo $miCuentaTxt; ?></a>
                                <div class="account-card">
                                    <div class="header-top-account-info">
                                        <a href="#" class="account-thumb">
                                            <img src="../../images/account/thumb-1.jpg" class="img-fluid" alt="">
                                        </a>
                                        <div class="account-body">
                                            <h5><a href="#"><?php echo $nombrePersona; ?></a></h5>
                                            <span class="mail"><?php echo $emailPersona; ?></span>
                                        </div>
                                    </div>
                                    <ul class="account-item-list">
                                        <li><a href="#"><span class="ti-user"></span> <?php echo $Perfil;  ?> </a></li>
                                        <li><a href="#"><span class="ti-settings"></span><?php echo $herramientas; ?></a></li>
                                        <li><a href="../../includes/logout.php"><span class="ti-power-off"></span><?php echo $logout; ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg cp-nav-2">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="menu-item active"><a title="PERSONA" href="altaPersona.php">PERSONA</a></li>
                                <li class="menu-item active"><a title="DOMICILIO" href="altaDomicilio.php">DOMICILIO</a></li>
                                <li class="menu-item active"><a title="CONTACTO" href="altaContacto.php">CONTACTO</a></li>
                                <li class="menu-item active"><a title="CONTACTO" href="altaEmpleado.php">EMPLEADO</a></li>
                            </ul>
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
                        <h1>ALTA DOMICILIO</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">INICIO</a></li>
                                <li class="breadcrumb-item active" aria-current="page">ALTA DOMICILIO&nbsp;&nbsp;</li>
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
                    <div class="dashboard-container">
                        <div class="dashboard-content-wrapper">
                            <form class="dashboard-form" id = "FormDomicilioAlta">
                                <input type="hidden" name = "iIdConstanteEstado" id="iIdConstanteEstado" value="" >
                                <input type="hidden" name = "iClaveEstado" id="iClaveEstado" value="" >

                                <div class="dashboard-section basic-info-input">
                                    <h4><i data-feather="user-check"></i>Basic Infos</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*ESTADO:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="estadoLista"  name = "estadoLista" required>
                                                <option value="" selected>SELECCIONE UN ESTADO</option>
                                                <?php foreach ($resultadoEstado as $estado): ?>
                                                    <option value="<?= $estado['iIdConstante'].'-'.$estado['iClaveCatalogo'] ?>">
                                                        [<?= $estado['iClaveCatalogo'] ?>] - <?= $estado['vchDescripcion'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*MUNICIPIO:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id = "vchMunicipio" name = "vchMunicipio" placeholder="MUNICIPIO"
                                                style="text-transform: uppercase" pattern="[A-Za-zÁÉÍÓÚáéíóúüÜñÑ\s]+"
                                                title="SOLO SE PERMITEN LETRAS" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*LOCALIDAD:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id = "vchLocalidad" name = "vchLocalidad" placeholder="LOCALIDAD" min="2"
                                                name="apeUnoEsccrito" style="text-transform: uppercase"
                                                style="text-transform: uppercase" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*CÓDIGO POSTAL:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="CODIGO POSTAL"  id="codigoPostal" name = "codigoPostal"
                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                maxlength="5">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*COLONIA:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="COLONIA" id = "vchColonia" name = "vchColonia" style="text-transform: uppercase" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*CALLE:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="CALLE" id = "vchCalle" name = "vchCalle"
                                                style="text-transform: uppercase" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*No EXT:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="No EXT" id = "vchNoExt" name = "vchNoExt"
                                                style="text-transform: uppercase" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*No INT:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="No INT" id = "vchNoInt" name = "vchNoInt"
                                                style="text-transform: uppercase" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*LETRA:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="LETRA" id = "vchLetra" name = "vchLetra"
                                                   style="text-transform: uppercase" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <script>
                                                function ValidarDatosDomicilio() {
                                                    // Obtener los valores de los elementos del formulario
                                                    var EstadoSeleccionado = document.getElementById('estadoLista');
                                                    var EstadoPartes = EstadoSeleccionado.value.split('-');
                                                    var iIdConstanteEstado = EstadoPartes[0];
                                                    var iClaveEstado = EstadoPartes[1];

                                                    // Asignar los valores a los campos ocultos
                                                    document.getElementById('iIdConstanteEstado').value = iIdConstanteEstado;
                                                    document.getElementById('iClaveEstado').value = iClaveEstado;

                                                    // Crear un objeto con los datos del formulario
                                                    var datosFormulario = {
                                                        estadoLista: EstadoSeleccionado.value,
                                                        vchMunicipio: document.getElementById('vchMunicipio').value,
                                                        vchLocalidad: document.getElementById('vchLocalidad').value,
                                                        codigoPostal: document.getElementById('codigoPostal').value,
                                                        vchColonia: document.getElementById('vchColonia').value,
                                                        vchCalle: document.getElementById('vchCalle').value,
                                                        vchLetra: document.getElementById('vchLetra').value,
                                                        vchNoExt: document.getElementById('vchNoExt').value,
                                                        vchNoInt: document.getElementById('vchNoInt').value,
                                                        iIdConstanteEstado: iIdConstanteEstado,
                                                        iClaveEstado: iClaveEstado
                                                    };

                                                    // Crear una instancia de XMLHttpRequest
                                                    var datosDomicilio = new XMLHttpRequest();

                                                    // Configurar la solicitud
                                                    datosDomicilio.open('POST', 'validarDatosDomicilio.php', true);
                                                    datosDomicilio.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                                    // Convertir el objeto de datos a una cadena de consulta URL
                                                    var formData = new URLSearchParams(datosFormulario).toString();

                                                    // Enviar la solicitud
                                                    datosDomicilio.send(formData);

                                                    // Manejar la respuesta
                                                    datosDomicilio.onload = function() {
                                                        if (datosDomicilio.status === 200) {
                                                            var respuesta = JSON.parse(datosDomicilio.responseText);
                                                            if (respuesta.bResultado === 1) {
                                                                console.log(respuesta);
                                                                localStorage.setItem('datosDomicilio',JSON.stringify(datosFormulario));
                                                                window.location.href = "altaContacto.php";
                                                            } else {
                                                                console.error("Mensaje Error: " + respuesta.vchMensaje);
                                                                alert(respuesta.vchMensaje)
                                                            }
                                                        } else {
                                                            console.error("Error en la solicitud al servidor");
                                                        }
                                                    };
                                                }

                                            </script>
                                            <button type="button" class="button" id = "botonSiguiente" >SIGUIENTE</button>
                                            <script>
                                                document.getElementById('botonSiguiente').addEventListener('click', ValidarDatosDomicilio);
                                            </script>
                                            <button type="reset" class="button">LIMPIAR</button>

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