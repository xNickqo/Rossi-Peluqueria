<?php
require_once('conexion.php');

session_start();
 
if(isset($_POST['submit'])){
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	$consulta= "SELECT id FROM users WHERE email = '$email' and password = '$password'";

	$resultado=mysqli_query($con, $consulta);

	$filas=mysqli_num_rows($resultado);

	if($filas>0){
		$user_id = mysqli_fetch_row($resultado)[0];
		$_SESSION["user_id"] = $user_id;
		$_SESSION['user'] = $email;
		header("location:index.php");
	}else{
		echo'<script type="text/javascript">
	    	alert("Error");
	    	window.location.href="login.php";
	    	</script>';
	}
	mysqli_free_result($resultado);
	mysqli_close($con);
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title> Registrate </title>
	<link rel="stylesheet" href="assets/css/style_login.css">
	<link rel="icon" type="image/jpg" href="assets/img/icons8-huella-de-perro-40.png"/>
</head>

<body>
		<header>
			<a class="link-a-header" href="index.php">
				<img class="logo-header" src="assets/img/icons8-huella-de-perro-40.png" alt="">
			</a>
			<nav>
				<a class="ingreso" href="login.php">Ingreso</a>
				<button class="boton-login" > <a href="register.php">Registro</a></button>
			</nav>

		</header>
		<main>
			<div class="login-cont">

				<img class="avatar" src="assets/img/icons8-huella-de-perro-40.png" alt="">

				<h5>Únete a nosotros</h5> 

				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
					<div class="introducir">
						<input class="input-int" type="text" name="email" 	placeholder="Correo electronico">
						
					</div>
					<div class="introducir">
						<input class="input-int" type="password" name="password" placeholder="Contraseña">
						
					</div>

					<div class="boton-registrar">
						<input class="iniciarahora" type="submit" name="submit" value="Iniciar ahora">
					</div>
				</form>

				<div>
					<a class="linkend" href="register.php">¿No tienes cuenta? Create una cuenta.</a>
				</div>
			</div>
		</main>
		<footer>
			
		</footer>
</body>

</html>