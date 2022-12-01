
var message="";
//quita menu contextual
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

//document.oncontextmenu=new Function("return false");
////

function prueba_evento(valor){
	alert("dato="+valor);	
}
	function numFormat(numero,dec)
	{
		aux = String(numero);
		if (aux.indexOf(',')!=-1){
		    numero = redondear(Number(str_replace(',','.',str_replace('.','',String(numero)))),dec);
		}else{
			numero = redondear(Number(String(numero)),dec);
		}
		
		var num = numero, signo=3, expr;
		var cad = ""+numero;
		var ceros = "", pos, pdec, i;
		for (i=0; i < dec; i++)
			ceros += '0';
		pos = cad.indexOf('.')
		if (pos < 0)
			cad = cad+"."+ceros;
		else
		{
			pdec = cad.length - pos -1;
			if (pdec <= dec)
			{
				for (i=0; i< (dec-pdec); i++)
				cad += '0';
			}
			else
			{
				/*num = num*Math.pow(10, dec);
				num = Math.round(num);
				num = num/Math.pow(10, dec);*/
				num = new String(num);
				aux_num=num.split('.');				
				num=aux_num[0]+'.'+aux_num[1][0]+aux_num[1][1];
				cad = new String(num);
			}
		}
		pos = cad.indexOf('.')
		if (pos < 0) pos = cad.lentgh
		if (cad.substr(0,1)=='-' || cad.substr(0,1) == '+')
		signo = 4;
		if (pos > signo)
		do{
		expr = /([+-]?\d)(\d{3}[\.\,]\d*)/
		cad.match(expr)
		cad=cad.replace(expr, RegExp.$1+','+RegExp.$2)
		}
		while (cad.indexOf(',') > signo)
		if (dec<0) cad = redondear(cad.replace(/\./,''),dec);
		//alert(cad);
		cad=str_replace("undefined","",str_replace(",",".",cad.split('.')[0])+","+cad.split('.')[1]);
		return cad;
	}
	
	function _abrirVentana()
	{

		document.getElementById("capaFondo").style.visibility="visible";
		document.getElementById("capaVentana").style.visibility="visible";
		
	}
	
	function _cerrarVentana()
	{
		document.getElementById("capaFondo").style.visibility="hidden";
		document.getElementById("capaVentana").style.visibility="hidden";
		
	}
function redondear(cantidad, decimales) {
		var cantidad = parseFloat(cantidad);
		var decimales = parseFloat(decimales);
		decimales = (!decimales ? 2 : decimales);
		return Math.round(cantidad * Math.pow(10, decimales)) / Math.pow(10, decimales);
	} 
function isset(variable_name) {
    try {		 
         if (typeof(eval(document.getElementById(variable_name))) != 'undefined')
         if (eval(document.getElementById(variable_name)) != null)
         return true;
     } catch(e) { }
    return false;
 } 
function foco(idobj){//#5
  if(isset(idobj)){
	var destino =     document.getElementById(idobj);  
	var inputFields = document.getElementsByTagName('INPUT'); 
	var selectBoxes = document.getElementsByTagName('SELECT'); 
	var textareas =   document.getElementsByTagName('TEXTAREA');
	var inputs = new Array();
	for(i=0;i<inputFields.length;i++){
		if(inputFields[i].type!='button'&&
           inputFields[i].type!='submit'&&
		   inputFields[i].type!='reset'&&
		   inputFields[i].type!='checkbox'){
		   inputs[inputs.length] = inputFields[i];
			}
	}
	for(i=0;i<selectBoxes.length;i++){inputs[inputs.length] = selectBoxes[i];}
	for(i=0;i<textareas.length;i++){inputs[inputs.length] = textareas[i];}
	for(i=0;i<inputs.length;i++){ 
		inputs[i].style.backgroundImage="";
		inputs[i].style.backgroundColor = '#FFFFFF';
		inputs[i].style.border = '1px solid #cccccc';
		if(inputs[i].type!='hidden'){
			inputs[i].value=Mayusculas(inputs[i].value);
			
			if(inputs[i].getAttribute('tipo')=='moneda'){ 
				inputs[i].value =numFormat(inputs[i].value,2);
			}
		}
	}
		   if(destino.type!='button'&&destino.type!='submit'&&destino!='reset'){
		     if(destino.type=='text'||destino.type=='password')
			     destino.style.backgroundImage="url(http://"+SERVIDOR_+"/Y.O.B/presupuesto/img/texbox.gif)";
				 destino.style.backgroundColor = '#EEF1F1';
				 destino.style.border = '1px solid #000000';
			}
		   if(isNumberFloat(idobj) && destino.value.indexOf(',')!=-1){ 
		   		destino.value=str2Number(idobj);
				if(destino.value==0){
					destino.value='';
				}
				//destino.select();
			}
		   destino.focus();
	 
	}else{ setTimeout('foco("'+idobj+'")',10); }	   
}




function isNumberFloat(idString)
{
  return (!isNaN(parseFloat(str2Number(idString)))) ? true : false;
}


function str2Number(numero){

	if (valor(numero).indexOf(',')!=-1){
		
		return Number(str_replace(',','.',str_replace('.','',valor(numero))));
		    
	}else{
		
		return Number(valor(numero));
	}
		
	 
}	
function valor(id){
	return document.getElementById(id).value;
}	
function asigna(id_destino,valor){
	document.getElementById(id_destino).value=valor;
}	
//////////////////////////menu expan////////////
function expandit(curobj){
if(document.getElementById(curobj)){
  folder=document.getElementById(curobj).style;
  }else{
	if(ns6==1||(agtbrw.indexOf('opera')!=-1)){
		folder=curobj.nextSibling.nextSibling.style;
	}else{
		folder=document.all[curobj.sourceIndex+1].style;
	}
   }
if (folder.display=="none"){
	folder.display="";
}else{
	folder.display="none";}
}

////////////////////fin menu expan////////////////////

function conMayusculas(field) {
            field.value = field.value.toUpperCase()
}



var nav4 = window.Event ? true : false;
function soloNum(evt){
	var key = nav4 ? evt.which : evt.keyCode;

	return (key <= 13 || (key >= 48 && key <= 57));
}
function val_caracter(evt){
	var key = nav4 ? evt.which : evt.keyCode;
//alert(key);
	return (key!=45&&key!=39);
}
function soloLetras(evt){
	var key = nav4 ? evt.which : evt.keyCode;
	return (key==32||key <= 13 || (key >= 65 && key <= 90)||(key >= 97 && key <= 122) || key == 32);
}
function letrasNumeros(evt){
	var key = nav4 ? evt.which : evt.keyCode;
	return (key==32||key <= 13 || (key >= 65 && key <= 90)||(key >= 97 && key <= 122) || key == 32) ||(key <= 13 || (key >= 48 && key <= 57) && (key >= 165 && key <= 166));
}

function soloDecimal(evt,id_campo){
	var key = nav4 ? evt.which : evt.keyCode;
	cadena=document.getElementById(id_campo).value;	
	if ((cadena.length== 0 || checkForCharacters(cadena, '.') != -1 )&& key ==46 ){ return false; }
	return (key <= 13 || (key >= 48 && key <= 57)|| key==46);
}

function validarformula(evt){	
	var key = nav4 ? evt.which : evt.keyCode;
	alert('entro');
}

function checkForCharacters(inputString, checkString, startingIndex)
{
  if (!startingIndex) startingIndex = 0;
  return inputString.indexOf(checkString);
}
function valida(){ // requerido=" label", opcional(tamanio="tamaño")    
	var inputFields = document.getElementsByTagName('INPUT'); 
	var selectBoxes = document.getElementsByTagName('SELECT'); 
	var textareas = document.getElementsByTagName('TEXTAREA');
	var inputs = new Array();
	for(i=0;i<inputFields.length;i++){if(inputFields[i].getAttribute('requerido'))inputs[inputs.length] = inputFields[i];}
	for(i=0;i<selectBoxes.length;i++){if(selectBoxes[i].getAttribute('requerido'))inputs[inputs.length] = selectBoxes[i];}
	for(i=0;i<textareas.length;i++){if(textareas[i].getAttribute('requerido'))inputs[inputs.length] = textareas[i];}
	for(i=0;i<inputs.length;i++){
		msj=inputs[i].getAttribute('requerido')+' es requeri@!\n';
		if(inputs[i].getAttribute('tamanio')){
			tamanio=inputs[i].getAttribute('tamanio');
			msj+='y debe contener al menos \''+ tamanio+'\' caracteres';
		}else tamanio=1;
		if(inputs[i].value.length<tamanio){	
		    alert(msj);		
			foco(inputs[i].id);
			return false;
		}
	}
	return true;
}
function str_replace(inChar,outChar,conversionString)
{
  var convertedString = conversionString.split(inChar);
  convertedString = convertedString.join(outChar);
  return convertedString;
}

function chequeado(idObjet,busqueda,mod) {
	ele=document.getElementById(idObjet);
	 for(i=0;i<ele.length;i++){
		 if (ele[i].type=='checkbox'){
			ele[i].checked=false;}
		}	
  for(i=0; ele=document.getElementById(idObjet).elements[i]; i++){
    if (ele.type=='checkbox'&& ele.value==busqueda){
         ele.checked=true;
		 modo(idObjet,mod);		 
		 }
  }
} 
function desmarcar_todo(idObjet) {
	if(idObjet){
  		for(i=0; ele=document.getElementById(idObjet).elements[i]; i++) 
  		ele.checked=false;
	}else{
		ids=String(document.getElementById('ids').value).split('-');
		for(i=0;i<ids.length;i++){
			document.getElementById(ids[i]).checked=false;
		}
	}
} 
function marcar_todo(idObjet) {	
	if(idObjet){
  		for(i=0; ele=document.getElementById(idObjet).elements[i]; i++) 
  		ele.checked=true;
	}else{
		
		ids=String(document.getElementById('ids').value).split('-');		
		for(i=0;i<ids.length;i++){ 
			document.getElementById(ids[i]).checked=true;
		}
	}
} 
function marcar_hasta(idObjet) {

	ids=String(document.getElementById('ids').value).split('-');
	for(i=0;i<ids.length;i++){
		document.getElementById(ids[i]).checked=true;
		if(ids[i]==idObjet) break;
	}
	i++;
	for(;i<ids.length;i++){
		document.getElementById(ids[i]).checked=false;
	}

} 
function validar_marcado(idObjet) {
 if(idObjet){	
  for(i=0; ele=document.getElementById(idObjet).elements[i]; i++)
    if (ele.type=='checkbox')
      if (ele.checked)
        return true;
 }else{
	 if(document.getElementById('ids').value!=''){
		ids=String(document.getElementById('ids').value).split('-');
		for(i=0;i<ids.length;i++){
			if(document.getElementById(ids[i]).checked)return true;
		}
	 }
 
 }
  return false;
} 

function entrar(){//#9 
	if(!valida())return;
	document.getElementById('login').submit();
}

function salir(){
	if(confirm('Desea usted salir de la aplicación?')){
		redirect('general/logout.php');
	}
}
////////////
function Abrir(carpeta)
{
	ventana=window.open("http://"+SERVIDOR_+"/Y.O.B/"+carpeta+"/inicio.php",carpeta, "scrollbars=yes,toolbar=no,menubar=no,status=no,alwaysRaised=yes,directories =no,location=no,z-lock=yes,top=yes,fullscreen=yes");
	if(navigator.appName!='Netscape'){  
		this.close();
	}else{
		ventana.moveTo(0,0);
		if (document.all) {
			ventana.resizeTo(screen.availWidth,screen.availHeight);
		}
		else if (document.layers||document.getElementById) {
		if (ventana.outerHeight<screen.availHeight||ventana.outerWidth<screen.availWidth){
			ventana.outerHeight = screen.availHeight;
			ventana.outerWidth = screen.availWidth;
		}
		}
	}
	ventana.focus();
}

function redirect(URLStr){ location = URLStr; }

function asigna_cod(cod,objt1,objt2,formulario){
	if(cod!=document.getElementById(objt1).value){
		document.getElementById(objt2).value=document.getElementById(objt1).value;
		document.getElementById(formulario).submit();
	}
}

function ventana(Titulo){
	
	if (!Titulo){Titulo="";}
	x=(screen.width-250)/2;
	y=(screen.height-120)/2;
	msj=window.open("http://"+SERVIDOR_+"/Y.O.B/general/exito.php?id="+Titulo,"Exito", "width=250,height=120,toolbar=no,menubar=no,status=no,alwaysRaised=yes,directories =no,location=no,left="+x+",top="+y);
	
}



function fondo(modo,elemento){
	if(modo=='1'){
		document.getElementById(elemento).style.border = '1px solid #4B8CAF';
		document.getElementById(elemento).style.backgroundImage="url(img/back.gif)";
		document.getElementById(elemento).style.backgroundRepeat="repeat-x";
		document.getElementById(elemento).style.backgroundPosition="left top";
		document.getElementById(elemento).style.backgroundColor="#BCC0CE";
	}else{
		document.getElementById(elemento).style.border = '1px solid #fff';
		document.getElementById(elemento).style.backgroundImage= '';
		document.getElementById(elemento).style.backgroundColor="#ffffff";
	}
	
}


function valida_placa(id,form){//#3
	if(stringLength(document.getElementById(id).value)<6)	
	alert('Debe introducir una Placa Valida');
	else document.getElementById(form).submit();
}
function stringLength(inputString)
{
  return inputString.length;
}
function valida_ci_rif(id,proximo){//#4
	ids=id.split('-');
	band=true;
	msj='Faltan Datos!\n';
	ci_rif=valor(ids[1]);
	if(ci_rif==''||ci_rif.length<6){
		band=false;
		msj+='-Debe ingresar un RIF o un CI\n';
	}else if(ids[3]==0){
		 asigna('actu_ci_rif',valor(ids[1]));
		 asigna('tipo_user_',valor(ids[0]));
		 foco('ext_rif');return;
	}	
	if(valor(ids[2])==''&&band&&ids[3]==1){
		band=false;
		msj+='-Debe ingresar la extencion del rif\n';
	}
	if(band){
		 asigna('actu_ci_rif',valor(ids[1]));
		 asigna('tipo_user_',valor(ids[0]));
		 asigna('ext_rif2',valor(ids[2]));
		 asigna('buscar','si');
		 document.getElementById('actualizar').foco.value=proximo;
		 document.getElementById('actualizar').submit();
	
	}else{
		alert(msj);
	}
}


function mostrar_extencion(curobj, tipo){
	if(document.getElementById(curobj)){
  folder=document.getElementById(curobj).style;
  }else{
	if(ns6==1||(agtbrw.indexOf('opera')!=-1)){
		folder=curobj.nextSibling.nextSibling.style;
	}else{
		folder=document.all[curobj.sourceIndex+1].style;
	}
   }

	folder.display="";
	document.getElementById('ext_rif').value='';
}


function foco_checkbox(idobj){	     
    var inputFields = document.getElementsByTagName('SPAN'); 
	for(i=0;i<inputFields.length;i++){
		   document.getElementById(inputFields[i].getAttribute('id')).style.backgroundColor = '#FFFFFF';	   
		   document.getElementById(inputFields[i].getAttribute('id')).style.border = '1px solid #FFFFFF';
		}

     if (idobj){
		 idobj=idobj+'_label';
         document.getElementById(idobj).style.backgroundImage="url(img/texbox.gif)";
		 document.getElementById(idobj).style.border = '1px solid #5E7979';			 		 
	 }	 
}
function chequeo_checkbox(){ 
         var inputFields = document.getElementsByTagName('INPUT'); 
	     for (i=0;i<inputFields.length;i++){
			if (document.getElementById(inputFields[i].getAttribute('id')).checked == true && document.getElementById(inputFields[i].getAttribute('id')).type == 'checkbox'){
                return true;		   
				break;				
	 	    }			 
	     }

		 alert ('-Debe seleccionar al menos un  \n Indole de Expendio-');		 
	     return false;		 
} 


function add_char(id,car,punto,evt,valor){
	var key = nav4 ? evt.which : evt.keyCode;	
	if (stringLength(document.getElementById(id).value)==punto&&key!=8){
	    document.getElementById(id).value+=car;
	} 
}	
function asignaValue(id_01,id_02){	
		document.getElementById(id_02).value=document.getElementById(id_01).value;
}
function enviaBusqueda(cod,foc){//#12
	band=true;
    var selectBoxes = document.getElementsByTagName('OPTION'); 
	for(i=0;i<selectBoxes.length;i++)
		if(document.getElementById(cod).value==selectBoxes[i].getAttribute('value'))band=false;
		
	if(band){
		alert('Codigo no existe!');
		return;
	}
	if(document.getElementById(cod).value!=''){
	document.getElementById('foco').value=foc;
	document.getElementById('cod').value=document.getElementById(cod).value;
	document.getElementById('carga').submit();}
}
function envia(cod,foc){//#17
	if(document.getElementById(cod).value!=''){
		document.getElementById('foco').value=foc;
		document.getElementById('cod').value=document.getElementById(cod).value;
		document.getElementById('carga').submit();
	}else{alert("Debe llenar el campo");foco(cod);}	
}

function chequeaCod(id,cod){
	var tabla = document.getElementById(id);
	for(i=1;i<tabla.rows.length;i++){
	 if(tabla.rows[i].cells[0].innerHTML==cod){
		 alert('Esta Actividad ya esta incluida!');
		 return false;
		 }
	}
	return true;
}
function MarcaFila(id,campo){
	document.getElementById(campo).value=id;
}

/////////////////validacion fecha////////////
function IsNumeric(valor) 
{   var log=valor.length; var sw="S"; 
	for (x=0; x<log; x++){ 
		v1=valor.substr(x,1); 
		v2 = parseInt(v1); 
		if (isNaN(v2)) { sw= "N";} 
	} 
	if (sw=="S") {return true;} else {return false; } 
} 
var primerslap=false; 
var segundoslap=false; 

function formateafecha(fecha) 
{ 	var long = fecha.length; 
	var dia; var mes; var ano;
	anio_actual=new Date();
	anio_actual=anio_actual+' ';
	anio_actual=anio_actual.split(' ')[3];

	if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2); 
		if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; } 
		else { fecha=""; primerslap=false;} 
	} 
	else 
	{ dia=fecha.substr(0,1); 
	if (IsNumeric(dia)==false) 
	{fecha="";} 
	if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; } 
	} 
	if ((long>=5) && (segundoslap==false)) 
	{ mes=fecha.substr(3,2); 
	if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00")) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; } 
	else { fecha=fecha.substr(0,3); segundoslap=false;} 
	} 
	else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } } 
	if (long>=7) 
	{ ano=fecha.substr(6,4); 
	if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); } 
	else { if (long==10){ if ((ano==0) || (ano<1900) || (ano>anio_actual)) { fecha=fecha.substr(0,6); } } } 
	} 
	
	if (long>=10) 
	{ 
	fecha=fecha.substr(0,10); 
	dia=fecha.substr(0,2); 
	mes=fecha.substr(3,2); 
	ano=fecha.substr(6,4); 
	// Año no viciesto y es febrero y el dia es mayor a 28 
	if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; } 
	} 
	return (fecha); 
}

function valida_anio(id){//#14
	var anio=document.getElementById(id).value;
	var long = anio.length;
	anio_actual=new Date();
	anio_actual=anio_actual+' ';
	anio_actual=anio_actual.split(' ')[3];
	if ((long<3)||(anio==0) || (anio<1900) || (anio>anio_actual+1)) { 
		document.getElementById(id).value='';
		alert('Debe Introducir un Año Valido');
		return false;
	} 
	return true;
}
//////////////////////////fin validacion fecha/////////////////
function cortaCad(id, destino){
	if(document.getElementById(id).value!=''){
		 ids = document.getElementById(id).value.split('-');
		 destino=destino.split('-');
		 document.getElementById(destino[0]).value=ids[0];
		 document.getElementById(destino[1]).value=ids[1];
		 if (ids[2]!=''){
		     document.getElementById(destino[2]).value=ids[2];			 
			 mostrar_extencion(destino[2],destino[0]);				 
		 }
		 if (ids[0] == 'J'){ 
		     document.getElementById(destino[3]).value=ids[3];	
			 document.getElementById('razon_social_').value = ids[3];
		     foco (destino[3]); 
		 }
		 else{ 
		     document.getElementById(destino[3]).value=ids[2];
			 document.getElementById('razon_social_').value = ids[2];
			 foco (destino[3]); 
		 }
	}
}

function calculoMat (id_calculos, id_asignacion, id_destino){ // 16
		 valores = id_calculos.split('-');
		 destino = id_destino.split('-');
         num1 = str_replace(',','.',document.getElementById(valores[0]).value);		 
		 num2 = str_replace(',','.',document.getElementById(valores[1]).value);		 
		 switch (destino[1]){
			 case '1': dato = Number(num1) + Number(num2); break;
			 case '2': dato = Number(num1) - Number(num2); break;
			 case '3': dato = Number(num1) * Number(num2); break;
			 case '4': dato = Number(num1) / Number(num2); break;		
		 }
	     document.getElementById(id_asignacion).value = numFormat(dato,2);
		 foco(destino[0]);
		 document.getElementById(valores[0]).value=numFormat(document.getElementById(valores[0]).value,2);
}


function comparaFecha(fecha_01,fecha_02){
	fecha01=document.getElementById(fecha_01).value.split('/');
	fecha02=document.getElementById(fecha_02).value.split('/');
	if(fecha01[0]==fecha02[0]&&fecha01[1]==fecha02[1]&&fecha01[2]==fecha02[2]){ alert('Fechas Invalidas!'); foco(fecha_01); return false;}
	if(fecha01[2]>fecha02[2]){ alert('Fechas Invalidas!'); foco(fecha_01); return false;}
	else if(fecha01[1]>fecha02[1]){ alert('Fechas Invalidas!'); foco(fecha_01); return false;}
		 else if(fecha01[0]>fecha02[0]){ alert('Fechas Invalidas!'); foco(fecha_01); return false;}
	return true;	 
}


function confImpresion(){
	vent=window.open("http://"+SERVIDOR_+"/Y.O.B/general/confImpresion.php","Impresión", "width=350,height=250,toolbar=no,menubar=no,status=no,alwaysRaised=yes,directories =no,location=no");
}



function AsignaCadCortada(id, destino){
		 if (document.getElementById(id).value!=''){
			 ids = document.getElementById(id).value.split('-');
			 des = destino.split('-');
			 document.getElementById(des[0]).value=ids[0];
			 document.getElementById(des[1]).value=ids[1];
			 document.getElementById(des[2]).value=ids[2];
			 foco(des[2]);
		 }	
}
function activa_check(id){         
		 id = id.split('_')[0];
		 if (document.getElementById(id).checked==true){
             document.getElementById(id).checked=false;}
		 else{
			 document.getElementById(id).checked=true;}           
}
        
function BusquedaDropDow(idDrop, idCod, destino, foc){
		 band=true;
		 var selectBoxes = document.getElementById(idDrop).getElementsByTagName('OPTION'); 
         for (i=0;i<selectBoxes.length;i++){
			  aux = selectBoxes[i].getAttribute('value').split('-')[0];
			  if(document.getElementById(idCod).value==Number(selectBoxes[i].getAttribute('value').split('-')[0])){
				 document.getElementById(destino.split('-')[0]).value=selectBoxes[i].getAttribute('value').split('-')[1];
				 document.getElementById(destino.split('-')[1]).value=selectBoxes[i].getAttribute('value').split('-')[2];				  
                 document.getElementById(idCod).value=aux;
				 band=false;
				 foco(foc);
				 break;
			  }
         }
		if(band){
		   alert("Codigo no existe!");
           document.getElementById(idCod).value='';
           foco(idCod);
		} 
}
function agregaItemSelect(ToBox,text,value,val){     
	if (val&&!validarlista(ToBox,value)){alert('Registro ya Agregado');return;}
	document.getElementById(ToBox).options[document.getElementById(ToBox).options.length] = new Option(text,value); 

}
function eliminaItemSelect(FromBox,value){	
	var tmpToBox = document.createElement('select');
	for (var no=0;no<document.getElementById(FromBox).options.length;no++){
		if(document.getElementById(FromBox).options[no].value!=value){
		  tmpToBox.options[tmpToBox.options.length] = new Option(document.getElementById(FromBox).options[no].text,document.getElementById(FromBox).options[no].value); 
		}
	 }
	 document.getElementById(FromBox).options.length=0;
	 for (var no=0;no<tmpToBox.options.length;no++){
		  document.getElementById(FromBox).options[document.getElementById(FromBox).options.length] = new Option(tmpToBox.options[no].text,tmpToBox.options[no].value); 
	 }		 
}
function seleccionaItem(val,lista,separador,campo){
	lista=document.getElementById(lista);
	for (var no=0;no<lista.options.length;no++){
		if(checkForCharacters(str_replace('.','',lista.options[no].value.split(separador)[campo]),valor(val)) != -1){
		  lista.options[no].selected=true;
		  document.getElementById(val+'Msj').innerHTML='';
		  return;
		}
	 }
	 document.getElementById(val+'Msj').innerHTML='Código errado o no existe!';
}
function validaCiRif(id,proximo,lista){//#4
	ids=id.split('-');
	band=true;
	msj='Faltan Datos!\n';
	ci_rif=valor(ids[1]);
	if(ci_rif==''||ci_rif.length<6){
		band=false;
		msj+='-Debe ingresar un RIF o un CI\n';
	}else if((valor(ids[0])=='J'||valor(ids[0])=='G')&&ids[3]==0){
		 foco('ext_rif');
		 return;
	}	
	if((valor(ids[0])=='J'||valor(ids[0])=='G')&&valor(ids[2])==''&&band&&ids[3]==1){
		band=false;
		msj+='-Debe ingresar la extencion del rif\n';
	}
	if(band){
		 /*****///
		 if(isset(lista)){
		 lista=document.getElementById(lista);
		for (var no=0;no<lista.options.length;no++){
			if(lista.options[no].value.split('-')[0]=='J'||lista.options[no].value.split('-')[0]=='G'){
				rifLista=lista.options[no].value.split('-')[0]+lista.options[no].value.split('-')[1]+lista.options[no].value.split('-')[2];
				pos=3;
			}else{
				rifLista=lista.options[no].value.split('-')[0]+lista.options[no].value.split('-')[1];
				pos=2;
			}
			rif=valor(ids[0])+valor(ids[1])+valor(ids[2]);
			if(rifLista==rif){
				asigna(proximo,lista.options[no].value.split('-')[pos]);
				foco(proximo);
				return;
			}
			
		 }}
		 foco(proximo);
		 /****///
	}else{
		alert(msj);
	}
}
function Inner(id, val){
	if(!val)val='';
	document.getElementById(id).innerHTML=val;
}
function ocultardisplay(id,valor){
	document.getElementById(id).style.display=valor;
}
function bloquea(){
	for (var no=0;no<bloquea.arguments.length;no++){
		if (isset(bloquea.arguments[no])){
			if (document.getElementById(bloquea.arguments[no]).disabled)
				 document.getElementById(bloquea.arguments[no]).disabled=false;
			else
				 document.getElementById(bloquea.arguments[no]).disabled=true;
		}
	}
}

function desbloquea(){
	for (var no=0;no<desbloquea.arguments.length;no++){
		if (isset(desbloquea.arguments[no])){
				 document.getElementById(desbloquea.arguments[no]).disabled=false;
		}
	}
}
function bloquear(){
	for (var no=0;no<bloquear.arguments.length;no++){
		if (isset(bloquear.arguments[no])){
				 document.getElementById(bloquear.arguments[no]).disabled=true;
		}
	}
}
function desbloquear(){
	for (var no=0;no<desbloquear.arguments.length;no++){
		if (isset(desbloquear.arguments[no])){
				 document.getElementById(desbloquear.arguments[no]).disabled=false;
		}
	}
}
function corta_cadena(cadena,tamananio){
	band=true;
	i=0;
	salida='';
	while(true){		
		if((i>=tamananio&&cadena[i]==' ')||(i==cadena.length)){
			return salida;
			}
		salida+=cadena[i++];
	}
}

function generaRestoyAcumulado(lista, monto, resto, acumulado, posMonto){
	if(!posMonto)posMonto=2;
	acum=0;
		for (var no=0;no<document.getElementById(lista).options.length;no++){
		   acum+=Number(str_replace(',','.',str_replace('.','',document.getElementById(lista).options[no].value.split('-')[posMonto])));
	    }
	if(isset(acumulado))asigna(acumulado,acum);	
	asigna(resto,numFormat(redondear(str2Number(monto)-acum),2));
}

function checkyes(id, accion){
	if(accion=='si'){
		document.getElementById(id).checked=true;
	}else{
		document.getElementById(id).checked=false;
	}	
}
				
function validarlista(lista,entrada){
	band2=true;
	 for (var no=0;no<document.getElementById(lista).options.length;no++){
		if(document.getElementById(lista).options[no].value== entrada){
				band2=false;break; 
		}
	 }
	 return band2
}
function ltrim(s) { 
    return s.replace(/^\s+/, ""); 
} 
 
function rtrim(s) { 
    return s.replace(/\s+$/, "")+" "; 
} 
 
function trim(s) { 
    return rtrim(ltrim(s)); 
}

function compara_clave(field,valor,valor2) { 
	var tclave1 = document.getElementById(valor).value; 
	var tclave2 = document.getElementById(valor2).value; 
	if (tclave2!=""){
		if (tclave1!=tclave2){
			alert('El password proporcionado no es igual al password anterior');
			field.value =null;	
		}
	}
}

function compara_montos(field,valor,valor2) { 
	var valor = parseFloat(document.getElementById(valor).value); 
	var valor2 = parseFloat(document.getElementById(valor2).value); 
	
	if (valor2>valor){
		alert('El monto ' +valor2+ ' solicitado no puede ser mayor al monto ' +valor+ ' disponible');
		field.value =null;	
	}
}




function solo_num(e)
{
    var evt = e.keyCode  ? e.keyCode : e.which; // verificando que la tecla sea de IE o otro navegador
    
    if(evt == 13 || evt == 8 || evt == 9) // En caso sea Enter Tabulacion o Borrado
        return true;
        
    return esnumero(String.fromCharCode(evt));
}

function solo_num_flotante(e)
{
	
    var evt = e.keyCode  ? e.keyCode : e.which; // verificando que la tecla sea de IE o otro navegador
    
	//alert(evt);
    if(evt == 13 || evt == 8 || evt == 9 || evt == 46 ) // En caso sea Enter ,Tabulacion , Borrado,punto o coma
        return true;
        
    return esnumero(String.fromCharCode(evt));
}

function esnumero(value)
{
    var regNumber = /[\d]/; // Usando expresiones regulares solo acepta numeros
    return regNumber.test(value);
}

function minimo_caracter(e)
{
if(e.value.length<4)
  {
     alert("El password debe poseer minimo 4 carateres");    
  }
}

function valida_correo(e)
{
	var palabra="";
    caracter=e.value.length
	valor=e.value
	for(i=13;i>0;i--){
	palabra=palabra + valor.substr(caracter-i,1);
	}	
		
	if (palabra!="@xxx.com"){
		alert("El correo ingresado no es @xxx.com \n\r si no posee correo de la empresa debe dejar la casilla en blanco");
		e.value=null;
	}
}

///FUNCIONES PARA VALIDAR FECHA Y EDADES ////////////////////

  function edades(Fecha1,retorno)
  {
	Fecha1=document.getElementById(Fecha1).value;
	//alert(Fecha1+" "+retorno);
	Fecha1=Fecha1.substr(3,2)+"/"+Fecha1.substr(0,2)+"/"+Fecha1.substr(6,4);
	fecha = new Date(Fecha1);
	hoy = new Date();
	
	ed = parseInt((hoy -fecha)/365/24/60/60/1000);
	document.getElementById(retorno).value = ed;
	//alert(Fecha1+fecha+" "+retorno+" "+hoy+" "+ed);
}

function validarFormatoFecha(campo) {
	fecha=document.getElementById(campo).value;
	//alert(fecha);
	var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
	if ((fecha.match(RegExPattern)) && (fecha!='')) {
		//valor=fecha.substr(2,1)+fecha.substr(3,1)+fecha.substr(5,1);
		//alert(valor);
		//if (fecha.substr(3,2)
		existeFecha(campo);
	} else {
		document.getElementById(campo).value="";
		alert("El formato de la fecha es incorrecto!");
	}
}
function existeFecha(campo){
	fecha=document.getElementById(campo).value;
	var fechaf = fecha.split("/");
	
	var day = fechaf[0];
	var month = fechaf[1];
	var year = fechaf[2];
	//alert(month);
	var date = new Date(year,month,'0');
	if((day-0)>(date.getDate()-0)){
		document.getElementById(campo).value="";
		alert("La fecha introducida no existe!");
	}
	if ((month>12)|| (month<1)){
		document.getElementById(campo).value="";
		alert("La fecha introducida no existe!");
	}
	if ((day>31)|| (month<1)){
		document.getElementById(campo).value="";
		alert("La fecha introducida no existe!");
	}
	//return true;
	//document.getElementById(campo).value=fecha;
}

function validarFechaMenorActual(date){
	date=document.getElementById(date).value;
	var x=new Date();
	var fecha = date.split("/");
	x.setFullYear(fecha[2],fecha[1]-1,fecha[0]);
	var today = new Date();

	if (x >= today){	  
	}else{
	 alert("La fecha introducida "+date+" es menor a la fecha actual") ;
	}
}
function solo_num_fecha(e)
{
	
    var evt = e.keyCode  ? e.keyCode : e.which; // verificando que la tecla sea de IE o otro navegador
    
	//alert(evt);
    if(evt == 13 || evt == 8 || evt == 9 || evt == 47 ) // En caso sea Enter ,Tabulacion , Borrado,punto o coma
        return true;
        
    return esnumero(String.fromCharCode(evt));
}

////////////////////////////////////////////////////////////////////////////////////////////
/// FUNCIONES PARA MOSTRAR Y OCULTAR ELEMENTOS ////////////////////////////////////////////
/// se necesita esta propiedad en el div  style="display:;" ///////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function mostrar_ocultar_div(sel,valor_comparado,id_div) {
	//alert (sel.value);
      if (sel.value==valor_comparado){
           divC = document.getElementById(id_div);
           divC.style.display = "";


      }else{

           divC = document.getElementById(id_div);
           divC.style.display="none";

           
      }
}

function llamar_pagina(pagina) 
{
	//alert (pagina);
	document.location.href=pagina;
}
function validar_cantidad_caracteres(field,cantidad) {
	valor=field.value.length;
	//alert(valor);
  if (valor!=cantidad) {
    alert('El campo debe poseer 4 Caracteres');
    field.value="";
  }
}
function habilita(campo){
	//alert(campo);
	document.getElementsByName(campo).disabled=false;
}