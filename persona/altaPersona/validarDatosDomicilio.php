<?php

    require_once('../../includes/load.php');
    session_start();

    $iIdConstanteEstado = isset($_POST['iIdConstanteEstado'])? $_POST['iIdConstanteEstado']:'';
    $iClaveEstado = isset($_POST['iClaveEstado'])?$_POST['iClaveEstado']: 0;
    $vchMunicipio = isset($_POST['vchMunicipio'])?$_POST['vchMunicipio']:'';
    $vchLocalidad = isset($_POST['vchLocalidad'])?$_POST['vchLocalidad']:'';
    $iCodigoPostal = isset($_POST['codigoPostal'])?$_POST['codigoPostal']:'';
    $vchColonia = isset($_POST['vchColonia'])?$_POST['vchColonia']:'';
    $vchCalle = isset($_POST['vchCalle'])?$_POST['vchCalle']:'';
    $vchLetra = isset($_POST['vchLetra'])?$_POST['vchLetra']:'';
    $vchNoExt = isset($_POST['vchNoExt'])?$_POST['vchNoExt']:'';
    $vchNoInt = isset($_POST['vchNoInt'])?$_POST['vchNoInt']:'';
    $iIdPersona = isset($_POST['persona'])?$_POST['persona']: 0;
    $iIdDomicilio = isset($_POST['domicilio'])?$_POST['domicilio']:0;
    $opcion = isset($_POST['opcion'])?$_POST['opcion']:1;




    $datosDomicilio = array(
                        'iIdPersona' => $iIdPersona,
                        'vchCalle' => $vchCalle,
                        'vchNoExt' => $vchNoExt,
                        'vchNoInt' => $vchNoInt,
                        'vchLetra' => $vchLetra,
                        'codigoPostal' => $iCodigoPostal,
                        'vchColonia' => $vchColonia,
                        'vchLocalidad' => $vchLocalidad,
                        'vchMunicipio' => $vchMunicipio,
                        'estado' => $iIdConstanteEstado,
                        'iAgruEntidad' => 4,
                        'iCveEntidad' => $iClaveEstado,
                        'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
                        'iIdDomicilio' => $iIdDomicilio,
                        'bEstatus' => 1,
                        'iOpcion' => $opcion,
                        'iProceso' => 2,
                        'bResultado' => 0,
                        'vchCampoError' => '',
                        'vchMensaje' => ''
    );


    $procedureName = "EXEC prcRN_Domicilio     @iIdPersona = ?,
                                               @vchCalle = ?,
                                               @vchNumeroExterior = ?,
                                               @vchNumeroInterior = ?,
                                               @vchLetra = ?,
                                               @iCodigoPostal = ?,
                                               @vchColonia = ?,
                                               @vchLocalidad = ?,
                                               @vchMunicipio = ?,
                                               @iIdEntidadFederativa = ?,
                                               @iAgruEntidad = ?,
                                               @iCveEntidad = ?,
                                               @iIdUsuarioUltModificacion = ?,
                                               @iIdDomicilio = ?,
                                               @bEstatus = ?,
                                               @iOpcion = ?,
                                               @iProceso = ?,
                                               @bResultado = ?,
                                               @vchCampoError = ? ,
                                               @vchMensaje = ?
                                                       ";

    $params = array(
        $datosDomicilio['iIdPersona'],
        $datosDomicilio['vchCalle'],
        $datosDomicilio['vchNoExt'],
        $datosDomicilio['vchNoInt'],
        $datosDomicilio['vchLetra'],
        $datosDomicilio['codigoPostal'],
        $datosDomicilio['vchColonia'],
        $datosDomicilio['vchLocalidad'],
        $datosDomicilio['vchMunicipio'],
        $datosDomicilio['estado'],
        $datosDomicilio['iAgruEntidad'],
        $datosDomicilio['iCveEntidad'],
        $datosDomicilio['iIdUsuarioUltModificacion'],
        $datosDomicilio['iIdDomicilio'],
        $datosDomicilio['bEstatus'],
        $datosDomicilio['iOpcion'],
        $datosDomicilio['iProceso'],
        array(&$datosDomicilio['bResultado'], SQLSRV_PARAM_OUT),
        array(&$datosDomicilio['vchCampoError'], SQLSRV_PARAM_OUT),
        array(&$datosDomicilio['vchMensaje'], SQLSRV_PARAM_OUT)
    );

    $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

    if ($result === false) {
        $errorInformacion = sqlsrv_errors();
        $respuesta   = array (
            'error' => true,
            'mensaje' => $datosDomicilio['vchMensaje'],
            'campoError' => $datosDomicilio['vchCampoError'],
            'sqlError' => $errorInformacion
        );
        echo json_encode($respuesta);

    } else {
        echo json_encode($datosDomicilio);
    }


    sqlsrv_close($GLOBALS['conn']);


