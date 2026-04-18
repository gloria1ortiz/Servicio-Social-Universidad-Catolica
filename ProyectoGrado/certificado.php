<?php
session_start();
include("conexion.php");

$usuario = $_SESSION['usuario'];

$sql = "SELECT SUM(horas) as total FROM horas WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $sql);
$f
