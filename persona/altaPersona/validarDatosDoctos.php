<?php

require_once ('../../includes/load.php');
session_start();


$iIdEmpleado = $_POST['iIdEmpleado'];
$iIdTipoDocto = $_POST['iIdTipoDocto'];
$iAgruTipDocto = $_POST['iAgruTipDocto'];
$iCveTipoDocto = $_POST['iCveTipoDocto'];
$iIdCategoria = $_POST['iIdCategoria'];
$iAgruCategoria = $_POST['iAgruCategoria'];
$iCveCategoria = $_POST['iCveCategoria'];
$vchArchivo = $_FILES['vchArchivo']['tmp_name'];

// parametros para el llamad al procedimiento almacenado
$params = array(
    array(&$iIdEmpleado, SQLSRV_PARAM_IN),
    array(&$iIdTipoDocto, SQLSRV_PARAM_IN),
    array(&$iAgruTipDocto, SQLSRV_PARAM_IN),
    array(&$iCveTipoDocto, SQLSRV_PARAM_IN),
    array(&$iIdCategoria, SQLSRV_PARAM_IN),
    array(&$iAgruCategoria, SQLSRV_PARAM_IN),
    array(&$iCveCategoria, SQLSRV_PARAM_IN),
    array(&$vchArchivo, SQLSRV_PARAM_IN, SQLSRV_PHPTYPE_STREAM(SQLSRV_ENC_BINARY), SQLSRV_SQLTYPE_VARBINARY('max')),
    array(&$_SESSION['user_id'], SQLSRV_PARAM_IN),
    array(&$iIdEmpleadoDoctos, SQLSRV_PARAM_OUT),
    array(&$bResultado, SQLSRV_PARAM_OUT),
    array(&$vchCampoError, SQLSRV_PARAM_OUT),
    array(&$vchMensaje, SQLSRV_PARAM_OUT)
);


$procedureName = "EXEC prcRN_EmpleadoDocto	(	@iIdEmpleado					INT,
                                                @iIdTipoDocto					INT,
                                                @iAgruTipDocto					INT,
                                                @iCveTipoDocto					INT,
                                                @iIdCategoria					INT,
                                                @iAgruCategoria					INT,
                                                @iCveCategoria					INT,
                                                @vchArchivo						VARBINARY(MAX),
                                                @bActivo						BIT,
                                                @iIdUsuarioUltModificacion		INT,
                                                @iOpcion						INT,
                                                @iIdEmpleadoDoctos				INT = -1 OUTPUT,
                                                @bResultado						BIT = 1 OUTPUT,
                                                @vchCampoError					VARCHAR(MAX) = '' OUTPUT,
                                                @vchMensaje						VARCHAR(MAX) = '' OUTPUT
                                                ";

// ejecuta el llamado al procedimiento almacenado
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
    // Aquí puedes manejar la respuesta de la procedimiento almacenada
    // Por ejemplo, puedes devolver los valores de salida
    $respuesta = array(
        'iIdEmpleadoDoctos' => $iIdEmpleadoDoctos,
        'bResultado' => $bResultado,
        'vchCampoError' => $vchCampoError,
        'vchMensaje' => $vchMensaje
    );
    echo json_encode($respuesta);
}

// No olvides liberar los recursos
sqlsrv_free_stmt($result);
sqlsrv_close($GLOBALS['conn']);