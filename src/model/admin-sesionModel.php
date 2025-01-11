<?php
require_once "../library/conexion.php";

class SessionModel
{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function buscarSesionLoginById($id)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_sesiones WHERE id='$id'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function buscarSesionLoginBySistema($id)
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_sesiones WHERE id_sistema_integrado='$id'");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
}