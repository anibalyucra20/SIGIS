<!-- start page title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sedes</h4>
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bd-example-modal-new">+ Nuevo</button>
                <div class="modal fade bd-example-modal-new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4" id="myLargeModalLabel">Registrar Periodo Academico</h5>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="form-group row mb-2">
                                        <label for="codigoModular" class="col-3 col-form-label">Código Modular</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="codigoModular" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="nombre" class="col-3 col-form-label">Nombre</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="nombre" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="periodo" class="col-3 col-form-label">Periodo Académico</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="periodo" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="periodo" class="col-3 col-form-label">Periodo Académico</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="periodo" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="periodo" class="col-3 col-form-label">Periodo Académico</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="periodo" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="periodo" class="col-3 col-form-label">Periodo Académico</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="periodo" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="periodo" class="col-3 col-form-label">Periodo Académico</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="periodo" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="periodo" class="col-3 col-form-label">Periodo Académico</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="periodo" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="director" class="col-3 col-form-label">Director</label>
                                        <div class="col-sm-9 mb-2 mb-sm-0">
                                            <select class="form-control form-control-user" id="director"></select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <table id="example" class="table dt-responsive " width="100%">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Cód. Modular</th>
                            <th>Nombre</th>
                            <th>Distrito</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Responsable</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2024-I</td>
                            <td>2024-02-01</td>
                            <td>2024-09-30</td>
                            <td>usu administrador</td>
                            <td>2024-08-31</td>
                            <td>2024-08-31</td>
                            <td>
                                <a href="" class="btn btn-success" waves-effect waves-light data-toggle="modal" data-target=".bd-example-modal-edit"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <div class="modal fade bd-example-modal-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title h4" id="myLargeModalLabel">Editar Periodo Academico</h5>
                                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal">
                                        <div class="form-group row mb-2">
                                            <label for="periodo" class="col-3 col-form-label">Periodo Académico</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="periodo" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="fechaInicio" class="col-3 col-form-label">Fecha de Inicio</label>
                                            <div class="col-9">
                                                <input type="date" class="form-control" id="fechaInicio" placeholder="Fecha de Inicio">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="fechaFin" class="col-3 col-form-label">Fecha de Finalización</label>
                                            <div class="col-9">
                                                <input type="date" class="form-control" id="fechaFin" placeholder="Fecha de Fin">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="director" class="col-3 col-form-label">Director</label>
                                            <div class="col-sm-9 mb-2 mb-sm-0">
                                                <select class="form-control form-control-user" id="director"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="fechaActas" class="col-3 col-form-label">Fecha para Actas</label>
                                            <div class="col-9">
                                                <input type="date" class="form-control" id="fechaActas" placeholder="Fecha para Actas">
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 justify-content-end row text-center">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                <button type="reset" class="btn btn-light waves-effect waves-light">Deshacer cambios</button>
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->