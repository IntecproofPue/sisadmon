<?php
require_once ('../includes/pandora.php');
require_once ('../includes/load.php');
require_once ('../includes/sql.php');
require_once ('FuncionesInventario.php');



$resultadoProducto = ObtenerTipoProducto();
$resultadoTipoSubproducto = ObtenerTipoSubproducto();
$resultadoMarcas = ObtenerMarca();
$resultadoTipoAsignacion = ObtenerTipoAsignacion();





?>

<!doctype html>
<html lang="en">

<head>
    <!-- disabled meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?php echo $tituloPagina; ?>
    </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css" />
    <link rel="stylesheet" href="../assets/css/et-line.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="../assets/css/plyr.css" />
    <link rel="stylesheet" href="../assets/css/flag.css" />
    <link rel="stylesheet" href="../assets/css/slick.css" />
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../assets/css/jquery.nstSlider.min.css" />

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

    <script type="text/JavaScript" src="../includes/pandora.js"></script>

</head>

<body>

    <header class="header-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header-top">
                        <div class="logo-area">
                            <a href="../inicio.php"><img src="../images/logo-2.png" alt=""></a>
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
                                            <img src="../images/account/thumb-1.jpg" class="img-fluid" alt="">
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

    <!-- Breadcrumb-->
    <div class="alice-bg padding-top-30 padding-bottom-30">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="breadcrumb-area">
                        <label class="col-form-label"><i></i>
                            <h4><i data-feather="plus-circle"></i>CONSULTA DE INVENTARIO</h4>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb End -->

    <!-- Contenido de la página -->
    <div class="alice-bg section-padding-bottom">
        <div class="container no-gliters">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="post-content-wrapper">

                        <form action="#" method="post" class="dashboard-form">

                            <div id="information" class="row justify-content-center">

                                <input type="hidden" name="iIdConstanteContacto" id="iIdConstanteContacto" value="">
                                <input type="hidden" name="iClaveContacto" id="iClaveContacto" value="">


                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">TIPO DE PRODUCTO:</label>
                                                <input type="text" class="form-control" placeholder="TIPO DE PRODUCTO"
                                                    Name="iIdtipoProducto" id="iIdtipoProducto" disabled>
                                                </input>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">TIPO DE SUBPRODUCTO:</label>
                                                <input type="text" class="form-control" Name="iIdTipoSubproducto"
                                                    id="iIdTipoSubproducto" placeholder="TIPO DE SUBPRODUCTO" disabled>
                                                </input>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">MARCA</label>
                                                <input type="text" class="form-control" placeholder="MARCA"
                                                    Name="iIdMarca" id="iIdMarca" disabled>
                                                </input>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">MODELO</label>
                                                <input type="text" id="vchModelo" class="form-control"
                                                    placeholder="MODELO" name="vchModelo" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">SERIE</label>
                                                <input type="text" id="vchSerie" class="form-control"
                                                    placeholder="SERIE" name="vchSerie" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">ESTATUS</label>
                                                <input type="text" id="iIdEstatus" class="form-control"
                                                    placeholder="ESTATUS" name="iIdEstatus" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">TIPO DE MOVIMIENTO</label>
                                                <input type="text" id="iIdTipoMovto" class="form-control"
                                                    placeholder="TIPO DE MOVIMIENTO" name="iIdTipoMovto" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">SELECCIONE UN TIPO DE ASIGNACION</label>
                                                <input type="text" class="form-control" Name="iIdTipoAsignacion"
                                                    id="iIdTipoAsignacion"
                                                    placeholder="SELECCIONE UN TIPO DE ASIGNACION" disabled>
                                                </input>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">ASIGNADO A</label>
                                                <input type="text" id="iIdAsignadoA" class="form-control"
                                                    placeholder="ASIGNADO A" name="iIdAsignadoA" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">PROYECTO ASIGNADO</label>
                                                <input type="text" id="iIdProyectoAsignado" class="form-control"
                                                    placeholder="PROYECTO ASIGNADO" name="iIdProyectoAsignado" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">FECHA DE INGRESO</label>
                                                <input type="text" id="dFechaIngreso" class="form-control"
                                                    placeholder="FECHA DE NACIMIENTO" name="FechaIngreso"
                                                    name="dFechaIngreso" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">USUARIO DE ULTIMA MODIFICACION</label>
                                                <input type="text" id="iidUsuarioUltModificacion" class="form-control"
                                                    placeholder="USUARIO DE ULTIMA MODIFICACION"
                                                    name="iidUsuarioUltModificacion" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">FECHA DE ULTIMA MODIFICACION</label>
                                                <input type="text" id="dtFechaUltModificacion" class="form-control"
                                                    placeholder="FECHA DE ULTIMA MODIFICACION"
                                                    name="dtFechaUltModificacion" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">N° DE OPERACION</label>
                                                <input type="text" id="iNoOperacion" class="form-control"
                                                    placeholder="N° DE OPERACION" name="iNoOperacion" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">FECHA DE BAJA</label>
                                                <input type="text" class="form-control" id="dFechaBaja"
                                                    placeholder="FECHA DE BAJA" name="dFechaBaja" disabled></input>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label">OBSERVACIONES</label>
                                                <input type="text" class="form-control"
                                                    style="width: calc(100% - 30px); margin-bottom: 30px;"
                                                    id="iIdProyectoAsignado" placeholder="OBSERVACIONES"
                                                    name="iIdProyectoAsignado" disabled></input>
                                            </div>
                                        </div>

                                    </div>
                                    <!--BOTONES DE MODALES-->
                                    <div class="candidate">
                                        <div class="body">

                                            <div class="row-left">
                                                <a href="#" class="boton-intec" data-toggle="modal"
                                                    data-target="#apply-popup-id-1">MODIFICACION</a>
                                            </div>

                                            <div class="row-left">
                                                <a href="#" class="boton-intec" data-toggle="modal"
                                                    data-target="#apply-popup-id-2">ASIGNACION</a>
                                            </div>

                                            <div class="row-left">
                                                <a href="#" class="boton-intec" data-toggle="modal"
                                                    data-target="#apply-popup-id-3">BAJA</a>
                                            </div>

                                            <div class="row-left">
                                                <a href="#" class="boton-intec" data-toggle="modal"
                                                    data-target="#apply-popup-id-4">REPARACION</a>
                                            </div>

                                            <div class="row-left">
                                                <a href="#" class="boton-intec" data-toggle="modal"
                                                    data-target="#apply-popup-id-5">PRESTAMO</a>
                                            </div>

                                            <div class="row-left">
                                                <a href="#" class="boton-intec" data-toggle="modal"
                                                    data-target="#apply-popup-id-6">BAJA POR ROBO</a>
                                            </div>

                                            <div class="row-left">
                                                <a href="#" class="boton-intec" data-toggle="modal"
                                                    data-target="#apply-popup-id-7">BAJA POR INSERVIBLE</a>
                                            </div>

                                        </div>
                                    </div>
                                    <!--FIN DE BOTONES MODALES-->

                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- inicio de modales -->
    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 800px; height: auto; padding: 50px;">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>MODIFICACION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="dashboard-form" id="AltaPersona">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">TIPO DE PRODUCTO:</label>
                                            <input type="text" class="form-control" placeholder="TIPO DE PRODUCTO"
                                                Name="iIdtipoProducto" id="iIdtipoProducto" disabled>
                                            </input>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">TIPO DE SUBPRODUCTO:</label>
                                            <input type="text" class="form-control" Name="iIdTipoSubproducto"
                                                id="iIdTipoSubproducto" placeholder="TIPO DE SUBPRODUCTO" disabled>
                                            </input>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">MARCA</label>
                                            <input type="text" class="form-control" placeholder="MARCA" Name="iIdMarca"
                                                id="iIdMarca" disabled>
                                            </input>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">MODELO</label>
                                            <input type="text" id="vchModelo" class="form-control" placeholder="MODELO"
                                                name="vchModelo" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">SERIE</label>
                                            <input type="text" id="vchSerie" class="form-control" placeholder="SERIE"
                                                name="vchSerie" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">FECHA DE INGRESO</label>
                                            <input type="text" id="dFechaIngreso" class="form-control"
                                                placeholder="FECHA DE NACIMIENTO" name="FechaIngreso"
                                                name="dFechaIngreso" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">OBSERVACIONES:</label>
                                            <input type="text" class="form-control" id="iIdProyectoAsignado"
                                                placeholder="OBSERVACIONES" disabled></input>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <a class="boton-intec" href="#" id="buttonGuardarContacto" data-toggle="modal"
                                    data-target="#apply-popup-id-1">GUARDAR</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 800px; height: auto; padding: 50px;">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>ASIGNACION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="dashboard-form" id="AltaPersona">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">TIPO DE ASIGNACION</label>
                                            <input type="text" class="form-control" Name="iIdTipoAsignacion"
                                                id="iIdTipoAsignacion" placeholder="TIPO DE ASIGNACION" disabled>
                                            </input>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">ASIGNADO A</label>
                                            <input type="text" id="iIdAsignadoA" class="form-control"
                                                placeholder="ASIGNADO A" name="iIdAsignadoA" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">PROYECTO ASIGNADO</label>
                                            <input type="text" id="iIdProyectoAsignado" class="form-control"
                                                placeholder="PROYECTO ASIGNADO" name="iIdProyectoAsignado" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">FECHA DE INGRESO</label>
                                            <input type="text" id="dFechaIngreso" class="form-control"
                                                placeholder="FECHA DE NACIMIENTO" name="FechaIngreso"
                                                name="dFechaIngreso" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">OBSERVACIONES:</label>
                                            <input type="text" class="form-control" id="iIdProyectoAsignado"
                                                style="width: calc(100% - 30px); margin-bottom: 30px; font-size: 12px; word-wrap: break-word; overflow: hidden; white-space: nowrap;"
                                                placeholder="OBSERVACIONES" disabled></input>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <a class="boton-intec" href="#" id="buttonGuardarContacto" data-toggle="modal"
                                    data-target="#apply-popup-id-1">GUARDAR</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 800px; height: auto; padding: 50px;">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>BAJA</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="dashboard-form" id="AltaPersona">
                            <div class="col-md-12">
                                <div class="row">                                    

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">*FECHA DE BAJA</label>
                                            <input type="text" class="form-control" id="dFechaBaja"
                                                placeholder="FECHA DE BAJA" name="dFechaBaja" disabled></input>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">OBSERVACIONES:</label>
                                            <input type="text" class="form-control"
                                                style="width: calc(100% - 30px); margin-bottom: 30px; font-size: 12px; word-wrap: break-word; overflow: hidden; white-space: nowrap;"
                                                id="iIdProyectoAsignado" placeholder="OBSERVACIONES" disabled></input>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <a class="boton-intec" href="#" id="buttonGuardarContacto" data-toggle="modal"
                                    data-target="#apply-popup-id-1">GUARDAR</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 800px; height: auto; padding: 50px;">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>REPARACION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="dashboard-form" id="AltaPersona">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">*OBSERVACIONES:</label>
                                            <input type="text" class="form-control"
                                                style="width: calc(100% - 30px); margin-bottom: 30px; font-size: 12px; word-wrap: break-word; overflow: hidden; white-space: nowrap;"
                                                placeholder="OBSERVACIONES" disabled></input>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <a class="boton-intec" href="#" id="buttonGuardarContacto" data-toggle="modal"
                                    data-target="#apply-popup-id-1">GUARDAR</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 800px; height: auto; padding: 50px;">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>PRESTAMO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="dashboard-form" id="AltaPersona">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">*OBSERVACIONES:</label>
                                            <input type="text" class="form-control"
                                                style="width: calc(100% - 30px); margin-bottom: 30px; font-size: 12px; word-wrap: break-word; overflow: hidden; white-space: nowrap;"
                                                placeholder="OBSERVACIONES" disabled></input>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <a class="boton-intec" href="#" id="buttonGuardarContacto" data-toggle="modal"
                                    data-target="#apply-popup-id-1">GUARDAR</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 800px; height: auto; padding: 50px;">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>BAJA POR ROBO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="dashboard-form" id="AltaPersona">
                            <div class="col-md-12">
                                <div class="row">                                    

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">*FECHA DE BAJA</label>
                                            <input type="text" class="form-control" id="dFechaBaja"
                                                placeholder="FECHA DE BAJA" name="dFechaBaja" disabled></input>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">OBSERVACIONES:</label>
                                            <input type="text" class="form-control"
                                                style="width: calc(100% - 30px); margin-bottom: 30px; font-size: 12px; word-wrap: break-word; overflow: hidden; white-space: nowrap;"
                                                placeholder="OBSERVACIONES" disabled></input>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <a class="boton-intec" href="#" id="buttonGuardarContacto" data-toggle="modal"
                                    data-target="#apply-popup-id-1">GUARDAR</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-7" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 800px; height: auto; padding: 50px;">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>BAJA POR INSERVIBLE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="dashboard-form" id="AltaPersona">
                            <div class="col-md-12">
                                <div class="row">

                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label">*FECHA DE BAJA</label>
                                            <input type="text" class="form-control" id="dFechaBaja"
                                                placeholder="FECHA DE BAJA" name="dFechaBaja" disabled></input>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">OBSERVACIONES:</label>
                                            <input type="text" class="form-control"
                                                style="width: calc(100% - 30px); margin-bottom: 30px; font-size: 12px; word-wrap: break-word; overflow: hidden; white-space: nowrap;"
                                                placeholder="OBSERVACIONES" disabled></input>
                                        </div>
                                    </div>                                   

                                </div>
                            </div>

                            <div class="row">
                                <a class="boton-intec" href="#" id="buttonGuardarContacto" data-toggle="modal"
                                    data-target="#apply-popup-id-1">GUARDAR</a>
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
                                        <img src="../images/footer-logo.png" class="img-fluid" alt="">
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
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/feather.min.js"></script>
    <script src="../assets/js/bootstrap-select.min.js"></script>
    <script src="../assets/js/jquery.nstSlider.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/visible.js"></script>
    <script src="../assets/js/jquery.countTo.js"></script>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/plyr.js"></script>
    <script src="../assets/js/tinymce.min.js"></script>
    <script src="../assets/js/slick.min.js"></script>
    <script src="../assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="../assets/js/html5-simple-date-input-polyfill.min.js"></script>

    <script src="../js/custom.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="../js/map.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function ValidarDatosPersona() {
            var respuestaFinal = "";

            //localStorage.clear(); //Limpiar el localStorage para no almancenar basura
            var formulario = document.querySelector("#");

            formulario.addEventListener('submit', function () {
                var titulo = document.querySelector('#').value;
                if (titulo.length >= 1) {
                    localStorage.setItem(titulo, titulo);
                }
            });


            // Obtener los valores de los elementos del formulario para genero
            var GeneroSeleccionado = document.getElementById('genero');
            var GeneroPartes = GeneroSeleccionado.value.split('-');
            var iIdConstanteGenero = GeneroPartes[0];
            var iClaveGenero = GeneroPartes[1];

            // Asignar los valores a los campos ocultos
            document.getElementById('iIdConstanteGenero').value = iIdConstanteGenero;
            console.log(GeneroSeleccionado.value);
            document.getElementById('iClaveGenero').value = iClaveGenero;

            // Obtener los valores de los elementos del formulario para nacionalidad
            var NacionalidadSeleccionado = document.getElementById('nacionalidad');
            var NacionalidadPartes = NacionalidadSeleccionado.value.split('-');
            var iIdConstanteNacionalidad = NacionalidadPartes[0];
            var iClaveNacionalidad = NacionalidadPartes[1];

            // Asignar los valores a los campos ocultos
            document.getElementById('iIdConstanteNacionalidad').value = iIdConstanteNacionalidad;
            console.log(NacionalidadSeleccionado.value);
            document.getElementById('iClaveNacionalidad').value = iClaveNacionalidad;



            // Crear un objeto con los datos del formulario
            var datosFormulario = {
                genero: GeneroSeleccionado.value,
                nombre: document.getElementById('nombre').value,
                primerApellido: document.getElementById('primerApellido').value,
                segundoApellido: document.getElementById('segundoApellido').value,
                curp: document.getElementById('curp').value,
                genero: document.getElementById('genero').value,
                iIdConstanteGenero: iIdConstanteGenero,
                iClaveGenero: iClaveGenero,
                nacionalidad: document.getElementById('nacionalidad').value,
                iIdConstanteNacionalidad: iIdConstanteNacionalidad,
                iClaveNacionalidad: iClaveNacionalidad,
                fechaNacimiento: document.getElementById('fechaNacimiento').value,
                rfc: document.getElementById('rfc').value,
                regimenFiscal: document.getElementById('regimenFiscal').value,
                usoFiscal: document.getElementById('usoFiscal').value,
                codigoPostal: document.getElementById('CodigoFiscal').value
            };

            // Crear una instancia de XMLHttpRequest
            var datosPersona = new XMLHttpRequest();

            // Configurar la solicitud
            datosPersona.open('POST', 'validarDatosPersona.php', true);
            datosPersona.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Convertir el objeto de datos a una cadena de consulta URL
            var formData = new URLSearchParams(datosFormulario).toString();

            // Enviar la solicitud
            datosPersona.send(formData);

            // Manejar la respuesta
            datosPersona.onload = function () {
                if (datosPersona.status === 200) {
                    var respuesta = JSON.parse(datosPersona.responseText);
                    if (respuesta.bResultado === 1) {
                        console.log(respuesta);
                        localStorage.setItem('datosPersona', JSON.stringify(datosFormulario));
                        window.location.href = "altaDomicilio.php";
                    } else {
                        console.error("Mensaje Error: " + respuesta.vchMensaje);
                        alert(respuesta.vchMensaje);
                        respuestaFinal = respuesta.vchMensaje;

                        //document.write(respuestaFinal);
                        var miSpan = document.getElementById('spanOculto');
                        miSpan.innerHTML = respuestaFinal;
                        funcionDesbloquearMensaje();
                    }
                } else {
                    console.error("Error en la solicitud al servidor");
                }
            };
        }
    </script>


</body>

</html>