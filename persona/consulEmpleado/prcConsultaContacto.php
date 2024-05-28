<?php

require_once ('../../includes/load.php');
session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdPersonaContacto = $_POST['iIdPersonaContacto'];
}

$iIdPersonaContacto = is_numeric($iIdPersonaContacto) ?$iIdPersonaContacto :  0;



$datosConsulta = array(
    'iIdPersonaContacto' => $_POST['iIdPersonaContacto'],
    'iIdUsuarioUltModificacion' => $_SESSION['user_id']
);


$procedureName = "EXEC prcConsultaContactos	    @iIdPersona = ?,
                                                @iIdUsuarioUltModificacion = ?
                                                   ";

$params = array(
    $datosConsulta['iIdPersonaContacto'],
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
            $DatosContactoConsulta[] = $row;
        }

    }while (sqlsrv_next_result($result));

    echo json_encode($DatosContactoConsulta);
}

sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);