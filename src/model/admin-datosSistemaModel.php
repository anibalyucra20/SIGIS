<?php
// archivo: src/model/DatosSistemaModel.php

require_once "../library/conexion.php";

class DatosSistemaModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    /**
     * Verifica si ya existe al menos una fila en sigi_datos_sistema.
     * Retorna true si hay registro, false si no hay ninguno.
     */
    public function existeDatosSistema()
    {
        $sql  = "SELECT COUNT(*) AS total FROM sigi_datos_sistema";
        $res  = $this->conexion->query($sql);
        if ($res) {
            $fila = $res->fetch_object();
            return ($fila->total > 0);
        }
        return false;
    }

    /**
     * Obtiene la única fila de sigi_datos_sistema (se asume 0 o 1 fila).
     * Devuelve un objeto con las columnas:
     *   dominio_sistema, favicon, logo, titulo_c, titulo_a,
     *   pie_pagina, host_email, email_email, password_email,
     *   puerto_email, color_correo, cant_semanas
     */
    public function obtenerDatosSistema()
    {
        $sql = "SELECT 
                    dominio_pagina, 
                    favicon, 
                    logo, 
                    nombre_completo, 
                    nombre_corto, 
                    pie_pagina, 
                    host_mail, 
                    email_email, 
                    password_email, 
                    puerto_email, 
                    color_correo, 
                    cant_semanas 
                FROM sigi_datos_sistema
                LIMIT 1";
        $res = $this->conexion->query($sql);
        if ($res && $res->num_rows > 0) {
            return $res->fetch_object();
        }
        return false;
    }

    /**
     * Actualiza la única fila existente en sigi_datos_sistema, usando
     * exactamente los nombres de columna que existen.
     * Retorna true si tuvo éxito, false de lo contrario.
     */
    public function actualizarDatosSistema(
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
    ) {
        $sql = "UPDATE sigi_datos_sistema SET
                    dominio_pagina = '$dominio_sistema',
                    favicon         = '$favicon',
                    logo            = '$logo',
                    nombre_completo = '$titulo_c',
                    nombre_corto    = '$titulo_a',
                    pie_pagina      = '$pie_pagina',
                    host_mail       = '$host_email',
                    email_email     = '$email_email',
                    password_email  = '$password_email',
                    puerto_email    = '$puerto_email',
                    color_correo    = '$color_correo',
                    cant_semanas    = '$cant_semanas'
                ";
        return $this->conexion->query($sql);
    }
}
