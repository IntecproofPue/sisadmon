<?php

require_once ('../../includes/load.php');
session_start();


$iIdEmpleado = isset($_POST['idEmpleado']) ? $_POST['idEmpleado'] : 0;



$datosEmpleado = array(
    'iIdEmpleado' => $iIdEmpleado,
    'iIdUsuarioUltModificacion' => $_SESSION['user_id']
);

$procedureName = "EXEC prcConsultaEmpleado @iIdEmpleado = ?, 
                                           @iIdUsuarioUltModificacion = ?
                                                   ";

$params = array(
    $datosEmpleado['iIdEmpleado'],
    $datosEmpleado['iIdUsuarioUltModificacion']
);


$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

if ($result === false) {
    $errorInformacion = sqlsrv_errors();
    $respuesta = array(
        'error' => true,
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);
    exit;

} else {
    $_SESSION['EmpleadoRespuesta'] = array();

    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        // Procesar cada fila del conjunto de resultados actual
        $_SESSION['EmpleadoRespuesta'] = $row;
    }
    $ResultadoEmpleado = $_SESSION['EmpleadoRespuesta'];
    echo json_encode($ResultadoEmpleado);
}

sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);