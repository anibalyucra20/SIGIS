
/**
 * Ejecuta al cargar la vista.
 * Trae los datos necesarios para llenar los <select> del formulario:
 *   - Roles (IDs 1 a 6)
 *   - Sedes
 *   - Programas de Estudio
 */
async function datos_form() {
    try {
        mostrarPopupCarga();

        // Preparo FormData solo con sesión y token (si lo requieres)
        const formData = new FormData();
        formData.append('sesion', session_session);
        formData.append('token', token_token);

        let respuesta = await fetch(
            base_url_server + 'src/control/Usuario.php?tipo=datos_registro',
            {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: formData
            }
        );
        let json = await respuesta.json();

        if (!json.status) {
            if (json.msg === 'Error_Sesion') {
                alerta_sesion();
            }
            return;
        }

        // json.contenido.roles = [{id, nombre}, ...]
        // json.contenido.sedes = [{id, nombre}, ...]
        // json.contenido.programas = [{id, nombre}, ...]
        // (si quisieras periodos: json.contenido.periodos)

        // 1) Cargar Sedes
        let selSede = document.getElementById('id_sede');
        selSede.innerHTML = '<option value="">Seleccione</option>';
        json.contenido.sedes.forEach(s => {
            selSede.innerHTML += `<option value="${s.id}">${s.nombre}</option>`;
        });

        // 2) Cargar Roles (solo IDs permitidos: 1 a 6)
        let selRol = document.getElementById('id_rol');
        selRol.innerHTML = '<option value="">Seleccione</option>';
        const rolesPermitidos = new Set(['1', '2', '3', '4', '5', '6']);
        json.contenido.roles.forEach(r => {
            if (rolesPermitidos.has(r.id)) {
                selRol.innerHTML += `<option value="${r.id}">${r.nombre}</option>`;
            }
        });

        // 3) Cargar Programas de Estudio
        let selProg = document.getElementById('id_programa_estudios');
        selProg.innerHTML = '<option value="">Seleccione</option>';
        json.contenido.programas.forEach(pr => {
            selProg.innerHTML += `<option value="${pr.id}">${pr.nombre}</option>`;
        });

        // (Si necesitas Períodos, agregas algo como:)
        // let selPeriodo = document.getElementById('id_periodo_registro');
        // selPeriodo.innerHTML = '<option value="">Seleccione</option>';
        // json.contenido.periodos.forEach(p => {
        //     selPeriodo.innerHTML += `<option value="${p.id}">${p.nombre}</option>`;
        // });

    } catch (e) {
        console.log('Error en datos_form():', e);
    } finally {
        ocultarPopupCarga();
    }
}

/**
 * Toma los valores del formulario, valida que no estén vacíos
 * y envía el FormData a Usuario.php?tipo=registrar_docente
 */
async function registrar_docente() {
    // Leer cada campo
    const dni                  = document.getElementById('dni').value.trim();
    const apellidos_nombres    = document.getElementById('apellidos_nombres').value.trim();
    const genero               = document.getElementById('genero').value;
    const fecha_nac            = document.getElementById('fecha_nac').value;
    const direccion            = document.getElementById('direccion').value.trim();
    const correo               = document.getElementById('correo').value.trim();
    const telefono             = document.getElementById('telefono').value.trim();
    const discapacidad         = document.getElementById('discapacidad').value;
    const id_sede              = document.getElementById('id_sede').value;
    const id_rol               = document.getElementById('id_rol').value;
    const id_periodo_registro  = document.getElementById('id_periodo_actual_menu').value;
    const id_programa_estudios = document.getElementById('id_programa_estudios').value;

    // Validaciones según la tabla sigi_usuarios
    if (!validarCampos({
        dni,
        apellidos_nombres,
        genero,
        fecha_nac,
        direccion,
        correo,
        telefono,
        discapacidad,
        id_sede,
        id_rol,
        id_periodo_registro,
        id_programa_estudios
    })) {
        return;
    }

    try {
        mostrarPopupCarga();

        const datos = new FormData();
        datos.append('dni', dni);
        datos.append('apellidos_nombres', apellidos_nombres);
        datos.append('genero', genero);
        datos.append('fecha_nac', fecha_nac);
        datos.append('direccion', direccion);
        datos.append('correo', correo);
        datos.append('telefono', telefono);
        datos.append('discapacidad', discapacidad);
        datos.append('id_sede', id_sede);
        datos.append('id_rol', id_rol);
        datos.append('id_periodo_registro', id_periodo_registro);
        datos.append('id_programa_estudios', id_programa_estudios);

        datos.append('sesion', session_session);
        datos.append('token', token_token);

        let respuesta = await fetch(
            base_url_server + 'src/control/Usuario.php?tipo=registrar_docente',
            {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: datos
            }
        );
        let json = await respuesta.json();

        if (json.status) {
            document.getElementById('frmRegistrar').reset();
            Swal.fire({
                type: 'success',
                title: 'Registro Exitoso',
                text: json.msg,
                confirmButtonClass: 'btn btn-confirm mt-2',
                timer: 1000
            });
        } else if (json.msg === 'Error_Sesion') {
            alerta_sesion();
        } else {
            Swal.fire({
                type: 'error',
                title: 'Error',
                text: json.msg || 'No se pudo registrar.',
                confirmButtonClass: 'btn btn-confirm mt-2'
            });
        }
    } catch (e) {
        console.log('Error en registrar_docente():', e);
    } finally {
        ocultarPopupCarga();
    }
}

/**
 * Valida cada campo según la definición de sigi_usuarios:
 *  - dni: no vacío, max 20 caracteres.
 *  - apellidos_nombres: no vacío, max 125 caracteres.
 *  - genero: 'M' o 'F'.
 *  - fecha_nac: no vacío, formato válido.
 *  - direccion: no vacío, max 200 caracteres.
 *  - correo: no vacío, max 100 caracteres, formato email válido.
 *  - telefono: no vacío, max 15 caracteres, solo dígitos, espacios o guiones.
 *  - discapacidad: 'SI' o 'NO'.
 *  - id_sede: seleccionado (no vacío).
 *  - id_rol: seleccionado y dentro de [1..6].
 *  - id_periodo_registro: seleccionado (no vacío).
 *  - id_programa_estudios: seleccionado (no vacío).
 */
function validarCampos(fields) {
    const {
        dni,
        apellidos_nombres,
        genero,
        fecha_nac,
        direccion,
        correo,
        telefono,
        discapacidad,
        id_sede,
        id_rol,
        id_periodo_registro,
        id_programa_estudios
    } = fields;

    if (dni === '' || dni.length > 20) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El DNI es obligatorio y no debe exceder 20 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (apellidos_nombres === '' || apellidos_nombres.length > 125) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Los apellidos y nombres son obligatorios y no deben exceder 125 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (!['M', 'F'].includes(genero)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione un género válido.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (fecha_nac === '') {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'La fecha de nacimiento es obligatoria.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (direccion === '' || direccion.length > 200) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'La dirección es obligatoria y no debe exceder 200 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (correo === '' || correo.length > 100 || !emailPattern.test(correo)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El correo es obligatorio, no debe exceder 100 caracteres y debe ser válido.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (telefono === '' || telefono.length > 15 || !/^[\d\s-]+$/.test(telefono)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El teléfono es obligatorio, no debe exceder 15 caracteres y solo puede contener dígitos, espacios o guiones.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (!['SI', 'NO'].includes(discapacidad)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione una opción válida para discapacidad ("SI" o "NO").',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (id_sede === '') {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione una sede.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    const rolesPermitidos = new Set(["1", "2", "3", "4", "5", "6"]);
    if (!rolesPermitidos.has(id_rol.toString())) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione un rol válido (Administrador o Docente).',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (id_periodo_registro === '') {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione un período académico.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (id_programa_estudios === '') {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione un programa de estudio.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    return true;
}

// src/view/js/functions_usuario.js

/**
 * Dependencias (en main.js):
 *   - cargarFiltros(): carga <select> de programas y sedes.
 *   - generarPaginacion(total, porPagina): genera HTML de paginación.
 *   - generarTextoPaginacion(total, porPagina, paginaActual): retorna texto descriptivo.
 */

document.addEventListener('DOMContentLoaded', function () {
    // Carga los <select> de Filtros (programas, sedes)
    cargarFiltros();
    // Muestra la primera página
    numero_pagina(1);
});

/**
 * Cambia la página actual y luego llama a listar_docentesOrdenados().
 * @param {number} pagina
 */
function numero_pagina(pagina) {
    // Leer valores de filtros visibles
    const dniFiltro       = document.getElementById('busqueda_tabla_dni').value.trim();
    const nomapFiltro     = document.getElementById('busqueda_tabla_nomap').value.trim();
    const peFiltro        = document.getElementById('busqueda_tabla_pe').value;
    const estadoFiltro    = document.getElementById('busqueda_tabla_estado').value;
    const sedeFiltro      = document.getElementById('busqueda_tabla_sede').value;

    // Actualizar inputs ocultos
    document.getElementById('filtro_dni').value    = dniFiltro;
    document.getElementById('filtro_nomap').value  = nomapFiltro;
    document.getElementById('filtro_pe').value     = peFiltro;
    document.getElementById('filtro_estado').value = estadoFiltro;
    document.getElementById('filtro_sede').value   = sedeFiltro;

    // Fijar número de página
    document.getElementById('pagina').value = pagina;

    // Listar con los nuevos valores
    listar_docentesOrdenados();
}

/**
 * Envía la petición al backend para obtener la lista de usuarios según filtros y paginación.
 * Renderiza la tabla de resultados y la paginación.
 */
async function listar_docentesOrdenados() {
    try {
        mostrarPopupCarga();

        // Parámetros de paginación y filtros
        const pagina           = parseInt(document.getElementById('pagina').value, 10);
        const cantidad         = parseInt(document.getElementById('cantidad_mostrar').value, 10);
        const filtro_dni       = document.getElementById('filtro_dni').value;
        const filtro_nomap     = document.getElementById('filtro_nomap').value;
        const filtro_pe        = document.getElementById('filtro_pe').value;
        const filtro_estado    = document.getElementById('filtro_estado').value;
        const filtro_sede      = document.getElementById('filtro_sede').value;

        // Armar FormData
        const formData = new FormData();
        formData.append('pagina', pagina);
        formData.append('cantidad_mostrar', cantidad);
        formData.append('filtro_dni', filtro_dni);
        formData.append('filtro_nomap', filtro_nomap);
        formData.append('filtro_pe', filtro_pe);
        formData.append('filtro_estado', filtro_estado);
        formData.append('filtro_sede', filtro_sede);
        formData.append('sesion', session_session);
        formData.append('token', token_token);

        // Petición
        let respuesta = await fetch(
            base_url_server + 'src/control/Usuario.php?tipo=listar_tabla_docentes',
            {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: formData
            }
        );
        let json = await respuesta.json();

        const contenedor = document.getElementById('tablas');
        contenedor.innerHTML = '';

        if (!json.status) {
            if (json.msg === 'Error_Sesion') {
                alerta_sesion();
            } else {
                contenedor.innerHTML = `<p>No se encontraron resultados.</p>`;
            }
            return;
        }

        // Construir tabla
        let tablaHTML = `
            <table class="table table-striped table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>DNI</th>
                        <th>Apellidos y Nombres</th>
                        <th>Género</th>
                        <th>F. Nac.</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Discapacidad</th>
                        <th>Programa</th>
                        <th>Período</th>
                        <th>Rol</th>
                        <th>Sede</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="contenido_tabla">
                </tbody>
            </table>
        `;
        contenedor.innerHTML = tablaHTML;
        document.getElementById('modals_editar').innerHTML = '';
        document.getElementById('modals_permisos').innerHTML = '';

        const cuerpo = document.getElementById('contenido_tabla');
        let contador = (pagina - 1) * cantidad + 1;

        json.contenido.forEach(u => {
            const estadoTexto = (u.estado == 1) ? 'Activo' : 'Inactivo';
            const fila = document.createElement('tr');

            fila.innerHTML = `
                <td>${contador++}</td>
                <td>${u.dni}</td>
                <td>${u.apellidos_nombres}</td>
                <td>${u.genero}</td>
                <td>${u.fecha_nac}</td>
                <td>${u.direccion}</td>
                <td>${u.correo}</td>
                <td>${u.telefono}</td>
                <td>${u.discapacidad}</td>
                <td>${u.programa_nombre}</td>
                <td>${u.periodo_nombre}</td>
                <td>${u.rol_nombre}</td>
                <td>${u.sede_nombre}</td>
                <td>${estadoTexto}</td>
                <td>
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target=".modal_editar${u.id}">
                        <i class="fa fa-edit"></i>
                    </button>
                </td>
            `;

            // Construir modal de edición
            const modal = document.createElement('div');
            modal.className = `modal fade modal_editar${u.id}`;
            modal.tabIndex = -1;
            modal.role = 'dialog';
            modal.innerHTML = `
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" id="frmEditar${u.id}">
                                <input type="hidden" name="id" value="${u.id}">

                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">DNI</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="dni" value="${u.dni}" maxlength="20">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Apellidos y Nombres</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="apellidos_nombres" value="${u.apellidos_nombres}" maxlength="125">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Género</label>
                                    <div class="col-9">
                                        <select name="genero" class="form-control">
                                            <option value="M" ${u.genero === 'M' ? 'selected' : ''}>M</option>
                                            <option value="F" ${u.genero === 'F' ? 'selected' : ''}>F</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Fecha Nacimiento</label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" name="fecha_nac" value="${u.fecha_nac}">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Dirección</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="direccion" value="${u.direccion}" maxlength="200">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Correo</label>
                                    <div class="col-9">
                                        <input type="email" class="form-control" name="correo" value="${u.correo}" maxlength="100">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Teléfono</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="telefono" value="${u.telefono}" maxlength="15">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Discapacidad</label>
                                    <div class="col-9">
                                        <select name="discapacidad" class="form-control">
                                            <option value="NO" ${u.discapacidad === 'NO' ? 'selected' : ''}>NO</option>
                                            <option value="SI" ${u.discapacidad === 'SI' ? 'selected' : ''}>SI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Sede</label>
                                    <div class="col-9">
                                        <select name="id_sede" class="form-control">
                                            <option value="">Seleccione</option>
                                            ${json.contenido.sedes
                                                .map(sd =>
                                                    `<option value="${sd.id}" ${sd.id == u.id_sede ? 'selected' : ''}>${sd.nombre}</option>`
                                                ).join('')}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Rol</label>
                                    <div class="col-9">
                                        <select name="id_rol" class="form-control">
                                            <option value="">Seleccione</option>
                                            ${json.contenido.roles
                                                .filter(r => ['1','2','3','4','5','6'].includes(r.id.toString()))
                                                .map(r =>
                                                    `<option value="${r.id}" ${r.id == u.id_rol ? 'selected' : ''}>${r.nombre}</option>`
                                                ).join('')}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Período Académico</label>
                                    <div class="col-9">
                                        <select name="id_periodo_registro" class="form-control">
                                            <option value="">Seleccione</option>
                                            ${json.contenido.periodos
                                                .map(p =>
                                                    `<option value="${p.id}" ${p.id == u.id_periodo_registro ? 'selected' : ''}>${p.nombre}</option>`
                                                ).join('')}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Programa</label>
                                    <div class="col-9">
                                        <select name="id_programa_estudios" class="form-control">
                                            <option value="">Seleccione</option>
                                            ${json.contenido.programas
                                                .map(pr =>
                                                    `<option value="${pr.id}" ${pr.id == u.id_programa_estudios ? 'selected' : ''}>${pr.nombre}</option>`
                                                ).join('')}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Estado</label>
                                    <div class="col-9">
                                        <select name="estado" class="form-control">
                                            <option value="1" ${u.estado == 1 ? 'selected' : ''}>Activo</option>
                                            <option value="0" ${u.estado == 0 ? 'selected' : ''}>Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-0 justify-content-end row text-center">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">
                                            Cancelar
                                        </button>
                                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                                onclick="actualizar_docente(${u.id});">
                                            Guardar Cambios
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            `;

            cuerpo.appendChild(fila);
            document.getElementById('modals_editar').appendChild(modal);
        });

        // Paginación (usa funciones definidas en main.js)
        document.getElementById('lista_paginacion_tabla').innerHTML =
            generarPaginacion(json.total, cantidad);
        document.getElementById('texto_paginacion_tabla').innerText =
            generarTextoPaginacion(json.total, cantidad, pagina);

    } catch (e) {
        console.log('Error en listar_docentesOrdenados():', e);
    } finally {
        ocultarPopupCarga();
    }
}

/**
 * Llama al backend para actualizar los datos del docente existente.
 */
async function actualizar_docente(id) {
    const form = document.getElementById(`frmEditar${id}`);
    const formData = new FormData(form);

    // Validación mínima (igual que en registrar)
    const fields = {
        dni:                  formData.get('dni').trim(),
        apellidos_nombres:    formData.get('apellidos_nombres').trim(),
        genero:               formData.get('genero'),
        fecha_nac:            formData.get('fecha_nac'),
        direccion:            formData.get('direccion').trim(),
        correo:               formData.get('correo').trim(),
        telefono:             formData.get('telefono').trim(),
        discapacidad:         formData.get('discapacidad'),
        id_sede:              formData.get('id_sede'),
        id_rol:               formData.get('id_rol'),
        id_periodo_registro:  formData.get('id_periodo_registro'),
        id_programa_estudios: formData.get('id_programa_estudios'),
        estado:               formData.get('estado')
    };
    if (!validarCampos(fields)) return;

    try {
        mostrarPopupCarga();

        formData.append('id', id);
        formData.append('sesion', session_session);
        formData.append('token', token_token);

        let respuesta = await fetch(
            base_url_server + 'src/control/Usuario.php?tipo=actualizar_docente',
            {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: formData
            }
        );
        let json = await respuesta.json();

        if (json.status) {
            $(`.modal_editar${id}`).modal('hide');
            Swal.fire({
                type: 'success',
                title: 'Actualizado',
                text: json.msg || 'Cambios guardados correctamente.',
                confirmButtonClass: 'btn btn-confirm mt-2',
                timer: 1000
            }).then(() => numero_pagina(parseInt(document.getElementById('pagina').value, 10)));
        } else if (json.msg === 'Error_Sesion') {
            alerta_sesion();
        } else {
            Swal.fire({
                type: 'error',
                title: 'Error',
                text: json.msg || 'Fallo al actualizar.',
                confirmButtonClass: 'btn btn-confirm mt-2'
            });
        }
    } catch (e) {
        console.log('Error en actualizar_docente():', e);
    } finally {
        ocultarPopupCarga();
    }
}

/**
 * Valida cada campo según la definición de sigi_usuarios.
 */
function validarCampos(fields) {
    const {
        dni,
        apellidos_nombres,
        genero,
        fecha_nac,
        direccion,
        correo,
        telefono,
        discapacidad,
        id_sede,
        id_rol,
        id_periodo_registro,
        id_programa_estudios,
        estado
    } = fields;

    if (dni === '' || dni.length > 20) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El DNI es obligatorio y no debe exceder 20 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (apellidos_nombres === '' || apellidos_nombres.length > 125) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Los apellidos y nombres son obligatorios y no deben exceder 125 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (!['M', 'F'].includes(genero)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione un género válido.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (fecha_nac === '') {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'La fecha de nacimiento es obligatoria.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (direccion === '' || direccion.length > 200) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'La dirección es obligatoria y no debe exceder 200 caracteres.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (correo === '' || correo.length > 100 || !emailPattern.test(correo)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El correo es obligatorio, no debe exceder 100 caracteres y debe ser válido.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (telefono === '' || telefono.length > 15 || !/^[\d\s-]+$/.test(telefono)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El teléfono es obligatorio, no debe exceder 15 caracteres y solo puede contener dígitos, espacios o guiones.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (!['SI', 'NO'].includes(discapacidad)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione una opción válida para discapacidad (“SI” o “NO”).',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (id_sede === '') {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione una sede.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    const rolesPermitidos = new Set(["1", "2", "3", "4", "5", "6"]);
    if (!rolesPermitidos.has(id_rol.toString())) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione un rol válido (Administrador o Docente).',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (id_periodo_registro === '') {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione un período académico.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (id_programa_estudios === '') {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione un programa de estudio.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    if (typeof estado !== 'undefined' && !['1', '0'].includes(estado)) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Seleccione un estado válido.',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
        return false;
    }
    return true;
}

