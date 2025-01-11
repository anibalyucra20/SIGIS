<?php
require_once "../library/conexion.php";

class UsuarioModel
{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function buscarUsuarioById($id)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE id='$id'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function buscarUsuarioByDni($dni)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE dni='$dni'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function buscarUsuarioByNomAp($nomap)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE apellidos_nombres='$nomap'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function buscarUsuarioByApellidosNombres_like($dato)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE apellidos_nombres LIKE '%$dato%'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function buscarUsuarioByDniCorreo($dni, $correo)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE dni='$dni' AND correo='$correo'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    // busqueda de directores
    public function buscarUsuarioDirector_All()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE id_rol=1");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    // busqueda de secretario academico
    // busqueda de coordinadores
    public function buscarUsuarioCoordinador_sede($sede)
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE id_rol=4 AND id_sede='$sede'");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarUsuarioCoordinador_sedeAndPe($sede, $pe)
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE id_rol=4 AND id_sede='$sede' AND id_programa_estudios='$pe'");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    // busqueda de docentes
    public function buscarUsuarioDocentes()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE id_rol<=5");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarUsuarioDocentesBySede($sede)
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE id_rol<=5 AND id_sede='$sede'");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarUsuarioDocentesOrderByApellidosNombres()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE id_rol<=5 ORDER BY apellidos_nombres");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarUsuarioDocentesOrderByApellidosNombresAndSede($sede)
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE id_rol<=5 AND id_sede='$sede' ORDER BY apellidos_nombres");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }

    // busqueda de estudiantes
    public function buscarUsuarioEstudiantesBySede($sede)
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE id_rol=6 AND id_sede='$sede'");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarUsuarioEstudiantesBySedePeriodo($sede, $periodo)
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM sigi_usuarios WHERE id_rol=6 AND id_sede='$sede' AND id_periodo_registro='$periodo'");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }

    // estudiante - programa de estudios

    public function buscarEstudiantePeById_est($id_usu)
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM acad_estudiante_programa WHERE id_usuario='$id_usu'");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarEstudiantePeByEst_Pe($id_usu, $id_pe)
    {
        $sql = $this->conexion->query("SELECT * FROM acad_estudiante_programa WHERE id_usuario='$id_usu' AND id_programa_estudio='$id_pe'");
        $sql = $sql->fetch_object();
        return $sql;
    }

    // ----------------------------- PERMISOS DE USUARIO ----------------------------------------
    public function buscarPermisoUsuarioByUsuarioSistema($usuario, $sistema)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_permisos_usuarios WHERE id_usuario='$usuario' AND id_sistema='$sistema'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function buscarPermisoUsuarioByUsuarioSistemaRol($usuario, $sistema, $rol)
    {
        $sql = $this->conexion->query("SELECT * FROM sigi_permisos_usuarios WHERE id_usuario='$usuario' AND id_sistema='$sistema' AND id_rol='$rol'");
        $sql = $sql->fetch_object();
        return $sql;
    }
     
}