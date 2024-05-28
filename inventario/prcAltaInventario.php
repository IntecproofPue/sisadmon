<?php
require_once('../includes/load.php');
session_start();


$agrupadorProducto = 12;
$agrupadorSubproducto = 13;
$agrupadorMarca = 14;
$agrupadorAsignacion = 17;
$agrupadorTipoPersona = 7;
$agrupadorGenero = 3;


$iIdProducto = isset($_POST['iIdTipoProducto']) ? $_POST['iIdTipoProducto'] : 0;
$iClaveProducto = isset($_POST['iClaveProducto']) ? $_POST['iClaveProducto'] : 0;
$iIdTipoSubproducto = isset($_POST['iIdTipoSubProducto']) ? $_POST['iIdTipoSubProducto'] : 0;
$iClaveSubproducto = isset($_POST['iClaveSubProducto']) ? $_POST['iClaveSubProducto'] : 0;
$iIdMarca = isset($_POST['iIdMarca']) ? $_POST['iIdMarca'] : 0;
$iClaveMarca = isset($_POST['iClaveMarca']) ? $_POST['iClaveMarca'] : 0;
$modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
$serie = isset($_POST['serie']) ? $_POST['serie'] : '';
$iIdTipoAsignacion = isset($_POST['iIdTipoAsignacion']) ? $_POST['iIdTipoAsignacion'] : 0;
$iClaveAsignacion = isset($_POST['iClaveAsignacion']) ? $_POST['iClaveAsignacion'] : 0;
$asignadoA = isset($_POST['asignadoA']) ? $_POST['asignadoA'] : 0;
$proyecto = isset ($_POST['proyecto']) ? $_POST['proyecto'] : 0;
$fechaIngreso = isset($_POST['fechaIngreso']) ? $_POST['fechaIngreso'] : '';
$observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : '';
$bModificaPersona = isset($_POST['bModificaPersona']) ? $_POST['bModificaPersona'] : 0;
$iIdTipoPersona = isset($_POST['iIdTipoPersona']) ? $_POST['iIdTipoPersona'] : 0;
$iClavePersona = isset($_POST['iClavePersona']) ? $_POST['iClavePersona'] : 0;
$iIdGenero = isset($_POST['iIdGenero']) ? $_POST['iIdGenero'] : 0;
$iClaveGenero = isset($_POST['iClaveGenero']) ? $_POST['iClaveGenero'] : 0;
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$primerApellido = isset($_POST['primerApellido']) ? $_POST['primerApellido'] : '';
$segundoApellido = isset($_POST['segundoApellido']) ? $_POST['segundoApellido'] : '';


$datosInventario = array (
    'iIdtipoProducto' => $iIdProducto,
    'iAgruProducto'  => $agrupadorProducto,
    'iCveProducto' => $iClaveProducto,
    'iIdTipoSubproducto' => $iIdTipoSubproducto,
    'iAgruSubProducto' => $agrupadorSubproducto,
    'iCveSubproducto' => $iClaveSubproducto,
    'iIdMarca' => $iIdMarca,
    'iAgruMarca' =>$agrupadorMarca,
    'iCveMarca' => $iClaveMarca,
    'vchModelo' =>$modelo,
    'vchSerie' => $serie,
    'iIdTipoAsignacion' => $iIdTipoAsignacion,
    'iAgruAsignacion' => $agrupadorAsignacion,
    'iCveAsignacion' => $iClaveAsignacion,
    'iIdAsignadoA' =>$asignadoA,
    'iIdProyectoAsignado' => $proyecto,
    'dFechaIngreso' => $fechaIngreso,
    'iidUsuarioUltModificacion' => $_SESSION['user_id'],
    'bInsertaPersona' => $bModificaPersona,
    'iIdTipoPersona' => $iIdTipoPersona,
    'iAgruTipoPersona' =>$agrupadorTipoPersona,
    'iCveTipoPersona' => $iClavePersona,
    'iIdGenero' => $iIdGenero,
    'icveGenero' => $iClaveGenero,
    'iAgruGenero' => $agrupadorGenero,
    'vchNombre' => $nombre,
    'vchPrimerApellido' => $primerApellido,
    'vchSegundoApellido' => $segundoApellido,
    'vchObservacionesInventario' => $observaciones,
    'vchObservaciones' => '',
    'iNoOperacion' => 0,
    'iIdInventario' => 0,
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => ''
);

$procedureName = " EXEC prcAltaInventario
						@iIdtipoProducto					= ? , 
						@iAgruProducto						= ? , 
						@iCveProducto						= ? , 
						@iIdTipoSubproducto					= ? , 
						@iAgruSubProducto					= ? , 
						@iCveSubproducto					= ? , 
						@iIdMarca							= ? , 
						@iAgruMarca							= ? , 
						@iCveMarca							= ? , 
						@vchModelo							= ? , 
						@vchSerie							= ? , 
						@iIdTipoAsignacion					= ? , 
						@iAgruAsignacion					= ? , 
						@iCveAsignacion						= ? , 
						@iIdAsignadoA						= ? , 
						@iIdProyectoAsignado				= ? , 
						@dFechaIngreso						= ? , 
						@iidUsuarioUltModificacion			= ? , 
						@bInsertaPersona					= ? , 
						@iIdTipoPersona						= ? , 
						@iAgruTipoPersona					= ? , 
						@iCveTipoPersona					= ? , 
						@iIdGenero							= ? , 
						@icveGenero							= ? , 
						@iAgruGenero						= ? , 
						@vchNombre							= ? , 
						@vchPrimerApellido					= ? , 
						@vchSegundoApellido					= ? , 
						@vchObservacionesInventario			= ? , 
						@vchObservaciones					= ? , 
						@iNoOperacion						= ? , 
						@iIdInventario						= ? , 
						@bResultado							= ? , 
						@vchCampoError						= ? , 
						@vchMensaje							= ? 
                ";

$params = array(
    $datosInventario['iIdtipoProducto'],
    $datosInventario['iAgruProducto'],
    $datosInventario['iCveProducto'],
    $datosInventario['iIdTipoSubproducto'],
    $datosInventario['iAgruSubProducto'],
    $datosInventario['iCveSubproducto'],
    $datosInventario['iIdMarca'],
    $datosInventario['iAgruMarca'],
    $datosInventario['iCveMarca'],
    $datosInventario['vchModelo'],
    $datosInventario['vchSerie'],
    $datosInventario['iIdTipoAsignacion'],
    $datosInventario['iAgruAsignacion'],
    $datosInventario['iCveAsignacion'],
    $datosInventario['iIdAsignadoA'],
    $datosInventario['iIdProyectoAsignado'],
    $datosInventario['dFechaIngreso'],
    $datosInventario['iidUsuarioUltModificacion'],
    $datosInventario['bInsertaPersona'],
    $datosInventario['iIdTipoPersona'],
    $datosInventario['iAgruTipoPersona'],
    $datosInventario['iCveTipoPersona'],
    $datosInventario['iIdGenero'],
    $datosInventario['icveGenero'],
    $datosInventario['iAgruGenero'],
    $datosInventario['vchNombre'],
    $datosInventario['vchPrimerApellido'],
    $datosInventario['vchSegundoApellido'],
    $datosInventario['vchObservacionesInventario'],
    $datosInventario['vchObservaciones'],
    array(&$datosInventario['iNoOperacion'], SQLSRV_PARAM_OUT),
    array(&$datosInventario['iIdInventario'], SQLSRV_PARAM_OUT),
    array(&$datosInventario['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosInventario['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosInventario['vchMensaje'], SQLSRV_PARAM_OUT),
);


$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

if ($result === false){
    $errorInformacion = sqlsrv_errors();
    $respuesta = array(
       'error' => true,
       'mensaje' => $datosInventario['vchMensaje'],
       'campoError' => $datosInventario['vchCampoError'],
       'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);
}else{
    echo json_encode($datosInventario);
}


sqlsrv_free_stmt($result);

sqlsrv_close($GLOBALS['conn']);

?>
