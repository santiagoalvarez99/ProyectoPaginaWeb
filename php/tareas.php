<?php
	session_start();
	if (isset($_SESSION['username'])){
		$usernameSesion = $_SESSION['username'];
        $username = htmlspecialchars($usernameSesion); 
	}
	else {
		header("Location: error.php");
	}
	if (isset($_SESSION['password'])){
		$passwordSesion = $_SESSION['password'];
        $password = htmlspecialchars($passwordSesion); 
	}
?>
<!DOCTYPE html>
	<html lang="es">
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</head>
	<script>
		function actualizar_tarea(fetch_id)
		{
		// Esta es la variable que vamos a pasar
			debugger;
			var descripcion = document.getElementById('descripcion').value;
			var data = {
				descripcion: descripcion,
				task_id: fetch_id
			};
			/*$(document).ready(function() {
    			$('#loginform').submit(function(e) {
        		e.preventDefault();*/
       			$.ajax({
            		type: "POST",
            		url: 'actualizar_tarea.php',
            		data: data,
            		success: function(response) {
                		// var jsonData = JSON.parse(response);
						console.log('success' + response);
                		// user is logged in successfully in the back-end
                		// let's redirect
           			}
    			});
		};
	</script>
	<body>
	<div class="col-md-3">
		<p>Usuario: <?php echo $username?></p>
		<form action="cerrar_sesion.php" method="post">
			<input type="submit" class="btn btn-danger" value="Cerrar Sesión">
		</form>
	</div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Simple To Do List App</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form method="POST" class="form-inline" action="agregar_tarea.php">
				<input type="text" class="form-control" name="task" required/>
				<button class="btn btn-primary form-control" name="add">Agregar Nueva Tarea</button>
			</form>
		</div>
		<br /><br /><br />
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Tarea</th>
					<th>Estado</th>
					<th>Fecha de Creación</th>
					<th>Fecha de Modificación</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'conn.php';
					$query = $conn->query("SELECT * FROM `tareas` ORDER BY `id` ASC");
					$count = 1;
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $count++?></td>
					<td><?php if($fetch['estado'] == 1){?>
							<?php echo $fetch['descripcion'];
						}
						else{?>
							<input id="descripcion" type="text" name="descripcion" placeholder="<?php echo $fetch['descripcion']?>"/>
						<?php } ?></td>
					<td><?php if($fetch['estado'] == 1){
							echo "Finalizada";
						}
						else{
							echo "Por Hacer";
						}?></td>
					<td><?php echo $fetch['fecha_creacion']?></td>
					<td><?php echo $fetch['fecha_modificacion']?></td>
					<td colspan="4">
						
						<?php
							if($fetch['estado'] != 1){
								echo 
								// '<a href="actualizar_tarea.php?task_id='.$fetch['id'].'&descripcion='.$_POST['descripcion'].'" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span>Actualizar Tarea</a>';
								'<button type="button" onclick="actualizar_tarea(' . $fetch['id'] . ');"><span class="glyphicon glyphicon-check"></span>Actualizar Tarea</button>';
								echo '<a href="cambiar_estado_tarea.php?task_id='.$fetch['id'].'" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Finalizar Tarea</a>';
							}
						?>
						<a href="eliminar_tarea.php?task_id=<?php echo $fetch['id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Eliminar Tarea</a>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>

let desc = getELbyid("desc")
// ajax