<?php
session_start();

$_SESSION['usuario'] = "Gloria";

header("Location: dashboard.php");
exit();
?>
