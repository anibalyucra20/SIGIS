<?php
require_once "./src/config/config.php";
require_once "./src/control/vistas_control.php";

$mostrar = new vistasControlador();

$vista = $mostrar->obtenerVistaControlador();

if ($vista=="login" || $vista == "404" || $vista == "intranet") {
    require_once "./src/view/".$vista.".php";
}else {
    
    include "./src/view/include/header.php";
    include $vista;
    include "./src/view/include/footer.php";
}

?>