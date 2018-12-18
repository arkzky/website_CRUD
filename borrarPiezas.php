<?php 
	require_once 'biblioteca.php';

	$servidor = "localhost";
	$usuario = "alejandro";
	$passwd = "perez";
	$db = "alejandro";
	$conexion = mysqli_connect($servidor, $usuario, $passwd, $db) or die("MYSQL dice: " . mysqli_error($conexion));

	$sql = "DELETE FROM ap_partes";

	mysqli_query($conexion, $sql);

	$sql = "SELECT * FROM ap_partes";

	//Paso 4) Ejecutar la consulta
	$resultado = mysqli_query($conexion, $sql);

	//Paso 5) Explorar el resultado
	$tabla = array();
	//Paso 5) Explorar el resultado
	while($renglon=mysqli_fetch_array($resultado, MYSQLI_ASSOC) ){
	    $tabla[] = $renglon;
	}
	echo recorrerTabla($tabla);

	mysqli_close($conexion);
?>