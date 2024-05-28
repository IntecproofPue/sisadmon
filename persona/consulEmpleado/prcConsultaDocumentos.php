<?php

require_once ('../../includes/load.php');
session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdEmpleadoDocumento= $_POST['iIdEmpleadoDocumento'];
}

$iIdEmpleadoDocumento = is_numeric($iIdEmpleadoDocumento) ?$iIdEmpleadoDocumento :  0;



$datosConsulta = array(
    'iIdEmpleadoDocumento' => $_POST['iIdEmpleadoDocumento'],
    'iIdUsuarioUltModificacion' => $_SESSION['user_id']
);


$procedureName = "EXEC prcConsultaDocumentos    @iIdEmpleado = ?,
                                                @iIdUsuarioUltModificacion = ?
                                                   ";

$params = array(
    $datosConsulta['iIdEmpleadoDocumento'],
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
    $DatosDocumentosConsulta = array();
    do{
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $DatosDocumentosConsulta[] = $row;
        }

    }while (sqlsrv_next_result($result));

    echo json_encode($DatosDocumentosConsulta);
}

sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);
