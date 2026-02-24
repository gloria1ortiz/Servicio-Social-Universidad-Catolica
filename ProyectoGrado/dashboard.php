<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Servicio Social - UCP</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="login-container">
    <div class="login-header">
        Registro de Servicio Social - UCP
    </div>

    <div class="login-body">
        <h3>Bienvenido <?php echo $_SESSION['usuario']; ?></h3>
        <p>
            Bienvenido al registro de horas de servicio social de la UCP.
            Por favor seleccione la opción que corresponda:
        </p>

        <div class="menu-opciones">
        <a href="horas_actuales.php">Revisar cuántas horas tiene</a>
        <a href="horas_detalle.php">Revisar horas acumuladas y horas pendientes</a>
        <a href="disponibilidades.php">Disponibilidades para pagar el servicio social</a>
        </div>

        <br>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</div>

</body>
</html>

