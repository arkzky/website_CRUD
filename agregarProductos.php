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
			<input class="entrada" type="number" name="codigo" required autofocus>

			<br><br>

			<label for="nombre">Nombre: </label><br>
			<input class="entrada" type="text" name="nombre" required>

			<br><br>
			
			<label for="descripcionProducto">Descripcion: </label><br>
			<input class="entrada" id="descripcion" type="text" name="descripcionProducto" required>

			<br><br>
			<input class="btn" type="submit" value="Terminar Producto">
			<br><br>
		</form>
			<?php 
			if(isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["descripcionProducto"]))
			{
				$servidor = "localhost";
				$usuario = "alejandro";
				$passwd = "perez";
				$db = "alejandro";
				$conexion = mysqli_connect($servidor, $usuario, $passwd, $db) or die("MYSQL dice: " . mysqli_error($conexion));
				// echo "Paso 1 y 2. Ok <br>";
				//Paso 3) Crear la consulta SQL
				$sql = "INSERT INTO ap_productos (ap_codigo, ap_nombre, ap_descripcion) VALUES ('{$_POST['codigo']}', '{$_POST['nombre']}', '{$_POST['descripcionProducto']}')";

				//Paso 4) Ejecutar la consulta
				$resultado = mysqli_query($conexion, $sql);

				//Paso 7)
				mysqli_close($conexion);
			}
		?>
			
		<form class="columna" id="envio "method="POST" action="">
				<h2>Agrega las partes del producto</h2>
				<label for="clave">Clave: </label> <br>
				<input class="entrada" type="text" name="clave" required>

				<br><br>
				
				<label for="precio">Precio: </label><br>
				<input class="entrada" type="number" min="0.00" step="0.01" name="precio" required>

				<br><br>

				<label for="descripcionPieza">Descripcion: </label><br>
				<input class="entrada" id="descripcion" type="text" name="descripcionPieza" required>
				
				<br><br>

				<input class="btn" type="submit" value="Agregar Parte">
				<br>
		</form>
		<br>
		<?php 

			if(isset($_POST["clave"]) && isset($_POST["descripcionPieza"]) && isset($_POST["precio"]))
			{
				$servidor = "localhost";
				$usuario = "alejandro";
				$passwd = "perez";
				$db = "alejandro";
				$conexion = mysqli_connect($servidor, $usuario, $passwd, $db) or die("MYSQL dice: " . mysqli_error($conexion));

				$sql = "INSERT INTO ap_partes (ap_clave, ap_descripcion, ap_precio) VALUES ('{$_POST['clave']}', '{$_POST['descripcionPieza']}', '{$_POST['precio']}')";

				$resultado = mysqli_query($conexion, $sql);
				//Paso 7)
				mysqli_close($conexion);
			}
		?>
		</div>
</body>
</html>