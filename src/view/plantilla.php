<?php
session_start();
require_once("./src/model/validador_sesion.php");
require_once "./src/config/config.php";
require_once "./src/control/vistas_control.php";


$mostrar = new vistasControlador();
$vista = $mostrar->obtenerVistaControlador();

if (isset($_SESSION['sesion_sigi_id'])) {
    $objSesion = new SessionModel();
    $arrSesion = $objSesion->verificar_sesion_si_activa($_SESSION['sesion_sigi_id'], $_SESSION['sesion_sigi_token']);
    if (!$arrSesion) {
       $vista = "login";
    }
}

if ($vista == "login" || $vista == "404" || $vista == "intranet") {
    require_once "./src/view/" . $vista . ".php";
} else {

    include "./src/view/include/header.php";
    include $vista;
    include "./src/view/include/footer.php";
}
