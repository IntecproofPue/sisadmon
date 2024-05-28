<?php
require_once ('../includes/pandora.php');
require_once ('../includes/load.php');
require_once ('FuncionesInventario.php');


$resultadoProducto = ObtenerTipoProducto();
$resultadoTipoSubproducto = ObtenerTipoSubproducto();
$resultadoMarcas = ObtenerMarca();
$resultadoTipoAsignacion = ObtenerTipoAsignacion();
$resultadoPersonas = consultaPersona();
$resultadoProyectos = consultaProyecto();
$resultadoGenero = ObtenerIdGenero();
$resultadoTipoPersona = ObtenerIdTipoPersona();

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
                    <li><a href="#"><span class="ti-settings"></span><?php echo $herramientas; ?></a></li>
                    <li><a href="../includes/logout.php"><span class="ti-power-off"></span><?php echo $logout; ?></a>
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
              <h4><i data-feather="plus-circle"></i>REGISTRO DE INVENTARIO</h4>
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

                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-4">
                      <div class="form-group">
                        <!-- <label class="col-md-4 col-form-label">TIPO DE PRODUCTO:</label>-->
                          <input type="hidden" name="iIdConstanteProducto" id="iIdConstanteProducto" value="">
                          <input type="hidden" name="iClaveProducto" id="iClaveProducto" value="">

                          <select class="form-control" Name="iIdtipoProducto" id="iIdtipoProducto" required>
                          <option value="">*SELECCIONE UN PRODUCTO</option>
                          <?php foreach ($resultadoProducto as $producto): ?>
                            <option value="<?= $producto['iIdConstante'] . '-' . $producto['iClaveCatalogo'] ?>">
                              [<?= $producto['iClaveCatalogo'] ?>] -
                              <?= $producto['vchDescripcion'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <!--<label class="col-md-4 col-form-label">TIPO DE SUBPRODUCTO:</label>-->

                          <input type="hidden" name="iIdConstanteSubProducto" id="iIdConstanteSubProducto" value="">
                          <input type="hidden" name="iClaveSubProducto" id="iClaveSubProducto" value="">
                          <select class="form-control" Name="iIdTipoSubproducto" id="iIdTipoSubproducto" required>
                          <option value="">*SELECCIONE UN SUBPRODUCTO</option>
                          <?php foreach ($resultadoTipoSubproducto as $subproducto): ?>
                            <option value="<?= $subproducto['iIdConstante'] . '-' . $subproducto['iClaveCatalogo'] ?>">
                              [<?= $subproducto['iClaveCatalogo'] ?>] -
                              <?= $subproducto['vchDescripcion'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <input type="hidden" name="iIdConstanteMarca" id="iIdConstanteMarca" value="">
                          <input type="hidden" name="iClaveMarca" id="iClaveMarca" value="">
                          <select class="form-control" Name="iIdMarca" id="iIdMarca" required>
                              <option value="">*SELECCIONE UNA MARCA</option>
                              <?php foreach ($resultadoMarcas as $marca): ?>
                                  <option value="<?= $marca['iIdConstante'] . '-' . $marca['iClaveCatalogo'] ?>">
                                      [<?= $marca['iClaveCatalogo'] ?>] -
                                      <?= $marca['vchDescripcion'] ?>
                                  </option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" id="vchModelo" class="form-control" placeholder="MODELO" maxlength="150"
                          onkeypress="this.value = this.value.toUpperCase();return">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" id="vchSerie" class="form-control" placeholder="*SERIE" maxlength="150"
                          onkeypress="this.value = this.value.toUpperCase();return">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <input type="hidden" name="iIdTipoAsignacion" id="iIdConstanteAsignacion" value="">
                          <input type="hidden" name="iClaveAsignacion" id="iClaveAsignacion" value="">
                          <select class="form-control" Name="iIdTipoAsignacion" id="iIdTipoAsignacion" required>
                              <option value="">*SELECCIONE UN TIPO DE ASIGNACION</option>
                              <?php foreach ($resultadoTipoAsignacion as $asignacion): ?>
                                  <option value="<?= $asignacion['iIdConstante'] . '-' . $asignacion['iClaveCatalogo'] ?>">
                                      [<?= $asignacion['iClaveCatalogo'] ?>] -
                                      <?= $asignacion['vchDescripcion'] ?>
                                  </option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <select class="form-control" Name="iIdAsignadoA" id="iIdAsignadoA">
                              <option value="">SELECCIONE UNA PERSONA</option>
                              <?php foreach ($resultadoPersonas as $personas): ?>
                                  <option value="<?= $personas['iIdPersona']?>">
                                      [<?= $personas['iIdPersona'] ?>] -
                                      <?= $personas['vchNombre'] ?>
                                  </option>
                              <?php endforeach; ?>
                          </select>

                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <select class="form-control" Name="iIdProyecto" id="iIdProyecto">
                              <option value="">SELECCIONE UN PROYECTO</option>
                              <?php foreach ($resultadoProyectos as $proyecto): ?>
                                  <option value="<?= $proyecto['iIdProyecto']?>">
                                      [<?= $proyecto['iIdProyecto'] ?>] -
                                      <?= $proyecto['vchNombreCorto'] ?>
                                  </option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group" >
                        <label style="margin-bottom: -10px;" >*FECHA DE INGRESO</label>
                          <?php
                          $fechaActual = date('Y-m-d');
                          $fechaLimiteInferior = '1980-01-01';
                          ?>
                        <input type="date" id="dFechaIngreso" class="form-control" placeholder=" *FECHA DE NACIMIENTO"
                          name="FechaIngreso" pattern="\d{4}-\d{2}-\d{2}"
                          title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)" required
                          min="<?php echo $fechaMinima = $fechaLimiteInferior; ?>"
                          max="<?php echo $fechaMaxima = $fechaActual; ?>" maxlength="10">

                      </div>
                    </div> 

                    <div class="col-md-4">
                      <div class="form-group">
                        <!--<label class="col-md-4 col-form-label">OBSERVACIONES:</label>-->
                        <textarea class="form-control" id="vchObservaciones" placeholder="OBSERVACIONES"
                          onkeypress="this.value = this.value.toUpperCase();return"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="candidate">
                    <div class="body">

                      <div class="row-left">
                        <button type="submit" class="boton-intec" id="buttonRegistrar">REGISTRAR</button>
                        <button type="submit" class="boton-intec" id="buttonVolver">VOLVER</button>
                      </div>


                      <div class="row-left">
                        <a href="#" class="boton-intec" data-toggle="modal" data-target="#apply-popup-id-1">NUEVA
                          PERSONA</a>
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

  <!-- inicio de modales -->
  <div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 800px; height: auto; padding: 50px;">
          <div class="modal-header">
            <h5 class="modal-title"><i data-feather="edit"></i>NUEVA PERSONA</h5>
          </div>

          <div class="modal-body">
            <form class="dashboard-form" id="AltaPersona">
              <div class="col-md-12">
                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <!--<label class="col-md-4 col-form-label">TIPO DE PERSONA:</label>-->
                        <input type="hidden" name="iIdConstanteGenero" id="iIdConstanteGenero" value="">
                        <input type="hidden" name="iClaveGenero" id="iClaveGenero" value="">
                        <select class="form-control" name="iIdTipoPersona" id="iIdTipoPersona" required>
                            <option value="" selected>SELECCIONE UN TIPO DE PERSONA</option>
                            <?php foreach ($resultadoTipoPersona as $persona): ?>
                                <option value="<?= $persona['iIdConstante'] . '-' . $persona['iClaveCatalogo'] ?>">
                                    [<?= $persona['iClaveCatalogo'] ?>] - <?= $persona['vchDescripcion'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                  </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <!-- <label class="col-sm-3 col-form-label">*GENERO:</label>-->
                            <input type="hidden" name="iIdConstanteGenero" id="iIdConstanteGenero" value="">
                            <input type="hidden" name="iClaveGenero" id="iClaveGenero" value="">
                            <select class="form-control" name="genero" id="genero" required>
                                <option value="" selected>SELECCIONE UN GENERO</option>
                                <?php foreach ($resultadoGenero as $genero): ?>
                                    <option value="<?= $genero['iIdConstante'] . '-' . $genero['iClaveCatalogo'] ?>">
                                        [<?= $genero['iClaveCatalogo'] ?>] - <?= $genero['vchDescripcion'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <!--<label class="col-sm-3 col-form-label">*NOMBRE:</label>-->
                      <input type="text" id="vchNombre" class="form-control" placeholder="*NOMBRE" min="2" name="Nombre"
                        maxlength="50" onkeypress="this.value = this.value.toUpperCase();return soloNombre(event)"
                        required>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <!--<label class="col-sm-3 col-form-label">* PRIMER APELLIDO:</label>-->
                      <input type="text" id="primerApellido" class="form-control" placeholder="*PRIMER APELLIDO" min="2"
                        name="primerApellido" maxlength="50"
                        onkeypress="this.value = this.value.toUpperCase();return soloNombre(event)" required>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group ">
                      <!--<label class="col-sm-3 col-form-label">SEGUNDO APELLIDO:</label>-->
                      <input type="text" id="segundoApellido" class="form-control" placeholder="SEGUNDO APELLIDO"
                        min="2" name="segundoApellido" maxlength="50"
                        onkeypress="this.value = this.value.toUpperCase();return soloNombre(event)" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <a class="boton-intec" href="#" id="buttonGuardarPersona" data-toggle="modal" data-target="#apply-popup-id-1">GUARDAR</a>
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
                  <p class="copyright-text">DERECHOS DE AUTOR <a href="#">INTECPROOF</a> 2024, RESERVADOS</p>
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
  <script src = "ProcesosAltaInventario.js"></script>

  <script> document.getElementById('buttonGuardarPersona').addEventListener('click', validarPersona);</script>
  <script> document.getElementById('buttonRegistrar').addEventListener('click', validarDatosInventario); </script>
  <script> document.getElementById('buttonVolver').addEventListener('click', regresarInicio);  </script>


</body>

</html>