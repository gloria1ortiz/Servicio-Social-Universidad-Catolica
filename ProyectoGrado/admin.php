<?php
session_start();
include("conexion.php");

// validar que sea admin
if($_SESSION['usuario'] != 'admin'){
    echo "Acceso denegado";
    exit();
}

$resultado = mysqli_query($conexion, "SELECT * FROM horas ORDER BY fecha DESC");
?>

<h2>Panel Administrador</h2>

<table border="1" cellpadding="10">
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
    <td><?php echo $fila['estado']; ?></td>
    <td>
        <a href="aprobar.php?id=<?php echo $fila['id']; ?>">✅ Aprobar</a> |
        <a href="rechazar.php?id=<?php echo $fila['id']; ?>">❌ Rechazar</a>
    </td>
</tr>

<?php } ?>

</table>
