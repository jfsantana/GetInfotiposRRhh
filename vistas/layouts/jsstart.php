

<script src="public/Dashboard%20-%20SB%20Admin_files/bootstrap.js" crossorigin="anonymous"></script>
<script src="public/Dashboard%20-%20SB%20Admin_files/scripts.js"></script>
<script src="public/Dashboard%20-%20SB%20Admin_files/simple-datatableslatest" crossorigin="anonymous"></script>
<script src="public/Dashboard%20-%20SB%20Admin_files/datatables-simple-demo.js"></script>

<script src="public/plugins/alertifyjs/alertify.js"></script>
 
<script src="./public/plugins/input-mask/dist/inputmask.js" type="text/javascript"></script>

<!--  **********    VALIDACIONES BLOQUEO DE TECLADO NUMEROS Y LETRAS    **************************       --> 
<script src="public/javascriptvalidaciones/jquery.js" type="text/javascript"></script>
<script src="public/javascriptvalidaciones/jquery-1.js" type="text/javascript"></script>
<script src="public/javascriptvalidaciones/jquery.min.js"></script> 



<!--  **********    PARA QUE FUNCIONE EL CHOSEN  **************************      -->

<script src="public/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script> <!-- FUNDAMENTAL -->
<script src="public/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="public/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
<script src="public/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script> 


<!--  **********    ACTUALIZAR AREA EN GERENCIA  **************************      -->


<script type="text/javascript">     
function actualizaactivo() {
    var x = document.getElementById("act_usu").value;
    document.getElementById("actselec").value = x;
}

function actualizarol() {
    var x = document.getElementById("rol_usu").value;
    document.getElementById("rolselec").value = x;
}
function actualizacomplejo() {
    var x = document.getElementById("com_usu").value;
    document.getElementById("comselec").value = x;
}

function actualizagerencia() {
    var x = document.getElementById("ger_usu").value;
    document.getElementById("gerselec").value = x;
}
function actualizaarea() {
    var x = document.getElementById("are_usu").value;
    document.getElementById("areselec").value = x;
}

function llena_area() {
  var ger_usu = $("#ger_usu").val();
  $.post("funciones/funcionesGenerales/llenarDatosAjax.php", {
      ger_usu: ger_usu, accion1: 'llenar_combo_area'
      
  }, function (data) {      
      //alert(data);
      $("#are_usu").chosen();
      $("#are_usu").empty();
      $("#are_usu").html(data);
      $("#are_usu").trigger("chosen:updated");  
  });
}

function atras(){    
    setTimeout(window.close, 0);
}
</script>  

<script type="text/javascript">
  function printDiv(nombreDiv) {
      var contenido= document.getElementById(nombreDiv).innerHTML;
      var contenidoOriginal= document.body.innerHTML;
      document.body.innerHTML = contenido;
      window.print();
      document.body.innerHTML = contenidoOriginal;
  }
</script>


<script type="text/javascript">     
  function crear_usuario(){    
    eval("document.location='dashboard.php?activo=usuario&bandera=1'");	
  }

  function crear_obra(){    
    eval("document.location='dashboard.php?activo=labor&bandera=1'");	
  }
  function guardar_Clasificacion(){
    var id_clasificacion = $("#id_clasificacion").val();
    $.post("funciones/llenarDatosAjax.php", {
        id_clasificacion: id_clasificacion, accion1: 'llenar_combo_clasificacion'
        
    }, function (data) {        
        $("#clasificacionSeleccionada").val(data);
    });      
  }  
  function llamar_filtro(){
    var activo0= document.getElementById("activo0").value;
    eval("document.location='dashboard.php?activo=admon_usu&filtro="+activo0+"'");	
  }

  function llamar_filtroRegistrados(){ 
    var activo0= document.getElementById("activo0").value;   
    eval("document.location='dashboard.php?activo=validaAspirante&filtro="+activo0+"'");	
  }

  function llamar_filtroSalud(){
    var activo0= document.getElementById("activo0").value;   
    eval("document.location='dashboard.php?activo=RevisaSalud&filtro="+activo0+"'");	
  }

  function llamar_filtroCreados(){
    var activo0= document.getElementById("activo0").value;   
    eval("document.location='dashboard.php?activo=admonObra&filtro="+activo0+"'");	
  }
  
  function admonRegistrados(){ 
    var activo0= document.getElementById("activo0").value;   
    eval("document.location='dashboard.php?activo=admonAspirante&filtro="+activo0+"'");	
  }

  function actualiza_municipio() {
    var id_estado = $("#id_estado").val();
    $.post("funciones/llenarDatosAjax.php", {
        id_estado: id_estado, accion1: 'llenar_combo_municipio'          
    }, function (data) {      
    // alert(data);
        $("#id_municipio").chosen();
        $("#id_municipio").empty();
        $("#id_municipio").html(data);
        $("#id_municipio").trigger("chosen:updated");    
    });
  }

  function actualiza_municipio_oficio() {
    var id_estado = $("#experiencia_estado_oficio").val();

    $.post("funciones/llenarDatosAjax.php", {
        id_estado: id_estado, accion1: 'llenar_combo_municipio'          
    }, function (data) {      
    // alert(data);
        $("#experiencia_municipio_oficio").chosen();
        $("#experiencia_municipio_oficio").empty();
        $("#experiencia_municipio_oficio").html(data);
        $("#experiencia_municipio_oficio").trigger("chosen:updated");    
    });
  }

  function actualiza_parroquia() {
    var id_municipio = $("#id_municipio").val();
    $.post("funciones/llenarDatosAjax.php", {
        id_municipio: id_municipio, accion1: 'llenar_combo_parroquia'
        
    }, function (data) {      
    // alert(data);
        $("#id_parroquia").chosen();
        $("#id_parroquia").empty();
        $("#id_parroquia").html(data);
        $("#id_parroquia").trigger("chosen:updated");    
    });
  }
</script>      
 
<!-- FUNCION PARA MAYUSCULAS   *********   -->

<script>
  function conMayusculas(field) {
    field.value = field.value.toUpperCase();
  }
</script>


<!--  **********    VALIDACIONES BLOQUEO DE TECLADO NUMEROS Y LETRAS    **************************       --> 

<script languaje="javascript">
  function ValidateEmail(inputText)   {
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(inputText.value.match(mailformat)) {                   
        //  alert("Valid email address!");
        document.form1.cor_usu.focus();
        return true;
    }
    else {
      alert("Correo Inválido!");
      document.form1.cor_usu.focus();
      return false;
    }
  }
</script>

<script languaje="javascript">
  function validarNumero(inputText) {
    $nombre = document.querySelector("#cantidad_Obra");
    edad=inputText.value;
    if (isNaN(edad)==true || /^[1-9]\d$/.test(edad)==false ) {
      alert ('Cantidad NO válida'); 
      $nombre.focus();
    }
  }
</script>

<script src="public/javascriptvalidaciones/validCampoFranz.js"></script>

<script type="text/javascript">
  $(function(){
    //Para escribir solo letras
    $('#aspirante_nombre').validCampoFranz('abcdefghijklmnñopqrstuvwxyzáéíóú ');       
    //Para escribir solo numeros    
    $('#aspirante_ced').validCampoFranz('0123456789');    
    $('#aspirante_telcelular').validCampoFranz('0123456789'); 
    $('#aspirante_telcantv').validCampoFranz('0123456789');  
    $('#cantidad_Obra').validCampoFranz('0123456789');    
  });
</script> 

<script src="public/js/funciones_campos.js"></script> 

<!--  **********    FIN DE VALIDACIONES **************************       --> 


<!--  FUNCIONES PARA ENVIAR VERIFICACION DE REGISTROS   --->

<script language="javascript">      
  function enviaraVerificacion(labor_codigo_m){
    //var labor_codigo_m='<?php echo $labor_codigo_m; ?>';
    alertify.confirm('Enviar a Verificar', 'Esta seguro de enviar la Labor Código Nro.: '+labor_codigo_m+'?',function () { enviaraVerificacion2(labor_codigo_m); }, function () { alertify.error('Se cancelo la Aprobación') }).set('labels', { ok: 'Sí', cancel: 'No' });
  }

  function enviaraVerificacion2(labor_codigo_m){
    var labor='<?php echo $labor; ?>';
    var bandera='<?php echo $bandera; ?>';
    var datos= {labor_codigo_m: labor_codigo_m}
    $.ajax({
      type: "POST",
      url: "funciones/enviaraVerificar.php",
      data: datos,
      success: function (r) {        
        if ( r == "1") {      
          // eval("document.location='dashboard.php?activo=preseleccionados&bandera=7'");
          window.location.replace("dashboard.php?activo=preseleccionados&bandera=2&labor=2&labor_codigo="+labor_codigo_m);
        }
        else {
          alert("Error al Verificar solicitante " +"#"+r+"#");
        }
      }
    });     
  }

  function ver_postulados(labor_codigo){    
    window.open("funciones/llamaPlanilla.php?labor_codigo="+labor_codigo, "Planilla Solicitud" , "width=+screen.width,height=+screen.height,scrollbars=YES")	
  }
</script>

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

<!-- *****************     VERIFICACION POR PCP Y SALUD   *****************************+  ---->

<script type="text/javascript">

  function verificarPCP(aspirante_cedula_m){    
    var datos= {aspirante_cedula_m: aspirante_cedula_m,bandera:'verificarPCP'}    
    $.ajax({
      type: "POST",
      url: "funciones/editarSolicitud.php",
      data: datos,
      success: function (r) { 
        if ( r ==1) {      
          alert("El Registro de la cédula Nro. "+aspirante_cedula_m+" ha sido Verificado Satisfactoriamente");
          eval("document.location='dashboard.php?activo=validaAspirante&filtro=POR VALIDAR'");
        }
        else {
          alert("Error al Verificar Aspirante " +r);

        }
      }
    });
  }

  function verificarPCPNoElegible(aspirante_cedula_m){
    var datos= {aspirante_cedula_m: aspirante_cedula_m,bandera:'verificarPCPNoElegible'}
    $.ajax({
      type: "POST",
      url: "funciones/editarSolicitud.php",
      data: datos,
      success: function (r) {
        if ( r ==1) {      
          alert("El Registro de la cédula Nro. "+aspirante_cedula_m+" ha sido modificado a NO Elegible");
          eval("document.location='dashboard.php?activo=validaAspirante&filtro=POR VALIDAR'");       
        }
        else {
          alert("Error al Verificar solicitante " +"#"+r+"#");
        }
      }
    });
  }

  function verificarSalud(aspirante_cedula_m){
    var datos= {aspirante_cedula_m: aspirante_cedula_m,bandera:'verificarSalud'}
    $.ajax({
      type: "POST",
      url: "funciones/editarSolicitud.php",
      data: datos,
      success: function (r) {        
        if ( r ==1) {      
          alert("El Registro de la cédula Nro. "+aspirante_cedula_m+" ha sido Verificado Satisfactoriamente");
          eval("document.location='dashboard.php?activo=RevisaSalud&filtro=POR VALIDAR'");
        }
        else {
          alert("Error al Verificar solicitante " +"#"+r+"#");
        }
      }
    });
  }

  function verificarSaludNoElegible(aspirante_cedula_m){
    var datos= {aspirante_cedula_m: aspirante_cedula_m,bandera:'verificarSaludNoElegible'}
    $.ajax({
      type: "POST",
      url: "funciones/editarSolicitud.php",
      data: datos,
      success: function (r) {
        if ( r ==1) {      
          alert("El Registro de la cédula Nro. "+aspirante_cedula_m+" ha sido modificado a NO Elegible");
          eval("document.location='dashboard.php?activo=RevisaSalud&filtro=POR VALIDAR'");       
        }
        else {
          alert("Error al Verificar solicitante " +"#"+r+"#");
        }
      }
    });
  }

</script>

<script language="javascript">      
  function actualizarEstatus(estatus){
    var labor_codigo_m='<?php echo $labor_codigo_m; ?>';
    var labor_status_m='<?php echo $labor_status_m; ?>';

    if (labor_status_m==estatus){
      alertify.alert('Actualición de Estatus','Es el mismo estatus: '+labor_status_m).set('label', 'Aceptar');     	 
    }
    else {
      alertify.confirm('Actualizar Estatus', 'Esta seguro que desea Actualizar el Estatus del Código de Labor Nro.: '+labor_codigo_m+' con Estatus: '+labor_status_m+' al Nuevo Estatus: '+estatus+'?',function () { cambiarStatus(labor_codigo_m,labor_status_m,estatus); }, function () { alertify.error('Se cancelo la Aprobación') }).set('labels', { ok: 'Sí', cancel: 'No' });
    }
  }

  function cambiarStatus(labor_codigo_m,labor_status_m,estatus){  
    var datos= {labor_codigo_m: labor_codigo_m, labor_status_m: labor_status_m, estatus: estatus, bandera:'actualizarStatusLabor'}
    $.ajax({
      type: "POST",
      url: "funciones/editarSolicitud.php",
      data: datos,
      success: function (r) {  
        if ( r>1) {
          //console.warn('Valor R: ' + r); 
          //location.reload();
            eval("document.location='dashboard.php?activo=labor&bandera=2&labor_codigo="+labor_codigo_m+"'");	              
         // alert("Pasó: "+r);
        }
        else {
          //console.warn('Valor R: ' + r); 
          alert("Error al Actualizar el Estatus"+r);        
        }
      }
    });  

  //  alertify.alert('Actualición de Estatus','Modificado el Código Nro.: '+labor_codigo_m+' al Nuevo Estatus: '+estatus).set('label', 'Aceptar');     	     
  }

</script>

