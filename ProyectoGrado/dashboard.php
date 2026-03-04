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
<h1>Registro de Servicio Social - UCP</h1>
    <div class="top-actions">
    <a href="index.php" class="btn-volver">← Volver al inicio</a>
</div>
    
    
    <div class="login-body">
        <h3>Bienvenido <?php echo $_SESSION['usuario']; ?></h3>
        <p>
            Bienvenido al registro de horas de servicio social de la UCP.
            Por favor seleccione la opción que corresponda:
        </p>

        <div class="menu-opciones">

    <a href="horas_actuales.php">
        ⏱ <br>
        <strong>Horas Registradas</strong>
        <p style="font-size:13px;">Consulta tus horas actuales</p>
    </a>

    <a href="horas_detalle.php">
        📊 <br>
        <strong>Progreso</strong>
        <p style="font-size:13px;">Revisa horas acumuladas y pendientes</p>
    </a>

    <a href="disponibilidades.php">
        💳 <br>
        <strong>Opciones de Pago</strong>
        <p style="font-size:13px;">Conoce las modalidades disponibles</p>
    </a>

</div>
<script>
    setTimeout(function(){
        alert("Sesión cerrada por inactividad");
        window.location.href = "logout.php";
    }, 300000); // 5 minutos
</script>
</body>
</html>





