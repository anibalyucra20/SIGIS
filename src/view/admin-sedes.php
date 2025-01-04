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
                                        <label for="departamento" class="col-3 col-form-label">Departamento</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="departamento" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="provincia" class="col-3 col-form-label">Provincia</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="provincia" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="distrito" class="col-3 col-form-label">Distrito</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="distrito" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="direccion" class="col-3 col-form-label">Dirección</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="direccion" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="telefono" class="col-3 col-form-label">Teléfono</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="telefono" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="correo" class="col-3 col-form-label">Correo Electrónico</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="correo" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label for="responsable" class="col-3 col-form-label">Responsable</label>
                                        <div class="col-sm-9 mb-2 mb-sm-0">
                                            <select class="form-control form-control-user" id="responsable"></select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 justify-content-end row text-center">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-success waves-effect waves-light">Guardar</button>
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
                                <a href="" class="btn btn-primary" waves-effect waves-light data-toggle="modal" data-target=".bd-example-modal-enable"><i class="fa fa-briefcase"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <div class="modal fade bd-example-modal-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title h4" id="myLargeModalLabel">Editar Sede</h5>
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
                                            <label for="departamento" class="col-3 col-form-label">Departamento</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="departamento" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="provincia" class="col-3 col-form-label">Provincia</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="provincia" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="distrito" class="col-3 col-form-label">Distrito</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="distrito" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="direccion" class="col-3 col-form-label">Dirección</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="direccion" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="telefono" class="col-3 col-form-label">Teléfono</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="telefono" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="correo" class="col-3 col-form-label">Correo Electrónico</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="correo" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="responsable" class="col-3 col-form-label">Responsable</label>
                                            <div class="col-sm-9 mb-2 mb-sm-0">
                                                <select class="form-control form-control-user" id="responsable"></select>
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
                    <div class="modal fade bd-example-modal-enable" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title h4" id="myLargeModalLabel">Programas de Estudio por Sede</h5>
                                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal">
                                        <div class="form-group row mb-2">
                                            <label for="codigoModular" class="col-3 col-form-label">Código Modular</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="codigoModular" placeholder="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="nombre" class="col-3 col-form-label">Nombre</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="nombre" placeholder="" disabled>
                                            </div>
                                        </div>
                                        <h5>Programas de Estudio para sede</h5>
                                        <div class="form-group row mb-2">
                                            <label for="dpweb" class="col-6 col-form-label">Diseño y Programación Web</label>
                                            <div class="col-sm-2 mb-2 mb-sm-0">
                                                <select class="form-control form-control-user" id="dpweb">
                                                <option value="">Si</option>
                                                <option value="">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="enfermeria" class="col-6 col-form-label">Enfermería Técnica</label>
                                            <div class="col-sm-2 mb-2 mb-sm-0">
                                                <select class="form-control form-control-user" id="enfermeria">
                                                <option value="">Si</option>
                                                <option value="">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="industrias" class="col-6 col-form-label">Industrias Alimentarias</label>
                                            <div class="col-sm-2 mb-2 mb-sm-0">
                                                <select class="form-control form-control-user" id="industrias">
                                                <option value="">Si</option>
                                                <option value="">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="mecanica" class="col-6 col-form-label">Mecánica Automotriz</label>
                                            <div class="col-sm-2 mb-2 mb-sm-0">
                                                <select class="form-control form-control-user" id="mecanica">
                                                <option value="">Si</option>
                                                <option value="">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="produccion" class="col-6 col-form-label">Producción Agropecuaria</label>
                                            <div class="col-sm-2 mb-2 mb-sm-0">
                                                <select class="form-control form-control-user" id="produccion">
                                                <option value="">Si</option>
                                                <option value="">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 justify-content-end row text-center">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-success waves-effect waves-light">Guardar</button>
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