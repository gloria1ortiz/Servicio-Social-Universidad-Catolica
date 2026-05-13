<?php
session_start();

/* VALIDAR SESIÓN */
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="dashboard-container">

    <div class="dashboard-header">
        Registro de Servicio Social - UCP
    </div>

    <div class="dashboard-body">

        <h1>
            Bienvenid@ <?php echo $_SESSION['nombre']; ?>
        </h1>

        <p class="dashboard-text">
            Bienvenido al registro de horas de servicio social de la UCP.
            Por favor seleccione la opción que corresponda:
        </p>

        <div class="menu-opciones">

            <a href="horas.php" class="modulo-card">
                ⏱️
                <h3>Horas Registradas</h3>
                <p>Consulta tus horas actuales</p>
            </a>

            <a href="progreso.php" class="modulo-card">
                📊
                <h3>Progreso</h3>
                <p>Revisa tus horas acumuladas y pendientes</p>
            </a>

            <a href="pagos.php" class="modulo-card">
                🗂️
                <h3>Opciones de Pago</h3>
                <p>Conoce los programas disponibles</p>
            </a>

            <a href="validacion.php" class="modulo-card">
                📝
                <h3>Estado de Validación</h3>
                <p>Gestiona la aprobación de horas</p>
            </a>

            <?php if($_SESSION['rol'] == 'admin'){ ?>

            <a href="admin.php" class="modulo-card">
                🛠️
                <h3>Panel Administrador</h3>
                <p>Gestionar validaciones y evidencias</p>
            </a>

            <?php } ?>

        </div>

        <br>

        <a href="logout.php" class="btn-rojo">
            Cerrar sesión
        </a>

    </div>

</div>

</body>
</html>
