<?php
$conexion = mysqli_connect("localhost", "root", "Admin123*", "servicio_social");

if(!$conexion){
    die("Error de conexión: " . mysqli_connect_error());
}
?>
