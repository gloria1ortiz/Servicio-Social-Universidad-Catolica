<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estado de Validación</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="dashboard-container">

    <div class="dashboard-header">
        Estado de Validación
    </div>

    <div class="dashboard-body">

        <div class="card-info">

            <h2>Estado actual</h2>

            <br>

            <p>
                Tus horas registradas se encuentran:
            </p>

            <br>

            <h3 style="color: #28a745;">
                ✅ En revisión
            </h3>

            <br>

            <p>
                El coordinador validará tus horas próximamente.
            </p>

        </div>

        <br>

        <a href="dashboard.php" class="btn-verde">
            ← Volver al menú
        </a>

    </div>

</div>

</body>
</html>
