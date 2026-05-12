<?php
session_start();
include("conexion.php");

/* GUARDAR EVIDENCIA */
if(isset($_POST['guardar'])){

    $usuario = $_SESSION['usuario'];
    $actividad = $_POST['actividad'];
    $tipo = "cie";

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
    header("Location: cie.php");
    exit();
}

/* OBTENER EVIDENCIAS */
$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM evidencias 
        WHERE usuario='$usuario' AND tipo='cie'";

$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo CIE</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="modulo-mini">

    <div class="dashboard-header">
        Módulo CIE
    </div>

   <div class="dashboard-body">

    <div class="modulo-content">

        <h3>Tareas disponibles</h3>

        <ul>
            <li>Migración de cursos</li>
            <li>Revisión de diseños</li>
            <li>Apoyo en contenidos educativos</li>
        </ul>

        <p><strong>Adjuntar evidencia:</strong></p>

        <!-- MENSAJE -->
        <?php if (isset($_SESSION['mensaje'])): ?>
            <div class="alerta">
    <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
</div>
        <?php endif; ?>

        <!-- FORMULARIO -->
        <form method="POST" enctype="multipart/form-data" class="form-modulo">

            <p><strong>Selecciona la actividad:</strong></p>

            <select name="actividad" required>
                
                <option value="">-- Seleccionar --</option>
                <option value="Migración de cursos">Migración de cursos</option>
                <option value="Revisión de diseños">Revisión de diseños</option>
                <option value="Apoyo en contenidos educativos">Apoyo en contenidos educativos</option>
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

            <div class="evidencia-card">

                <strong>Actividad:</strong> <?php echo $row['actividad']; ?><br><br>

                <a href="uploads/<?php echo $row['archivo']; ?>" target="_blank" class="btn-verde">
                    📄 Ver
                </a>

                <a href="eliminar.php?id=<?php echo $row['id']; ?>&tipo=cie" class="btn-rojo">
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

</body>

</body>
</html>
