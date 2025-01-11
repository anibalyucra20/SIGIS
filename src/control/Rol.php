<?php
require_once('../model/admin-RolesModel.php');
$tipo = $_REQUEST['tipo'];

//instanciar la clase periodo model
$objRol = new RolModel();

if ($tipo == "listar") {
    //repuesta
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_Rol = $objRol->buscarRoles();
    if (!empty($arr_Rol)) {
        // recorremos el array para agregar las opciones
        for ($i = 0; $i < count($arr_Rol); $i++) {
            $opciones = '<button class="btn btn-success" data-toggle="modal" data-target=".modal_editar' . $arr_Rol[$i]->id . '"><i class="fa fa-edit"></i></button>';
            $arr_Rol[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Rol;
    }
    echo json_encode($arr_Respuesta);
}
if ($tipo == "registrar") {
    //print_r($_POST);

   
}
if ($tipo == "actualizar") {
    //print_r($_POST);
    
}
