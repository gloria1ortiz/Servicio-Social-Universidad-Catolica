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

            $sql = "INSERT INTO evidencias 
                    (usuario, actividad, archivo, tipo) 
                    VALUES 
                    ('$usuario', '$actividad', '$nombreArchivo', '$tipo')";

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
        WHERE usuario='$usuario' 
        AND tipo='eventos'";

$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Módulo Eventos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="modulo-mini">

    <div class="dashboard-header">
        📅 Módulo Eventos
    </div>

    <div class="dashboard-body">

        <div class="modulo-content">

            <h3>Tareas disponibles</h3>

            <ul>
                <li>Apoyo logístico</li>
                <li>Organización de eventos</li>
                <li>Atención a participantes</li>
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

                <select name="actividad" required>

                    <option value="">
                        -- Seleccionar actividad --
                    </option>

                    <option value="Apoyo logístico">
                        Apoyo logístico
                    </option>

                    <option value="Organización de eventos">
                        Organización de eventos
                    </option>

                    <option value="Atención a participantes">
                        Atención a participantes
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

            <?php while($row = mysqli_fetch_assoc($resultado)){ ?>

                <div class="evidencia-card">

                    <strong>Actividad:</strong>

                    <?php echo $row['actividad']; ?>

                    <div class="acciones">

                        <a href="uploads/<?php echo $row['archivo']; ?>" 
                           target="_blank" 
                           class="btn-verde">

                           📄 Ver

                        </a>

                        <a href="eliminar.php?id=<?php echo $row['id']; ?>&tipo=eventos" 
                           class="btn-rojo">

                           🗑 Eliminar

                        </a>

                    </div>

                </div>

            <?php } ?>

            <br>

            <a href="pagos.php" class="btn-volver">
                ⬅ Volver al menú
            </a>

        </div>

    </div>

</div>

</body>
</html>
