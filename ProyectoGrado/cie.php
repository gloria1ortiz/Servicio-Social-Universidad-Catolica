<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CIE</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="dashboard-container">
    <div class="dashboard-header">Módulo CIE</div>
    <div class="dashboard-body">
        <h3>Tareas disponibles</h3>
        <ul>
            <li>Migración de cursos</li>
            <li>Revisión de diseños</li>
            <li>Apoyo en contenidos educativos</li>
        </ul>

        <p><strong>Adjuntar evidencia:</strong></p>

        <!-- Mostrar mensaje de sesión si existe -->
        <?php if (isset($_SESSION['mensaje'])): ?>
            <div style="padding: 10px; background: #f0f0f0; margin-bottom: 15px;">
                <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
            </div>
        <?php endif; ?>

       <form action="subir_archivo.php" method="POST" enctype="multipart/form-data">

    <p><strong>Selecciona la actividad:</strong></p>

    <select name="modulo" required>
        <option value="">-- Seleccionar --</option>
        <option value="CIE">CIE</option>
        <option value="Laboratorio">Laboratorio</option>
        <option value="Eventos">Eventos</option>
        <option value="Biblioteca">Biblioteca</option>
    </select>

    <br><br>

    <label class="btn-verde">
        Seleccionar archivos
        <input type="file" name="archivo[]" multiple hidden required>
    </label>

    <br><br>

    <button type="submit" class="btn-verde">
        Guardar evidencia
    </button>

</form>
