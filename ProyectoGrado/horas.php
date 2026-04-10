<?php
session_start();

// VALIDAR SESIÓN
if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

// OBTENER ID DEL USUARIO (AJUSTA SI TU SESIÓN USA OTRO NOMBRE)
$usuario_id = $_SESSION['usuario'];

// CONEXIÓN
include("conexion.php");


// GUARDAR REGISTRO
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fecha = $_POST['fecha'];
    $actividad = $_POST['actividad'];
    $horas = $_POST['horas'];

    // VALIDAR ARCHIVO
    if(isset($_FILES['evidencia']) && $_FILES['evidencia']['error'] == 0){

        $nombre_archivo = $_FILES['evidencia']['name'];
        $ruta = "uploads/" . $nombre_archivo;

        move_uploaded_file($_FILES['evidencia']['tmp_name'], $ruta);

    } else {
        $ruta = "";
    }

    // INSERTAR EN BD
    $sql_insert = "INSERT INTO horas_servicio (usuario_id, fecha, actividad, horas, evidencia)
                   VALUES ('$usuario_id', '$fecha', '$actividad', '$horas', '$ruta')";

    mysqli_query($conexion, $sql_insert);
}


// CALCULAR HORAS
$sql = "SELECT SUM(horas) as total FROM nombre_real WHERE usuario_id = '$usuario_id'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);

// SI NO HAY REGISTROS
$horas_actuales = $fila['total'] ? $fila['total'] : 0;


// PROGRESO
$horas_requeridas = 120;
$horas_pendientes = $horas_requeridas - $horas_actuales;
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

        <h3>Detalle de Servicio Social</h3>

        <p><strong>Horas acumuladas:</strong> <?php echo $horas_actuales; ?> horas</p>
        <p><strong>Horas requeridas:</strong> <?php echo $horas_requeridas; ?> horas</p>
        <p><strong>Horas pendientes:</strong> <?php echo $horas_pendientes; ?> horas</p>

        <hr>

        <a href="dashboard.php" class="btn-volver">Volver al menú</a>

    </div>
</div>

</body>
</html>
