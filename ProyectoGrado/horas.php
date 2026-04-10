<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
    include("conexion.php"); // tu conexión a MySQL

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario_id = $_SESSION['usuario'];
    $fecha = $_POST['fecha'];
    $actividad = $_POST['actividad'];
    $horas = $_POST['horas'];

    // guardar archivo
    $nombre_archivo = $_FILES['evidencia']['name'];
    $ruta = "uploads/" . $nombre_archivo;
    move_uploaded_file($_FILES['evidencia']['tmp_name'], $ruta);

    // insertar en BD
    $sql = "INSERT INTO horas_servicio (usuario_id, fecha, actividad, horas, evidencia)
            VALUES ('$usuario_id', '$fecha', '$actividad', '$horas', '$ruta')";

    mysqli_query($conexion, $sql);
}
}

$horas_actuales = 60;
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

        <h3>Registra tus horas de servicio social</h3>

        <form action="" method="POST" enctype="multipart/form-data">

            <label>Cantidad de horas:</label>
            <input type="number" name="horas" min="1" placeholder="Ej: 4" required>

            <label>Fecha:</label>
            <input type="date" name="fecha" required>

            <label>Actividad:</label>
            <select name="actividad" required>
                <option value="">Seleccione</option>
                <option>Entrega de Libros en Biblioteca</option>
                <option>Migración de Cursos</option>
            </select>

            <label>Evidencia:</label>
            <input type="file" name="evidencia" required>

            <button type="submit" class="btn-volver">Registrar horas</button>

        </form>

        <hr>

        <h3>Horas registradas:</h3>
        <p><?php echo $horas_actuales; ?> horas</p>

        <a href="dashboard.php" class="btn-volver">Volver al menú</a>

    </div>
</div>

</body>
</html>
        
