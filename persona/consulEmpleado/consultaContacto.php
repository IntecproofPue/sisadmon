<?php
session_start();
require_once('../../includes/pandora.php');
require_once('../../includes/load.php');

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

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirecciona a la página de inicio de sesión
    header("Location: ../../index.html");
    exit();
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

function ObtenerTipoContacto()
{
    if (isset($_SESSION['CatConstante'])) {
        $datosContacto = $_SESSION['CatConstante'];
        $contactoEncontrado = array();

        foreach ($datosContacto as $valorContacto) {
            if ($valorContacto['iAgrupador'] == 8) {
                $contactoEncontrado[] = $valorContacto;
            }
        }
        return $contactoEncontrado;
    } else {
        echo("No hay datos del Tipo de contacto");
    }
}

$resultadoContacto = ObtenerTipoContacto();

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
    <link rel="stylesheet" href="../../assets/css/themify-icons.css"/>
    <link rel="stylesheet" href="../../assets/css/et-line.css"/>
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css"/>
    <link rel="stylesheet" href="../../assets/css/plyr.css"/>
    <link rel="stylesheet" href="../../assets/css/flag.css"/>
    <link rel="stylesheet" href="../../assets/css/slick.css"/>
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="../../assets/css/jquery.nstSlider.min.css"/>

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

    <style>
        .selected {
            color: #007bff;
            /* Cambia este color por el que desees */
            font-weight: bold;
            /* O cualquier otro estilo que desees */

        }

        .row .col-md-4 {
            margin-top: -13px;
            margin-bottom: -13px;

        }

        .boton-intec {
            /* border: none;
                  color: black;
                  padding: 10px 20px;
                  cursor: pointer;
                  border-radius: 7px;*/
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: solid;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .boton-intec:hover {
            background-color: #0b7dda;
        }

        .boton-intec:active {
            background-color: #3e8e41;
        }

        /* width: 10%;
                background-color: navy;
                padding: 3px ;
                border-radius: 7px;
                color: navy;
                text-decoration: none;
                color: white;*/
        .update-photo {
            float: center;

        }

        .update-photo {
            position: relative;
            display: inline-block;
        }

        .edit-text {
            position: absolute;
            top: 5px;
            left: 5px;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1;
            /* asegura que el texto esté sobre la imagen */

        }

        .image {
            display: block;
            max-width: 100%;
        }

        input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .employer {
            margin-bottom: -30px;
            padding: 5px 20px;
        }

        .body {
            margin-bottom: -30px;
            padding: 5px 20px;
            margin-bottom: -10px;
            /*transform: scale(0.8); */
        }

        .candidate {
            padding: 5px;

        }

        .filtered-employer-wrapper .employer {
            margin-bottom: -5px;
        }
    </style>

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
                    <?php

                    $user = obtenerUsuario($_SESSION['user_id']);
                    $row = $GLOBALS['rowObtenerNombre'];
                    $nombrePersona = $row['nombrePersona'];
                    $emailPersona = $row['contacto'];

                    ?>

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
                                    <li><a href="#"><span class="ti-settings"></span><?php echo $herramientas; ?></a>
                                    </li>
                                    <li><a href="../../includes/logout.php"><span
                                                    class="ti-power-off"></span><?php echo $logout; ?></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pestañas de navegación-->
                <div class="skill-and-profile">
                    <div class="skill" style="display: flex; justify-content: center;">
                        <label style="align-self: flex-end;"><a href="DatosEmpleado.php">EMPLEADO</a></label>
                        <label style="align-self: flex-end;"><a href="../consulEmpleado/consultaPuesto.php ">PUESTO</a></label>
                        <label style="align-self: flex-end;"><a href="consultaDomicilio.php">DOMICILIO</a></label>
                        <label style="align-self: flex-end;" class="selected"><a
                                    href="consultaContacto.php">CONTACTO</a></label>
                        <label style="align-self: flex-end;"><a
                                    href="../consulEmpleado/consultaDoctos.php">DOCUMENTOS</a></label>
                    </div>
                </div>
                <!-- fin de pestañas de navegación-->
            </div>
        </div>
    </div>
</header>


<!-- Contenido de la página -->
<div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
        <div class="row justify-content-center">
            <div class="col">
                <div class="post-content-wrapper">
                    <form action="consultaContacto" method="post" class="dashboard-form">
                        <div id="information" class="row justify-content-center">
                            <div class="col-md-12">

                                <div class="alice-bg padding-top-10 padding-buttom-10">
                                    <div class="conteiner">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <h6><i data-feather="user-check"></i>INFORMACION DE CONTACTO</h6>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="breadcrumb-form"
                                                     style="display: flex; justify-content: flex-end;">
                                                    <div class="body">
                                                        <a href="#" class="boton-intec" data-toggle="modal"
                                                           data-target="#apply-popup-id-1"
                                                           style="display:none;" id="buttonAgregar">AGREGAR NUEVO</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- INICIO DE TITULOS -->
                                <div class="employer">
                                    <div class="body">
                                        <div class="col-md-4">
                                            <div class="form-group">

                                                <label class="col-form-label">TIPO DE CONTACTO</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-form-label"> CONTACTO </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-form-label">USUARIO ULTIMA MODIFICACION</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label class="col-form-label">FECHA ULTIMA MODIFICACION</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="filtered-employer-wrapper" id="agregaContacto"></div>


                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validarTipoContacto() {
        var tipoContacto = document.getElementById("tipoContactoAgregar").value;
        var contactoInput = document.getElementById("vchContactoAgregar");

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
        var tipoContacto = document.getElementById("tipoContactoAgregar").value;
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

</script>

<div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 800px; height: auto; padding: 50px;">
                <div class="modal-header">
                    <h5 class="modal-title"><i data-feather="edit"></i>INFORMACION DE CONTACTO</h5>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <!-- Contenido existente aquí -->
                        <div class="row">
                            <a class="boton-intec" href="#" id="buttonGuardarContacto">AGREGAR</a>
                            <button class="boton-intec ml-2" id="buttonGuardarTodo">GUARDAR TODO</button>
                        </div>
                    </form>
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

<script>

    document.addEventListener('DOMContentLoaded', function () {

        var datosContacto = localStorage.getItem('datosConsultaIndividual');
        var bResultadoContacto = JSON.parse(datosContacto);
        var iIdPersonaContacto = bResultadoContacto.iIdPersona;

        var datosContactos = new XMLHttpRequest();

        datosContactos.open('POST', 'prcConsultaContacto.php', true);

        var formData = new URLSearchParams();
        formData.append('iIdPersonaContacto', iIdPersonaContacto);

        datosContactos.send(formData);

        datosContactos.onload = function () {
            if (datosContactos.status === 200) {
                var respuesta = JSON.parse(datosContactos.responseText);

                if (respuesta[0].bResultado === 1) {
                    localStorage.setItem('datosConsultaContacto', JSON.stringify(respuesta));

                    var datosContactoConsulta = localStorage.getItem('datosConsultaContacto');

                    if (datosContactoConsulta) {
                        var bResultado = JSON.parse(datosContactoConsulta);

                        let longitudContacto = bResultado.length;

                        insertarContactos(longitudContacto);

                        for (var i = 0; i < bResultado.length; i++) {
                            var iIdContacto = 'iIdContacto' + i;
                            var iIdTipoContacto = 'vchTipoContacto' + i;
                            var vchContacto = 'vchContacto' + i;
                            var iIdUsuarioUlt = 'ilUsuarioUltModificacion' + i;
                            var fechaUltModif = 'dtFechaUltModificacion' + i;

                            var iIdContacto = document.getElementById(iIdContacto);
                            iIdContacto.value = bResultado[i].iIdPersonasContactos || 0;

                            var vchTipoContactoForm = document.getElementById(iIdTipoContacto);
                            vchTipoContactoForm.value = bResultado[i].vchTipoContacto || '';

                            var vchContactoForm = document.getElementById(vchContacto);
                            vchContactoForm.value = bResultado[i].vchContacto;

                            var vchUsuarioForm = document.getElementById(iIdUsuarioUlt);
                            vchUsuarioForm.value = bResultado[i].vchUsuarioUltModif;


                            var dFechaUltModifOriginal = bResultado[i].dtFechaUltModificacion.date;
                            var fechaModif = new Date(dFechaUltModifOriginal);
                            var fechaModifFinal = fechaModif.toLocaleString('es-ES', {
                                day: '2-digit',
                                month: '2-digit',
                                year: 'numeric',
                                hour: '2-digit',
                                minute: '2-digit',
                                second: '2-digit',
                                hour12: false
                            });
                            var dFechaModificacion = document.getElementById(fechaUltModif);
                            dFechaModificacion.value = fechaModifFinal

                        }
                    }
                }
            }
        }
    });


    function insertarContactos(longitudContacto) {
        var contenedor = document.getElementById('agregaContacto');
        contenedor.innerHTML = agregarListaContactos(longitudContacto);


        var selector = `[id^='buttonBaja']`;

        var selectorAgregar = '#buttonAgregar';

        var contactoSeleccionado = [];

        document.querySelectorAll(selector).forEach((button) => {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                var indexStr = this.id.replace('buttonBaja', '');
                var indexInt = parseInt(indexStr, 10);


                if (isNaN(indexInt)) {
                    console.error('Índice inválido', indexInt);
                    return;
                }

                var registro = document.querySelector(`.candidate:nth-child(${indexInt + 1})`);

                if (!registro){
                    console.error ("No hay ningún registro");
                    return;
                }

                var iIdContactoSeleccionado = registro.querySelector('#iIdContacto' + indexInt).value;

                contactoSeleccionado.push({
                    idContacto: iIdContactoSeleccionado
                });


                console.log("Esto es el id del contacto: ", iIdContactoSeleccionado);

                console.log(contactoSeleccionado);

                localStorage.setItem('modificarContacto', 'true');

                registro.style.display = 'none';

                var botonAgregar = document.querySelector(selectorAgregar);
                if (botonAgregar) {
                    botonAgregar.style.display = 'block';
                }

                try {
                    console.log("Array de objetos: ", contactoSeleccionado);
                    localStorage.setItem('contactosSeleccionados', JSON.stringify(contactoSeleccionado));
                    console.log("Todos los contactos seleccionados almacenados en localStorage:", contactoSeleccionado);
                } catch (error) {
                    console.error("Error al guardar en localStorage:", error);
                }

            });
        });

    }

    function agregarListaContactos(longitudContacto) {
        var contacto = '';
        for (var i = 0; i < longitudContacto; i++) {
            contacto += `
        <div class="candidate">
          <div class="employer">
              <div class="body">
                  <input id="iIdContacto${i}" type="hidden">
              <div class="col-md-4">
                <div class="form-group">
                  <input id="vchTipoContacto${i}" type="text" class="form-control" placeholder="TIPO CONTACTO" disabled>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <input id="vchContacto${i}" class="form-control" name="tipoContacto" placeholder="CONTACTO" disabled>
                </div>
              </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" class="form-control" id="ilUsuarioUltModificacion${i}"
                      name="ilUsuarioUltModificacion" placeholder="USER ULT MODIF." style="text-transform: uppercase"
                      disabled>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="##/##/####" id="dtFechaUltModificacion${i}"
                      name="dtFechaUltModificacion" style="text-transform: uppercase" disabled>
                  </div>
                </div>

             <div class="boton-intec${i}">
                
      <img id="buttonBaja${i}" src="../../trash-can_38501.png" style="width: 50px; height: auto; display: none;" >
 
          </div>
        
      </div>
    </div>
  </div>
          `;
        }
        return contacto;
    }


</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log(localStorage.getItem('habilitarBotones'));
        if (localStorage.getItem('habilitarBotones') === 'true') {
            const habilitarBotonDomicilio = document.querySelectorAll('.boton-intec');
            habilitarBotonDomicilio.forEach(boton => {
                boton.disabled = false;
                boton.style.display = 'block';
            });
        }


        const container = document.getElementById('agregaContacto');

        const observerCallback = (mutationsList, observer) => {

            mutationsList.forEach((mutation) => {
                if (mutation.type === 'childList') {

                    var bTamanioContacto = localStorage.getItem('datosConsultaContacto');
                    var tamanioFinal = bTamanioContacto ? bTamanioContacto.length : 0;

                    for (var i = 0; i < tamanioFinal; i++) {
                        const habilitarIconoModificar = document.getElementById(`buttonBaja${i}`);

                        if (habilitarIconoModificar !== null && localStorage.getItem('habilitarBotones') === 'true') {
                            habilitarIconoModificar.style.display = 'block';
                        }
                    }

                }
            });
        };

        // Declaración de 'observer' fuera de la función de callback
        const observer = new MutationObserver((observerCallback));
        observer.observe(document.documentElement, {childList: true, subtree: true});


    });

    // Función para agregar el contenido a la modal
    function agregarContenidoModal(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del botón

        // Crear el nuevo contenido
        var nuevoContenido = `
        
        <div class="modal-body">
            <form action="#" onsubmit = "guardarDatosContacto()">
                <div class="row">

                    <div class="col-md-7">
                        <div class="form-group">
                            <input type="hidden" name="iIdConstanteContacto" id="iIdConstanteContacto" value="" />
                            <input type="hidden" name="iClaveContacto" id="iClaveContacto" value="" />
                            <input type="hidden" name="iIdPersonaContacto" id="iIdPersonaContacto" value="" />

                            <label class="col-form-label">TIPO CONTACTO</label>
                            <select class="form-control" name="tipoContacto" id="tipoContactoAgregar"
                                onchange="validarTipoContacto()" required>
                                <option value="">SELECCIONE UN TIPO DE CONTACTO</option>
                                <?php foreach ($resultadoContacto as $contacto): ?>
                                    <option value="<?= $contacto['iIdConstante'] . '-' . $contacto['iClaveCatalogo'] ?>">
                                        [<?= $contacto['iClaveCatalogo'] ?>] - <?= $contacto['vchDescripcion'] ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="col-form-label">CONTACTO</label>
                            <input id="vchContactoAgregar" class="form-control" name="tipoContacto" placeholder="CONTACTO"
                                required />
                        </div>
                    </div>
                </div>
                </div>
                </div>
        <!-- Fin del nuevo contenido -->
    `;

        // Obtener referencia al cuerpo de la modal
        var modalBody = document.querySelector('.modal-body');

        // Insertar el nuevo contenido al final del cuerpo de la modal
        modalBody.insertAdjacentHTML('beforeend', nuevoContenido);
    }

    function guardarDatosContacto() {
        event.preventDefault;
        var iIdConstanteContacto = document.getElementById('iIdConstanteContacto').value;
        var iClaveContacto = document.getElementById('iClaveContacto').value;
        var iIdPersonaContacto = document.getElementById('iIdPersonaContacto').value;
        var tipoContacto = document.getElementById('tipoContactoAgregar').value;
        var vchContactoAgregar = document.getElementById('vchContactoAgregar').value;


        var datosContactoCapturados = {
            iIdConstanteContacto: iIdConstanteContacto,
            iClaveContacto: iClaveContacto,
            iIdPersonaContacto: iIdPersonaContacto,
            tipoContacto: tipoContacto,
            vchContactoAgregar: vchContactoAgregar
        };

        var datosLocalStorage = JSON.stringify(datosContactoCapturados);

        localStorage.setItem('datosContactoAgregar', datosLocalStorage);


    }


    // Obtener referencia al botón "AGREGAR"
    var botonAgregar = document.getElementById('buttonGuardarContacto');

    // Agregar evento click al botón "AGREGAR" y pasar el evento como argumento a la función agregarContenidoModal
    botonAgregar.addEventListener('click', function (event) {
        agregarContenidoModal(event);
    });

    var botonGuardarTodo = document.getElementById('buttonGuardarTodo');

    // Agregar evento click al botón "GUARDAR TODO" y llamar a la función guardarDatosLocalStorage
    botonGuardarTodo.addEventListener('click', guardarDatosContacto);

    // Obtener referencia al botón de cerrar la modal
    var botonCerrarModal = document.querySelector('.modal-header .close');

    // Agregar evento click al botón de cerrar la modal para cerrarla manualmente
    botonCerrarModal.addEventListener('click', function () {
        var modal = document.getElementById('apply-popup-id-1');
        $(modal).modal('hide');
    });

</script>

</body>


</html>