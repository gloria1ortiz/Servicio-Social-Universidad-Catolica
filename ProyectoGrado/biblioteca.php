<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="dashboard-container">

    <div class="dashboard-header">
        Módulo Biblioteca
    </div>

    <div class="dashboard-body">

        <h3>Tareas disponibles</h3>

        <ul>
            <li>Entrega de libros</li>
            <li>Organización de estanterías</li>
            <li>Cuidado de la biblioteca</li>
        </ul>
 <p><strong>Adjuntar evidencia:</strong></p>
<form action="subir_archivo.php" method="POST" enctype="multipart/form-data">

    <p><strong>Selecciona la actividad:</strong></p>

    <select name="modulo" required>
        <option value="">-- Seleccionar --</option>
        <option value="Entrega de libros">Entrega de libros</option>
        <option value="Organización de estanterías">Organización de estanterías</option>
        <option value="Cuidado de la biblioteca">Cuidado de la biblioteca</option>
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
