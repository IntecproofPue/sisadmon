<?php
    function ObtenerSede(){
        if (isset ($_SESSION['CatConstante'])){
            $datosSede = $_SESSION['CatConstante'];
            $sedeEncontrado = array();

            foreach ($datosSede as $valorSede) {
                if ($valorSede['iAgrupador'] == 4) {
                    $sedeEncontrado [] = $valorSede;
                }
            }
            return $sedeEncontrado;
        } else {
            echo ("No hay datos del Estado de Procedencia");
        }
    }

    function ObtenerTipoDocumento(){
        if (isset ($_SESSION['CatConstante'])){
            $datosDocumentos = $_SESSION['CatConstante'];
            $documentosEncontrados= array();

            foreach ($datosDocumentos as $valorDocumento) {
                if ($valorDocumento['iAgrupador'] == 10) {
                    $documentosEncontrados [] = $valorDocumento;
                }
            }
            return $documentosEncontrados;
        } else {
            echo ("No hay datos del Estado de Procedencia");
        }
    }

    function ObtenerPuesto(){
        $datosPuesto = array (
            'iIdPuesto' => 0 ,
            'vchPuesto' => '',
            'iIdTipoContratacion' => 0,
            'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
            'iOpcion' => 2
        );

        $procedureName = "EXEC prcConsultaPuesto    @iIdPuesto = ?, 
                                                            @vchPuesto = ?, 
                                                            @iIdTipoContratacion = ?,
                                                            @iIdUsuarioUltModificacion  = ?,
                                                            @iOpcion = ?                                                       
                                                        ";

        $params = array(

            $datosPuesto['iIdPuesto'],
            $datosPuesto['vchPuesto'],
            $datosPuesto['iIdTipoContratacion'],
            $datosPuesto['iIdUsuarioUltModificacion'],
            $datosPuesto['iOpcion']
        );

        $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

        $CatPuestos = array();

        if ($result === false){
            die(print_r(sqlsrv_errors(), true));

        } else{
            do{
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $CatPuestos[] = $row;
                }
            }while (sqlsrv_next_result($result));
        }
        return $CatPuestos;

        sqlsrv_close($GLOBALS['conn']);

    }

    function ObtenerAutorizacionContratante(){
        $datosConsulta = array (
            'iIdEmpleado' => 0,
            'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
            'iOpcion' => 2
        );

        $procedureName = "EXEC prcConsultaEmpleado      @iIdEmpleado = ?,
                                                            @iIdUsuarioUltModificacion = ?,
                                                            @iOpcion = ? 
                                                            ";
        $params = array(
            $datosConsulta['iIdEmpleado'],
            $datosConsulta['iIdUsuarioUltModificacion'],
            $datosConsulta['iOpcion']
        );
        $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

        $Contratantes = array();

        if ($result === false){
            die(print_r(sqlsrv_errors(), true));

        } else{
            do{
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $Contratantes[] = $row;
                }
            }while (sqlsrv_next_result($result));
        }
        return $Contratantes;

        sqlsrv_close($GLOBALS['conn']);

    }

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
            echo("No hay datos del género");
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
            echo("No hay datos de la nacionalidad");
        }
    }

    function ObtenerIdTipoPersona()
    {
        if (isset($_SESSION['CatConstante'])) {
            $datosTipoPersona = $_SESSION['CatConstante'];
            $tipoEncontrado = array();

            foreach ($datosTipoPersona as $valorPersona) {
                if ($valorPersona['iAgrupador'] == 7) {
                    $tipoEncontrado[] = $valorPersona;
                }
            }
            return $tipoEncontrado;
        } else {
            echo("No hay datos del género");
        }
    }

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

?>
