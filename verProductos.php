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
	<title>Productos</title>
	<link rel="stylesheet" href="estilo.css">
	<script src="jquery-3.3.1.js"></script>
</head>
<body>
<div class="contenedor">
		<nav class="navegador">
			<ul>
				<li><a class="logo" href="inicio.php"><img src="img/AGPP.png"></a></li>
				<li id="verde" ><a href="inicio.php">Inicio</a></li>
				<li class="activaAmarillo" id="amarillo"><a href="verProductos.php">Ver Productos</a></li>
				<li id="azulClaro"><a href="verPartes.php">Ver Partes</a></li>
				<li id="azulMarino"><a href="agregarProductos.php">Agregar Productos</a></li>
				<li id="rosa"><a href="cerrarSesion.php">Cerrar Sesión</a></li>
			</ul>
		</nav>
	</div>

	<h2>Tabla de Productos</h2>

	<div class="tabla">
	<?php 
    	require_once 'biblioteca.php';

		$servidor = "localhost";
		$usuario = "alejandro";
		$passwd = "perez";
		$db = "alejandro";
		$conexion = mysqli_connect($servidor, $usuario, $passwd, $db) or die("MYSQL dice: " . mysqli_error($conexion));

		//Paso 3) Crear la consulta SQL
		$sql = "SELECT * FROM ap_productos";
		//Paso 4) Ejecutar la consulta
		$resultado = mysqli_query($conexion, $sql);
		//Paso 5) Explorar el resultado

		$tabla = array();
         //Paso 5) Explorar el resultado
         while($renglon=mysqli_fetch_array($resultado, MYSQLI_ASSOC) ){
             $tabla[] = $renglon;
         }
         echo recorrerTabla($tabla);

		// while ($renglon = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {//mysql_assoc devuelve un arreglo asociativo
		// echo "$renglon[ap_nombre] | $renglon[ap_descripcion] | $renglon[ap_precio] <br>";
		// }
		//Paso 6) 
		mysqli_free_result($resultado);
		//Paso 7)
		mysqli_close($conexion);
	 ?>
	 </div>
	 <br><br>
	 <div class="logo">
	 	<button class="btn" id="borrarProductos">Borrar Productos</button>
	 </div>
	 	
	 <script src="AJAX.js"></script>
</body>
</html>