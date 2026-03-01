<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

$horas_acumuladas = 60;
$horas_requeridas = 120;
$porcentaje = ($horas_acumuladas / $horas_requeridas) * 100;
$horas_pendientes = $horas_requeridas - $horas_acumuladas;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Horas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
    <script>
    setTimeout(function(){
        alert("Sesión cerrada por inactividad");
        window.location.href = "logout.php";
    }, 300000); // 5 minutos
</script>
<body>

<div class="login-container">
    <div class="login-header">
        📊 Progreso Servicio Social
        <div style="text-align:center; margin-top:20px;">
    <div style="
        width:120px;
        height:120px;
        border-radius:50%;
        background: conic-gradient(
            <?php echo $color; ?> <?php echo $porcentaje; ?>%,
            #e0e0e0 <?php echo $porcentaje; ?>%
        );
        display:flex;
        align-items:center;
        justify-content:center;
        margin:auto;
        font-weight:bold;
        font-size:18px;
        color:#333;
    ">
        <?php echo round($porcentaje); ?>%
    </div>

    </div>

    <div class="login-body">

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

        <a class="volver" href="dashboard.php">⬅ Volver al menú</a>
    </div>
</div>

</body>
</html>
