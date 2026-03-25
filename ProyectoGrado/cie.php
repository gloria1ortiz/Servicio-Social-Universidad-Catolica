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

    <div class="dashboard-header">
        Módulo CIE
    </div>

    <div class="dashboard-body">

        <h3>Tareas disponibles</h3>

        <ul>
            <li>Migración de cursos</li>
            <li>Revisión de diseños</li>
            <li>Apoyo en contenidos educativos</li>
        </ul>

        <p><strong>Adjuntar evidencia:</strong></p>

        <!-- MENSAJE -->
        <?php if (isset($_SESSION['mensaje'])): ?>
            <div style="padding: 10px; background: #f0f0f0; margin-bottom: 15px;">
                <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
            </div>
        <?php endif; ?>

        <!-- FORMULARIO -->
        <form action="subir_archivo.php" method="POST" enctype="multipart/form-data">

            <p><strong>Selecciona la actividad:</strong></p>

            <select name="modulo" required>
                <option value="">-- Seleccionar --</option>
                <option value="Migración de cursos">Migración de cursos</option>
                <option value="Revisión de diseños">Revisión de diseños</option>
                <option value="Apoyo en contenidos educativos">Apoyo en contenidos educativos</option>
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

        <br>

        <!-- MOSTRAR EVIDENCIAS -->
        <?php if(isset($_SESSION['evidencias'])){ ?>

            <h3>📄 Evidencias registradas</h3>

            <?php foreach($_SESSION['evidencias'] as $e){ ?>

                <?php if($e['modulo'] == "Migración de cursos" || 
                          $e['modulo'] == "Revisión de diseños" || 
                          $e['modulo'] == "Apoyo en contenidos educativos"){ ?>

                    <div style="margin-bottom:15px;">

                        <strong>Actividad:</strong> <?php echo $e['modulo']; ?><br><br>

                        <!-- VER -->
                        <a href="uploads/<?php echo $e['archivo']; ?>" target="_blank" class="btn-verde">
                            📄 Ver
                        </a>

                        <!-- ELIMINAR -->
                        <a href="eliminar.php?archivo=<?php echo $e['archivo']; ?>" class="btn-verde">
                            🗑 Eliminar
                        </a>

                    </div>

                <?php } ?>

            <?php } ?>

        <?php } ?>

        <br>

        <!-- VOLVER -->
        <a href="pagos.php" class="btn-volver">⬅ Volver a disponibilidades</a>

    </div>

</div>

</body>
</html>
