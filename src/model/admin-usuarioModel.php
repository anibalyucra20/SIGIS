<?php
// src/model/admin-usuarioModel.php

require_once "../library/conexion.php";
require_once "adminModel.php";

class UsuarioModel
{
    public $conexion;
    private $admin;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
        $this->admin = new AdminModel();
    }

    /**
     * Genera una cadena aleatoria de longitud $cantidad.
     * (Usada al crear un nuevo usuario para la contraseña en texto plano).
     */
    public function generar_llave($cantidad)
    {
        return $this->admin->generar_llave($cantidad);
    }

    /**
     * Inserta un nuevo usuario en la tabla sigi_usuarios.
     * Retorna true si se inserta correctamente; false en caso contrario.
     */
    public function insertarUsuario(
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
        $estado,
        $password,
        $reset_password,
        $token_password
    ) {
        // Escapar valores para evitar inyección SQL
        $dniEsc       = $this->conexion->real_escape_string($dni);
        $nomEsc       = $this->conexion->real_escape_string($apellidos_nombres);
        $direccionEsc = $this->conexion->real_escape_string($direccion);
        $correoEsc    = $this->conexion->real_escape_string($correo);
        $telefonoEsc  = $this->conexion->real_escape_string($telefono);

        $idPeriodoEsc = intval($id_periodo_registro);
        $idProgEsc    = intval($id_programa_estudios);
        $discapEsc    = $this->conexion->real_escape_string($discapacidad);
        $idRolEsc     = intval($id_rol);
        $idSedeEsc    = intval($id_sede);
        $estadoEsc    = intval($estado);
        $resetEsc     = intval($reset_password);

        $sql = "
            INSERT INTO sigi_usuarios (
                dni,
                apellidos_nombres,
                genero,
                fecha_nac,
                direccion,
                correo,
                telefono,
                id_periodo_registro,
                id_programa_estudios,
                discapacidad,
                id_rol,
                id_sede,
                estado,
                password,
                reset_password,
                token_password
            ) VALUES (
                '$dniEsc',
                '$nomEsc',
                '$genero',
                '$fecha_nac',
                '$direccionEsc',
                '$correoEsc',
                '$telefonoEsc',
                '$idPeriodoEsc',
                '$idProgEsc',
                '$discapEsc',
                '$idRolEsc',
                '$idSedeEsc',
                '$estadoEsc',
                '$password',
                '$resetEsc',
                '$token_password'
            )
        ";
        return $this->conexion->query($sql);
    }

    /**
     * Devuelve un usuario (objeto) por su ID, sin incluir contraseña ni token.
     * Retorna false si no lo encuentra.
     */
    public function obtenerUsuarioPorId($id)
    {
        $idEsc = intval($id);
        $sql = "
            SELECT
                id,
                dni,
                apellidos_nombres,
                genero,
                fecha_nac,
                direccion,
                correo,
                telefono,
                id_periodo_registro,
                id_programa_estudios,
                discapacidad,
                id_rol,
                id_sede,
                estado
            FROM sigi_usuarios
            WHERE id = '$idEsc'
            LIMIT 1
        ";
        $res = $this->conexion->query($sql);
        if ($res && $res->num_rows > 0) {
            return $res->fetch_object();
        }
        return false;
    }

    /**
     * Actualiza un usuario existente (sin modificar password ni token).
     * Recibe todos los campos excepto password, reset_password y token_password.
     * Retorna true si la actualización tuvo éxito; false en caso contrario.
     */
    public function actualizarUsuario(
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
    ) {
        // Escapar todos los valores
        $idEsc          = intval($id);
        $dniEsc         = $this->conexion->real_escape_string($dni);
        $nomEsc         = $this->conexion->real_escape_string($apellidos_nombres);
        $direccionEsc   = $this->conexion->real_escape_string($direccion);
        $correoEsc      = $this->conexion->real_escape_string($correo);
        $telefonoEsc    = $this->conexion->real_escape_string($telefono);
        $idPeriodoEsc   = intval($id_periodo_registro);
        $idProgEsc      = intval($id_programa_estudios);
        $discapEsc      = $this->conexion->real_escape_string($discapacidad);
        $idRolEsc       = intval($id_rol);
        $idSedeEsc      = intval($id_sede);
        $estadoEsc      = intval($estado);

        $sql = "
            UPDATE sigi_usuarios SET
                dni                  = '$dniEsc',
                apellidos_nombres    = '$nomEsc',
                genero               = '$genero',
                fecha_nac            = '$fecha_nac',
                direccion            = '$direccionEsc',
                correo               = '$correoEsc',
                telefono             = '$telefonoEsc',
                id_periodo_registro  = '$idPeriodoEsc',
                id_programa_estudios = '$idProgEsc',
                discapacidad         = '$discapEsc',
                id_rol               = '$idRolEsc',
                id_sede              = '$idSedeEsc',
                estado               = '$estadoEsc'
            WHERE id = '$idEsc'
        ";
        return $this->conexion->query($sql);
    }

    // (Opcional) Otros métodos útiles en este modelo:
    // - listarUsuarios(): listar todos sin filtros
    // - buscarUsuarioByDNI($dni): verificar duplicado
    // - eliminarUsuario($id): eliminar o marcar inactivo
}
