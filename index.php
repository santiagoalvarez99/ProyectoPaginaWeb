<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de Tareas - ToDo List APP</title>
	<link href="https://fonts.googleapis.com/css?family=Martel+Sans|Roboto&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/animate.css">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<script>  
		function validation()  
		{  
			var nombre=document.getElementById('txt_nombre').value;  
			var apellido=document.getElementById('txt_apellido').value;  
			var email=document.getElementById('txt_email').value;
			debugger;
			if(nombre.length=="" && apellido.length=="" && email.length=="") {  
				alert("Por favor, llene todos los campos");  
				return false;  
			}  
			else  
			{  
				if(nombre.length=="") {  
					alert("El campo Nombre está vacío");  
					return false;  
				}   
				if (apellido.length=="") {  
					alert("El campo Apellido está vacío");  
					return false;  
				}
				if(email.length==""){
					alert("El campo Email está vacío");
					return false;
				}  
			}                             
		}  
</script> 

</head> 
<body>
	<nav>
		<ul>
			<li class="wow bounceInDown" data-wow-duration="2s" data-wow-delay=".5s"><a href="#">Inicio</a></li>
			<li class="wow bounceInDown" data-wow-duration="2s" data-wow-delay="1s"><a href="#descripcion">Conócenos</a></li>
			<li class="wow bounceInDown" data-wow-duration="2s" data-wow-delay="1.5s"><a href="#contacto">Contacto</a></li>
			<li class="wow bounceInDown" data-wow-duration="2s" data-wow-delay="2s"><a id="acceso" href="./login-clientes.php" target="_blank">Acceso Usuarios</a></li>
		</ul>
	</nav>
	<header> 
		<div class="contenedor">
			<div class="contenedortitulo">
			<h1 class="wow bounceInRight" data-wow-delay="2s" data-wow-duration="3s">ToDo List APP</h1>
		</div>
	</div>
	</header>

	<main>
		<div class="descripcion">
			<div class="contenedor">
				<article>
					<h3 class="wow fadeInRight" data-wow-duration="3s">Sobre ToDoList</h3>
					<p class="wow rotateInDownRight" data-wow-duration="3s">ToDoList es una aplicación organizadora de tareas basada en la nube. Permite a los usuarios gestionar sus tareas desde cualquier lugar. Organiza tus tareas, listas y recordatorios en una aplicación fácil de tareas pendientes. ToDoList se sincroniza de manera fluida en todos tus dispositivos, haciendo que tu lista de tareas pendientes sea accesible en todos lados.</p>
				</article>
			</div>
		</div>
		</div>
		<div class="contacto">
			<div class="contenedor">
				<h1>Contacto</h1>
				<form class="wow fadeInRight" data-wow-duration="3s" action="./php/envia.php" method="post" novalidate onsubmit="validation()">
						<div><p>Para realizar una contratación de nuestra APP, complete el siguiente formulario</p></div>
						<div><p>Todos los campos marcados con * son requeridos.</p></div>
						<br>
						<fieldset title="Datos Personales" id="fld_datos_personales">
						<legend>Datos Personales</legend>
							<div><label>Nombre*: <input type="text" id="txt_nombre" name="txt_nombre" value="" required maxlength="100"></label></div>
							<br>
							<div><label>Apellido*: <input type="text" id="txt_apellido" name="txt_apellido" value="" required maxlength="100"></label></div>
							<br>
							<div><label>Email*: <input type="email" id="txt_email" name="txt_email" value="" required maxlength="100"></label></div>
							<br>
							<div><textarea id="txt_mensaje" name="txt_mensaje" rows="5" cols="50">Escribe aquí tu comentario: </textarea></div>
						</fieldset>
						<div><input type="submit" name="btn_enviar" value="Enviar"></div>
				</form>
			</div>
		</div>
	</main>
	<footer>
		<div class="contenedor">
			<p>Diseñada por Santiago Alvarez</p>
		</div>
	</footer>
</body>
</html>