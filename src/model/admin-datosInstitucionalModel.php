<?php
// src/model/DatosInstitucionalesModel.php

require_once "../library/conexion.php";

class DatosInstitucionalesModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    /**
     * Verifica si existe al menos una fila en sigi_datos_institucionales.
     */
    public function existeDatosInstitucionales()
    {
        $sql = "SELECT COUNT(*) AS total FROM sigi_datos_institucionales";
        $res = $this->conexion->query($sql);
        if ($res) {
            $fila = $res->fetch_object();
            return ($fila->total > 0);
        }
        return false;
    }

    /**
     * Obtiene la única fila de sigi_datos_institucionales (0 o 1 registro).
     */
    public function obtenerDatosInstitucionales()
    {
        $sql = "SELECT 
                    cod_modular, 
                    ruc, 
                    nombre_institucion, 
                    departamento, 
                    provincia, 
                    distrito, 
                    direccion, 
                    telefono, 
                    correo, 
                    nro_resolucion, 
                    estado 
                FROM sigi_datos_institucionales
                LIMIT 1";
        $res = $this->conexion->query($sql);
        if ($res && $res->num_rows > 0) {
            return $res->fetch_object();
        }
        return false;
    }

    /**
     * Inserta una nueva fila en sigi_datos_institucionales.
     */
    public function insertarDatosInstitucionales(
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
    ) {
        $sql = "INSERT INTO sigi_datos_institucionales (
                    cod_modular,
                    ruc,
                    nombre_institucion,
                    departamento,
                    provincia,
                    distrito,
                    direccion,
                    telefono,
                    correo,
                    nro_resolucion,
                    estado
                ) VALUES (
                    '$cod_modular',
                    '$ruc',
                    '$nombre_institucion',
                    '$departamento',
                    '$provincia',
                    '$distrito',
                    '$direccion',
                    '$telefono',
                    '$correo',
                    '$nro_resolucion',
                    '$estado'
                )";
        return $this->conexion->query($sql);
    }

    /**
     * Actualiza la única fila existente en sigi_datos_institucionales.
     */
    public function actualizarDatosInstitucionales(
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
    ) {
        $sql = "UPDATE sigi_datos_institucionales SET
                    cod_modular        = '$cod_modular',
                    ruc                = '$ruc',
                    nombre_institucion = '$nombre_institucion',
                    departamento       = '$departamento',
                    provincia          = '$provincia',
                    distrito           = '$distrito',
                    direccion          = '$direccion',
                    telefono           = '$telefono',
                    correo             = '$correo',
                    nro_resolucion     = '$nro_resolucion',
                    estado             = '$estado'
                ";
        return $this->conexion->query($sql);
    }
}
?>
