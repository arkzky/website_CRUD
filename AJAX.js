// AJAX con JQuery
var carrito = "";
var suma = 0.0;
$(document).ready(function() {
	$("#enviar").click(function(event) {
		event.preventDefault();

		var clave       = $("input[name='clave']").val();
		var	descripcion = $("input[name='descripcionPieza']").val();
		var precio      = $("input[name='precio']").val();

		var encabezado = "<tr><th>Clave</th> <th> Descripcion </th> <th> Precio </th></tr>";
		carrito += "<tr> <td>"+clave+"</td> <td>"+descripcion+"</td> <td>$"+precio+"</td> </tr>";
		var tabla = encabezado + carrito;
		$('#salida').html(tabla);	


		suma += parseFloat(precio);
		var costoProducto = "Costo Producto $"+suma;
		$('#total').html(costoProducto);	
	});
	
	

	$("#borrar").click(function(event) {
		$.ajax({
			url: 'borrarPiezas.php',
			success: function(data) {
				$('#salida').html(data);
			}
		});
	});

	$("#enviar2").click(function(event) {
		event.preventDefault();

		$.ajax({
			url: 'insertarPieza.php',
			type: 'POST',
			// dataType: 'json',
			data: { clave:       $("input[name='clave']").val(),
					descripcion: $("input[name='descripcionPieza']").val(),
					precio: 	 $("input[name='precio']").val()
					},
			success: function(data) {
				$('#salida').html(data);
			}
		});
	});


	$("#borrar2").click(function(event) {
		$.ajax({
			url: 'borrarPiezas.php',
			success: function(data) {
				$('#salida').html(data);
			}
		});
	});
});