// AJAX con JQuery
var carrito = "";
var suma = 0.0;
var claveArr       = [];
var descripcionArr = [];
var precioArr      = [];

$(document).ready(function() {
	$("#enviar").click(function(event) {
		event.preventDefault();

		// Extraer valores de las entradas
		var clave       = $("input[name='clave']").val();
		var	descripcion = $("input[name='descripcionPieza']").val();
		var precio      = $("input[name='precio']").val();

		if(precio == '')
		{
			precio = 0.0;
		}

		// Armar el carrito
		var encabezado = "<tr><th>Clave</th> <th> Descripcion </th> <th> Precio </th></tr>";
		carrito += "<tr> <td>"+clave+"</td> <td>"+descripcion+"</td> <td>$"+precio+"</td> </tr>";
		var tabla = encabezado + carrito;
		$('#salida').html(tabla);	

		// Calcular el costo del producto
		suma += parseFloat(precio);
		var costoProducto = "Costo Producto $"+suma;
		$('#total').html(costoProducto);	

		// Guardar atributos para tentativo almacenamiento en la BD
		claveArr.push(clave);
		descripcionArr.push(descripcion);
		precioArr.push(precio);

		//limipiar entrada
		$("input[name='clave']").val('');
		$("input[name='descripcionPieza']").val('');
		$("input[name='precio']").val('');

		//Enfocar en la entrada de nuevo
		$("input[name='clave']").val('').focus();
	});

	$("#terminar").click(function(event) {
		event.preventDefault();
		for (var i = 0; i < claveArr.length; i++) 
		{
			$.ajax({
				url: 'insertarParte.php',
				type: 'POST',
				data: { clave:            	 claveArr[i],
						descripcionPieza: 	 descripcionArr[i],
						precio: 	      	 precioArr[i]
						}
			});
		}

		$.ajax({
				url: 'insertarProducto.php',
				type: 'POST',
				data: { codigo:          	 $("input[name='codigo']").val(),
						nombre:           	 $("input[name='nombre']").val(),
						descripcionProducto: $("input[name='descripcionProducto']").val(),
						precio :  			 suma
						}
			});

		for (var i = 0; i < claveArr.length; i++) 
		{
			$.ajax({
					url: 'insertarComponentes.php',
					type: 'POST',
					data: { clave:            	 claveArr[i],
							codigo: 	  		 $("input[name='codigo']").val()
							}
				});
		}

		window.location.replace("verProductos.php");
	});
	
	

	$("#borrarPiezas").click(function(event) {
		$.ajax({
			url: 'borrarPiezas.php',
			success: function(data) {
				$('.tabla').html(data);
			}
		});
	});

	$("#borrarProductos").click(function(event) {
		$.ajax({
			url: 'borrarProductos.php',
			success: function(data) {
				$('.tabla').html(data);
			}
		});
	});
});