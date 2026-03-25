<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eventos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="dashboard-container">

    <div class="dashboard-header">
        Módulo Eventos
    </div>

    <div class="dashboard-body">

        <h3>Tareas disponibles</h3>

        <ul>
            <li>Apoyo logístico</li>
            <li>Organización de eventos</li>
            <li>Atención a participantes</li>
        </ul>

        <p><strong>Adjuntar evidencia:</strong></p>
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
