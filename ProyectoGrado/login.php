<?php
session_start();
include("conexion.php");

if(isset($_POST['login'])){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // VALIDACIÓN SIMPLE (puedes mejorar luego con BD)
    if($usuario == "estudiante" && $password == "12345"){
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

    <form method="POST">

        <div class="input-group">
            <input type="text" name="usuario" placeholder="Usuario" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Contraseña" required>
        </div>

        <!-- BOTÓN VERDE -->
        <button type="submit" name="login" class="btn-login">
            ENTRAR
        </button>

    </form>

    <?php if(isset($error)){ ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php } ?>

</div>

</body>
</html>
