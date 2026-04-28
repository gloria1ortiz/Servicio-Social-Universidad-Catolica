<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("../conexion.php");

if(isset($_POST['login'])) {

    $usuario = $_POST['identificacion'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios 
            WHERE identificacion='$usuario' 
            AND password='$password'";

    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0) {
        $_SESSION['usuario'] = $usuario;
        echo "LOGIN OK";
        exit();
    } else {
        echo "<script>alert('Datos incorrectos');</script>";
    }
}
?>
