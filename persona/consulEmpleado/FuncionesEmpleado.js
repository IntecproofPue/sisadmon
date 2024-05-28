function ValidarBaja() {
    var datosBajaEmpleado = {
        fechaBaja: document.getElementById('dtFechaBajaModificacion').value,
        empleado: window.iIdEmpleadoGlobal,
        proceso: 3, //baja de empleado
        opcion: 2
    };


    try{
        localStorage.setItem('datosBaja', JSON.stringify(datosBajaEmpleado));
    }catch (error){
        console.error("Error para almacenar información en LocalStorage");
        return;
    }


    var datosBajaRequest = new  XMLHttpRequest();

    datosBajaRequest.open('POST', 'prcActualizaEmpleado.php', true);
    datosBajaRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var formData =  new URLSearchParams(datosBajaEmpleado).toString();

    datosBajaRequest.send(formData);

    datosBajaRequest.onload = function () {
        if (datosBajaRequest.status == 200) {
            try {
                console.log(datosBajaRequest.responseText);

                var respuesta = JSON.parse(datosBajaRequest.responseText);
                if (respuesta.bResultado == 1) {
                    console.log(respuesta);
                    alert(respuesta.vchMensaje);

                    window.location.href = "consultaEmpleado.php";
                } else {
                    console.error("Mensaje de error: " + respuesta.vchMensaje);
                    alert(respuesta.vchMensaje);
                }
            } catch (error) {
                console.error("Error parsing JSON response", error);
                alert("Error processing the server response. Please try again.");
            }
        } else {
            console.error("Error en la solicitud al servidor: " + datosBajaRequest.status);
            alert("Server request failed with status: " + datosBajaRequest.status);
        }
    };
}


function ValidarReactivacion() {
    var SedeReactivacionSeleccionada = document.getElementById('idSedeReactivacion');
    var SedeReactivacionPartes = SedeReactivacionSeleccionada.value.split('-');
    var iIdConstanteSedeReactivacion = SedeReactivacionPartes[0];
    var iClaveSedeReactivacion = SedeReactivacionPartes[1];

    document.getElementById('iIdConstanteSedeReactivacion').value = iIdConstanteSedeReactivacion;
    document.getElementById('iClaveSedeReactivacion').value = iClaveSedeReactivacion;



    var datosReactivacionEmpleado = {
        NSS: document.getElementById('vchNSSReactivacion').value,
        fechaReingreso: document.getElementById('dFechaReIngresoReactivacion').value,
        puesto: document.getElementById('iIdPuestoReactivacion').value,
        contratante: document.getElementById('iIdPersonaContratanteReactivacion').value,
        iIdConstanteSede: iIdConstanteSedeReactivacion,
        iClaveSede: iClaveSedeReactivacion,
        empleado: window.iIdEmpleadoGlobal,
        proceso: 4, //reactivación de empleado
        opcion: 2
    }

    try{
        localStorage.setItem('datosReactivacion', JSON.stringify(datosReactivacionEmpleado));
    }catch (error){
        console.error("Error para almacenar información en LocalStorage");
        return;
    }


    var datosReactivacionRequest = new  XMLHttpRequest();

    datosReactivacionRequest.open('POST', 'prcReactivacionEmpleado.php', true);
    datosReactivacionRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var formData =  new URLSearchParams(datosReactivacionEmpleado).toString();

    datosReactivacionRequest.send(formData);

    datosReactivacionRequest.onload = function () {
        if (datosReactivacionRequest.status == 200) {
            try {
                console.log(datosReactivacionRequest.responseText);

                var respuesta = JSON.parse(datosReactivacionRequest.responseText);
                if (respuesta.bResultado === 1) {
                    console.log(respuesta);
                    alert(respuesta.vchMensaje);
                    window.location.href = "consultaEmpleado.php";

                } else {
                    console.error("Mensaje de error: " + respuesta.vchMensaje);
                    alert(respuesta.vchMensaje);
                }
            } catch (error) {
                console.error("Error al parsear la información en JSON", error);
                alert("Error, procesando la información del servidor, favor de reintentar");
            }
        } else {
            console.error("Error en la solicitud al servidor: " + datosReactivacionRequest.status);
            alert("Falló la respuesta del servidor con status: " + datosReactivacionRequest.status);
        }
    };

}

function ValidarPromocion() {

    var SedePromocionSeleccionada = document.getElementById('idSedePromocion');
    var SedePromocionPartes = SedePromocionSeleccionada.value.split('-');
    var iIdConstanteSedePromocion = SedePromocionPartes[0];
    var iClaveSedePromocion = SedePromocionPartes[1];

    document.getElementById('idConstanteSedePromocion').value = iIdConstanteSedePromocion;
    document.getElementById('iCveSedePromocion').value = iClaveSedePromocion;


    var datosPromocionEmpleado = {
        puesto: document.getElementById('iIdPuestoPromocion').value,
        fechaPromocion: document.getElementById('dtFechaUltPromocionPr').value,
        iIdConstanteSede: iIdConstanteSedePromocion,
        iClaveSede: iClaveSedePromocion,
        empleado: window.iIdEmpleadoGlobal,
        proceso: 5, //promoción de empleado
        opcion: 2
    }



    try{
        localStorage.setItem('datosPromocion', JSON.stringify(datosPromocionEmpleado));
    }catch (error){
        console.error("Error para almacenar información en LocalStorage");
        return;
    }

    try {

        var datosPromocionRequest = new XMLHttpRequest();

        datosPromocionRequest.open('POST', 'prcPromocionEmpleado.php', true);
        datosPromocionRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        var formData = new URLSearchParams(datosPromocionEmpleado).toString();

        datosPromocionRequest.send(formData);

        datosPromocionRequest.onload = function () {
            if (datosPromocionRequest.status == 200) {
                try {
                    console.log(datosPromocionRequest.responseText);

                    var respuesta = JSON.parse(datosPromocionRequest.responseText);
                    if (respuesta.bResultado == 1) {
                        console.log(respuesta);
                        alert(respuesta.vchMensaje);
                        window.location.href = "consultaEmpleado.php";

                    } else {
                        console.error("Mensaje de error: " + respuesta.vchMensaje);
                        alert(respuesta.vchMensaje);
                    }
                } catch (error) {
                    console.error("Error parsing JSON response", error);
                    alert("Error, procesando la información del servidor, favor de reintentar");
                }
            } else {
                console.error("Error en la solicitud al servidor: " + datosPromocionRequest.status);
                alert("Falló la respuesta del servidor con status: " + datosPromocionRequest.status);
            }
        };
    }catch (error){
        console.error("Ocurrió un error en la petición");
        return;
    }
}


function validarModificacion(){
    var SedeSeleccionadaModificacion = document.getElementById('iIdSedeModificar');
    var SedeModificacionPartes = SedeSeleccionadaModificacion.value.split('-');
    var iIdConstanteSedeModificacion = SedeModificacionPartes[0];
    var iClaveSedeModificacion = SedeModificacionPartes[1];


    document.getElementById('iIdConstanteSedeModificacion').value = iIdConstanteSedeModificacion;
    document.getElementById('iIdConstanteSedeModificacion').value = iClaveSedeModificacion;


    var GeneroSeleccionadoModificacion = document.getElementById('iIdGeneroModificar');
    var GeneroModificacionPartes = GeneroSeleccionadoModificacion.value.split('-');
    var iIdConstanteGeneroModificacion = GeneroModificacionPartes[0];
    var iClaveGeneroModificacion = GeneroModificacionPartes[1];

    document.getElementById('iIdConstanteGeneroModificacion').value =iIdConstanteGeneroModificacion;
    document.getElementById('iClaveGeneroModificacion').value = iClaveGeneroModificacion;

    var NacionalidadSeleccionadaModificacion = document.getElementById('iIdNacionalidadModificar');
    var NacionalidadSeleccionadaPartes = NacionalidadSeleccionadaModificacion.value.split('-');
    var iIdConstanteNacionalidadModificacion = NacionalidadSeleccionadaPartes[0];
    var iClaveNacionalidadModificacion = NacionalidadSeleccionadaPartes[1];

    document.getElementById('iIdConstanteNacionalidadModificacion').value = iIdConstanteNacionalidadModificacion;
    document.getElementById('iClaveNacionalidadModificacion').value = iClaveNacionalidadModificacion;




    var datosEmpleado = {
        NSS: document.getElementById('vchNSSModificar').value,
        dFechaIngreso: document.getElementById('dtFechaIngresoModificacion').value,
        iIdConstanteSede: iIdConstanteSedeModificacion,
        iClaveSede: iClaveSedeModificacion,
        contratante: document.getElementById('iIdPersonaContratanteModificar').value,
        nombre: document.getElementById('vchNombreEmpleadoModificar').value,
        apellidoMaterno: document.getElementById('vchPrimerApellidoModificar').value,
        apellidoPaterno: document.getElementById('vchSegundoApellidoModificar').value,
        rfc: document.getElementById('vchRFCModificar').value,
        curp: document.getElementById('vchCURPModificar').value,
        dFechaNacimiento: document.getElementById('dtFechaNacimientoModificacion').value,
        iIdConstanteGenero: iIdConstanteGeneroModificacion,
        iClaveGenero: iClaveGeneroModificacion,
        iIdConstanteNacionalidad: iIdConstanteNacionalidadModificacion,
        iClaveNacionalidad: iClaveNacionalidadModificacion,
        regimenFiscal: document.getElementById('regimenFiscalModificar').value,
        usoFiscal: document.getElementById('usoFiscalModificar').value,
        empleado: window.iIdEmpleadoGlobal,
        proceso: 2,
        opcion: 2
    }
}

