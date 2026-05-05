<?php
session_start();

if(isset($_POST['entrar'])){
    $_SESSION['usuario'] = "Gloria";
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Portal Estudiantil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="login-container">

    <div class="login-header">
        Portal Estudiantil
    </div>

    <form method="POST">

        <button type="submit" name="entrar" class="btn-login">
            ENTRAR
        </button>

    </form>

</div>

</body>
</html>
