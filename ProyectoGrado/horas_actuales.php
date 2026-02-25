<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

$horas_actuales = 60;
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
        ⏱ Horas Registradas
    </div>

    <div class="login-body">
        <div class="card-info">
            Usted ha registrado <strong><?php echo $horas_actuales; ?></strong> horas de servicio social.
        </div>

        <a class="volver" href="dashboard.php">⬅ Volver al menú</a>
    </div>
</div>

</body>
</html>
