<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio de Sesion</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<div class="cabecera"></div>

	<div class="fila">
	<div class="columna_costados"></div>
	    <div class="columna_principal">
			<div class="columna_costados_interno"></div>
				<form class="formulario" method="POST" action="">
					<br><br>
	        		<img src="img/AGPP.png" alt="">
	        		<br><br>
	        		<br>
						<input class="entrada" id="usuario" type="text" name="usuario" placeholder="Usuario" required autofocus>
					<br>

					<br>
					<input class="entrada" id="contrasenia" type="password" name="contrasenia" placeholder="Contraseña" required>

					<br><br><br>
	              	<button class="boton" type="submit"><span>Iniciar Sesión </span></button>
	              	<br><br>

	              	<?php
	              		session_start();
							if(isset($_POST["usuario"]) && isset($_POST["contrasenia"]))
							{
								if($_POST["usuario"] == "Admin" && $_POST["contrasenia"] == "privado")
								{
										$_SESSION['usuario'] = 1;
										header("Location: inicio.php");
								}
								else
								{
									if($_POST["usuario"] != "Admin")
									{
										echo "<p>Usuario incorrecto</p>";
									}

									if($_POST["contrasenia"] != "privado")
									{
										echo "<p>Contraseña incorrecta</p>";
									}

								}
		              		}
					?>


				</form>

	        <div class="columna_costados_interno"></div>
	    </div>
	   	
	   	<div class="columna_costados"></div>
	</div>

</body>
</html>