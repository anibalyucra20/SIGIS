<?php
//session_start();
class vistaModelo
{

    protected static function obtener_vista($vista)
    {
        $palabras_permitidas_n1 = ['administracion', 'academico', 'biblioteca', 'tutoria', 'admision', 'egresados'];
        /*if(!isset($_SESSION['sesion_ventas_id'])) {
            return "login";
        }*/



        if (in_array($vista, $palabras_permitidas_n1)) {

            $pagina = explode("/", $_GET['views']);
            if ((isset($pagina['1']) && $pagina['1'] != '') && $pagina['0'] == 'administracion') {
                // palabras permitidas para administracion
                $palabras_nivel2 = ['inicio', 'programas-estudio', 'semestres'];
                if (in_array($pagina['1'], $palabras_nivel2)) {

                    if (is_file("./src/view/" . $vista . "-" . $pagina['1'] . ".php")) {
                        $contenido = "./src/view/" . $vista . "-" . $pagina['1'] . ".php";
                    } else {
                        $contenido = "404";
                    }
                } else {
                    $contenido = "404";
                }
            } elseif ((isset($pagina['1']) && $pagina['1'] != '') && $pagina['0'] == 'academico') {
                // palabras permitidas para academico
                $palabras_nivel2 = ['inicio', 'unidades-didacticas', 'calificaciones'];
                if (in_array($pagina['1'], $palabras_nivel2)) {

                    if (is_file("./src/view/" . $vista . "-" . $pagina['1'] . ".php")) {
                        $contenido = "./src/view/" . $vista . "-" . $pagina['1'] . ".php";
                    } else {
                        $contenido = "404";
                    }
                } else {
                    $contenido = "404";
                }
            } elseif ((isset($pagina['1']) && $pagina['1'] != '') && $pagina['0'] == 'biblioteca') {
                // palabras permitidas para biblioteca
                $palabras_nivel2 = ['libros', 'favoritos', 'detalle-libro', 'lectura', 'perfil', 'admin','vista-libros','nuevo-libro', 'editar-libro','asignaciones','usuarios','lecturas','accesos'];
                if (in_array($pagina['1'], $palabras_nivel2)) {

                    if (is_file("./src/view/" . $vista . "-" . $pagina['1'] . ".php")) {
                        $contenido = "./src/view/" . $vista . "-" . $pagina['1'] . ".php";
                    } else {
                        $contenido = "404";
                    }
                } else {
                    $contenido = "404";
                }
            } elseif ((isset($pagina['1']) && $pagina['1'] != '') && $pagina['0'] == 'tutoria') {
                // palabras permitidas para tutoria
                $palabras_nivel2 = ['inicio', 'tutoria', 'asistencia'];
                if (in_array($pagina['1'], $palabras_nivel2)) {

                    if (is_file("./src/view/" . $vista . "-" . $pagina['1'] . ".php")) {
                        $contenido = "./src/view/" . $vista . "-" . $pagina['1'] . ".php";
                    } else {
                        $contenido = "404";
                    }
                } else {
                    $contenido = "404";
                }
            } elseif ((isset($pagina['1']) && $pagina['1'] != '') && $pagina['0'] == 'admision') {
                // palabras permitidas para admision
                $palabras_nivel2 = ['inicio', 'postulantes', 'aulas'];
                if (in_array($pagina['1'], $palabras_nivel2)) {

                    if (is_file("./src/view/" . $vista . "-" . $pagina['1'] . ".php")) {
                        $contenido = "./src/view/" . $vista . "-" . $pagina['1'] . ".php";
                    } else {
                        $contenido = "404";
                    }
                } else {
                    $contenido = "404";
                }
            } elseif ((isset($pagina['1']) && $pagina['1'] != '') && $pagina['0'] == 'egresados') {
                // palabras permitidas para egresados
                $palabras_nivel2 = ['inicio', 'calificaciones', 'historial'];
                if (in_array($pagina['1'], $palabras_nivel2)) {

                    if (is_file("./src/view/" . $vista . "-" . $pagina['1'] . ".php")) {
                        $contenido = "./src/view/" . $vista . "-" . $pagina['1'] . ".php";
                    } else {
                        $contenido = "404";
                    }
                } else {
                    $contenido = "404";
                }
            } else {

                if (is_file("./src/view/" . $vista . ".php")) {
                    $contenido = "./src/view/" . $vista . ".php";
                } else {
                    $contenido = "404";
                }
            }
        } elseif ($vista == "login" || $vista == "index") {
            $contenido = "login";
        } else {
            $contenido = "404";
        }
        return $contenido;
    }
}
