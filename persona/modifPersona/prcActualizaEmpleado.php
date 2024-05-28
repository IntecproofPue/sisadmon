<?php

require_once ('../../includes/load.php');
session_start();

$iTdPersona = $_POST['iTdPersona'];
$vchCalle = $_POST['$vchCalle'];
$vchNumeroExterior = $_POST['vchNumeroExterior'];
$vchNumeroInterior =$_POST['vchNumeroInterior'];
$vchLetra = $_POST['vchLetra'];
$iCodigoPostal = $_POST['iCodigoPostal'];
$vchColonia = $_POST['vchColonia'];
$vchLocalidad = $_POST['vchLocalidad'];
$vchMunicipio = $_POST['vchMunicipio'];
$iIdEntidadFederativa = $_POST['iIdEntidadFederativa'];
$iAgruEntidad = $_POST['iAgruEntidad'];
$iCveEntidad = $_POST['iCveEntidad'];
$iIdUsuarioUltModificacion = $_POST['iIdUsuarioUltModificacion'];
$iIdDomicilio = $_POST['iIdDomicilio'];
$bEstatus = $_POST['bEstatus'];
$iOpcion = $_POST['iOpcion'];
$iProceso = $_POST['iProceso'];
$bResultado = $_POST['bResultado'];



try {
    $conexion = new PDO($dsn, $usuario, $contraseña);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}

// aqui se definen los parámetros del procedimiento almacenado
$params = array(
				'iIdPersona' => 2,
				'vchCalle' => 'MARIANO MATAMOROS',
				'vchNumeroExterior' => 'S/N',
				'vchNumeroInterior' => '512',
				'vchLetra' => 'B',
				'iCodigoPostal' => 72762,
				'vchColonia' => 'ANZURES',
				'vchLocalidad' => 'CHOLULA',
				'vchMunicipio' => 'CHOLULA',
				'iIdEntidadFederativa' => 38,
				'iAgruEntidad' => 4,
				'iCveEntidad' => 21,
				'iIdUsuarioUltModificacion' => 1,
				'iIdDomicilio' => 2,
				'bEstatus' => 1,
				'iOpcion' => 2,
				'iProceso' => 2,
				'@bResultado' => null,
				'@vchCampoError' => null,
				'@vchMensajeError' => null
);

// Prepara la sentencia SQL con el procedimiento almacenado
$sql = "EXEC dbo.prcActualizaDomicilio
										@iIdPersona = :iIdPersona,
										@vchCalle = :vchCalle,
										@vchNumeroExterior = :vchNumeroExterior,
										@vchNumeroInterior = :vchNumeroInterior,
										@vchLetra = :vchLetra,
										@iCodigoPostal = :iCodigoPostal,
										@vchColonia = :vchColonia,
										@vchLocalidad = :vchLocalidad,
										@vchMunicipio = :vchMunicipio,
										@iIdEntidadFederativa = :iIdEntidadFederativa,
										@iAgruEntidad = :iAgruEntidad,
										@iCveEntidad = :iCveEntidad,
										@iIdUsuarioUltModificacion = :iIdUsuarioUltModificacion,
										@iIdDomicilio = :iIdDomicilio,
										@bEstatus = :bEstatus,
										@iOpcion = :iOpcion,
										@iProceso = :iProceso,
										@bResultado = :bResultado OUTPUT,
										@vchCampoError = :vchCampoError OUTPUT,
										@vchMensaje = :vchMensajeError OUTPUT";


$stmt = $conexion->prepare($sql);


$stmt->execute($params);


$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ahora $resultados contiene los resultados del procedimiento almacenado en un array asociativo
print_r($resultados);
?>






DECLARE @bResultado BIT = 0, @vchCampoError VARCHAR(MAX)= '', @vchMensajeError VARCHAR(MAX) = '', @iIdEmpleado INT, @iIdUsuarioUltModificacion INT = 1,
	@idEmpleado INT = 90, @idPersona INT = 382,  @imagen VARBINARY = CONVERT(varbinary(MAX),''), @iNoOperacion INT = -1;

	EXEC prcActualizaEmpleado	@bModificaPersona			= 1,
								@iIdPersona					= @idPersona,
								@vchNombre					= 'ROGRIGO',
								@vchPrimerApellido			= 'VAZQUEZ',
								@vchSegundoApellido			= 'BAUTISTA',
								@vchRFC						= 'VABM910921584',
								@vchCURP					= 'VABM910921HPLNZR99',
								@dFechaNacimiento			= '1991-09-21',
								@iIdGenero					= 15,
								@icveGenero					= 2,
								@iAgruGenero				= 3,
								@iIdNacionalidad			= 58,
								@icveNacionalidad			= 1,
								@iAgruNacionalidad			= 6,
								@iIdTipoPersona				= 61,
								@icvetipoPer				= 1,
								@iAgrutipoPer				= 7,
								@iIdUsoFiscal				= 13,
								@iRegimen					= 606,
								@vchUsoFiscal				= 'D02',
								@iCodigoPostalFiscal		= 72000,
								@bModificaDom				= 1,
								@iIdDomicilio				= 191,
								@vchCalle					= 'AVENIDA DE LA CONCORDIA',
								@vchNumeroExterior			= '2',
								@vchNumeroInterior			= '522',
								@vchLetra					= 'D',
								@iCodigoPostal				= 72890,
								@vchColonia					= 'SAN PEDRO APOSTOL',
								@vchLocalidad				= 'MEXICO',
								@vchMunicipio				= 'TLALPAN',
								@iIdEntidadFederativa		= 18,
								@iCveEntidad				= 1,
								@iAgruEntidad				= 4,
								@bModificaCont				= 0,
								@iIdContacto				= 152,
								@iIdTipoContacto			= 63,
								@iAgruContacto				= 8,
								@iCveContacto				= 1,
								@vchContacto				= 'rodrigo@algo.com',
								@iIdEmpleado				= @idEmpleado,
								@vchNSS						= '4445546854',
								@iIdPuesto					= 2,
								@dFechaIngreso				= '2021-03-25',
								@dFechaBaja					= '1900-01-01',
								@dFechaUltPromocion			= '1900-01-01',
								@iIdSede					= 18,
								@iAgrupadorSede				= 4,
								@iCveSede					= 1,
								@iIdEstatusEmpleado			= 67,
								@iAgrupadorEmpleado			= 9,
								@iCveEmpleado				= 1,
								@vbImagen					= @imagen,
								@iIdContratante				= 368,
								@dFechaReingreso			= '2024-03-03',
								@iOpcion					= 2,						/MODIFICACIÓN DE PERSONA/
								@iProceso					= 2,
								@iIdUsuarioUltModificacion	= @iIdUsuarioUltModificacion,
								@bResultado					= @bResultado OUTPUT,
								@vchCampoError				= @vchCampoError OUTPUT,
								@vchMensaje					= @vchMensajeError OUTPUT

EXEC dbo.prcActualizaDomicilio	@iIdPersona						= 2,
									@vchCalle						= 'MARIANO MATAMOROS',
									@vchNumeroExterior				= 'S/N',
									@vchNumeroInterior				= '512',
									@vchLetra						= 'B',
									@iCodigoPostal					= 72762,
									@vchColonia						= 'ANZURES',
									@vchLocalidad					= 'CHOLULA',
									@vchMunicipio					= 'CHOLULA',
									@iIdEntidadFederativa			= 38,
									@iAgruEntidad					= 4,
									@iCveEntidad					= 21,
									@iIdUsuarioUltModificacion		= 1,
									@iIdDomicilio					= 2,
									@bEstatus						= 1,
									@iOpcion						= 2,
									@iProceso						= 2,
									@bResultado						= @bResultado OUTPUT,
									@vchCampoError					= @vchCampoError OUTPUT,
									@vchMensaje						= @vchMensajeError OUTPUT;