<?php
require_once ('../../includes/pandora.php');
require_once ('../../includes/load.php');
require_once ('../../includes/functions.php');

session_start();
function ObtenerTipoContratacion()
{
    if (isset($_SESSION['CatConstante'])) {
        $datosTipoContratacion = $_SESSION['CatConstante'];
        $contratacionEncontrada = array();

        foreach ($datosTipoContratacion as $valorContratacion) {
            if ($valorContratacion['iAgrupador'] == 1) {
                $contratacionEncontrada[] = $valorContratacion;
            }
        }
        return $contratacionEncontrada;
    } else {
        echo ("No hay datos del Tipo de Contratación");
    }
}

$resultadoContratacion = ObtenerTipoContratacion();


function ObtenerHorasLaborales()
{
    if (isset($_SESSION['CatConstante'])) {
        $datosHorasLaborales = $_SESSION['CatConstante'];
        $horasLaboralesEncontradas = array();

        foreach ($datosHorasLaborales as $valorHorasLaborales) {
            if ($valorHorasLaborales['iAgrupador'] == 2) {
                $horasLaboralesEncontradas[] = $valorHorasLaborales;
            }
        }
        return $horasLaboralesEncontradas;
    } else {
        echo ("No hay datos de las horas laborales");
    }
}

$resultadoHorasLaborales = ObtenerHorasLaborales();


function ObtenerNivel()
{
    if (isset($_SESSION['CatConstante'])) {
        $datosNivel = $_SESSION['CatConstante'];
        $nivelesEncontrados = array();

        foreach ($datosNivel as $valorNivel) {
            if ($valorNivel['iAgrupador'] == 22) {
                $nivelesEncontrados[] = $valorNivel;
            }
        }
        return $nivelesEncontrados;
    } else {
        echo ("No hay datos de las horas laborales");
    }
}

$resultadoNiveles = ObtenerNivel();


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

    <style>
        .campo-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .campo-item {
            margin-right: 10px;
            cursor: pointer;
        }

        .table-like {
            display: table;
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            /* borde de la "tabla" */

            border-radius: 5px;
            /* bordes redondeados */

            margin-bottom: 20px;
            /* espacio inferior */

        }

        .table-like-header {
            display: table-row;
            background-color: #f5f5f5;
            /* color de fondo del encabezado */
            font-weight: bold;
            /* texto en negrita */

        }

        .table-like-header>div {
            display: table-cell;
            padding: 8px 10px;
            /* Espacio interno */
            border-bottom: 1px solid #ddd;
            /* Borde inferior de las celdas del encabezado */

        }

        .table-like-row {
            display: table-row;
        }

        .table-like-row>div {
            display: table-cell;
            padding: 8px 10px;
            /* Espacio interno */
            border-bottom: 1px solid #ddd;
            /* Borde inferior de las celdas */

        }
    </style>

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
                                        <a href="../home-2.html" class="notification-list">
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
                                        <li><a href="../includes/load.php"><span
                                                    class="ti-power-off"></span><?php echo $logout; ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pestañas de navegación
                    <div class="skill-and-profile">
                        <div class="skill" style="display: flex; justify-content: center;">
                            <label style="align-self: flex-end;" class="selected"><a href="#">ALTA INVENTARIO</a></label>
                            <label style="align-self: flex-end;"><a href="../consulEmpleado/consultaPuesto.php ">PUESTO</a></label>
                            <label style="align-self: flex-end;"><a href="consultaDomicilio.php">DOMICILIO</a></label>
                            <label style="align-self: flex-end;"><a href="consultaContacto.php">CONTACTO</a></label>
                            <label style="align-self: flex-end;"><a href="../consulEmpleado/cunsultaDoctos.php">DOCUMENTOS</a></label>
                        </div>
                    </div>
                     fin de pestañas de navegación-->
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
                        <a>
                            <h1>CONSULTA PUESTO</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contenido de la página -->
    <div class="alice-bg section-padding-bottom" id="dashboardSection">
        <div class="container ">
            <div class="row ">
                <div class="col">
                    <div class="dashboard-container">
                        <div class="dashboard-content-wrapper">

                            <form class="dashboard-form" id="FormConsulta">
                                <div class="dashboard-section basic-info-input">
                                    <h4><i data-feather="user-check"></i>BUSQUEDA</h4>

                                    <div class="form-group">
                                        <div class="col-md-6 col-form-label text-left">
                                            <label for="#">PUESTO ASIGNADO</label>
                                        </div>

                                        <div class="col-md-6 col-form-label text-left">
                                            <input type="text" class="col-md-6 form-control" id="ildPuesto"
                                                placeholder="ID PERSONA" style="text-transform: uppercase">
                                        </div>

                                        <div class="col-md-6 col-form-label text-left">
                                            <input type="text" class="col-md-6 form-control" id="vchPuesto"
                                                placeholder="PERSONA ASIGNADA" style="text-transform: uppercase">
                                        </div>

                                        <div class="col-md-6 col-form-label text-left">
                                            <option value="">TIPO DE LA CONTRATACIÓN</option>
                                            <select class="col-md-6 form-control" Name="iIdPersonaContratante"
                                                id="iIdPersonaContratacion">
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
                                </div>

                                <div class="candidate">
                                    <div class="body">

                                        <div class="row-left">
                                            <button type="button" class="boton-intec" id="buttonBuscar">BUSCAR</button>
                                            <button type="reset" class="boton-intec" id="buttonLimpiar">LIMPIAR</button>
                                        </div>


                                        <!--<div class="row-left">
                                            <a href="#" class="boton-intec" data-toggle="modal"
                                                data-target="#apply-popup-id-1">MOVIMIENTOS</a>
                                        </div>-->
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- inicio de modales -->
    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 900px; height: auto; padding: 50px;">

                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>MOVIMIENTOS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="dashboard-form" id="#">
                            <div class="col-md-14">
                                <div class="row">

                                    <div class="table-like">
                                        <div class="table-like-header">
                                            <div>MOVIMIENTO</div>
                                            <div>DESCRIPCION</div>
                                            <div>OBSERVACIONES</div>
                                            <div>N°OPERACION</div>
                                            <div>USUARIO ULTIMA MODIFICACION</div>
                                            <div>FECHA ULTIMA MODIFICACION</div>
                                        </div>
                                        <div class="table-like-row">
                                            <div>Dato 1</div>
                                            <div>Dato 2</div>
                                            <div>Dato 3</div>
                                            <div>Dato 4</div>
                                            <div>Dato 5</div>
                                            <div>Dato 6</div>
                                        </div>
                                        <div class="table-like-row">
                                            <div>Dato 7</div>
                                            <div>Dato 8</div>
                                            <div>Dato 9</div>
                                            <div>Dato 10</div>
                                            <div>Dato 11</div>
                                            <div>Dato 12</div>
                                        </div>
                                        <!-- Puedes agregar más filas según sea necesario -->
                                    </div>


                                    <script>
                                        document.getElementById('buttonGuardarContacto').addEventListener('click', validarContactoNuevo);
                                    </script>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fianal de modales -->


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
    <script src="../../assets/js/html5-simple-date-input-polyfill.min.js"></script>

    <script src="../../js/custom.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="../../js/map.js"></script>


</body>

</html>