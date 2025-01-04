<?php
require_once "../library/conexion.php";

class UsuarioModel{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function buscarUsuarioPorDNI($dni){
        $sql = $this->conexion->query("SELECT * FROM persona WHERE nro_identidad='{$dni}'");
        $sql = $sql->fetch_object();
        return $sql;
    }
}



?>