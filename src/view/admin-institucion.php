<!-- app/Views/datosInstitucionales/index.php -->
<!-- start page title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">DATOS INSTITUCIONALES</h4>
                <br>
                <form class="form-horizontal" id="formDatosInstitucionales">
                    <div class="form-group row mb-2">
                        <label for="cod_modular" class="col-3 col-form-label">Código Modular</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="cod_modular" name="cod_modular" maxlength="20">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="ruc" class="col-3 col-form-label">RUC</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="ruc" name="ruc" maxlength="11">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="nombre_institucion" class="col-3 col-form-label">Nombre de la Institución</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="nombre_institucion" name="nombre_institucion" maxlength="200">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="departamento" class="col-3 col-form-label">Departamento</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="departamento" name="departamento" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="provincia" class="col-3 col-form-label">Provincia</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="provincia" name="provincia" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="distrito" class="col-3 col-form-label">Distrito</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="distrito" name="distrito" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="direccion" class="col-3 col-form-label">Dirección</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="direccion" name="direccion" maxlength="200">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="telefono" class="col-3 col-form-label">Teléfono</label>
                        <div class="col-9">
                            <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="15">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="correo" class="col-3 col-form-label">Correo Institucional</label>
                        <div class="col-9">
                            <input type="email" class="form-control" id="correo" name="correo" maxlength="100">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="nro_resolucion" class="col-3 col-form-label">Nro. de Resolución</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="nro_resolucion" name="nro_resolucion" maxlength="100">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="estado" class="col-3 col-form-label">Estado</label>
                        <div class="col-9">
                            <select class="form-control" id="estado" name="estado">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row text-center">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="btn_guardar" onclick="validarCampos();">Guardar</button>
                            <button type="button" class="btn btn-warning" id="btn_cancelar" onclick="desactivarControles(); cancelar();">Cancelar</button>
                        </div>
                    </div>
                    <div align="center">
                        <button type="button" class="btn btn-success" id="btn_editar" onclick="activarControles();">Editar Datos</button>
                    </div>
                </form>

                <script>
                    function desactivarControles() {
                        document.getElementById('cod_modular').disabled = true;
                        document.getElementById('ruc').disabled = true;
                        document.getElementById('nombre_institucion').disabled = true;
                        document.getElementById('departamento').disabled = true;
                        document.getElementById('provincia').disabled = true;
                        document.getElementById('distrito').disabled = true;
                        document.getElementById('direccion').disabled = true;
                        document.getElementById('telefono').disabled = true;
                        document.getElementById('correo').disabled = true;
                        document.getElementById('nro_resolucion').disabled = true;
                        document.getElementById('estado').disabled = true;

                        document.getElementById('btn_cancelar').style.display = 'none';
                        document.getElementById('btn_guardar').style.display = 'none';
                        document.getElementById('btn_editar').style.display = '';
                    }

                    function activarControles() {
                        document.getElementById('cod_modular').disabled = false;
                        document.getElementById('ruc').disabled = false;
                        document.getElementById('nombre_institucion').disabled = false;
                        document.getElementById('departamento').disabled = false;
                        document.getElementById('provincia').disabled = false;
                        document.getElementById('distrito').disabled = false;
                        document.getElementById('direccion').disabled = false;
                        document.getElementById('telefono').disabled = false;
                        document.getElementById('correo').disabled = false;
                        document.getElementById('nro_resolucion').disabled = false;
                        document.getElementById('estado').disabled = false;

                        document.getElementById('btn_cancelar').removeAttribute('style');
                        document.getElementById('btn_guardar').removeAttribute('style');
                        document.getElementById('btn_editar').style.display = 'none';
                    }

                    function cancelar() {
                        document.getElementById('formDatosInstitucionales').reset();
                        desactivarControles();
                    }

                    window.onload = function() {
                        desactivarControles();
                    };
                </script>
                <script src="<?php echo BASE_URL; ?>src/view/js/functions_institucion.js"></script>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
