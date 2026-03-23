<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}


$horas_acumuladas = 60;
$horas_requeridas = 120;
$horas_pendientes = $horas_requeridas - $horas_acumuladas;
$porcentaje = ($horas_acumuladas / $horas_requeridas) * 100;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Disponibilidades</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="login-container">

    <div class="login-header">
        Disponibilidades para pagar
    </div>

    <div class="login-body">

        <p>Actualmente existen las siguientes opciones:</p>

        <ul>
            <li>Pago total del servicio social</li>
            <li>Pago parcial (50%)</li>
            <li>Convenio institucional</li>
        </ul>

        <!-- 🔽 AQUÍ VAN  MÓDULOS  -->
           <div class="modulos-grid">
            <a href="biblioteca.php" class="modulo-card">📚 Biblioteca</a>
            <a href="cie.php" class="modulo-card">📁 CIE</a>
            <a href="laboratorio.php" class="modulo-card">🔬 Laboratorio</a>
            <a href="eventos.php" class="modulo-card">📅 Eventos</a>
        </div>
        <!-- BOTÓN -->
        <div style="text-align:center; margin-top:20px;">
            <a href="dashboard.php" class="btn-volver">Volver al menú</a>
        </div>

    </div>
</div>

</body>
</html>
