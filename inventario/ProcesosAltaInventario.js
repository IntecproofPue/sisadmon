function validarPersona(){
    var tipoPersonaSeleccionado = document.getElementById('iIdTipoPersona');
    var tipoPersona = tipoPersonaSeleccionado.value.split('-');
    var iIdTipoPersona = tipoPersona[0];
    var iClaveTipoPersona = tipoPersona[1];

    document.getElementById('iIdConstanteGenero').value = iIdTipoPersona;
    document.getElementById('iClaveGenero').value = iClaveTipoPersona;


    var generoSeleccionado = document.getElementById('genero');
    var genero = generoSeleccionado.value.split('-');
    var iIdGenero = genero[0];
    var iClaveGenero = genero[1];

    document.getElementById('iIdConstanteGenero').value = iIdGenero;
    document.getElementById('iClaveGenero').value = iClaveGenero;


    var datosPersona = {
        iIdTipoPersona: iIdTipoPersona,
        iClaveTipoPersona: iClaveTipoPersona,
        iIdConstanteGenero: iIdGenero,
        iClaveGenero: iClaveGenero,
        nombre: document.getElementById('vchNombre').value,
        primerApellido: document.getElementById('primerApellido').value,
        segundoApellido: document.getElementById('segundoApellido').value,
        proceso: 3,
        opcion: 1
    };

    try{
        localStorage.setItem('datosPersonaInventario', JSON.stringify(datosPersona));
    }catch(error){
        console.error("Ocurrió un error para almacenar la información en el localStorage");
        return;
    }

     var datosPersonaInventario = new XMLHttpRequest();

    datosPersonaInventario.open('POST', '/SisAdmonIntecproof/persona/altaPersona/validarDatosPersona.php', true);
    datosPersonaInventario.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var formData =  new URLSearchParams(datosPersona).toString();

    datosPersonaInventario.send(formData);

    datosPersonaInventario.onload = function (){
        if (datosPersonaInventario.status === 200){
            try{
                console.log(datosPersonaInventario.responseText);

                var respuesta = JSON.parse(datosPersonaInventario.responseText);

                if (respuesta.bResultado === 1){
                    console.log(respuesta);
                    alert(respuesta.vchMensaje);
                }else{
                    console.error("Mensaje de error: ", respuesta.vchMensaje);
                    alert(respuesta.vchMensaje);
                }

            }catch (error){
                console.error("Error al parsear la información en formato JSON", error);
                alert ("Error al parsear la información en formato JSON. Por favor intenta de nuevo");
            }
        }else{
            console.error("Error en la solicitud del servidor");
            alert ("Error en la solicitud del servidor con el estatus: "+ datosPersonaInventario.status);
        }
    }

}

function validarDatosInventario(){
    var bModificaPersona
    var datosPersonaModificar = localStorage.getItem('datosPersonaInventario');
    var bPersona = JSON.parse(datosPersonaModificar);

    if (bPersona)
        bModificaPersona = 1;
    else
        bModificaPersona = 0;

    var ProductoSeleccionado = document.getElementById('iIdtipoProducto');
    var Producto = ProductoSeleccionado.value.split('-');
    var iIdTipoProducto = Producto[0];
    var iClaveProducto = Producto[1];

    document.getElementById('iIdConstanteProducto').value = iIdTipoProducto;
    document.getElementById('iClaveProducto').value = iClaveProducto;

    var TipoSubProductoSeleccionado = document.getElementById('iIdTipoSubproducto');
    var SubProducto = TipoSubProductoSeleccionado.value.split('-');
    var iIdTipoSubProducto = SubProducto[0];
    var iClaveSubProducto = SubProducto[1];

    document.getElementById('iIdConstanteSubProducto').value = iIdTipoSubProducto;
    document.getElementById('iClaveSubProducto').value = iClaveSubProducto;

    var MarcaSeleccionada = document.getElementById('iIdMarca');
    var Marca = MarcaSeleccionada.value.split('-');
    var iIdMarca = Marca[0];
    var iClaveMarca = Marca[1];

    document.getElementById('iIdConstanteMarca').value = iIdMarca;
    document.getElementById('iClaveMarca').value = iClaveMarca;

    var TipoAsignacionSeleccionado = document.getElementById('iIdTipoAsignacion');
    var TipoAsignacion = TipoAsignacionSeleccionado.value.split('-');
    var iIdTipoAsignacion = TipoAsignacion[0];
    var iClaveAsignacion = TipoAsignacion[1];

    document.getElementById('iIdConstanteAsignacion').value = iIdTipoAsignacion;
    document.getElementById('iClaveAsignacion').value = iClaveAsignacion;


    var datosInventario = {
        iIdTipoProducto: iIdTipoProducto,
        iClaveProducto: iClaveProducto,
        iIdTipoSubProducto: iIdTipoSubProducto,
        iClaveSubProducto: iClaveSubProducto,
        iIdMarca: iIdMarca,
        iClaveMarca: iClaveMarca,
        modelo: document.getElementById('vchModelo').value,
        serie: document.getElementById('vchSerie').value,
        iIdTipoAsignacion: iIdTipoAsignacion,
        iClaveAsignacion: iClaveAsignacion,
        asignadoA: document.getElementById('iIdAsignadoA').value,
        proyecto: document.getElementById('iIdProyecto').value,
        fechaIngreso: document.getElementById('dFechaIngreso').value,
        observaciones: document.getElementById('vchObservaciones').value,
        bModificaPersona: bModificaPersona,
        iIdTipoPersona: bPersona.iIdTipoPersona,
        iClavePersona: bPersona.iClaveTipoPersona,
        iIdGenero: bPersona.iIdConstanteGenero,
        iClaveGenero: bPersona.iClaveGenero,
        nombre: bPersona.nombre,
        primerApellido: bPersona.primerApellido,
        segundoApellido: bPersona.segundoApellido
    };

    try{
        localStorage.setItem('datosInventario', JSON.stringify(datosInventario));
        console.log(datosInventario);
    }catch(error){
        console.error("Ocurrió un error al guardar los datos en el localStorage");
    }


    var datosInventarioRequest = new XMLHttpRequest();

    datosInventarioRequest.open('POST', 'prcAltaInventario.php', true);
    datosInventarioRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var formData = new URLSearchParams(datosInventario);

    datosInventarioRequest.send(formData);

    datosInventarioRequest.onload = function (){
        if (datosInventarioRequest.status === 200){
            try{
                console.log(datosInventarioRequest.responseText);

                var respuesta = JSON.parse(datosInventarioRequest.responseText);
                localStorage.setItem('datosInventarioResponse', JSON.stringify(respuesta));
                if (respuesta.bResultado == 1){
                    console.log(respuesta);
                    alert(respuesta.vchMensaje);

                    window.location.href = 'consultaInventario.php';

                }else{
                    console.error("Mensaje de error: ", respuesta.vchMensaje);
                    alert(respuesta.vchMensaje);
                }
            }catch(error){
                console.error("Error al parsear la información en formato JSON, verifique");
                alert("Error al parsear la información en formato JSON, verifique");
            }
        }else{
                console.error("Error en la solicitud del servidor con estatus: "+datosInventarioRequest.status);
                alert("Error en la solicitud del servidor con estatus: "+datosInventarioRequest.status);
        }
    }

}



function regresarInicio(){
    localStorage.clear();
    window.location.href = '../inicio.php';
}