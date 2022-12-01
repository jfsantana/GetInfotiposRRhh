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
    } elseif (isset($_GET['infotipoView'])) {
        $infotiposReturn = $_infotipos->listaInfotiposView();
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($infotiposReturn);
        http_response_code(200);
    } else {
        $infotiposReturn = $_infotipos->listaInfotipos();
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($infotiposReturn);
        http_response_code(200);
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {// POST CREATE
    $postBody = json_encode($_POST);
    $postBody = file_get_contents('php://input'); // para el plug in de crome

    $datosArray = $_infotipos->post($postBody);

    // Devolvemos la respuesta
    header('Content-Type: application/json;charset=utf-8');
    if (isset($datosArray['result']['error_id'])) {
        $responseCode = $datosArray['result']['error_id'];
        http_response_code($responseCode);
    } else {
        http_response_code(200);
    }
    echo json_encode($datosArray);
} else {
    header('Content-Type: application/json;charset=utf-8');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
}
