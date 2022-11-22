<?php

include_once '../../funciones/wsdl/funciones.php';
$parametrosIN['codArea'] = '001';
$parametros = json_encode($parametrosIN);
echo $parametros;
$token = '';
$URL = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/getRecordsQuestTabReqMM';
$rs = API::POST($URL, $token, $parametros);
$rs = API::JSON_TO_ARRAY($rs);
// $json_string = json_encode($rs);

print_r($rs);
exit;
