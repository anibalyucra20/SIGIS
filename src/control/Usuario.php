<?php
require_once('../model/admin-usuarioModel.php');
$tipo = $_REQUEST['tipo'];

//instanciar la clase categoria model
$objUsuario = new UsuarioModel();

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
