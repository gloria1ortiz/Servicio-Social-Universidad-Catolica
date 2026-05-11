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
    <title>Disponibilidades</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="dashboard-container">

    <!-- HEADER -->
    <div class="dashboard-header">
        Disponibilidades para pagar
    </div>

    <!-- BODY -->
    <div class="dashboard-body">

        <p class="dashboard-text">
            Actualmente existen las siguientes opciones para realizar servicio social:
        </p>

        <!-- TARJETAS -->
        <div class="menu-opciones">

            <!-- BIBLIOTECA -->
            <a href="biblioteca.php" class="modulo-card">

                <div class="icon">📚</div>

                <h3>Biblioteca</h3>

                <p>
                    Entrega de libros, organización de estanterías
                    y apoyo administrativo.
                </p>

            </a>

            <!-- CIE -->
            <a href="cie.php" class="modulo-card">

                <div class="icon">📁</div>

                <h3>CIE</h3>

                <p>
                    Migración de cursos, revisión de contenidos
                    y acompañamiento académico.
                </p>

            </a>

            <!-- LABORATORIO -->
            <a href="laboratorio.php" class="modulo-card">

                <div class="icon">🔬</div>

                <h3>Laboratorio</h3>

                <p>
                    Inventarios, mantenimiento básico
                    y cuidado de equipos tecnológicos.
                </p>

            </a>

            <!-- EVENTOS -->
            <a href="eventos.php" class="modulo-card">

                <div class="icon">📅</div>

                <h3>Eventos</h3>

                <p>
                    Apoyo logístico en actividades institucionales
                    y eventos universitarios.
                </p>

            </a>

        </div>

        <br>

        <!-- BOTÓN -->
        <a href="dashboard.php" class="btn-verde">
            ⬅ Volver al menú
        </a>

    </div>

</div>

</body>
</html>
