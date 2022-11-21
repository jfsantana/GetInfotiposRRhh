<?php

set_time_limit(0);
$connBD = new mysqli('localhost', 'root', '', 'rrhh_infotipo');
$connBD->query("SET NAMES 'utf8'"); // Para que se muestren las tildes
if (!$connBD) {
    echo 'Error: No se pudo conectar a MySQL.'.PHP_EOL;
    exit;
}
/*********************************FUNCTION*************************/

function insertInfotipo($infotipo, $items, $connBD)
{
    // $_respuestas = new respuestas();
    $datos = $items; // json_decode($items, true);

    if ($infotipo == 'INF_0002') {
        $resp0002 = Insertar0002($datos, $connBD);
    }
    if ($infotipo == 'INF_0021') {
        $resp0021 = Insertar0021($datos, $connBD);
    }
    if ($infotipo == 'INF_0032') {
        $resp0032 = Insertar0032($datos, $connBD);
    }
    if ($infotipo == 'INF_0167') {
        $resp0167 = Insertar0167($datos, $connBD);
    }
    if ($infotipo == 'INF_0168') {
        $resp0168 = Insertar0168($datos, $connBD);
    }
    if ($infotipo == 'INF_0169') {
        $resp0169 = Insertar0169($datos, $connBD);
    }
    if ($infotipo == 'INF_0171') {
        $resp0171 = Insertar0171($datos, $connBD);
    }
}

function limpiar($infotipo, $connBD)
{
    $query = 'delete from  inf_0002';
    $borrar = $connBD->query($query);

    $query = 'delete from  inf_0021';
    $borrar = $connBD->query($query);

    $query = 'delete from  inf_0032';
    $borrar = $connBD->query($query);

    $query = 'delete from  inf_0167';
    $borrar = $connBD->query($query);

    $query = 'delete from  inf_0168';
    $borrar = $connBD->query($query);

    $query = 'delete from  inf_0169';
    $borrar = $connBD->query($query);

    $query = 'delete from  inf_0171';
    $borrar = $connBD->query($query);

    if ($borrar) {
        return $borrar;
    } else {
        return 0;
    }
}

function logInfotipos($infotipo, $estatus, $connBD, $fechaSolicitada)
{
    $query = "insert Into inf_log_update
        (
        fechaUpdate,
        estatus,
        infotipo,
        fechaSolicitada 
            )
    value
    (
        '".date('Y-m-d H:i:s')."',
        '".$estatus."',
        '".$infotipo."',
        '".$fechaSolicitada."'
        )";

    $Insertar = $connBD->query($query);

    if ($Insertar) {
        return $Insertar;
    } else {
        return 0;
    }
}

function Insertar0002($datos, $connBD)
{
    $Insertar = $connBD->query('CALL sp_inf_0002('.$datos['PERNR'].',
    "'.$datos['ENDDA'].'",
    "'.$datos['BEGDA'].'",
    "'.$datos['AEDTM'].'",
    "'.$datos['UNAME'].'",
    "'.$datos['NACHN'].'",
    "'.$datos['VORNA'].'",
    "'.$datos['KNZNM'].'",
    "'.$datos['ANRED'].'",
    "'.$datos['GESCH'].'",
    "'.$datos['GBDAT'].'",
    "'.$datos['GBLND'].'",
    "'.$datos['GBDEP'].'",
    "'.$datos['GBORT'].'",
    "'.$datos['NATIO'].'",
    "'.$datos['SPRSL'].'",
    "'.$datos['FAMST'].'",
    "'.@$datos['FAMDT'].'",
    "'.@$datos['ANZKD'].'",
    '.$datos['GBJHR'].',
    '.$datos['GBMON'].',
    '.$datos['GBTAG'].',
    "'.$datos['NCHMC'].'",
    "'.$datos['VNAMC'].'")');

    if ($Insertar) {
        return $Insertar;
    } else {
        return 0;
    }
}

function Insertar0021($datos, $connBD)
{
    $Insertar = $connBD->query('CALL sp_inf_0021('.$datos['PERNR'].',"'.$datos['FAMSA'].'","'.$datos['FGBDT'].'","'.$datos['FAVOR'].'","'.$datos['FANAM'].'","'.$datos['ENAME'].'")');

    // $Insertar = $connBD->query($query);

    if ($Insertar) {
        return $Insertar;
    } else {
        return 0;
    }
}

function Insertar0032($datos, $connBD)
{
    $Insertar = $connBD->query('CALL sp_inf_0032(
                                                '.$datos['MANDT'].',
                                                '.$datos['PERNR'].',
                                                "'.$datos['ENDDA'].'",
                                                "'.$datos['BEGDA'].'",
                                                "'.$datos['AEDTM'].'",
                                                "'.$datos['UNAME'].'",
                                                "'.$datos['WAERS'].'",
                                                "'.$datos['ZZNUMEDF'].'")');

    if ($Insertar) {
        return $Insertar;
    } else {
        return 0;
    }
}

function Insertar0167($datos, $connBD)
{
    $Insertar = $connBD->query('CALL sp_inf_0167(
        '.$datos['PERNR'].',
        "'.$datos['BAREA'].'",
        "'.$datos['PLTYP'].'",
        "'.$datos['BPLAN'].'",
        "'.$datos['BOPTI'].'",
        "'.$datos['DEPCV'].'")');

    if ($Insertar) {
        return $Insertar;
    } else {
        return 0;
    }
}

function Insertar0168($datos, $connBD)
{
    $Insertar = $connBD->query('CALL sp_inf_0168(
        '.$datos['PERNR'].',
        "'.$datos['SUBTY'].'",
        "'.$datos['ENDDA'].'",
        "'.$datos['BEGDA'].'",
        "'.$datos['AEDTM'].'",
        "'.$datos['UNAME'].'",
        "'.$datos['BAREA'].'",
        "'.$datos['PLTYP'].'",
        "'.$datos['BPLAN'].'",
        "'.@$datos['ELIDT'].'",
        "'.$datos['BCOVR'].'",
        "'.$datos['ENRTY'].'")');

    if ($Insertar) {
        return $Insertar;
    } else {
        return 0;
    }
}

function Insertar0169($datos, $connBD)
{
    $Insertar = $connBD->query('CALL sp_inf_0169(
                                    '.$datos['PERNR'].',
                                    "'.$datos['SUBTY'].'",
                                    "'.$datos['ENDDA'].'",
                                    "'.$datos['BEGDA'].'",
                                    "'.$datos['AEDTM'].'",
                                    "'.$datos['UNAME'].'",
                                    "'.$datos['BAREA'].'",
                                    "'.$datos['PLTYP'].'",
                                    "'.$datos['BPLAN'].'",
                                    "'.@$datos['ELIDT'].'",
                                    "'.$datos['ENRTY'].'",
                                    "'.$datos['PERIO'].'",
                                    "'.@$datos['PTPCT'].'",
                                    "'.@$datos['PSTTX'].'")');

    if ($Insertar) {
        return $Insertar;
    } else {
        return 0;
    }
}

function Insertar0171($datos, $connBD)
{
    $Insertar = $connBD->query('CALL sp_inf_0171(
        '.$datos['PERNR'].',
       "'.$datos['ENDDA'].'",
       "'.$datos['BEGDA'].'",
       "'.$datos['BAREA'].'",
       "'.$datos['BENGR'].'",
       "'.$datos['BSTAT'].'")');

    if ($Insertar) {
        return $Insertar;
    } else {
        return 0;
    }
}

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

/***********************************FIN DE FUNCIONES *****************************************/

if (file_exists('../../funciones/wsdl/clases/consumoApi.class.php')) {
    require_once '../../funciones/wsdl/clases/consumoApi.class.php';
} else {
    require_once '../../../../funciones/wsdl/clases/consumoApi.class.php';
}
