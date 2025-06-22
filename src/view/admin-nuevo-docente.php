<!-- src/view/admin-nuevo-docente.php -->
<!-- start page title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Nuevo Docente / Administrador</h4>
                <br>
                <form class="form-horizontal" id="frmRegistrar">
                    <!-- DNI -->
                    <div class="form-group row mb-2">
                        <label for="dni" class="col-3 col-form-label">DNI</label>
                        <div class="col-9">
                            <input
                                type="text"
                                class="form-control"
                                id="dni"
                                name="dni"
                                maxlength="20"
                                placeholder="DNI">
                        </div>
                    </div>

                    <!-- Apellidos y Nombres -->
                    <div class="form-group row mb-2">
                        <label for="apellidos_nombres" class="col-3 col-form-label">Apellidos y Nombres</label>
                        <div class="col-9">
                            <input
                                type="text"
                                class="form-control"
                                id="apellidos_nombres"
                                name="apellidos_nombres"
                                maxlength="125"
                                placeholder="Apellidos y Nombres">
                        </div>
                    </div>

                    <!-- Género -->
                    <div class="form-group row mb-2">
                        <label for="genero" class="col-3 col-form-label">Género</label>
                        <div class="col-9">
                            <select name="genero" id="genero" class="form-control">
                                <option value="">Seleccione</option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div class="form-group row mb-2">
                        <label for="fecha_nac" class="col-3 col-form-label">Fecha de Nacimiento</label>
                        <div class="col-9">
                            <input
                                type="date"
                                class="form-control"
                                id="fecha_nac"
                                name="fecha_nac"
                                placeholder="Fecha de Nacimiento">
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="form-group row mb-2">
                        <label for="direccion" class="col-3 col-form-label">Dirección</label>
                        <div class="col-9">
                            <input
                                type="text"
                                class="form-control"
                                id="direccion"
                                name="direccion"
                                maxlength="200"
                                placeholder="Dirección">
                        </div>
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="form-group row mb-2">
                        <label for="correo" class="col-3 col-form-label">Correo Electrónico</label>
                        <div class="col-9">
                            <input
                                type="email"
                                class="form-control"
                                id="correo"
                                name="correo"
                                maxlength="100"
                                placeholder="Correo Electrónico">
                        </div>
                    </div>

                    <!-- Teléfono -->
                    <div class="form-group row mb-2">
                        <label for="telefono" class="col-3 col-form-label">Teléfono</label>
                        <div class="col-9">
                            <input
                                type="text"
                                class="form-control"
                                id="telefono"
                                name="telefono"
                                maxlength="15"
                                placeholder="Teléfono">
                        </div>
                    </div>

                    <!-- Discapacidad -->
                    <div class="form-group row mb-2">
                        <label for="discapacidad" class="col-3 col-form-label">Discapacidad</label>
                        <div class="col-9">
                            <select name="discapacidad" id="discapacidad" class="form-control">
                                <option value="">Seleccione</option>
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            </select>
                        </div>
                    </div>

                    <!-- Sede -->
                    <div class="form-group row mb-2">
                        <label for="id_sede" class="col-3 col-form-label">Sede</label>
                        <div class="col-9">
                            <select name="id_sede" id="id_sede" class="form-control">
                                <option value="">Cargando...</option>
                            </select>
                        </div>
                    </div>

                    <!-- Cargo (Rol) -->
                    <div class="form-group row mb-2">
                        <label for="id_rol" class="col-3 col-form-label">Cargo</label>
                        <div class="col-9">
                            <select name="id_rol" id="id_rol" class="form-control">
                                <option value="">Cargando...</option>
                            </select>
                        </div>
                    </div>

                    <!-- Programa de Estudios -->
                    <div class="form-group row mb-2">
                        <label for="id_programa_estudios" class="col-3 col-form-label">Programa de Estudio</label>
                        <div class="col-9">
                            <select name="id_programa_estudios" id="id_programa_estudios" class="form-control">
                                <option value="">Cargando...</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-0 justify-content-end row text-center">
                        <div class="col-12">
                            <a href="<?php echo BASE_URL;?>admin/docentes" class="btn btn-light waves-effect waves-light">Regresar</a>
                            <button type="button" class="btn btn-success waves-effect waves-light" onclick="registrar_docente();">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Incluimos el JS que contiene registrar_docente() y datos_form() -->
<script src="<?php echo BASE_URL; ?>src/view/js/functions_usuario.js"></script>
<script>
    // Al cargar la página, levantamos los datos para poblar los <select>
    datos_form();
</script>
<!-- end page title -->
