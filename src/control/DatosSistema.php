<?php
// archivo: src/control/DatosSistema.php

require_once('../model/admin-datosSistemaModel.php');
require_once('../model/admin-sesionModel.php');

$tipo = $_REQUEST['tipo'];
$objDatos  = new DatosSistemaModel();
$objSesion = new SessionModel();

// Variables de sesión
$id_sesion = $_POST['sesion'] ?? '';
$token     = $_POST['token']   ?? '';

if ($tipo === 'cargar') {
    $arr_Respuesta = ['status' => false, 'msg' => 'Error_Sesion'];
    if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
        // Obtener la fila de la tabla sigi_datos_sistema
        $fila = $objDatos->obtenerDatosSistema();
        if ($fila) {
            // Devolver los campos exactamente tal como existen en la tabla
            $arr_Respuesta = [
                'status'    => true,
                'contenido' => [
                    'dominio_sistema' => $fila->dominio_pagina,
                    'favicon'         => $fila->favicon,
                    'logo'            => $fila->logo,
                    'titulo_c'        => $fila->nombre_completo,
                    'titulo_a'        => $fila->nombre_corto,
                    'pie_pagina'      => $fila->pie_pagina,
                    'host_email'      => $fila->host_mail,
                    'email_email'     => $fila->email_email,
                    'password_email'  => $fila->password_email,
                    'puerto_email'    => $fila->puerto_email,
                    'color_correo'    => $fila->color_correo,
                    'cant_semanas'    => $fila->cant_semanas
                ]
            ];
        } else {
            // Si no hay ningún registro en la tabla, devolvemos campos vacíos
            $arr_Respuesta = [
                'status'    => true,
                'contenido' => [
                    'dominio_sistema' => '',
                    'favicon'         => '',
                    'logo'            => '',
                    'titulo_c'        => '',
                    'titulo_a'        => '',
                    'pie_pagina'      => '',
                    'host_email'      => '',
                    'email_email'     => '',
                    'password_email'  => '',
                    'puerto_email'    => '',
                    'color_correo'    => '#000000',
                    'cant_semanas'    => ''
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
        // Recibir exactamente los mismos nombres de campo que existen en sigi_datos_sistema
        $dominio_sistema = trim($_POST['dominio_sistema']  ?? '');
        $favicon         = trim($_POST['favicon']          ?? '');
        $logo            = trim($_POST['logo']             ?? '');
        $titulo_c        = trim($_POST['titulo_c']         ?? '');
        $titulo_a        = trim($_POST['titulo_a']         ?? '');
        $pie_pagina      = trim($_POST['pie_pagina']       ?? '');
        $host_email      = trim($_POST['host_email']       ?? '');
        $email_email     = trim($_POST['email_email']      ?? '');
        $password_email  = trim($_POST['password_email']   ?? '');
        $puerto_email    = trim($_POST['puerto_email']     ?? '');
        $color_correo    = trim($_POST['color_correo']     ?? '');
        $cant_semanas    = trim($_POST['cant_semanas']     ?? '');

        // Verificación de campos vacíos (se asume que el JS ya validó, pero se checa nuevamente)
        if (
            $dominio_sistema === '' ||
            $favicon         === '' ||
            $logo            === '' ||
            $titulo_c        === '' ||
            $titulo_a        === '' ||
            $pie_pagina      === '' ||
            $host_email      === '' ||
            $email_email     === '' ||
            $password_email  === '' ||
            $puerto_email    === '' ||
            $color_correo    === '' ||
            $cant_semanas    === ''
        ) {
            $arr_Respuesta = [
                'status' => false,
                'msg'    => 'Error, campos vacíos'
            ];
        } else {
            // Se decide si se inserta o se actualiza según exista registro
            $existe = $objDatos->existeDatosSistema();
            if ($existe) {
                $ok = $objDatos->actualizarDatosSistema(
                    $dominio_sistema,
                    $favicon,
                    $logo,
                    $titulo_c,
                    $titulo_a,
                    $pie_pagina,
                    $host_email,
                    $email_email,
                    $password_email,
                    $puerto_email,
                    $color_correo,
                    $cant_semanas
                );
            } else {
                $ok = $objDatos->insertarDatosSistema(
                    $dominio_sistema,
                    $favicon,
                    $logo,
                    $titulo_c,
                    $titulo_a,
                    $pie_pagina,
                    $host_email,
                    $email_email,
                    $password_email,
                    $puerto_email,
                    $color_correo,
                    $cant_semanas
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
                    'msg'    => 'Error al guardar datos'
                ];
            }
        }
    }
    echo json_encode($arr_Respuesta);
    exit;
}
