# GetInfotiposRRhh
Desarrollo que exporta los Infotipos de SAp a tablas Mysql

El objetivo de esta aplicación es extraer los datos de los Infotipos de SAP a una base de datos que pueda ser consultada por los usuarios de la Gerencia de Gestión Humana a través de la herramienta LUMIRA.

LA BASE DE DATOS 

Nombre de la Base de datos>	RRHH_INFOTIPOS


Stores Procedures

Debido a la gran cantidad de registros que se insertaran en cada actualización, la mejor estrategia es realizar la carga a través de Stores Procedures para que el servidor de Base de datos reciba parte del procesamiento de la información.

SERVICIO

Toda la extracción de la información se hace a través de un servicio desarrollado en PHP, el cual se conecta a SAP a través de un servicio : http://pqvmorsap03.pqv.com:50000/RESTAdapter/SobrePago/getDatos_INFOTIPOS
que usa el método POST, y se le envían los siguientes parámetros (JSON)
{"FECHA_INI": "2020-01-01", "INFOTIPO": "0171"}



Llamada Del Servicio
Para llamar el servicio de extracción se realiza a través de la siguiente dirección 
http://localhost/RRHH/vistas/administracion/infotipoData
Este servicio se llama por el método POST y recibe un único valor FECHA_INI

Respuesta Del Servicio
[
   {
      "status":"OK",
      "fechaSolicitada":"2017-01-01",
      "result":{
         "Infotipo":"INF_0002",
         "MSG":"Actualizado Correctamente",
         "TotalRow":6808
      }
   },
   {
      "status":"OK",
      "fechaSolicitada":"2017-01-01",
      "result":{
         "Infotipo":"INF_0032",
         "MSG":"Actualizado Correctamente",
         "TotalRow":12222
      }
   },
   {
      "status":"OK",
      "fechaSolicitada":"2017-01-01",
      "result":{
         "Infotipo":"INF_0167",
         "MSG":"Actualizado Correctamente",
         "TotalRow":53415
      }
   },
   {
      "status":"OK",
      "fechaSolicitada":"2017-01-01",
      "result":{
         "Infotipo":"INF_0168",
         "MSG":"Actualizado Correctamente",
         "TotalRow":18245
      }
   },
   {
      "status":"OK",
      "fechaSolicitada":"2017-01-01",
      "result":{
         "Infotipo":"INF_0169",
         "MSG":"Actualizado Correctamente",
         "TotalRow":13368
      }
   },
   {
      "status":"OK",
      "fechaSolicitada":"2017-01-01",
      "result":{
         "Infotipo":"INF_0171",
         "MSG":"Actualizado Correctamente",
         "TotalRow":4565
      }
   }
]
