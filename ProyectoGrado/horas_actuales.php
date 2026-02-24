<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

// Aquí luego traerás datos de la base de datos
$horas_actuales = 60; // ejemplo
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Horas Actuales</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="login-container">
    <div class="login-header">
        Horas Actuales
    </div>

    <div class="login-body">
        <h3>Horas registradas:</h3>
        <p><?php echo $horas_actuales; ?> horas</p>

        <a href="dashboard.php">Volver al menú</a>
    </div>
</div>

</body>
</html>
