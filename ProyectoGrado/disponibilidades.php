<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Disponibilidades</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
    <script>
    setTimeout(function(){
        alert("Sesión cerrada por inactividad");
        window.location.href = "logout.php";
    }, 300000); // 5 minutos
</script>
<body>

<div class="login-container">
    <div class="login-header">
        Disponibilidades para pagar
    </div>

    <div class="login-body">
        <p>Actualmente existen las siguientes opciones:</p>
        <ul>
            <li>Pago total del servicio social</li>
            <li>Pago parcial (50%)</li>
            <li>Convenio institucional</li>
        </ul>

        <a href="dashboard.php">Volver al menú</a>
    </div>
</div>

</body>
</html>
