<?php
session_start();

$_SESSION['usuario'] = "Gloria";
include("conexion.php");
header("Location: dashboard.php");
exit();
?>
?>
