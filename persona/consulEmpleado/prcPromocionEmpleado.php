<?php

require_once ('../../includes/load.php');
session_start();

$iAgrupadorSede = 4;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdEmpleado = isset($_POST['empleado']) ? $_POST['empleado'] : 0;
    $iIdPuesto = isset($_POST['puesto'])? $_POST['puesto']: 0;
    $dFechaPromocion = isset($_POST['fechaPromocion']) ? $_POST['fechaPromocion']: '';
    $iIdSede = isset($_POST['iIdConstanteSede'])? $_POST['iIdConstanteSede']: 0;
    $iClaveSede = isset($_POST['iClaveSede'])? $_POST['iClaveSede']: 0;
    $iOpcion = isset($_POST['opcion']) ? $_POST['opcion'] : 0;
    $iProceso = isset($_POST['proceso']) ? $_POST['proceso'] : 0;
}


$datosActualizacion = array(
    'iIdEmpleado' => $_POST['empleado'],
    'iIdPuesto' => $_POST['puesto'],
    'dFechaPromocion' => $_POST['fechaPromocion'],
    'iIdSede' => $_POST['iIdConstanteSede'],
    'iAgrupadorSede' => $iAgrupadorSede,
    'iClaveSede' => $_POST['iClaveSede'],
    'iOpcion' => $_POST['opcion'],
    'iProceso' => $_POST['proceso'],
    'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
    'vchObservaciones' => '',
    'iNoOperacion' => 0 ,
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => ''
);


$procedureName = "EXEC prcActualizaEmpleado	    
                                                @iIdEmpleado				= ? ,
                                                @iIdPuesto					= ? ,
                                                @dFechaUltPromocion         = ? ,
                                                @iIdSede					= ? ,
                                                @iAgrupadorSede				= ? ,
                                                @iCveSede					= ? ,
                                                @iOpcion					= ? ,
                                                @vchObservaciones			= ? ,
                                                @iProceso					= ? ,                                               
                                                @iIdUsuarioUltModificacion	= ? ,
                                                @iNoOperacion				= ? ,
                                                @bResultado					= ? ,
                                                @vchCampoError				= ? ,
                                                @vchMensaje					= ? 				
                                                   ";


$params = array(
    $datosActualizacion['iIdEmpleado'],
    $datosActualizacion['iIdPuesto'],
    $datosActualizacion['dFechaPromocion'],
    $datosActualizacion['iIdSede'],
    $datosActualizacion['iAgrupadorSede'],
    $datosActualizacion['iClaveSede'],
    $datosActualizacion['iOpcion'],
    $datosActualizacion['vchObservaciones'],
    $datosActualizacion['iProceso'],
    $datosActualizacion['iIdUsuarioUltModificacion'],
    array(&$datosActualizacion['iNoOperacion'], SQLSRV_PARAM_OUT),
    array(&$datosActualizacion['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosActualizacion['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosActualizacion['vchMensaje'], SQLSRV_PARAM_OUT)
);


$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);


if ($result === false) {
    $errorInformacion = sqlsrv_errors();
    $respuesta   = array (
        'error' => true,
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);
    exit;

} else {

    echo json_encode($datosActualizacion);
}

sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);

