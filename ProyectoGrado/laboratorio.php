<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="dashboard-container">

    <div class="dashboard-header">
        Módulo Laboratorio
    </div>

    <div class="dashboard-body">

        <h3>Tareas disponibles</h3>

        <ul>
            <li>Inventario de equipos</li>
            <li>Mantenimiento básico</li>
            <li>Cuidado de herramientas</li>
        </ul>

        <p><strong>Adjuntar evidencia:</strong></p>

        <form action="subir_archivo.php" method="POST" enctype="multipart/form-data">
            
            <label class="btn-verde">
                Seleccionar archivo
                <input type="file" name="archivo" hidden required>
            </label>

            <br><br>

            <button type="submit" class="btn-verde">
                Subir evidencia
            </button>

        </form>

        <br>

        <a href="pagos.php" class="btn-volver">⬅ Volver a disponibilidades</a>

    </div>

</div>

</body>
</html>
