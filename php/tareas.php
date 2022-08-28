<?php
	session_start();
	if (isset($_SESSION['username'])){
		$usernameSesion = $_SESSION['username'];
        $username = htmlspecialchars($usernameSesion); 
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
	</head>
	<body>
	<div class="col-md-3"></div>
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
					<td><?php echo $fetch['descripcion']?></td>
					<td><?php if($fetch['estado'] == 1){
							echo "Finalizada";
						}
						else{
							echo "Por Hacer";
						}?></td>
					<td colspan="2">
						<?php
							if($fetch['estado'] != 1){
								echo 
								'<a href="actualizar_tarea.php?task_id='.$fetch['id'].'" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Actualizar Tarea</a> |';
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
		<div>
			<a href=./../login.html class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Cerrar Sesión</a>
		</div>
	</div>
</body>
</html>