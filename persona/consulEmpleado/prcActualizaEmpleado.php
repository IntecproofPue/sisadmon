<?php

require_once ('../../includes/load.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdEmpleado = isset($_POST['empleado']) ? $_POST['empleado'] : 0;
    $dFechaBaja = isset($_POST['fechaBaja']) ? $_POST['fechaBaja'] : '';
    $iOpcion = isset($_POST['opcion']) ? $_POST['opcion'] : 0;
    $iProceso = isset($_POST['proceso']) ? $_POST['proceso'] : 0;
}


$datosActualizacion = array(
    'iIdEmpleado' => $_POST['empleado'],
    'dFechaBaja' => $_POST['fechaBaja'],
    'iOpcion' => $_POST['opcion'],
    'vchObservaciones' => '',
    'iProceso' => $_POST['proceso'],
    'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
    'iNoOperacion' => 0 ,
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => ''
);


$procedureName = "EXEC prcActualizaEmpleado	    
                                                @iIdEmpleado				 = ? ,                                               
                                                @dFechaBaja					 = ? ,                                                
                                                @iOpcion					 = ? ,
                                                @vchObservaciones			 = ? ,
                                                @iProceso					 = ? ,
                                                @iIdUsuarioUltModificacion	 = ? ,
                                                @iNoOperacion				 = ? ,
                                                @bResultado					 = ? ,
                                                @vchCampoError				 = ? ,
                                                @vchMensaje					 = ? 				
                                                   ";


$params = array(
    $datosActualizacion['iIdEmpleado']				,
    $datosActualizacion['dFechaBaja']				,
    $datosActualizacion['iOpcion']					,
    $datosActualizacion['vchObservaciones']			,
    $datosActualizacion['iProceso']					,
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