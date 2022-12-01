<?php

include_once '../../funciones/wsdl/funciones.php';

$tiempo_inicial = microtime(true);

$token = '';
$resultado = [];
$annoActual = date('Y');
if (isset($_GET)) {
    $annoDesde = @$_GET['anno'];
} else {
    $annoDesde = 2020;
}

if (empty($annoDesde)) {
    $annoDesde = 2020;
}

$respuesta = [];

$listadoInfotipos = listaInfotipos1($connBD);

foreach ($listadoInfotipos as $infotipos) {
    $vaciarTabla = limpiar($connBD, $infotipos['infotipos']);
}

for ($anno = $annoDesde; $anno <= $annoActual; ++$anno) {
    $parametrosIN['FECHA_INI'] = $anno.'-01-01';

    $listadoInfotipos = listaInfotipos1($connBD);
    $respuestaInfo = [];

    // $vaciarTabla = limpiar($connBD, $infotipos['infotipos'], $anno);
    foreach ($listadoInfotipos as $infotipos) {
        //  $vaciarTabla = limpiar($connBD, $infotipos['infotipos']);
        $parametrosIN['INFOTIPO'] = $infotipos['infotipos'];
        $infotipoAux = 'INF_'.$parametrosIN['INFOTIPO'];
        $parametros = json_encode($parametrosIN);
        $token = '';
        $URL = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/SobrePago/getDatos_INFOTIPOS';

        $rs = API::POST_Aut($URL, $token, $parametros);
        $rs = API::JSON_TO_ARRAY($rs);
        $json_string = json_encode($rs);

        $max_records_req = $infotipos['paquetesInsert']; // especifica el numeor de insert po paquetes valor en BD

        $ctd_records = 0;
        if (isset($rs['ZEHS_DATOS_INFOTIPO.Response'][$infotipoAux]['item'][0])) {
            $numTotalInsert = count($rs['ZEHS_DATOS_INFOTIPO.Response'][$infotipoAux]['item']);
            $ctd_records = sizeof($rs['ZEHS_DATOS_INFOTIPO.Response'][$infotipoAux]['item']);

            $num_split_request = ceil($ctd_records / $max_records_req);
            $inserta = '';
            for ($i = 0; $i < $num_split_request; ++$i) {
                $to_iteration = (($i + 1) * $max_records_req) - 1;
                $from_iteration = ($i * $max_records_req);
                for ($j = $from_iteration; $j < $to_iteration; ++$j) {
                    if ($j < $ctd_records) {
                        $array_body = [];
                        foreach ($rs['ZEHS_DATOS_INFOTIPO.Response'][$infotipoAux]['item'][$j] as $key => $value) {
                            if ($key == 'FAVOR') {
                                $value = str_replace('"', "'", $value);
                            }
                            $array_body[$key] = $value;
                        }
                        $insertar = insertInfotipo($infotipoAux, $array_body, $connBD);
                        if ($insertar == 0) {
                            $flagError = 'No se Inserto correctamente';
                            echo '<pre>'.print_r($infotipoAux, true).'</pre>';
                            echo '<pre>'.print_r($array_body, true).'</pre>';
                            exit;
                        }
                    }
                }
            }
            $resultadoAux = [
                                $resultadoAux1['infotipo'] = $infotipoAux,
                                $resultadoAux1['TotalRow'] = $numTotalInsert,
                            ];
            $resultado[$anno][] = $resultadoAux;
        }

        // unset($resultadoAux);
        $log0002 = logInfotipos($infotipoAux, 1, $connBD, $parametrosIN['FECHA_INI']);
    }
}

mysqli_close($connBD);

// echo '<pre>'.print_r($resultado, true).'</pre>';exit;
echo json_encode($resultado);
$tiempo_final = microtime(true);
$tiempo = $tiempo_final - $tiempo_inicial; // este resultado estará en segundos
// echo 'Ejecución : '.$tiempo.' segundos';
exit;
