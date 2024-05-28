<?php
require_once('../../includes/pandora.php');
require_once ('../../includes/load.php');
session_start();

// Inicializa las variables para almacenar mensajes de error
$errors = [];

// Inicializa las variables para almacenar datos del formulario
$tipoContacto = '';
$contacto = '';

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los valores del formulario y los convierte a mayúsculas
    $tipoContacto = strtoupper($_POST["tipoContacto"]);
    $contacto = strtoupper($_POST["contacto"]);

    // Realiza las validaciones necesarias
    if (empty($tipoContacto)) {
        $errors[] = "Selecciona el tipo de contacto";
    }

    if (empty($contacto)) {
        $errors[] = "Ingresa el contacto";
    }

    // Si no hay errores, puedes continuar con el procesamiento de los datos
    if (empty($errors)) {
        // Aquí puedes realizar acciones adicionales con los datos del formulario, como guardarlos en la base de datos, etc.
        // Redirecciona a alguna página de éxito o realiza otras acciones según tus necesidades
        header("Location: tu_pagina_de_exito.php");
        exit();
    }
}

// Función para validar campos
function validarCampo($valor, $tipo = 'text', $longitudMax = null)
{
    $valor = trim($valor);

    // Validar según el tipo
    switch ($tipo) {
        case 'text':
            $valor = htmlspecialchars($valor); // Escapar caracteres especiales
            break;
        case 'email':
            $valor = filter_var($valor, FILTER_VALIDATE_EMAIL);
            break;
        case 'Telefono':
            // Puedes implementar una validación específica para números de teléfono si es necesario
            break;
        default:
            // Tipo no reconocido
            return null;
    }

    // Validar la longitud si es necesario
    if ($longitudMax !== null && strlen($valor) > $longitudMax) {
        return null;
    }

    return $valor;
}

function ObtenerTipoContacto(){
    if (isset ($_SESSION['CatConstante'])){
        $datosContacto = $_SESSION['CatConstante'];
        $contactoEncontrado = array();

        foreach ($datosContacto as $valorContacto) {
            if ($valorContacto['iAgrupador'] == 8) {
                $contactoEncontrado [] = $valorContacto;
            }
        }
        return $contactoEncontrado;
    } else {
        echo ("No hay datos del Tipo de contacto");
    }
}

$resultadoContacto = ObtenerTipoContacto();


if ( isset( $_SESSION['user_id'] ) ) {?>
<?php }else{

    ?>
    <script type="text/javascript">
        //Redireccionamiento tras 5 segundos
        setTimeout( function() { window.location.href = "../../index.html"; }, 0 );
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
                            <a href="#" class="account-button"><?php echo $miCuentaTxt; ?> </a>
                            <div class="account-card">
                                <div class="header-top-account-info">
                                    <a href="#" class="account-thumb">
                                        <img src="../../images/account/thumb-1.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="account-body">
                                        <h5><a href="#"> <?php echo $nombrePersona; ?> </a></h5>
                                        <span class="mail"> <?php echo $emailPersona; ?></span>
                                    </div>
                                </div>
                                <ul class="account-item-list">
                                    <li><a href="#"><span class="ti-user"></span><?php echo $Perfil; ?></a></li>
                                    <li><a href="#"><span class="ti-settings"></span><?php echo $herramientas;  ?></a></li>
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
                    <h1>ALTA CONTACTO</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">INICIO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ALTA CONTACTO&nbsp;&nbsp;</li>
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
                        <form class="dashboard-form" id = "FormContactoAlta">

                            <input type="hidden" name = "iIdConstanteContacto" id="iIdConstanteContacto" value="" >
                            <input type="hidden" name = "iClaveContacto" id="iClaveContacto" value="" >

                            <div class="dashboard-section basic-info-input">
                                <h4><i data-feather="user-check"></i>Basic Infos</h4>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*TIPO DE CONTACTO:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" Name="tipoContacto" id="tipoContacto"
                                                onchange="validarTipoContacto()" required>
                                            <option value="">SELECCIONE UN TIPO DE CONTACTO</option>
                                            <?php foreach ($resultadoContacto as $contacto): ?>
                                                <option value="<?= $contacto['iIdConstante'].'-'.$contacto['iClaveCatalogo'] ?>">
                                                    [<?= $contacto['iClaveCatalogo'] ?>] - <?= $contacto['vchDescripcion'] ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*CONTACTO:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="contacto" name="contacto" class="form-control"
                                               placeholder="CONTACTO">
                                    </div>
                                </div>
                                <div class="form-group row" id="nuevosCamposContainer">
                                    <!-- Aquí se agregarán los nuevos campos -->
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <script>
                                            function ValidarDatosContacto() {
                                                // Obtener los valores de los elementos del formulario
                                                var ContactoSeleccionado = document.getElementById('tipoContacto');
                                                var ContactoPartes = ContactoSeleccionado.value.split('-');
                                                var iIdConstanteContacto = ContactoPartes[0];
                                                var iClaveContacto = ContactoPartes[1];

                                                // Asignar los valores a los campos ocultos
                                                document.getElementById('iIdConstanteContacto').value = iIdConstanteContacto;
                                                document.getElementById('iClaveContacto').value = iClaveContacto;

                                                // Crear un objeto con los datos del formulario
                                                var datosFormulario = {
                                                    vchTipoContacto: document.getElementById('tipoContacto').value,
                                                    iIdConstanteContacto: iIdConstanteContacto,
                                                    iClaveContacto: iClaveContacto,
                                                    contacto: document.getElementById('contacto').value
                                                };

                                                // Crear una instancia de XMLHttpRequest
                                                var datosContacto = new XMLHttpRequest();

                                                // Configurar la solicitud
                                                datosContacto.open('POST', 'validarDatosContacto.php', true);
                                                datosContacto.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                                // Convertir el objeto de datos a una cadena de consulta URL
                                                var formData = new URLSearchParams(datosFormulario).toString();

                                                // Enviar la solicitud
                                                datosContacto.send(formData);

                                                // Manejar la respuesta
                                                datosContacto.onload = function() {
                                                    if (datosContacto.status === 200) {
                                                        var respuesta = JSON.parse(datosContacto.responseText);
                                                        if (respuesta.bResultado === 1) {
                                                            console.log(respuesta);
                                                            localStorage.setItem('datosContacto',JSON.stringify(datosFormulario));
                                                            window.location.href = "altaEmpleado.php";
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
                                            document.getElementById('botonSiguiente').addEventListener('click', ValidarDatosContacto);
                                        </script>
                                        <button type="reset" class="button">LIMPIAR</button>
                                    </div>
                                </div>

                            </div>
                            <script>
                                function validarTipoContacto() {
                                    var tipoContacto = document.getElementById("tipoContacto").value;
                                    var contactoInput = document.getElementById("contacto");

                                    // Reinicia el valor del campo de contacto al cambiar el tipo de contacto
                                    contactoInput.value = "";
                                    contactoInput.disabled = false;

                                    // Limpia clases de estilo relacionadas con errores
                                    contactoInput.classList.remove("invalid");

                                    // Desvincula el evento input para evitar interferencias
                                    contactoInput.removeEventListener("input", validarCampo);

                                    // Agrega el evento input para validar el nuevo campo
                                    if (tipoContacto === "email" || tipoContacto === "Telefono") {
                                        contactoInput.addEventListener("input", validarCampo);
                                    }
                                }

                                function validarCampo(event) {
                                    var tipoContacto = document.getElementById("tipoContacto").value;
                                    var contactoInput = event.target;

                                    if (tipoContacto === "email") {
                                        var emailValue = contactoInput.value.trim();
                                        if (!validarEmail(emailValue)) {
                                            contactoInput.classList.add("invalid");
                                        } else {
                                            contactoInput.classList.remove("invalid");
                                        }
                                    } else if (tipoContacto === "Telefono") {
                                        var telefonoValue = contactoInput.value.trim();
                                        contactoInput.value = telefonoValue.replace(/[^0-9]/g, ''); // Solo permite números

                                        if (telefonoValue.length > 10 || !(/^\d+$/.test(telefonoValue))) {
                                            contactoInput.classList.add("invalid");
                                        } else {
                                            contactoInput.classList.remove("invalid");
                                        }
                                    }
                                }

                                function agregarCampoContacto() {
                                    var contenedor = document.getElementById('nuevosCamposContainer');
                                    var nuevoCampo = document.createElement('div');
                                    nuevoCampo.className = 'form-group row';
                                    nuevoCampo.innerHTML = `
                                        <label class="col-sm-3 col-form-label">*TIPO DE CONTACTO:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" Name="tipoContacto" id="tipoContacto"
                                                onchange="validarTipoContacto()" required>
                                                <option value="">SELECCIONE UN TIPO DE CONTACTO</option>
                                                <?php foreach ($resultadoContacto as $contacto): ?>
                                                    <option value="<?= $contacto['iIdConstante'] ?>">
                                                        [<?= $contacto['iClaveCatalogo'] ?>] - <?= $contacto['vchDescripcion'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label class="col-sm-3 col-form-label">*CONTACTO:</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="contacto" name="contacto[]" class="form-control"
                                                placeholder="CONTACTO" style="text-transform: uppercase">
                                        </div>
                                    `;

                                    // Agrega el nuevo campo
                                    contenedor.appendChild(nuevoCampo);
                                }

                                function validarNuevoTipoContacto(selectElement) {
                                    var nuevoTipoContacto = selectElement.value;
                                    console.log("Nuevo Tipo de Contacto seleccionado: " + nuevoTipoContacto);
                                    // Puedes realizar otras acciones de validación si es necesario
                                }
                            </script>

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