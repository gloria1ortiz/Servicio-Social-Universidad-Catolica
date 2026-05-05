<?php
session_start();
include("conexion.php");

if(isset($_POST['entrar'])){

    $_SESSION['usuario'] = "Gloria";

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>

<style>
body {
    font-family: Arial;
    background: #f2f2f2;
}

.login-container {
    width: 350px;
    margin: 100px auto;
    background: white;
    border-radius: 10px;
    box-shadow: 0px 0px 10px #ccc;
    overflow: hidden;
}

.login-header {
    background: #1f7a3f;
    color: white;
    text-align: center;
    padding: 15px;
    font-size: 20px;
}

.input-group {
    padding: 10px 20px;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.btn-verde {
    width: 90%;
    margin: 15px auto;
    display: block;
    background: #1f7a3f;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
}

.btn-verde:hover {
    background: #16632f;
}
</style>

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
        <button type="submit" name="entrar" class="btn-verde">
            ENTRAR
        </button>

    </form>

</div>

</body>
</html>
