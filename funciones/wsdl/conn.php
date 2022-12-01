<?php

// set_time_limit(0);
set_time_limit(6000000);
ini_set('max_execution_time', 6000000);
$connBD = new mysqli('localhost', 'seip', 'adminsyaait', 'rrhh_infotipo');
$connBD->query("SET NAMES 'utf8'"); // Para que se muestren las tildes
if (!$connBD) {
    echo 'Error: No se pudo conectar a MySQL.'.PHP_EOL;
    exit;
}
/*********************************FUNCTION*************************/
