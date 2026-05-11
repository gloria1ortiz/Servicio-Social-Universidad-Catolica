<?php
session_start();
include("conexion.php");

/* GUARDAR EVIDENCIA */
if(isset($_POST['guardar'])){

    $usuario = $_SESSION['usuario'];
    $actividad = $_POST['actividad'];
    $tipo = "laboratorio";

    foreach($_FILES['archivo']['name'] as $key => $nombreArchivo){

        $tmp = $_FILES['archivo']['tmp_name'][$key];
        $ruta = "uploads/" . $nombreArchivo;

        if(move_uploaded_file($tmp, $ruta)){

            $sql = "INSERT INTO evidencias (usuario, actividad, archivo, tipo) 
                    VALUES ('$usuario', '$actividad', '$nombreArchivo', '$tipo')";
            mysqli_query($conexion, $sql);
        }
    }

    $_SESSION['mensaje'] = "✅ Archivo(s) subido(s) correctamente";
    header("Location: laboratorio.php");
    exit();
}

/* OBTENER EVIDENCIAS */
$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM evidencias 
        WHERE usuario='$usuario' AND tipo='laboratorio'";

$resultado = mysqli_query($conexion, $sql);
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

    <div class="modulo-content">

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
        <form method="POST" enctype="multipart/form-data">

            <p><strong>Selecciona la actividad:</strong></p>

            <select name="actividad" required>
                <option value="">-- Seleccionar --</option>
                <option value="Inventario de equipos">Inventario de equipos</option>
                <option value="Mantenimiento básico">Mantenimiento básico</option>
                <option value="Cuidado de herramientas">Cuidado de herramientas</option>
            </select>

            <br><br>

            <input type="file" name="archivo[]" multiple required>

            <br><br>

             <button type="submit" name="guardar" class="btn-verde">
                Guardar evidencia
            </button>

        </form>

        <br>

        <h3>📄 Evidencias registradas</h3>

        <?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

            <div style="margin-bottom:15px;">

                <strong>Actividad:</strong> <?php echo $fila['actividad']; ?><br><br>

                <a href="uploads/<?php echo $fila['archivo']; ?>" target="_blank">
                    📄 Ver
                </a>

                <a href="eliminar.php?id=<?php echo $fila['id']; ?>&tipo=laboratorio">
                    🗑 Eliminar
                </a>

            </div>

        <?php } ?>

        <br>

        <a href="pagos.php" class="btn-volver">⬅ Volver al menú</a>

    </div>

</div>

    </div>

</div>

</div>

</body>
</html>
