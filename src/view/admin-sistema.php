<!-- app/Views/datosSistema/index.php -->
<!-- start page title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">DATOS DE SISTEMA</h4>
                <br>
                <form class="form-horizontal" id="formDatosSistema">
                    <div class="form-group row mb-2">
                        <label for="dominio_sistema" class="col-3 col-form-label">Dirección URL del Sistema</label>
                        <div class="col-9">
                            <input type="url" class="form-control" id="dominio_sistema" name="dominio_sistema">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="favicon" class="col-3 col-form-label">Favicon (ruta)</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="favicon" name="favicon">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="logo" class="col-3 col-form-label">Logo (ruta)</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="logo" name="logo">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="titulo_c" class="col-3 col-form-label">Nombre IES Completo</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="titulo_c" name="titulo_c">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="titulo_a" class="col-3 col-form-label">Título Abreviado</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="titulo_a" name="titulo_a">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="pie_pagina" class="col-3 col-form-label">Pie de Página</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="pie_pagina" name="pie_pagina">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="host_email" class="col-3 col-form-label">Host para Email</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="host_email" name="host_email">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="email_email" class="col-3 col-form-label">Dirección Email</label>
                        <div class="col-9">
                            <input type="email" class="form-control" id="email_email" name="email_email">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="password_email" class="col-3 col-form-label">Password Email</label>
                        <div class="col-9">
                            <input type="password" class="form-control" id="password_email" name="password_email">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="puerto_email" class="col-3 col-form-label">Puerto Email</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="puerto_email" name="puerto_email" min="1" step="1">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="color_correo" class="col-3 col-form-label">Color Email</label>
                        <div class="col-9">
                            <input type="color" class="form-control" id="color_correo" name="color_correo" value="#000000">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="cant_semanas" class="col-3 col-form-label">Cantidad Semanas (sílabos)</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="cant_semanas" name="cant_semanas" min="1" step="1">
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
                        document.getElementById('dominio_sistema').disabled = true;
                        document.getElementById('favicon').disabled = true;
                        document.getElementById('logo').disabled = true;
                        document.getElementById('titulo_c').disabled = true;
                        document.getElementById('titulo_a').disabled = true;
                        document.getElementById('pie_pagina').disabled = true;
                        document.getElementById('host_email').disabled = true;
                        document.getElementById('email_email').disabled = true;
                        document.getElementById('password_email').disabled = true;
                        document.getElementById('puerto_email').disabled = true;
                        document.getElementById('color_correo').disabled = true;
                        document.getElementById('cant_semanas').disabled = true;

                        document.getElementById('btn_cancelar').style.display = 'none';
                        document.getElementById('btn_guardar').style.display = 'none';
                        document.getElementById('btn_editar').style.display = '';
                    }

                    function activarControles() {
                        document.getElementById('dominio_sistema').disabled = false;
                        document.getElementById('favicon').disabled = false;
                        document.getElementById('logo').disabled = false;
                        document.getElementById('titulo_c').disabled = false;
                        document.getElementById('titulo_a').disabled = false;
                        document.getElementById('pie_pagina').disabled = false;
                        document.getElementById('host_email').disabled = false;
                        document.getElementById('email_email').disabled = false;
                        document.getElementById('password_email').disabled = false;
                        document.getElementById('puerto_email').disabled = false;
                        document.getElementById('color_correo').disabled = false;
                        document.getElementById('cant_semanas').disabled = false;

                        document.getElementById('btn_cancelar').removeAttribute('style');
                        document.getElementById('btn_guardar').removeAttribute('style');
                        document.getElementById('btn_editar').style.display = 'none';
                    }

                    function cancelar() {
                        desactivarControles();
                    }

                    window.onload = function() {
                        desactivarControles();
                    };
                </script>
                <script src="<?php echo BASE_URL; ?>src/view/js/functions_sistema.js"></script>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
