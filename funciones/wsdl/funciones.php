<?php

require_once 'conn.php';
// set_time_limit(0);
/*
set_time_limit(6000000);
ini_set('max_execution_time', 6000000);
$connBD = new mysqli('localhost', 'seip', 'adminsyaait', 'rrhh_infotipo');
$connBD->query("SET NAMES 'utf8'"); // Para que se muestren las tildes
if (!$connBD) {
    echo 'Error: No se pudo conectar a MySQL.'.PHP_EOL;
    exit;
}
*/
/*********************************FUNCTION*************************/

function insertInfotipo($infotipo, $items, $connBD)
{
    // $_respuestas = new respuestas();
    $datos = $items; // json_decode($items, true);

    if ($infotipo == 'INF_0002') {
        $insert = Insertar0002($datos, $connBD);
    }
    if ($infotipo == 'INF_0021') {
        $insert = Insertar0021($datos, $connBD);
    }
    if ($infotipo == 'INF_0032') {
        $insert = Insertar0032($datos, $connBD);
    }
    if ($infotipo == 'INF_0167') {
        $insert = Insertar0167($datos, $connBD);
    }
    if ($infotipo == 'INF_0168') {
        $insert = Insertar0168($datos, $connBD);
    }
    if ($infotipo == 'INF_0169') {
        $insert = Insertar0169($datos, $connBD);
    }
    if ($infotipo == 'INF_0171') {
        $insert = Insertar0171($datos, $connBD);
    }

    return $insert;
}

function limpiar($connBD, $infotipo)
{
    switch ($infotipo) {
        case '0002':
            $query = 'delete from  inf_0002';
            $borrar = $connBD->query($query);
            break;
        case '0021':
            $query = 'delete from  inf_0021';
            $borrar = $connBD->query($query);
            break;
        case '0032':
            $query = 'delete from  inf_0032';
            $borrar = $connBD->query($query);
            break;
        case '0167':
            $query = 'delete from  inf_0167';
            $borrar = $connBD->query($query);
            break;
        case '0168':
            $query = 'delete from  inf_0168';
            $borrar = $connBD->query($query);
            break;
        case '0169':
            $query = 'delete from  inf_0169';
            $borrar = $connBD->query($query);
            break;
        case '0171':
            $query = 'delete from  inf_0171';
            $borrar = $connBD->query($query);
            break;
    }

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
    $Insertar = $connBD->query('CALL sp_inf_0002(
                            '.$datos['PERNR'].',
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
                            "'.$datos['ICNUM'].'",
                            "'.@$datos['PERSG'].'",
                            "'.@$datos['PERSK'].'",
                            "'.@$datos['GBJHR'].'",
                            "'.@$datos['GBMON'].'",
                            "'.@$datos['GBTAG'].'",
                            "'.@$datos['NCHMC'].'",
                            "'.@$datos['VNAMC'].'")'
    );

    if ($Insertar) {
        return $Insertar;
    } else {
        return 0;
    }
}

function Insertar0021($datos, $connBD)
{
    $Insertar = $connBD->query('CALL sp_inf_0021(
                                '.$datos['PERNR'].',
                                "'.@$datos['OBJPS'].'",
                                "'.@$datos['UNAME'].'",
                                "'.@$datos['FAMSA'].'",
                                "'.@$datos['FGBDT'].'",
                                '.$datos['FASEX'].',
                                "'.@$datos['FAVOR'].'",
                                "'.@$datos['FANAM'].'",
                                "'.@$datos['ENAME'].'",
                                '.$datos['IDNUM'].')
                                ');

    if ($Insertar) {
        return $Insertar;
    } else {
        echo 'CALL sp_inf_0021(
            '.$datos['PERNR'].',
            "'.@$datos['OBJPS'].'",
            "'.@$datos['UNAME'].'",
            "'.@$datos['FAMSA'].'",
            "'.@$datos['FGBDT'].'",
            '.$datos['FASEX'].',
            "'.@$datos['FAVOR'].'",
            "'.@$datos['FANAM'].'",
            "'.@$datos['ENAME'].'",
            '.$datos['IDNUM'].')
            ';
        exit;

        return 0;
    }
}

function Insertar0032($datos, $connBD)
{
    $Insertar = $connBD->query('CALL sp_inf_0032(
                                                '.$datos['MANDT'].',
                                                '.$datos['PERNR'].',
                                                "'.@$datos['ENDDA'].'",
                                                "'.@$datos['BEGDA'].'",
                                                "'.@$datos['AEDTM'].'",
                                                "'.@$datos['UNAME'].'",
                                                "'.@$datos['WAERS'].'",
                                                "'.@$datos['GEBNR'].'",
                                                "'.@$datos['ZZNUMEDF'].'")
                                                ');

    if ($Insertar) {
        return $Insertar;
    } else {
        echo 'CALL sp_inf_0032(
            '.$datos['MANDT'].',
            '.$datos['PERNR'].',
            "'.$datos['ENDDA'].'",
            "'.$datos['BEGDA'].'",
            "'.$datos['AEDTM'].'",
            "'.$datos['UNAME'].'",
            "'.$datos['WAERS'].'",
            "'.@$datos['GEBNR'].'",
            "'.$datos['ZZNUMEDF'].'")
            ';
        exit;

        return 0;
    }
}

function Insertar0167($datos, $connBD)
{
    $Insertar = $connBD->query('CALL sp_inf_0167(
        '.$datos['PERNR'].',
        "'.@$datos['BAREA'].'",
        "'.@$datos['PLTYP'].'",
        "'.@$datos['BPLAN'].'",
        "'.@$datos['BOPTI'].'",
        "'.@$datos['DEPCV'].'",
        "'.@$datos['DTY01'].'",
        "'.@$datos['DID01'].'",
        "'.@$datos['DTY02'].'",
        "'.@$datos['DID02'].'",
        "'.@$datos['DTY03'].'",
        "'.@$datos['DID03'].'",
        "'.@$datos['DTY04'].'",
        "'.@$datos['DID04'].'",
        "'.@$datos['DTY05'].'",
        "'.@$datos['DID05'].'",
        "'.@$datos['DTY06'].'",
        "'.@$datos['DID06'].'",
        "'.@$datos['DTY07'].'",
        "'.@$datos['DID07'].'"
        )');

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
        "'.@$datos['SUBTY'].'",
        "'.@$datos['ENDDA'].'",
        "'.@$datos['BEGDA'].'",
        "'.@$datos['AEDTM'].'",
        "'.@$datos['UNAME'].'",
        "'.@$datos['BAREA'].'",
        "'.@$datos['PLTYP'].'",
        "'.@$datos['BPLAN'].'",
        "'.@$datos['ELIDT'].'",
        "'.@$datos['BCOVR'].'",
        "'.@$datos['ENRTY'].'",
        "'.@$datos['DTY01'].'",
        "'.@$datos['DID01'].'",
        "'.@$datos['BPT01'].'",
        "'.@$datos['DTY02'].'",
        "'.@$datos['DID02'].'",
        "'.@$datos['BPT02'].'",
        "'.@$datos['DTY03'].'",
        "'.@$datos['DID03'].'",
        "'.@$datos['BPT03'].'",
        "'.@$datos['DTY04'].'",
        "'.@$datos['DID04'].'",
        "'.@$datos['BPT04'].'",
        "'.@$datos['DTY05'].'",
        "'.@$datos['DID05'].'",
        "'.@$datos['BPT05'].'",
        "'.@$datos['DTY06'].'",
        "'.@$datos['DID06'].'",
        "'.@$datos['BPT06'].'",
        "'.@$datos['DTY07'].'",
        "'.@$datos['DID07'].'",
        "'.@$datos['BPT07'].'"
        )');

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
                                    "'.@$datos['SUBTY'].'",
                                    "'.@$datos['ENDDA'].'",
                                    "'.@$datos['BEGDA'].'",
                                    "'.@$datos['AEDTM'].'",
                                    "'.@$datos['UNAME'].'",
                                    "'.@$datos['BAREA'].'",
                                    "'.@$datos['PLTYP'].'",
                                    "'.@$datos['BPLAN'].'",
                                    "'.@$datos['ELIDT'].'",
                                    "'.@$datos['ENRTY'].'",
                                    "'.@$datos['PERIO'].'",
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
       "'.@$datos['ENDDA'].'",
       "'.@$datos['BEGDA'].'",
       "'.@$datos['BAREA'].'",
       "'.@$datos['BENGR'].'",
       "'.@$datos['BSTAT'].'")');

    if ($Insertar) {
        return $Insertar;
    } else {
        echo 'CALL sp_inf_0171(
            '.$datos['PERNR'].',
           "'.$datos['ENDDA'].'",
           "'.$datos['BEGDA'].'",
           "'.$datos['BAREA'].'",
           "'.$datos['BENGR'].'",
           "'.$datos['BSTAT'].'")';
        exit;

        return 0;
    }
}

function listaInfotipos1($connBD)
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
