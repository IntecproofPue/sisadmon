function ObtenerDatosEmpleado(){
    var consultaIndivual = localStorage.getItem('datosConsultaIndividual');
    var consultaMasiva = localStorage.getItem('empleadoSeleccionado');

    if (consultaIndivual) {
        var bResultado = JSON.parse(consultaIndivual);
        MostrarDatos(bResultado);

    } else if (consultaMasiva) {

        var bResultadoMasivo = JSON.parse(consultaMasiva);
        var iIdEmpleado = bResultadoMasivo.iIdEmpleado;


        var datosEmpleadoMasivo = new XMLHttpRequest();
        datosEmpleadoMasivo.open('POST', 'prcConsultaIndividual.php', true);

        var formEmpleado = new URLSearchParams();
        formEmpleado.append('idEmpleado', iIdEmpleado);

        datosEmpleadoMasivo.send(formEmpleado);

        datosEmpleadoMasivo.onload = function () {
            if (datosEmpleadoMasivo.status === 200) {
                var respuesta = JSON.parse(datosEmpleadoMasivo.responseText);

                if (respuesta.bResultado === 1) {
                    localStorage.clear();

                    localStorage.setItem('datosConsultaIndividual', JSON.stringify(respuesta));

                    var datosEmpleadoFinal = localStorage.getItem('datosConsultaIndividual', JSON.stringify(respuesta));

                    var bResultado = JSON.parse(datosEmpleadoFinal);
                    MostrarDatos(bResultado);
                }
            }
        }
    }
    return bResultado;
}

function ModalModificarDatos() {
    var datosModificarEmpleado = localStorage.getItem('datosConsultaIndividual');
    if (datosModificarEmpleado) {
        var bResultadoModificar = JSON.parse(datosModificarEmpleado);
        MostrarDatosModificacion(bResultadoModificar);
    }
}

function  ModalReactivacion() {
    var datosReactivacion = localStorage.getItem('datosConsultaIndividual');
    if (datosReactivacion) {
        var bResultadoReactivacion = JSON.parse(datosReactivacion);
        MostrarDatosReactivacion(bResultadoReactivacion);
    }
}

function ModalPromocion () {
    var datosPromocion = localStorage.getItem('datosConsultaIndividual');
    if (datosPromocion) {
        var bResultadoPromocion = JSON.parse(datosPromocion);
        MostrarDatosPromocion(bResultadoPromocion);
    }
}

function MostrarDatosReactivacion(bResultado) {

    //NSS
    var vchNSSReactivacion = document.getElementById('vchNSSReactivacion');
    vchNSSReactivacion.value = bResultado.vchNSS;


    //Puesto

    var iIdPuestoModificacion = bResultado.iIdPuesto;
    var selectElementPuesto = document.getElementById('iIdPuestoReactivacion');

    for (var i = 0; i < selectElementPuesto.options.length; i++) {
        var optionPuesto = selectElementPuesto.options[i];
        if (optionPuesto.value === iIdPuestoModificacion.toString()) {
            optionPuesto.selected = true;
            break;
        }
    }


    //Sede
    var iIdSedeModificacion = bResultado.iIdSede;
    var selectElementSede = document.getElementById('idSedeReactivacion');

    for (var i = 0; i < selectElementSede.options.length; i++) {
        var optionSede = selectElementSede.options[i];
        var optionIdSede = parseInt(optionSede.value.split('-')[0]);

        if (optionIdSede === iIdSedeModificacion) {
            optionSede.selected = true;
            break;
        }
    }

    //Contratado por
    var iIdContratanteModificacion = bResultado.iIdContratadoPor;
    var selectElementSede = document.getElementById('iIdPersonaContratanteReactivacion');

    for (var i = 0; i < selectElementSede.options.length; i++) {
        var optionContratado = selectElementSede.options[i];
        if (optionContratado.value == iIdContratanteModificacion.toString()) {
            optionContratado.selected = true;
            break;
        }

    }
}


function MostrarDatosPromocion(bResultado) {

    //Puesto
    var iIdPuestoModificacion = bResultado.iIdPuesto;
    var selectElementPuesto = document.getElementById('iIdPuestoPromocion');

    for (var i = 0; i < selectElementPuesto.options.length; i++) {
        var optionPuesto = selectElementPuesto.options[i];
        if (optionPuesto.value === iIdPuestoModificacion.toString()) {
            optionPuesto.selected = true;
            break;
        }
    }

    //NSS
    var vchNSSPromocion = document.getElementById('vchNSSPromocion');
    vchNSSPromocion.value = bResultado.vchNSS;

    //Sede
    var iIdSedeModificacion = bResultado.iIdSede;
    var selectElementSede = document.getElementById('idSedePromocion');

    for (var i = 0; i < selectElementSede.options.length; i++) {
        var optionSede = selectElementSede.options[i];
        var optionIdSede = parseInt(optionSede.value.split('-')[0]);

        if (optionIdSede === iIdSedeModificacion) {
            optionSede.selected = true;
            break;
        }
    }

}

function MostrarDatos(bResultado) {
    var idInput = document.getElementById('idInput');
    idInput.value = bResultado.iIdEmpleado || '';

    var nombreInput = document.getElementById('vchNombre');
    nombreInput.value = bResultado.vchNombre || '';

    var vchPrimerApellido = document.getElementById('vchPrimerApellido');
    vchPrimerApellido.value = bResultado.vchPrimerApellido || '';

    var vchSegundoApellido = document.getElementById('vchSegundoApellido');
    vchSegundoApellido.value = bResultado.vchSegundoApellido || '';

    var vchPuesto = document.getElementById('vchPuesto');
    vchPuesto.value = bResultado.vchPuesto || '';

    var dFechaIngresoOriginal = bResultado.dFechaIngreso.date;
    var fechaIngreso = new Date(dFechaIngresoOriginal);
    var fechaIngresoFinal = fechaIngreso.toLocaleDateString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
    var dFechaIngresoUlt = document.getElementById('dtFechaIngreso');
    dFechaIngresoUlt.value = fechaIngresoFinal;

    var vchEstatusEmpleado = document.getElementById('iIdEstatusEmpleado');
    vchEstatusEmpleado.value = bResultado.vchEstatusEmpleado || '';

    var vchNSS = document.getElementById('vchNSS');
    vchNSS.value = bResultado.vchNSS || '';

    var dFechaPromocionOriginal = bResultado.dtFechaUltPromocion.date;
    var fechaPromocion = new Date(dFechaPromocionOriginal);
    var fechaIPromocionFinal = fechaPromocion.toLocaleDateString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
    var dFechaPromocion = document.getElementById('dtFechaUltPromocion');
    dFechaPromocion.value = fechaIPromocionFinal || '';

    var vchSede = document.getElementById('iIdSedeForm');
    vchSede.value = bResultado.vchSede || '';

    var dFechaBajaOriginal = bResultado.dtFechaBaja.date;
    var fechaBaja = new Date(dFechaBajaOriginal);
    var fechaBajaFinal = fechaBaja.toLocaleDateString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
    var dFechBaja = document.getElementById('dtFechaBaja');
    dFechBaja.value = fechaBajaFinal === '01/01/1900' ? '' : fechaBajaFinal;

    var vchUsuario = document.getElementById('vchUsuarioUltModificacion');
    vchUsuario.value = bResultado.vchUsuarioUltModificacion || '';

    var dFechaUltModifOriginal = bResultado.dtFechaUltModifEmpleado.date;
    var fechaModif = new Date(dFechaUltModifOriginal);
    var fechaModifFinal = fechaModif.toLocaleString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false
    });
    var dFechaModificacion = document.getElementById('dtFechaUltModifEmpleado');
    dFechaModificacion.value = fechaModifFinal === '01/01/1900' ? '' : fechaModifFinal;

    //Datos Persona
    var vchRFC = document.getElementById('vchRFC');
    vchRFC.value = bResultado.vchRFC || '';

    var vchCURP = document.getElementById('vchCURP');
    vchCURP.value = bResultado.vchCURP || '';

    var dFechaNacimientoOriginal = bResultado.dFechaNacimiento.date;
    var fechaNacimiento = new Date(dFechaNacimientoOriginal);
    var fechaNacimientoFinal = fechaNacimiento.toLocaleDateString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
    var dFechaNacimiento = document.getElementById('dFechaNacimiento');
    dFechaNacimiento.value = fechaNacimientoFinal === '01/01/1900' ? '' : fechaNacimientoFinal;

    var vchGenero = document.getElementById('iIdGenero');
    vchGenero.value = bResultado.vchGenero || '';

    var vchNacionalidad = document.getElementById('iIdNacionalidad');
    vchNacionalidad.value = bResultado.vchNacionalidad || '';

    //Datos Fiscales


    var iIdRegimenFiscalMostrar = document.getElementById('iIdRegimen');
    iIdRegimenFiscalMostrar.value = bResultado.iIdRegimen;

    var vchRegimen = document.getElementById('vchRegimen');
    vchRegimen.value = bResultado.vchDescripcionRegimen;

    //Uso fiscal

    var vchUsoFiscal = document.getElementById('vchUsoFiscal');
    vchUsoFiscal.value = bResultado.vchDescripcionUso;

    var iCodigoPostalFiscal = document.getElementById('iCodigoPostalFiscal');
    iCodigoPostalFiscal.value = bResultado.iCodigoPostalFiscal;

}

function deshabilitarBotones() {
    document.getElementById('buttonsModificar').querySelectorAll('.boton-intec').forEach(boton => {
        boton.addEventListener('click', function () {
            const botones = document.querySelectorAll('.boton-intec');
            botones.forEach(boton => {
                boton.style.display = 'none';
            });

            const modales = document.querySelectorAll('.modal.fade');
            modales.forEach(modal => {
                modal.style.display = 'none';
            });

            const mostrarModal = this.getAttribute('data-modal');
            const modalElement = document.getElementById(mostrarModal);
            if (modalElement) {
                modalElement.style.display = 'block';
            }

            let buttonGuardarDiv = document.querySelector('.candidate');
            if (!buttonGuardarDiv) {
                buttonGuardarDiv = document.createElement('div');
                buttonGuardarDiv.className = 'candidate';
                document.body.appendChild(buttonGuardarDiv);

            }

            if (!document.querySelector('.boton-intec-1')) {
                const buttonGuardar = document.createElement('button');
                buttonGuardar.style.zIndex = 1000;
                buttonGuardar.textContent = 'GUARDAR';
                buttonGuardar.className = 'boton-intec-1'; //Boton con nueva clase
                buttonGuardarDiv.appendChild(buttonGuardar);
                buttonGuardar.style.display = 'block';
            }else{
                document.querySelector('.boton-intec-1').style.display = 'block';
            }
        });
    });
}

function habilitarBotones() {
    const habilitarBotones = document.querySelectorAll('.boton-intec');
    habilitarBotones.forEach(boton => boton.disabled = false);

    localStorage.setItem('habilitarBotones', 'true');
}

function variableGlobalEmpleado () {
    var datosEmpleadoModificacion = localStorage.getItem('datosConsultaIndividual');
    var bResultadoEmpleado = JSON.parse(datosEmpleadoModificacion);

    window.iIdEmpleadoGlobal = bResultadoEmpleado.iIdEmpleado;

}

