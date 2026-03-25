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

        <br>

        <!-- MOSTRAR -->
        <?php if(isset($_SESSION['evidencias'])){ ?>

            <h3>📄 Evidencias registradas</h3>

            <?php foreach($_SESSION['evidencias'] as $e){ ?>

                <?php if(
                    $e['modulo'] == "Inventario de equipos" ||
                    $e['modulo'] == "Mantenimiento básico" ||
                    $e['modulo'] == "Cuidado de herramientas"
                ){ ?>

                    <div style="margin-bottom:15px;">

                        <strong>Actividad:</strong> <?php echo $e['modulo']; ?><br><br>

                        <a href="uploads/<?php echo $e['archivo']; ?>" target="_blank" class="btn-verde">
                            📄 Ver
                        </a>

                        <a href="eliminar.php?archivo=<?php echo $e['archivo']; ?>" class="btn-verde">
                            🗑 Eliminar
                        </a>

                    </div>

                <?php } ?>

            <?php } ?>

        <?php } ?>

        <br>

        <a href="pagos.php" class="btn-volver">⬅ Volver a disponibilidades</a>

    </div>

</div>

</body>
</html>
