<?php
/* REST
PM: AVISOS - NOTIFICACIONES => pman
PM: ORDENES => pmod
*/
if (file_exists( "vendor/autoload.php" ) ) {
  require_once ( "vendor/autoload.php" );
}


use \GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Exception\ClientException;

/* Parametros para el Request */
$HEADERS = [
  'Authorization' => 'Basic UElVU0VSV1MwMTpQZXF1aXZlbjIxKg==',
  'Content-Type' => 'application/json',
  'Cookie' => 'saplb_*=(J2EE8042120)8042150'
];
/* */
$pman_number = isset($_REQUEST['pman_number']) ? $_REQUEST['pman_number'] : '100021216';
$aviNot = obtenerAvisosNotificaciones($pman_number, $HEADERS);
$aviNot = json_decode(json_encode($aviNot), true);

$pmod_number = isset($_REQUEST['pmod_number']) ? $_REQUEST['pmod_number'] : '3000013700';
$orden = obtenerOrdenes($pmod_number, $HEADERS);
$orden = json_decode(json_encode($orden), true);

$bodyLista = "X";
$lista_centros = obtenerListaCentros($bodyLista, $HEADERS);
$lista_centros = json_decode(json_encode($lista_centros), true);

list($codAreaInic ,$codAreaFin ,$banfnInic, $banfnFin ,$nroAlcInic ,$nroAlcFin ,$fechaInic ,$fechaFin) = array(
  isset($_REQUEST['codAreaInic']) ? $_REQUEST['codAreaInic'] : '001' ,
  isset($_REQUEST['codAreaFin']) ? $_REQUEST['codAreaFin'] : '', 
  isset($_REQUEST['banfnInic']) ? $_REQUEST['banfnInic'] : '', 
  isset($_REQUEST['banfnFin']) ? $_REQUEST['banfnFin'] : '', 
  isset($_REQUEST['nroAlcInic']) ? $_REQUEST['nroAlcInic'] : '', 
  isset($_REQUEST['nroAlcFin']) ? $_REQUEST['nroAlcFin'] : '', 
  isset($_REQUEST['fechaInic']) ? $_REQUEST['fechaInic'] : '2022-01-01', 
  isset($_REQUEST['fechaFin']) ? $_REQUEST['fechaFin'] : '2022-12-31', 
  );
$vars = array($codAreaInic ,$codAreaFin ,$banfnInic, $banfnFin ,$nroAlcInic ,$nroAlcFin ,$fechaInic ,$fechaFin);
$registros = obtenerRegistros($vars, $HEADERS);
$registros = json_decode(json_encode($registros), true);

//var_dump($aviNot);
echo '<br><br><br>';
//var_dump($orden);
echo '<br><br><br>';
//var_dump($lista_centros);
echo '<br><br><br>';
var_dump($registros);
print_r(obtenerAvisosNotificaciones($pman_number,$HEADERS));



function obtenerAvisosNotificaciones($pman_number, $headers){
	
  //error_reporting(0); 
    $client = new Client();
    print_r("ruta");die;	
    $parts = array("number" => $pman_number);
    $bodyArray = $parts;
    $ruta = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/GetNotificacionesPM';
    print_r($ruta);die;	
    $request = new Request('GET', $ruta, $headers, json_encode($bodyArray));
    try {
      $res = $client->sendAsync($request)->wait();
      if ($res->getStatusCode() == 200) {
        return json_decode($res->getBody()->getContents());
      }
    } catch (ClientException $e) {
      // echo GuzzleHttp\Psr7\Message::toString($e->getRequest());
      // echo $e->getResponse()->getStatusCode();
      echo Message::toString($e->getResponse()); 
    }
}

function obtenerOrdenes($pmod_number, $headers){
    //error_reporting(0);
    $client = new Client();
    $parts = array("number" => $pmod_number);
    $bodyArray = $parts;
    $ruta = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/GetOrdenesPM';
    $request = new Request('GET', $ruta, $headers, json_encode($bodyArray));
    try {
        $res = $client->sendAsync($request)->wait();
        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody()->getContents());
        }
    } catch (ClientException $e) {
        // echo GuzzleHttp\Psr7\Message::toString($e->getRequest());
        // echo $e->getResponse()->getStatusCode();
        echo Message::toString($e->getResponse()); 
    }
}

function obtenerListaCentros($lista_centros, $headers){
  $client = new Client();
  $parts = array("listaCentros" => $lista_centros);
  $bodyArray = $parts;
  $ruta = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_PP/GetCentros_T001W';
  $request = new Request('GET', $ruta, $headers, json_encode($bodyArray));
  try{
    $res = $client->sendAsync($request)->wait();
    if ($res->getStatusCode() == 200) {
      return json_decode($res->getBody()->getContents());
    }
  }catch (ClientException $e) {
    echo Message::toString($e->getResponse()); 
  }
}

function obtenerRegistros($vars, $headers){
  $client = new Client();
  $parts = array("rangCodArea" => array("codAreaInic" => $vars[0], "codAreaFin" => $vars[1]), "rangSolp" => array("banfnInic" => $vars[2], "banfnFin" => $vars[3]), "rangNroAlc" => array("nroAlcInic" => $vars[4], "nroAlcFin" => $vars[5]), "rangFechas" => array("fechaInic" => $vars[6], "fechaFin" => $vars[7]));
  $bodyArray = json_encode($parts);
  $ruta = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/getRecordControlTabReqMM';
  $request = new Request('GET', $ruta , $headers, $bodyArray);
  try{
    $res = $client->sendAsync($request)->wait();
    if ($res->getStatusCode() == 200) {
      return json_decode($res->getBody()->getContents());
    }
  }catch (ClientException $e) {
    echo Message::toString($e->getResponse()); 
  }

}