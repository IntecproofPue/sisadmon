<?php

    require_once ('../../includes/load.php');
    session_start();

    $datosPersona = json_decode(isset($_POST['datosPersona'])? $_POST['datosPersona']:'', true);
    $datosDomicilio = json_decode(isset($_POST['datosDomicilio'])? $_POST['datosDomicilio']:'', true);
    $datosContacto = json_decode(isset($_POST['datosContacto'])? $_POST['datosContacto']:'', true);
    $datosEmpleado = json_decode(isset($_POST['datosEmpleado'])? $_POST['datosEmpleado']:'', true);


    $datosEmpleadoConsulta= array(
        'iIdPersona' => 0,
        'vchNombre' => $datosPersona['nombre'],
        'vchPrimerApellido' => $datosPersona['primerApellido'],
        'vchSegundoApellido' => $datosPersona['segundoApellido'],
        'vchRFC' => $datosPersona['rfc'],
        'vchCURP' => $datosPersona['curp'],
        'dFechaNacimiento' => $datosPersona['fechaNacimiento'],
        'iIdGenero' => $datosPersona['iIdConstanteGenero'],
        'iAgrupadorGenero' => 3,
        'iClaveGenero' => $datosPersona['iClaveGenero'],
        'iIdNacionalidad' => $datosPersona['iIdConstanteNacionalidad'],
        'iAgrupadorNacionalidad' => 6,
        'iClaveNacionalidad' => $datosPersona['iClaveNacionalidad'],
        'iIdTipoPersona' => 61,
        'iAgrupadorTipoPersona' => 7,
        'iClaveTipoPersona' => 1,
        'iRegimen' => $datosPersona['regimenFiscal'],
        'vchUsoFiscal' => $datosPersona['usoFiscal'],
        'iCodigoPostalFiscal' => $datosPersona['codigoPostal'],
        'vchCalle' => $datosDomicilio['vchCalle'],
        'vchNumeroInterior' => $datosDomicilio['vchNoInt'],
        'vchNumeroExterior' => $datosDomicilio['vchNoExt'],
        'vchLetra' => $datosDomicilio['vchLetra'],
        'iCodigoPostal' => $datosDomicilio['codigoPostal'],
        'vchColonia' => $datosDomicilio['vchColonia'],
        'vchLocalidad' => $datosDomicilio['vchLocalidad'],
        'vchMunicipio' => $datosDomicilio['vchMunicipio'],
        'iIdEntidadFederativa' => $datosDomicilio['iIdConstanteEstado'],
        'iAgrupadorEntidad' => 4,
        'iClaveEntidad' => $datosDomicilio['iClaveEstado'],
        'iIdTipoContacto' => $datosContacto['iIdConstanteContacto'],
        'iAgrupadorContacto' => 8,
        'iClaveContacto' => $datosContacto['iClaveContacto'],
        'vchContacto' => $datosContacto['contacto'],
        'vchNSS' => $datosEmpleado['vchNSS'],
        'iIdPuesto' => $datosEmpleado['iIdPuesto'],
        'dFechaIngreso' => $datosEmpleado['fechaIngreso'],
        'iIdSede' => $datosEmpleado['iIdConstanteSede'],
        'iAgrupadorSede' => 4,
        'iClaveSede' =>$datosEmpleado['iClaveSede'],
        'iIdContratante' => $datosEmpleado['iIdPersonaContratante'],
        'iIdUsuario' => $_SESSION['user_id'],
        'vchObservaciones' => '',
        'iNoOperacion' => 0,
        'iIdEmpleado' => 0,
        'bResultado' => 0,
        'vchCampoError' => '',
        'vchMensaje' => ''
    );

    $procedureName = "EXEC prcAltaEmpleado      @iIdPersona				= ? ,
                                                @vchNombre				= ? ,
                                                @vchPrimerApellido		= ? ,
                                                @vchSegundoApellido		= ? ,
                                                @vchRFC					= ? ,
                                                @vchCURP				= ? ,
                                                @dFechaNacimiento		= ? ,
                                                @iIdGenero				= ? ,
                                                @iAgrupadorGenero		= ? , 
                                                @iClaveGenero			= ? , 
                                                @iIdNacionalidad		= ? ,
                                                @iAgrupadorNacionalidad	= ? , 
                                                @iClaveNacionalidad		= ? , 
                                                @iIdTipoPersona			= ? ,
                                                @iAgrupadorTipoPersona	= ? , 
                                                @iClaveTipoPersona		= ? , 
                                                @iRegimen				= ? , 
                                                @vchUsoFiscal			= ? , 
                                                @iCodigoPostalFiscal	= ? ,
                                                @vchCalle				= ? ,
                                                @vchNumeroInterior		= ? ,
                                                @vchNumeroExterior		= ? ,
                                                @vchLetra				= ? ,
                                                @iCodigoPostal			= ? ,
                                                @vchColonia				= ? ,
                                                @vchLocalidad			= ? ,
                                                @vchMunicipio			= ? ,
                                                @iIdEntidadFederativa	= ? ,
                                                @iAgrupadorEntidad		= ? , 
                                                @iClaveEntidad			= ? ,
                                                @iIdTipoContacto		= ? ,
                                                @iAgrupadorContacto		= ? , 
                                                @iClaveContacto			= ? , 
                                                @vchContacto			= ? ,
                                                @vchNSS                 = ? ,
                                                @iIdPuesto				= ? ,
                                                @dFechaIngreso			= ? , 
                                                @iIdSede				= ? ,
                                                @iAgrupadorSede			= ? ,
                                                @iClaveSede				= ? , 
                                                @iIdContratante         = ? ,
                                                @iIdUsuario				= ? , 
                                                @vchObservaciones       = ? ,
                                                @iNoOperacion           = ? , 
                                                @iIdEmpleado			= ? , 
                                                @bResultado				= ? , 
                                                @vchCampoError			= ? , 
                                                @vchMensaje				= ?
                                                       ";

    $params = array(
        $datosEmpleadoConsulta['iIdPersona'],
        $datosEmpleadoConsulta['vchNombre'],
        $datosEmpleadoConsulta['vchPrimerApellido'],
        $datosEmpleadoConsulta['vchSegundoApellido'],
        $datosEmpleadoConsulta['vchRFC'],
        $datosEmpleadoConsulta['vchCURP'],
        $datosEmpleadoConsulta['dFechaNacimiento'],
        $datosEmpleadoConsulta['iIdGenero'],
        $datosEmpleadoConsulta['iAgrupadorGenero'],
        $datosEmpleadoConsulta['iClaveGenero'],
        $datosEmpleadoConsulta['iIdNacionalidad'],
        $datosEmpleadoConsulta['iAgrupadorNacionalidad'],
        $datosEmpleadoConsulta['iClaveNacionalidad'],
        $datosEmpleadoConsulta['iIdTipoPersona'],
        $datosEmpleadoConsulta['iAgrupadorTipoPersona'],
        $datosEmpleadoConsulta['iClaveTipoPersona'],
        $datosEmpleadoConsulta['iRegimen'],
        $datosEmpleadoConsulta['vchUsoFiscal'],
        $datosEmpleadoConsulta['iCodigoPostalFiscal'],
        $datosEmpleadoConsulta['vchCalle'],
        $datosEmpleadoConsulta['vchNumeroInterior'],
        $datosEmpleadoConsulta['vchNumeroExterior'],
        $datosEmpleadoConsulta['vchLetra'],
        $datosEmpleadoConsulta['iCodigoPostal'],
        $datosEmpleadoConsulta['vchColonia'],
        $datosEmpleadoConsulta['vchLocalidad'],
        $datosEmpleadoConsulta['vchMunicipio'],
        $datosEmpleadoConsulta['iIdEntidadFederativa'],
        $datosEmpleadoConsulta['iAgrupadorEntidad'],
        $datosEmpleadoConsulta['iClaveEntidad'],
        $datosEmpleadoConsulta['iIdTipoContacto'],
        $datosEmpleadoConsulta['iAgrupadorContacto'],
        $datosEmpleadoConsulta['iClaveContacto'],
        $datosEmpleadoConsulta['vchContacto'],
        $datosEmpleadoConsulta['vchNSS'],
        $datosEmpleadoConsulta['iIdPuesto'],
        $datosEmpleadoConsulta['dFechaIngreso'],
        $datosEmpleadoConsulta['iIdSede'],
        $datosEmpleadoConsulta['iAgrupadorSede'],
        $datosEmpleadoConsulta['iClaveSede'],
        $datosEmpleadoConsulta['iIdContratante'],
        $datosEmpleadoConsulta['iIdUsuario'],
        $datosEmpleadoConsulta['vchObservaciones'],
        array(&$datosEmpleadoConsulta['iNoOperacion'], SQLSRV_PARAM_OUT, SQLSRV_PHPTYPE_INT),
        array(&$datosEmpleadoConsulta['iIdEmpleado'], SQLSRV_PARAM_OUT, SQLSRV_PHPTYPE_INT),
        array(&$datosEmpleadoConsulta['bResultado'], SQLSRV_PARAM_OUT,SQLSRV_PHPTYPE_INT),
        array(&$datosEmpleadoConsulta['vchCampoError'], SQLSRV_PARAM_OUT, SQLSRV_PHPTYPE_STRING(SQLSRV_ENC_CHAR)),
        array(&$datosEmpleadoConsulta['vchMensaje'], SQLSRV_PARAM_OUT, SQLSRV_PHPTYPE_STRING(SQLSRV_ENC_CHAR))
    );


    $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

    if ($result === false) {
        $errorInformacion = sqlsrv_errors();
        $respuesta   = array (
            'error' => true,
            'mensaje' => mb_convert_encoding($datosEmpleadoConsulta['vchMensaje'], "UTF-8", "ISO-8859-1"),
            'campoError' => mb_convert_encoding($datosEmpleadoConsulta['vchCampoError'], "UTF-8", "ISO-8859-1"),
            'sqlError' => $errorInformacion
        );
        echo json_encode($respuesta);

    } else {
        echo json_encode($datosEmpleadoConsulta);
    }

    sqlsrv_close($GLOBALS['conn']);