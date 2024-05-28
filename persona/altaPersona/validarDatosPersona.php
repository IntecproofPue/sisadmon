<?php

require_once('../../includes/load.php');
session_start();

$agrupadorNacionalidad = 6;
$agrupadorGenero = 3;
$agrupadorPersona = 7;


$nombre = isset($_POST['nombre'])? $_POST['nombre']:'';
$primerApellido = isset($_POST['primerApellido'])?$_POST['primerApellido']: '';
$segundoApellido = isset($_POST['segundoApellido'])?$_POST['segundoApellido']:'';
$iIdTipoPersona = isset($_POST['iIdTipoPersona'])?$_POST['iIdTipoPersona']: 0;
$iClaveTipoPersona = isset($_POST['iClaveTipoPersona']) ? $_POST['iClaveTipoPersona']: 0;
$rfc = isset($_POST['rfc'])?$_POST['rfc']:'';
$curp = isset($_POST['curp'])?$_POST['curp']:'';
$iIdConstanteGenero = isset($_POST['iIdConstanteGenero'])?$_POST['iIdConstanteGenero']:0;
$iClaveGenero = isset($_POST['iClaveGenero'])?$_POST['iClaveGenero']:0;
$iIdConstanteNacionalidad = isset($_POST['iIdConstanteNacionalidad'])?$_POST['iIdConstanteNacionalidad']:0;
$iClaveNacinalidad = isset($_POST['iClaveNacionalidad'])?$_POST['iClaveNacionalidad']:0;
$fechaNacimiento = isset($_POST['fechaNacimiento'])?$_POST['fechaNacimiento']:'';
$regimenFiscal = isset($_POST['regimenFiscal'])?$_POST['regimenFiscal']:'';
$usoFiscal = isset($_POST['usoFiscal'])?$_POST['usoFiscal']:'';
$codigoPostal = isset($_POST['codigoPostal'])?$_POST['codigoPostal']:0;
$opcion = isset($_POST['opcion'])? $_POST['opcion']: 0;
$proceso = isset($_POST['proceso']) ?$_POST['proceso'] : 0;



$datosPersona = array(
    'vchNombre' => $nombre,
    'vchPrimerApellido' => $primerApellido,
    'vchSegundoApellido' => $segundoApellido,
    'vchRFC' => $rfc,
    'vchCURP' => $curp,
    'dFechaNacimiento' => $fechaNacimiento,
    'iIdGenero' => $iIdConstanteGenero,
    'icveGenero' => $iClaveGenero,
    'iAgruGenero' => $agrupadorGenero,
    'iIdNacionalidad' => $iIdConstanteNacionalidad,
    'icveNacionalidad' => $iClaveNacinalidad,
    'iAgruNacionalidad' => $agrupadorNacionalidad,
    'iIdTipoPersona' => 0,
    'icvetipoPer' => 1,
    'iAgrutipoPer' => $agrupadorPersona,
    'iRegimen' => $regimenFiscal,
    'vchUsoFiscal' => $usoFiscal,
    'iCodigoFiscal' => $codigoPostal,
    'bEstatus' =>1,
    'iOpcion' => $opcion,
    'iProceso' => $proceso,
    'iIdPersona' => 0,
    'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
    'iIdUsoFiscal' => 0,
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => ''
);



$procedureName = "EXEC prcRN_Persona           @vchNombre = ?,
                                               @vchPrimerApellido = ?,
                                               @vchSegundoApellido = ?,
                                               @vchRFC = ?,
                                               @vchCURP = ?,
                                               @dFechaNacimiento = ?,
                                               @iIdGenero = ?,
                                               @icveGenero = ?,
                                               @iAgruGenero = ?,
                                               @iIdNacionalidad = ?,
                                               @icveNacionalidad = ?,
                                               @iAgruNacionalidad = ?,
                                               @iIdTipoPersona = ?,
                                               @icvetipoPer = ?,
                                               @iAgrutipoPer = ?,
                                               @iRegimen = ?,
                                               @vchUsoFiscal = ?, 
                                               @iCodigoFiscal = ?,
                                               @bEstatus = ?,
                                               @iOpcion = ?,
                                               @iProceso = ?,
                                               @iIdPersona = ?, 
                                               @iIdUsuarioUltModificacion = ?,
                                               @iIdUsoFiscal = ?,
                                               @bResultado = ?,
                                               @vchCampoError = ? ,
                                               @vchMensaje = ?
                                                       ";

$params = array(
    $datosPersona['vchNombre'],
    $datosPersona['vchPrimerApellido'],
    $datosPersona['vchSegundoApellido'],
    $datosPersona['vchRFC'],
    $datosPersona['vchCURP'],
    $datosPersona['dFechaNacimiento'],
    $datosPersona['iIdGenero'],
    $datosPersona['icveGenero'],
    $datosPersona['iAgruGenero'],
    $datosPersona['iIdNacionalidad'],
    $datosPersona['icveNacionalidad'],
    $datosPersona['iAgruNacionalidad'],
    $datosPersona['iIdTipoPersona'],
    $datosPersona['icvetipoPer'],
    $datosPersona['iAgrutipoPer'],
    $datosPersona['iRegimen'],
    $datosPersona['vchUsoFiscal'],
    $datosPersona['iCodigoFiscal'],
    $datosPersona['bEstatus'],
    $datosPersona['iOpcion'],
    $datosPersona['iProceso'],
    $datosPersona['iIdPersona'],
    $datosPersona['iIdUsuarioUltModificacion'],
    array(&$datosPersona['iIdUsoFiscal'], SQLSRV_PARAM_OUT),
    array(&$datosPersona['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosPersona['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosPersona['vchMensaje'], SQLSRV_PARAM_OUT)
);

$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

if ($result === false) {
    $errorInformacion = sqlsrv_errors();
    $respuesta   = array (
        'error' => true,
        'mensaje' => $datosPersona['vchMensaje'],
        'campoError' => $datosPersona['vchCampoError'],
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);

} else {
    echo json_encode($datosPersona);
    $_SESSION['iIdPersona'] = $datosPersona['iIdPersona'];
}

sqlsrv_close($GLOBALS['conn']);


