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
        WHERE usuario='$usuario' 
        AND tipo='biblioteca'";

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

<div class="modulo-mini">

    <div class="dashboard-header">
        📚 Módulo Biblioteca
    </div>

    <div class="dashboard-body">

        <h3>Tareas disponibles</h3>

        <ul>
            <li>Entrega de libros</li>
            <li>Organización de estanterías</li>
            <li>Cuidado de la biblioteca</li>
        </ul>

        <p><strong>Adjuntar evidencia:</strong></p>

        <!-- MENSAJE -->

        <?php if(isset($_SESSION['mensaje'])){ ?>

            <div class="alerta">
                <?php 
                    echo $_SESSION['mensaje']; 
                    unset($_SESSION['mensaje']); 
                ?>
            </div>

        <?php } ?>

        <!-- FORMULARIO -->

        <form method="POST" 
              enctype="multipart/form-data" 
              class="form-modulo">

            <select name="modulo" required>

                <option value="">-- Seleccionar actividad --</option>

                <option value="Entrega de libros">
                    Entrega de libros
                </option>

                <option value="Organización de estanterías">
                    Organización de estanterías
                </option>

                <option value="Cuidado de la biblioteca">
                    Cuidado de la biblioteca
                </option>

            </select>

            <input type="file" 
                   name="archivo[]" 
                   multiple 
                   required>

            <button type="submit" 
                    name="guardar" 
                    class="btn-verde">

                Guardar evidencia

            </button>

        </form>

        <br>

        <h3>📄 Evidencias registradas</h3>

        <?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

            <div class="evidencia-card">

                <strong>Actividad:</strong>
                <?php echo $fila['actividad']; ?>

                <div class="acciones">

                    <a href="uploads/<?php echo $fila['archivo']; ?>" 
                       target="_blank" 
                       class="btn-verde">

                       📄 Ver

                    </a>

                    <a href="eliminar.php?id=<?php echo $fila['id']; ?>&tipo=biblioteca" 
                       class="btn-rojo">

                       🗑 Eliminar

                    </a>

                </div>

            </div>

        <?php } ?>

        <a href="pagos.php" class="btn-volver">
            ⬅ Volver al menú
        </a>

    </div>

</div>

</body>
</html>
