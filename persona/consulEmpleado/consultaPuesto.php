<?php
require_once ('../../includes/pandora.php');
require_once ('../../includes/load.php');

session_start();
function ObtenerEstadoProcedencia()
{
    if (isset($_SESSION['CatConstante'])) {
        $datosEdoProcedencia = $_SESSION['CatConstante'];
        $estadoEncontrado = array();

        foreach ($datosEdoProcedencia as $valorEstado) {
            if ($valorEstado['iAgrupador'] == 4) {
                $estadoEncontrado[] = $valorEstado;
            }
        }
        return $estadoEncontrado;
    } else {
        echo ("No hay datos del Estado de Procedencia");
    }
}

$resultadoEstado = ObtenerEstadoProcedencia();


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
    </style>

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
                                    <span>Notificaciones</span>
                                    <a href="#">Marcar todo como leido</a>
                                </div>
                                <div class="notification-body">
                                    <a href="../../home-2.html" class="notification-list">
                                        <i class="fas fa-bolt"></i>
                                        <p>Tu CV actualizado</p>
                                        <span class="time">5 hours ago</span>
                                    </a>
                                    <a href="#" class="notification-list">
                                        <i class="fas fa-arrow-circle-down"></i>
                                        <p>Alguien descargo tu CV</p>
                                        <span class="time">11 hours ago</span>
                                    </a>
                                    <a href="#" class="notification-list">
                                        <i class="fas fa-check-square"></i>
                                        <p>solicitaste un puesto de.... <span>@homeland</span></p>
                                        <span class="time">11 hours ago</span>
                                    </a>
                                    <a href="#" class="notification-list">
                                        <i class="fas fa-user"></i>
                                        <p>Cambiaste la contraseña</p>
                                        <span class="time">5 hours ago</span>
                                    </a>
                                    <a href="#" class="notification-list">
                                        <i class="fas fa-arrow-circle-down"></i>
                                        <p>Alguien descargo tu CV</p>
                                        <span class="time">11 hours ago</span>
                                    </a>
                                </div>
                                <div class="notification-footer">
                                    <a href="#">Ver Notificaciones</a>
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
                                                    class="ti-settings"></span><?php echo $herramientas; ?></a></li>
                                    <li><a href="../../includes/logout.php"><span
                                                    class="ti-power-off"></span><?php echo $logout; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="skill-and-profile">
                    <div class="skill" style="display: flex; justify-content: center;">
                        <label style="align-self: flex-end;"><a href="DatosEmpleado.php">EMPLEADO</a></label>
                        <label style="align-self: flex-end;" class="selected"><a
                                href="../consulEmpleado/consultaPuesto.php ">PUESTO</a></label>
                        <label style="align-self: flex-end;"><a href="consultaDomicilio.php">DOMICILIO</a></label>
                        <label style="align-self: flex-end;"><a href="consultaContacto.php">CONTACTO</a></label>
                        <label style="align-self: flex-end;"><a href="consultaDoctos.php">DOCUMENTOS</a></label>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        var DatosPuesto = localStorage.getItem('datosConsultaIndividual');

        var bResultadoPuesto = JSON.parse(DatosPuesto);
        var iIdEmpleadoPuesto = bResultadoPuesto.iIdPuesto;


        var datosPuesto = new XMLHttpRequest();

        datosPuesto.open('POST', 'prcConsultaPuesto.php', true);

        var formData = new URLSearchParams();
        formData.append('iIdPuesto', iIdEmpleadoPuesto);

        datosPuesto.send(formData);

        datosPuesto.onload = function () {
            if (datosPuesto.status === 200) {
                var respuesta = JSON.parse(datosPuesto.responseText);

                if (respuesta.bResultado === 1) {

                    localStorage.setItem('datosConsultaPuesto', JSON.stringify(respuesta));

                    var datosPuestoConsulta = localStorage.getItem('datosConsultaPuesto', JSON.stringify(respuesta))

                    if (datosPuestoConsulta) {
                        var bResultado = JSON.parse(datosPuestoConsulta);

                        var iIdPuesto = document.getElementById('iIdPuesto');
                        iIdPuesto.value = bResultado.iIdPuesto || 0;

                        var vchPuesto = document.getElementById('vchPuesto');
                        vchPuesto.value = bResultado.vchPuesto || '';

                        var vchDescripcionPuesto = document.getElementById('vchDescripcionPuesto');
                        vchDescripcionPuesto.value = bResultado.vchDescripcion || '';

                        var vchTipoContratacion = document.getElementById('vchTipoContratacion');
                        vchTipoContratacion.value = bResultado.vchTipoContratacion || '';

                        var vchHorasLaborales = document.getElementById('vchHorasLaborales');
                        vchHorasLaborales.value = bResultado.vchHorasLaborales || '';


                        const pesoFinal = new Intl.NumberFormat('es-MX', {
                            style: 'currency',
                            currency: 'MXN',
                            minimumFractionDigits: 2
                        });

                        var mSalarioNeto = document.getElementById('mSalarioNeto');
                        mSalarioNeto.value = pesoFinal.format(bResultado.mSalarioNeto) || 0;

                        var mSalarioFiscal = document.getElementById('mSalarioFiscal');
                        mSalarioFiscal.value = pesoFinal.format(bResultado.mSalarioFiscal) || 0;

                        var mSalarioComplementario = document.getElementById('mSalarioComplementario');
                        mSalarioComplementario.value = pesoFinal.format(bResultado.mSalarioComplemento) || 0;
                    }

                } else {
                    console.error("Mensaje Error: " + respuesta.vchMensaje);
                    alert(respuesta.vchMensaje)
                }
            } else {
                console.error("Error en la solicitud al servidor");
            }
        };
    });
</script>


<!-- Contenido de la página -->
<div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
        <div class="row justify-content-center">
            <div class="col">
                <div class="post-content-wrapper">
                    <form action="altaPersona" method="post" class="dashboard-form">
                        <div id="information" class="row justify-content-center">
                            <div class="col-md-10">
                                <label class="col-form-label">
                                    <h6><i data-feather="user-check"></i>INFORMACION DE PUESTO</h6>
                                </label>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">ID PUESTO: </label>
                                            <input id="iIdPuesto" type="text" class="form-control"
                                                   placeholder="NOMBRE DE PUESTO" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">NOMBRE PUESTO: </label>
                                            <input id="vchPuesto" type="text" class="form-control"
                                                   placeholder="NOMBRE DE PUESTO" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">DESCRIPCION DE PUESTO: </label>
                                            <input id="vchDescripcionPuesto" type="text" class="form-control"
                                                   placeholder="DESCRIPCION DEL PUESTO" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">TIPO DE CONTRATACIÓN: </label>
                                            <input id="vchTipoContratacion" type="text" class="form-control"
                                                   placeholder="DESCRIPCION DEL PUESTO" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label"> HORAS LABORALES: </label>
                                            <input id="vchHorasLaborales" type="text" class="form-control"
                                                   placeholder="HORAS LABORALES" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label"> SALARIO NETO: </label>
                                            <input id="mSalarioNeto" type="text" class="form-control"
                                                   placeholder="SALARIO NETO" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label"> SALARIO FISCAL: </label>
                                            <input id="mSalarioFiscal" type="text" class="form-control"
                                                   placeholder="SALARIO FISCAL" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label"> SALARIO COMPLEMENTARIO: </label>
                                            <input id="mSalarioComplementario" type="text" class="form-control"
                                                   placeholder="SALARIO COMPLEMENTARIO" disabled>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin de Contenido de página -->

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
</body>

</html>