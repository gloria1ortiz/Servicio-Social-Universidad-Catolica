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

            <!-- Módulos como botones verdes con descripción -->
        <div class="modulos-grid">
            <a href="biblioteca.php" class="modulo-card">
                <strong>📚 Biblioteca</strong><br>
                <span class="descripcion-modulo">Entrega de libros y organización</span>
            </a>
            <a href="cie.php" class="modulo-card">
                <strong>📁 CIE</strong><br>
                <span class="descripcion-modulo">Migración de cursos y revisión</span>
            </a>
            <a href="laboratorio.php" class="modulo-card">
                <strong>🔬 Laboratorio</strong><br>
                <span class="descripcion-modulo">Inventarios y cuidado de equipos</span>
            </a>
            <a href="eventos.php" class="modulo-card">
                <strong>📅 Eventos</strong><br>
                <span class="descripcion-modulo">Apoyo en actividades</span>
            </a>
        </div>

        <br>
        <a href="dashboard.php" class="btn-verde">⬅ Volver al menú</a>
    </div>
</div>
</body>
</html>
