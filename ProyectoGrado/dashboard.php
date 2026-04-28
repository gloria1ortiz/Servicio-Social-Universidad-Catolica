<?php
require_once 'classes/Auth.php';
session_start();

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header("Location: index.php");
    exit();
}

$usuario = htmlspecialchars($_SESSION['usuario']);
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

    <!-- ENCABEZADO -->
    <div class="dashboard-header">
        Registro de Servicio Social - UCP
    </div>

    <!-- CONTENIDO -->
    <div class="dashboard-body">

        <h2>Bienvenid@ <?php echo $_SESSION['usuario']; ?></h2>

        <p>
            Bienvenido al registro de horas de servicio social de la UCP.
            Por favor seleccione la opción que corresponda:
        </p>

        <!-- MENÚ -->
        <div class="menu-opciones">

            <a href="horas.php">
                ⏱️
                <h3>Horas Registradas</h3>
                <p>Consulta tus horas actuales</p>
            </a>

            <a href="progreso.php">
                📊
                <h3>Progreso</h3>
                <p>Revisa tus horas acumuladas y pendientes</p>
            </a>

            <a href="pagos.php">
                🗂️
                <h3>Opciones de Pago</h3>
                <p>Conoce los programas disponibles</p>
            </a>
            
          <a href="admin.php" class="card-link">
    <div class="card">
        <div class="icon">📝</div>
        <h3>Estado de Validación</h3>
        <p>Gestiona la aprobación de las horas registradas</p>
    </div>
</a>
        </div>

        <!-- BOTÓN CERRAR SESIÓN -->
        <div class="top-actions">
            <a href="logout.php" class="btn-volver">Cerrar sesión</a>
        </div>

    </div>

</div>


</body>
</html>








