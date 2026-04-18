<?php
include("conexion.php");

$id = $_GET['id'];

mysqli_query($conexion, "UPDATE horas SET estado='aprobado' WHERE id='$id'");

header("Location: admin.php");
?>
