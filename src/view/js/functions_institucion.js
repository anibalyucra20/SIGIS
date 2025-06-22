// public/js/functions_datosInstitucionales.js

document.addEventListener('DOMContentLoaded', function () {
    cargarDatosInstitucionales();
});

/**
 * Carga los datos de la única fila de sigi_datos_institucionales y los asigna al formulario.
 */
async function cargarDatosInstitucionales() {
    try {
        mostrarPopupCarga();

        const formData = new FormData();
        formData.append('sesion', session_session);
        formData.append('token', token_token);

        const respuesta = await fetch(
            base_url_server + 'src/control/DatosInstitucionales.php?tipo=cargar',
            {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: formData
            }
        );
        const json = await respuesta.json();

        if (json.status) {
            const d = json.contenido;
            document.getElementById('cod_modular').value         = d.cod_modular;
            document.getElementById('ruc').value                  = d.ruc;
            document.getElementById('nombre_institucion').value  = d.nombre_institucion;
            document.getElementById('departamento').value         = d.departamento;
            document.getElementById('provincia').value            = d.provincia;
            document.getElementById('distrito').value             = d.distrito;
            document.getElementById('direccion').value            = d.direccion;
            document.getElementById('telefono').value             = d.telefono;
            document.getElementById('correo').value               = d.correo;
            document.getElementById('nro_resolucion').value       = d.nro_resolucion;
            document.getElementById('estado').value               = d.estado.toString();

            desactivarControles();
        } else if (json.msg === 'Error_Sesion') {
            alerta_sesion();
        }
    } catch (e) {
        console.log('Error al cargar datos institucionales: ' + e);
    } finally {
        ocultarPopupCarga();
    }
}

/**
 * Envía los datos del formulario al controlador para insertar o actualizar.
 */
async function guardarDatosInstitucionales() {
    try {
        mostrarPopupCarga();

        const form = document.getElementById('formDatosInstitucionales');
        const datos = new FormData(form);
        datos.append('sesion', session_session);
        datos.append('token', token_token);

        const respuesta = await fetch(
            base_url_server + 'src/control/DatosInstitucionales.php?tipo=guardar',
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
                text: 'Datos institucionales guardados correctamente',
                confirmButtonClass: 'btn btn-confirm mt-2',
                timer: 1000
            });
            cargarDatosInstitucionales();
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
        console.log('Error al guardar datos institucionales: ' + e);
    } finally {
        ocultarPopupCarga();
    }
}

/**
 * Valida cada campo según el tipo definido en la tabla sigi_datos_institucionales antes de enviar.
 * - cod_modular: no vacío, máximo 20 caracteres
 * - ruc: no vacío, exactamente 11 dígitos numéricos
 * - nombre_institucion: no vacío, máximo 200 caracteres
 * - departamento/provincia/distrito: no vacío, máximo 50 caracteres
 * - direccion: no vacío, máximo 200 caracteres
 * - telefono: no vacío, máximo 15 caracteres, solo dígitos y opcionalmente símbolos "-" o espacios
 * - correo: no vacío, formato de email, máximo 100 caracteres
 * - nro_resolucion: no vacío, máximo 100 caracteres
 * - estado: valor '1' o '0'
 */
function validarCampos() {
    const codModular  = document.getElementById('cod_modular').value.trim();
    const ruc         = document.getElementById('ruc').value.trim();
    const nombreInst  = document.getElementById('nombre_institucion').value.trim();
    const departamento= document.getElementById('departamento').value.trim();
    const provincia   = document.getElementById('provincia').value.trim();
    const distrito    = document.getElementById('distrito').value.trim();
    const direccion   = document.getElementById('direccion').value.trim();
    const telefono    = document.getElementById('telefono').value.trim();
    const correo      = document.getElementById('correo').value.trim();
    const nroResol    = document.getElementById('nro_resolucion').value.trim();
    const estado      = document.getElementById('estado').value;

    // 1. cod_modular: no vacío, max 20 caracteres
    if (codModular === '' || codModular.length > 20) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El Código Modular es obligatorio y no debe exceder 20 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // 2. ruc: no vacío, exactamente 11 dígitos
    if (!/^\d{11}$/.test(ruc)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El RUC debe contener exactamente 11 dígitos numéricos.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // 3. nombre_institucion: no vacío, max 200 caracteres
    if (nombreInst === '' || nombreInst.length > 200) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El Nombre de la Institución es obligatorio y no debe exceder 200 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // 4. departamento, provincia, distrito: no vacío, max 50 caracteres cada uno
    if (departamento === '' || departamento.length > 50) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El Departamento es obligatorio y no debe exceder 50 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (provincia === '' || provincia.length > 50) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'La Provincia es obligatoria y no debe exceder 50 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (distrito === '' || distrito.length > 50) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El Distrito es obligatorio y no debe exceder 50 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // 5. direccion: no vacío, max 200 caracteres
    if (direccion === '' || direccion.length > 200) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'La Dirección es obligatoria y no debe exceder 200 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // 6. telefono: no vacío, max 15 caracteres, permitir dígitos, espacios, guiones
    if (telefono === '' || telefono.length > 15 || !/^[\d\s-]+$/.test(telefono)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El Teléfono es obligatorio, no debe exceder 15 caracteres y solo puede contener dígitos, espacios o guiones.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // 7. correo: no vacío, formato válido, max 100 caracteres
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (correo === '' || correo.length > 100 || !emailPattern.test(correo)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El Correo Institucional es obligatorio, no debe exceder 100 caracteres y debe tener formato válido.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // 8. nro_resolucion: no vacío, max 100 caracteres
    if (nroResol === '' || nroResol.length > 100) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El Nro. de Resolución es obligatorio y no debe exceder 100 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // 9. estado: debe ser '1' o '0'
    if (!(estado === '1' || estado === '0')) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione un Estado válido.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }

    // Si todas las validaciones pasan, llamar a la función para enviar datos
    guardarDatosInstitucionales();
    return false; // Prevenir el envío tradicional del formulario
}
