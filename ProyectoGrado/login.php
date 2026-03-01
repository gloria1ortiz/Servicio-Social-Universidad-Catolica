<?php
$_SESSION['usuario'] = "Mayerly Ortiz";

$usuario = $_POST['identificacion'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

// Usuario genérico
$usuario_valido = "estudiante";
$contrasena_valida = "12345";

if($usuario === $usuario_valido && $contrasena === $contrasena_valida){
    $_SESSION['usuario'] = $usuario;
    header("Location: dashboard.php");
    exit();
} else {
    echo "Credenciales incorrectas. <a href='index.php'>Volver</a>";
}
?>



