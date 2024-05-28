<?php

require_once('../../includes/load.php');
session_start();


$tipoProducto = isset($_POST['tipoProducto'])? $_POST['tipoProducto']:'';
$AgruProducto = isset($_POST['AgruProducto'])? $_POST['AgruProducto']:'';
$CveProducto = isset($_POST['CveProducto'])? $_POST['CveProducto']:'';
$TipoSubproducto = isset($_POST['TipoSubProducto'])? $_POST['TipoSubProducto']:'';
$AgruSubProducto = isset($_POST['AgruSubProducto'])? $_POST['AgruSubProducto']:'';
$CveSubProducto = isset($_POST['CveSubProducto'])? $_POST['CveSubProducto']:'';
$Marca = isset($_POST['Marca'])? $_POST['Marca']:'';
$AgruMarca = isset($_POST['AgruProducto'])? $_POST['AgruProducto']:'';
$CveMarca = isset($_POST['CveMarca'])? $_POST['CveMarca']:'';
$Modelo = isset($_POST['Modelo'])? $_POST['Modelo']:'';
$Serie = isset($_POST['Serie'])? $_POST['Serie']:'';
$Estatus = isset($_POST['Estatus'])? $_POST['Estatus']:'';
$AgruEstatus = isset($_POST['AgruEstatus'])? $_POST['AgruEstatus']:'';
$CveEstatus = isset($_POST['CveEstatus'])? $_POST['CveEstatus']:'';
$TipoMovto = isset($_POST['TipoMovto'])? $_POST['TipoMovto']:'';
$AgruTipoMovto = isset($_POST['AgruTipoMovto'])? $_POST['AgruTipoMovto']:'';
$CveTipoMovto = isset($_POST['CveTipoMovto'])? $_POST['CveTipoMovto']:'';
$TipoAsignacion = isset($_POST['TipoAsignacion'])? $_POST['TipoAsignacion']:'';
$AgruAsignacion = isset($_POST['AgruAsignacion'])? $_POST['AgruAsignacion']:'';
$CveAsignacion = isset($_POST['CveAsignacion'])? $_POST['CveAsignacion']:'';
$AsignadoA = isset($_POST['AsignadoA'])? $_POST['AsignadoA']:'';
$ProyectoAsignado = isset($_POST['ProyectoAsignado'])? $_POST['ProyectoAsignado']:'';
$FechaIngreso = isset($_POST['FechaIngreso'])? $_POST['FechaIngreso']:'';
$UsuarioUltModificacion = isset($_POST['UsuarioUltModificacion'])? $_POST['UsuarioUltModificacion']:'';
$Inventario = isset($_POST['Inventario'])? $_POST['Inventario']:'';
$Resultado = isset($_POST['Resultado'])? $_POST['Resultado']:'';
$CampoError = isset($_POST['CampoError'])? $_POST['CampoError']:'';
$Mensaje = isset($_POST['Mensaje'])? $_POST['Mensaje']:'';


$datosInventario = array(
    'iIdtipoProducto' => $tipoProducto,
    'iAgruProducto' => $AgruProducto,
    'iCveProducto' => $CveProducto,
    'iIdTipoSubproducto' => $TipoSubproducto,
    'iAgruSubProducto' => $AgruSubProducto,
    'iCveSubproducto' => $CveSubProducto,
    'iIdMarca' => $Marca,
    'iAgruMarca' => $AgruMarca,
    'iCveMarca' => $CveMarca,
    'vchModelo' => $Modelo,
    'vchSerie' => $Serie,
    'iIdEstatus' => $Estatus,
    'iAgruEstatus' => $AgruEstatus,
    'iCveEstatus' => $CveEstatus,
    'iIdTipoMovto' => $TipoMovto,
    'iAgruTipoMovto' => $AgruTipoMovto,
    'iCveTipoMovto' => $CveTipoMovto,
    'iIdTipoAsignacion' => $TipoAsignacion,
    'iAgruAsignacion' => $AgruAsignacion,
    'iCveAsignacion' => $CveAsignacion,
    'iIdAsignadoA' => $AsignadoA,
    'iIdProyectoAsignado' => $ProyectoAsignado,
    'dFechaIngreso' => $FechaIngreso,
    'iidUsuarioUltModificacion' => $UsuarioUltModificacion,
    'iIdInventario' => $Inventario,
    'bResultado' => $Resultado,
    'vchCampoError' => $CampoError,
    'vchMensaje' => $Mensaje,
);

$procedInventario = "EXEC prcAltaInventario     @iIdtipoProducto			= ?,
                                                @iAgruProducto				= ?,
                                                @iCveProducto				= ?,
                                                @iIdTipoSubproducto			= ?,
                                                @iAgruSubProducto			= ?,
                                                @iCveSubproducto			= ?,
                                                @iIdMarca					= ?,
                                                @iAgruMarca					= ?,
                                                @iCveMarca					= ?,
                                                @vchModelo					= ?,
                                                @vchSerie					= ?,
                                                @iIdEstatus					= ?,
                                                @iAgruEstatus				= ?,
                                                @iCveEstatus				= ?,
                                                @iIdTipoMovto				= ?,
                                                @iAgruTipoMovto				= ?,
                                                @iCveTipoMovto				= ?,
                                                @iIdTipoAsignacion			= ?,
                                                @iAgruAsignacion			= ?,
                                                @iCveAsignacion				= ?,
                                                @iIdAsignadoA				= ?,
                                                @iIdProyectoAsignado		= ?,
                                                @dFechaIngreso				= ?,
                                                @iidUsuarioUltModificacion	= ?,
                                                @iIdInventario				= ?,
                                                @bResultado					= ?,
                                                @vchCampoError				= ?,
                                                @vchMensaje					= ?
                                                ";

$parametros = array(
                $datosInventario['iIdtipoProducto'],
                $datosInventario['iAgruProducto'],
                $datosInventario['iCveProducto'],
                $datosInventario['iIdTipoSubproducto'],
                $datosInventario['iAgruSubProducto'],
                $datosInventario['iCveSubproducto'],
                $datosInventario['iIdMarca'],
                $datosInventario['iCveMarca'],
                $datosInventario['vchModelo'],
                $datosInventario['vchSerie'],
                $datosInventario['iIdEstatus'],
                $datosInventario['iAgruEstatus'],
                $datosInventario['iCveEstatus'],
                $datosInventario['iIdTipoMovto'],
                $datosInventario['iAgruTipoMovto'],
                $datosInventario['iCveTipoMovto'],
                $datosInventario['iIdTipoAsignacion'],
                $datosInventario['iAgruAsignacion'],
                $datosInventario['iCveAsignacion'],
                $datosInventario['iIdAsignadoA'],
                $datosInventario['iIdProyectoAsignado'],
                $datosInventario['dFechaIngreso'],
                $datosInventario['iIdUsuarioUltModificacion'],
                $datosInventario['iIdInventario'],
                $datosInventario['bResultado'],
                $datosInventario['iIdUsuarioUltModificacion'],
                $datosInventario['iIdInventario'],
                $datosInventario['bResultado'],
                $datosInventario['vchCampoError'],
            );   //obserrvaciones pendiente por que me manden el campo  var de 300

$result = sqlsrv_query($GLOBALS['conn'], $procedInventario, $parametros);

if ($result === false) {
    $errorInformacion = sqlsrv_errors();
    $respuesta   = array (
        'error' => true,
        'mensaje' => $datosInventario['vchMensaje'],
        'campoError' => $datosInventario['vchCampoError'],
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);

} else {
    echo json_encode($procedInventario);
    $_SESSION('iIdtipoProducto' = $procedInventario['iIdtipoProducto']);
}

sqlsrv_close($GLOBALS['conn']);