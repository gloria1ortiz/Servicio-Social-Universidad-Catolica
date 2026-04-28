<?php
session_start();
include("conexion.php");

if(isset($_POST['login'])){
    
    $usuario = $_POST['identificacion'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios 
            WHERE identificacion='$usuario' 
            AND password='$password'";

    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0){
        $_SESSION['usuario'] = $usuario;
        header("Location: ProyectoGrado/dashboard.php");
        exit();
    } else {
        echo "<script>alert('Datos incorrectos');</script>";
    }
}
?>
