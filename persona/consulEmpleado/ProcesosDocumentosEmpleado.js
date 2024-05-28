async function cargarDocumento(event) {
    var documento = event.target.files[0];
    if (!documento) {
        return;
    }

    var leerDocumento = new FileReader();
    leerDocumento.onload = async function (e) {

        var base64Prefijo = "data:pdf;base64, ";

        var base64Data = e.target.result.replace(base64Prefijo, "").replace(/^.+,/, "");

        if (/^([A-Za-z0-9+/]{4})*([A-Za-z0-9+/]{2}==|[A-Za-z0-9+/]{3}=)?$/i.test(base64Data)) {
            localStorage.setItem('base64Archivo', base64Data);

            await enviarArchivoAlServidor(base64Data, documento.name);
        }else{
            console.error("La cadena base 64 extraída no es válida");
        }

    };

    leerDocumento.readAsDataURL(documento);

    var fileName = document.getElementById('nombreArchivo');
    fileName.textContent = 'NOMBRE DEL ARCHIVO: ' + documento.name;
}

async function enviarArchivoAlServidor(base64Data, nombreArchivo){
    try{

        // Guardar el nombre del archivo en el localStorage
        localStorage.setItem('nombreDocto', nombreArchivo);

        var base64Limpia = base64Data.replace(/^data:pdf;base64, /, '');
        var byteCharacters = atob(base64Limpia);
        var byteNumbers = new Array(byteCharacters.length);
        for (var i=0; i<byteCharacters.length; i++){
            byteNumbers[i] = byteCharacters.charCodeAt(i);
        }
        var byteArray = new Uint8Array(byteNumbers);
        var blob = new Blob([byteArray], {type: "application/pdf"});

        var formData = new FormData();
        formData.append("archivo", blob, nombreArchivo);

        //var urlEndPoint = "http://localhost:8080/SisAdmonIntecproof/documentos";
        var urlEndPoint = "http://localhost/SistemaIntegralApp/doctosPDF";

        await fetch(urlEndPoint, {
            method: "POST",
            body: formData
        });

        console.log("Archivo enviado al servidor con éxito");

    }catch(error){
        console.log("Error al enviar el archivo al servidor: ", error);
    }
}

function visualizarArchivo (base64Data){
    var byteCharacters = atob(base64Data.split(',')[1]);
    var byteNumbers = new Array(byteCharacters.length);
    for (var i = 0; i < byteCharacters.length; i++) {
        byteNumbers[i] = byteCharacters.charCodeAt(i);
    }
    var byteArray = new Uint8Array(byteNumbers);
    var blob = new Blob([byteArray], {type: "application/pdf"});

    var urlArchivo = URL.createObjectURL(blob);

    // Abre el archivo en una nueva pestaña
    window.open(urlArchivo, '_blank');
}

function renderizarPdf(pdf) {
    var pageNumber = 1;
    pdf.getPage(pageNumber).then(function(page) {
        var scale = 1.5;
        var viewport = page.getViewport({scale: scale});

        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        canvas.style.display = "block";
        canvas.style.margin = "auto";

        var renderContext = {
            canvasContext: context,
            viewport: viewport
        };
        page.render(renderContext).promise.then(function() {
            var modalBody = document.querySelector('#apply-popup-id-2.modal.fade');

        });
    });

}

function validarDocumento(){

    console.log ("entró al proceso");

    var TipoDocumentoSeleccionado = document.getElementById('iIdDocumentoAgregar');
    var DocumentoPartes = TipoDocumentoSeleccionado.value.split('-');
    var iIdConstanteDocumento = DocumentoPartes[0];
    var TipoDocumento = DocumentoPartes[1];


    document.getElementById('iIdConstanteDocumento').value = iIdConstanteDocumento;
    document.getElementById('iClaveDocumento').value = TipoDocumento;


    var DatosDocumentosEmpleado = localStorage.getItem('datosConsultaIndividual');
    var bResultadoDocumentos = JSON.parse(DatosDocumentosEmpleado);
    var iIdPersonaDocumentos = bResultadoDocumentos.iIdEmpleado;

    console.log(iIdPersonaDocumentos);

    document.getElementById('iIdPersonaDocumento').value = iIdPersonaDocumentos;

    var datosDocumentoAdd = {
        iIdConstanteDocumento: iIdConstanteDocumento,
        iClaveDocumento: TipoDocumento,
        empleado: iIdPersonaDocumentos,
        url:  localStorage.getItem('base64Archivo')
    };

    console.log(datosDocumentoAdd);
    localStorage.setItem('datosPruebaDocumentos', JSON.stringify(datosDocumentoAdd));


    var datosDocumentosNew = new XMLHttpRequest();
    datosDocumentosNew.open('POST', '/SisAdmonIntecproof/persona/altaPersona/validarDatosDocumentos.php', true);
    datosDocumentosNew.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var formData = new URLSearchParams(datosDocumentoAdd).toString();

    datosDocumentosNew.send(formData);

    localStorage.setItem('datosFormData', JSON.stringify(formData));


    datosDocumentosNew.onload = function (){
        if (datosDocumentosNew.status === 200){
            try {
                console.log(datosDocumentosNew.responseText);

                var respuesta = JSON.parse(datosDocumentosNew.responseText);
                if (respuesta.bResultado === 1){
                    localStorage.setItem('agregarDocumento', JSON.stringify(datosDocumentoAdd));
                    alert(respuesta.vchMensaje);
                }else {
                    console.log("Mensaje de error: ", respuesta.vchMensaje);
                    alert(respuesta.vchMensaje);
                }
            }catch (error){
                console.error("Error al parsear la información en JSON", error);
                alert("Error, procesando la información del servidor, favor de reintentar");
            }
        }else{
            console.error("Error en la solicitud al servidor: " + datosReactivacionRequest.status);
            alert("Falló la respuesta del servidor con status: " + datosReactivacionRequest.status);
        }

    }
    datosDocumentosNew.onerror = function (){
        console.error("Error en la solicitud: ", datosDocumentosNew.statusText);
        alert ("Hubo un error al procesar la información");
    }
}
