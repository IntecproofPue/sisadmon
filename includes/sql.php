<?php
  require_once('load.php');



  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
       $sql = "EXEC prcAutenticacionUsuario @vchUsuario='$username', 
                                            @vbPass ='$password'
       ";
       //echo "<br>Voy a ejecutar la consulta: <b>$sql</b>";
       $stmt = sqlsrv_query($GLOBALS['conn'], $sql);
       //echo "<br>===Contenido del smt :<br>";
       //print_r($stmt);
       //echo "===<br>";

       if ($stmt === false) {
           die(print_r(sqlsrv_errors(), true));
       }

       $GLOBALS['rolesUser'] = array();

        // Fetch the output
       do {
           while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
               // Procesar cada fila del conjunto de resultados actual
               $GLOBALS['rolesUser'][] = $row;

           }
       } while (sqlsrv_next_result($stmt));

       //var_dump($GLOBALS['rolesUser']);

// Close statement and connection
       sqlsrv_free_stmt($stmt);
       sqlsrv_close($GLOBALS['conn']);


    return false;
   }




function obtenerUsuario($idUsuario='') {
    $sql = "select per.vchNombre as nombrePersona, cont.vchContacto contacto
                from CatGralUsuario us
                    join Persona per ON us.iIdPersona=per.iIdPersona
                    join PersonaContacto cont ON per.iIdPersona=cont.iIdPersona
                where per.iIdPersona=$idUsuario and cont.iIdTipoContacto=63 and cont.bActivo = 1";

    //echo "<br>Voy a ejecutar la consulta: <b>$sql</b>";
    $stmt = sqlsrv_query($GLOBALS['conn'], $sql);
    //echo "<br>===Contenido del smt :<br>";
    //print_r($stmt);
    //echo "===<br>";

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

// Fetch the output
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        //echo "<br><br>Contenido del ROW<br>";
        //print_r($row);
        //echo "<br><br>Tamaño del ROW<br>";
        //echo sizeof($row);
        //echo "<br><br>";
        //var_dump($row);
        $GLOBALS['rowObtenerNombre']=$row;


    }

// Close statement and connection
    sqlsrv_free_stmt($stmt);
   // sqlsrv_close($GLOBALS['conn']);


    return false;
}

function searchPersona($vchCadena='') {
    $sql = "EXEC prcConsultaPersona     @iIdPersona = -1,   
                                    @vchCadena = '$vchCadena', 
                                    @iIdUsuarioUltModificacion = '" . $_SESSION['user_id'] . "'";
    //echo "<br>Voy a ejecutar la consulta: <b>$sql</b><br>";
    $stmt = sqlsrv_query($GLOBALS['conn'], $sql);
    //echo "<br>===Contenido del smt :<br>";
    //print_r($stmt);
    //echo "===<br>";

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

// Fetch the output
    $contador =0;

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
       // echo"<br>================INCIO DEL WHILE==========================<br>";
        $contador=$contador+1;
       // echo "Valor del contador= $contador <bR>";
       // echo "<br><br>Contenido del ROW<br>";
       // print_r($row);
       // echo "<br><br>Tamaño del ROW<br>";
       // echo sizeof($row);
       // echo "<br><br>";
       // var_dump($row);
        $GLOBALS['row'.$contador]=$row;

       // echo "<br>VAlor de Global ROW".$contador."<br>";
       // print_r($GLOBALS['row'.$contador]);
        $GLOBALS['contador']=$contador;

       // echo"<br>===================FIN WHILE=======================<br>";

    }


    /*function EjecutarConstante()
    {

        $datosCatConstante = array(
            'iOpcion' => 4,
            'iAgrupador' => 0,
            'iClaveCatalogo' => 0,
            'iIdConstante' => 0
        );

        $procedureName = "EXEC prcConsultaCatConstante  @iOpcion = ?,
                                                        @iAgrupador = ?, 
                                                        @iClave = ?, 
                                                        @iIdConstante = ? 
                                                    ";

        $params = array(
            $datosCatConstante['iOpcion'],
            $datosCatConstante['iAgrupador'],
            $datosCatConstante['iClaveCatalogo'],
            $datosCatConstante['iIdConstante']
        );

        $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

        $CatConstante = array();

        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));

        } else {
            do {
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $CatConstante[] = $row;
                }
            } while (sqlsrv_next_result($result));
        }
        return $CatConstante;

        sqlsrv_close($GLOBALS['conn']);
    }

    $_SESSION['CatConstante'] = EjecutarConstante();*/



    function EjecutarRegimenUso()
    {

        $datosRegimenUso = array(
            'iOpcion' => 1,
            'iIdTipoPersona' => 61
        );

        $procedureName = "EXEC prcConsultaRegimenUso    @iOpcion = ?,
                                                        @iIdTipoPersona = ?
                                                        ";

        $params = array(
            $datosRegimenUso['iOpcion'],
            $datosRegimenUso['iIdTipoPersona']
        );

        $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

        $RegimenUso = array();

        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));

        } else {
            do {
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $RegimenUso[] = $row;
                }
            } while (sqlsrv_next_result($result));
        }

        return $RegimenUso;

        sqlsrv_close($conn);
    }

    $_SESSION['RegimenUso'] = EjecutarRegimenUso();


    function ObtenerIdGenero()
    {
        if (isset($_SESSION['CatConstante'])) {
            $datosGenero = $_SESSION['CatConstante'];
            $generoEncontrado = array();

            foreach ($datosGenero as $valorGenero) {
                if ($valorGenero['iAgrupador'] == 3) {
                    $generoEncontrado[] = $valorGenero;
                }
            }
            return $generoEncontrado;
        } else {
            echo ("No hay datos del género");
        }
    }



    function obtenerIdNacionalidad()
    {
        if (isset($_SESSION['CatConstante'])) {
            $datosNacionalidad = $_SESSION['CatConstante'];
            $nacionalidadEncontrada = array();

            foreach ($datosNacionalidad as $valorNacionalidad) {
                if ($valorNacionalidad['iAgrupador'] == 6) {
                    $nacionalidadEncontrada[] = $valorNacionalidad;
                }
            }
            return $nacionalidadEncontrada;
        } else {
            echo ("No hay datos de la nacionalidad");
        }
    }



    function ObtenerIdRegimen()
    {
        $datosRegimen = $_SESSION['RegimenUso'];
        $RegimenEncontrado = array();

        foreach ($datosRegimen as $valorRegimen) {
            $idRegimen = $valorRegimen['iIdRegimenFiscal'];
            $RegimenEncontrado[$idRegimen] = $valorRegimen;
        }


        return array_values($RegimenEncontrado);
    }


    function ObtenerEstadoProcedencia(){
        $agrupadorEstado = 4;
        if (isset ($_SESSION['CatConstante'])){
            $datosEdoProcedencia = $_SESSION['CatConstante'];
            $estadoEncontrado = array();


            foreach ($datosEdoProcedencia as $valorEstado) {
                if ($valorEstado['iAgrupador'] == $agrupadorEstado) {
                    $estadoEncontrado [] = $valorEstado;
                }
            }
            return $estadoEncontrado;
        } else {
            echo ("No hay datos del Estado de Procedencia");
        }
    }


    function ObtenerTipoContacto(){
        if (isset ($_SESSION['CatConstante'])){
            $datosContacto = $_SESSION['CatConstante'];
            $contactoEncontrado = array();

            foreach ($datosContacto as $valorContacto) {
                if ($valorContacto['iAgrupador'] == 8) {
                    $contactoEncontrado [] = $valorContacto;
                }
            }
            return $contactoEncontrado;
        } else {
            echo ("No hay datos del Tipo de contacto");
        }
    }


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

    function ObtenerTipoPersona()
    {
        if (isset($_SESSION['CatConstante'])) {
            $datosTipoPersona = $_SESSION['CatConstante'];
            $PersonaEncontrada = array();

            foreach ($datosTipoPersona as $valorTipoPersona) {
                if ($valorTipoPersona['iAgrupador'] == 7) {
                    $PersonaEncontrada[] = $valorTipoPersona;
                }
            }
            return $PersonaEncontrada;
        } else {
            echo ("No hay datos de la Persona");
        }
    }


// Close statement and connection
    sqlsrv_free_stmt($stmt);
 //   sqlsrv_close($GLOBALS['conn']);


    return false;
}


?>
