<?php 
include("conexion.php");
session_start();


if(isset($_POST['submit'])){
	if(strlen($_POST['nombre'])>=1 && strlen($_POST['apellido'])>=1 && strlen($_POST['email'])>=1 && strlen($_POST['telefono'])>=1 && strlen($_POST['password'])>=1){
		$name = trim($_POST['nombre']);
		$apellido = trim($_POST['apellido']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$telefono = trim($_POST['telefono']);
		$consulta = "INSERT INTO users(nombre, apellidos, email, password, telefono) VALUES ('$name','$apellido','$email','$password','$telefono')";
		$resultado = mysqli_query($con, $consulta);


		if($resultado){
			$_SESSION['user_id'] = $con->insert_id;
			header('Location:login.php');
		}
	}else{
		echo'<script type="text/javascript">
    	alert("Error");
    	window.location.href="register.php";
    	</script>';
	}
	mysqli_close($con);
		
}



 ?>




<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title> Registrate </title>
	<link rel="stylesheet" href="assets/css/style_register.css">
	<link rel="icon" type="image/jpg" href="assets/img/icons8-huella-de-perro-40.png"/>
</head>


<body>
		<header>
			<a class="link-a-header" href="index.php">
				<img class="logo-header" src="assets/img/icons8-huella-de-perro-40.png" alt="">
			</a>
			<nav>
				<a class="ingreso" href="login.php">Ingreso</a>
				<button class="boton-login" > <a href="register.html">Registro</a></button>
			</nav>

		</header>
		<main>
			<div class="register-cont">

				<h5>Únete a nosotros </h5>

				<p>Rellena los campos solicitados para crear tu cuenta y utiliza nuestra aplicación.</p>

				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
					<div class="column">
						<input class="input-int" type="text" name="nombre" placeholder="Nombre">
						<input class="input-int-right" type="text" name="apellido" placeholder="Apellido">
					</div>
					<div class="column">
						<input class="correo" type="text" name="email" placeholder="ejemplo@dominio.com">
					</div>
					<div class="column">
						<input class="input-int" type="password" name="password" placeholder="Clave de seguridad">
						<input class="input-int-right" type="text" name="telefono" placeholder="Numero de telefono">
					</div>

					<p>Al registrarse, esta permitiendo el uso de sus datos proporcionados para que sean usados en la aplicación</p>

					<div class="boton-registrar">
						<input class="iniciarahora"  type="submit" name="submit" value="Iniciar ahora">
					</div>
				</form>

				<div>
					<a class="linkend" href="login.php">¿Ya tienes cuenta? Ingresa a tu cuenta</a>
				</div>
			</div>
		</main>
		<footer>
			
		</footer>
</body>

</html>