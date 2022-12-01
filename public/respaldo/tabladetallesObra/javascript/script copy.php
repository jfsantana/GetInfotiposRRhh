<?php 

$variable=construye_combo_valueScript();

function construye_combo_valueScript(){
	$valor_seleccion="";
	$conexion2=dbcon();	
	$sql="SELECT * FROM tbl_clasificacion order by Clasificacion";
	$resultado_complejo=mysqli_query($conexion2,$sql)or die(mysqli_error($conexion2));

	$parte1="<select class='form-control' id ='clasificacion' name='clasificacion[]' onchange='actualizarclasificacion(this)'>";
		$parte2="";
	if (($valor_seleccion=="")|| ($valor_seleccion=="SELECCIONE") ){
		$parte2="<option selected='selected' >SELECCIONE</option>";
	}
	while($rowc = mysqli_fetch_array($resultado_complejo)){
		
		$id=$rowc['id_clasificacion'];
		$descripcion=$rowc['Clasificacion'];
		
		if ($id==$valor_seleccion){$seleccion=" selected='selected' ";}
		else{$seleccion=" ";} 
			$parte3="<option value='$id' $seleccion>$descripcion</option>";
		$parte2=$parte2.$parte3;
					
				
	}// while($rowc = mysqli_fetch_array($resultado_complejo))
				
		$parte4="</select>";
		
		$combo=$parte1.$parte2.$parte4;
		
		return $combo;
}
    
?>

<script>

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

function generateTableRow() {  /* Genera   la nueva FILA*/
	var emptyColumn = document.createElement('tr');
	var combo="<?php echo $variable;  ?>";
	emptyColumn.innerHTML = "<td colspan=1 style='text-decoration:none'><a class='cut' style='text-decoration:none'>-</a><span ></span></td><td colspan=11 ><span >"+combo+"</span></td><td colspan=4  ><span ><input type='text' name='cantidad_Obra[]' id='cantidad_Obra' onchange='actualizartipoc(this)' /></span></td><td hidden='hidden'><input type='hidden' name='carticulo[]' id='carticulo[]' value='' /></td>";

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
}

/* Update Invoice
/* ========================================================================== */

function updateInvoice() {
	var total = 0;
	var siva = 0;
	var cells, celd,price, total, a, i,iva, siva;

	// update inventory cells
	// ======================	

	for (var a = document.querySelectorAll('table.inventory tbody tr'), i = 0; a[i]; ++i) {
		// get inventory row cells
		cells = a[i].querySelectorAll('span:last-child');
		cells[0].innerHTML = i+1; // Introduzco el numero de ITEM
	}	
	//actualizarSelect();
	actualizarClasificacion();
}

/* On Content Load
/* ========================================================================== */
function actualizartipoc(celda) {
	var valoresaceptados=/^[0-9]+$/;
	numero=celda.value;
	if 	(celda.value!=""){
		if ( !valoresaceptados.test(numero)){
			alert("El campo NO es Numerico");
			celda.value="";
			exit;
		}


		var cells, price, total, a, i,b,k;

	}	
}


function actualizarClasificacion(celda) {
	
	var total = 0;
	var cells, price, total, a, i;	

	for (var a = document.querySelectorAll('table.inventory tbody tr'), i = 0; a[i]; ++i) {
			// get inventory row cells

		selectactual=a[i].querySelectorAll('select');

		actual =selectactual[0].value; 

		if (i!=0){ 
			k=i-1;  
		
			selectanterior=a[k].querySelectorAll('select');

			anterior =selectanterior[0].value; 

			if (actual==anterior){
				alert("Valor de i: "+i);
				alert("Valor de a: "+ anterior);
			}
		
		} 
		
	}
}


/* On Content Load
/* ========================================================================== */

function onContentLoad() {
	updateInvoice();
	var
	input = document.querySelector('input'),
	image = document.querySelector('img');

	function onClick(e) {
		var element = e.target.querySelector('[contenteditable]'), row;

		element && e.target != document.documentElement && e.target != document.body && element.focus();

		if (e.target.matchesSelector('.add')) {
			document.querySelector('table.inventory tbody').appendChild(generateTableRow());
		}
		else if (e.target.className == 'cut') {
			row = e.target.ancestorQuerySelector('tr');

			row.parentNode.removeChild(row);
		}

		updateInvoice();
		//actualizartipoc();
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

	//	document.addEventListener('keydown', actualizartipoc);
	//	document.addEventListener('keyup', actualizartipoc);



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
</script>