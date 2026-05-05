<?php
session_start();
include("conexion.php");

if(!empty($_POST['usuario']) && !empty($_POST['password'])){

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if($usuario === "estudiante" && $password === "12345"){
        $_SESSION['usuario'] = $usuario;

        // 🔥 FORZAR REDIRECCIÓN
        echo "<script>window.location='dashboard.php';</script>";
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
