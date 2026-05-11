<?php
session_start();
include("conexion.php");

/* GUARDAR EVIDENCIA */
if(isset($_POST['guardar'])){

    $usuario = $_SESSION['usuario'];
    $actividad = $_POST['modulo'];
    $tipo = "biblioteca";

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
    header("Location: biblioteca.php");
    exit();
}

/* OBTENER EVIDENCIAS */
$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM evidencias 
        WHERE usuario='$usuario' AND tipo='biblioteca'";

$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="dashboard-container">

    <div class="dashboard-header">
        Módulo Biblioteca
    </div>

   <div class="dashboard-body">

    <div class="modulo-content">
        <h3>Tareas disponibles</h3>

        <ul>
            <li>Entrega de libros</li>
            <li>Organización de estanterías</li>
            <li>Cuidado de la biblioteca</li>
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

            <select name="modulo" required>
                <option value="">-- Seleccionar --</option>
                <option value="Entrega de libros">Entrega de libros</option>
                <option value="Organización de estanterías">Organización de estanterías</option>
                <option value="Cuidado de la biblioteca">Cuidado de la biblioteca</option>
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

            <div class="evidencia-card">

                <strong>Actividad:</strong> <?php echo $fila['actividad']; ?><br><br>

                <a href="uploads/<?php echo $fila['archivo']; ?>" target="_blank">
                    📄 Ver
                </a>

                <a href="pagos.php" class="btn-volver">⬅ Volver al menú</a>
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
