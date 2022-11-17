<?php

// ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/infotipos.class.php';

$_respuestas = new respuestas();
$_infotipos = new infotipos();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {// Get READ
    if (
        isset($_GET['infotipo']) ||
        isset($_GET['items'])
    ) {
        $infotiposReturn = $_infotipos->insertInfotipo(@$_GET['infotipo'], @$_GET['items']);
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($infotiposReturn);
        http_response_code(200);
    } elseif (isset($_GET['limpiar'])) {
        $infotiposLimpiarBd = $_infotipos->limpiar(@$_GET['limpiar']);
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($infotiposLimpiarBd);
        http_response_code(200);
    } else {
        $infotiposReturn = $_infotipos->listaInfotipos();
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($infotiposReturn);
        http_response_code(200);
    }
} else {
    header('Content-Type: application/json;charset=utf-8');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
}
