/* Shivving (IE8 is not supported, but at least it won't look as awful)
/* ========================================================================== */

(function (document) {
	var
	head = document.head = document.getElementsByTagName('head')[0] || document.documentElement,
	elements = 'article3 aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output picture progress section summary time video x'.split(' '),
	elementsLength = elements.length,
	elementsIndex = 0,
	element;

	while (elementsIndex < elementsLength) {
		element = document.createElement(elements[++elementsIndex]);
	}

	element.innerHTML = 'x<style>' +
		'article3,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}' +
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


function generateTableRow() {  /* Genera   la nueva FILA*/
	var emptyColumn = document.createElement('tr');


	/*  VERDE DOS  cut3 Y add3*/


	emptyColumn.innerHTML = '<td colspan=1 ><a class="cut" style="text-decoration:none;border: 2px solid #138034de; font-size: 150%;font-weight: bold; background:#002c00; color: white">DOS</a><span style="font-size: 180%; " ></span></td><td style="text-decoration:none; width: 100%;"><span ><div class="card-header" style="background: #8eac971a">    <div class="row mb-1 p-0" > <div class="col-md-12 col-xs-12 col-lg-12">	<select id="" name="" class="chosen-select" style="text-decoration:none; text-align: center; width: 100%;"><option value="">Seleccione Hallazgo Verde DOSsss</option>   <option  value=""> Hallazgo verde dossss  </option>	</select> </div></div></div>  <article3 style="margin-bottom: 2%; border: 2.8px dotted #549127; margin-top: 2%;padding:1%; background: #8eac971a"><table class="inventory3" style="border-collapse: inherit;margin: 0;" id="tabla_detalle3"  ><thead>	<tr >  <th style="text-decoration:none;background: #549127; width:4%;color: white " >#</th>  <th style="text-decoration:none;background: #549127; width:48%; font-size:150%; color: white">RECOMENDACION</th>  <th style="text-decoration:none;background: #77c28d ; width:48%; font-size:150%; color: white">RESPONSABLE</th></tr></thead><tbody>	<tr><td style="text-decoration:none; width:4%"><a class="cut3" style="text-decoration:none; border: 2px solid #138034de; font-size: 220%;font-weight: bold; background:#549127; color: white">-</a><span style="font-size: 150%; color:black " ></span></td><td style="text-decoration:none; width:48%"><span >  <input type="text" id="id_estado" name="id_estado" class="form-control" aria-describedby="passwordHelpBlock" placeholder="" value=""  ></span></td><td style="text-decoration:none; width:48%"><span >  </span></td></tr></tbody></table><a class="add3" style="text-decoration:none;  font-size: 150%;font-weight: bold;margin-top: 0.4%; paading-top:0%; background: #549127; border: 2px solid #138034de; color: white">+</a>                               </article3><!-- FIN DE TABLA DOS DE RECOMENDACION   -->                     </span></td>';	
	return emptyColumn;
}

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
/*
function calculo_tiempo_de_trabajo(){ 

	var cells, valor6,valor5;

	for (var a = document.querySelectorAll('table.inventory3 tbody tr'), c = 0; a[c]; ++c) {
		cells = a[c].querySelectorAll('span:last-child');
		var valor5="2000/10/01";
		var valor6="2002/10/01";
		cells[5]=cells[2];
	}

	
    var fechaInicio = new Date(valor5).getTime();
    var fechaFin    = new Date(valor6).getTime();

    let diferencia = (fechaInicio - fechaFin) / 1000;

    diferencia /= (60 * 60 *24);

    diferencia /= 365.25;

    var resultado = Math.abs(Math.round(diferencia));   

    //claculo de meses

    var fechaInicio2 = new Date(valor5).getTime();
    var fechaFin2    = new Date(valor6).getTime();

    let diferencia2 = (fechaInicio2 - fechaFin2) / 1000 / (3600 * 24 * 7 * 4);

    var resultado2 = Math.abs(Math.round(diferencia2));

    if(resultado >0) {
      
      //la persona tiene años trabajando
      var extrencion = resultado + " años";

      return extrencion;      

    }else{

      if (resultado2<12 && resultado2>0) {
        // la persona solo tiene meses

        var extrencion2 = resultado2 + " meses";

        return extrencion2;
      }
    }

  }
*/



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
	var cells, celd,price, total, a, i,iva, siva;

	// update inventory3 cells
	// ======================	

	for (var a = document.querySelectorAll('table.inventory3 tbody tr'), i = 0; a[i]; ++i) {
		// get inventory3 row cells
		cells = a[i].querySelectorAll('span:last-child');
		cells[0].innerHTML = i+1; // Introduzco el numero de ITEM
	}
	
}

/* On Content Load
/* ========================================================================== */




function validar_fecha_hasta_experiancia_laboral(fechaDesde , fechaHasta){


	var dato1 = fechaDesde;
	var dato2 =  fechaHasta;
  
  
	function add3Zero(i) {
	  if (i < 10) {
		  i = "0" + i;
	  }
	  return i; 
	}
	var d = new Date();
	var day = add3Zero(d.getDate());
	var month = add3Zero(d.getMonth()+1);
	var year = add3Zero(d.getFullYear());
	fechaactual= year + "-" + month + "-" + day;
  
  
	if (dato2>fechaactual || dato2<=dato1) {
  
	  return false;
  
	}else{
  
	  return true;
	}
  

  
  }


function actualizartipoc() {

	/*var total = 0;
	var cells, price, total, a, i;

	// update inventory3 cells
	// ======================	

	for (var a = document.querySelectorAll('table.inventory3 tbody tr'), i = 0; a[i]; ++i) {
		// get inventory3 row cells
		cells = a[i].querySelectorAll('span:last-child');

		input=a[i].querySelectorAll('input');
		tc =input[0].value;

		valor5 =input[1].value; 
		valor6 =input[2].value;	
		
		

		var operacion_asignacion =  validar_fecha_hasta_experiancia_laboral(valor5 , valor6);
			
		var fechaInicio = new Date(valor5).getTime();
		var fechaFin    = new Date(valor6).getTime();
	
		let diferencia = (fechaInicio - fechaFin) / 1000;
	
		diferencia /= (60 * 60 *24);
	
		diferencia /= 365.25;
	
		var resultado = Math.abs(Math.round(diferencia));   
	
		//claculo de meses
	
		var fechaInicio2 = new Date(valor5).getTime();
		var fechaFin2    = new Date(valor6).getTime();
	
		let diferencia2 = (fechaInicio2 - fechaFin2) / 1000 / (3600 * 24 * 7 * 4);
	
		var resultado2 = Math.abs(Math.round(diferencia2));
	
		if(resultado >0) {
		  
		  //la persona tiene años trabajando
		  if (operacion_asignacion != false ) {
			  
			var extrencion = resultado + " años";
	
			input[3].value= extrencion;      
			  
		  }
		  
	
		}else{
	
		  	if (resultado2<12 && resultado2>0) {
				// la persona solo tiene meses

				if (operacion_asignacion != false ) {
					
		
					var extrencion2 = resultado2 + " meses";
			
					input[3].value=  extrencion2;
				}
		  	}else{
				input[3].value=  0;
			  }
		}
			updateInvoice();
	}*/
	
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
		var element = e.target.querySelector('[contenteditable]'), row;

		element && e.target != document.documentElement && e.target != document.body && element.focus();

		if (e.target.matchesSelector('.add3')) {
			document.querySelector('table.inventory3 tbody').appendChild(generateTableRow());
		}
		else if (e.target.className == 'cut3') {
			row = e.target.ancestorQuerySelector('tr');

			row.parentNode.removeChild(row);
		}

		updateInvoice();
		actualizartipoc();
	}

	function onEnterCancel(e) {
		e.preventDefault();

		image.classList.add3('hover');
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

	if (window.add3EventListener) {
		document.add3EventListener('click', onClick);

		document.add3EventListener('mousewheel', updateNumber);
		document.add3EventListener('keydown', updateNumber);

		document.add3EventListener('keydown', updateInvoice);
		document.add3EventListener('keyup', updateInvoice);

		document.add3EventListener('keydown', actualizartipoc);
		document.add3EventListener('keyup', actualizartipoc);



		input.add3EventListener('focus', onEnterCancel);
		input.add3EventListener('mouseover', onEnterCancel);
		input.add3EventListener('dragover', onEnterCancel);
		input.add3EventListener('dragenter', onEnterCancel);

		input.add3EventListener('blur', onLeaveCancel);
		input.add3EventListener('dragleave', onLeaveCancel);
		input.add3EventListener('mouseout', onLeaveCancel);

		input.add3EventListener('drop', onFileInput);
		input.add3EventListener('change', onFileInput);
	}
}

window.add3EventListener && document.add3EventListener('DOMContentLoaded', onContentLoad);
