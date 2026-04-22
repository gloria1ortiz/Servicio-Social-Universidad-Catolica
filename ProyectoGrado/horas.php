<?php
session_start();
include("conexion.php");

/* VALIDAR SESIÓN */
if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['usuario'];

/* =========================
   GUARDAR HORAS REQUERIDAS
========================= */
if(isset($_POST['guardar_config'])){

    $horas_requeridas_post = $_POST['horas_requeridas'];

    $check = mysqli_query($conexion, "SELECT * FROM configuracion WHERE usuario='$usuario'");

    if(mysqli_num_rows($check) > 0){
        // ACTUALIZAR (CORREGIDO)
        mysqli_query($conexion, "UPDATE configuracion 
                                SET horas_requeridas = '$horas_requeridas_post' 
                                WHERE usuario='$usuario'");
    } else {
        // INSERTAR
        mysqli_query($conexion, "INSERT INTO configuracion (usuario, horas_requeridas)
                                VALUES ('$usuario','$horas_requeridas_post')");
    }
}

/* =========================
   REGISTRAR HORAS
========================= */
if(isset($_POST['registrar_horas'])){

    $horas = $_POST['horas'];
    $fecha = $_POST['fecha'];
    $actividad = $_POST['actividad'];

    mysqli_query($conexion, "INSERT INTO horas (usuario, horas, fecha, actividad, estado)
    VALUES ('$usuario','$horas','$fecha','$actividad','pendiente')");
}

/* =========================
   CONSULTAR DATOS
========================= */

// TOTAL HORAS
$resultado = mysqli_query($conexion, "SELECT SUM(horas) as total 
                                     FROM horas 
                                     WHERE usuario='$usuario'");
$fila = mysqli_fetch_assoc($resultado);
$total_horas = $fila['total'] ?? 0;

// CALCULAR PENDIENTES
$horas_pendientes = max(0, $horas_requeridas - $total_horas);
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

        <!-- CONFIGURACIÓN -->
        <h3>Configurar horas requeridas</h3>

        <form method="POST">
            <input type="number" name="horas_requeridas" placeholder="Ej: 120" required>
            <br><br>
            <button name="guardar_config" class="btn-verde">Guardar</button>
        </form>

        <hr>

        <!-- REGISTRO -->
        <h3>Registrar actividad</h3>

        <form method="POST">
            <input type="number" name="horas" placeholder="Horas" required>

            <input type="date" name="fecha" required>

            <select name="actividad" required>
                <option value="">Seleccione</option>
                <option>Biblioteca</option>
                <option>CIE</option>
                <option>Laboratorio</option>
                <option>Eventos</option>
            </select>

            <br><br>
            <button name="registrar_horas" class="btn-verde">Registrar</button>
        </form>

        <hr>

        <!-- RESUMEN -->
        <h3>Resumen</h3>

        <p><strong>Total horas:</strong> <?php echo $total_horas; ?></p>
        <p><strong>Horas requeridas:</strong> <?php echo $horas_requeridas; ?></p>
        <p><strong>Faltantes:</strong> <?php echo $horas_pendientes; ?></p>

        <?php if($horas_pendientes == 0 && $horas_requeridas > 0){ ?>
            <p style="color: green; font-weight:bold;">
                ✅ ¡Felicidades! Has completado tu servicio social
            </p>
        <?php } ?>

        <br>

        <a href="dashboard.php" class="btn-volver">⬅ Volver</a>

    </div>

</div>

</body>
</html>
