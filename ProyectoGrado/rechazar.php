<?php
include("conexion.php");

$id = $_GET['id'];

mysqli_query($conexion, "UPDATE horas SET estado='rechazado' WHERE id='$id'");

header("Location: admin.php");
?>
