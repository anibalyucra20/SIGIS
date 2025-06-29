<?php
require_once "../library/conexion.php";

class RolesModel
{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function listarRolesSimple()
    {
        $roles = [];
        $sql = "SELECT id, nombre FROM sigi_roles ORDER BY nombre";
        $res = $this->conexion->query($sql);
        while ($fila = $res->fetch_object()) {
            $roles[] = $fila;
        }
        return $roles;
    }
    public function buscarRoles()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_roles");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarRolById($id)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_roles WHERE id='$id'");
        $sql = $sql->fetch_object();
        return $sql;
    }
}