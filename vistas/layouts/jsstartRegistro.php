

<!--  **********    SCRIPTS SOLO PARA REGISTRO DETALLESDE EXPERIENCIA    **************************       --> 




<script src="public/Dashboard%20-%20SB%20Admin_files/datatables-simple-demo.js"></script>

<script>
  function limpiarespacios() {
      var inputs = $("input[type=text]");
    for(var i = 0; i < inputs.length; i++){
    var aux = $(inputs[i]).val().trim();
    $(inputs[i]).val(aux);
    }
  }
    window.addEventListener("load", function(event) {
      limpiarespacios();
    });
</script>

<script language="javascript">

  // funcion que valida fecha de nacimiento 
  function validar_fecha_nacimiento(valor){

    var impedimento= "1900-01-01";
    var fecha=valor;

    function addZero(i) {
      if (i < 10) {
          i = "0" + i;
      }
      return i;
    }
    var d = new Date();
    var day = addZero(d.getDate());
    var month = addZero(d.getMonth()+1);
    var year = addZero(d.getFullYear());
    fechaactual= year + "-" + month + "-" + day;    

    var mes_fechaNac = fecha.slice(5,7);
    var dia_fechaNac = fecha.slice(-2); 

    var dato = fecha.slice(0,4);
    var edad_persona =  year - dato; 
      
    if (fecha>=fechaactual || fecha < impedimento  || fecha=="") {    
      return false;  
    }
    else{
      return true;    
    }
  }

  function validar_correo(valor){

  var expresion_correo = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

  if (!expresion_correo.test(valor)) {
    return false;
  }else{
      return true;
  }
}

function validar_fecha_hasta_experiancia_laboral(fechaDesde , fechaHasta){
  var dato1 = fechaDesde;
  var dato2 =  fechaHasta;

  function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
  }
  var d = new Date();
  var day = addZero(d.getDate());
  var month = addZero(d.getMonth()+1);
  var year = addZero(d.getFullYear());
  fechaactual= year + "-" + month + "-" + day;


  if (dato2>fechaactual || dato2<=dato1) {

    return false;

  }else{

    return true;
  }

}

function fileValidation(){

    var fileInput = document.getElementById('archivo');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg)$/i;
    if(!allowedExtensions.exec(filePath)){
        
        fileInput.value = '';
        return false;
      }else{
        return true;
      }
}

function guardar() {  
  // limpiarespacios();
  var permite =1;

  //validando fecha 

  var valor = $("#aspirante_fechNac").val();
  var proceso =  validar_fecha_nacimiento(valor);

  if (!proceso) {
    permite=0;
    alertify.error("¡ERROR! Debe ingresar una fecha correcta");
  }
  //--------------------

  if ($("#aspirante_ced").val()==""){
      permite =0;
      alertify.error("¡ERROR! Debe ingresar  su  cedula.");
  }
  
  if ($("#aspirante_nombre").val()==""){
    permite =0;
    alertify.error("¡ERROR! Debe ingresar su nombre y su apellido");
  }  

  if ($("#aspirante_edad").val()==""){
    permite =0;
    alertify.error("¡ERROR! Debe Campo edad se encuentra vacio o su edad no esta dentro de los limites permitidos");
  }
  else{
    if ($("#aspirante_edad").val()<=0){
      permite =0;
      alertify.error("¡ERROR! El dato ingresado es incorrecto en el campo edad");
    }
    else{
      if ($("#aspirante_edad").val()<=17) {
        permite =0;
        alertify.error("¡ERROR! El dato ingresado es incorrecto en el campo edad");        
      }
    }
  }

  if ($("#aspirante_sexo").val()==0){
      permite =0;
      alertify.error("¡ERROR! seleccione el tipo de sexo");    
  }

  if ($("#aspirante_telcelular").val()==""){
    permite =0;
    alertify.error("¡ERROR! Debe ingresar su numero telefonico");
  }

  if ($("#aspirante_telcantv").val()==""){
    permite =0;
    alertify.error("¡ERROR! Debe ingresar su numero telefonico");
  }


  if ($("#aspirante_correo").val()==""){
    permite =0;
    alertify.error("¡ERROR! Debe ingresar su correo electronico");
  }
  else{
    var operacion  = validar_correo($("#aspirante_correo").val());    
    if (!operacion) {
      permite =0;
      alertify.error("¡ERROR! Correo ingresado es incorrecto");        
    }
  }

  if ($("#id_estado").val()==0){
    permite =0;
    alertify.error("¡ERROR! Debe seleccione un estado");
  }

  if ($("#id_municipio").val()==0){
    permite =0;
    alertify.error("¡ERROR! Debe seleccione un municipio");
  }
  
  if ($("#id_parroquia").val()==0){
    permite =0;
    alertify.error("¡ERROR! Debe seleccione una parroquia");
  }   

  if ($("#id_nivelAcademico").val()==0){
    permite =0;
    alertify.error("¡ERROR! Debe seleccione su nevel academico");
  }

  if ($("#id_clasificacion").val()==0){
    permite =0;
    alertify.error("¡ERROR! Debe seleccione clasificacion de oficio");
  } 

   // comienza la validacion de la tabla de Experiencia Laboral
   if ($("#experiencia_lugar_oficio").val()==""){
    permite =0;
    alertify.error("¡ERROR! Campo UBICACIÓN ");
  } 

  if ($("#experiencia_ente_o_empresa").val()==""){
    permite =0;
    alertify.error("¡ERROR! Campo ENTE O EMPRESA");
  } 

//validando fecha experiencia laboral en el campo "desde"
  var valor2 = $("#experiencia_fecha_desde").val();
  var proceso2 =  validar_fecha_nacimiento(valor2);

  if (!proceso2) {
    permite=0;
    alertify.error("¡ERROR! FECHA DESDE en experiencia laboral incorrecta");
  }

  //validando fecha experiencia laboral en el campo "hasta"

  var valor3 = $("#experiencia_fecha_desde").val();
  var valor4 = $("#experiencia_fecha_hasta").val();
  var proceso3 =  validar_fecha_hasta_experiancia_laboral(valor3 , valor4);
  if (!proceso3) {
    permite=0;
    alertify.error("¡ERROR! FECHA HASTA en experiencia laboral incorrecta");
  }

  //--------------------
  var archivos = $("#archivo").val();
  if (archivos == "") {
    permite=0;
    alertify.error("¡ERROR! Debe adjuntar soportes ");
  }
  else{
    var tipo_archivo = fileValidation();
    if (tipo_archivo == false) {
      permite=0;
      alertify.error("¡ERROR! el archivo debe ser JPG");  
    }
  }

   if ($("#archivo")[0].files.length > 1) { 
      permite=0;
      alertify.error("¡ERROR! Solo debe subir un archivo ");
    }  
 
  if (permite ==1) {  
    var fd = new FormData(document.getElementById("form2"));
    $.ajax({
      type: "POST",
      url: "funciones/guardaSolicitud.php",
      data: fd,
      processData: false,  // tell jQuery not to process the data
      contentType: false,
      success: function (r) {
	   // alert("R es: "+r);
        if (r == false ) {
          alert("ERROR: Por Favor Revise los datos de su Formulario ");  
        } 
        else {
          if(r != ''){
            alert("Su registro se ha realizado con éxito")
            window.location.replace("dashboard.php?activo=registrar&bandera=2&aspirante_cedula="+r); 
          }        
        }
      }
    }); 
  }
}
  
  function calculo_de_edad(){     
    var fechaNacimiento=$(aspirante_fechNac).val();
    let fechaNac = new Date(fechaNacimiento);
    var aspirante_edad=0;
       
    var d = new Date();
    var day = d.getDate();
    var month = d.getMonth()+1;
    var year = d.getFullYear();     

    anio_fechaNac=fechaNac.getFullYear();
    mes_fechaNac =fechaNac.getMonth()+1;
    dia_fechaNac =fechaNac.getDate();

    aspirante_edad=year-anio_fechaNac;
    
    if (month < mes_fechaNac){
    aspirante_edad--;
    }
    else if ((month==mes_fechaNac) && (day < dia_fechaNac) ) {
    aspirante_edad--;
    }

    if (aspirante_edad<=0  ||  aspirante_edad>=70 ||  aspirante_edad<=17) {
      document.getElementById("aspirante_edad").value ="";
      
    }else{
      document.getElementById("aspirante_edad").value = aspirante_edad;
    }      
  }
</script>



