<?php

session_start();
require_once ('../../includes/pandora.php');
require_once ('../../includes/load.php');


if (isset($_SESSION['user_id'])) { ?>
<?php } else {

  ?>
  <script type="text/javascript">
    //Redireccionamiento tras 5 segundos
    setTimeout(function () { window.location.href = "../../index.html"; }, 0);
  </script>
  <?php

}


function ObtenerEstadoProcedencia()
{
  $agrupadorEstado = 4;
  if (isset($_SESSION['CatConstante'])) {
    $datosEdoProcedencia = $_SESSION['CatConstante'];
    $estadoEncontrado = array();


    foreach ($datosEdoProcedencia as $valorEstado) {
      if ($valorEstado['iAgrupador'] == $agrupadorEstado) {
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
                      <?php if (isset($nombrePersona) && isset($emailPersona)): ?>
                        <h5><a href="#"><?php echo $nombrePersona; ?></a></h5>
                        <span class="mail"><?php echo $emailPersona; ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
                  <ul class="account-item-list">
                    <li><a href="#"><span class="ti-user"></span><?php echo $Perfil; ?></a></li>
                    <li><a href="#"><span class="ti-settings"></span><?php echo $herramientas; ?></a></li>
                    <li><a href="../../includes/logout.php"><span class="ti-power-off"></span><?php echo $logout; ?></a>
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
              <label style="align-self: flex-end;" class="selected"><a
                  href="consultaDomicilio.php">DOMICILIO</a></label>
              <label style="align-self: flex-end;"><a href="consultaContacto.php">CONTACTO</a></label>
              <label style="align-self: flex-end;"><a href="consultaDoctos.php">DOCUMENTOS</a></label>
            </div>
          </div>
          <!-- fin de pestañas de navegación-->
        </div>
      </div>
    </div>
  </header>

  <script>
    document.addEventListener('DOMContentLoaded', function () {

      console.log("Está en los datos del domicilio");

      var DatosEmpleado = localStorage.getItem('datosConsultaIndividual');

      var bResultadoEmpleado = JSON.parse(DatosEmpleado);
      var iIdPersonaDomicilio = bResultadoEmpleado.iIdPersona;

      // console.log(iIdPersonaDomicilio);

      var datosDomicilio = new XMLHttpRequest();

      datosDomicilio.open('POST', 'prcConsultaDomicilio.php', true);

      var formData = new URLSearchParams();
      formData.append('iIdPersonaDomicilio', iIdPersonaDomicilio);

      //console.log(formData);

      // Enviar la solicitud
      datosDomicilio.send(formData);

      // Manejar la respuesta
      datosDomicilio.onload = function () {
        if (datosDomicilio.status === 200) {
          console.log('Respuesta exitosa');
          var respuesta = JSON.parse(datosDomicilio.responseText);
          console.log(respuesta);

          if (respuesta[0].bResultado === 1) {
            //alert(respuesta[0].vchMensaje);
            localStorage.setItem('datosConsultaDomicilio', JSON.stringify(respuesta));

            var datosDomicilioConsulta = localStorage.getItem('datosConsultaDomicilio', JSON.stringify(respuesta))
            //console.log (datosDomicilioConsulta);

            if (datosDomicilioConsulta) {
              var bResultado = JSON.parse(datosDomicilioConsulta);
              console.log('Objeto parseado: ', bResultado);

              for (var i = 0; i < bResultado.length; i++) {
                var vchEntidad = document.getElementById('vchEntidadC');
                vchEntidad.value = bResultado[i].vchEntidadFederativa || '';

                var vchMunicipioConsulta = document.getElementById('vchMunicipioC');
                  vchMunicipioConsulta.value = bResultado[i].vchMunicipio || '';

                var vchLocalidadConsulta = document.getElementById('vchLocalidadC');
                  vchLocalidadConsulta.value = bResultado[i].vchLocalidad || '';

                var iIdCodigoPostalConsulta = document.getElementById('iIdCodigoPostalC');
                  iIdCodigoPostalConsulta.value = bResultado[i].iCodigoPostal || '';

                var vchColoniaConsulta = document.getElementById('vchColoniaC');
                  vchColoniaConsulta.value = bResultado[i].vchColonia || '';

                var vchCalleConsulta = document.getElementById('vchCalleC');
                  vchCalleConsulta.value = bResultado[i].vchCalle || '';

                var vchLetraConsulta = document.getElementById('vchLetraC');
                  vchLetraConsulta.value = bResultado[i].vchLetra || '';

                var vchNoExtConsulta = document.getElementById('vchNoExtC');
                  vchNoExtConsulta.value = bResultado[i].vchNumeroExterior || '';

                var vchNoIntConsulta = document.getElementById('vchNoIntC');
                  vchNoIntConsulta.value = bResultado[i].vchNumeroInterior || '';

                var iIdUsuarioUltModificacionConsulta = document.getElementById('vchUsuarioUltModificacionC');
                  iIdUsuarioUltModificacionConsulta.value = bResultado[i].vchUsuarioUltModif || '';


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
                var dFechaModificacionConsulta = document.getElementById('dtFechaUltModificacionC');
                  dFechaModificacionConsulta.value = fechaModifFinal || '';

              }
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
            <form action="#" method="post" class="dashboard-form">
              <div id="information" class="row justify-content-center">
                <div class="col-md-10">
                  <label class="col-form-label">
                    <h6><i data-feather="user-check"></i>INFORMACION DOMICILIO</h6>
                  </label>
                  <div class="row">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">ENTIDAD</label>
                        <input id="vchEntidadC" type="text" class="form-control" placeholder="ENTIDAD FEDERATIVA"
                          readonly>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">MUNICIPIO </label>
                        <input id="vchMunicipioC" type="text" class="form-control" placeholder="MUNICIPIO" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">LOCALIDAD </label>
                        <input id="vchLocalidadC" type="text" class="form-control" placeholder="LOCALIDAD" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">COLONIA </label>
                        <input id="vchColoniaC" type="text" class="form-control" placeholder="COLONIA" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">C.P.</label>
                        <input id="iIdCodigoPostalC" type="text" class="form-control" placeholder="CÓDIGO POSTAL"
                          disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">CALLE </label>
                        <input id="vchCalleC" type="text" class="form-control" placeholder="CALLE" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">No. EXTERIOR </label>
                        <input id="vchNoExtC" type="text" class="form-control" placeholder="NÚMERO EXTERIOR" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">No. INTERIOR </label>
                        <input id="vchNoIntC" type="text" class="form-control" placeholder="NÚMERO INTERIOR" disabled />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">LETRA </label>
                        <input id="vchLetraC" class="form-control" placeholder="LETRA" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">USUARIO ULTIMA
                          MODIFICACION</label>
                        <input type="text" class="form-control" placeholder="USUARIO ULTIMA MOD."
                          id="vchUsuarioUltModificacionC" disabled />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group ">
                        <label class="col-form-label">FECHA ULTIMA
                          MODIFICACION</label>
                        <input type="text" class="form-control" placeholder="FECHA ULTIMA MOD."
                          id="dtFechaUltModificacionC" disabled />
                      </div>
                    </div>

                  </div>

                  <div class="candidate">
                    <div class="body">
                      <div class="row">
                        <a href="#" class="boton-intec" data-toggle="modal" data-target="#apply-popup-id-1" id="buttonModificar"
                          style="display:none;">MODIFICAR</a>
                      </div>
                    </div>
                  </div>

                    <script>
                        document.getElementById('buttonModificar').addEventListener('click', function (){
                            var datosDomicilio = localStorage.getItem('datosConsultaDomicilio');

                            if (datosDomicilio){
                                var bResultadoDomicilio = JSON.parse(datosDomicilio);
                                MostrarDatosDomicilio(bResultadoDomicilio);
                            }
                        })
                    </script>

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
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title"><i data-feather="edit"></i>CAMBIOS GENERALES DOMICILIO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#">
                <input type="hidden" name = "iIdConstanteSede" id="iIdConstanteSede" value="" >
                <input type="hidden" name = "iClaveSede" id="iClaveSede" value="" >
                <input type="hidden" name="iIdPersonaDomicilio" id="iIdPersonaDomicilio" value="" >
                <input type="hidden" name="iIdDomicilio" id="iIdDomicilio" value="" >

              <div class="form-group">
                  <option value="">ENTIDAD FEDERATIVA</option>
                  <select class="form-control" Name="iIdSede" id="iIdEntidadFederativaModif" >
                      <?php foreach ($resultadoEstado as $estado): ?>
                          <option value="<?= $estado['iIdConstante'] . '-' . $estado['iClaveCatalogo'] ?>">
                              [<?= $estado['iClaveCatalogo'] ?>] - <?= $estado['vchDescripcion'] ?>
                          </option>
                      <?php endforeach; ?>
                  </select>
              </div>
              <div class="form-group">
                  <option value="">MUNICIPIO</option>
              <input type="text" class="form-control" placeholder="MUNICIPIO"
                    style="text-transform: uppercase" id = "vchMunicipioModif" >
              </div>
              <div class="form-group">
                  <option value="">LOCALIDAD</option>
              <input type="text" class="form-control" placeholder="LOCALIDAD" id="vchLocalidadModif"
                    style="text-transform: uppercase" >
              </div>
              <div class="form-group">
                  <option value="">COLONIA</option>
              <input type="text" class="form-control" placeholder="COLONIA" id="vchColoniaModif"
                    style="text-transform: uppercase" >
              </div>
              <div class="form-group">
                  <option value="">CÓDIGO POSTAL</option>
              <input type="text" class="form-control" placeholder="C.P." id="iCodigoPostalModif"
                    style="text-transform: uppercase" >
              </div>
              <div class="form-group">
                  <option value="">CALLE</option>
              <input type="text" class="form-control" placeholder="CALLE" id="vchCalleModif"
                    style="text-transform: uppercase" >
              </div>
              <div class="form-group">
                  <option value="">No. EXTERIOR</option>
              <input type="text" class="form-control" placeholder="No. EXTERIOR" id="vchNoExtModif"
                    style="text-transform: uppercase" >
              </div>
              <div class="form-group">
                  <option value="">No. INTERIOR</option>
              <input type="text" class="form-control" placeholder="No. INTERIOR" id="vchNoIntModif"
                    style="text-transform: uppercase" >
              </div>
              <div class="form-group">
                  <option value="">LETRA</option>
              <input type="text" class="form-control" placeholder="LETRA" id="vchLetraModif"
                    style="text-transform: uppercase" >
              </div>
                <script>
                    function validarDatosDomicilio(){
                        var EntidadFederativaSeleccionada = document.getElementById('iIdEntidadFederativaModif');
                        var EntidadFederativaPartes = EntidadFederativaSeleccionada.value.split('-');
                        var iIdEntidadFederativa = EntidadFederativaPartes[0];
                        var iClaveEntidad = EntidadFederativaPartes[1];

                        document.getElementById('iIdConstanteSede').value = iIdEntidadFederativa;
                        document.getElementById('iClaveSede').value = iClaveEntidad;

                        var datosPersonaDomicilio = localStorage.getItem('datosConsultaIndividual');
                        var bResultadoPersona = JSON.parse(datosPersonaDomicilio);
                        var iIdPersonaDomicilio = bResultadoPersona.iIdPersona;

                        var datosDomicilioModificacion = localStorage.getItem('datosConsultaDomicilio');
                        var bResultadoDomicilioModificacion = JSON.parse(datosDomicilioModificacion);
                        var iIdDomicilio = bResultadoDomicilioModificacion[0].iIdPersonasDomicilios;


                        document.getElementById('iIdPersonaDomicilio').value = iIdPersonaDomicilio;
                        document.getElementById('iIdDomicilio').value = iIdDomicilio;


                        var datosFormulario = {
                            iIdConstanteEstado: iIdEntidadFederativa,
                            iClaveEstado: iClaveEntidad,
                            vchMunicipio: document.getElementById('vchMunicipioModif').value,
                            vchLocalidad: document.getElementById('vchLocalidadModif').value,
                            codigoPostal: document.getElementById('iCodigoPostalModif').value,
                            vchColonia: document.getElementById('vchColoniaModif').value,
                            vchCalle: document.getElementById('vchCalleModif').value,
                            vchLetra: document.getElementById('vchLetraModif').value,
                            vchNoExt: document.getElementById('vchNoExtModif').value,
                            vchNoInt: document.getElementById('vchNoIntModif').value,
                            persona: iIdPersonaDomicilio,
                            domicilio: iIdDomicilio,
                            opcion: 2
                        };

                        var datosDomicilioModif = new XMLHttpRequest();

                        datosDomicilioModif.open('POST', '/SisAdmonIntecproof/persona/altaPersona/validarDatosDomicilio.php', true);
                        datosDomicilioModif.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                        var formData = new URLSearchParams(datosFormulario).toString();

                        datosDomicilioModif.send(formData);

                        datosDomicilioModif.onload = function (){
                            if (datosDomicilioModif.status === 200){
                                var respuesta = JSON.parse(datosDomicilioModif.responseText);
                                if (respuesta.bResultado === 1){
                                    alert(respuesta.vchMensaje);
                                    localStorage.setItem('agregarDomicilio', JSON.stringify(datosFormulario));
                                }else {
                                    console.log("Mensaje de error: ", respuesta.vchMensaje);
                                    alert(respuesta.vchMensaje);
                                }
                            }
                        }
                    }
                </script>

              <button class="button primary-bg btn-block" id="botonAplicar">APLICAR CAMBIOS</button>
                <script>
                    document.getElementById('botonAplicar').addEventListener('click', validarDatosDomicilio);
                </script>

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
      console.log(localStorage.getItem('habilitarBotones'));
      if (localStorage.getItem('habilitarBotones') === 'true') {
        const habilitarBotonDomicilio = document.querySelectorAll('.boton-intec');
        habilitarBotonDomicilio.forEach(boton => {
          boton.disabled = false;
          boton.style.display = 'block';
        });
      }
    });


    function MostrarDatosDomicilio(bResultadoDomicilio){

        console.log("Esto es bResultadoDomicilio",bResultadoDomicilio)

        //Entidad Federativa

        for (var i= 0; i<bResultadoDomicilio.length; i++){

            var iIdEntidadModificacion = bResultadoDomicilio[i].iIdEntidadFederativa;
            var selectElementEntidad = document.getElementById('iIdEntidadFederativaModif');

            for (var k = 0; k < selectElementEntidad.options.length; k++) {
                var optionEntidad = selectElementEntidad.options[k];
                var optionIdEntidad = parseInt(optionEntidad.value.split('-')[0]);

                if (optionIdEntidad === iIdEntidadModificacion) {
                    optionEntidad.selected = true;
                    break;
                }
            }

            //Municipio

            var vchMunicipioEditar = document.getElementById('vchMunicipioModif');
            vchMunicipioEditar.value = bResultadoDomicilio[i].vchMunicipio


            //Localidad
            var vchLocalidadModif = document.getElementById('vchLocalidadModif');
            vchLocalidadModif.value = bResultadoDomicilio[i].vchLocalidad;

            //Colonia
            var vchColoniaModif = document.getElementById('vchColoniaModif');
            vchColoniaModif.value = bResultadoDomicilio[i].vchColonia;

            //Código postal
            var iCodigoPostalModif = document.getElementById('iCodigoPostalModif');
            iCodigoPostalModif.value = bResultadoDomicilio[i].iCodigoPostal;

            //Calle
            var vchCalleModif = document.getElementById('vchCalleModif');
            vchCalleModif.value = bResultadoDomicilio[i].vchCalle;

            //No. Ext
            var vchNoExtModif = document.getElementById('vchNoExtModif');
            vchNoExtModif.value = bResultadoDomicilio[i].vchNumeroExterior;

            //No. Int
            var vchNoIntModif = document.getElementById('vchNoIntModif');
            vchNoIntModif.value = bResultadoDomicilio[i].vchNumeroInterior;

            //Letra
            var vchLetraModif = document.getElementById('vchLetraModif');
            vchLetraModif.value = bResultadoDomicilio[i].vchLetra;

        }

    }
  </script>

</body>

</html>