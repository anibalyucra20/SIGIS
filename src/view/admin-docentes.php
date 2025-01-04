<!-- start page title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Relación de Docentes</h4>
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".modal-nuevo">+ Nuevo</button>
                <div class="modal fade modal-nuevo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h5 class="modal-title h4 " id="myLargeModalLabel">Nuevo Docente</h5>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12">
                                    <form class="form-horizontal">
                                        <div class="form-group row mb-2">
                                            <label for="dni" class="col-3 col-form-label">DNI</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="dni" name="dni">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="apellidosnombres" class="col-3 col-form-label">Apellidos y Nombres</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="apellidosnombres" name="apellidosnombres">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="inputPassword5" class="col-3 col-form-label">Género</label>
                                            <div class="col-9">
                                                <select name="genero" id="genero" class="form-control">
                                                    <option value=""></option>
                                                    <option value="M">M</option>
                                                    <option value="F">F</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="fecha_nacimiento" class="col-3 col-form-label">Fecha de Nacimiento</label>
                                            <div class="col-9">
                                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="direccion" class="col-3 col-form-label">Dirección </label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="direccion" name="direccion">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="email" class="col-3 col-form-label">Correo Electrónico</label>
                                            <div class="col-9">
                                                <input type="email" class="form-control" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="telefono" class="col-3 col-form-label">Teléfono </label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="telefono" name="telefono">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="discapacidad" class="col-3 col-form-label">Discapacidad </label>
                                            <div class="col-9">
                                                <select name="discapacidad" id="discapacidad" class="form-control">
                                                    <option value=""></option>
                                                    <option value="NO">NO</option>
                                                    <option value="SI">SI</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="sede" class="col-3 col-form-label">Sede </label>
                                            <div class="col-9">
                                                <select name="sede" id="sede" class="form-control">
                                                    <option value=""></option>
                                                    <option value="1">HUANTA</option>
                                                    <option value="2">HUAMANGA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="cargo" class="col-3 col-form-label">Cargo </label>
                                            <div class="col-9">
                                                <select name="cargo" id="cargo" class="form-control">
                                                    <option value=""></option>
                                                    <option value="1">DIRECTOR</option>
                                                    <option value="1">SECRETARIO ACADEMICO</option>
                                                    <option value="1">DOCENTE</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="programa_estudio" class="col-3 col-form-label">Programa de Estudio </label>
                                            <div class="col-9">
                                                <select name="programa_estudio" id="programa_estudio" class="form-control">
                                                    <option value=""></option>
                                                    <option value="1">DISEÑO Y PROGRAMACION WEB</option>
                                                    <option value="2">ENFERMERIA TECNICA</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 justify-content-end row text-center">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Registrar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <table id="example" class="table dt-responsive " width="100%">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>DNI</th>
                            <th>Apellidos y Nombres</th>
                            <th>Género</th>
                            <th>Sede</th>
                            <th>Programa de Estudio</th>
                            <th>Cargo</th>
                            <th>Activo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>12345678</td>
                            <td>yucra curo anibal</td>
                            <td>M</td>
                            <td>HUANTA</td>
                            <td>DPW</td>
                            <td>DOCENTE</td>
                            <td>SI</td>
                            <td>
                                <button type="button" title="Editar" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".modal-editar"><i class="fa fa-edit"></i></button>
                                <button type="button" title="Persimos" class="btn btn-light waves-effect waves-light" data-toggle="modal" data-target=".modal-permisos"><i class="fa fa-folder-open"></i></button>
                                <button class="btn btn-info" title="Resetear Contraseña" onclick=""><i class="fa fa-key"></i></button>
                            </td>
                            <div class="modal fade modal-editar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title h4 " id="myLargeModalLabel">Actualizar datos de docente</h5>
                                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-12">
                                                <form class="form-horizontal">
                                                    <div class="form-group row mb-2">
                                                        <label for="dni" class="col-3 col-form-label">DNI</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="dni" name="dni">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="apellidosnombres" class="col-3 col-form-label">Apellidos y Nombres</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="apellidosnombres" name="apellidosnombres">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="inputPassword5" class="col-3 col-form-label">Género</label>
                                                        <div class="col-9">
                                                            <select name="genero" id="genero" class="form-control">
                                                                <option value=""></option>
                                                                <option value="M">M</option>
                                                                <option value="F">F</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="fecha_nacimiento" class="col-3 col-form-label">Fecha de Nacimiento</label>
                                                        <div class="col-9">
                                                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="direccion" class="col-3 col-form-label">Dirección </label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="direccion" name="direccion">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="email" class="col-3 col-form-label">Correo Electrónico</label>
                                                        <div class="col-9">
                                                            <input type="email" class="form-control" id="email" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="telefono" class="col-3 col-form-label">Teléfono </label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="telefono" name="telefono">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="discapacidad" class="col-3 col-form-label">Discapacidad </label>
                                                        <div class="col-9">
                                                            <select name="discapacidad" id="discapacidad" class="form-control">
                                                                <option value=""></option>
                                                                <option value="NO">NO</option>
                                                                <option value="SI">SI</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="sede" class="col-3 col-form-label">Sede </label>
                                                        <div class="col-9">
                                                            <select name="sede" id="sede" class="form-control">
                                                                <option value=""></option>
                                                                <option value="1">HUANTA</option>
                                                                <option value="2">HUAMANGA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="cargo" class="col-3 col-form-label">Cargo </label>
                                                        <div class="col-9">
                                                            <select name="cargo" id="cargo" class="form-control">
                                                                <option value=""></option>
                                                                <option value="1">DIRECTOR</option>
                                                                <option value="1">SECRETARIO ACADEMICO</option>
                                                                <option value="1">DOCENTE</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="programa_estudio" class="col-3 col-form-label">Programa de Estudio </label>
                                                        <div class="col-9">
                                                            <select name="programa_estudio" id="programa_estudio" class="form-control">
                                                                <option value=""></option>
                                                                <option value="1">DISEÑO Y PROGRAMACION WEB</option>
                                                                <option value="2">ENFERMERIA TECNICA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="programa_estudio" class="col-3 col-form-label">ACTIVO </label>
                                                        <div class="col-9">
                                                            <select name="programa_estudio" id="programa_estudio" class="form-control">
                                                                <option value=""></option>
                                                                <option value="1">SI</option>
                                                                <option value="2">NO</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-0 justify-content-end row text-center">
                                                        <div class="col-12">
                                                            <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-success waves-effect waves-light">Registrar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade modal-permisos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title h4 " id="myLargeModalLabel">Permisos de Usuario</h5>
                                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-12">
                                                <form class="form-horizontal">
                                                    <div class="form-group row mb-2">
                                                        <label for="dni" class="col-3 col-form-label">DNI</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="dni" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="apellidosnombres" class="col-3 col-form-label">Apellidos y Nombres</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="apellidosnombres" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label for="inputPassword5" class="col-3 col-form-label">Sistemas :</label>
                                                        <div class="col-9">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <div class="form-group row mb-2 col-5">
                                                            <label for="inputPassword5" class="col-8 col-form-label">ADMINISTRADOR</label>
                                                            <div class="col-4">
                                                                <select name="sigi" id="sigi" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="1">SI</option>
                                                                    <option value="2">NO</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-2 col-5">
                                                            <label for="inputPassword5" class="col-3 col-form-label">ROL</label>
                                                            <div class="col-9">
                                                                <select name="sigi" id="sigi" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="1">DIRECTOR</option>
                                                                    <option value="2">SECRETARIO ACADEMICO</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <div class="form-group row mb-2 col-5">
                                                            <label for="inputPassword5" class="col-8 col-form-label">ACADEMICO</label>
                                                            <div class="col-4">
                                                                <select name="sigi" id="sigi" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="1">SI</option>
                                                                    <option value="2">NO</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-2 col-5">
                                                            <label for="inputPassword5" class="col-3 col-form-label">ROL</label>
                                                            <div class="col-9">
                                                                <select name="sigi" id="sigi" class="form-control">
                                                                    <option value=""></option>
                                                                    <option value="1">DIRECTOR</option>
                                                                    <option value="2">SECRETARIO ACADEMICO</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group mb-0 justify-content-end row text-center">
                                                        <div class="col-12">
                                                            <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-success waves-effect waves-light">Actualizar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->