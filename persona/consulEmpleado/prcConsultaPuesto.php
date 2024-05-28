<?php

require_once ('../../includes/load.php');
session_start();

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdPuesto = $_POST['iIdPuesto'];
}

$iIdPuesto = is_numeric($iIdPuesto) ?$iIdPuesto :  0;

$datosConsulta = array(
    'iIdPuesto' => $_POST['iIdPuesto'],
    'vchPuesto' => '',
    'iIdTipoContratacion' => 0,
    'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
    'iOpcion' => 1
);


$procedureName = "EXEC prcConsultaPuesto     @iIdPuesto = ?,
                                             @vchPuesto = ? , 
                                             @iIdTipoContratacion = ?, 
                                             @iIdUsuarioUltModificacion = ?, 
                                             @iOpcion = ?
                                                   ";
$params = array(
    $datosConsulta['iIdPuesto'],
    $datosConsulta['vchPuesto'],
    $datosConsulta['iIdTipoContratacion'],
    $datosConsulta['iIdUsuarioUltModificacion'],
    $datosConsulta['iOpcion']
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
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $DatosDomicilioConsulta = $row;
        }

    echo json_encode($DatosDomicilioConsulta);
}

var_dump($DatosDomicilioConsulta);

sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);
