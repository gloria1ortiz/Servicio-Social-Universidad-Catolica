<?php
$conexion = mysqli_connect("localhost", "root", "123456", "servicio_social");

if(!$conexion){
    die("Error de conexión: " . mysqli_connect_error());
}
?>
