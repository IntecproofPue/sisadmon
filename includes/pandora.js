// funcion para deshabilitar botones
function deshabilitarBotonesPorName() {
    var botonesDinamicos = document.querySelectorAll('[name="Buton-Dinamico"]');
    botonesDinamicos.forEach(function(boton) {
        boton.disabled = true;
    });
}    

document.addEventListener('DOMContentLoaded', function() {
    var botonesDinamicos = document.querySelectorAll('[name="Buton-Dinamico"]');
    botonesDinamicos.forEach(function(boton) {
        boton.addEventListener('click', function(event) {
            // deshabilita los botones
            botonesDinamicos.forEach(function(boton) {
                boton.disabled = true;
            });
            // habilita el botón que fue pulsado
            event.target.disabled = false;
        });
    });

    var botonHabilitar = document.getElementById('botonHabilitar');
    if (botonHabilitar) {
        botonHabilitar.addEventListener('click', function() {
            // aqui se define la logica para habilitar los botones
            // ejemplo, podrias llamar a mostrarBotones() y deshabilitarBotones() según sea necesario
        });
    } else {
        console.error('El botón "Habilitar" no se encontró.');
    }
});

// ocultar los botones
function ocultarBotones() {
    var botones = ['botonAgregar', 'botonModificar', 'botonGuardar'];
    botones.forEach(function(id) {
        var boton = document.getElementById(id);
        if (boton) {
            boton.style.display = 'none';
        } else {
            console.error('No se encontró el botón con id: ' + id);
        }
    });
}
   

///////////////////////////////////////////////////////////////////////////


// mostrar los botones
function mostrarBotones() {
    var botones = ['botonAgregar', 'botonModificar', 'botonGuardar'];
    botones.forEach(function(id) {
        var boton = document.getElementById(id);
        if (boton) {
            boton.style.display = 'block';
        } else {
            console.error('No se encontró el botón con id: ' + id);
        }
    });
}












