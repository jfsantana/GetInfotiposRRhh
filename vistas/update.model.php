<?php

if (!isset($_SESSION)) {
    session_start();
}
// actualizar la tabla de setting y uego llamar al servicio existente

function listaInfotipos($connBD)
{
    $query = 'select * from inf_setting where estatus = 1 order by 2';

    $datos = $connBD->query($query);

    $resultArray = [];
    if ($datos) {
        foreach ($datos as $key) {
            $resultArray[] = $key;
        }
    }

    return $resultArray;
}

function datInfotipos($connBD, $i)
{
    $query = "select * from inf_setting where id = $i order by 2";

    $datos = $connBD->query($query);

    $resultArray = [];
    if ($datos) {
        foreach ($datos as $key) {
            $resultArray[] = $key;
        }
    }

    return $resultArray;
}

function cantidadInfotipos($connBD)
{
    $query = 'select * from inf_setting order by 2';

    $datos = $connBD->query($query);
    $rows = $datos->num_rows;

    if ($rows) {
        return $rows;
    } else {
        return 0;
    }
}

function updateSetting($infotipo, $valor, $connBD)
{
    $query = 'update inf_setting set estatus ='.$valor.' where id='.$infotipo;
    $datos = $connBD->query($query);

    if ($datos) {
        return $datos;
    } else {
        return 0;
    }
}

require_once '../funciones/wsdl/clases/consumoApi.class.php';

include_once '../funciones/wsdl/conn.php';

$cantidad = cantidadInfotipos($connBD);

for ($i = 1; $i <= 7; ++$i) {
    if (isset($_POST[$i])) {
        $valor = $_POST[$i];
    } else {
        $valor = 0;
    }
    // $infotipo = datInfotipos($connBD, $i);
    $updateSetting = updateSetting($i, $valor, $connBD);
}

$token = 0;
$URL = 'http://'.$_SERVER['HTTP_HOST'].'/vistas/administracion/infotipoData.php?anno='.$_POST['anno'];
$rs = API::GET($URL, $token);
// $rs = API::JSON_TO_ARRAY($rs);

$rs = @$rs;
header("Location: general.php?rs=$rs");
exit;
