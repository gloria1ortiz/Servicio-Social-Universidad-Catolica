<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

/* GUARDAR HORAS REQUERIDAS */
if(isset($_POST['horas_requeridas'])){
    $_SESSION['horas_requeridas'] = $_POST['horas_requeridas'];
}

/* REGISTRAR HORAS */
if(isset($_POST['horas'])){
    $horas = $_POST['horas'];

    if(!isset($_SESSION['horas_acumuladas'])){
        $_SESSION['horas_acumuladas'] = 0;
    }

    $_SESSION['horas_acumuladas'] += $horas;
}

/* VARIABLES */
$horas_actuales = $_SESSION['horas_acumuladas'] ?? 0;
$horas_requeridas = $_SESSION['horas_requeridas'] ?? 0;
$horas_pendientes = max(0, $horas_requeridas - $horas_actuales);
?>

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

            <button type="submit" class="btn-verde">
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

            <button type="submit" class="btn-volver">
                Registrar horas
            </button>

        </form>

        <hr>

        <!-- RESUMEN -->
        <h3>Resumen</h3>

        <p><strong>Horas acumuladas:</strong> <?php echo $horas_actuales; ?> horas</p>
        <p><strong>Horas requeridas:</strong> <?php echo $horas_requeridas; ?> horas</p>
        <p><strong>Horas pendientes:</strong> <?php echo $horas_pendientes; ?> horas</p>

        <br>

        <a href="dashboard.php" class="btn-volver">
            Volver al menú
        </a>

    </div>

</div>

</body>
</html>
