<?php
require_once ('../includes/pandora.php');
require_once ('../includes/load.php');
require_once ('../includes/sql.php');

session_start();
function ObtenerSede()
{
  if (isset($_SESSION['CatConstante'])) {
    $datosSede = $_SESSION['CatConstante'];
    $sedeEncontrado = array();

    foreach ($datosSede as $valorSede) {
      if ($valorSede['iAgrupador'] == 4) {
        $sedeEncontrado[] = $valorSede;
      }
    }
    return $sedeEncontrado;
  } else {
    echo ("No hay datos del Estado de Procedencia");
  }
}

$resultadoSede = ObtenerSede();




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


      function cargarUsosFiscales() {
        window.alert("Hola");
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
                    <li><a href="../includes/load.php"><span class="ti-power-off"></span><?php echo $logout; ?></a>
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
              <h4><i data-feather="plus-circle"></i>ALTA DE PROYECTO</h4>
            </label>
          </div>
        </div>
        <!--<div class="col-md-6">
          <div class="breadcrumb-form">
            <form action="#">
              <input type="text" placeholder="BUSCAR">
              <button><i data-feather="search"></i></button>
            </form>
          </div>
        </div>-->
      </div>
    </div>
  </div>
  <!--Breadcrumb End -->

  <div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
      <div class="row no-gliters">
        <div class="col">
          <div class="post-content-wrapper">
            <form action="#" id="formularioProyecto" class="job-post-form">
              <div class="basic-info-input">
                <h4><i data-feather="plus-circle"></i>AGREGAR PROYECTO</h4>

                <div id="information" class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <input type="hidden" name="iIdConstanteSede" id="iIdConstanteSede" value="">
                      <input type="hidden" name="iClaveSede" id="iClaveSede" value="">
                      <input type="hidden" name="#" id="" value="">

                      <!-- <div class="col-md-4">
                    <div class="form-group row">
                       <label class="col-sm-3 col-form-label">*GENERO:</label>
                      <select class="form-control" name="genero" id="genero" required>
                        <option value="" selected>SELECCIONE UN GENERO</option>
                        <?php foreach ($resultadoGenero as $genero): ?>
                          <option value="<?= $genero['iIdConstante'] . '-' . $genero['iClaveCatalogo'] ?>">
                            [<?= $genero['iClaveCatalogo'] ?>] - <?= $genero['vchDescripcion'] ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <input type="hidden" name="iIdConstanteGenero" id="iIdConstanteGenero" value="">
                    <input type="hidden" name="iClaveGenero" id="iClaveGenero" value="">
                  </div>-->

                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="text" id="vchNombre" class="form-control" placeholder="*NOMBRE DE PROYECTO"
                            onkeypress="this.value = this.value.toUpperCase();return">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="text" id="vchNombreCorto" class="form-control" placeholder="NOMBRE CORTO"
                            onkeypress="this.value = this.value.toUpperCase();return">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control" id="iIdTipoCliente">
                            <option>TIPO DE CLIENTE</option>
                            <option>Accounting / Finance</option>
                            <option>Health Care</option>
                            <option>Garments / Textile</option>
                            <option>Telecommunication</option>
                          </select>
                          <i class="fa fa-caret-down"></i>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control">
                            <option>SEDE DE PROYECTO</option>
                            <option>Accounting / Finance</option>
                            <option>Health Care</option>
                            <option>Garments / Textile</option>
                            <option>Telecommunication</option>
                          </select>
                          <i class="fa fa-caret-down"></i>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label style="margin-bottom: 0px; margin-top: -15px;">*FECHA DE INICIO</label>
                          <input type="date" id="dFechaInicio" class="form-control"
                            style="margin-top: -19px; margin-bottom: 0px;" placeholder=" *FECHA DE INICIO"
                            name="FechaIngreso" pattern="\d{4}-\d{2}-\d{2}"
                            title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)" required
                            min="<?php echo $fechaMinima = "1950-01-01"; ?>"
                            max="<?php echo $fechaMaxima = "2024-01-01"; ?>" maxlength="10">
                          <?php
                          $fechaActual = date('Y-m-d');
                          $fechaMinima = date('Y-m-d', strtotime('-18 years', strtotime($fechaActual)));
                          $fechaMaxima = $fechaActual;
                          $fechaLimiteInferior = '1950-01-01';
                          ?>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control">
                            <option>TIPO SUBPROYECTO</option>
                            <option>Part Time</option>
                            <option>Full Time</option>
                            <option>Temperory</option>
                            <option>Permanent</option>
                            <option>Freelance</option>
                          </select>
                          <i class="fa fa-caret-down"></i>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control">
                            <option>ASIGNADO</option>
                            <option>Less than 1 Year</option>
                            <option>2 Year</option>
                            <option>3 Year</option>
                            <option>4 Year</option>
                            <option>Over 5 Year</option>
                          </select>
                          <i class="fa fa-caret-down"></i>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control">
                            <option>MARCA</option>
                            <option>Accounting / Finance</option>
                            <option>Health Care</option>
                            <option>Garments / Textile</option>
                            <option>Telecommunication</option>
                          </select>
                          <i class="fa fa-caret-down"></i>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control">
                            <option>PROYECTO ASIGNADO</option>
                            <option>Matriculation</option>
                            <option>Intermidiate</option>
                            <option>Gradute</option>
                          </select>
                          <i class="fa fa-caret-down"></i>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label style="margin-bottom: -10px;">*FECHA DE INGRESO</label>
                          <input type="date" id="dFechaIngreso" class="form-control" style=" margin-top: -20px; "
                            placeholder=" *FECHA DE INGRESO" name="FechaIngreso" pattern="\d{4}-\d{2}-\d{2}"
                            title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)" required
                            min="<?php echo $fechaMinima = "1950-01-01"; ?>"
                            max="<?php echo $fechaMaxima = "2024-01-01"; ?>" maxlength="10">
                          <?php
                          $fechaActual = date('Y-m-d');
                          $fechaMinima = date('Y-m-d', strtotime('-18 years', strtotime($fechaActual)));
                          $fechaMaxima = $fechaActual;
                          $fechaLimiteInferior = '1950-01-01';
                          ?>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control">
                            <option>ESTATUS</option>
                            <option>Matriculation</option>
                            <option>Intermidiate</option>
                            <option>Gradute</option>
                          </select>
                          <i class="fa fa-caret-down"></i>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <!--<label class="col-md-4 col-form-label">OBSERVACIONES:</label>-->
                          <textarea class="form-control" id="iIdProyectoAsignado" placeholder="OBSERVACIONES"
                            onkeypress="this.value = this.value.toUpperCase();return"></textarea>
                        </div>
                      </div>
                    </div>

                    <!--<div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control">
                            <option>TIPO DE MOVIMIENTO</option>
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                          <i class="fa fa-caret-down"></i>
                        </div>
                      </div>-->

                  </div>
                </div>
              </div>

              <div class="signin-option">
                <div class="buttons">
                  <a href="#" class="boton-intec">SIGUIENTE</a>
                  <a href="#" class="boton-intec">LIMPIAR</a>
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
  <script>
    $(document).ready(function () {
      // manejar del envío del formulario
      $('#formularioProyecto').submit(function (event) {
        // evita envío del formulario por defecto
        event.preventDefault();

        // valores de los campos del formulario
        var datosProyecto = {
          vchNombre: $('#nombre').val(),
          vchNombreCorto: $('#nombreCorto').val(),
          iIdTipoCliente: $('#idTipoCliente').val(),
          iAgruTipoCliente: $('#agruTipoCliente').val(),
          iCveTipoCliente: $('#cveTipoCliente').val(),
          vchNombreCliente: $('#nombreCliente').val(),
          iIdControlProyecto: $('#idControlProyecto').val(),
          iAgruControlProyecto: $('#agruControlProyecto').val(),
          iCveControlProyecto: $('#cveControlProyecto').val(),
          dFechaInicioProyecto: $('#fechaInicioProyecto').val(),
          dFechaFinProyecto: $('#fechaFinProyecto').val(),
          iIdEstatus: $('#idEstatus').val(),
          iAgruEstatus: $('#agruEstatus').val(),
          iCveEstatus: $('#cveEstatus').val(),
          iIdPrioridad: $('#idPrioridad').val(),
          iAgruPrioridad: $('#agruPrioridad').val(),
          iCvePrioridad: $('#cvePrioridad').val(),
          iIdLiderProyecto: $('#idLiderProyecto').val(),
          vchComentarios: $('#comentarios').val(),
          iIdUsuarioUltModificacion: $('#idUsuarioUltModificacion').val(),
          iIdProyecto: $('#idProyecto').val(),
          bResultado: $('#resultado').val(),
          vchCampoError: $('#campoError').val(),
          vchMensaje: $('#mensaje').val()
        };


      });
    });
  </script>

</body>

</html>