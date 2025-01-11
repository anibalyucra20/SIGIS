<?php
require_once('../model/admin-sedeModel.php');
$tipo = $_REQUEST['tipo'];

//instanciar la clase periodo model
$objSede = new SedeModel();

if ($tipo == "listar") {
    //repuesta
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_Sedes = $objSede->buscarSedes();
    if (!empty($arr_Sedes)) {
        // recorremos el array para agregar las opciones
        for ($i = 0; $i < count($arr_Sedes); $i++) {
            $opciones = '<button class="btn btn-success" data-toggle="modal" data-target=".modal_editar' . $arr_Sedes[$i]->id . '"><i class="fa fa-edit"></i></button>';
            $arr_Sedes[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Sedes;
    }
    echo json_encode($arr_Respuesta);
}
if ($tipo == "registrar") {
    //print_r($_POST);

   
}
if ($tipo == "actualizar") {
    //print_r($_POST);
    
}
