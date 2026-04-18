<?php
session_start();
include("conexion.php");

/* VALIDAR QUE SEA ADMIN */
if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin'){
    echo "❌ Acceso denegado";
    exit();
}

/* VALIDAR ID */
if(!isset($_GET['id'])){
    echo "❌ ID no válido";
    exit();
}

$id = intval($_GET['id']); // seguridad básica

/* ACTUALIZAR ESTADO */
$sql = "UPDATE horas SET estado='rechazado' WHERE id=$id";
mysqli_query($conexion, $sql);

/* REDIRECCIONAR */
header("Location: admin.php");
exit();
?>
