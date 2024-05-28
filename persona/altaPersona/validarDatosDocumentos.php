<?php

require_once('../../includes/load.php');
session_start();

$agrupadorDocumento = 10;


$iIdConstanteDocumento = isset($_POST['iIdConstanteDocumento']) ? $_POST['iIdConstanteDocumento'] : '';
$iClaveDocumento = isset($_POST['iClaveDocumento']) ? $_POST['iClaveDocumento'] : 0;
$iIdEmpleado = isset($_POST['empleado']) ? $_POST['empleado'] : 0;
$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : 1;
$urlArchivoBase64 = isset($_POST['url']) ? $_POST['url'] : '';

$urlVarbinary = base64_decode($urlArchivoBase64);


$datosDocumentos = array(
    'iIdEmpleado' => $iIdEmpleado,
    'iIdTipoDocto' => $iIdConstanteDocumento,
    'iAgrupadorDocto' => $agrupadorDocumento,
    'iClaveDocto' => $iClaveDocumento,
    'vchArchivo' => $urlVarbinary,
    'iIdUsuario' => $_SESSION['user_id'],
    'iOpcion' => $opcion,
    'iIdEmpleadoDoctos' => 0,
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => ''

);


$procedureName = "EXEC prcRN_EmpleadoDocto      @iIdEmpleado	= ?,			
                                                @iIdTipoDocto	= ?,			
                                                @iAgruTipDocto		= ?,		
                                                @iCveTipoDocto		= ?,		
                                                @iIdUsuarioUltModificacion	= ?,
                                                @iOpcion		= ?,			
                                                @iIdEmpleadoDoctos		= ?,	
                                                @bResultado			= ?,		
                                                @vchCampoError		= ?,		
                                                @vchMensaje		= ?	";


$params = array(
    $datosDocumentos['iIdEmpleado'],
    $datosDocumentos['iIdTipoDocto'],
    $datosDocumentos['iAgrupadorDocto'],
    $datosDocumentos['iClaveDocto'],
    //$datosDocumentos['vchArchivo'],
    $datosDocumentos['iIdUsuario'],
    $datosDocumentos['iOpcion'],
    array(&$datosDocumentos['iIdEmpleadoDoctos'], SQLSRV_PARAM_OUT),
    array(&$datosDocumentos['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosDocumentos['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosDocumentos['vchMensaje'], SQLSRV_PARAM_OUT)
);

$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

if ($result === false) {
    $errorInformacion = sqlsrv_errors();
    $respuesta = array(
        'error' => true,
        'mensaje' => $datosDocumentos['vchMensaje'],
        'campoError' => $datosDocumentos['vchCampoError'],
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);

} else {
    echo json_encode($datosDocumentos);
}


sqlsrv_close($GLOBALS['conn']);


