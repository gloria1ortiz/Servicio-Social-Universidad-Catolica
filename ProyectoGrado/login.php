<?php
session_start();
include("conexion.php");

$error = "";

if(isset($_POST['login'])){

    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM usuarios 
            WHERE usuario='$usuario' 
            AND password='$password'";

    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0){

        $fila = mysqli_fetch_assoc($resultado);

        $_SESSION['usuario'] = $fila['usuario'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['rol'] = $fila['rol'];

        if($fila['rol'] == 'admin'){
            header("Location: admin.php");
        } else {
            header("Location: dashboard.php");
        }

        exit();

    } else {
        $error = "❌ Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicio Social</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="login-container">

    <div class="login-header">
        Servicio Social
    </div>

    <div class="login-body">

        <form method="POST" class="form-login">

            <div class="input-group">
                <input 
                    type="text"
                    name="usuario"
                    placeholder="Usuario"
                    required>
            </div>

            <div class="input-group">
                <input 
                    type="password"
                    name="password"
                    placeholder="Contraseña"
                    required>
            </div>

            <button 
                type="submit"
                name="login"
                class="btn-login">

                ENTRAR

            </button>

        </form>

        <?php if(!empty($error)){ ?>

            <p class="error-message">
                <?php echo $error; ?>
            </p>

        <?php } ?>

    </div>

</div>

</body>
</html>
