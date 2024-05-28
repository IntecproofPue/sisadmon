<?php
require_once('../../includes/pandora.php');
require_once('../../includes/load.php');
session_start();

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



    <script>
        function funcionDesbloquearMensaje() {
            var x = document.getElementById("divOculto");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                //x.style.display = "none";
            }
        }
    </script>



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
                        <a href="../../inicio.php"><img src="../../images/logo-2.png" alt=""></a>
                    </div>
                    <div class="header-top-toggler">
                        <div class="header-top-toggler-button"></div>
                    </div>
                    <div class="top-nav">
                        <div class="dropdown header-top-notification">
                            <a href="#" class="notification-button"> <?php echo $notificacionesTxt; ?> </a>
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
                            <a href="#" class="account-button"><?php echo $miCuentaTxt;  ?></a>
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
                                    <li><a href="#"><span class="ti-settings"></span><?php echo $herramientas;  ?></a></li>
                                    <li><a href="../../includes/logout.php"><span class="ti-power-off"></span> <?php echo $logout; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg cp-nav-2">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                        </ul>
                    </div>
                </nav>
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
                    <h1><?php echo $consultaPersonaEmpleadotxt; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><?php echo $inicioTxt;  ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">REGISTRO DE EMPLEADO&nbsp;&nbsp;</li>
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
                        <?php
                        if (isset($_POST['submitBuscar'])) {
                            $nombreaBuscar = $_POST['nombreaBuscar'];
                            //echo "<br>El nombre a buscar es <b>$nombreaBuscar</b>";

                        if(empty($errors)){
                            $user = searchPersona($nombreaBuscar);
                            $contadodGlobal = $GLOBALS['contador'];
                            $contador= 0;
                            $row0 = 0; //incializando variable para evitar warning
                            for($contador=0 ; $contador<$contadodGlobal; $contador++){
                                //echo "Contador Global =$contadodGlobal, contador= $contador ==== <br>";

                                $row =$GLOBALS['row'.$contador+1];
                                //echo $contador+1 ." bResultado = ".$row['bResultado']."Nombre =".$row['vchNombre']."Apellidos  =".$row['vchPrimerApellido']." ".$row['vchSegundoApellido']."<br>";

                            }

                        }else{
                            echo "erorr====";

                        }
                            if ($row['bResultado']==1) { ?>

                                <div style="background-color: #c82333; text-align: center">
                                    <?php
                                        echo "<i><span style='color: #ededee' size='-2'> $personaEncontradaTxt $coincidenciasTxt</span></i><br />";
                                    ?>
                                </div>

                                <?php

                                for($contador=0 ; $contador<$contadodGlobal; $contador++){
                                    //echo "Contador Global =$contadodGlobal, contador= $contador ==== <br>";

                                    $row =$GLOBALS['row'.$contador+1];
                                    //echo $contador+1 ." bResultado = ".$row['bResultado']."Nombre =".$row['vchNombre']."Apellidos  =".$row['vchPrimerApellido']." ".$row['vchSegundoApellido']."<br>";
                               echo "
                                    <div class='candidate-filter-result'>
                                        <div class='candidate'>
                                            <div class='thumb'>
                                                <a href='#'>
                                                    <img src='../../images/candidate/thumb-1.jpg' class='img-fluid' alt=''>
                                                </a>
                                            </div>
                                            <div class='body'>
                                                <div class='content'>
                                                    <h4><a href='#'>".$row['vchNombre']." ".$row['vchPrimerApellido']." ".$row['vchSegundoApellido']."</a></h4>
                                                    <div class='info'>
                                                        <span class='work-post'><a href='#'><i data-feather='check-square'></i>"."EL PUESTO"."</a></span>
                                                        <span class='location'><a href='#'><i data-feather='map-pin'></i>".$row['vchNacionalidad']."</a></span>
                                                        <span class='location'><a href='#'><i data-feather='phone'></i>".$row['vchNacionalidad']."</a></span>
                                                    </div>
                                                </div>
                                                <div class='button-area'>
                                                    <a href='#'>EDITAR</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ";
 }
                                ?>

                            <?php } else { ?>

                                <div style="background-color: #0c5460; text-align: center">
                                    <?php echo "<i><span style='color: #ebfcff' size='-2'> $personaNoEncontradaTxt $continuaRegistroTxt</span></i><br />"; ?>
                                </div>
                                <div id="divOculto" style="background-color: #c82333; text-align: center; display: none;" >
                                    <i><span id="spanOculto" style='color: #ebfcff' size='-2'></span></i>
                                </div>

                                <?php
                                    $resultadoGenero = ObtenerIdGenero();
                                    $resultadoNacionalidad = ObtenerIdNacionalidad();
                                    $resultadoRegimen = ObtenerIdRegimen();
                                ?>

                                <form class="dashboard-form" id = "FormPersonaAlta">
                                    <div class="dashboard-section basic-info-input">
                                        <h4><i data-feather="user-check"></i>INFORMACION BASICA</h4>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">* NOMBRE (S)</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="nombre" class="form-control" placeholder="NOMBRE"
                                                       min="2" maxlength="150"
                                                       onkeypress="this.value = this.value.toUpperCase();return soloNombre(event)"
                                                       required>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">* PRIMER APELLIDO:</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="primerApellido" class="form-control"
                                                       placeholder="PRIMER APELLIDO" min="2" name="primerApellido"
                                                       maxlength="50"
                                                       onkeypress="this.value = this.value.toUpperCase();return soloNombre(event)"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">SEGUNDO APELLIDO:</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="segundoApellido" class="form-control"
                                                       placeholder="SEGUNDO APELLIDO" min="2" name="segundoApellido"
                                                       maxlength="50"
                                                       onkeypress="this.value = this.value.toUpperCase();return soloNombre(event)"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">* CURP:</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="curp" class="form-control" placeholder="INGRESA CURP"
                                                       name="curp" maxlength="18"
                                                       pattern="[A-Z]{4}[0-9]{6}[HM]{1}[A-Z]{5}[0-9]{2}"
                                                       title="LA CURP DE BE SER DE 18 CARACTERES" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">* GENERO:</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="genero" id="genero" required>
                                                    <option value="" selected>SELECCIONE UN GENERO</option>
                                                    <?php foreach ($resultadoGenero as $genero): ?>
                                                        <option value="<?= $genero['iIdConstante'].'-'.$genero['iClaveCatalogo'] ?>">
                                                            [<?= $genero['iClaveCatalogo'] ?>] - <?= $genero['vchDescripcion'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name = "iIdConstanteGenero" id="iIdConstanteGenero" value="" >
                                            <input type="hidden" name = "iClaveGenero" id="iClaveGenero" value="" >
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">* NACIONALIDAD</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="nacionalidad" id = "nacionalidad" required>
                                                    <option value="" selected>SELECCIONE NACIONALIDAD</option>
                                                    <?php foreach ($resultadoNacionalidad as $nacionalidad): ?>
                                                        <option value="<?= $nacionalidad['iIdConstante'].'-'.$nacionalidad['iClaveCatalogo'] ?>">
                                                            [<?= $nacionalidad['iClaveCatalogo'] ?>] - <?= $nacionalidad['vchDescripcion'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name = "iIdConstanteNacionalidad" id="iIdConstanteNacionalidad" value="" >
                                            <input type="hidden" name = "iClaveNacionalidad" id="iClaveNacionalidad" value="" >
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">* FECHA DE NACIMIENTO:</label>
                                            <div class="col-sm-9">
                                                <input  type="date" id="fechaNacimiento" class="form-control"
                                                       placeholder="FECHA DE NACIMIENTO" name="fechaNacimiento"
                                                       pattern="\d{4}-\d{2}-\d{2}"
                                                       title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)" required
                                                       min="<?php echo $fechaLimiteInferior="1950-01-01"; ?>" max="<?php echo $fechaActual="2024-01-01"; ?>"
                                                       maxlength="10" >
                                                <?php
                                                // Calcular la fecha actual
                                                $fechaActual = date('Y-m-d', strtotime('- 18 years'));
                                                $fechaLimiteInferior = '1950-01-01';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">R.F.C:</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="rfc" class="form-control"
                                                       placeholder="ESCRIBE TU RFC" name="rfc" maxlength="13"
                                                       pattern="[A-Z]{4}[0-9]{6}[HM]{1}[A-Z]{2}" style="text-transform: uppercase"
                                                       onkeyup="this.value = this.value.toUpperCase();" return="soloRfc(event)"  required>
                                            </div>
                                        </div>
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="dashboard-form">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">REGIMEN FISCAL</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="regimenFiscal" id="regimenFiscal"
                                                            onchange="cargarUsoFiscal()">
                                                        <option value="" selected class="form-control">SELECCIONE UN REGIMEN FISCAL</option>
                                                        <!-- Lista desplegable de Regímenes Fiscales -->
                                                        <?php foreach ($resultadoRegimen as $regimen): ?>
                                                            <option value="<?=$regimen['iRegimen'] ?>">
                                                                [<?= $regimen['iRegimen'] ?>] - <?= $regimen['vchDescripcionRegimen'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Lista desplegable de Uso Fiscal (dinámica) -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">USO FISCAL</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="usoFiscal" id="usoFiscal">
                                                        <option value="" selected class="form-control">SELECCIONA UN USO
                                                            FISCAL</option>
                                                    </select>
                                                    <script>
                                                        function cargarUsoFiscal() {
                                                            var regimenSeleccionado = document.getElementById("regimenFiscal").value;
                                                            console.log("Regimen seleccionado: " + regimenSeleccionado);
                                                            var usoFiscalSeleccionado = document.getElementById("usoFiscal");
                                                            console.log("Uso Fiscal seleccionado: " + usoFiscalSeleccionado.value);

                                                            usoFiscalSeleccionado.innerHTML = '<option value="" selected class="form-control">SELECCIONA UN USO FISCAL</option>';

                                                            var opcionesUsos = ObtenerUsosFiscales(regimenSeleccionado);

                                                            for (var i = 0; i < opcionesUsos.length; i++) {
                                                                var opcionUsoFiscal = document.createElement("option");
                                                                opcionUsoFiscal.value = opcionesUsos[i].uso;
                                                                opcionUsoFiscal.textContent = '[' + opcionesUsos[i].uso + '] - ' + opcionesUsos[i].descripcion;
                                                                usoFiscalSeleccionado.add(opcionUsoFiscal);
                                                            }
                                                        }

                                                        function ObtenerUsosFiscales(regimenSeleccionado) {

                                                            var datosUsosFiscales = <?php echo json_encode($_SESSION['RegimenUso']); ?>;
                                                            console.log('El script se está ejecutando.');
                                                            console.log("Datos fiscales: ", datosUsosFiscales);
                                                            var usosFiscales = [];

                                                            for (var i = 0; i < datosUsosFiscales.length; i++) {
                                                                if (datosUsosFiscales[i].iRegimen == regimenSeleccionado) {
                                                                    usosFiscales.push({
                                                                        uso: datosUsosFiscales[i].vchClaveUso,
                                                                        descripcion: datosUsosFiscales[i].vchDescripcionUso
                                                                    });
                                                                }
                                                            }
                                                            console.log("Usos fiscales: ", usosFiscales);
                                                            return usosFiscales;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">CÓDIGO POSTAL FISCAL:</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="CodigoFiscal" class="form-control"
                                                       placeholder="CODIGO POSTAL FISCAL" name="cpfEscrito" maxlength="5"
                                                       onkeypress="return soloNumeros(event)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <script>
                                                    function ValidarDatosPersona() {
                                                        var respuestaFinal = "";

                                                        localStorage.clear(); //Limpiar el localStorage para no almancenar basura

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
                                                            codigoPostal: document.getElementById('CodigoFiscal').value,
                                                            proceso: 2, //alta de la persona desde empleado,
                                                            opcion: 1
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
                                                        datosPersona.onload = function() {
                                                            if (datosPersona.status === 200) {
                                                                var respuesta = JSON.parse(datosPersona.responseText);
                                                                if (respuesta.bResultado === 1) {
                                                                    console.log(respuesta);
                                                                    localStorage.setItem('datosPersona',JSON.stringify(datosFormulario));
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
                                                <button type="button" class="button" id = "botonSiguiente">SIGUIENTE</button>
                                                <script> document.getElementById('botonSiguiente').addEventListener('click', ValidarDatosPersona);</script>
                                                <button type="reset" class="button">LIMPIAR</button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php }
                            ?>
                            <?php
                        } else {
                            ?>

                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="dashboard-form">
                                <div class="dashboard-section basic-info-input">
                                    <h4><i data-feather="user-check"></i>BÚSQUEDA DE PERSONA</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nombre:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                   placeholder="Ingresa el nombre completo" name="nombreaBuscar" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button class="button" type="submit" name="submitBuscar">BUSCAR</button>
                                            <!--<script>
                                                function altaEmpleado() {
                                                    window.location.href = ("altaPersona.php");
                                                }
                                            </script>
                                            <button class="button" type="button" id="nuevoEmpleado" name="nuevoEmpleado">NUEVO EMPLEADO </button>
                                            <script>
                                                document.getElementById('nuevoEmpleado').addEventListener('click', altaEmpleado);
                                            </script> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
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