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
}