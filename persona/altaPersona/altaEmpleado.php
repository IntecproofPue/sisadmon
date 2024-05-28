<?php

require_once ('../../includes/pandora.php');
require_once ('../../includes/load.php');
require_once ('FuncionesAltaEmpleado.php');

session_start();

$resultadoSede = ObtenerSede();
$resultadoDocumento = ObtenerTipoDocumento();
$resultadoPuesto = ObtenerPuesto();
$resultadoContratantes = ObtenerAutorizacionContratante();


if (isset($_SESSION['user_id'])) { ?>
<?php } else {

    ?>
    <script type="text/javascript">
        //Redireccionamiento tras 5 segundos
        setTimeout(function () {
            window.location.href = "../../index.html";
        }, 0);
    </script>
    <?php

}


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
    <script src = "../consulEmpleado/ProcesosDocumentosEmpleado.js" ></script>


    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

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
                        $row = $GLOBALS['rowObtenerNombre'];
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
                                    <li><a href="#"><span class="ti-user"></span><?php echo $Perfil; ?></a></li>
                                    <li><a href="#"><span
                                                    class="ti-settings"></span><?php echo $herramientas; ?></a>
                                    </li>
                                    <li><a href="../../includes/logout.php"><span
                                                    class="ti-power-off"></span><?php echo $logout; ?></a></li>
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
                            <li class="menu-item active"><a title="DOMICILIO" href="altaDomicilio.php">DOMICILIO</a>
                            </li>
                            <li class="menu-item active"><a title="CONTACTO" href="altaContacto.php">CONTACTO</a>
                            </li>
                            <li class="menu-item active"><a title="CONTACTO" href="altaEmpleado.php">EMPLEADO</a>
                            </li>
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
                    <h1>ALTA EMPLEADO</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">INICIO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ALTA EMPLEADO&nbsp;&nbsp;</li>
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

                        <form class="dashboard-form" id="FormEmpleadoAlta">

                            <input type="hidden" name="iIdConstanteSede" id="iIdConstanteSede" value="">
                            <input type="hidden" name="iClaveSede" id="iClaveSede" value="">

                            <input type="hidden" name="iIdConstanteDocumento" id="iIdConstanteDocumento" value="">
                            <input type="hidden" name="iClaveDocumento" id="iClaveDocumento" value="">

                            <div class="dashboard-section basic-info-input">
                                <h4><i data-feather="user-check"></i>Basic Infos</h4>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*PUESTO:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" Name="iIdPuesto" id="iIdPuesto" required>
                                            <option value="" selected>SELECCIONE UN PUESTO</option>
                                            <?php foreach ($resultadoPuesto as $puesto): ?>
                                                <option value="<?= $puesto['iIdPuesto'] ?>">
                                                    <?= $puesto['vchPuesto'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*FECHA DE INGRESO:</label>
                                    <?php
                                    // Calcular la fecha actual
                                    $fechaActual = date('Y-m-d');

                                    // Restar 18 años a la fecha actual
                                    $fechaMinima = date('Y-m-d', strtotime('-18 years', strtotime($fechaActual)));

                                    // Establecer la fecha máxima como la fecha actual
                                    $fechaMaxima = $fechaActual;

                                    // Establecer la fecha mínima como 1900-01-01 (opcional)
                                    $fechaLimiteInferior = '1900-01-01';
                                    ?>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="FECHA DE INGRESO"
                                               name="fechaIngreso" id="fechaIngreso" pattern="\d{4}-\d{2}-\d{2}"
                                               title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)" required
                                               min="<?php echo $fechaMinima; ?>" max="<?php echo $fechaMaxima; ?>"
                                               maxlength="10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*NSS:</label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control" name="vchNSS" id="vchNSS"
                                               maxlength="10" pattern="^[0-9]{10,}$" title="NSS INCORRECTO"
                                               style="text-transform: uppercase" placeholder="Ingrese su NSS" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*SEDE:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" Name="iIdSede" id="iIdSede" required>
                                            <option value="">SELECCIONE UNA SEDE</option>
                                            <?php foreach ($resultadoSede as $sede): ?>
                                                <option
                                                        value="<?= $sede['iIdConstante'] . '-' . $sede['iClaveCatalogo'] ?>">
                                                    [<?= $sede['iClaveCatalogo'] ?>] - <?= $sede['vchDescripcion'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*PERSONA QUE AUTORIZA
                                        CONTRATACIÓN:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" Name="iIdPersonaContratante"
                                                id="iIdPersonaContratante" required>
                                            <option value="" selected>SELECCIONA LA PERSONA</option>
                                            <?php foreach ($resultadoContratantes as $contratante): ?>
                                                <option value="<?= $contratante['iIdPersona'] ?>">
                                                    [<?= $contratante['iIdPersona'] ?>]
                                                    -
                                                    <?= $contratante['vchPrimerApellido'] . ' ' . $contratante['vchSegundoApellido'] . ' ' . $contratante['vchNombre'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="documentosContainer" name="documentosContainer">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="button" class="button" id="registrarEmpleado">REGISTRAR
                                            EMPLEADO
                                        </button>
                                        <button type="reset" class="button" id="limpiar">LIMPIAR</button>
                                        <button type="button" class="button" id="Cancelar">CANCELAR</button>
                                        <div id="botonAgregarDocumentos" href="#" data-toggle="modal"
                                             data-target="#apply-popup-id-2"></div>

                                        <div id="botonFinalizar"></div>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <?php
                    if (isset($resultados['error'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $resultados['error'] . '</div>';
                    } elseif (isset($resultados['success'])) {
                        echo '<div class="alert alert-success" role="alert">' . $resultados['success'] . '</div>';
                    }
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- inicio de modales -->
<div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="prcAltaDoctos.php" method="post" class="dashboard-form" id="AltaDocumentos" enctype="multipart/form-data" >
                    <input type="hidden" name="iIdConstanteDocumento" id="iIdConstanteDocumento" value="">
                    <input type="hidden" name="iClaveDocumento" id="iClaveDocumento" value="">

                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>ALTA DE DOCUMENTOS</h5>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <select class="form-control" id="iIdDocumentoAgregar" name="iIdDocumento[]">
                                <option value="">TIPO DE DOCUMENTO:</option>
                                <?php foreach ($resultadoDocumento as $documento): ?>
                                    <option
                                            value="<?= $documento['iIdConstante'] . '-' . $documento['iClaveCatalogo'] ?>">
                                        [<?= $documento['iClaveCatalogo'] ?>] - <?= $documento['vchDescripcion'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group file-input-wrap">
                            <option value="">CARGAR DOCUMENTO:</option>
                            <label for="up-cv">
                                <input id="up-cv" type="file" onchange="cargarDocumento(event)" name="documento" accept="application/pdf" >
                                <i data-feather="upload-cloud"></i>
                                <p id="nombreArchivo">NOMBRE DEL ARCHIVO
                                <p>(pdf,zip,doc,docx)</p>
                                </p>
                            </label>
                        </div>
                        <button class="boton-intec" id="buttonGuardarDocumento">GUARDAR</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- final de modales -->

<!-- Footer -->
<footer class="footer-bg">
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-bottom border-top">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="#">
                                    <img src="../../images/footer-logo.png" class="img-fluid" alt="">
                                </a>
                                <p class="copyright-text">DERECHOS DE AUTOR <a href="#">INTECPROOF</a> 2024,
                                    RESERVADOS</p>
                            </div>
                            <div class="col-lg-6">
                                <div class="back-to-top">
                                    <a href="#">SUBIR<i class="fas fa-angle-up"></i></a>
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
<script src="DatosEmpleadoAlta.js"></script>
<script src = "../consulEmpleado/ProcesosDocumentosEmpleado.js"></script>

<script> document.getElementById('registrarEmpleado').addEventListener('click', enviarFormularios);</script>
<script> document.getElementById('Cancelar').addEventListener('click', RegresarInicio); </script>
<script> document.getElementById('buttonGuardarDocumento').addEventListener('click', registrarDocumentos);  </script>

</body>

</html>