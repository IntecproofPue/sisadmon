<?php
require_once ('../../includes/load.php');

$nombrePuesto = isset($_POST['nombrePuesto'])? $_POST['nombrePuesto']:'';
$descripcionPuesto = isset($_POST['descripcionPuesto'])?$_POST['descripcionPuesto']: '';
$iIdConstanteNivel = isset($_POST['iIdConstanteNivel'])?$_POST['iIdConstanteNivel']:0;
$iClaveNivel = isset($_POST['iClaveNivel'])? $_POST['iClaveNivel']:0;
$iIdConstanteContratacion = isset($_POST['iIdConstanteContratacion'])?$_POST['iIdConstanteContratacion']:0;
$iClaveContratacion = isset($_POST['iClaveContratacion'])? $_POST['iClaveContratacion']:0;
$iIdConstanteHoras = isset($_POST['iIdConstanteHoras'])? $_POST['iIdConstanteHoras']:0;
$iClaveHoras = isset($_POST['iClaveHoras'])? $_POST['iClaveHoras']:0;
$salarioNeto = isset($_POST['salarioNeto'])? $_POST['salarioNeto']:'';
$salarioFiscal = isset($_POST['salarioFiscal'])? $_POST['salarioFiscal']:'';
$salarioComplementario = isset($_POST['salarioComplementario'])? $_POST['salarioComplementario']:'';



$datosPuesto = array(
    'vchPuesto' => $nombrePuesto,
    'vchDescripcion' => $descripcionPuesto,
    'iIdConstanteNivel' => $iIdConstanteNivel,
    'iAgrupadorNivel' => 22,
    'iCveNivel' => $iClaveNivel,
    'iIdTipoContratacion' => $iIdConstanteContratacion,
    'iAgrupadorContratacion' => 1,
    'iCveContratacion' => $iClaveContratacion,
    'iIdHorasLaborales' => $iIdConstanteHoras,
    'iAgrupadorHoras' => 2,
    'iCveHoras' => $iClaveHoras,
    'mSalarioFiscal' => $salarioFiscal,
    'mSalarioComplemento' => $salarioComplementario,
    'mSalarioNeto' => $salarioNeto,
    'iIdUsuarioUltModif' => 2,
    'iIdPuesto' => 0,
    'bResultado' => false,
    'vchCampoError' =>  '',
    'vchMensaje' => ''
);

$procedureName = "EXEC prcAltaPuesto           @vchPuesto = ?,
                                               @vchDescripcion = ?, 
                                               @iIdTipoContratacion = ?, 
                                               @iAgrupadorContratacion = ?, 
                                               @iCveContratacion = ? ,
                                               @iIdHorasLaborales = ?, 
                                               @iAgrupadorHoras = ?,
                                               @iCveHoras = ?, 
                                               @mSalarioFiscal = ?,
                                               @mSalarioComplemento = ?,
                                               @mSalarioNeto = ?,
                                               @iIdUsuarioUltModif = ? ,
                                               @iIdNivel = ?, 
                                               @iAgrupadorNivel = ?, 
                                               @iCveNivel = ?,
                                               @iIdPuesto = ?, 
                                               @bResultado = ?,
                                               @vchCampoError = ?,
                                               @vchMensaje = ?
                                                       ";

$params = array(
    $datosPuesto['vchPuesto'],
    $datosPuesto['vchDescripcion'],
    $datosPuesto['iIdTipoContratacion'],
    $datosPuesto['iAgrupadorContratacion'],
    $datosPuesto['iCveContratacion'],
    $datosPuesto['iIdHorasLaborales'],
    $datosPuesto['iAgrupadorHoras'],
    $datosPuesto['iCveHoras'],
    $datosPuesto['mSalarioFiscal'],
    $datosPuesto['mSalarioComplemento'],
    $datosPuesto['mSalarioNeto'],
    $datosPuesto['iIdUsuarioUltModif'],
    $datosPuesto['iIdConstanteNivel'],
    $datosPuesto['iAgrupadorNivel'],
    $datosPuesto['iCveNivel'],
    array(&$datosPuesto['iIdPuesto'], SQLSRV_PARAM_OUT, SQLSRV_PHPTYPE_INT),
    array(&$datosPuesto['bResultado'], SQLSRV_PARAM_OUT, SQLSRV_PHPTYPE_INT),
    array(&$datosPuesto['vchCampoError'], SQLSRV_PARAM_OUT, SQLSRV_PHPTYPE_STRING(SQLSRV_ENC_CHAR)),
    array(&$datosPuesto['vchMensaje'], SQLSRV_PARAM_OUT, SQLSRV_PHPTYPE_STRING(SQLSRV_ENC_CHAR))
);


$sql = "EXEC prcAltaPuesto     @vchPuesto = '{$datosPuesto['vchPuesto']}' ,
                               @vchDescripcion = '{$datosPuesto['vchDescripcion']}', 
                               @iIdTipoContratacion = '{$datosPuesto['iIdTipoContratacion']}', 
                               @iAgrupadorContratacion = '{$datosPuesto['iAgrupadorContratacion']}', 
                               @iCveContratacion = '{$datosPuesto['iCveContratacion']}',
                               @iIdHorasLaborales =  '{$datosPuesto['iIdHorasLaborales']}', 
                               @iAgrupadorHoras = '{$datosPuesto['iAgrupadorHoras']}',
                               @iCveHoras = '{$datosPuesto['iCveHoras']}', 
                               @mSalarioFiscal = '{$datosPuesto['mSalarioFiscal']}',
                               @mSalarioComplemento = '{$datosPuesto['mSalarioComplemento']}',
                               @mSalarioNeto = '{$datosPuesto['mSalarioNeto']}',
                               @iIdUsuarioUltModif = '{$datosPuesto['iIdUsuarioUltModif']}' ,
                               @vchCampoError = '{$datosPuesto['vchCampoError']}',
                               @vchMensaje = '{$datosPuesto['vchMensaje']}'
                               ";


$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

if ($result === false) {
    $errorInformacion = sqlsrv_errors();
    $respuesta   = array (
        'error' => true,
        'mensaje' => $datosPuesto['vchMensaje'],
        'campoError' => $datosPuesto['vchCampoError'],
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);

} else {
    echo json_encode($datosPuesto);
}

sqlsrv_free_stmt($result);
sqlsrv_close($GLOBALS['conn']);