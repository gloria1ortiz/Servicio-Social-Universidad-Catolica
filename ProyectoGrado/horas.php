<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Horas Actuales</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="login-container">

    <div class="login-header">
        Horas Actuales
    </div>

    <div class="login-body">

        <!-- CONFIGURAR HORAS -->
        <h3>Configurar horas del servicio social</h3>

        <form method="POST">
            <label>Horas requeridas:</label><br>
            <input type="number" name="horas_requeridas" required><br><br>

            <button type="submit" name="guardar_config" class="btn-verde">
                Guardar configuración
            </button>
        </form>

        <hr>

        <!-- REGISTRAR HORAS -->
        <h3>Registrar horas de servicio social</h3>

        <form method="POST">

            <label>Cantidad de horas:</label>
            <input type="number" name="horas" min="1" required>

            <label>Fecha:</label>
            <input type="date" name="fecha" required>

            <label>Actividad:</label>
            <select name="actividad" required>
                <option value="">Seleccione</option>
                <option>Entrega de Libros en Biblioteca</option>
                <option>Migración de Cursos</option>
            </select>

            <br><br>

            <button type="submit" name="registrar_horas" class="btn-volver">
                Registrar horas
            </button>

        </form>

        <br>

        <a href="dashboard.php" class="btn-volver">
            Volver al menú
        </a>

    </div>

</div>

</body>
</html>
