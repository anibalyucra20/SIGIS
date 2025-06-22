<?php
require_once "../library/conexion.php";

class ProgramaEstudioModel
{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function listarProgramasSimple()
    {
        $programas = [];
        $sql = "SELECT id, nombre FROM sigi_programa_estudios ORDER BY nombre";
        $res = $this->conexion->query($sql);
        while ($fila = $res->fetch_object()) {
            $programas[] = $fila;
        }
        return $programas;
    }
    public function buscarProgramaEstudios()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_programa_estudios");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarProgramaEstudioById($id)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_programa_estudios WHERE id='$id'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    

    // programa de estudio - sede
    public function buscarProgramaEstudioSede()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_programa_sede");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarProgramaEstudioSedeById($id)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_programa_sede WHERE id='$id'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function buscarProgramaEstudioSedeByIdSede($id_sede)
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_programa_sede WHERE id_sede=$id_sede");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarProgramaEstudioSedeByIdSedePe($id_sede, $id_pe)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_programa_sede WHERE id_sede=$id_sede AND id_programa_estudio=$id_pe");
        $sql = $sql->fetch_object();
        return $sql;
    }
}