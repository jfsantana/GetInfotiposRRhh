<?php
/**
* Clase para consumir API Rest
* Las operaciones soportadas son:.
*
* 	- POST		: Agregar
* 	- GET		: Consultar
* 	- DELETE	: Eliminar
* 	- PUT		: Actualizar
* 	- PATCH		: Actualizar por parte
*
* Extras
* 	- autenticación de acceso básica (Basic Auth)
*  	- Conversor JSON
 *
 * @author     	Jesus Santana
 *
 * @version 	1.0
 */
class API
{
    /**
     * Enviar parámetros a un servidor a través del protocolo HTTP (POST).
     * Se utiliza para agregar datos en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso
     * @param string $TOKEN token de autenticación
     * @param array  $ARRAY parámetros a envíar
     *
     * @return JSON
     */
    public static function POST($URL, $TOKEN, $ARRAY)
    {
        $datapost = '';

        $datapost = $ARRAY; // http_build_query($ARRAY, 'banderas_');

        $username = 'PIUSERWS01';
        $password = 'Pequiven21*';

        $headers = [
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode("$username:$password"),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        // curl_setopt($ch, CURLOPT_HTTPAUTH, 'PIUSERWS01:Pequiven21*');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datapost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // curl_setopt($ch, CURLOPT_USERPWD, 'PIUSERWS01:Pequiven21*');
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * Consultar a un servidor a través del protocolo HTTP (GET).
     * Se utiliza para consultar recursos en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso/(id) no obligatorio
     * @param string $TOKEN token de autenticación
     *
     * @return JSON
     */
    public static function GET($URL, $TOKEN)
    {
        $username = 'PIUSERWS01';
        $password = 'Pequiven21*';
        $headers = [
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode("$username:$password"),
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        // echo $response;die;
        curl_close($ch);

        return $response;
    }

    /**
     * Consultar a un servidor a través del protocolo HTTP (GET).
     * Se utiliza para consultar recursos en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso/(id) no obligatorio
     * @param string $TOKEN token de autenticación
     *
     * @return JSON
     */
    public static function GET1($URL, $TOKEN)
    {
        $username = 'PIUSERWS01';
        $password = 'Pequiven21*';
        $headers = ['Authorization: Bearer '.$TOKEN];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        // echo $response;die;
        curl_close($ch);

        return $response;
    }

    /**
     * Consultar a un servidor a través del protocolo HTTP (DELETE).
     * Se utiliza para eliminar recursos en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso/id
     * @param string $TOKEN token de autenticación
     *
     * @return JSON
     */
    public static function DELETE($URL, $TOKEN)
    {
        $headers = ['Authorization: Bearer '.$TOKEN];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * Enviar parámetros a un servidor a través del protocolo HTTP (PUT).
     * Se utiliza para editar un recurso en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso/id
     * @param string $TOKEN token de autenticación
     * @param array  $ARRAY parámetros a envíar
     *
     * @return JSON
     */
    public static function PUT($URL, $TOKEN, $ARRAY)
    {
        $datapost = '';
        foreach ($ARRAY as $key => $value) {
            $datapost .= $key.'='.$value.'&';
        }
        //  $datapost = http_build_query($ARRAY);

        $headers = ['Authorization: Bearer '.$TOKEN];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datapost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * Enviar parámetros a un servidor a través del protocolo HTTP (PATCH).
     * Se utiliza para editar un atributo específico (recurso) en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso/id
     * @param string $TOKEN token de autenticación
     * @param array  $ARRAY parametros parámetros a envíar
     *
     * @return JSON
     */
    public static function PATCH($URL, $TOKEN, $ARRAY)
    {
        $datapost = '';
        foreach ($ARRAY as $key => $value) {
            $datapost .= $key.'='.$value.'&';
        }

        $headers = ['Authorization: Bearer '.$TOKEN];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datapost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * Convertir JSON a un ARRAY.
     *
     * @param json $json Formato JSON
     *
     * @return array
     */
    public static function JSON_TO_ARRAY($jsone)
    {
        // echo($jsone);
        return json_decode("$jsone", true);
    }
}
