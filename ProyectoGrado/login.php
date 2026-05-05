<?php
session_start();
include("conexion.php");

// Solo se ejecuta cuando se envía el formulario
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar que existan los campos
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validación simple (prueba)
    if($usuario === "estudiante" && $password === "12345"){
        $_SESSION['usuario'] = $usuario;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="login-container">

    <div class="login-header">
        Portal Estudiantil
    </div>

    <form method="POST" action="">

        <div class="input-group">
            <input type="text" name="usuario" placeholder="Usuario" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Contraseña" required>
        </div>

        <button type="submit" class="btn-login">
            ENTRAR
        </button>

    </form>

    <?php if(isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

</div>

</body>
</html>
