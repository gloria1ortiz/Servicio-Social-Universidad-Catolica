<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

// Obtener datos de sesión
$horas_acumuladas = $_SESSION['horas_acumuladas'] ?? 0;
$horas_requeridas = $_SESSION['horas_requeridas'] ?? 0;

// Calcular horas pendientes (evita negativos)
$horas_pendientes = max(0, $horas_requeridas - $horas_acumuladas);

// Calcular porcentaje
$porcentaje = 0;
if($horas_requeridas > 0){
    $porcentaje = ($horas_acumuladas / $horas_requeridas) * 100;
}
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

        <h3>Resumen</h3>

        <p><strong>Horas acumuladas:</strong> <?php echo $horas_acumuladas; ?> horas</p>
        <p><strong>Horas requeridas:</strong> <?php echo $horas_requeridas; ?> horas</p>
        <p><strong>Horas pendientes:</strong> <?php echo $horas_pendientes; ?> horas</p>

        <div class="progress-container">
            <div class="progress-bar" style="width: <?php echo $porcentaje; ?>%;">
                <?php echo round($porcentaje); ?>%
            </div>
        </div>

        <br>

        <a href="dashboard.php" class="btn-volver">Volver al menú</a>

    </div>

</div>

</body>
</html>
