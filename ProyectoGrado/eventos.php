<?php
session_start();
include("conexion.php");

/* GUARDAR EVIDENCIA */
if(isset($_POST['guardar'])){

    $usuario = $_SESSION['usuario'];
    $actividad = $_POST['actividad'];
    $tipo = "eventos";

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
    header("Location: eventos.php");
    exit();
}

/* OBTENER EVIDENCIAS */
$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM evidencias 
        WHERE usuario='$usuario' AND tipo='eventos'";

$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eventos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="dashboard-container">

    <div class="dashboard-header">
        Módulo Eventos
    </div>

    <div class="dashboard-body">

        <h3>Tareas disponibles</h3>

        <ul>
            <li>Apoyo logístico</li>
            <li>Organización de eventos</li>
            <li>Atención a participantes</li>
        </ul>

        <p><strong>Adjuntar evidencia:</strong></p>

        <!-- MENSAJE -->
        <?php if (isset($_SESSION['mensaje'])): ?>
            <div style="padding: 10px; background: #e6ffe6; margin-bottom: 15px;">
                <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
            </div>
        <?php endif; ?>

        <!-- FORMULARIO -->
        <form method="POST" enctype="multipart/form-data">

            <p><strong>Selecciona la actividad:</strong></p>

            <select name="actividad" required>
                <option value="">-- Seleccionar --</option>
                <option value="Apoyo logístico">Apoyo logístico</option>
                <option value="Organización de eventos">Organización de eventos</option>
                <option value="Atención a participantes">Atención a participantes</option>
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

        <?php while($row = mysqli_fetch_assoc($resultado)){ ?>

            <div style="margin-bottom:15px;">

                <strong>Actividad:</strong> <?php echo $row['actividad']; ?><br><br>

                 <a href="uploads/<?php echo $row['archivo']; ?>" target="_blank" class="btn-verde">
                    📄 Ver
                </a>

               <a href="eliminar.php?id=<?php echo $row['id']; ?>&tipo=eventos" class="btn-rojo">
                    🗑 Eliminar
                </a>

            </div>

        <?php } ?>

        <br>

        <a href="pagos.php" class="btn-volver">⬅ Volver al menú</a>

    </div>

</div>

</body>
</html>
