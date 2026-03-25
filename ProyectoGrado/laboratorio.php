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

    <p><strong>Selecciona la actividad:</strong></p>

    <select name="modulo" required>
        <option value="">-- Seleccionar --</option>
        <option value="Inventario de equipos">Inventario de equipos</option>
        <option value="Mantenimiento básico">Mantenimiento básico</option>
        <option value="Cuidado de herramientas">Cuidado de herramientas</option>
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
