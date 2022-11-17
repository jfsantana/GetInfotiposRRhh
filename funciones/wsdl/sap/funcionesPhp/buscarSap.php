<?php

/*
Los Infotipos a consultar son:
   0002.  $_POST['INFOTIPO'] = '0002';
   0021.
   0032.  $_POST['INFOTIPO'] = '0032';
   0167.  $_POST['INFOTIPO'] = '0167';
   0168.  $_POST['INFOTIPO'] = '0168';
   0169.  $_POST['INFOTIPO'] = '0169';
   0171.*/

if (file_exists('../../funciones/wsdl/clases/consumoApi.class.php')) {
    require_once '../../funciones/wsdl/clases/consumoApi.class.php';
} else {
    require_once '../../../../funciones/wsdl/clases/consumoApi.class.php';
}

// $parametros = json_encode(file_get_contents('php://input'));
$parametros = json_encode($_REQUEST['parametros']);
echo $_REQUEST['parametros'];
exit;
$token = '';

$URL = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/SobrePago/getDatos_INFOTIPOS';

$rs = API::POST($URL, $token, $_REQUEST['parametros']);
$rs = API::JSON_TO_ARRAY($rs);

$json_string = json_encode($rs);
echo $json_string;
// echo '<pre>'.print_r($rs, true).'</pre>';
