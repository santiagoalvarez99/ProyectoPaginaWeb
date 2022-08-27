<?php
	$conn = new mysqli("localhost", "root", "", "tareas_db");
 
	if(!$conn){
		die("Error: No fue posible la conexión a la base de datos");
	}
?>