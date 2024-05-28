<?php
require_once('../../includes/pandora.php');
require_once('../../includes/load.php');
require_once('../altaPersona/FuncionesAltaEmpleado.php');


session_start();


if (isset($_SESSION['user_id'])) {
    // Si el usuario está autenticado, no se hace nada
} else {
    // Si el usuario no está autenticado, redireccionarlo a la página de inicio después de 0 segundos
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { window.location.href = "../../index.html"; }, 0);';
    echo '</script>';
}

$resultadoSede = ObtenerSede();
$resultadoPuesto = ObtenerPuesto();
$resultadoContratantes = ObtenerAutorizacionContratante();
$resultadoGenero = ObtenerIdGenero();
$resultadoNacionalidad = obtenerIdNacionalidad();
$_SESSION['RegimenUso'] = EjecutarRegimenUso();
$resultadoRegimen = ObtenerIdRegimen();


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
    <script src = "MostrarDatosEmpleado.js" ></script>
    <script src = "ProcesoModificacionEmpleado.js"> </script>

    <style>
        .selected {
            color: #007bff; /* Cambia este color por el que desees */
            font-weight: bold; /* O cualquier otro estilo que desees */

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
        .boton-intec-1 {
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
            z-index: 1; /* asegura que el texto esté sobre la imagen */

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
                                    <li><a href="#"><span class="ti-settings"></span><?php echo $herramientas; ?></a>
                                    </li>
                                    <li><a href="../../includes/logout.php"><span
                                                    class="ti-power-off"></span><?php echo $logout; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pestañas de navegación-->
                <div class="skill-and-profile">
                    <div class="skill" style="display: flex; justify-content: center;">
                        <label style="align-self: flex-end;" class="selected"><a
                                    href="DatosEmpleado.php">EMPLEADO</a></label>
                        <label style="align-self: flex-end;"><a href="../consulEmpleado/consultaPuesto.php ">PUESTO</a></label>
                        <label style="align-self: flex-end;"><a href="consultaDomicilio.php">DOMICILIO</a></label>
                        <label style="align-self: flex-end;"><a href="consultaContacto.php">CONTACTO</a></label>
                        <label style="align-self: flex-end;"><a
                                    href="../consulEmpleado/cunsultaDoctos.php">DOCUMENTOS</a></label>
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
                    <?php
                    if (isset($_POST['submitBuscar'])) {
                        $nombreaBuscar = $_POST['nombreaBuscar'];
                        echo "<br>El nombre a buscar es <b>$nombreaBuscar</b>";

                    if ($nombreaBuscar == '#') { ?>

                        <div style="background-color: #117a8b; text-align: center">
                            <?php echo "<i><span style='color: #ededee' size='-2'> $busquedaEncontradaTxt</span></i><br />"; ?>
                        </div>
                    <br>Aquí la lista de coincidencias


                    <?php } else { ?>

                        <div style="background-color: #c82333; text-align: center">
                            <?php echo "<i><span style='color: #ededee' size='-2'> $busquedaNoEncontradaTxt</span></i><br />"; ?>
                        </div>
                    <?php }
                    ?>
                    <?php
                    } else {
                    ?>
                        <script> document.addEventListener('DOMContentLoaded', ObtenerDatosEmpleado); </script>

                        <form action="#" method="post" class="dashboard-form">
                            <div id="information" class="row justify-content-center">
                                <div class="col-md-10">
                                    <label class="col-form-label"><i></i>

                                        <div class="update-photo">
                                            <img class="image" src="../../user-1.jpg" alt="">
                                        </div>
                                        <h6><i data-feather="user-check"></i>DATOS DE EMPLEADO</h6>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"> EXPEDIENTE EMPLEADO </label>
                                                <input id="idInput" type="text" class="form-control" placeholder="ID"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"> NOMBRE (S) </label>
                                                <input type="text" class="form-control" placeholder="NOMBRE"
                                                       id="vchNombre" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"> PRIMER APELLIDO </label>
                                                <input type="text" class="form-control" placeholder="PRIMER APELLIDO"
                                                       id="vchPrimerApellido" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"> SEGUNDO APELLIDO </label>
                                                <input type="text" class="form-control" placeholder="SEGUNDO APELLIDO"
                                                       id="vchSegundoApellido" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class=" col-form-label">CURP
                                                </label>
                                                <input type="text" class="form-control" placeholder="CURP" id="vchCURP"
                                                       disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">RFC</label>
                                                <input type="text" class="form-control" placeholder="RFC" id="vchRFC"
                                                       disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">FECHA
                                                    NACIMIENTO </label>
                                                <input type="text" class="form-control"
                                                       placeholder="FECHA DE NACIMIENTO" id="dFechaNacimiento"
                                                       disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">GENERO
                                                </label>
                                                <input type="text" class="form-control" placeholder="GENERO"
                                                       id="iIdGenero" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">NACIONALIDAD
                                                </label>
                                                <input type="text" class="form-control" placeholder="NACIONALIDAD"
                                                       id="iIdNacionalidad" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">REGIMEN
                                                    FISCAL </label>
                                                <input type="hidden" name="iIdRegimen" id="iIdRegimen" value="">
                                                <input type="text" class="form-control" placeholder=""
                                                       id="vchRegimen" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class=" col-form-label">USO
                                                    FISCAL </label>
                                                <input type="text" class="form-control" placeholder=""
                                                       id="vchUsoFiscal" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">C.P.
                                                    FISCAL </label>
                                                <input type="text" class="form-control" placeholder=""
                                                       id="iCodigoPostalFiscal" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"> PUESTO </label>
                                                <input type="text" class="form-control" placeholder="PUESTO"
                                                       id="vchPuesto" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"> FECHA DE INGRESO </label>
                                                <input type="text" class="form-control" placeholder="FECHA DE INGRESO"
                                                       id="dtFechaIngreso" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"> ESTATUS DE EMPLEADO </label>
                                                <input type="text" class="form-control" placeholder="ESTATUS"
                                                       id="iIdEstatusEmpleado" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="col-form-label"> NSS </label>
                                                <input type="text" class="form-control" placeholder="NSS" id="vchNSS"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="col-form-label">FECHA ULTIMA PROMOCION
                                                </label>
                                                <input type="text" class="form-control" placeholder="FECHA ULTIMA PROM."
                                                       id="dtFechaUltPromocion" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">SEDE </label>
                                                <input type="text" class="form-control" placeholder="SEDE"
                                                       id="iIdSedeForm"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="col-form-label">FECHA BAJA </label>
                                                <input type="text" class="form-control" id="dtFechaBaja" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">USUARIO ULTIMA
                                                    MODIFICACION</label>
                                                <input type="text" class="form-control"
                                                       placeholder="USUARIO ULTIMA MOD." id="vchUsuarioUltModificacion"
                                                       disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="col-form-label">FECHA ULTIMA
                                                    MODIFICACION</label>
                                                <input type="text" class="form-control" placeholder="FECHA ULTIMA MOD."
                                                       id="dtFechaUltModifEmpleado" disabled/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="candidate">
                                        <div class="body">
                                            <div class="row">
                                                <div class="row-left" id="buttonsModificar">
                                                    <a href="#" class="boton-intec" data-toggle="modal"
                                                       data-target="#apply-popup-id-1" id="buttonModificarEmpleado">MODIFICAR</a>
                                                    <a href="#" class="boton-intec" data-toggle="modal"
                                                       data-target="#apply-popup-id-2">BAJA EMPLEADO</a>
                                                    <a href="#" class="boton-intec" data-toggle="modal"
                                                       data-target="#apply-popup-id-3" id="buttonReactivacion">REACTIVACION</a>
                                                    <a href="#" class="boton-intec" data-toggle="modal"
                                                       data-target="#apply-popup-id-4"
                                                       id="buttonPromocion">PROMOCION</a>
                                                </div>
                                            </div>
                                            <script>
                                                document.getElementById('buttonModificarEmpleado').addEventListener('click', ModalModificarDatos);
                                                document.getElementById('buttonReactivacion').addEventListener('click', ModalReactivacion );
                                                document.getElementById('buttonPromocion').addEventListener('click',ModalPromocion );
                                            </script>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script> document.getElementById('buttonModificarEmpleado').addEventListener('click',  habilitarBotones); </script>
<script> document.addEventListener('DOMContentLoaded', variableGlobalEmpleado);</script>

<!-- inicio de modales -->
<div class="apply-popup">
    <!-- Botón Modificar -->
    <div class="modal fade" id="apply-popup-id-1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title"><i data-feather="edit"></i>CAMBIOS DATOS GENERALES DE EMPLEADO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <option value="">NSS</option>
                            <input type="tel" class="form-control" name="vchNSS" id="vchNSSModificar" maxlength="10"
                                   pattern="^[0-9]{10,}$" title="NSS INCORRECTO" style="text-transform: uppercase"
                                   placeholder="Ingrese su NSS">
                        </div>
                        <?php
                        // Calcular la fecha actual
                        $fechaActual = date('Y-m-d');

                        // Restar 18 años a la fecha actual
                        $fechaMinima = date('Y-m-d', strtotime('-2 years', strtotime($fechaActual)));

                        // Establecer la fecha máxima como la fecha actual
                        $fechaMaxima = $fechaActual;

                        // Establecer la fecha mínima como 1900-01-01 (opcional)
                        $fechaLimiteInferior = '1900-01-01';
                        ?>
                        <div class="form-group">
                            <option value="">FECHA DE INGRESO</option>
                            <input type="date" class="form-control" placeholder="FECHA DE INGRESO"
                                   name="fechaIngreso" id="dtFechaIngresoModificacion" pattern="\d{4}-\d{2}-\d{2}"
                                   title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)"
                                   min="<?php echo $fechaMinima; ?>" max="<?php echo $fechaMaxima; ?>" maxlength="10">
                        </div>
                        <div class="form-group">
                            <option value="">SEDE</option>
                            <input type="hidden" name="iIdConstanteSedeModificacion" id="iIdConstanteSedeModificacion" value="">
                            <input type="hidden" name="iClaveSedeModificacion" id="iClaveSedeModificacion" value="">
                            <select class="form-control" Name="iIdSede" id="iIdSedeModificar">
                                <?php foreach ($resultadoSede as $sede): ?>
                                    <option value="<?= $sede['iIdConstante'] . '-' . $sede['iClaveCatalogo'] ?>">
                                        [<?= $sede['iClaveCatalogo'] ?>] - <?= $sede['vchDescripcion'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <option value="">PERSONA QUE AUTORIZA CONTRATACIÓN</option>
                            <select class="form-control" Name="iIdPersonaContratante"
                                    id="iIdPersonaContratanteModificar">
                                <?php foreach ($resultadoContratantes as $contratante): ?>
                                    <option value="<?= $contratante['iIdPersona'] ?>">
                                        [<?= $contratante['iIdPersona'] ?>]
                                        - <?= $contratante['vchPrimerApellido'] . ' ' . $contratante['vchSegundoApellido'] . ' ' . $contratante['vchNombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <option value="">NOMBRE (S)</option>
                                <input type="text" class="form-control" placeholder="NOMBRE"
                                       id="vchNombreEmpleadoModificar" name="vchNombre"
                                       style="text-transform: uppercase">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <option value="">PRIMER APELLIDO</option>
                                <input type="text" class="form-control" placeholder="PRIMER APELLIDO"
                                       id="vchPrimerApellidoModificar" name="vchPrimerApellido"
                                       style="text-transform: uppercase">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <option value="">SEGUNDO APELLIDO</option>
                                <input type="text" class="form-control" placeholder="SEGUNDO APELLIDO"
                                       id="vchSegundoApellidoModificar" name="vchSegundoApellido"
                                       style="text-transform: uppercase">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <option value="">R.F.C</option>
                                <input type="text" class="form-control" placeholder="RFC" id="vchRFCModificar"
                                       name="vchRFC"
                                       style="text-transform: uppercase">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <option value="">CURP</option>
                                <input type="text" class="form-control" placeholder="CURP" id="vchCURPModificar"
                                       name="vchCURP"
                                       style="text-transform: uppercase">
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            // Calcular la fecha actual
                            $fechaActual = date('Y-m-d', strtotime('-18 years'));

                            // Restar 18 años a la fecha actual
                           // $fechaMinima = date('Y-m-d', strtotime('- 18 years', strtotime($fechaActual)));

                            // Establecer la fecha mínima como 1900-01-01 (opcional)
                            $fechaLimiteInferior = '1980-01-01';
                            ?>
                            <div class="form-group">
                                <option value="">FECHA DE NACIMIENTO</option>
                                <input type="date" class="form-control" placeholder="FECHA DE INGRESO"
                                       name="fechaIngreso" id="dtFechaNacimientoModificacion"
                                       pattern="\d{4}-\d{2}-\d{2}"
                                       title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)"
                                       min="<?php echo $fechaLimiteInferior; ?>" max="<?php echo $fechaActual; ?>"
                                       maxlength="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <option value="">GÉNERO</option>
                                <input type="hidden" name="iIdConstanteGeneroModificacion" id="iIdConstanteGeneroModificacion" value="">
                                <input type="hidden" name="iClaveGeneroModificacion" id="iClaveGeneroModificacion" value="">
                                <select class="form-control" name="genero" id="iIdGeneroModificar">
                                    <?php foreach ($resultadoGenero as $genero): ?>
                                        <option value="<?= $genero['iIdConstante'] . '-' . $genero['iClaveCatalogo'] ?>">
                                            [<?= $genero['iClaveCatalogo'] ?>] - <?= $genero['vchDescripcion'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <option value="">NACIONALIDAD</option>
                                <input type="hidden" name="iIdConstanteNacionalidadModificacion" id="iIdConstanteNacionalidadModificacion" value="">
                                <input type="hidden" name="iClaveNacionalidadModificacion" id="iClaveNacionalidadModificacion" value="">
                                <select class="form-control" name="nacionalidad" id="iIdNacionalidadModificar">
                                    <?php foreach ($resultadoNacionalidad as $nacionalidad): ?>
                                        <option value="<?= $nacionalidad['iIdConstante'] . '-' . $nacionalidad['iClaveCatalogo'] ?>">
                                            [<?= $nacionalidad['iClaveCatalogo'] ?>]
                                            - <?= $nacionalidad['vchDescripcion'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <option value="">RÉGIMEN FISCAL</option>
                                <select class="form-control" name="regimenFiscal" id="regimenFiscalModificar"
                                        onchange="cargarUsoFiscal()">
                                    <?php foreach ($resultadoRegimen as $regimen): ?>
                                        <option value="<?= $regimen['iRegimen'] ?>">
                                            [<?= $regimen['iRegimen'] ?>] - <?= $regimen['vchDescripcionRegimen'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <option value="">USO FISCAL</option>
                                <select class="form-control" name="usoFiscal" id="usoFiscalModificar">
                                    <option value="" selected class="form-control">SELECCIONA UN USO
                                        FISCAL
                                    </option>
                                </select>
                                <script>

                                    cargarUsoFiscal();

                                    function ObtenerUsosFiscales(regimenSeleccionado) {

                                        var datosUsosFiscales = <?php echo json_encode($_SESSION['RegimenUso']); ?>;
                                        var usosFiscales = [];

                                        for (var i = 0; i < datosUsosFiscales.length; i++) {
                                            if (datosUsosFiscales[i].iRegimen == regimenSeleccionado) {
                                                usosFiscales.push({
                                                    uso: datosUsosFiscales[i].vchClaveUso,
                                                    descripcion: datosUsosFiscales[i].vchDescripcionUso
                                                });
                                            }
                                        }
                                        return usosFiscales;
                                    }

                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="C.P. FISCAL"
                                       id="iIdCodigoPostalModificar" name="iCodigoPostalFiscal"
                                       style="text-transform: uppercase">
                            </div>
                        </div>
                        <div class="update-photo" style="position: relative;">
                            <label><img class="image" src="../../user-1.jpg" alt="">
                                <span class="edit-text">EDITAR IMAGEN</span>
                                <input for="up-cv" type="file" class="upload-input" id="up-cv" accept="image/*"
                                       style="display: none;" onchange="updateImage(this)">
                            </label>
                        </div>
                        <button class="button primary-bg btn-block" id="botonAplicarCambios" name="buttonsAplicar">APLICAR
                            CAMBIOS
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL DE BAJA DE EMPLEADO-->
<div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title"><i data-feather="edit"></i>APLICAR CAMBIOS BAJA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="dashboard-form" id="BajaEmpleado">
                        <?php
                        // Calcular la fecha actual
                        $fechaActual = date('Y-m-d');

                        // Restar 18 años a la fecha actual
                        $fechaMinima = date('Y-m-d', strtotime('-2 years', strtotime($fechaActual)));

                        // Establecer la fecha máxima como la fecha actual
                        $fechaMaxima = $fechaActual;

                        // Establecer la fecha mínima como 1900-01-01 (opcional)
                        $fechaLimiteInferior = '1900-01-01';
                        ?>
                        <div class="form-group">
                            <option value="">FECHA DE BAJA</option>
                            <input type="date" class="form-control" placeholder="FECHA DE BAJA" name="fechaIngreso"
                                   id="dtFechaBajaModificacion" pattern="\d{4}-\d{2}-\d{2}"
                                   title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)" required
                                   min="<?php echo $fechaMinima; ?>" max="<?php echo $fechaMaxima; ?>" maxlength="10"
                                   value="<?php echo date('Y-m-d'); ?>">
                        </div>

                        <button class="button primary-bg btn-block" id="botonAplicarBaja" name="buttonsAplicar">APLICAR
                            CAMBIOS
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal de reactivación-->
<div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title"><i data-feather="edit"></i>APLICAR CAMBIOS REACTIVACIÓN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <input type="hidden" name="iIdConstanteSede" id="iIdConstanteSedeReactivacion" value="">
                        <input type="hidden" name="iClaveSede" id="iClaveSedeReactivacion" value="">
                        <div class="form-group">
                            <option value="">NSS</option>
                            <input type="tel" class="form-control" name="vchNSS" id="vchNSSReactivacion" maxlength="10"
                                   pattern="^[0-9]{10,}$" title="NSS INCORRECTO" style="text-transform: uppercase"
                                   placeholder="Ingrese su NSS">
                        </div>

                        <?php
                        // Calcular la fecha actual
                        $fechaActual = date('Y-m-d');

                        // Restar 18 años a la fecha actual
                        $fechaMinima = date('Y-m-d', strtotime('-2 years', strtotime($fechaActual)));

                        // Establecer la fecha máxima como la fecha actual
                        $fechaMaxima = $fechaActual;

                        // Establecer la fecha mínima como 1900-01-01 (opcional)
                        $fechaLimiteInferior = '1900-01-01';
                        ?>
                        <div class="form-group">
                            <option value="">FECHA DE REINGRESO</option>
                            <input type="date" class="form-control" placeholder="FECHA DE REINGRESO"
                                   name="fechaReIngreso"
                                   id="dFechaReIngresoReactivacion" pattern="\d{4}-\d{2}-\d{2}"
                                   title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)"
                                   min="<?php echo $fechaMinima; ?>" max="<?php echo $fechaMaxima; ?>" maxlength="10"
                                   value="<?php echo date('Y-m-d'); ?>">
                        </div>


                        <div class="form-group">
                            <option value="">PUESTO</option>
                            <select id="iIdPuestoReactivacion" name="iIdPuesto" class="form-control"
                                    placeholder="INGRESE SU PUESTO" style="text-transform: uppercase">
                                <?php foreach ($resultadoPuesto as $puesto): ?>
                                    <option value="<?= $puesto['iIdPuesto'] ?>">
                                        <?= $puesto['vchPuesto'] ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <option value="">SEDE</option>
                            <select class="form-control" Name="iIdSede" id="idSedeReactivacion">
                                <?php foreach ($resultadoSede as $sede): ?>
                                    <option value="<?= $sede['iIdConstante'] . '-' . $sede['iClaveCatalogo'] ?>">
                                        [<?= $sede['iClaveCatalogo'] ?>] - <?= $sede['vchDescripcion'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <option value="">PERSONA QUE AUTORIZA CONTRATACIÓN</option>
                            <select class="form-control" Name="iIdPersonaContratante"
                                    id="iIdPersonaContratanteReactivacion">
                                <?php foreach ($resultadoContratantes as $contratante): ?>
                                    <option value="<?= $contratante['iIdPersona'] ?>">
                                        [<?= $contratante['iIdPersona'] ?>]
                                        - <?= $contratante['vchPrimerApellido'] . ' ' . $contratante['vchSegundoApellido'] . ' ' . $contratante['vchNombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button class="button primary-bg btn-block" id="buttonAplicarReactivacion">APLICAR CAMBIOS
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Modal de promoción--->
<div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title"><i data-feather="edit"></i>APLICAR CAMBIOS PROMOCIÓN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <input type="hidden" name="iIdConstanteSede" id="idConstanteSedePromocion" value="">
                        <input type="hidden" name="iClaveSede" id="iCveSedePromocion" value="">

                        <div class="form-group row">
                            <div class="col-sm-9">
                                <option value="">PUESTO</option>
                                <select class="form-control" Name="iIdPuesto" id="iIdPuestoPromocion">
                                    <?php foreach ($resultadoPuesto as $puesto): ?>
                                        <option value="<?= $puesto['iIdPuesto'] ?>">
                                            <?= $puesto['vchPuesto'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <option value="">NSS</option>
                            <input type="tel" class="form-control" name="vchNSS" id="vchNSSPromocion" maxlength="10"
                                   pattern="^[0-9]{10,}$" title="NSS INCORRECTO" style="text-transform: uppercase"
                                   placeholder="Ingrese su NSS">
                        </div>
                        <?php
                        // Calcular la fecha actual
                        $fechaActual = date('Y-m-d');

                        // Restar 18 años a la fecha actual
                        $fechaMinima = date('Y-m-d', strtotime('-2 years', strtotime($fechaActual)));

                        // Establecer la fecha máxima como la fecha actual
                        $fechaMaxima = $fechaActual;

                        // Establecer la fecha mínima como 1900-01-01 (opcional)
                        $fechaLimiteInferior = '1900-01-01';
                        ?>
                        <div class="form-group">
                            <option value="">FECHA DE PROMOCIÓN</option>
                            <input type="date" class="form-control" placeholder="FECHA DE INGRESO"
                                   name="fechaIngreso" id="dtFechaUltPromocionPr" pattern="\d{4}-\d{2}-\d{2}"
                                   title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)"
                                   min="<?php echo $fechaMinima; ?>" max="<?php echo $fechaMaxima; ?>" maxlength="10"
                                   value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="form-group">
                            <option value="">SEDE</option>
                            <select class="form-control" Name="iIdSede" id="idSedePromocion">
                                <?php foreach ($resultadoSede as $sede): ?>
                                    <option value="<?= $sede['iIdConstante'] . '-' . $sede['iClaveCatalogo'] ?>">
                                        [<?= $sede['iClaveCatalogo'] ?>] - <?= $sede['vchDescripcion'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button class="button primary-bg btn-block" id="buttonAplicarPromocion">APLICAR CAMBIOS</button>
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
<script src="MostrarDatosEmpleado.js"></script>
<script src="FuncionesEmpleado.js"></script>
<script src = "ProcesoModificacionEmpleado.js" ></script>

<script> document.getElementById('botonAplicarBaja').addEventListener('click', ValidarBaja); </script>
<script> document.getElementById('buttonAplicarReactivacion').addEventListener('click', ValidarReactivacion); </script>
<script> document.getElementById('buttonAplicarPromocion').addEventListener('click', ValidarPromocion); </script>
<script> deshabilitarBotones(); </script>

</body>

</html>