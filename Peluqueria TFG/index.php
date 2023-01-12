<?php 
	include 'conexion.php';

	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['user'];
	$id = $_SESSION["user_id"];
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
  <meta content="text/html;charset=UTF-8">
  <title>Peluqueria Rossi</title>
  <link rel="stylesheet" href="assets/css/style_index.css" type="text/css" >
  <link rel="icon" type="image/jpg" href="assets/img/icons8-huella-de-perro-40.png"/>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">

</head>
<body>
	<header class="header" id="inicio">

		<p class="session"> <?php if($varsesion == null || $varsesion = ''){
			?>
			<a href="login.php">Iniciar Sesion</a>

			<?php
			}else{
				echo $_SESSION['user'];
				echo $_SESSION['user_id']; ?>
				<a href="logout.php">Cerrar Sesion</a>
			<?php
			}			
				?>
		 </p>

		<img src="assets/img/MenuIcon.svg" class="hamburger">

		<nav class="menu_navegacion">
			<a href="#inicio">Inicio</a>
			<a href="#servicio">Servicio</a>
			<a href="#portfolio">Galeria</a>
			<a href="#contactos">Contacto</a>
		</nav>
		<div class="contenedor head">
			<h1 class="titulo">Cuidamos de tu mascota</h1>
			<p class="copy">En nuestra peluqueria canina trataremos a tu mascota para que se sienta como nueva</p>
		</div>

	</header>
	<main>
		<section class="contenedor" id="servicio">
			<h2 class="subtitulo">Informacion</h2>
			<div class="contenedor_servicio">
				<img src="assets/img/Checklist.svg">
				<div class="checklist_servicio">
					<div class="service">
						<h3 class="n-service"><span class="number">1</span>Corte de pelo</h3>
						<p>Para empezar a cortar el pelo a un perro primero habra que dejarlo bien peinado para un mejor corte y que el profesional vea bien lo que hace, por lo que es importante traer a tu mascota peinada para quitarle trabajo al profesional, una vez peinado el profesional le cortara el pelo al perro al gusto del cliente. <br/><br/>

						En Rossi disponemos del material necesario para que tu mascota quede de pasarela. </p>
					</div>
					<div class="service">
						<h3 class="n-service"><span class="number">2</span>Baño</h3>
						<p> Despues de cortarle el pelo al perro habra que asearle dandole un buen baño.<br/><br/>

						Para bañar a un animal se necesitan productos especiales para no dañar su piel y preveer enfermedades</p>
					</div>
					<div class="service">
						<h3 class="n-service"><span class="number">3</span>Secado</h3>
						<p>Y por ultimo, secarle el pelo es una tarea importante ya que sino tu mascota puede coger frio.<br/><br/>

						Una buena presentacion es importante.</p>
					</div>
					
				</div>
			</div>
		</section>

		<section class="gallery" id="portfolio">
			<div class="contenedor">
				<h2 class="subtitulo">Galeria</h2>
				<div class="contenedor_galeria">
					<img src="assets/img/galeria1.jpg" class="img_galeria">
					<img src="assets/img/galeria2.png" class="img_galeria">
					<img src="assets/img/galeria3.jpg" class="img_galeria">
					<img src="assets/img/galeria4.jpg" class="img_galeria">
					<img src="assets/img/galeria5.jpg" class="img_galeria">
					<img src="assets/img/galeria6.jpg" class="img_galeria">
					<img src="assets/img/galeria7.jpg" class="img_galeria">
					<img src="assets/img/galeria8.jpeg" class="img_galeria">
					<img src="assets/img/galeria9.jpg" class="img_galeria">
				</div>
			</div>
		</section>


		<section class="img_light">
			<img src="assets/img/Cross.svg" class="close" >
			<img src="assets/img/galeria4.jpg" class="agregar-imagen">
		</section>



		<section class="contenedor" id="expertos">
			<section class="experts">
				<div class="cont-expert" onclick="mostrar();">
					<img  src="assets/img/Info.svg">
					<h3 class="n-expert">Pedir cita</h3>
				</div>

				<div class="cont-expert">
					<a class="tarifas" href="assets/downloads/Tarifas.jpg" download>
						<img  src="assets/img/Tarifas.svg">
						<h3 class="n-expert">Tarifas</h3>
					</a>
				</div>

				<div class="cont-expert" onclick="mostrarP();">
					<img  src="assets/img/User.svg">
					<h3 class="n-expert">Profesionales</h3>
				</div>
			</section>
		</section>



		<?php 
		include 'conexion.php';
		session_start();

		if(isset($_POST['submit'])){
			if(($_POST['fecha_hora'])!= null && strlen($_POST['animal'])>=1 && strlen($_POST['corte_pelo'])>=1 ){
				$fecha = ($_POST['fecha_hora']);
				$animal = ($_POST['animal']);
				$pelo = ($_POST['corte_pelo']);
				$usuarios = ($_POST['id_users']);
				
				$consulta = "INSERT INTO citas(id_user, fecha_hora, animal, corte_pelo) VALUES ('$usuarios','$fecha','$animal','$corte_pelo')";
				$resultado = mysqli_query($con, $consulta);
				if ($resultado === TRUE) {
					echo'<script type="text/javascript">
	    		alert("Datos de la cita ingresados correctamente");
	    		window.location.href="index.php";
	    		</script>';
				}else{
					echo'<script type="text/javascript">
	    		alert("Error los datos de la cita no se pudieron ingresar a la base de datos");
	    		window.location.href="index.php";
	    		</script>';
				}

			}	
		}
		mysqli_close($con);
		?>

		<section id="citas_light" class="citas_light">
			<img src="assets/img/Cross.svg" class="close" onclick="ocultar();">

			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="citas_cont">		
				<h1 class="titulo_form">Pedir Cita</h1>

				<label>Selecciona una fecha y una hora</label>
				<input class="input_form" type="datetime-local" name="fecha_hora">
				
				<label>Animal:</label>		
				<select class="input_form" name="animal">
					<option>Perro</option>
					<option>Gato</option>
				</select>


				<label>Breve descripcion del pelo del animal:</label>
				<input class="input_form desc" type="text" name="corte_pelo"
				placeholder="Ej: Es un perro de agua irlandes con pelo rizado y largo.">

				<input type="hidden" name="id_users" value="<?php echo $id; ?>">


				<?php 
				$varsesion = $_SESSION['user'];
				if($varsesion == null || $varsesion = ''){

					?><a class="link_citas" href="login.php">Inicio de sesion requerido</a><?php
				}else{
					?><input class="input_submit" type="submit" name="submit" ><?php 
				}
				?>
			</form>
		</section>

		<section id="profesional_light" class="profesional_light">
			<img src="assets/img/Cross.svg" class="close" onclick="ocultarP();">
			

			<div class="contenedorDesc">
				<img src="assets/img/imgPeluquera.jpeg" class="imgPeluquera" >
				<h2 class="nombreP">Rosa flores de la rosa</h2>
				<p class="textoP">Hola soy una peluquera canina con 30 años de experiencia. 
					Apasionada de su trabajo y domino tecnicas en stripping,tijera y maquina.<br>
					Poseo como cualidad la atención al detallé, fidelizacion  de el cliente y capacitación de calmar perros difíciles de manejó.</p>
			</div>

		</section>


	</main>

	<footer id="contactos">
		<div class="social-media">
			<a href="https://es-es.facebook.com/" class="social-media-icon">
				<i class='bx bxl-facebook-circle'></i>
			</a>
			<a href="https://www.instagram.com/" class="social-media-icon">
				<i class='bx bxl-instagram'></i>
			</a>
			<a href="https://twitter.com/" class="social-media-icon">
				<i class='bx bxl-twitter' ></i>
			</a>
		</div>
	</footer>

	<script src="assets/js/menu.js"></script>
	<script src="assets/js/lightbox.js"></script>
	<script src="assets/js/Citas.js"></script>
	<script src="assets/js/profesionales.js"></script>

</body>
</html>