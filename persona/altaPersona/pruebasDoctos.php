<?php
session_start();
function ObtenerTipoDocumento(){
    if (isset ($_SESSION['CatConstante'])){
        $datosDocumentos = $_SESSION['CatConstante'];
        $documentosEncontrados= array();

        foreach ($datosDocumentos as $valorDocumento) {
            if ($valorDocumento['iAgrupador'] == 10) {
                $documentosEncontrados [] = $valorDocumento;
            }
        }
        return $documentosEncontrados;
    } else {
        echo ("No hay datos del Estado de Procedencia");
    }
}

$resultadoDocumento = ObtenerTipoDocumento();



?>
<body>

<script src = "../consulEmpleado/MostrarDatosEmpleado.js" ></script>
<script src = "../consulEmpleado/ProcesoModificacionEmpleado.js"> </script>
<script src = "../consulEmpleado/ProcesosDocumentosEmpleado.js" ></script>

    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="prcAltaDoctos.php" method="post" class="dashboard-form" id="AltaDocumentos" enctype="multipart/form-data" >
                        <input type="hidden" name="iIdConstanteDocumento" id="iIdConstanteDocumento" value="">
                            <input type="hidden" name="iClaveDocumento" id="iClaveDocumento" value="">

                                <div class="modal-header">
                                    <h5 class="modal-title"><i data-feather="edit"></i>ALTA DE DOCUMENTOS PARA PRUEBAS</h5>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <select class="form-control" id="iIdDocumentoAgregar" name="iIdDocumento[]">
                                            <option value="">SELECCIONE UN DOCUMENTO:</option>
                                            <?php foreach ($resultadoDocumento as $documento): ?>
                                            <option
                                                value="<?= $documento['iIdConstante'] . '-' . $documento['iClaveCatalogo'] ?>">
                                                [<?= $documento['iClaveCatalogo'] ?>] - <?= $documento['vchDescripcion'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group file-input-wrap">
                                        <label for="up-cv">
                                            <input id="up-cv" type="file" onchange="cargarDocumento(event)" name="documento" accept="application/pdf" >
                                                <i data-feather="upload-cloud"></i>
                                                <p id="nombreArchivo">NOMBRE DEL ARCHIVO
                                                    <p>(pdf,zip,doc,docx)</p>
                                                </p>
                                        </label>
                                    </div>
                                    <button class="boton-intec" id="buttonGuardarDocumento">GUARDAR</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src = "../consulEmpleado/MostrarDatosEmpleado.js" ></script>
<script src = "../consulEmpleado/ProcesoModificacionEmpleado.js"> </script>
<script src = "../consulEmpleado/ProcesosDocumentosEmpleado.js" ></script>