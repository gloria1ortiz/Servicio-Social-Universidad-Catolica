<?php
$conexion = mysqli_connect("localhost", "root", "Admin123*", "proyecto_grado");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
