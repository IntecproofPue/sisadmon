<?php

require_once ('../../includes/load.php');
session_start();



$vchRFC = $_POST['rfc'];
$iIdPuesto = $_POST['iIdPuesto'];
$iIdSede = $_POST['iIdSede'];
$vchNombre = $_POST['nombre'];




$vchRFC = is_string($vchRFC) ? $vchRFC: '';
$iIdPuesto = is_numeric($iIdPuesto) ? $iIdPuesto : 0;
$iIdSede = is_numeric($iIdSede) ? $iIdSede : 0;
$vchNombre = is_string($vchNombre) ? $vchNombre: '';


$datosEmpleado = array(
    'vchNombre' => $vchNombre,
    'vchRFC' => $vchRFC,
    'iIdPuesto' => $iIdPuesto,
    'iIdSede' => $iIdSede,
    'iIdUsuarioUltModificacion' => $_SESSION['user_id']
);


$procedureName = "EXEC prcConsultaEmpleadoMasivo    @vchNombre = ?,
                                                    @vchRFC = ?, 
                                                    @iIdPuesto = ?, 
                                                    @iIdSede = ?, 
                                                    @iIdUsuarioUltModificacion = ?
                                                   ";

$params = array(
    $datosEmpleado['vchNombre'],
    $datosEmpleado['vchRFC'],
    $datosEmpleado['iIdPuesto'],
    $datosEmpleado['iIdSede'],
    $datosEmpleado['iIdUsuarioUltModificacion']
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
    $DatosEmpleadoMasivo = array();
    $contador = 0;

    do{
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $DatosEmpleadoMasivo[] = $row;
            $contador = $contador +1;
        }

    }while (sqlsrv_next_result($result));

    echo json_encode($DatosEmpleadoMasivo);
    $GLOBALS['contadorEmpleado'] = $contador;



}


sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);