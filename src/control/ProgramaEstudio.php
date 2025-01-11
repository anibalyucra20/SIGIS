<?php
require_once('../model/admin-programaEstudioModel.php');
$tipo = $_REQUEST['tipo'];

//instanciar la clase periodo model
$objProgramaEstudio = new ProgramaEstudioModel();

if ($tipo == "listar") {
    //repuesta
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_PE = $objProgramaEstudio->buscarProgramaEstudios();
    if (!empty($arr_PE)) {
        // recorremos el array para agregar las opciones
        for ($i = 0; $i < count($arr_PE); $i++) {
            $opciones = '<button class="btn btn-success" data-toggle="modal" data-target=".modal_editar' . $arr_PE[$i]->id . '"><i class="fa fa-edit"></i></button>';
            $arr_PE[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_PE;
    }
    echo json_encode($arr_Respuesta);
}
if ($tipo == "registrar") {
    //print_r($_POST);

   
}
if ($tipo == "actualizar") {
    //print_r($_POST);
    
}
