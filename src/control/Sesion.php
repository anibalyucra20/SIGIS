<?php
require_once('../model/admin-sesionModel.php');
$tipo = $_REQUEST['tipo'];

//instanciar la clase periodo model
$objSesion = new SessionModel();

if ($tipo == "buscar") {
    $id_sesion = $_POST['id_sesion'];
    //repuesta
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_Sesion = $objSesion->buscarSesionLoginById($id_sesion);
    if (!empty($arr_Sesion)) {
        // recorremos el array para agregar las opciones
        for ($i = 0; $i < count($arr_Periodos); $i++) {
            $id_director = $arr_Periodos[$i]->director;
            $arr_Usuario = $objUsuario->buscarUsuarioById($id_director);
            $arr_Periodos[$i]->nombre_director = $arr_Usuario->apellidos_nombres;
            $id_periodo = $arr_Periodos[$i]->id;

            $opciones = '<button class="btn btn-success" data-toggle="modal" data-target=".modal_editar' . $arr_Periodos[$i]->id . '"><i class="fa fa-edit"></i></button>';
            $arr_Periodos[$i]->options = $opciones;
        }
        $arr_Director = $objUsuario->buscarUsuarioDirector_All();
        $content_directores = [];
        for ($j=0; $j < count($arr_Director); $j++) { 
            $content_directores[$j] = (object) [];
            $content_directores[$j]->id = $arr_Director[$j]->id;
            $content_directores[$j]->dni = $arr_Director[$j]->dni;
            $content_directores[$j]->apellidos_nombres = $arr_Director[$j]->apellidos_nombres;
            $content_directores[$j]->estado = $arr_Director[$j]->estado;
        }
        $arr_Respuesta['directores'] = $content_directores;

        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Periodos;
    }
    echo json_encode($arr_Respuesta);
    
}
if ($tipo == "validar_sesion") {
    echo true;
    return true;
}

