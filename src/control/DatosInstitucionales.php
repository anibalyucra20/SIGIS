<?php
// src/control/DatosInstitucionales.php

require_once('../model/admin-datosInstitucionalModel.php');
require_once('../model/admin-sesionModel.php');

$tipo = $_REQUEST['tipo'];
$objDatos      = new DatosInstitucionalesModel();
$objSesion     = new SessionModel();

// Variables de sesión
$id_sesion = $_POST['sesion'] ?? '';
$token     = $_POST['token']   ?? '';

if ($tipo === 'cargar') {
    $arr_Respuesta = ['status' => false, 'msg' => 'Error_Sesion'];
    if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
        // Obtener la única fila de sigi_datos_institucionales
        $fila = $objDatos->obtenerDatosInstitucionales();
        if ($fila) {
            $arr_Respuesta = [
                'status'    => true,
                'contenido' => [
                    'cod_modular'        => $fila->cod_modular,
                    'ruc'                => $fila->ruc,
                    'nombre_institucion' => $fila->nombre_institucion,
                    'departamento'       => $fila->departamento,
                    'provincia'          => $fila->provincia,
                    'distrito'           => $fila->distrito,
                    'direccion'          => $fila->direccion,
                    'telefono'           => $fila->telefono,
                    'correo'             => $fila->correo,
                    'nro_resolucion'     => $fila->nro_resolucion,
                    'estado'             => $fila->estado
                ]
            ];
        } else {
            // No existe aún, devolver valores vacíos o por defecto
            $arr_Respuesta = [
                'status'    => true,
                'contenido' => [
                    'cod_modular'        => '',
                    'ruc'                => '',
                    'nombre_institucion' => '',
                    'departamento'       => '',
                    'provincia'          => '',
                    'distrito'           => '',
                    'direccion'          => '',
                    'telefono'           => '',
                    'correo'             => '',
                    'nro_resolucion'     => '',
                    'estado'             => '1'
                ]
            ];
        }
    }
    echo json_encode($arr_Respuesta);
    exit;
}

if ($tipo === 'guardar') {
    $arr_Respuesta = ['status' => false, 'msg' => 'Error_Sesion'];
    if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
        // Recibir los valores POST según columnas de la tabla
        $cod_modular        = trim($_POST['cod_modular']        ?? '');
        $ruc                = trim($_POST['ruc']                ?? '');
        $nombre_institucion = trim($_POST['nombre_institucion'] ?? '');
        $departamento       = trim($_POST['departamento']       ?? '');
        $provincia          = trim($_POST['provincia']          ?? '');
        $distrito           = trim($_POST['distrito']           ?? '');
        $direccion          = trim($_POST['direccion']          ?? '');
        $telefono           = trim($_POST['telefono']           ?? '');
        $correo             = trim($_POST['correo']             ?? '');
        $nro_resolucion     = trim($_POST['nro_resolucion']     ?? '');
        $estado             = trim($_POST['estado']             ?? '');

        // Validación mínima en servidor (JS ya lo hizo)
        if (
            $cod_modular === '' ||
            $ruc === '' ||
            $nombre_institucion === '' ||
            $departamento === '' ||
            $provincia === '' ||
            $distrito === '' ||
            $direccion === '' ||
            $telefono === '' ||
            $correo === '' ||
            $nro_resolucion === '' ||
            ($estado !== '1' && $estado !== '0')
        ) {
            $arr_Respuesta = [
                'status' => false,
                'msg'    => 'Error, campos vacíos o inválidos'
            ];
        } else {
            // Insertar o actualizar según exista registro
            $existe = $objDatos->existeDatosInstitucionales();
            if ($existe) {
                $ok = $objDatos->actualizarDatosInstitucionales(
                    $cod_modular,
                    $ruc,
                    $nombre_institucion,
                    $departamento,
                    $provincia,
                    $distrito,
                    $direccion,
                    $telefono,
                    $correo,
                    $nro_resolucion,
                    $estado
                );
            } else {
                $ok = $objDatos->insertarDatosInstitucionales(
                    $cod_modular,
                    $ruc,
                    $nombre_institucion,
                    $departamento,
                    $provincia,
                    $distrito,
                    $direccion,
                    $telefono,
                    $correo,
                    $nro_resolucion,
                    $estado
                );
            }

            if ($ok) {
                $arr_Respuesta = [
                    'status' => true,
                    'msg'    => 'Guardado exitoso'
                ];
            } else {
                $arr_Respuesta = [
                    'status' => false,
                    'msg'    => 'Error al guardar datos institucionales'
                ];
            }
        }
    }
    echo json_encode($arr_Respuesta);
    exit;
}
?>
