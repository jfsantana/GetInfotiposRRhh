<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE EMPLEADOS
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 *
 * 'clases/empleados.class.php';
 *************************************************************/

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

// hereda de la clase conexion
class infotipos extends conexion
{
     // Activaciond e token
    private $token = ''; // b43bbfc8bcf8625eed413d91186e8534

    private function buscarToken()
    {
        $query = "select * from dg_empleado_token where token = '$this->token' and estado = 1";

        $resp = parent::ObtenerDatos($query);

        if ($resp) {
            $actualizarToken = $this->actualizarToken($resp[0]['empleadoTokenId']);

            return $resp;
        } else {
            return 0;
        }
    }

    public function post($json)
    {
        $_respuestas = new respuestas();
        $datos = json_decode($json, true);

        if (!isset($datos['token'])) {
            return $_respuestas->error_401();
        } else {
            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();

            if ($arrayToken) {
                // print_r($datos['datos']);
                foreach ($datos['datos'] as $infoCampo => $infoValue) {
                    print_r($infoCampo);
                }
                //  echo '<pre>'.print_r(json_encode($datos['datos'), true).'</pre>';
                exit;
                // valida los campos obligatorios
                if (
                    (!isset($datos['ced_usu'])) ||
                    (!isset($datos['npe_usu'])) ||
                    (!isset($datos['car_usu'])) ||
                    (!isset($datos['cor_usu'])) ||
                    (!isset($datos['nom_usu'])) ||
                    (!isset($datos['ape_usu'])) ||
                    (!isset($datos['log_usu'])) ||
                    (!isset($datos['rol_usu'])) ||
                    (!isset($datos['act_usu'])) ||
                    (!isset($datos['com_usu'])) ||
                    (!isset($datos['ger_usu']))
                    // ||                     (!isset($datos['pass_usu']))
                ) {
                    // en caso de que la validacion no se cumpla se arroja un error
                    $datosArray = $_respuestas->error_400();
                    echo json_encode($datosArray);
                } else {
                    // Asignacion de datos validados su existencia en el If anterior
                    $this->ced_usu = $datos['ced_usu'];
                    $this->npe_usu = $datos['npe_usu'];
                    $this->car_usu = $datos['car_usu'];

                    $this->tel_usu = @$datos['tel_usu'];
                    $this->cor_usu = $datos['cor_usu'];
                    $this->nom_usu = $datos['nom_usu'];
                    $this->ape_usu = $datos['ape_usu'];
                    $this->log_usu = $datos['log_usu'];
                    $this->rol_usu = $datos['rol_usu'];
                    $this->act_usu = $datos['act_usu'];
                    $this->com_usu = $datos['com_usu'];
                    $this->ger_usu = $datos['ger_usu'];
                    $this->pass_usu = @$datos['pass_usu'];

                    $this->fechaCreacion = date('Y-m-d');

                    // llama a la funcion de insertar
                    $resp = $this->InsertarEmpleados();

                    // valida que paso d/rante el inser
                    if ($resp) {
                        $respuesta = $_respuestas->response;
                        $respuesta['status'] = 'OK';
                        $respuesta['result'] = [
                            'idHeaderNew' => $resp,
                        ];

                        return $respuesta;
                    } else {
                        return $_respuestas->error_500();
                    }
                }
            } else {
                return $_respuestas->error_401('El Token que envio es invalido o ha caducado');
            }
        }
    }

    private function InsertarEmpleados()
    {
        $query = 'insert Into '.$this->tabla."
            (
                ced_usu, 
                npe_usu, 
                car_usu, 
                tel_usu, 
                cor_usu, 
                nom_usu, 
                ape_usu, 
                log_usu, 
                rol_usu, 
                act_usu,
                com_usu,
                ger_usu,
                fcr_usu,
                pass_usu
                )
        value
        (
            '$this->ced_usu',
            '$this->npe_usu',
            '$this->car_usu',
            '$this->tel_usu',
            '$this->cor_usu',
            '$this->nom_usu',
            '$this->ape_usu', 
            '$this->log_usu',
            '$this->rol_usu',
            '$this->act_usu',
            '$this->com_usu',
            '$this->ger_usu',
            '$this->fechaCreacion',
            '$this->pass_usu'
            )";

        $Insertar = parent::nonQueryId($query);

        // print_r ($Insertar);die;
        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    public function listaInfotipos()
    {
        $query = 'select * from inf_setting where estatus = 1 order by 2';

        $datos = parent::ObtenerDatos($query);

        return $datos;
    }

    public function listaInfotiposView()
    {
        $query = 'select * from inf_setting order by 2';

        $datos = parent::ObtenerDatos($query);

        return $datos;
    }

    public function insertInfotipo($infotipo, $items)
    {
        $_respuestas = new respuestas();
        $datos = json_decode($items, true);

        if ($infotipo == 'INF_0002') {
            $resp0002 = $this->Insertar0002($datos);
            $log0002 = $this->logInfotipos($datos[0], $resp0002); // infotipo //estatus
        }
        if ($infotipo == 'INF_0021') {
            $resp0021 = $this->Insertar0021($datos);

            $log0002 = $this->logInfotipos($datos[0], $resp0021); // infotipo //estatus

            return $log0002;
            exit;
        }
        if ($infotipo == 'INF_0032') {
            $resp0032 = $this->Insertar0032($datos);
            $log0002 = $this->logInfotipos($datos[0], $resp0032); // infotipo //estatus
        }
        if ($infotipo == 'INF_0167') {
            $resp0167 = $this->Insertar0167($datos);
            $log0002 = $this->logInfotipos($datos[0], $resp0167); // infotipo //estatus
        }
        if ($infotipo == 'INF_0168') {
            $resp0168 = $this->Insertar0168($datos);
            $log0002 = $this->logInfotipos($datos[0], $resp0168); // infotipo //estatus
        }
        if ($infotipo == 'INF_0169') {
            $resp0169 = $this->Insertar0169($datos);
            $log0002 = $this->logInfotipos($datos[0], $resp0169); // infotipo //estatus
        }
        if ($infotipo == 'INF_0171') {
            $resp0171 = $this->Insertar0171($datos);
            $log0002 = $this->logInfotipos($datos[0], $resp0171); // infotipo //estatus
        }
    }

    public function limpiar($infotipo)
    {
        $query = "delete from  $infotipo";

        $borrar = parent::nonQuery($query);

        if ($borrar) {
            return $borrar;
        } else {
            return 0;
        }
    }

    public function logInfotipos($infotipo, $estatus)
    {
        $query = "insert Into inf_log_update
            (
            fechaUpdate,
            estatus,
            infotipo 
                )
        value
        (
            '".date('Y-m-d')."',
            '".$estatus."',
            '".$infotipo."'
            )";

        $Insertar = parent::nonQuery($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    private function Insertar0002($datos)
    {
        $query = "insert Into inf_0002
            (
                PERNR,
                ENDDA,
                BEGDA,
                AEDTM,
                UNAME,
                NACHN,
                VORNA,
                KNZNM,
                ANRED,
                GESCH,
                GBDAT,
                GBLND,
                GBDEP,
                GBORT,
                NATIO,
                SPRSL,
                FAMST,
                FAMDT,
                ANZKD,
                GBJHR,
                GBMON,
                GBTAG,
                NCHMC,
                VNAMC                
                )
        value
        (
            '".$datos['PERNR']."',
            '".$datos['ENDDA']."',
            '".$datos['BEGDA']."',
            '".$datos['AEDTM']."',
            '".$datos['UNAME']."',
            '".$datos['NACHN']."',
            '".$datos['VORNA']."',
            '".$datos['KNZNM']."',
            '".$datos['ANRED']."',
            '".$datos['GESCH']."',
            '".$datos['GBDAT']."',
            '".$datos['GBLND']."',
            '".$datos['GBDEP']."',
            '".$datos['GBORT']."',
            '".$datos['NATIO']."',
            '".$datos['SPRSL']."',
            '".$datos['FAMST']."',
            '".$datos['FAMDT']."',
            '".$datos['ANZKD']."',
            '".$datos['GBJHR']."',
            '".$datos['GBMON']."',
            '".$datos['GBTAG']."',
            '".$datos['NCHMC']."',
            '".$datos['VNAMC']."'
            )";

        $Insertar = parent::nonQuery($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    private function Insertar0021($datos)
    {
        $query = "insert Into inf_0021
            (
                PERNR,
                FAMSA,
                FGBDT,
                FAVOR,
                FANAM,
                ENAME
                )
        value
        (
            '".$datos['PERNR']."',
            '".$datos['FAMSA']."',
            '".$datos['FGBDT']."',
            '".$datos['FAVOR']."',
            '".$datos['FANAM']."',
            '".$datos['ENAME']."'
            )";

        $Insertar = parent::nonQuery($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    private function Insertar0032($datos)
    {
        $query = "insert Into inf_0032
            (
                MANDT,
                PERNR,
                ENDDA,
                BEGDA,
                AEDTM,
                UNAME,
                WAERS,
                ZZNUMEDF
              
                )
        value
        (
            '".$datos['MANDT']."',
            '".$datos['PERNR']."',
            '".$datos['ENDDA']."',
            '".$datos['BEGDA']."',
            '".$datos['AEDTM']."',
            '".$datos['UNAME']."',
            '".$datos['WAERS']."',
            '".$datos['ZZNUMEDF']."'
            )";

        $Insertar = parent::nonQuery($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    private function Insertar0167($datos)
    {
        $query = "insert Into inf_0167
            (
                PERNR,
                BAREA,
                PLTYP,
                BPLAN,
                BOPTI,
                DEPCV              
                )
        value
        (
            '".$datos['PERNR']."',
            '".$datos['BAREA']."',
            '".$datos['PLTYP']."',
            '".$datos['BPLAN']."',
            '".$datos['BOPTI']."',
            '".$datos['DEPCV']."'
            )";

        $Insertar = parent::nonQuery($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    private function Insertar0168($datos)
    {
        $query = "insert Into inf_0168
            (
                PERNR,
                SUBTY,
                ENDDA,
                BEGDA,
                AEDTM,
                UNAME,
                BAREA,
                PLTYP,
                BPLAN,
                ELIDT,
                BCOVR,
                ENRTY,
                DTY01,
                BPT01
              
                )
        value
        (
            '".$datos['PERNR']."',
            '".$datos['SUBTY']."',
            '".$datos['ENDDA']."',
            '".$datos['BEGDA']."',
            '".$datos['AEDTM']."',
            '".$datos['UNAME']."',
            '".$datos['BAREA']."',
            '".$datos['PLTYP']."',
            '".$datos['BPLAN']."',
            '".$datos['ELIDT']."',
            '".$datos['BCOVR']."',
            '".$datos['ENRTY']."',
            '".$datos['DTY01']."',
            '".$datos['BPT01']."'
            )";

        $Insertar = parent::nonQuery($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    private function Insertar0169($datos)
    {
        $query = "insert Into inf_0169
            (
                PERNR,
                SUBTY,
                ENDDA,
                BEGDA,
                AEDTM,
                UNAME,
                BAREA,
                PLTYP,
                BPLAN,
                ELIDT,
                ENRTY,
                PERIO,
                PTPCT,
                PSTTX 
                )
        value
        (
            '".$datos['PERNR']."',
            '".$datos['SUBTY']."',
            '".$datos['ENDDA']."',
            '".$datos['BEGDA']."',
            '".$datos['AEDTM']."',
            '".$datos['UNAME']."',
            '".$datos['BAREA']."',
            '".$datos['PLTYP']."',
            '".$datos['BPLAN']."',
            '".$datos['ELIDT']."',
            '".$datos['ENRTY']."',
            '".$datos['PERIO']."',
            '".$datos['PTPCT']."',
            '".$datos['PSTTX']."'
            )";

        $Insertar = parent::nonQuery($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    private function Insertar0171($datos)
    {
        $query = "insert Into inf_0171
            (
                PERNR,
                ENDDA,
                BEGDA,
                BAREA,
                BENGR,
                BSTAT
              
                )
        value
        (
            '".$datos['PERNR']."',
            '".$datos['ENDDA']."',
            '".$datos['BEGDA']."',
            '".$datos['BAREA']."',
            '".$datos['BENGR']."',
            '".$datos['BSTAT']."'
            )";

        $Insertar = parent::nonQuery($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    private function actualizarToken($tokenId)
    {
        $date = date('Y-m-d H:i');
        $query = "update dg_empleado_token set date = '$date' where empleadoTokenId = '$tokenId'";
        $resp = parent::nonQuery($query);

        if ($resp >= 1) {
            return $resp;
        } else {
            return 0;
        }
    }
}
