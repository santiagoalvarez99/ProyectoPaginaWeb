<?php      
    include('conn.php');
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		goto inicio;
	}
	else {
		header("Location: error.php");
	}
    inicio:
    $username = $_POST['user'];  
    $password = $_POST['pass'];
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);
    $sql = "select * from usuarios where nombre_user = ?";
    $sentencia = $conn->prepare($sql);
    $sentencia->bind_param('s', $username);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($resultado);
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    if($count == 1){
        $query2 = "SELECT password FROM usuarios WHERE nombre_user= ?";
        $sentencia2 = $conn->prepare($sql);
        $sentencia2->bind_param('s', $username);
        $sentencia2->execute();
        $resultado2 = $sentencia2->get_result();
        $row = mysqli_fetch_array($resultado2, MYSQLI_ASSOC);
        $hash = $row['password'];
        if(password_verify($password, $hash )){
            echo "<h1><center> Ingreso Válido </center></h1>";
            header("Location: tareas.php");
        }
    }  
    else{ 
        echo "<h1> Ingreso Fallido. Usuario o Contraseña inválido.</h1>";  
    }        
    $sentencia->close();

    $resultado->free();

    $conn->close();
?>  