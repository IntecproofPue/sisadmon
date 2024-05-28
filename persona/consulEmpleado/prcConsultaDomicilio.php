<?php

require_once ('../../includes/load.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdPersonaDomicilio = $_POST['iIdPersonaDomicilio'];
}

$iIdPersonaDomicilio = is_numeric($iIdPersonaDomicilio) ?$iIdPersonaDomicilio :  0;




$datosConsulta = array(
    'iIdPersonaDomicilio' => $_POST['iIdPersonaDomicilio'],
    'iIdUsuarioUltModificacion' => $_SESSION['user_id']
);


$procedureName = "EXEC prcConsultaDomicilio     @iIdPersona = ?,
                                                @iIdUsuarioUltModificacion = ?
                                                   ";

$params = array(
    $datosConsulta['iIdPersonaDomicilio'],
    $datosConsulta['iIdUsuarioUltModificacion']
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
    $DatosDomicilioConsulta = array();
    do{
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $DatosDomicilioConsulta[] = $row;
        }

    }while (sqlsrv_next_result($result));

    echo json_encode($DatosDomicilioConsulta);
}

sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);