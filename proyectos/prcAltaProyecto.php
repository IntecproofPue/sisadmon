<?php

require_once('../../includes/load.php');
session_start();

// Decodificar los datos enviados por AJAX
$datosProyecto = json_decode(isset($_POST['datosProyecto']) ? $_POST['datosProyecto'] : '', true);

// Definir los parámetros para el procedimiento almacenado
$parametros = array(
    $datosProyecto['vchNombre'],
    $datosProyecto['vchNombreCorto'],
    $datosProyecto['iIdTipoCliente'],
    $datosProyecto['iAgruTipoCliente'],
    $datosProyecto['iCveTipoCliente'],
    $datosProyecto['vchNombreCliente'],
    $datosProyecto['iIdControlProyecto'],
    $datosProyecto['iAgruControlProyecto'],
    $datosProyecto['iCveControlProyecto'],
    $datosProyecto['dFechaInicioProyecto'],
    $datosProyecto['dFechaFinProyecto'],
    $datosProyecto['iIdEstatus'],
    $datosProyecto['iAgruEstatus'],
    $datosProyecto['iCveEstatus'],
    $datosProyecto['iIdPrioridad'],
    $datosProyecto['iAgruPrioridad'],
    $datosProyecto['iCvePrioridad'],
    $datosProyecto['iIdLiderProyecto'],
    $datosProyecto['vchComentarios'],
    $datosProyecto['iIdUsuarioUltModificacion'],
    array(&$datosProyecto['iIdProyecto'], SQLSRV_PARAM_OUT),
    array(&$datosProyecto['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosProyecto['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosProyecto['vchMensaje'], SQLSRV_PARAM_OUT)
);

// Ejecutar el procedimiento almacenado
$resultado = ejecutarProcedimientoAlmacenado("prcAltaProyecto", $parametros);

// Verificar el resultado
if ($resultado === false) {
    // Si hubo un error, enviar una respuesta de error
    $errorInformacion = sqlsrv_errors();
    $respuesta = array(
        'error' => true,
        'mensaje' => 'Error al ejecutar el procedimiento almacenado.',
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);
} else {
    // Si se ejecutó correctamente, devolver los datos del proyecto con el ID asignado
    echo json_encode($datosProyecto);
}

// Función para ejecutar el procedimiento almacenado
function ejecutarProcedimientoAlmacenado($nombreProcedimiento, $parametros)
{
    global $conn;

    // Construir el string de parámetros para la llamada al procedimiento almacenado
    $parametrosString = implode(", ", array_fill(0, count($parametros), "?"));

    // Construir la llamada al procedimiento almacenado
    $sql = "EXEC $nombreProcedimiento $parametrosString";

    // Preparar la consulta
    $stmt = sqlsrv_prepare($conn, $sql, $parametros);

    // Verificar si la consulta se preparó correctamente
    if ($stmt === false) {
        return false;
    }

    // Ejecutar la consulta
    if (!sqlsrv_execute($stmt)) {
        return false;
    }

    // Devolver el resultado de la ejecución del procedimiento almacenado
    return true;
}

// Cerrar la conexión
sqlsrv_close($conn);
?>

<!--<script>
// Crear un objeto con los datos a enviar al servidor
var datos = {
    vchNombre: "NombreProyecto",
    vchNombreCorto: "NombreCortoProyecto",
    iIdTipoCliente: "TipoCliente",
    iAgruTipoCliente: "AgruTipoCliente",
    iCveTipoCliente: "CveTipoCliente",
    vchNombreCliente: "NombreCliente",
    iIdControlProyecto: "ControlProyecto",
    iAgruControlProyecto: "AgruControlProyecto",
    iCveControlProyecto: "CveControlProyecto",
    dFechaInicioProyecto: "FechaInicioProyecto",
    dFechaFinProyecto: "FechaFinProyecto",
    iIdEstatus: "Estatus",
    iAgruEstatus: "AgruEstatus",
    iCveEstatus: "CveEstatus",
    iIdPrioridad: "Prioridad",
    iAgruPrioridad: "AgruPrioridad",
    iCvePrioridad: "CvePrioridad",
    iIdLiderProyecto: "LiderProyecto",
    vchComentarios: "Comentarios",
    iIdUsuarioUltModificacion: "UsuarioUltModificacion",
    iIdProyecto: "Proyecto",
    bResultado: "Resultado",
    vchCampoError: "CampoError",
    vchMensaje: "Mensaje"
    
};

// Realizar la solicitud AJAX
$.ajax({
    url: 'ruta_al_servidor/tu_script_php_que_ejecuta_el_procedimiento.php',
    type: 'POST',
    dataType: 'json',
    data: datos,
    success: function(response) {
        // Verificar si la llamada fue exitosa
        if (response.bResultado) {
            // Crear un objeto con los datos obtenidos del servidor
            var proyecto = {
                idProyecto: response.iIdProyecto,
                nombre: datos.vchNombre,
                nombreCorto: datos.vchNombreCorto,
                // Continúa con el resto de los datos del proyecto
            };

            // Guardar el objeto en el localStorage
            localStorage.setItem('proyecto', JSON.stringify(proyecto));

            // Opcional: redirigir o realizar otras acciones después de guardar en localStorage
        } else {
            console.error(response.vchMensaje);
            // Mostrar un mensaje de error u otras acciones si la llamada no fue exitosa
        }
    },
    error: function(xhr, status, error) {
        console.error(error);
        // Manejar el error de la solicitud AJAX
    }
});
</script>-->