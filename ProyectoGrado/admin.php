<?php
session_start();
include("conexion.php");

/* VALIDAR QUE SEA ADMIN */
if(!isset($_SESSION['usuario'])){
    echo "❌ Acceso denegado";
    exit();
}
}
}

/* TRAER REGISTROS */
$sql = "SELECT * FROM horas ORDER BY fecha DESC";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel Administrador</title>
<link rel="stylesheet" href="css/styles.css">
</head>

<body>
<a href="aprobar.php?id=<?php echo $fila['id']; ?>" 
   class="btn-verde"
   onclick="return confirm('¿Seguro que deseas APROBAR estas horas?');">
   ✅ Aprobar
</a>

<a href="rechazar.php?id=<?php echo $fila['id']; ?>" 
   class="btn-rojo"
   onclick="return confirm('¿Seguro que deseas RECHAZAR estas horas?');">
   ❌ Rechazar
</a>
<div class="dashboard-container">

    <div class="dashboard-header">
        <h2>Panel Administrador</h2>
    </div>

    <div class="dashboard-body">

        <h3>Validar horas de estudiantes</h3>

        <table border="1" width="100%" cellpadding="10">
            <tr>
                <th>Usuario</th>
                <th>Horas</th>
                <th>Fecha</th>
                <th>Actividad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>

            <?php while($fila = mysqli_fetch_assoc($resultado)){ ?>
            <tr>

                <td><?php echo $fila['usuario']; ?></td>
                <td><?php echo $fila['horas']; ?></td>
                <td><?php echo $fila['fecha']; ?></td>
                <td><?php echo $fila['actividad']; ?></td>

                <td>
                    <?php 
                        if($fila['estado'] == 'pendiente'){
                            echo "🟡 Pendiente";
                        }elseif($fila['estado'] == 'aprobado'){
                            echo "🟢 Aprobado";
                        }else{
                            echo "🔴 Rechazado";
                        }
                    ?>
                </td>

                <td>
                    <?php if($fila['estado'] == 'pendiente'){ ?>
                        <a href="aprobar.php?id=<?php echo $fila['id']; ?>" class="btn-verde">
                            ✅ Aprobar
                        </a>

                        <a href="rechazar.php?id=<?php echo $fila['id']; ?>" class="btn-rojo">
                            ❌ Rechazar
                        </a>
                    <?php } else { ?>
                        <span>No disponible</span>
                    <?php } ?>
                </td>

            </tr>
            <?php } ?>

        </table>

        <br>
        <a href="dashboard.php" class="btn-volver">⬅ Volver</a>

    </div>

</div>

</body>
</html>
