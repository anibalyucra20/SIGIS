// public/js/functions_datosSistema.js

// Ejecutar al cargar la página: traer datos y desactivar controles
document.addEventListener('DOMContentLoaded', function () {
    cargarDatosSistema();
});

/**
 * Carga los datos actuales de “Datos de Sistema” desde el controlador
 * y los asigna a los inputs del formulario. Luego desactiva los controles.
 */
async function cargarDatosSistema() {
    try {
        mostrarPopupCarga();

        const formData = new FormData();
        formData.append('sesion', session_session);
        formData.append('token', token_token);

        const respuesta = await fetch(
            base_url_server + 'src/control/DatosSistema.php?tipo=cargar',
            {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: formData
            }
        );
        const json = await respuesta.json();

        if (json.status) {
            const datos = json.contenido;
            document.getElementById('dominio_sistema').value   = datos.dominio_sistema;
            document.getElementById('favicon').value           = datos.favicon;
            document.getElementById('logo').value              = datos.logo;
            document.getElementById('titulo_c').value          = datos.titulo_c;
            document.getElementById('titulo_a').value          = datos.titulo_a;
            document.getElementById('pie_pagina').value        = datos.pie_pagina;
            document.getElementById('host_email').value        = datos.host_email;
            document.getElementById('email_email').value       = datos.email_email;
            document.getElementById('password_email').value    = datos.password_email;
            document.getElementById('puerto_email').value      = datos.puerto_email;
            document.getElementById('color_correo').value      = datos.color_correo;
            document.getElementById('cant_semanas').value      = datos.cant_semanas;

            desactivar_controles();
        } else if (json.msg === 'Error_Sesion') {
            alerta_sesion();
        } else {
            // Si no hay datos, podemos mantener los campos en blanco
        }
    } catch (e) {
        console.log('Error al cargar datos de sistema: ' + e);
    } finally {
        ocultarPopupCarga();
    }
}

/**
 * Envía los datos del formulario al controlador para guardarlos o actualizarlos.
 * Muestra alertas según el resultado.
 */
async function guardarDatosSistema() {
    try {
        mostrarPopupCarga();

        const form = document.getElementById('formDatosSistema');
        const datos = new FormData(form);
        datos.append('sesion', session_session);
        datos.append('token', token_token);

        const respuesta = await fetch(
            base_url_server + 'src/control/DatosSistema.php?tipo=guardar',
            {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: datos
            }
        );
        const json = await respuesta.json();

        if (json.status) {
            Swal.fire({
                type: 'success',
                title: 'Guardado',
                text: 'Datos guardados correctamente',
                confirmButtonClass: 'btn btn-confirm mt-2',
                timer: 1000
            });
            // Recargar datos y desactivar controles
            cargarDatosSistema();
        } else if (json.msg === 'Error_Sesion') {
            alerta_sesion();
        } else {
            Swal.fire({
                type: 'error',
                title: 'Error',
                text: 'No se pudo guardar la información',
                confirmButtonClass: 'btn btn-confirm mt-2'
            });
        }
    } catch (e) {
        console.log('Error al guardar datos de sistema: ' + e);
    } finally {
        ocultarPopupCarga();
    }
}

/**
 * Valida los campos del formulario antes de guardar.
 * Si todo es correcto, llama a guardarDatosSistema() y previene el envío tradicional.
 */
function validarCampos() {
    const dominio      = document.getElementById('dominio_sistema').value.trim();
    const favicon      = document.getElementById('favicon').value.trim();
    const logo         = document.getElementById('logo').value.trim();
    const tituloC      = document.getElementById('titulo_c').value.trim();
    const tituloA      = document.getElementById('titulo_a').value.trim();
    const piePagina    = document.getElementById('pie_pagina').value.trim();
    const hostEmail    = document.getElementById('host_email').value.trim();
    const emailEmail   = document.getElementById('email_email').value.trim();
    const passEmail    = document.getElementById('password_email').value.trim();
    const puertoEmail  = document.getElementById('puerto_email').value.trim();
    const colorCorreo  = document.getElementById('color_correo').value.trim();
    const cantSemanas  = document.getElementById('cant_semanas').value.trim();

    // Validar que ningún campo esté vacío
    if (
        dominio === "" ||
        favicon === "" ||
        logo === "" ||
        tituloC === "" ||
        tituloA === "" ||
        piePagina === "" ||
        hostEmail === "" ||
        emailEmail === "" ||
        passEmail === "" ||
        puertoEmail === "" ||
        colorCorreo === "" ||
        cantSemanas === ""
    ) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Todos los campos son obligatorios.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // Validar formato de correo
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(emailEmail)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Ingrese una dirección de correo válida.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // Validar que puerto sea numérico
    if (isNaN(puertoEmail)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El puerto de email debe ser numérico.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // Validar que Cantidad de Semanas sea numérico
    if (isNaN(cantSemanas)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'La cantidad de semanas debe ser numérica.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // Si todo está bien, llamar a la función que guarda vía AJAX y prevenir el submit
    guardarDatosSistema();
    return false;
}
