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
    <p style="text-align:center; font-weight:500;">
    👩‍🎓 Estudiante: <?php echo $_SESSION['usuario']; ?>
</p>
} else {
    echo "Credenciales incorrectas. <a href='index.php'>Volver</a>";
}
?>



