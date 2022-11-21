<?php

include_once '../../funciones/wsdl/funciones.php';

$token = '';

$resultado = [];
$annoActual = date('Y');

// Vacia todas las tablas cundo se inicie la corrida por anno
// $vaciarTabla = limpiar($infotipoAux, $connBD);  // 13336768: se debe activar cuando se haga por anno

// for ($anno = 2021; $anno < $annoActual; ++$anno) {  //13336768: se debe activar cuanod se haga por anno
// $parametrosIN['FECHA_INI'] = $anno.'-01-01'; //13336768: ESTE INDICA EL ANNO QUE SE CALCULARA se debe activar cuanod se haga por anno
$parametrosIN['FECHA_INI'] = '2021-01-01'; // 13336768: COMENAR ESTA LINA CUNADO SE ACTIVE EL FOR DE LOS ANNOS

$listadoInfotipos = listaInfotipos($connBD);

foreach ($listadoInfotipos as $infotipos) {
    $respuesta = [];
    $parametrosIN['INFOTIPO'] = $infotipos['infotipos'];
    $infotipoAux = 'INF_'.$parametrosIN['INFOTIPO'];
    $parametros = json_encode($parametrosIN);
    $token = '';
    $URL = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/SobrePago/getDatos_INFOTIPOS';
    $rs = API::POST($URL, $token, $parametros);
    $rs = API::JSON_TO_ARRAY($rs);
    $json_string = json_encode($rs);
    $max_records_req = 5000;

    if (isset($rs['ZEHS_DATOS_INFOTIPO.Response'][$infotipoAux]['item'][0])) {
        $ctd_records = sizeof($rs['ZEHS_DATOS_INFOTIPO.Response'][$infotipoAux]['item']);
        $num_split_request = ceil($ctd_records / $max_records_req);
        $inserta = '';
        for ($i = 0; $i < $num_split_request; ++$i) {
            $to_iteration = (($i + 1) * $max_records_req) - 1;
            $from_iteration = ($i * $max_records_req);
            $start_date = date('Y-m-d H:i:s');
            for ($j = $from_iteration; $j < $to_iteration; ++$j) {
                if ($j < $ctd_records) {
                    $array_body = [];
                    foreach ($rs['ZEHS_DATOS_INFOTIPO.Response'][$infotipoAux]['item'][$j] as $key => $value) {
                        $array_body[$key] = $value.'';
                    }
                    $insertar = insertInfotipo($infotipoAux, $array_body, $connBD);
                    if ($insertar == 0) {
                        $flagError = 'No se Inserto correctamente';
                    }
                }
            }
        }
        $respuesta['status'] = 'OK';
        $respuesta['fechaSolicitada'] = $parametrosIN['FECHA_INI'];
        $respuesta['result'] = [
            'Infotipo' => $infotipoAux,
            'MSG' => 'Actualizado Correctamente',
            'TotalRow' => $ctd_records,
        ];
    }
    array_push($resultado, $respuesta);
    $log0002 = logInfotipos($infotipoAux, 1, $connBD, $parametrosIN['FECHA_INI']); // infotipo //estatus
}
// }  //13336768: fin del for para correr el historico LINEA 14

mysqli_close($connBD);

// echo '<pre>'.print_r($resultado, true).'</pre>';
echo json_encode($resultado);
exit;
