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

/* Color dinámico según progreso */
if($porcentaje < 50){
    $color = "#e74c3c"; // rojo
}elseif($porcentaje < 80){
    $color = "#f39c12"; // naranja
}else{
    $color = "#f39c12"; // naranja
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

<script>
setTimeout(function(){
    alert("Sesión cerrada por inactividad");
    window.location.href = "logout.php";
}, 300000); // 5 minutos
</script>

<div class="login-container">

    <div class="login-header">
        📊 Progreso Servicio Social
    </div>

    <div style="text-align:center; margin-top:20px;">
        <a href="index.php" class="btn-volver">← Volver al menú
    </div>

    <!-- Círculo de progreso -->
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
        margin:30px auto;
        font-weight:bold;
        font-size:18px;
        color:#333;
    ">
        <?php echo round($porcentaje); ?>%
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

    </div>

</div>

</body>
</html>
