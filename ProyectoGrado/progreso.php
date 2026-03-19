<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

$horas_acumuladas = 60;
$horas_requeridas = 120;
$horas_pendientes = $horas_requeridas - $horas_acumuladas;
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Horas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="login-container">
    <div class="login-header">
        Detalle de Servicio Social
    </div>

    <div class="login-body">
        <p>Horas acumuladas: <?php echo $horas_acumuladas; ?></p>
        <p>Horas requeridas: <?php echo $horas_requeridas; ?></p>
        <p>Horas pendientes: <?php echo $horas_pendientes; ?></p>

        <a href="dashboard.php"class="btn-volver">Volver al menú</a>
    </div>
    <div class="card-info">
    <strong>Horas acumuladas:</strong> <?php echo $horas_acumuladas; ?> horas
</div>

<div class="card-info">
    <strong>Horas pendientes:</strong> <?php echo $horas_pendientes; ?> horas
</div>

<div class="progress-container">
    <div class="progress-bar" style="width: <?php echo $porcentaje; ?>%;">
        <?php echo round($porcentaje); ?>%
    </div>
</div>
</div>

</body>
</html>
