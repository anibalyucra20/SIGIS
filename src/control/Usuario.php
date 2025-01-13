<?php
require_once('../model/admin-usuarioModel.php');
require_once('../model/admin-sedeModel.php');
require_once('../model/admin-programaEstudioModel.php');
require_once('../model/admin-rolesModel.php');
require_once('../model/admin-sistemasIntegradosModel.php');
$tipo = $_REQUEST['tipo'];

//instanciar la clase categoria model
$objUsuario = new UsuarioModel();
$objSede = new SedeModel();
$objProgramaEstudio = new ProgramaEstudioModel();
$objRoles = new RolModel();
$objSistemas = new SistemasIntegradosModel();

if ($tipo == "listar_director") {
    //repuesta
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_Usuario = $objUsuario->buscarUsuarioDirector_All();
    $arr_contenido = [];
    if (!empty($arr_Usuario)) {
        // recorremos el array para agregar las opciones de las categorias
        for ($i = 0; $i < count($arr_Usuario); $i++) {
            // definimos el elemento como objeto
            $arr_contenido[$i] = (object) [];
            // agregamos solo la informacion que se desea enviar a la vista
            $arr_contenido[$i]->id = $arr_Usuario[$i]->id;
            $arr_contenido[$i]->dni = $arr_Usuario[$i]->dni;
            $arr_contenido[$i]->apellidos_nombres = $arr_Usuario[$i]->apellidos_nombres;
            $arr_contenido[$i]->estado = $arr_Usuario[$i]->estado;
            $opciones = '';
            $arr_Usuario[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_contenido;
    }
    echo json_encode($arr_Respuesta);
}
if ($tipo == "listar_docentes_ordenados") {
    //repuesta
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_Usuario = $objUsuario->buscarUsuarioDocentesOrderByApellidosNombres();
    $arr_contenido = [];
    if (!empty($arr_Usuario)) {

        $arr_Sedes = $objSede->buscarSedes();
        $arr_Respuesta['sedes'] = $arr_Sedes;
        $arr_Pes = $objProgramaEstudio->buscarProgramaEstudios();
        $arr_Respuesta['programas'] = $arr_Pes;
        $arr_Roles = $objRoles->buscarRoles();
        $arr_Respuesta['roles'] = $arr_Roles;
        $arr_Sistemas = $objSistemas->buscarSistemas();
        $arr_Respuesta['sistemas'] = $arr_Sistemas;
        // recorremos el array para agregar las opciones de las categorias
        for ($i = 0; $i < count($arr_Usuario); $i++) {
            // definimos el elemento como objeto
            $arr_contenido[$i] = (object) [];
            // agregamos solo la informacion que se desea enviar a la vista
            $arr_contenido[$i]->id = $arr_Usuario[$i]->id;
            $arr_contenido[$i]->dni = $arr_Usuario[$i]->dni;
            $arr_contenido[$i]->apellidos_nombres = $arr_Usuario[$i]->apellidos_nombres;
            $arr_contenido[$i]->genero = $arr_Usuario[$i]->genero;
            $arr_contenido[$i]->fecha_nac = $arr_Usuario[$i]->fecha_nac;
            $arr_contenido[$i]->direccion = $arr_Usuario[$i]->direccion;
            $arr_contenido[$i]->correo = $arr_Usuario[$i]->correo;
            $arr_contenido[$i]->telefono = $arr_Usuario[$i]->telefono;
            $arr_contenido[$i]->discapacidad = $arr_Usuario[$i]->discapacidad;
            $arr_contenido[$i]->id_sede = $arr_Usuario[$i]->id_sede;
            $arr_contenido[$i]->id_programa_estudios = $arr_Usuario[$i]->id_programa_estudios;
            $arr_contenido[$i]->id_rol = $arr_Usuario[$i]->id_rol;
            $arr_contenido[$i]->estado = $arr_Usuario[$i]->estado;

            $id_sede = $arr_Usuario[$i]->id_sede;
            $arr_Sede = $objSede->buscarSedeById($id_sede);
            $arr_contenido[$i]->sede = $arr_Sede->nombre;

            $id_pe = $arr_Usuario[$i]->id_programa_estudios;
            $arr_Pe = $objProgramaEstudio->buscarProgramaEstudioById($id_pe);
            $arr_contenido[$i]->programa_estudios = $arr_Pe->nombre;

            $id_rol = $arr_Usuario[$i]->id_rol;
            $arr_Rol = $objRoles->buscarRolById($id_rol);
            $arr_contenido[$i]->rol = $arr_Rol->nombre;

            
            $arr_contenido[$i]->permisos = [];
            for ($j = 0; $j < count($arr_Sistemas); $j++) {
                $arr_Permisos = $objUsuario->buscarPermisoUsuarioByUsuarioSistema($arr_Usuario[$i]->id, $arr_Sistemas[$j]->id);
                if (!empty($arr_Permisos)) {
                    $arr_contenido[$i]->permisos[$arr_Sistemas[$j]->id] = $arr_Permisos;
                }
            }


            $opciones = '<button type="button" title="Editar" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".modal-editar' . $arr_Usuario[$i]->id . '"><i class="fa fa-edit"></i></button>
                                <button type="button" title="Persimos" class="btn btn-light waves-effect waves-light" data-toggle="modal" data-target=".modal-permisos' . $arr_Usuario[$i]->id . '"><i class="fa fa-folder-open"></i></button>
                                <button class="btn btn-info" title="Resetear Contraseña" onclick=""><i class="fa fa-key"></i></button>';
            $arr_contenido[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_contenido;
    }
    echo json_encode($arr_Respuesta);
}
