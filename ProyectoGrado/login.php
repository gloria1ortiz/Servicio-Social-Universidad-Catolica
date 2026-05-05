<?php
session_start();

if(isset($_POST['entrar'])){
    $_SESSION['usuario'] = "Gloria";
    include("conexion.php");
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
.btn-verde{
    background:#1f7a3f;
    color:white;
    border:none;
    padding:12px;
    border-radius:8px;
    cursor:pointer;
}
</style>

</head>
<body>

<form method="POST">
    <button type="submit" name="entrar" class="btn-verde">
        ENTRAR
    </button>
</form>

</body>
</html>
