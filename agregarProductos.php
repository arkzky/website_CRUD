<?php  
	session_start();
	if( ! isset( $_SESSION['usuario'] ) )
	{
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Producto</title>
	<link rel="stylesheet" href="estilo.css">
	<script src="jquery-3.3.1.js"></script>
</head>
<body>
<div class="contenedor">
		<nav class="navegador">
			<ul>
				<li><a class="logo" href="inicio.php"><img src="img/AGPP.png"></a></li>
				<li id="verde" ><a href="inicio.php">Inicio</a></li>
				<li id="amarillo"><a href="verProductos.php">Ver Productos</a></li>
				<li id="azulClaro"><a href="verPartes.php">Ver Partes</a></li>
				<li class="activaAzulMarino" id="azulMarino"><a href="agregarProductos.php">Agregar Productos</a></li>
				<li id="rosa"><a href="cerrarSesion.php">Cerrar Sesión</a></li>
			</ul>
		</nav>
	</div>	
	
	<div class="layout">
		<form class="columna" method="POST" action="">
			<h2>Agrega un producto</h2>
			<label for="codigo">Codigo: </label><br>
			<input class="entrada" type="number" min="1" name="codigo" required autofocus>

			<br><br>

			<label for="nombre">Nombre: </label><br>
			<input class="entrada" type="text" name="nombre" required>

			<br><br>
			
			<label for="descripcionProducto">Descripcion: </label><br>
			<input class="entrada" id="descripcion" type="text" name="descripcionProducto" required>
		</form>
			
		<form class="columna" id="envio "method="POST" action="">
				<h2>Agrega las partes del producto</h2>
				<label for="clave">Clave: </label> <br>
				<input class="entrada" type="text" name="clave" required>

				<br><br>

				<label for="descripcionPieza">Descripcion: </label><br>
				<input class="entrada" id="descripcion" type="text" name="descripcionPieza" required>
				
				<br><br>
				
				<label for="precio">Precio: </label><br>
				<input class="entrada" type="number" min="0.00" step="0.1" name="precio" required>

				<br><br>

				<input class="btn" id="enviar" type="submit" value="Agregar Parte">
				<br><br>
		</form>
		</div>
		<br><br>
		
		<div class="logo">
			<button class="btn" id="terminar">Terminar Producto</button>
		</div>
			
		<h2>Partes</h2>

		<table class='tabla' id="salida"> 
			<tr>
				<th>Clave</th> <th> Descripcion </th> <th> Precio </th>
			</tr>

		</table>		
		<br>
		<p id="total"></p>
		<!-- <button class="btn" id="borrar">Borrar datos</button> -->
		<script src="AJAX.js"></script>
</body>
</html>