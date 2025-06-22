<?php
// src/control/Usuario.php

require_once('../model/admin-usuarioModel.php');
require_once('../model/admin-rolesModel.php');
require_once('../model/admin-sedeModel.php');
require_once('../model/admin-programaEstudioModel.php');
require_once('../model/admin-periodoAcademicoModel.php');
require_once('../model/admin-sesionModel.php');

$tipo       = $_REQUEST['tipo'];
$objUser    = new UsuarioModel();
$objRol     = new RolesModel();
$objSede    = new SedeModel();
$objProg    = new ProgramaEstudioModel();
$objPeriodo = new PeriodoAcademicoModel();
$objSes     = new SessionModel();

$id_sesion = $_POST['sesion'] ?? '';
$token     = $_POST['token']   ?? '';


/*
 * -------------------------------------------------------
 * 1) datos_registro
 *    Devuelve JSON con:
 *      - roles (solo id y nombre, filtrados en JS)
 *      - sedes  (id y nombre)
 *      - periodos académicos (id y nombre)
 *      - programas de estudio (id y nombre)
 */
if ($tipo === 'datos_registro') {
    $arr_Respuesta = ['status' => false, 'contenido' => []];

    if ($objSes->verificar_sesion_si_activa($id_sesion, $token)) {
        // 1) Roles (id, nombre)
        $listaRoles = $objRol->listarRolesSimple();
        // 2) Sedes (id, nombre)
        $listaSedes = $objSede->listarSedesSimple();
        // 3) Períodos Académicos (id, nombre)
        $rawPeriodos = $objPeriodo->buscarPeriodoAcademico();
        $listaPeriodos = [];
        foreach ($rawPeriodos as $p) {
            $o = new stdClass();
            $o->id     = $p->id;
            $o->nombre = $p->nombre;
            $listaPeriodos[] = $o;
        }
        // 4) Programas de Estudio (id, nombre)
        $listaProg = $objProg->listarProgramasSimple();

        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = [
            'roles'     => $listaRoles,
            'sedes'     => $listaSedes,
            'periodos'  => $listaPeriodos,
            'programas' => $listaProg
        ];
    }

    echo json_encode($arr_Respuesta);
    exit;
}


/*
 * -------------------------------------------------------
 * 2) registrar_docente
 *    Recibe datos POST y registra un nuevo usuario en sigi_usuarios:
 *      dni, apellidos_nombres, genero, fecha_nac, direccion,
 *      correo, telefono, id_periodo_registro, id_programa_estudios,
 *      discapacidad, id_rol, id_sede.
 *    Genera contraseña aleatoria + hash, token_password + hash.
 */
if ($tipo === 'registrar_docente') {
    $arr_Respuesta = ['status' => false, 'msg' => 'Error_Sesion'];

    if ($objSes->verificar_sesion_si_activa($id_sesion, $token)) {
        $dni                  = trim($_POST['dni'] ?? '');
        $apellidos_nombres    = trim($_POST['apellidos_nombres'] ?? '');
        $genero               = trim($_POST['genero'] ?? '');
        $fecha_nac            = trim($_POST['fecha_nac'] ?? '');
        $direccion            = trim($_POST['direccion'] ?? '');
        $correo               = trim($_POST['correo'] ?? '');
        $telefono             = trim($_POST['telefono'] ?? '');
        $discapacidad         = trim($_POST['discapacidad'] ?? '');
        $id_sede              = intval($_POST['id_sede'] ?? 0);
        $id_rol               = intval($_POST['id_rol'] ?? 0);
        $id_periodo_registro  = intval($_POST['id_periodo_registro'] ?? 0);
        $id_programa_estudios = intval($_POST['id_programa_estudios'] ?? 0);

        // Validación mínima en servidor
        if (
            $dni === '' ||
            $apellidos_nombres === '' ||
            !in_array($genero, ['M','F']) ||
            $fecha_nac === '' ||
            $direccion === '' ||
            $correo === '' ||
            $telefono === '' ||
            !in_array($discapacidad, ['SI','NO']) ||
            $id_sede <= 0 ||
            $id_rol <= 0 ||
            $id_periodo_registro <= 0 ||
            $id_programa_estudios <= 0
        ) {
            $arr_Respuesta['status'] = false;
            $arr_Respuesta['msg']    = 'Error, campos vacíos o inválidos.';
        } else {
            // 1) Generar contraseña aleatoria (8 caracteres) + hash
            $clavePlano = $objUser->generar_llave(8);
            $hashPwd    = password_hash($clavePlano, PASSWORD_DEFAULT);
            // 2) Generar token_password de 30 caracteres + hash
            $tokenPwd   = bin2hex(random_bytes(15));
            $hashToken  = password_hash($tokenPwd, PASSWORD_DEFAULT);

            // 3) Insertar en base de datos
            $ok = $objUser->insertarUsuario(
                $dni,
                $apellidos_nombres,
                $genero,
                $fecha_nac,
                $direccion,
                $correo,
                $telefono,
                $id_periodo_registro,
                $id_programa_estudios,
                $discapacidad,
                $id_rol,
                $id_sede,
                1,           // estado = 1 (activo)
                $hashPwd,    // password (hasheado)
                0,           // reset_password = 0 (no requiere cambio)
                $hashToken   // token_password (hasheado)
            );
            if ($ok) {
                // (Opcional) Enviar $tokenPwd al correo de usuario para recuperación
                $arr_Respuesta['status'] = true;
                $arr_Respuesta['msg']    = 'Usuario creado y contraseña enviada.';
            } else {
                $arr_Respuesta['status'] = false;
                $arr_Respuesta['msg']    = 'Error al registrar usuario.';
            }
        }
    }

    echo json_encode($arr_Respuesta);
    exit;
}


/*
 * -------------------------------------------------------
 * 3) datos_filtros
 *    Devuelve JSON con listas de:
 *      - programas de estudio (id, nombre)
 *      - sedes (id, nombre)
 *    (para poblar los <select> de filtros antes de listar).
 */
if ($tipo === 'datos_filtros') {
    $arr_Respuesta = ['status' => false, 'contenido' => []];

    if ($objSes->verificar_sesion_si_activa($id_sesion, $token)) {
        // Programas de Estudio
        $listaProg  = $objProg->listarProgramasSimple();
        // Sedes
        $listaSedes = $objSede->listarSedesSimple();

        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = [
            'programas' => $listaProg,
            'sedes'     => $listaSedes
        ];
    }

    echo json_encode($arr_Respuesta);
    exit;
}


/*
 * -------------------------------------------------------
 * 4) listar_tabla_docentes
 *    Lista usuarios (docentes y administradores) con filtros y paginación.
 *    Parámetros POST:
 *      pagina, cantidad_mostrar,
 *      filtro_dni, filtro_nomap, filtro_pe, filtro_estado, filtro_sede
 */
if ($tipo === 'listar_tabla_docentes') {
    $arr_Respuesta = ['status' => false, 'contenido' => [], 'total' => 0];

    if ($objSes->verificar_sesion_si_activa($id_sesion, $token)) {
        $pagina         = intval($_POST['pagina'] ?? 1);
        $cantidad       = intval($_POST['cantidad_mostrar'] ?? 10);
        $filtro_dni     = $objUser->conexion->real_escape_string(trim($_POST['filtro_dni'] ?? ''));
        $filtro_nomap   = $objUser->conexion->real_escape_string(trim($_POST['filtro_nomap'] ?? ''));
        $filtro_pe      = intval($_POST['filtro_pe'] ?? 0);
        $filtro_estado  = trim($_POST['filtro_estado'] ?? '');
        $filtro_sede    = intval($_POST['filtro_sede'] ?? 0);

        // Construir cláusula WHERE dinámica
        $where = "WHERE 1=1 ";
        if ($filtro_dni !== '') {
            $where .= "AND u.dni LIKE '%{$filtro_dni}%' ";
        }
        if ($filtro_nomap !== '') {
            $where .= "AND u.apellidos_nombres LIKE '%{$filtro_nomap}%' ";
        }
        if ($filtro_pe > 0) {
            $where .= "AND u.id_programa_estudios = {$filtro_pe} ";
        }
        if ($filtro_estado !== '') {
            $where .= "AND u.estado = {$filtro_estado} ";
        }
        if ($filtro_sede > 0) {
            $where .= "AND u.id_sede = {$filtro_sede} ";
        }

        // Calcular total de registros sin límite
        $sqlCount = "
            SELECT COUNT(*) AS total 
            FROM sigi_usuarios u
            {$where}
        ";
        $resCount = $objUser->conexion->query($sqlCount);
        $rowCount = $resCount->fetch_object();
        $totalRegistros = intval($rowCount->total);

        if ($totalRegistros > 0) {
            $offset = ($pagina - 1) * $cantidad;
            // Consulta con JOINs para traer nombres relacionados
            $sql = "
                SELECT 
                    u.id,
                    u.dni,
                    u.apellidos_nombres,
                    u.genero,
                    u.fecha_nac,
                    u.direccion,
                    u.correo,
                    u.telefono,
                    u.discapacidad,
                    u.id_programa_estudios,
                    p.nombre AS programa_nombre,
                    u.id_periodo_registro,
                    per.nombre AS periodo_nombre,
                    u.id_rol,
                    r.nombre AS rol_nombre,
                    u.id_sede,
                    s.nombre AS sede_nombre,
                    u.estado
                FROM sigi_usuarios u
                LEFT JOIN sigi_programa_estudios p ON u.id_programa_estudios = p.id
                LEFT JOIN sigi_periodo_academico per ON u.id_periodo_registro = per.id
                LEFT JOIN sigi_roles r ON u.id_rol = r.id
                LEFT JOIN sigi_sedes s ON u.id_sede = s.id
                {$where}
                ORDER BY u.apellidos_nombres
                LIMIT {$offset}, {$cantidad}
            ";
            $res = $objUser->conexion->query($sql);
            $usuarios = [];
            while ($fila = $res->fetch_object()) {
                $usuarios[] = $fila;
            }
            $arr_Respuesta['status']    = true;
            $arr_Respuesta['contenido'] = $usuarios;
            $arr_Respuesta['total']     = $totalRegistros;
        } else {
            // No hay resultados que mostrar
            $arr_Respuesta['status']    = true;
            $arr_Respuesta['contenido'] = [];
            $arr_Respuesta['total']     = 0;
        }
    }

    echo json_encode($arr_Respuesta);
    exit;
}


/*
 * -------------------------------------------------------
 * 5) ver_usuario
 *    Retorna todos los datos de un usuario (sin password ni token) según su ID.
 *    Parámetro POST: id (int)
 */
if ($tipo === 'ver_usuario') {
    $arr_Respuesta = ['status' => false, 'contenido' => null, 'msg' => 'Error_Sesion'];

    if ($objSes->verificar_sesion_si_activa($id_sesion, $token)) {
        $id = intval($_POST['id'] ?? 0);
        if ($id > 0) {
            $usuario = $objUser->obtenerUsuarioPorId($id);
            if ($usuario) {
                $arr_Respuesta['status']     = true;
                $arr_Respuesta['contenido']  = $usuario;
            } else {
                $arr_Respuesta['msg'] = 'Usuario no encontrado.';
            }
        } else {
            $arr_Respuesta['msg'] = 'ID inválido.';
        }
    }

    echo json_encode($arr_Respuesta);
    exit;
}


/*
 * -------------------------------------------------------
 * 6) actualizar_usuario
 *    Recibe datos POST de un usuario existente y actualiza todos sus campos
 *    (excepto password/token). Parámetros:
 *      id, dni, apellidos_nombres, genero, fecha_nac, direccion, correo, telefono,
 *      id_periodo_registro, id_programa_estudios, discapacidad, id_rol, id_sede, estado
 */
if ($tipo === 'actualizar_usuario') {
    $arr_Respuesta = ['status' => false, 'msg' => 'Error_Sesion'];

    if ($objSes->verificar_sesion_si_activa($id_sesion, $token)) {
        // Leer campos
        $id                   = intval($_POST['id'] ?? 0);
        $dni                  = trim($_POST['dni'] ?? '');
        $apellidos_nombres    = trim($_POST['apellidos_nombres'] ?? '');
        $genero               = trim($_POST['genero'] ?? '');
        $fecha_nac            = trim($_POST['fecha_nac'] ?? '');
        $direccion            = trim($_POST['direccion'] ?? '');
        $correo               = trim($_POST['correo'] ?? '');
        $telefono             = trim($_POST['telefono'] ?? '');
        $id_periodo_registro  = intval($_POST['id_periodo_registro'] ?? 0);
        $id_programa_estudios = intval($_POST['id_programa_estudios'] ?? 0);
        $discapacidad         = trim($_POST['discapacidad'] ?? '');
        $id_rol               = intval($_POST['id_rol'] ?? 0);
        $id_sede              = intval($_POST['id_sede'] ?? 0);
        $estado               = trim($_POST['estado'] ?? '');

        // Validación mínima
        if (
            $id > 0 &&
            $dni !== '' &&
            $apellidos_nombres !== '' &&
            in_array($genero, ['M','F']) &&
            $fecha_nac !== '' &&
            $direccion !== '' &&
            $correo !== '' &&
            $telefono !== '' &&
            $id_periodo_registro > 0 &&
            $id_programa_estudios > 0 &&
            in_array($discapacidad, ['SI','NO']) &&
            $id_rol > 0 &&
            $id_sede > 0 &&
            in_array($estado, ['1','0'])
        ) {
            $ok = $objUser->actualizarUsuario(
                $id,
                $dni,
                $apellidos_nombres,
                $genero,
                $fecha_nac,
                $direccion,
                $correo,
                $telefono,
                $id_periodo_registro,
                $id_programa_estudios,
                $discapacidad,
                $id_rol,
                $id_sede,
                $estado
            );
            if ($ok) {
                $arr_Respuesta['status'] = true;
                $arr_Respuesta['msg']    = 'Usuario actualizado correctamente.';
            } else {
                $arr_Respuesta['status'] = false;
                $arr_Respuesta['msg']    = 'Error al actualizar el usuario.';
            }
        } else {
            $arr_Respuesta['status'] = false;
            $arr_Respuesta['msg']    = 'Datos inválidos o campos vacíos.';
        }
    }

    echo json_encode($arr_Respuesta);
    exit;
}

// … aquí pueden venir otros casos (login, eliminar_usuario, etc.) …
