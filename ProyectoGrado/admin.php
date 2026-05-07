<?php
session_start();
include("conexion.php");

/* VALIDAR ADMIN */
if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin'){
    echo "❌ Acceso denegado";
    exit();
}

/* CONSULTAR EVIDENCIAS */
$sql = "SELECT * FROM evidencias ORDER BY fecha DESC";
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

<div class="dashboard-container">

    <div class="dashboard-header">
        Panel Administrador
    </div>

    <div class="dashboard-body">

        <h3>Validación de evidencias</h3>

        <table border="1" width="100%" cellpadding="10">

            <tr>
                <th>Usuario</th>
                <th>Módulo</th>
                <th>Actividad</th>
                <th>Horas</th>
                <th>Archivo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>

            <?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

            <tr>

                <td><?php echo $fila['usuario']; ?></td>

                <td><?php echo ucfirst($fila['tipo']); ?></td>

                <td><?php echo $fila['actividad']; ?></td>

                <td><?php echo $fila['horas']; ?></td>

                <td>
                    <a href="uploads/<?php echo $fila['archivo']; ?>" target="_blank">
                        Ver archivo
                    </a>
                </td>

                <td>

                    <?php
                    $estado = strtolower($fila['estado']);

                    if($estado == "pendiente"){
                        echo "🟡 Pendiente";
                    }elseif($estado == "aprobado"){
                        echo "🟢 Aprobado";
                    }else{
                        echo "🔴 Rechazado";
                    }
                    ?>

                </td>

                <td>

                    <?php if($estado == "pendiente"){ ?>

                        <a href="aprobar.php?id=<?php echo $fila['id']; ?>" class="btn-verde">
                            ✅ Aprobar
                        </a>

                        <a href="rechazar.php?id=<?php echo $fila['id']; ?>" class="btn-rojo">
                            ❌ Rechazar
                        </a>

                    <?php } else { ?>

                        No disponible

                    <?php } ?>

                </td>

            </tr>

            <?php } ?>

        </table>

        <br>

        <a href="dashboard.php" class="btn-volver">
            ⬅ Volver al menú
        </a>

    </div>

</div>

</body>
</html>
