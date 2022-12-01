<?php

/***************llamado servicio */
require_once '../wsdl/clases/consumoApi.class.php';

$token = '';

$URL = 'http://'.$_SERVER['HTTP_HOST'].'/funciones/wsdl/auth';
$parametros = [
    'usuario' => $_POST['user'],
    'password' => $_POST['password'],
];

// $parametros = json_encode($parametros);
$rs = API::POST($URL, $token, $parametros);
$rs = API::JSON_TO_ARRAY($rs);

if (@$rs['result']['token']) {
    /* Ws  datos empleado */
    // var_dump('epale');die();
    $token = $rs['result']['token'];
    $URL = 'http://'.$_SERVER['HTTP_HOST'].'/funciones/wsdl/empleados?token='.$rs['result']['token'];
    // print_r(($URL)); die;
    $rs = API::GET($URL, $token);
    $array = API::JSON_TO_ARRAY($rs);
    $datosEmpleado = $array;

    // echo "entre";exit;
    $_SESSION['usuario'] = $datosEmpleado[0]['log_usu'];
    $_SESSION['id_user'] = $datosEmpleado[0]['id_usu'];
    $_SESSION['id_rol'] = $datosEmpleado[0]['rol_usu'];

    $_SESSION['token'] = $token;
    $_SESSION['nombre'] = $datosEmpleado[0]['nom_usu'].', '.$datosEmpleado[0]['ape_usu'];
    $activo = 'A';
    $id_user = $_SESSION['id_user'];
    $nombre = $_SESSION['nombre'];
    $id_rol = $_SESSION['id_rol'];
    $ced_usu = $_SESSION['npe_usu'];
    $com_usu = $_SESSION['id_complejo'];
    $siglas_complejo = $_SESSION['siglas_complejo'];
    $sal_usu = $_SESSION['sal_usu'];

    header('Location:../../vistas/general.php');
    exit;
} else {
    header("Location:../../index.php?mensaje=DISCULPE, Sr. '.$usr.', USTED NO ESTA AUTORIZADO");
    exit;
}
