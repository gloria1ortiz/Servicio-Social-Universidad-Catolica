<?php
$conexion = mysqli_connect("localhost", "root", "", "tu_base_de_datos");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
