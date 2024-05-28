<?php
    require_once ('../../includes/load.php');

    session_start();

    var_dump($_POST);

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $iIdContacto = isset($_POST['iIdContacto']) ? $_POST['iIdContacto']: 0;
        $iProceso  = isset ($_POST['proceso'])? $_POST ['proceso']: 0;
        $iNoOperacion = isset($_POST['operacion'])? $_POST['operacion']:0;
    }


    $datosBajaContacto = array (
        'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
        'iIdContacto' => $iIdContacto,
        'iProceso' => $iProceso,
        'vchObservaciones' => '',
        'iNoOperacion' => $iNoOperacion,
        'bResultado' => 0,
        'vchCampoError' => '',
        'vchMensaje' => ''
    );

    $procedureName = "EXEC prcActualizaContacto     @iIdUsuarioUltModificacion		= ?,
                                                    @iidContacto					= ?,
                                                    @iProceso						= ?, 
                                                    @vchObservaciones				= ?, 
                                                    @iNoOperacion					= ?, 
                                                    @bResultado						= ?,
                                                    @vchCampoError					= ?,
                                                    @vchMensaje						= ?
                          ";


    $params = array(
        $datosBajaContacto['iIdUsuarioUltModificacion'],
        $datosBajaContacto['iIdContacto'],
        $datosBajaContacto['iProceso'],
        $datosBajaContacto['vchObservaciones'],
        $datosBajaContacto['iNoOperacion'],
        array(&$datosBajaContacto['bResultado'], SQLSRV_PARAM_OUT),
        array(&$datosBajaContacto['vchCampoError'], SQLSRV_PARAM_OUT),
        array(&$datosBajaContacto['vchMensaje'], SQLSRV_PARAM_OUT)
    );

    $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

    if ($result === false){
        $errorInformacion = sqlsrv_errors();
        $respuesta = array(
           'error' => true,
           'sqlError' => $errorInformacion
        );
        echo json_encode($datosBajaContacto);
        exit;
    }else {
        echo json_encode($datosBajaContacto);
    }

    sqlsrv_free_stmt($result);

    sqlsrv_close($GLOBALS['conn']);

?>