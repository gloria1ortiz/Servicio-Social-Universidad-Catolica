<?php
session_start();

$error = "";

if(isset($_POST['login'])){

    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    /* LOGIN ESTUDIANTE */
    if($usuario == "estudiante" && $password == "12345"){

        $_SESSION['usuario'] = "estudiante";
        $_SESSION['nombre'] = "Estudiante";
        $_SESSION['rol'] = "estudiante";

        header("Location: dashboard.php");
        exit();

    }

    /* LOGIN ADMINISTRADOR */
    elseif($usuario == "admin" && $password == "246810"){

        $_SESSION['usuario'] = "admin";
        $_SESSION['nombre'] = "Administrador";
        $_SESSION['rol'] = "admin";

        header("Location: admin.php");
        exit();

    }

    /* ERROR */
    else{

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

<body class="login-page">

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
