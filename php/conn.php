<?php
	$conn = new mysqli("localhost", "root", "", "tareas_db");
 
	if(!$conn){
		die("Error: Cannot connect to the database");
	}
?>