<?php

require_once ('../../includes/pandora.php');

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


function ObtenerTipoDocumento()
{
    if (isset($_SESSION['CatConstante'])) {
        $datosDocumentos = $_SESSION['CatConstante'];
        $documentosEncontrados = array();

        foreach ($datosDocumentos as $valorDocumento) {
            if ($valorDocumento['iAgrupador'] == 10) {
                $documentosEncontrados[] = $valorDocumento;
            }
        }
        return $documentosEncontrados;
    } else {
        echo ("No hay datos del Estado de Procedencia");
    }
}

$resultadoDocumento = ObtenerTipoDocumento();

function ObtenerPuesto()
{
    $serverName = "192.168.100.39, 1433";
    $connectionInfo = array(
        "Database" => "BDSistemaIntegral_PRETEST",
        "UID" => "Development",
        "PWD" => "Development1234*",
        'CharacterSet' => 'UTF-8'
    );

    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $datosPuesto = array(
        'iOpcion' => 4,
        'iIdPuesto' => 0,
        'vchPuesto' => '',
        'iIdTipoContratacion' => 0,
        'iCveContratacion' => 0,
        'iAgruContratacion' => 0
    );

    $procedureName = "EXEC prcConsultaPuesto    @iOpcion = ?,
                                                        @iIdPuesto = ?, 
                                                        @vchPuesto = ?, 
                                                        @iIdTipoContratacion = ?,
                                                        @iCveContratacion = ? ,
                                                        @iAgruContratacion = ? 
                                                    ";

    $params = array(
        $datosPuesto['iOpcion'],
        $datosPuesto['iIdPuesto'],
        $datosPuesto['vchPuesto'],
        $datosPuesto['iIdTipoContratacion'],
        $datosPuesto['iCveContratacion'],
        $datosPuesto['iAgruContratacion']
    );

    $result = sqlsrv_query($conn, $procedureName, $params);

    $CatPuestos = array();

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));

    } else {
        do {
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $CatPuestos[] = $row;
            }
        } while (sqlsrv_next_result($result));
    }
    return $CatPuestos;

    sqlsrv_close($conn);

}
$resultadoPuesto = ObtenerPuesto();

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
                            <a href="../../index.html"><img src="../../images/logo-2.png" alt=""></a>
                        </div>
                        <div class="header-top-toggler">
                            <div class="header-top-toggler-button"></div>
                        </div>
                        <div class="top-nav">
                            <div class="dropdown header-top-notification">
                                <a href="#" class="notification-button">Notificaciones</a>
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
                            <div class="dropdown header-top-account">
                                <a href="#" class="account-button">MI CUENTA</a>
                                <div class="account-card">
                                    <div class="header-top-account-info">
                                        <a href="#" class="account-thumb">
                                            <img src="../../images/account/thumb-1.jpg" class="img-fluid" alt="">
                                        </a>
                                        <div class="account-body">
                                            <h5><a href="#">Mostrar Empleado</a></h5>
                                            <span class="mail">empleado@intecproof.com</span>
                                        </div>
                                    </div>
                                    <ul class="account-item-list">
                                        <li><a href="#"><span class="ti-user"></span>CUENTA</a></li>
                                        <li><a href="#"><span class="ti-settings"></span>AJUSTES</a></li>
                                        <li><a href="../../includes/logout.php"><span class="ti-power-off"></span>Log
                                                Out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <h1>EDICION EMPLEADO</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">INICIO</a></li>
                                <li class="breadcrumb-item active" aria-current="page">EDICION EMPLEADO&nbsp;&nbsp;</li>
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
                                    <h4><i data-feather="user-check"></i>INFORMACION BASICA</h4>
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
                                                        [
                                                        <?= $sede['iClaveCatalogo'] ?>] -
                                                        <?= $sede['vchDescripcion'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">TIPO DE DOCUMENTO:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="iIdDocumento" name="iIdDocumento">
                                                <option value="">SELECCIONE UN TIPO DE DOCUMENTO</option>
                                                <?php foreach ($resultadoDocumento as $documento): ?>
                                                    <option
                                                        value="<?= $documento['iIdConstante'] . '-' . $documento['iClaveCatalogo'] ?>">
                                                        [
                                                        <?= $documento['iClaveCatalogo'] ?>] -
                                                        <?= $documento['vchDescripcion'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group file-input-wrap">
                                        <label for="up-cv">
                                            <input id="up-cv" type="file">
                                            <i data-feather="upload-cloud"></i>
                                            <span>SUBE TU ARCHIVO <span>(pdf,zip,doc,docx)</span></span>
                                        </label>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">DOCUMENTO PDF:</label>
                                        <div class="col-sm-9">
                                            <input type="file" accept=".pdf" class="button-area" id="documentoPDF"
                                                name="documentoPDF">
                                            <small class=""></small>
                                        </div>
                                    </div>
                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // directorio donde se guardarán los archivos PDF
                                        $directorioDestino = "includes/PDF/";

                                        // verifica si el directorio existe, si no, lo crea
                                        if (!file_exists($directorioDestino)) {
                                            mkdir($directorioDestino, 0777, true);
                                        }

                                        // Itera sobre los campos tipoDocumento y documentoPDF
                                        foreach ($_FILES['DOCUMENTO PDF']['tmp_name'] as $key => $tmp_name) {
                                            // Si hay un archivo cargado para el índice actual
                                            if (!empty($tmp_name)) {
                                                // ombre del archivo en el servidor (ajustarlo)
                                                $nombreArchivo = "documento_pdf_" . time() . "_$key.pdf";

                                                // ruta completa del archivo en el servidor
                                                $rutaCompleta = $directorioDestino . $nombreArchivo;

                                                // mover el archivo cargado al directorio de destino
                                                if (move_uploaded_file($tmp_name, $rutaCompleta)) {
                                                    // Guarda en la base de datos: $_POST['TIPO DE DOCUMENTO'][$key] y $rutaCompleta
                                                    // Puedes usar consultas SQL para insertar estos valores en tu base de datos
                                                    // Ejemplo (usando PDO):
                                                    // $pdo->prepare("INSERT INTO tu_tabla (tipoDocumento, rutaDocumento) VALUES (?, ?)")->execute([$_POST['TIPO DE DOCUMENTO'][$key], $rutaCompleta]);
                                    
                                                    echo "EL ARCHIVO SE CARGÓ CORRECTAMENTE $directorioDestino.";
                                                } else {
                                                    echo "ERROR AL SUBIR EL ARCHIVO.";
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="form-group row" id="documentosContainer">
                                        <!-- Existing document fields -->
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <script>
                                                function enviarFormularios() {
                                                    // Obtener los valores de los elementos del formulario para sede
                                                    var SedeSeleccionada = document.getElementById('iIdSede');
                                                    var SedePartes = SedeSeleccionada.value.split('-');
                                                    var iIdConstanteSede = SedePartes[0];
                                                    var iClaveSede = SedePartes[1];


                                                    // Asignar los valores a los campos ocultos
                                                    document.getElementById('iIdConstanteSede').value = iIdConstanteSede;
                                                    document.getElementById('iClaveSede').value = iClaveSede;

                                                    // Obtener los valores de los elementos del formulario para tipo de documento
                                                    var DocumentoSeleccionado = document.getElementById('iIdDocumento');
                                                    var DocumentoPartes = DocumentoSeleccionado.value.split('-');
                                                    var iIdConstanteDocumento = DocumentoPartes[0];
                                                    var iClaveDocumento = DocumentoPartes[1];



                                                    // Asignar los valores a los campos ocultos
                                                    document.getElementById('iIdConstanteDocumento').value = iIdConstanteDocumento;
                                                    document.getElementById('iClaveDocumento').value = iClaveDocumento;


                                                    function obtenerDatosFormulario(iIdFormulario) {
                                                        var formData = $('#' + iIdFormulario).serializeArray();
                                                        var formDataObj = {};
                                                        $(formData).each(function (i, field) {
                                                            formDataObj[field.name] = field.value;
                                                        });
                                                        return formDataObj;
                                                    }

                                                    var datosPersona = getFormulario('datosPersona');
                                                    var datosDomicilio = getFormulario('datosDomicilio');
                                                    var datosContacto = getFormulario('datosContacto');
                                                    var datosEmpleado = obtenerDatosFormulario('FormEmpleadoAlta');

                                                    let data = {
                                                        datosPersona: JSON.stringify(datosPersona),
                                                        datosDomicilio: JSON.stringify(datosDomicilio),
                                                        datosContacto: JSON.stringify(datosContacto),
                                                        datosEmpleado: JSON.stringify(datosEmpleado)
                                                    };

                                                    console.log(data);

                                                    // Crear una instancia de XMLHttpRequest
                                                    var request = new XMLHttpRequest();

                                                    // Configurar la solicitud
                                                    request.open('POST', 'validarDatosEmpleado.php', true);
                                                    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


                                                    function getFormulario(key) {
                                                        let result = localStorage.getItem(key)
                                                        return JSON.parse(result);
                                                    }

                                                    // Enviar la solicitud
                                                    let json = data;
                                                    request.send(new URLSearchParams(json).toString());
                                                    console.log(json);

                                                    //Obtener la respuesta
                                                    request.onload = function () {
                                                        if (request.status === 200) {
                                                            var respuesta = JSON.parse(request.responseText);
                                                            if (respuesta.bResultado === 1) {
                                                                console.log(respuesta);

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
                                            <button type="button" class="button"
                                                onclick="guardarModificaciones()">GUARDAR</button>
                                            <script>
                                                document.getElementById('botonSiguiente').addEventListener('click', enviarFormularios);
                                            </script>
                                            <button type="button" class="button" onclick="agregarDocumento()">AGREGAR
                                                DOCUMENTO</button>
                                            <button type="reset" class="button">LIMPIAR</button>
                                        </div>
                                    </div>
                                    <script>
                                        function agregarDocumento() {
                                            var contenedor = document.getElementById('documentosContainer');

                                            var nuevoDocumentoContainer = document.createElement('div');
                                            nuevoDocumentoContainer.className = 'col-md-12';

                                            var nuevoTipoDocumento = document.createElement('div');
                                            //nuevoTipoDocumento.className = 'col-md-6';
                                            nuevoTipoDocumento.innerHTML = `
                                                    <label class="col-sm-3 col-form-label">*TIPO DE DOCUMENTO:</label>
                                                        <div class="col-sm-9">
                                                             <select class="form-control" id="ilDocumento" name="TIPO DE DOCUMENTO []">
                                                                 <option value="">SELECCIONE UN TIPO DE DOCUMENTO</option>
                                                                    <?php foreach ($resultadoDocumento as $documento): ?>
                                                                                    <option value="<?= $documento['iIdConstante'] . '-' . $documento['iClaveCatalogo'] ?>">
                                                                                        [<?= $documento['iClaveCatalogo'] ?>] - <?= $documento['vchDescripcion'] ?>
                                                                                    </option>
                                                                    <?php endforeach; ?>
                                                             </select>
                                                        </div>
                                                    `;
                                            var nuevoDocumentoPDF = document.createElement('div');
                                            nuevoDocumentoPDF.className = 'col-md-6';
                                            nuevoDocumentoPDF.innerHTML = `
                                                        <label for="documentoPDF">DOCUMENTO PDF</label>
                                                        <input type="file" accept=".pdf" class="button-area" name="documentoPDF[]">
                                                        <small class=""></small>
                                                    `;

                                            nuevoDocumentoContainer.appendChild(nuevoTipoDocumento);
                                            nuevoDocumentoContainer.appendChild(nuevoDocumentoPDF);

                                            contenedor.appendChild(nuevoDocumentoContainer);
                                        }
                                    </script>
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
    <script>
        function agregarDocumento() {
            var contenedor = document.getElementById('documentosContainer');
            var nuevoTipoDocumento = document.createElement('div');
            nuevoTipoDocumento.className = 'col-md-6';
            nuevoTipoDocumento.innerHTML =
                <?php foreach ($resultadoDocumento as $documento): ?>
                    < option value = "<?= $documento['iIdConstante'] . '-' . $documento['iClaveCatalogo'] ?>" >
                        [<?= $documento['iClaveCatalogo'] ?>] - <?= $documento['vchDescripcion'] ?>
                                    </option >
                <?php endforeach; ?>;
            var nuevoDocumentoPDF = document.createElement('div');
            nuevoDocumentoPDF.className = 'col-md-6';
            nuevoDocumentoPDF.innerHTML =
                '<?php foreach ($resultadoDocumento as $documento): ?>' +
                    '<option value=<"<?= $documento['iIdConstante'] . '-' . $documento['iClaveCatalogo'] ?>">' +
                    '[<?= $documento['iClaveCatalogo'] ?>] - <?= $documento['vchDescripcion'] ?>' +
                    '</option>' +
                    '<?php endforeach; ?>';
            contenedor.appendChild(nuevoTipoDocumento);
            contenedor.appendChild(nuevoDocumentoPDF);
        }

        function guardarModificaciones() {
            // Obtener los valores de los campos que han sido modificados
            var valorCampo1 = document.getElementById('campo1').value;
            var valorCampo2 = document.getElementById('campo2').value;
            // Y así sucesivamente...

            // Crear un objeto con los datos a enviar al servidor
            var datos = {
                campo1: valorCampo1,
                campo2: valorCampo2,
                // Agregar más campos según sea necesario
            };

            // Enviar los datos al servidor utilizando AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'guardar_modificaciones.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Manejar la respuesta del servidor si es necesario
                    alert('Modificaciones guardadas correctamente.');
                }
            };
            xhr.send(JSON.stringify(datos));
        }


    </script>
</body>

</html>