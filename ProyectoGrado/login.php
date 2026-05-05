<?php
session_start();
<button type="submit" name="entrar" class="btn-verde">
$_SESSION['usuario'] = "Gloria";
include("conexion.php");
header("Location: dashboard.php");
exit();
?>
?>
