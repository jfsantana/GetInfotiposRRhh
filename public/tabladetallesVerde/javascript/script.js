/* Shivving (IE8 is not supported, but at least it won't look as awful)
/* ========================================================================== */

(function (document) {
	var
	head = document.head = document.getElementsByTagName('head')[0] || document.documentElement,
	elements = 'article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output picture progress section summary time video x'.split(' '),
	elementsLength = elements.length,
	elementsIndex = 0,
	element;

	while (elementsIndex < elementsLength) {
		element = document.createElement(elements[++elementsIndex]);
	}

	element.innerHTML = 'x<style>' +
		'article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}' +
		'audio[controls],canvas,video{display:inline-block}' +
		'[hidden],audio{display:none}' +
		'mark{background:#FF0;color:#000}' +
	'</style>';

	return head.insertBefore(element.lastChild, head.firstChild);
})(document);

/* Prototyping
/* ========================================================================== */

(function (window, ElementPrototype, ArrayPrototype, polyfill) {
	function NodeList() { [polyfill] }
	NodeList.prototype.length = ArrayPrototype.length;

	ElementPrototype.matchesSelector = ElementPrototype.matchesSelector ||
	ElementPrototype.mozMatchesSelector ||
	ElementPrototype.msMatchesSelector ||
	ElementPrototype.oMatchesSelector ||
	ElementPrototype.webkitMatchesSelector ||
	function matchesSelector(selector) {
		return ArrayPrototype.indexOf.call(this.parentNode.querySelectorAll(selector), this) > -1;
	};

	ElementPrototype.ancestorQuerySelectorAll = ElementPrototype.ancestorQuerySelectorAll ||
	ElementPrototype.mozAncestorQuerySelectorAll ||
	ElementPrototype.msAncestorQuerySelectorAll ||
	ElementPrototype.oAncestorQuerySelectorAll ||
	ElementPrototype.webkitAncestorQuerySelectorAll ||
	function ancestorQuerySelectorAll(selector) {
		for (var cite = this, newNodeList = new NodeList; cite = cite.parentElement;) {
			if (cite.matchesSelector(selector)) ArrayPrototype.push.call(newNodeList, cite);
		}

		return newNodeList;
	};

	ElementPrototype.ancestorQuerySelector = ElementPrototype.ancestorQuerySelector ||
	ElementPrototype.mozAncestorQuerySelector ||
	ElementPrototype.msAncestorQuerySelector ||
	ElementPrototype.oAncestorQuerySelector ||
	ElementPrototype.webkitAncestorQuerySelector ||
	function ancestorQuerySelector(selector) {
		return this.ancestorQuerySelectorAll(selector)[0] || null;
	};
})(this, Element.prototype, Array.prototype);

/* Helper Functions
/* ========================================================================== */


function generateTableRow() {  /* Genera NUEVO  Hallazgo en el formulario de Incidencia HallazgoNew*/
	var emptyColumn = document.createElement('tr');

	emptyColumn.innerHTML = '<td colspan=1 ><a class="cut" id="cut" style="text-decoration:none;border: 2px solid #138034de; font-size: 170%;font-weight: bold; background:#002c00; color: white">-</a>	# <span style="font-size: 180%; " ></span></td> <td colspan=1 style="text-decoration:none; width: 96%;background-color: #8eac971a;"> <span <div ><div id="padrerecomenda"  name="padrerecomenda" class="padrerecomenda">    <div class="row mb-1 p-0" >   <div class="col-xs-12 col-sm-12 col-md-12 mt-2" > <input type="hidden" id="cantidad_recomendacion" name="cantidad_recomendacion[]" class="cantidad_recomendacion"  > <select  class="chosen-select" style="width:98%;width: 98%;text-align: center;font-size: 14px;line-height: 1.42857143;color: #555;" id="incidencia_hallazgo" name="incidencia_hallazgo[]" ><center><option  value="0">Seleccione Hallazgo 0</center></option><center> <option  value="1"><center>Seleccione Hallazgo 1</center></option> </select></div> </div><div class="col-xs-12 col-sm-12 col-md-12 mt-2" > <input type="text" style="width:98%;margin-top:1%; border-radius: 4px;border: 1px solid #ccc;"  placeholder="Escriba la Descripción" id="incidencia_hallazgo_descripcion" name="incidencia_hallazgo_descripcion[]"> </div> <div style="margin: 1.8%; margin-bottom: 3%; padding:1%; " id="tabla_recomendaciones" name="tabla_recomendaciones" class="tabla_recomendaciones"> <div class="col-xs-12 col-sm-12 col-md-12" ><div class="row" style="background: #549127;border: 1px double #212d21e0;color: white;font-size: 120%;font-weight: bold;border-radius: 0.2em;" > <div class="col-md-1 col-xs-1 col-lg-1" style=" text-decoration: none;font-size: 150%;color: white;">#</div><div class="col-md-5 col-xs-5 col-lg-5" style="background: #549127" >	RECOMENDACION</div><div class="col-md-6 col-xs-6 col-lg-6" style="background: #77c28d" >RESPONSABLE</div></div><div id="fila_recomendaciones" class="fila_recomendaciones"> <div name="div_recomendaciones" id="div_recomendaciones" class="div_recomendaciones"> <div class="row recomendaciones" id="recomendaciones" name="recomendaciones" style="background: #fff; border:1px solid rgba(0, 0, 0, 0.125)"  > <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" ><a class="cut2" id="cut2" name="cut2" style="position: relative;text-decoration:none;border: 1px solid #138034de; font-size: 150%;font-weight: bold; background:#549127; color: white">-</a><span style="font-size: 130%; " ></span></div> <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" ><input type="text" style="height: 100%;" id="incidencia_recomendacion" name="incidencia_recomendacion[]" ></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" ><input type="text" style="height: 100%;" id="incidencia_responsable" name="incidencia_responsable[]" > </div></div> </div>  </div> </div></div> </div>  <div class="row prueba" id="prueba" name="prueba"style="font-size: 80%; font-weight: bold;" > <div class="col-md-6 col-xs-6 col-lg-6" style=" text-decoration: none;color: white; text-align: left;"> <a class="add" id="add" name="add" style="text-decoration:none; border: 1px solid #138034de; font-size: 180%;font-weight: bold; background:#549127; color: white; border-radius: 0.5em;">+</a> </div> </div> </div>  </div></span></td>'; 
	updateInvoice();
	return emptyColumn;
}

function generateTableRow2() {  /* Genera NUEVA recomendación en el formulario de Incidencia HallazgoNew*/
	var emptyColumn2 = document.createElement('div');

	emptyColumn2.innerHTML = '<div class="row recomendaciones" id="recomendaciones" name="recomendaciones" style="background: #fff; border:1px solid rgba(0, 0, 0, 0.125)"  > <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" ><a class="cut2" id="cut2" name="cut2" style="position: relative;text-decoration:none;border: 1px solid #138034de; font-size: 150%;font-weight: bold; background:#549127; color: white">-</a><span style="font-size: 130%; " ></span></div> <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" ><input type="text" style="height: 100%;" id="incidencia_recomendacion" name="incidencia_recomendacion[]" ></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" ><input type="text" style="height: 100%;" id="incidencia_responsable" name="incidencia_responsable[]" ></div></div> </div>';	
	updateInvoice();
	return emptyColumn2;
}

function generateTableRow7() {  /* Genera   la nueva FILA*/
	var emptyColumn2 = document.createElement('div');

	emptyColumn2.innerHTML = '<div class="row recomendaciones" id="recomendaciones" name="recomendaciones" style="background: #fff; border:1px solid rgba(0, 0, 0, 0.125)" > <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1" >	<a class="cut7" id="cut7" name="cut7" style="position: relative;text-decoration:none;font-size: 150%;font-weight: bold; background:#ac5514; color: white;left: -1.5em;">-</a><span style="font-size: 130%; " ></span></div><div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" ><input type="text" id="incidencia_recomendacionOld" name="incidencia_recomendacionOld[]"></div><div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" ><input type="text" id="incidencia_responsableOld" name="incidencia_responsableOld[]" > </div><div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" ><input type="date" id="incidencia_inicioOld" name="incidencia_inicioOld[]"  > </div><div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" ><input type="date" id="incidencia_planificacionOld" name="incidencia_planificacionOld[]" > </div><div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" ><input type="text" id="incidencia_cierreOld" name="incidencia_cierreOld[]" > </div></div></div>  ';	
	updateInvoice();
	return emptyColumn2;
}


/*
function generateTableRow4() {  // Genera   la nueva FILA
	var emptyColumn = document.createElement('tr');

	emptyColumn.innerHTML = '<td colspan=1 ><a class="cut4" style="text-decoration:none;border: 2px solid #138034de; font-size: 170%;font-weight: bold; background:#002c00; color: white">-</a># <span style="font-size: 180%; " ></span></td>   <td colspan=1 style="text-decoration:none; width: 96%;background-color: #8eac971a;">    <span >  <div ><div id="padrerecomenda"  name="padrerecomenda" class="padrerecomenda"><div class="row mb-1 p-0" >   <div class="col-xs-12 col-sm-12 col-md-12 mt-2">  <select class="chosen-select" style="text-decoration:none; text-align: center; width: 100%;" name="diagnostico_hallazgo" id="diagnostico_hallazgo"><option value="0">Seleccione Hallazgo</option>   <option  value="1"> Hallazgo 1   </option>  </select> </div> </div><div class="row " style="margin: 0.7%; margin-bottom: 3%; padding:1%;" id="tabla_recomendaciones">   <div class="col-xs-12 col-sm-12 col-md-12">   <div class="row" style="background: #549127;border: 1px double #212d21e0;color: white;font-size: 120%;font-weight: bold;border-radius: 0.2em;" >  <div class="col-md-1 col-xs-1 col-lg-1" style=" text-decoration: none;font-size: 150%;color: white;">#</div  >  <div class="col-md-11 col-xs-11 col-lg-11" style="background: #549127"> RECOMENDACION</div>  </div>	<div id="fila_recomendaciones" class="fila_recomendaciones">   <div name="div_recomendaciones" id="div_recomendaciones"  class="div_recomendaciones"><div class="row " style="background: #fff; border:1px solid rgba(0, 0, 0, 0.125)"  id="recomendaciones">  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><a class="cut5" id="cut5" name="cut5" style="position: relative;text-decoration:none;border: 1px solid #138034de; font-size: 150%;font-weight: bold; background:#549127; color: white">-</a><span style="font-size: 130%; " ></span>  </div > <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" ><input type="text" style="height: 100%;" name="incidencia_recomendacion" id="incidencia_recomendacion" ></div > </div>  </div></div>  </div></div>  </div>   <div class="row prueba" id="prueba" name="prueba"style="font-size: 80%; font-weight: bold;" ><div class="col-xs-6 col-sm-6 col-md-6" style=" text-decoration: none;color: white; text-align: left;"> <a class="add5" id="add5" name="add5" style="text-decoration:none; border: 1px solid #138034de; font-size: 180%;font-weight: bold; background:#549127; color: white; border-radius: 0.5em;">+</a></div>  </div></div></div> </span></td>'; 
	updateInvoice();
	return emptyColumn;
}

function generateTableRow5() {  // Genera   la nueva FILA
	var emptyColumn2 = document.createElement('div');

	emptyColumn2.innerHTML = '<div class="row " style="background: #fff; border:1px solid rgba(0, 0, 0, 0.125)"> <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"  ><a class="cut5" id="cut5" name="cut5" style="position: relative;text-decoration:none;border: 1px solid #138034de; font-size: 150%;font-weight: bold; background:#549127; color: white">-</a><span style="font-size: 130%; " id="nrorecomendacion" name="nrorecomendacion" ></span></div><div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" ><input type="text" style="height: 100%;" ></div></div></div>';	
	updateInvoice();
	return emptyColumn2;
}

// Tabla Inspección Tabla Hallazgo Anteriores 


function generateTableRow6() {   //Genera   la nueva FILA
	var emptyColumn = document.createElement('tr');

	emptyColumn.innerHTML = '<td colspan=1 ><a class="cut6" style="text-decoration:none;border: 1px solid #240a0ae8; font-size: 170%;font-weight: bold; background:#4a1c1ce8; color: white">-</a># <span style="font-size: 180%; " ></span></td>   <td style="text-decoration:none; width: 96%;background-color: #8eac971a;">    <span >  <div ><div id="padrerecomenda"  name="padrerecomenda" class="padrerecomenda"><div class="row mb-1 p-0" >   <div class="col-xs-12 col-sm-12 col-md-12 mt-2">  <select class="chosen-select" style="width: 98%; text-align:center" ><option value="0">Seleccione Hallazgo</option>   <option  value="1"> Hallazgo W1   </option>  </select> </div> </div><div class="row " style="margin: 2%; margin-bottom: 3%; padding:1%;" id="tabla_recomendaciones">   <div class="col-xs-12 col-sm-12 col-md-12">   <div class="row" style="background: #ac5514;border: 1px double #212d21e0;color: white;font-size: 120%;font-weight: bold;border-radius: 0.2em;" > 	  <div class="col-md-1 col-xs-1 col-lg-1" style=" text-decoration: none;font-size: 150%;color: white;">#</div>	  <div class="col-md-3 col-xs-3 col-lg-3" style="background: #0f0e3938" >	RECOMENDACION</div>	  <div class="col-md-2 col-xs-2 col-lg-2" style="background: #d99848e6" >RESPONSABLE</div>	<div class="col-md-2 col-xs-2 col-lg-2" style="background: #0f0e3938" >INICIO</div>	<div class="col-md-2 col-xs-2 col-lg-2" style="background: #d99848e6" >PLANIF</div>	<div class="col-md-2 col-xs-2 col-lg-2" style="background: #0f0e3938" >CIERRE</div>	</div>	<div id="fila_recomendaciones" class="fila_recomendaciones">  <div name="div_recomendaciones" id="div_recomendaciones" class="div_recomendaciones"> <div style="background: #fff; border:1px solid rgba(0, 0, 0, 0.125)"  id="recomendaciones" name="recomendaciones" class="row recomendaciones"><div class="col-xs-12 col-sm-12 col-md-1 col-lg-1" ><a class="cut7" id="cut7" name="cut7" style="position: relative;text-decoration:none;font-size: 150%;font-weight: bold; background:#ac5514; color: white;left: -1.5em;">-</a>    <span style="font-size: 130%; " ></span>  </div>  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >  <input type="text" name="incidencia_recomendacion[]" id="incidencia_recomendacion" >  </div>  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" >    <input type="text" name="incidencia_responsable[]" id="incidencia_responsable"  > </div>  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" >    <input type="date" name="incidencia_responsable" id="incidencia_responsable" >   </div>  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" >    <input type="date" name="incidencia_responsable" id="incidencia_responsable">     </div>  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" >    <input type="text" name="incidencia_responsable" id="incidencia_responsable">     </div></div></div></div></div></div></div>   <div class="row prueba" id="prueba" name="prueba"style="font-size: 80%; font-weight: bold;" > <div class="col-md-6 col-xs-6 col-lg-6" style=" text-decoration: none;color: white; text-align: left;"><a class="add7" id="add7" name="add7" style="text-decoration:none; border: 1px solid #ac5514; font-size: 180%;font-weight: bold; background:#ac5514; color: white; border-radius: 0.5em;">+</a> </div>  </div></div>    </div> </span></td>'; 
	updateInvoice();
	return emptyColumn;
}
*/

function parseFloatHTML(element) {
	return parseFloat(element.innerHTML.replace(/[^\d\.\-]+/g, '')) || 0;

}

function parsePrice(number) {
	return number.toFixed(2).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1.');
}

/* Update Number
/* ========================================================================== */

function formatearNumero(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function updateNumber(e) {
	var
	activeElement = document.activeElement,
	value = parseFloat(activeElement.innerHTML),
	wasPrice = activeElement.innerHTML == parsePrice(parseFloatHTML(activeElement));

	if (!isNaN(value) && (e.keyCode == 38 || e.keyCode == 40 || e.wheelDeltaY)) {
		e.preventDefault();

		value += e.keyCode == 38 ? 1 : e.keyCode == 40 ? -1 : Math.round(e.wheelDelta * 0.025);
		value = Math.max(value, 0);

		activeElement.innerHTML = wasPrice ? parsePrice(value) : value;
	}

	updateInvoice();
	actualizartipoc();
}

/* Update Invoice
/* ========================================================================== */

function updateInvoice() {
	var total = 0;
	var siva = 0;
	var cells, a, i,filare,indicere,filaresponsables,indiceresponsables;

	// update inventory cells
	// ======================	

	for (var a = document.querySelectorAll('table.inventory tbody tr'), i = 0; a[i]; ++i) {
		// get inventory row cells
		cells = a[i].querySelectorAll('span:last-child');
		cells[0].innerHTML = i+1; // Introduzco el numero de ITEM
		document.querySelector("input.indice_hallazgo").value= cells[0].innerHTML;

		cantidadRecomendaciones=a[i].querySelectorAll('div.fila_recomendaciones div.row').length;

		input=a[i].querySelectorAll('input');
		input[0].value=cantidadRecomendaciones;

	
		for (indicere = 0; indicere<cantidadRecomendaciones ; ++indicere) {
			filare = a[i].querySelectorAll('div.fila_recomendaciones div.row');
			cellsr = filare[indicere].querySelectorAll('span:last-child');
			cellsr[0].innerHTML = indicere+1; // Introduzco el numero de ITEM
			document.querySelector("input.indice_recomendacion").value= cantidadRecomendaciones;

			cantidadResponsables=filare[indicere].querySelectorAll('div.row5').length;					
			document.querySelector("input.cantidad_responsable").value= "cantidadResponsables"+i+" es: "+cantidadResponsables;
		
			for (var indiceresponsables = 0; indiceresponsables<cantidadResponsables ; ++indiceresponsables) {
				filaresponsables = filare[indicere].querySelectorAll('div.row5');
				cellsresposanble = filaresponsables[indiceresponsables].querySelectorAll('span');
				cellsresposanble[0].innerHTML = indiceresponsables+1+"de "+indiceresponsables; // Introduzco el numero de ITEM
				document.querySelector("input.indice_responsable").value= cantidadResponsables;	
			}	
		}
	}
	
	for (var bb = document.querySelectorAll('table.inventory2 tbody tr'), h = 0; bb[h]; ++h) {
		// get inventory row cells
		cellsbb = bb[h].querySelectorAll('span:last-child');
		cellsbb[0].innerHTML = h+1; // Introduzco el numero de ITEM HALLAZGO
		cantidadRecomendacionesOld=bb[h].querySelectorAll('div.fila_recomendacionesOld div.row').length;
		input=bb[h].querySelectorAll('input');
		input[0].value=cantidadRecomendacionesOld;
		//cellsbb[0].innerHTML =cantidadRecomendacionesOld;
		
		for (indicereOld = 0; indicereOld<cantidadRecomendacionesOld ; ++indicereOld) {
			filareOld = bb[h].querySelectorAll('div.fila_recomendacionesOld div.row');
			cellsrOld = filareOld[indicereOld].querySelectorAll('span:last-child');
			cellsrOld[0].innerHTML = indicereOld+1; // Introduzco el numero de ITEM
			//document.querySelector("input.indice_recomendacion").value= cantidadRecomendaciones;

			
			
		}
		


	}






	}



/* On Content Load
/* ========================================================================== */


function actualizartipoc() {


	
}

/* On Content Load
/* ========================================================================== */

function onContentLoad() {
	updateInvoice();
	actualizartipoc();

	var
	input = document.querySelector('input'),
	image = document.querySelector('img');

	function onClick(e) {
		var element = e.target.querySelector('[inventory]'), row;

		element && e.target != document.documentElement && e.target != document.body && element.focus();
		/*******      CLASES PARA EL FORMULARIO DE INSPECCIONES AHO *************/

		//  ELIMINAR HALLAZGO NUEVO EN INCIDENCIA  

		if (e.target.className == 'cut') {

			row = e.target.ancestorQuerySelector('tr');
			row.parentNode.removeChild(row);

			cant=document.querySelector("input.indice_hallazgo").value;
			cant=cant-1;
			
			document.querySelector("input.indice_hallazgo").value= cant;		
			document.querySelector("input.indice_recomendacion").value= 1;
		}

		//  AGREGAR HALLAZGO NUEVO EN INCIDENCIA  
		if (e.target.matchesSelector('.agregar')) {
			document.querySelector('table.inventory tbody').appendChild(generateTableRow());
			document.querySelector("input.indice_recomendacion").value= 1;
			document.querySelector("input.indice_responsable").value= 1;
		}

		//  ELIMINAR RECOMENDACIONES NUEVAS EN HALLAZGOS NUEVOS  

		if (e.target.className == 'cut2') {

			var td = e.target.parentNode; 
			var tr = td.parentNode;
			tr.parentNode.removeChild(tr);

			cant=document.querySelector("input.indice_hallazgo").value;

			cantrec=document.querySelector("input.indice_recomendacion").value;
			cantrec=cantrec-1;
			
			document.querySelector("input.indice_recomendacion").value= cantrec;
		}
		//  AGREGAR RECOMENDACIONES NUEVAS EN HALLAZGOS NUEVOS  

		if (e.target.matchesSelector('.add')) {

			var td = e.target.parentNode; 
			var tr = td.parentNode;
			var tr2 = tr.parentNode;
			tr2.querySelector('div.fila_recomendaciones').appendChild(generateTableRow2());

			updateInvoice();
		}		  
	/*  if (e.target.className == 'cut6') {

			row = e.target.ancestorQuerySelector('tr');
			row.parentNode.removeChild(row);

			cant=document.querySelector("input.indice_hallazgo").value;
			cant=cant-1;
			
			document.querySelector("input.indice_hallazgo").value= cant;		
			document.querySelector("input.indice_recomendacion").value= 1;

		}

		if (e.target.matchesSelector('.agregar6')) {
			document.querySelector('table.inventory tbody').appendChild(generateTableRow6());
			document.querySelector("input.indice_recomendacion").value= 1;
			document.querySelector("input.indice_responsable").value= 1;

		}
***********************************************************************************++****/

		// ELIMINAR RECOMENDACIONES NUEVAS EN HALLAZGOS OLD (ANTERIORES)

		if (e.target.className == 'cut7') {

			var td = e.target.parentNode; 
			var tr = td.parentNode;
			tr.parentNode.removeChild(tr);

			cant=document.querySelector("input.indice_hallazgo").value;

			cantrec=document.querySelector("input.indice_recomendacion").value;
			cantrec=cantrec-1;
			
			document.querySelector("input.indice_recomendacion").value= cantrec;
		}

		// AGREGAR RECOMENDACIONES NUEVAS EN HALLAZGOS OLD (ANTERIORES)

		if (e.target.matchesSelector('.add7')) {

			var td = e.target.parentNode; 
			var tr = td.parentNode;
			var tr2 = tr.parentNode;
			tr2.querySelector('div.fila_recomendacionesOld').appendChild(generateTableRow7());

			updateInvoice();
		}

/*******************************************************************************/	
/****      CLASES PARA EL FORMULARIO DE DIAGNÓSTICO *********

		if (e.target.matchesSelector('.agregar4')) {
			document.querySelector('table.inventory tbody').appendChild(generateTableRow4());
			document.querySelector("input.indice_recomendacion").value= 1;
			document.querySelector("input.indice_responsable").value= 1;

		}

		if (e.target.className == 'cut4') {

			row = e.target.ancestorQuerySelector('tr');
			row.parentNode.removeChild(row);

			cant=document.querySelector("input.indice_hallazgo").value;
			cant=cant-1;
			
			document.querySelector("input.indice_hallazgo").value= cant;		
			document.querySelector("input.indice_recomendacion").value= 1;

		}

		if (e.target.matchesSelector('.add5')) {

			var td = e.target.parentNode; 
			var tr = td.parentNode;
			var tr2 = tr.parentNode;
			tr2.querySelector('div.fila_recomendaciones').appendChild(generateTableRow5());

			updateInvoice();
		}

		if (e.target.className == 'cut5') {

			var td = e.target.parentNode; 
			var tr = td.parentNode;
			tr.parentNode.removeChild(tr);


			cant=document.querySelector("input.indice_hallazgo").value;

			cantrec=document.querySelector("input.indice_recomendacion").value;
			cantrec=cantrec-1;
			
			document.querySelector("input.indice_recomendacion").value= cantrec;
		}
****/

		/***************************************************/

		updateInvoice();
		actualizartipoc();
	}

	function onEnterCancel(e) {
		e.preventDefault();

		image.classList.add('hover');
	}

	function onLeaveCancel(e) {
		e.preventDefault();

		image.classList.remove('hover');
	}

	function onFileInput(e) {
		image.classList.remove('hover');

		var
		reader = new FileReader(),
		files = e.dataTransfer ? e.dataTransfer.files : e.target.files,
		i = 0;

		reader.onload = onFileLoad;

		while (files[i]) reader.readAsDataURL(files[i++]);
	}

	function onFileLoad(e) {
		var data = e.target.result;

		image.src = data;
	}

	if (window.addEventListener) {
		document.addEventListener('click', onClick);

		document.addEventListener('mousewheel', updateNumber);
		document.addEventListener('keydown', updateNumber);

		document.addEventListener('keydown', updateInvoice);
		document.addEventListener('keyup', updateInvoice);

		document.addEventListener('keydown', actualizartipoc);
		document.addEventListener('keyup', actualizartipoc);



		input.addEventListener('focus', onEnterCancel);
		input.addEventListener('mouseover', onEnterCancel);
		input.addEventListener('dragover', onEnterCancel);
		input.addEventListener('dragenter', onEnterCancel);

		input.addEventListener('blur', onLeaveCancel);
		input.addEventListener('dragleave', onLeaveCancel);
		input.addEventListener('mouseout', onLeaveCancel);

		input.addEventListener('drop', onFileInput);
		input.addEventListener('change', onFileInput);
	}
}

window.addEventListener && document.addEventListener('DOMContentLoaded', onContentLoad);
