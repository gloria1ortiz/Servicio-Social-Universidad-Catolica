<?php
session_start();

$usuario = $_POST['identificacion'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

// Usuario genérico
$usuario_valido = "estudiante";
$contrasena_valida = "12345";

if($usuario === $usuario_valido && $contrasena === $contrasena_valida){

   $_SESSION['usuario'] = $usuario;
   $_SESSION['rol'] = 'admin'; // o 'estudiante'

    header("Location: dashboard.php");
    exit();

} else {

    echo "Credenciales incorrectas. <a href='index.php'>Volver</a>";

}
?>


