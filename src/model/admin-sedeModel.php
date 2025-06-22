<?php
require_once "../library/conexion.php";

class SedeModel
{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function listarSedesSimple()
    {
        $sedes = [];
        $sql = "SELECT id, nombre FROM sigi_sedes ORDER BY nombre";
        $res = $this->conexion->query($sql);
        while ($fila = $res->fetch_object()) {
            $sedes[] = $fila;
        }
        return $sedes;
    }
    public function buscarSedes()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_sedes");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarSedeById($id)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_sedes WHERE id='$id'");
        $sql = $sql->fetch_object();
        return $sql;
    }

    public function registrarSede($codigoModular, $nombre, $departamento, $provincia, $distrito, $direccion, $telefono, $correo, $responsable)
    {
        $sql = $this->conexion->query("INSERT INTO sigi_sedes (cod_modular, nombre, departamento, provincia, distrito, direccion, telefono, correo, responsable) VALUES ('$codigoModular', '$nombre', '$departamento', '$provincia', '$distrito', '$direccion', '$telefono', '$correo', '$responsable')");
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
    }

    public function actualizarSede($id, $codigoModular, $nombre, $departamento, $provincia, $distrito, $direccion, $telefono, $correo, $responsable)
    {
        $sql = $this->conexion->query("UPDATE sigi_sedes SET cod_modular='$codigoModular',nombre='$nombre',departamento='$departamento',provincia='$provincia',distrito='$distrito',direccion='$direccion',telefono='$telefono',correo='$correo',responsable='$responsable' WHERE id='$id'");
        return $sql;
    }
}