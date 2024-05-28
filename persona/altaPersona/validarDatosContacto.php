<?php
require_once ('../../includes/load.php');
session_start();

$iIdConstanteContacto = isset($_POST['iIdConstanteContacto'])? $_POST['iIdConstanteContacto']:0;
$iClaveContacto = isset($_POST['iClaveContacto'])?$_POST['iClaveContacto']: 0;
$vchContacto = isset($_POST['contacto'])?$_POST['contacto']:'';
$iIdPersona = isset($_POST['persona'])?$_POST['persona']:0;


$datosContacto = array(
    'iIdPersona' => $iIdPersona,
    'iIdTipoContacto' => $iIdConstanteContacto,
    'iAgruContacto' => 8,
    'iCveContacto' => $iClaveContacto,
    'vchContacto' => $vchContacto,
    'bEstatus' => 1,
    'iIdContacto' => 0,
    'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
    'iOpcion' => 1,
    'iProceso' => 2,
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => ''
);
$procedureName = "EXEC prcRN_Contacto          @iIdPersona = ?,
                                               @iIdTipoContacto = ?, 
                                               @iAgruContacto = ?, 
                                               @iCveContacto = ?, 
                                               @vchContacto = ? ,
                                               @bEstatus = ?, 
                                               @iIdContacto = ?,
                                               @iIdUsuarioUltModificacion = ?, 
                                               @iOpcion = ?,
                                               @iProceso = ?,
                                               @bResultado = ?,
                                               @vchCampoError = ? ,
                                               @vchMensaje = ?
                                                       ";


$params = array(
    $datosContacto['iIdPersona'],
    $datosContacto['iIdTipoContacto'],
    $datosContacto['iAgruContacto'],
    $datosContacto['iCveContacto'],
    $datosContacto['vchContacto'],
    $datosContacto['bEstatus'],
    $datosContacto['iIdContacto'],
    $datosContacto['iIdUsuarioUltModificacion'],
    $datosContacto['iOpcion'],
    $datosContacto['iProceso'],
    array(&$datosContacto['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosContacto['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosContacto['vchMensaje'], SQLSRV_PARAM_OUT)
);


$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

if ($result === false) {
    $errorInformacion = sqlsrv_errors();
    $respuesta   = array (
        'error' => true,
        'mensaje' => $datosContacto['vchMensaje'],
        'campoError' => $datosContacto['vchCampoError'],
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);

} else {
    echo json_encode($datosContacto);
}

sqlsrv_close($GLOBALS['conn']);
