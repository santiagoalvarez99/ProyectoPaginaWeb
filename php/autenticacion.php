<?php      
    include('conn.php'); 
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);
    $sql = "select * from usuarios where nombre_user = ? and password = ?";
    $sentencia = $conn->prepare($sql);
    $sentencia->bind_param('ss', $username, $password);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($resultado);
    if($count == 1){  
        echo "<h1><center> Ingreso Válido </center></h1>";
        header("Location: tareas.php");  
    }  
    else{  
        echo "<h1> Ingreso Fallido. Usuario o Contraseña inválido.</h1>";  
    }        
    $sentencia->close();

    $resultado->free();

    $conn->close();
?>  