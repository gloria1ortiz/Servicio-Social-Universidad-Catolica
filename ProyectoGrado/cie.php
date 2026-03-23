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

<div class="login-container">

    <div class="login-header">
        CIE
    </div>

    <div class="login-body">

        <p>Migración de cursos y revisión de contenidos</p>

        <!-- AQUÍ VA EL FORMULARIO -->
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

        <!-- BOTÓN DE VOLVER -->
        <div style="text-align:center; margin-top:20px;">
            <a href="pagos.php" class="btn-volver">⬅ Volver a disponibilidades</a>
        </div>

    </div>
</div>
