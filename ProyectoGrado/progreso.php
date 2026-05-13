<?php
session_start();
include("conexion.php");

/* VALIDAR SESIÓN */
if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['usuario'];

/* TOTAL HORAS */
$sql = "SELECT SUM(horas) as total FROM horas WHERE usuario='$usuario'";
$result = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($result);
$total_horas = $fila['total'] ?? 0;

/* HORAS REQUERIDAS */
$sql2 = "SELECT horas_requeridas FROM configuracion WHERE usuario='$usuario'";
$result2 = mysqli_query($conexion, $sql2);
$fila2 = mysqli_fetch_assoc($result2);
$horas_requeridas = $fila2['horas_requeridas'] ?? 0;

/* CALCULAR PENDIENTES */
$horas_pendientes = max(0, $horas_requeridas - $total_horas);

/* PORCENTAJE */
$porcentaje = 0;
if($horas_requeridas > 0){
    $porcentaje = min(100, ($total_horas / $horas_requeridas) * 100);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Detalle de Servicio Social</title>
<link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="login-container">

    <div class="login-header">
        Detalle de Servicio Social
    </div>

    <div class="login-body">

        <h3>Resumen</h3>

        <p><strong>Horas acumuladas:</strong> <?php echo $total_horas; ?></p>
        <p><strong>Horas requeridas:</strong> <?php echo $horas_requeridas; ?></p>
        <p><strong>Horas pendientes:</strong> <?php echo $horas_pendientes; ?></p>

        <!-- MENSAJE FINAL -->
        <?php if($horas_pendientes == 0 && $horas_requeridas > 0){ ?>
            <p style="color: green; font-weight:bold;">
                ✅ ¡Servicio social completado!
            </p>
        <?php } ?>

        <br>

        <!-- BARRA DE PROGRESO -->
        <div class="progress-container">
            <div class="progress-bar" style="width: <?php echo $porcentaje; ?>%;">
                <?php echo round($porcentaje); ?>%
            </div>
        </div>

        <br>

        <!-- BOTÓN PDF (AQUÍ VA CORRECTAMENTE) -->
        <a href="reporte.php" class="btn-verde">
            📄 Descargar Reporte PDF
        </a>

        <br><br>

        <a href="dashboard.php" class="btn-volver">
            ⬅ Volver al menú
        </a>

    </div>

</div>

</body>
</html>
