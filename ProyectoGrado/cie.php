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
            <label class="btn-verde">
                Seleccionar archivo
                <input type="file" name="archivo" hidden required>
            </label>
            <br><br>
            <button type="submit" class="btn-verde">Subir evidencia</button>
        </form>

        <?php if (isset($_SESSION['archivos']) && !empty($_SESSION['archivos'])): ?>
            <h4 style="color:green;">✔ Evidencias cargadas:</h4>
            <?php foreach ($_SESSION['archivos'] as $archivo): ?>
                <div style="margin-bottom:10px;">
                    <a href="uploads/<?php echo htmlspecialchars($archivo); ?>" target="_blank" class="btn-verde">📄 Ver</a>
                    <a href="eliminar.php?archivo=<?php echo urlencode($archivo); ?>" class="btn-verde">🗑 Eliminar</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <br>
        <a href="pagos.php" class="btn-volver">⬅ Volver a disponibilidades</a>
    </div>
</div>
</body>
</html>
